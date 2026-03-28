<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterTrader;
use App\Models\CopyConnection;
use App\Models\TradeHistory;
use App\Models\UserRiskConfig;
use App\Models\User;

class CopyTraderController extends Controller
{
    public function index()
    {
        // For development/testing purposes, we will use the first user in the database.
        $user = auth()->user() ?? User::first();

        if (!$user) {
            abort(403, 'No user found in the database. Please run migrations and seeders.');
        }

        // 1. Discover Masters Data
        $masterTraders = MasterTrader::orderBy('risk_score', 'asc')->get();

        // 2. Active Connections Data
        $activeConnections = CopyConnection::with('master')
            ->where('user_id', $user->id)
            ->get();

        // 3. Trade History (Open and Closed Trades)
        $openTrades = TradeHistory::with('master')
            ->where('user_id', $user->id)
            ->where('status', 'open')
            ->orderBy('opened_at', 'desc')
            ->get();

        $closedTrades = TradeHistory::with('master')
            ->where('user_id', $user->id)
            ->where('status', 'closed')
            ->orderBy('closed_at', 'desc')
            ->get();

        // 4. Risk Configuration
        $riskConfig = UserRiskConfig::firstOrCreate(
            ['user_id' => $user->id],
            [
                'force_exit_drawdown' => true,
                'slippage_protection' => false,
                'copy_sl_tp' => true,
                'weekend_protection' => false,
                'max_daily_loss' => 500.00,
                'max_open_positions' => 5
            ]
        );

        // 5. Dashboard Summary Statistics (For Summary Cards)
        $totalInvested = $activeConnections->where('status', 'active')->sum('invested_amount');
        $totalNetProfit = $closedTrades->sum('net_profit') + $openTrades->sum('net_profit');
        $winTrades = $closedTrades->where('net_profit', '>', 0)->count();
        $totalClosed = $closedTrades->count();

        // Win Rate Calculation
        $winRate = $totalClosed > 0 ? round(($winTrades / $totalClosed) * 100) : 0;


        // 6. Chart Data Calculation (Portfolio Growth)
        $baseBalance = 100000 + $totalInvested;

        $chartLabels = ['Start'];
        $chartData = [$baseBalance];

        $runningBalance = $baseBalance;

        // Calculate the balance over time based on closed trades in chronological order
        $closedTradesAsc = TradeHistory::where('user_id', $user->id)
            ->where('status', 'closed')
            ->orderBy('closed_at', 'asc')
            ->get();

        foreach ($closedTradesAsc as $trade) {
            $runningBalance += $trade->net_profit;
            $chartLabels[] = \Carbon\Carbon::parse($trade->closed_at)->format('M d, H:i');
            $chartData[] = round($runningBalance, 2);
        }

        // Creating a point for the current floating P/L of open trades
        $currentFloating = $openTrades->sum('net_profit');
        $chartLabels[] = 'Now';
        $chartData[] = round($runningBalance + $currentFloating, 2);


        // Return the view with all the data
        return view('components.back-end.copy-trader', compact(
            'masterTraders',
            'activeConnections',
            'openTrades',
            'closedTrades',
            'riskConfig',
            'totalInvested',
            'totalNetProfit',
            'winRate',
            'totalClosed',
            'chartLabels',
            'chartData'
        ));
    }


    // ==========================================
    // 1. Risk Config Save Logic
    // ==========================================
    public function updateRiskConfig(Request $request)
    {
        $user = auth()->user() ?? User::first();

        UserRiskConfig::updateOrCreate(
            ['user_id' => $user->id],
            [
                'force_exit_drawdown' => $request->force_exit_drawdown,
                'slippage_protection' => $request->slippage_protection,
                'copy_sl_tp' => $request->copy_sl_tp,
                'weekend_protection' => $request->weekend_protection,
                'max_daily_loss' => $request->max_daily_loss,
                'max_open_positions' => $request->max_open_positions,
            ]
        );

        return response()->json(['success' => true, 'message' => 'Risk configuration updated successfully!']);
    }

    // ==========================================
    // 2. Copy Now Modal Save Logic
    // ==========================================
    public function storeConnection(Request $request)
    {
        $user = auth()->user() ?? User::first();

        CopyConnection::create([
            'user_id' => $user->id,
            'master_trader_id' => $request->master_id,
            'invested_amount' => $request->invested_amount,
            'multiplier' => $request->multiplier,
            'status' => 'active',
            'net_profit' => 0,
        ]);

        return response()->json(['success' => true, 'message' => 'Successfully connected to Master Trader!']);
    }

    // ==========================================
    // 3. Toggle Connection Status (Pause / Play)
    // ==========================================
    public function toggleConnection($id)
    {
        $user = auth()->user() ?? User::first();
        $connection = CopyConnection::where('user_id', $user->id)->findOrFail($id);

        // Real-life scenario: Here you would also call the broker's API to pause/resume copying trades for this connection.
        $connection->status = $connection->status === 'active' ? 'paused' : 'active';
        $connection->save();

        return response()->json([
            'success' => true,
            'status' => $connection->status,
            'message' => 'Connection ' . $connection->status . ' successfully!'
        ]);
    }

    // ==========================================
    // 4. Update Connection (Settings)
    // ==========================================
    public function updateConnection(Request $request, $id)
    {
        $user = auth()->user() ?? User::first();
        $connection = CopyConnection::where('user_id', $user->id)->findOrFail($id);

        $connection->update([
            'invested_amount' => $request->invested_amount,
            'multiplier' => $request->multiplier,
        ]);

        return response()->json(['success' => true, 'message' => 'Copy settings updated successfully!']);
    }

    // ==========================================
    // 5. Stop Connection (Delete)
    // ==========================================
    public function stopConnection($id)
    {
        $user = auth()->user() ?? User::first();
        $connection = CopyConnection::where('user_id', $user->id)->findOrFail($id);

        // In a real application, you would also call the broker's API to stop copying trades for this connection before deleting it from your database.
        $connection->delete();

        return response()->json(['success' => true, 'message' => 'Copy connection stopped permanently.']);
    }

    // ==========================================
    // 6. Filter & Search Master Traders (AJAX)
    // ==========================================
    public function filterMasters(Request $request)
    {
        $query = MasterTrader::query();

        // 1. Search by name
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 2. Filter and Sort
        $sort = $request->sort ?? 'Top Performers';
        switch ($sort) {
            case 'Lowest Risk':
                $query->orderBy('risk_score', 'asc');
                break;
            case 'Most Copiers':
                $query->orderBy('followers_count', 'desc');
                break;
            case 'New & Trending':
                $query->orderBy('created_at', 'desc');
                break;
            case 'Top Performers':
            default:
                $query->orderBy('monthly_roi', 'desc');
                break;
        }

        $masters = $query->get();

        return response()->json([
            'success' => true,
            'masters' => $masters
        ]);
    }
}
