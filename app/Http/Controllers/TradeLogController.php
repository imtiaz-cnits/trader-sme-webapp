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

        if (!empty($validated['entry_time'])) {
            $validated['entry_time'] = Carbon::createFromFormat('h:i A', $validated['entry_time'])->format('H:i:s');
        }
        if (!empty($validated['exit_time'])) {
            $validated['exit_time'] = Carbon::createFromFormat('h:i A', $validated['exit_time'])->format('H:i:s');
        }

        TradeLog::create($validated);

        return response()->json([
            'message' => 'Trade log saved successfully.',
            'redirect' => route('admin.dashboard')
        ]);
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $query = TradeLog::where('user_id', $userId);

        $period = $request->query('period', 'all_time');

        if ($period === 'daily') {
            $query->whereDate('date_of_operation', today());
        } elseif ($period === 'weekly') {
            $query->whereBetween('date_of_operation', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($period === 'monthly') {
            $query->whereMonth('date_of_operation', now()->month)->whereYear('date_of_operation', now()->year);
        } elseif ($period === 'yearly') {
            $query->whereYear('date_of_operation', now()->year);
        } elseif ($period === 'custom' && $request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date_of_operation', [$request->start_date, $request->end_date]);
        }

        $tradeLogs = $query->orderBy('date_of_operation', 'desc')->paginate(10);
        return response()->json($tradeLogs);
    }

    public function getDashboardStats(Request $request)
    {
        $period = $request->query('period', 'daily');
        $userId = auth()->id();

        $query = TradeLog::where('user_id', $userId);
        $prevQuery = TradeLog::where('user_id', $userId);

        switch ($period) {
            case 'daily':
                $query->whereDate('date_of_operation', today());
                $prevQuery->whereDate('date_of_operation', today()->subDay());
                break;
            case 'weekly':
                $query->whereBetween('date_of_operation', [now()->startOfWeek(), now()->endOfWeek()]);
                $prevQuery->whereBetween('date_of_operation', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                break;
            case 'monthly':
                $query->whereMonth('date_of_operation', now()->month)->whereYear('date_of_operation', now()->year);
                $prevQuery->whereMonth('date_of_operation', now()->subMonth()->month)->whereYear('date_of_operation', now()->subMonth()->year);
                break;
            case 'yearly':
                $query->whereYear('date_of_operation', now()->year);
                $prevQuery->whereYear('date_of_operation', now()->subYear()->year);
                break;
            case 'custom':
                if ($request->has('start_date') && $request->has('end_date')) {
                    $query->whereBetween('date_of_operation', [$request->start_date, $request->end_date]);
                    $days = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date)) + 1;
                    $prevQuery->whereBetween('date_of_operation', [Carbon::parse($request->start_date)->subDays($days), Carbon::parse($request->start_date)->subDays(1)]);
                }
                break;
            case 'all_time':
                $prevQuery->where('id', 0);
                break;
        }

        $trades = $query->get();
        $prevTrades = $prevQuery->get();

        $wins = $trades->where('outcome', 'Win')->count();
        $total = $trades->count();
        $winLossRate = $total > 0 ? round(($wins / $total) * 100, 2) : 0;

        $prevWins = $prevTrades->where('outcome', 'Win')->count();
        $prevTotal = $prevTrades->count();
        $prevWinLossRate = $prevTotal > 0 ? round(($prevWins / $prevTotal) * 100, 2) : 0;
        $winLossDiff = $winLossRate - $prevWinLossRate;

        $currentProfit = $trades->sum('net_profit');
        $prevProfit = $prevTrades->sum('net_profit');
        $profitDiff = $prevProfit != 0 ? round((($currentProfit - $prevProfit) / abs($prevProfit)) * 100, 2) : ($currentProfit > 0 ? 100 : 0);

        // 🔴 Error Fixed: Added check for null times to prevent crashes
        $avgTodayMinutes = $trades->filter(fn($t) => !empty($t->entry_time) && !empty($t->exit_time))
            ->map(fn($t) => Carbon::parse($t->exit_time)->diffInMinutes(Carbon::parse($t->entry_time)))->avg() ?? 0;

        $avgYesterdayMinutes = $prevTrades->filter(fn($t) => !empty($t->entry_time) && !empty($t->exit_time))
            ->map(fn($t) => Carbon::parse($t->exit_time)->diffInMinutes(Carbon::parse($t->entry_time)))->avg() ?? 0;

        $avgDiff = round($avgTodayMinutes - $avgYesterdayMinutes, 2);
        $avgHours = floor($avgTodayMinutes / 60);
        $avgMinutes = round($avgTodayMinutes % 60);

        $avgWinAmount = $trades->where('outcome', 'Win')->avg('net_profit') ?? 0;
        $avgLossAmount = abs($trades->where('outcome', 'Loss')->avg('net_profit') ?? 0);
        $rrValue = $avgLossAmount > 0 ? round($avgWinAmount / $avgLossAmount, 2) : ($avgWinAmount > 0 ? $avgWinAmount : 0);

        $prevAvgWin = $prevTrades->where('outcome', 'Win')->avg('net_profit') ?? 0;
        $prevAvgLoss = abs($prevTrades->where('outcome', 'Loss')->avg('net_profit') ?? 0);
        $prevRrValue = $prevAvgLoss > 0 ? round($prevAvgWin / $prevAvgLoss, 2) : ($prevAvgWin > 0 ? $prevAvgWin : 0);
        $rrDiff = round($rrValue - $prevRrValue, 2);

        $totalHoldings = TradeLog::where('user_id', $userId)->sum('net_profit');

        return response()->json([
            'period' => ucfirst($period),
            'total_holdings' => round($totalHoldings, 2),
            'win_loss_rate' => "{$winLossRate}%",
            'win_loss_diff' => "{$winLossDiff}%",
            'accumulated_profit' => number_format($currentProfit, 2),
            'accumulated_profit_diff' => "{$profitDiff}%",
            'risk_reward_ratio' => $rrValue > 0 ? "1:{$rrValue}" : "0:0",
            'risk_reward_diff' => ($rrDiff >= 0 ? '+' : '') . "{$rrDiff}",
            'avg_trading_time' => "{$avgHours}h {$avgMinutes}m",
            'avg_trading_time_diff' => ($avgDiff >= 0 ? '+' : '') . abs($avgDiff) . 'm',
        ]);
    }

    public function getMostProfitableAssets(Request $request)
    {
        $userId = auth()->id();
        $period = $request->query('period', 'daily');
        $query = TradeLog::where('user_id', $userId);

        switch ($period) {
            case 'daily':
                $query->whereDate('date_of_operation', today());
                break;
            case 'weekly':
                $query->whereBetween('date_of_operation', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'monthly':
                $query->whereMonth('date_of_operation', now()->month)->whereYear('date_of_operation', now()->year);
                break;
            case 'yearly':
                $query->whereYear('date_of_operation', now()->year);
                break;
            case 'custom':
                if ($request->has('start_date') && $request->has('end_date')) {
                    $query->whereBetween('date_of_operation', [$request->start_date, $request->end_date]);
                }
                break;
        }

        $stats = $query->select(
            'financial_instrument as asset',
            DB::raw('SUM(net_profit) as total_profit'),
            DB::raw('COUNT(*) as trades'),
            DB::raw('SUM(CASE WHEN net_profit > 0 THEN 1 ELSE 0 END) * 100 / COUNT(*) as win_rate')
        )
            ->groupBy('financial_instrument')
            ->orderByDesc('total_profit')
            ->get();

        $data = $stats->map(function ($item) {
            return [
                'asset' => $item->asset,
                'profit' => $item->total_profit,
                'trades' => $item->trades,
                'win_rate' => round($item->win_rate, 1),
                'trend' => $item->total_profit >= 0 ? 'up' : 'down',
            ];
        });

        return response()->json(['status' => 'success', 'data' => $data]);
    }

    // 5. Analytics & Patterns Charts Data
    public function getAnalyticsCharts(Request $request)
    {
        $userId = \Illuminate\Support\Facades\Auth::id();
        $period = $request->query('period', 'daily');

        $currentQuery = \App\Models\TradeLog::where('user_id', $userId);
        $previousQuery = \App\Models\TradeLog::where('user_id', $userId);

        // 🔴 Date Logic for Current & Previous Period
        $now = now();
        if ($period === 'daily') {
            $currentQuery->whereDate('date_of_operation', $now->toDateString());
            $previousQuery->whereDate('date_of_operation', $now->copy()->subDay()->toDateString());
        } elseif ($period === 'weekly') {
            $currentQuery->whereBetween('date_of_operation', [$now->copy()->startOfWeek(), $now->copy()->endOfWeek()]);
            $previousQuery->whereBetween('date_of_operation', [$now->copy()->subWeek()->startOfWeek(), $now->copy()->subWeek()->endOfWeek()]);
        } elseif ($period === 'monthly') {
            $currentQuery->whereMonth('date_of_operation', $now->month)->whereYear('date_of_operation', $now->year);
            $previousQuery->whereMonth('date_of_operation', $now->copy()->subMonth()->month)->whereYear('date_of_operation', $now->copy()->subMonth()->year);
        } elseif ($period === 'yearly') {
            $currentQuery->whereYear('date_of_operation', $now->year);
            $previousQuery->whereYear('date_of_operation', $now->copy()->subYear()->year);
        } elseif ($period === 'custom' && $request->has('start_date') && $request->has('end_date')) {
            $start = \Carbon\Carbon::parse($request->start_date);
            $end = \Carbon\Carbon::parse($request->end_date);
            $diffDays = $start->diffInDays($end) + 1;

            $currentQuery->whereBetween('date_of_operation', [$start->toDateString(), $end->toDateString()]);
            $previousQuery->whereBetween('date_of_operation', [
                $start->copy()->subDays($diffDays)->toDateString(),
                $end->copy()->subDays($diffDays)->toDateString()
            ]);
        }

        $currentTrades = $currentQuery->orderBy('date_of_operation', 'asc')->orderBy('entry_time', 'asc')->get();
        $previousTrades = $previousQuery->get();

        // 🔴 Metric Calculation Helper Function
        $calculateMetrics = function ($trades) {
            $totalTrades = $trades->count();
            if ($totalTrades === 0) {
                return ['win_rate' => 0, 'risk_reward' => 0, 'profit_factor' => 0, 'avg_duration' => 0, 'consistency' => 0, 'discipline' => 0, 'radar' => [0, 0, 0, 0, 0, 0], 'early_exits' => 0, 'high_lev' => 0, 'early_loss' => 0, 'high_lev_loss' => 0];
            }

            $wins = $trades->where('net_profit', '>=', 0);
            $losses = $trades->where('net_profit', '<', 0);

            // 1. Win Rate
            $winRate = round(($wins->count() / $totalTrades) * 100);

            // 2. Risk/Reward & Profit Factor
            $grossWin = $wins->sum('net_profit') ?: 0;
            $grossLoss = abs($losses->sum('net_profit')) ?: 1;
            $profitFactor = round($grossWin / $grossLoss, 2);

            $avgWin = $wins->count() > 0 ? ($grossWin / $wins->count()) : 0;
            $avgLoss = $losses->count() > 0 ? ($grossLoss / $losses->count()) : 1;
            $actualRR = round($avgWin / $avgLoss, 2);

            // 3. Avg Duration & Early Exits (Under 15 mins)
            $totalMins = 0;
            $validDurations = 0;
            $earlyExits = 0;
            $earlyLoss = 0;
            foreach ($trades as $t) {
                if ($t->entry_time && $t->exit_time) {
                    $entry = \Carbon\Carbon::parse($t->entry_time);
                    $exit = \Carbon\Carbon::parse($t->exit_time);
                    if ($exit->lessThan($entry)) $exit->addDay(); // Handle overnight trades

                    $mins = $entry->diffInMinutes($exit);
                    $totalMins += $mins;
                    $validDurations++;

                    if ($mins < 15 && $t->net_profit < 0) {
                        $earlyExits++;
                        $earlyLoss += abs($t->net_profit);
                    }
                }
            }
            $avgDuration = $validDurations > 0 ? round($totalMins / $validDurations) : 0;

            // 4. Consistency (Profitable Days Ratio)
            $tradesByDay = $trades->groupBy('date_of_operation');
            $profitableDays = 0;
            foreach ($tradesByDay as $dayTrades) {
                if ($dayTrades->sum('net_profit') >= 0) $profitableDays++;
            }
            $consistency = $tradesByDay->count() > 0 ? round(($profitableDays / $tradesByDay->count()) * 100) : 0;

            // 5. Discipline Penalty Logic
            $discipline = 100;
            $avgLot = $trades->avg('lot_size') ?: 1;
            $highLev = 0;
            $highLevLoss = 0;

            foreach ($trades as $t) {
                if ($t->lot_size > ($avgLot * 1.5)) {
                    $discipline -= 5; // Penalty for over-leveraging
                    if ($t->net_profit < 0) {
                        $highLev++;
                        $highLevLoss += abs($t->net_profit);
                    }
                }
            }
            if ($avgLoss > $avgWin) $discipline -= 15; // Penalty for poor RR
            $discipline -= ($earlyExits * 2); // Penalty for impatient exits
            $discipline = max(0, min(100, $discipline));

            // Radar Chart Scale normalizers (0-100)
            $rrScore = min(100, $actualRR * 40); // 1:2.5 RR = 100 score
            $pfScore = min(100, $profitFactor * 33); // 3.0 PF = 100 score
            $durScore = min(100, $avgDuration * 1.5);

            return [
                'win_rate' => $winRate,
                'risk_reward' => $actualRR,
                'profit_factor' => $profitFactor,
                'avg_duration' => $avgDuration,
                'consistency' => $consistency,
                'discipline' => $discipline,
                'radar' => [$winRate, $rrScore, $pfScore, $durScore, $consistency, $discipline],
                'early_exits' => $earlyExits,
                'early_loss' => $earlyLoss,
                'high_lev' => $highLev,
                'high_lev_loss' => $highLevLoss
            ];
        };

        // Execute calculations
        $currStats = $calculateMetrics($currentTrades);
        $prevStats = $calculateMetrics($previousTrades);

        // 🔴 1. Candlestick Data
        $candlestickData = [];
        $currentBalance = 0;
        $tradesByDate = $currentTrades->groupBy('date_of_operation');
        foreach ($tradesByDate as $date => $dayTrades) {
            $open = $currentBalance;
            $high = $currentBalance;
            $low = $currentBalance;
            $close = $currentBalance;
            foreach ($dayTrades as $trade) {
                $close += $trade->net_profit;
                if ($close > $high) $high = $close;
                if ($close < $low) $low = $close;
            }
            $high = max($open, $close, $high);
            $low = min($open, $close, $low);
            $candlestickData[] = ['x' => \Carbon\Carbon::parse($date)->format('M d'), 'y' => [round($open, 2), round($high, 2), round($low, 2), round($close, 2)]];
            $currentBalance = $close;
        }

        // 🔴 2. Asset Performance
        $assetsData = (clone $currentQuery)->select('financial_instrument')
            ->selectRaw('SUM(CASE WHEN net_profit >= 0 THEN net_profit ELSE 0 END) as positive_profit')
            ->selectRaw('SUM(CASE WHEN net_profit < 0 THEN net_profit ELSE 0 END) as negative_profit')
            ->groupBy('financial_instrument')
            ->orderByRaw('(SUM(CASE WHEN net_profit >= 0 THEN net_profit ELSE 0 END) + ABS(SUM(CASE WHEN net_profit < 0 THEN net_profit ELSE 0 END))) DESC')
            ->take(10)->get();
        $assetCategories = [];
        $positiveData = [];
        $negativeData = [];
        foreach ($assetsData as $item) {
            $assetCategories[] = explode('/', $item->financial_instrument)[0];
            $positiveData[] = round($item->positive_profit, 2);
            $negativeData[] = round($item->negative_profit, 2);
        }

        // 🔴 3. Trade Outcomes
        $outcomeCounts = clone $currentTrades;
        $winCount = $outcomeCounts->whereIn('outcome', ['Win', 'Profit'])->count();
        $lossCount = $outcomeCounts->where('outcome', 'Loss')->count();
        $breakCount = $outcomeCounts->where('outcome', 'Breakeven')->count();

        // 🔴 4. Heatmap Data
        $heatmapData = [];
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach ($daysOfWeek as $day) {
            $heatmapData[$day] = array_fill(0, 12, 0);
        }
        $heatmapGroups = [];
        foreach ($currentTrades as $trade) {
            $dayName = \Carbon\Carbon::parse($trade->date_of_operation)->format('l');
            if (in_array($dayName, $daysOfWeek) && $trade->entry_time) {
                $hour = (int)\Carbon\Carbon::parse($trade->entry_time)->format('H');
                $slotIndex = floor($hour / 2);
                if (!isset($heatmapGroups[$dayName][$slotIndex])) {
                    $heatmapGroups[$dayName][$slotIndex] = ['win' => 0, 'total' => 0];
                }
                $heatmapGroups[$dayName][$slotIndex]['total']++;
                if (in_array(ucfirst(strtolower($trade->outcome)), ['Win', 'Profit']) || $trade->net_profit > 0) {
                    $heatmapGroups[$dayName][$slotIndex]['win']++;
                }
            }
        }
        foreach ($daysOfWeek as $day) {
            for ($i = 0; $i < 12; $i++) {
                if (isset($heatmapGroups[$day][$i]) && $heatmapGroups[$day][$i]['total'] > 0) {
                    $heatmapData[$day][$i] = round(($heatmapGroups[$day][$i]['win'] / $heatmapGroups[$day][$i]['total']) * 100);
                }
            }
        }

        // 🔴 5. Radar Chart Data Prep
        $radarData = [
            'current' => $currStats['radar'],
            'previous' => $prevStats['radar'],
            'stats' => [
                'win_rate' => ['current' => $currStats['win_rate'], 'previous' => $prevStats['win_rate']],
                'risk_reward' => ['current' => $currStats['risk_reward'], 'previous' => $prevStats['risk_reward']],
                'profit_factor' => ['current' => $currStats['profit_factor'], 'previous' => $prevStats['profit_factor']],
                'avg_duration' => ['current' => $currStats['avg_duration'], 'previous' => $prevStats['avg_duration']],
                'consistency' => ['current' => $currStats['consistency'], 'previous' => $prevStats['consistency']],
                'discipline' => ['current' => $currStats['discipline'], 'previous' => $prevStats['discipline']],
            ]
        ];

        // 🔴 6. Dynamic Insights Generation
        $insights = [];
        if ($currStats['win_rate'] >= 55) {
            $insights[] = ['title' => 'Solid Win Rate', 'desc' => "Your win rate is {$currStats['win_rate']}%. Keep following your current strategy and maintaining discipline.", 'icon' => 'fa-circle-check'];
        } else {
            $insights[] = ['title' => 'Review Trade Setups', 'desc' => "Your win rate is {$currStats['win_rate']}%. Focus on high-probability setups rather than quantity.", 'icon' => 'fa-triangle-exclamation'];
        }

        if ($currStats['discipline'] < 70) {
            $insights[] = ['title' => 'Improve Discipline', 'desc' => "Your discipline score dropped to {$currStats['discipline']}. Stick to your lot size limits and avoid revenge trading.", 'icon' => 'fa-shield-halved'];
        } else {
            $insights[] = ['title' => 'Excellent Risk Control', 'desc' => "You are maintaining good discipline ({$currStats['discipline']} Score). Keep your lot sizes consistent.", 'icon' => 'fa-lock'];
        }

        // 🔴 7. Dynamic Recurring Errors Generation
        $errors = [];
        $totalProfitAbsolute = max(1, abs($currentTrades->sum('net_profit')));

        if ($currStats['early_exits'] > 0) {
            $impactPct = round(($currStats['early_loss'] / $totalProfitAbsolute) * 100);
            $errors[] = ['type' => 'Premature Exits (< 15m)', 'occurrences' => $currStats['early_exits'], 'impact' => 'Lost ~$' . number_format($currStats['early_loss'], 2), 'improvement' => '+ ' . $impactPct . '%'];
        }
        if ($currStats['high_lev'] > 0) {
            $impactPct = round(($currStats['high_lev_loss'] / $totalProfitAbsolute) * 100);
            $errors[] = ['type' => 'Over-leveraging (High Lot)', 'occurrences' => $currStats['high_lev'], 'impact' => 'Lost ~$' . number_format($currStats['high_lev_loss'], 2), 'improvement' => '+ ' . $impactPct . '%'];
        }
        if (empty($errors) && $currentTrades->count() > 0) {
            $errors[] = ['type' => 'No major errors detected', 'occurrences' => '-', 'impact' => 'Excellent execution!', 'improvement' => '-'];
        } elseif (empty($errors)) {
            $errors[] = ['type' => 'Not enough data to analyze', 'occurrences' => '-', 'impact' => '-', 'improvement' => '-'];
        }

        return response()->json([
            'candlestickData' => $candlestickData,
            'assetPerformance' => ['categories' => $assetCategories, 'positive' => $positiveData, 'negative' => $negativeData],
            'outcomes' => ['Win' => $winCount, 'Loss' => $lossCount, 'Breakeven' => $breakCount],
            'heatmapData' => $heatmapData,
            'radarData' => $radarData,
            'insights' => $insights,
            'errors' => $errors
        ]);
    }
}
