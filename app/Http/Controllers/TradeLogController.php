<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TradeLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TradeLogController extends Controller
{
   public function store(Request $request)
    {
        $validated = $request->validate([
            'date_of_operation' => 'required|date',
            'trading_session' => 'nullable|string',
            'financial_instrument' => 'nullable|string',
            'lot_size' => 'nullable|numeric',
            'position_type' => 'nullable|string',
            'risk_benefit_metrics' => 'nullable|string',
            'entry_time' => 'nullable|string',
            'exit_time' => 'nullable|string',
            'outcome' => 'nullable|string',
            'gross_profit' => 'nullable|numeric',
            'commission_details' => 'nullable|string',
            'net_profit' => 'nullable|numeric',
            'trade_image_link' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        // ✅ Convert "12:30 PM" → "12:30:00" for MySQL
        if (!empty($validated['entry_time'])) {
            $validated['entry_time'] = Carbon::createFromFormat('h:i A', $validated['entry_time'])->format('H:i:s');
        }
        if (!empty($validated['exit_time'])) {
            $validated['exit_time'] = Carbon::createFromFormat('h:i A', $validated['exit_time'])->format('H:i:s');
        }

        TradeLog::create($validated);

        // ✅ Return JSON success + redirect URL
        return response()->json([
            'message' => 'Trade log saved successfully.',
            'redirect' => route('admin.dashboard')
        ]);
    }

     public function index()
    {
        $userId = Auth::id();

        $tradeLogs = TradeLog::where('user_id', $userId)
            ->orderBy('date_of_operation', 'desc')
            ->get();

        return response()->json($tradeLogs);
    }

//  public function getDashboardStats(Request $request)
// {
//     $period = $request->query('period', 'daily');
//     $userId = auth()->id();

//     // --- Base query for current period ---
//     $query = TradeLog::where('user_id', $userId);

//     if ($period === 'daily') {
//         $query->whereDate('date_of_operation', today());
//     } elseif ($period === 'weekly') {
//         $query->whereBetween('date_of_operation', [now()->startOfWeek(), now()->endOfWeek()]);
//     } elseif ($period === 'monthly') {
//         $query->whereMonth('date_of_operation', now()->month);
//     }

//     $trades = $query->get();

//     // --- Win/Loss Rate ---
//     $wins = $trades->where('outcome', 'win')->count();
//     $losses = $trades->where('outcome', 'loss')->count();
//     $total = $wins + $losses;
//     $winLossRate = $total > 0 ? round(($wins / $total) * 100, 2) : 0;

//     // --- Yesterday’s stats ---
//     $yesterdayTrades = TradeLog::where('user_id', $userId)
//         ->whereDate('date_of_operation', today()->subDay())
//         ->get();

//     $yesterdayWins = $yesterdayTrades->where('outcome', 'win')->count();
//     $yesterdayLosses = $yesterdayTrades->where('outcome', 'loss')->count();
//     $yesterdayTotal = $yesterdayWins + $yesterdayLosses;
//     $yesterdayRate = $yesterdayTotal > 0 ? round(($yesterdayWins / $yesterdayTotal) * 100, 2) : 0;
//     $winLossDiff = $winLossRate - $yesterdayRate;

//     // --- Accumulated Profit ---
//     $todayProfit = $trades->sum('net_profit');
//     $yesterdayProfit = $yesterdayTrades->sum('net_profit');
//     $profitDiff = $yesterdayProfit != 0 
//         ? round((($todayProfit - $yesterdayProfit) / abs($yesterdayProfit)) * 100, 2)
//         : 0;

//     // --- Average Trading Time (in minutes) ---
//     $avgTodayMinutes = $trades->count() > 0
//         ? round($trades->map(function ($trade) {
//             $entry = \Carbon\Carbon::parse($trade->entry_time);
//             $exit = \Carbon\Carbon::parse($trade->exit_time);
//             return $exit->diffInMinutes($entry);
//         })->avg(), 2)
//         : 0;

//     $avgYesterdayMinutes = $yesterdayTrades->count() > 0
//         ? round($yesterdayTrades->map(function ($trade) {
//             $entry = \Carbon\Carbon::parse($trade->entry_time);
//             $exit = \Carbon\Carbon::parse($trade->exit_time);
//             return $exit->diffInMinutes($entry);
//         })->avg(), 2)
//         : 0;

//     $avgDiff = $avgTodayMinutes - $avgYesterdayMinutes;
//     $avgHours = floor($avgTodayMinutes / 60);
//     $avgMinutes = $avgTodayMinutes % 60;

//     // --- Risk/Reward Ratio (demo placeholder) ---
//     $riskRewardRatio = '2.5'; // You can make this dynamic later if needed

//     // --- Total Holdings (Sum of all profits ever) ---
//     $totalHoldings = TradeLog::where('user_id', $userId)->sum('net_profit');

//     // --- Return Response ---
//     return response()->json([
//         'total_holdings' => round($totalHoldings, 2),
//         'win_loss_rate' => "{$winLossRate}%",
//         'win_loss_diff' => "{$winLossDiff}%",
//         'accumulated_profit' => number_format($todayProfit, 2),
//         'accumulated_profit_diff' => "{$profitDiff}%",
//         'risk_reward_ratio' => $riskRewardRatio,
//         'risk_reward_diff' => '+5%', // placeholder
//         'avg_trading_time' => "{$avgHours}h {$avgMinutes}m",
//         'avg_trading_time_diff' => ($avgDiff >= 0 ? '+' : '') . abs($avgDiff) . 'm',
//     ]);
// }

public function getDashboardStats(Request $request)
{
    $period = $request->query('period', 'daily');
    $userId = auth()->id();

    // --- Base query for current period ---
    $query = TradeLog::where('user_id', $userId);

    // ✅ Apply date filter based on selected period
    switch ($period) {
        case 'daily':
            $query->whereDate('date_of_operation', today());
            break;

        case 'weekly':
            $query->whereBetween('date_of_operation', [now()->startOfWeek(), now()->endOfWeek()]);
            break;

        case 'monthly':
            $query->whereMonth('date_of_operation', now()->month)
                  ->whereYear('date_of_operation', now()->year);
            break;

        case 'yearly':
            $query->whereYear('date_of_operation', now()->year);
            break;

        case 'all':
            // No filter — all time
            break;
    }

    $trades = $query->get();

    // --- Win/Loss Rate ---
    $wins = $trades->where('outcome', 'win')->count();
    $losses = $trades->where('outcome', 'loss')->count();
    $total = $wins + $losses;
    $winLossRate = $total > 0 ? round(($wins / $total) * 100, 2) : 0;

    // --- Yesterday’s stats (for comparison) ---
    $yesterdayTrades = TradeLog::where('user_id', $userId)
        ->whereDate('date_of_operation', today()->subDay())
        ->get();

    $yesterdayWins = $yesterdayTrades->where('outcome', 'win')->count();
    $yesterdayLosses = $yesterdayTrades->where('outcome', 'loss')->count();
    $yesterdayTotal = $yesterdayWins + $yesterdayLosses;
    $yesterdayRate = $yesterdayTotal > 0 ? round(($yesterdayWins / $yesterdayTotal) * 100, 2) : 0;
    $winLossDiff = $winLossRate - $yesterdayRate;

    // --- Accumulated Profit (for selected period) ---
    $currentProfit = $trades->sum('net_profit');
    $yesterdayProfit = $yesterdayTrades->sum('net_profit');
    $profitDiff = $yesterdayProfit != 0
        ? round((($currentProfit - $yesterdayProfit) / abs($yesterdayProfit)) * 100, 2)
        : 0;

    // --- Average Trading Time ---
    $avgTodayMinutes = $trades->count() > 0
        ? round($trades->map(function ($trade) {
            $entry = \Carbon\Carbon::parse($trade->entry_time);
            $exit = \Carbon\Carbon::parse($trade->exit_time);
            return $exit->diffInMinutes($entry);
        })->avg(), 2)
        : 0;

    $avgYesterdayMinutes = $yesterdayTrades->count() > 0
        ? round($yesterdayTrades->map(function ($trade) {
            $entry = \Carbon\Carbon::parse($trade->entry_time);
            $exit = \Carbon\Carbon::parse($trade->exit_time);
            return $exit->diffInMinutes($entry);
        })->avg(), 2)
        : 0;

    $avgDiff = $avgTodayMinutes - $avgYesterdayMinutes;
    $avgHours = floor($avgTodayMinutes / 60);
    $avgMinutes = $avgTodayMinutes % 60;

    // --- Risk/Reward Ratio (placeholder for now) ---
    $riskRewardRatio = '1:2.5';
    $riskRewardDiff = '+19%'; // demo

    // --- Total Holdings (All Time) ---
    $totalHoldings = TradeLog::where('user_id', $userId)->sum('net_profit');

    // ✅ Return JSON response
    return response()->json([
        'period' => ucfirst($period),
        'total_holdings' => round($totalHoldings, 2),
        'win_loss_rate' => "{$winLossRate}%",
        'win_loss_diff' => "{$winLossDiff}%",
        'accumulated_profit' => number_format($currentProfit, 2),
        'accumulated_profit_diff' => "{$profitDiff}%",
        'risk_reward_ratio' => $riskRewardRatio,
        'risk_reward_diff' => $riskRewardDiff,
        'avg_trading_time' => "{$avgHours}h {$avgMinutes}m",
        'avg_trading_time_diff' => ($avgDiff >= 0 ? '+' : '') . abs($avgDiff) . 'm',
    ]);
}

public function getBestTrades(Request $request)
{
    try {
        $userId = auth()->id();

        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $query = TradeLog::where('user_id', $userId);

        if ($startDate && $endDate) {
            $query->whereBetween('date_of_operation', [$startDate, $endDate]);
        }

        // Get top 10 trades by net_profit
        $bestTrades = $query->orderByDesc('net_profit')
            ->take(10)
            ->get([
                'id',
                'date_of_operation',
                'trading_session',
                'financial_instrument',
                'lot_size',
                'position_type',
                'risk_benefit_metrics',
                'entry_time',
                'exit_time',
                'outcome',
                'gross_profit',
                'commission_details',
                'net_profit',
                'trade_image_link'
            ]);

        return response()->json([
            'status' => 'success',
            'best_trades' => $bestTrades,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'fail',
            'message' => $e->getMessage(),
        ], 500);
    }
}


public function getTradeStats(Request $request)
{
    try {
        $period = $request->get('period', 'daily'); // default daily

        $query = TradeLog::query();

        // Apply date filter
        switch ($period) {
            case 'weekly':
                $query->where('created_at', '>=', now()->subWeek());
                break;
            case 'monthly':
                $query->where('created_at', '>=', now()->subMonth());
                break;
            case 'yearly':
                $query->where('created_at', '>=', now()->subYear());
                break;
            case 'alltime':
                // no filter
                break;
            default: // daily
                $query->whereDate('created_at', now());
                break;
        }

        $logs = $query->get();

        $data = [
            'total_holding' => $logs->sum('holding_amount'),
            'holding_change' => rand(-5, 5), // or calculate properly
            'profitable_trades' => $logs->where('profit', '>', 0)->count(),
            'total_trades_made' => $logs->count(),
            'active_pages' => $logs->unique('page_id')->count(),
        ];

        return response()->json(['status' => 'success', 'data' => $data]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'fail',
            'message' => $e->getMessage(),
        ], 500);
    }
}


public function getMostProfitableAssets(Request $request)
{
    try {
        $userId = auth()->id();
        $period = $request->query('period', 'daily');

        $query = TradeLog::where('user_id', $userId);

        // Date filtering based on period
        switch ($period) {
            case 'weekly':
                $query->where('date_of_operation', '>=', now()->subWeek());
                break;
            case 'monthly':
                $query->where('date_of_operation', '>=', now()->subMonth());
                break;
            case 'yearly':
                $query->where('date_of_operation', '>=', now()->subYear());
                break;
            case 'all':
                break;
            default: // daily
                $query->whereDate('date_of_operation', now());
        }

        // Group by asset (financial_instrument) and calculate stats
        $stats = $query
            ->select(
                'financial_instrument as asset',
                DB::raw('SUM(net_profit) as total_profit'),
                DB::raw('COUNT(*) as trades'),
                DB::raw('SUM(CASE WHEN net_profit > 0 THEN 1 ELSE 0 END) * 100 / COUNT(*) as win_rate')
            )
            ->groupBy('financial_instrument')
            ->orderByDesc('total_profit')
            ->get();

        // Add a “trend” flag for visual direction (example logic)
        $data = $stats->map(function ($item) {
            return [
                'asset' => $item->asset,
                'profit' => $item->total_profit,
                'trades' => $item->trades,
                'win_rate' => round($item->win_rate, 1),
                'trend' => $item->total_profit >= 0 ? 'up' : 'down',
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'fail',
            'message' => $e->getMessage(),
        ], 500);
    }
}

// App\Http\Controllers\TradeLogController.php

// TradeLogController.php
public function dailyTrendsData(Request $request)
{
    $userId = Auth::id();
    $days   = $request->input('days', 8);

    $dates = collect();
    for ($i = $days - 1; $i >= 0; $i--) {
        $dates->push(Carbon::today()->subDays($i));
    }

    $start = $dates->first()->startOfDay();
    $end   = $dates->last()->endOfDay();

    $trades = TradeLog::where('user_id', $userId)
        ->whereBetween('date_of_operation', [$start, $end])
        ->selectRaw('DATE(date_of_operation) as trade_date')
        ->selectRaw('COUNT(*) as trade_count')
        ->selectRaw('SUM(net_profit) as total_profit')
        ->groupBy('trade_date')
        ->get()
        ->keyBy('trade_date');

    $data = $dates->map(function (Carbon $date) use ($trades) {
        $key   = $date->format('Y-m-d');
        $trade = $trades->get($key);

        $profit = $trade ? (float) $trade->total_profit : 0.0;
        $count  = $trade ? (int) $trade->trade_count : 0;

        $profitText = $profit == 0 ? '$0' : 
                     ($profit > 0 ? '+' : '') . '$' .
                     (abs($profit) >= 1000 
                         ? number_format(abs($profit) / 1000, 2) . 'k'
                         : number_format(abs($profit), 2));

        $profitClass = $profit > 0 ? 'positive' : ($profit < 0 ? 'negative' : 'neutral');

        return [
            'day'          => $date->format('d'),
            'weekday'      => $date->format('D'),
            'profit'       => $profitText,
            'profit_class' => $profitClass,
            'trades'       => $count . ' ' . \Str::plural('Trade', $count),
        ];
    })->values()->toArray();

    return response()->json($data);
}

}
