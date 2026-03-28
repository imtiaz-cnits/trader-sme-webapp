@extends('layout.dashboard-sidenav')
@section('title', 'Copy Trader | Traders SME')

@section('content')
<link rel="stylesheet" href="{{ asset('back-end/assets/css/sidebar.css?v=1.0') }}">

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main class="container-fluid px-md-4 editor-wrapper">
    <div class="d-flex flex-column flex-xl-row align-items-start w-100" id="copytrader-wrapper">

        <!-- Sidebar Start -->
        <div class="chronology-sidebar pt-4" id="copyTraderSidebar">
            <div class="d-flex justify-content-between align-items-center d-xl-none mb-4 px-2">
                <h5 class="m-0 fw-bold dashboard-title" style="color: var(--text);">Copy Trader</h5>
                <button class="btn-close shadow-none" id="mobileSidebarClose" style="filter: var(--invert-icon);"></button>
            </div>

            <div class="mb-4">
                <h6 class="mb-2 ps-2" style="color: var(--text3); font-size: 12px; font-weight: 700; text-transform: uppercase;">Menu</h6>

                <a href="#" class="sidebar-menu-item mb-2 active" data-target="tab-overview">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span class="text-truncate">Overview</span>
                </a>
                <a href="#" class="sidebar-menu-item mb-2" data-target="tab-discover">
                    <i class="fa-solid fa-compass"></i>
                    <span class="text-truncate">Discover Masters</span>
                </a>
                <a href="#" class="sidebar-menu-item mb-2" data-target="tab-connections">
                    <i class="fa-solid fa-link"></i>
                    <span class="text-truncate">Active Connections</span>
                </a>
                <a href="#" class="sidebar-menu-item mb-2" data-target="tab-history">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span class="text-truncate">Trade History</span>
                </a>
                <a href="#" class="sidebar-menu-item mb-2" data-target="tab-risk">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span class="text-truncate">Risk Config</span>
                </a>
            </div>
        </div>
        <!-- Sidebar End -->

        <div class="flex-grow-1 editor-main-area pt-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn shadow-none d-xl-none px-2 py-1" id="mobileSidebarToggle" style="border: 1px solid var(--border); color: var(--text); background: var(--bg-color);">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div>
                        <h2 class="dashboard-title m-0" id="main-page-title" style="font-size: 24px; font-weight: 700;">Portfolio Overview</h2>
                        <p style="color: var(--text3); font-size: 14px; margin-bottom: 0;" id="main-page-desc">Manage your active copy trading portfolio.</p>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn d-flex align-items-center gap-2" style="padding: 8px 20px; border-radius: 8px; font-size: 14px; font-weight: 500; background: transparent; color: var(--text); border: 1px solid var(--border); transition: 0.3s;">
                        <i class="fa-solid fa-gear"></i> Config
                    </button>
                    <button class="btn d-flex align-items-center gap-2" style="background-color: var(--accent); color: var(--text7); border: none; padding: 8px 20px; border-radius: 8px; font-size: 14px; font-weight: 500; transition: 0.3s;">
                        <i class="fa-solid fa-play"></i> System Active
                    </button>
                </div>
            </div>

            <!-- Overview Tab Start -->
            <div id="tab-overview" class="tab-pane-custom">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch">
                        <div class="card-item w-100 mt-0"
                            style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px; padding: 20px;">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 style="font-size: 16px; font-weight: 600; color: var(--text); margin: 0;">Master Account</h3>
                                <span
                                    style="background: var(--accent2); color: var(--accent); padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; border: 1px solid var(--accent);">LIVE</span>
                            </div>
                            <div>
                                <p style="font-size: 20px; font-weight: bold; color: var(--text); margin: 0;">Alpha Main</p>
                                <p style="font-size: 14px; color: var(--text3); margin: 0;">Broker: FTMO • #882910</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch">
                        <div class="card-item w-100 mt-0"
                            style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px; padding: 20px;">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 style="font-size: 16px; font-weight: 600; color: var(--text); margin: 0;">Total Balance</h3>
                                <span><i class="fa-solid fa-wallet" style="color: var(--text3); font-size: 18px;"></i></span>
                            </div>
                            <div>
                                <p style="font-size: 20px; font-weight: bold; color: var(--text); margin: 0;">${{
                        number_format(100000 + $totalInvested + $totalNetProfit, 2) }}</p>
                                <p style="font-size: 14px; color: var(--accent); margin: 0; font-weight: 500;">{{ $totalNetProfit >=
                        0 ? '+' : '' }} ${{ number_format($totalNetProfit, 2) }} Total P/L</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch">
                        <div class="card-item w-100 mt-0"
                            style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px; padding: 20px;">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 style="font-size: 16px; font-weight: 600; color: var(--text); margin: 0;">Broadcast Status</h3>
                                <span><i class="fa-solid fa-tower-broadcast"
                                        style="color: var(--text3); font-size: 18px;"></i></span>
                            </div>
                            <div>
                                <p style="font-size: 20px; font-weight: bold; color: var(--accent); margin: 0;">Broadcasting</p>
                                <p style="font-size: 14px; color: var(--text3); margin: 0;">Latency: 45ms</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="chart-card"
                            style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px; padding: 20px;">
                            <div class="chart-header mb-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 style="font-size: 16px; font-weight: 600; color: var(--text); margin: 0;">Master Performance
                                    </h2>
                                    <p style="font-size: 14px; color: var(--text3); margin: 4px 0 0;">Growth tracking of the master
                                        account.</p>
                                </div>
                                <div class="chart-pills d-flex gap-1"
                                    style="background: var(--accent2); padding: 4px; border-radius: 8px;">
                                    <a href="#" class="nav-link active"
                                        style="font-size: 12px; font-weight: 500; padding: 4px 12px; border-radius: 6px; background: var(--bg-color); color: var(--text);">24H</a>
                                    <a href="#" class="nav-link"
                                        style="font-size: 12px; font-weight: 500; padding: 4px 12px; border-radius: 6px; color: var(--text3);">7D</a>
                                    <a href="#" class="nav-link"
                                        style="font-size: 12px; font-weight: 500; padding: 4px 12px; border-radius: 6px; color: var(--text3);">1M</a>
                                </div>
                            </div>
                            <div style="height: 250px; width: 100%;">
                                <canvas id="copyTraderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="trends-table mt-4">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h3 class="title mb-0" style="font-size: 16px; font-weight: 600; color: var(--text);">Connected Accounts
                            (Followers)</h3>
                        <button class="btn d-flex align-items-center gap-2"
                            style="padding: 6px 14px; border-radius: 8px; font-size: 13px; font-weight: 500; background: transparent; color: var(--text); border: 1px solid var(--border); transition: 0.3s;">
                            <i class="fa-solid fa-plus"></i> Link New Account
                        </button>
                    </div>

                    <div class="table-responsive" style="border: 1px solid var(--border); border-radius: 8px;">
                        <table class="table table-hover table-custom align-middle mb-0" style="background: var(--bg-color);">
                            <thead style="border-bottom: 1px solid var(--border);">
                                <tr>
                                    <th style="width: 20px"><input class="form-check-input" type="checkbox" /></th>
                                    <th class="text-start" style="color: var(--text3); font-weight: 500; font-size: 13px;">Account
                                        Name</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Broker</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Balance</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Multiplier</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Status</th>
                                    <th class="text-end" style="color: var(--text3); font-weight: 500; font-size: 13px;">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activeConnections as $connection)
                                <tr style="border-bottom: 1px solid var(--border);">
                                    <td><input class="form-check-input" type="checkbox" /></td>
                                    <td class="text-start fw-bold" style="color: var(--text);">{{ $connection->master->name ?? 'Auto
                            Sync' }} Follower</td>
                                    <td style="color: var(--text2);">MyForexFunds</td>
                                    <td style="font-weight: 600; color: var(--text);">${{
                            number_format($connection->invested_amount, 2) }}</td>
                                    <td><span
                                            style="background: var(--accent2); border: 1px solid var(--border); padding: 4px 8px; border-radius: 6px; font-size: 12px; color: var(--text2);">{{
                                $connection->multiplier }}</span></td>
                                    <td>
                                        @if($connection->status === 'active')
                                        <span
                                            style="background: var(--accent2); color: var(--accent); padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 500; border: 1px solid var(--border);">Active</span>
                                        @else
                                        <span
                                            style="background: rgba(245, 158, 11, 0.1); color: #f59e0b; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 500; border: 1px solid rgba(245, 158, 11, 0.2);">Paused</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <button onclick="toggleStatus({{ $connection->id }})" class="btn p-1 px-2 border shadow-none" style="font-size: 12px; background: var(--bg-color); color: var(--text2);" title="Pause/Play">
                                            <i class="fa-solid fa-{{ $connection->status === 'active' ? 'pause' : 'play' }}"></i>
                                        </button>
                                        <button onclick="openEditModal({{ $connection->id }}, {{ $connection->invested_amount }}, '{{ $connection->multiplier }}')" class="btn p-1 px-2 border shadow-none ms-1" style="font-size: 12px; background: var(--bg-color); color: var(--text2);" title="Settings">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No connected accounts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="trends-table mt-5 mb-5">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h3 class="title mb-0" style="font-size: 16px; font-weight: 600; color: var(--text);">Active Open Positions
                        </h3>
                        <span style="font-size: 12px; color: var(--text3);"><i class="fa-solid fa-circle-notch fa-spin me-1"></i>
                            Live Updating</span>
                    </div>

                    <div class="table-responsive" style="border: 1px solid var(--border); border-radius: 8px;">
                        <table class="table table-hover table-custom align-middle mb-0" style="background: var(--bg-color);">
                            <thead style="border-bottom: 1px solid var(--border);">
                                <tr>
                                    <th class="text-start" style="color: var(--text3); font-weight: 500; font-size: 13px;">Symbol
                                    </th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Type</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Entry Price</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Current Price</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Master Lot</th>
                                    <th style="color: var(--text3); font-weight: 500; font-size: 13px;">Floating P/L</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($openTrades as $trade)
                                <tr style="border-bottom: 1px solid var(--border);">
                                    <td class="text-start fw-bold" style="color: var(--text);">{{ $trade->symbol }}</td>
                                    <td><span
                                            style="color: {{ $trade->type === 'BUY' ? '#10b981' : '#ef4444' }}; font-weight: 600;">{{
                                $trade->type }}</span></td>
                                    <td style="color: var(--text2);">{{ number_format($trade->entry_price, 5) }}</td>
                                    <td style="color: var(--text);">{{ number_format($trade->entry_price + ($trade->type === 'BUY' ?
                            0.00100 : -0.00100), 5) }}</td>
                                    <td style="color: var(--text);">{{ $trade->lot }}</td>
                                    <td><span
                                            style="color: {{ $trade->net_profit >= 0 ? '#10b981' : '#ef4444' }}; font-weight: 600;">{{
                                $trade->net_profit >= 0 ? '+' : '' }}${{ number_format($trade->net_profit, 2) }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No active open positions.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Overview Tab End -->

            <!-- Discover Tab Start -->
            <div id="tab-discover" class="tab-pane-custom d-none">

                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
                    <div class="input-group" style="max-width: 350px; border-radius: 8px; overflow: hidden; border: 1px solid var(--border); background: var(--bg-color);">
                        <span class="input-group-text bg-transparent border-0" style="color: var(--text3);"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" id="searchMasterInput" class="form-control border-0 shadow-none" placeholder="Search masters..." style="background: transparent; color: var(--text); font-size: 14px;">
                    </div>

                    <select id="sortMasterSelect" class="form-select shadow-none" style="width: auto; background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px; font-size: 14px;">
                        <option value="Top Performers">Top Performers</option>
                        <option value="Lowest Risk">Lowest Risk</option>
                        <option value="Most Copiers">Most Copiers</option>
                        <option value="New & Trending">New & Trending</option>
                    </select>
                </div>

                <div class="row g-4 mb-5" id="mastersContainer">
                    @forelse($masterTraders as $master)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="folder-card p-4 h-100 d-flex flex-column justify-content-between" style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px; transition: 0.3s; cursor: pointer;">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($master->name) }}&background={{ $master->avatar_bg_color }}&color=fff" alt="Avatar" style="width: 48px; height: 48px; border-radius: 50%;">
                                        <div>
                                            <h5 class="m-0 fw-bold" style="color: var(--text); font-size: 16px;">{{ $master->name }}
                                                @if($master->is_verified)
                                                <i class="fa-solid fa-circle-check ms-1" style="color: #3b82f6; font-size: 13px;" title="Verified Master"></i>
                                                @endif
                                            </h5>
                                            <span style="font-size: 12px; color: var(--text3);">Since {{ \Carbon\Carbon::parse($master->since_date)->format('M Y') }}</span>
                                        </div>
                                    </div>
                                    <span style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 700;">Risk: {{ $master->risk_score }}/10</span>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-6">
                                        <div class="p-2 rounded text-center" style="background: var(--accent2);">
                                            <p class="m-0" style="font-size: 11px; color: var(--text3); text-transform: uppercase; font-weight: 600;">Monthly ROI</p>
                                            <h4 class="m-0 fw-bold mt-1" style="color: #10b981; font-size: 18px;">+{{ $master->monthly_roi }}%</h4>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 rounded text-center" style="background: var(--accent2);">
                                            <p class="m-0" style="font-size: 11px; color: var(--text3); text-transform: uppercase; font-weight: 600;">Followers</p>
                                            <h4 class="m-0 fw-bold mt-1" style="color: var(--text); font-size: 18px;">{{ number_format($master->followers_count) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3" style="border-top: 1px dashed var(--border);">
                                <span style="font-size: 13px; color: var(--text3); font-weight: 500;">Win Rate: <strong style="color: var(--text);">{{ $master->win_rate }}%</strong></span>
                                <button class="btn btn-sm px-4 fw-bold" onclick="openCopyModal({{ $master->id }}, '{{ addslashes($master->name) }}', '{{ $master->avatar_bg_color }}')" style="background: var(--accent); color: var(--text7); border-radius: 8px; font-size: 13px; border: none; transition: 0.2s;">
                                    Copy Now
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center text-muted py-5">No master traders available.</div>
                    @endforelse
                </div>
            </div>
            <!-- Discover Tab End -->

            <!-- Active Connections Tab Start -->
            <div id="tab-connections" class="tab-pane-custom d-none">

                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
                    <div class="input-group"
                        style="max-width: 300px; border-radius: 8px; overflow: hidden; border: 1px solid var(--border); background: var(--bg-color);">
                        <span class="input-group-text bg-transparent border-0" style="color: var(--text3);"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search masters..."
                            style="background: transparent; color: var(--text); font-size: 14px;">
                    </div>

                    <div class="d-flex gap-2">
                        <span class="badge d-flex align-items-center gap-1"
                            style="background: var(--accent2); color: var(--text2); border: 1px solid var(--border); padding: 8px 12px; font-size: 13px; font-weight: 500;">
                            <i class="fa-solid fa-plug text-success"></i> {{ $activeConnections->where('status', 'active')->count()
                }} Active
                        </span>
                        <span class="badge d-flex align-items-center gap-1"
                            style="background: var(--accent2); color: var(--text2); border: 1px solid var(--border); padding: 8px 12px; font-size: 13px; font-weight: 500;">
                            Total Invested: <strong style="color: var(--text);">${{ number_format($totalInvested, 2) }}</strong>
                        </span>
                    </div>
                </div>

                <div class="trends-table">
                    <div class="table-responsive"
                        style="border: 1px solid var(--border); border-radius: 12px; background: var(--bg-color);">
                        <table class="table table-hover table-custom align-middle mb-0" style="background: transparent;">
                            <thead style="background: var(--accent2); border-bottom: 1px solid var(--border);">
                                <tr>
                                    <th class="text-start py-3 px-4"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Master Trader</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Invested</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Multiplier</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Net Profit</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Status</th>
                                    <th class="text-end py-3 px-4"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activeConnections as $connection)
                                <tr>
                                    <td class="text-start py-3 px-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($connection->master->name ?? 'User') }}&background={{ $connection->master->avatar_bg_color ?? '000' }}&color=fff"
                                                style="width: 36px; height: 36px; border-radius: 50%;">
                                            <div>
                                                <h6 class="m-0 fw-bold" style="color: var(--text); font-size: 14px;">{{
                                        $connection->master->name ?? 'Unknown Master' }}</h6>
                                                <small style="color: var(--text3); font-size: 12px;">Connected: {{
                                        \Carbon\Carbon::parse($connection->created_at)->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3" style="font-weight: 600; color: var(--text); font-size: 14px;">${{
                            number_format($connection->invested_amount, 2) }}</td>
                                    <td class="py-3"><span
                                            style="background: var(--accent2); border: 1px solid var(--border); padding: 4px 8px; border-radius: 6px; font-size: 12px; color: var(--text); font-weight: 500;">{{
                                $connection->multiplier }}</span></td>
                                    <td class="py-3"><span
                                            style="color: {{ $connection->net_profit >= 0 ? '#10b981' : '#ef4444' }}; font-weight: 700; font-size: 14px;">{{
                                $connection->net_profit >= 0 ? '+' : '' }}${{ number_format($connection->net_profit, 2)
                                }}</span></td>
                                    <td class="py-3">
                                        @if($connection->status === 'active')
                                        <span class="d-inline-flex align-items-center gap-1"
                                            style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600; border: 1px solid rgba(16, 185, 129, 0.2);">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                                            Copying
                                        </span>
                                        @else
                                        <span class="d-inline-flex align-items-center gap-1"
                                            style="background: rgba(245, 158, 11, 0.1); color: #f59e0b; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600; border: 1px solid rgba(245, 158, 11, 0.2);">
                                            <i class="fa-solid fa-pause" style="font-size: 10px;"></i> Paused
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-end py-3 px-4">
                                        <button onclick="openEditModal({{ $connection->id }}, {{ $connection->invested_amount }}, '{{ $connection->multiplier }}')" class="btn p-2 border shadow-none" title="Settings" style="font-size: 13px; background: var(--accent2); color: var(--text2); border-radius: 8px;">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>
                                        <button onclick="stopConnection({{ $connection->id }})" class="btn p-2 border shadow-none ms-1 text-danger" title="Stop Copying" style="font-size: 13px; background: var(--accent2); border-radius: 8px;">
                                            <i class="fa-solid fa-stop"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No active connections found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Active Connections Tab End -->

            <!-- Trade History Tab Start -->
            <div id="tab-history" class="tab-pane-custom d-none">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <div class="d-flex flex-wrap gap-2">
                        <div class="px-3 py-2 rounded" style="background: var(--bg-color); border: 1px solid var(--border);">
                            <small style="color: var(--text3); font-size: 11px; font-weight: 600; text-transform: uppercase;">Total
                                Trades</small>
                            <h5 class="m-0 fw-bold" style="color: var(--text); font-size: 16px;">{{ $totalClosed }}</h5>
                        </div>
                        <div class="px-3 py-2 rounded" style="background: var(--bg-color); border: 1px solid var(--border);">
                            <small style="color: var(--text3); font-size: 11px; font-weight: 600; text-transform: uppercase;">Win
                                Rate</small>
                            <h5 class="m-0 fw-bold" style="color: var(--text); font-size: 16px;">{{ $winRate }}%</h5>
                        </div>
                        <div class="px-3 py-2 rounded" style="background: var(--bg-color); border: 1px solid var(--border);">
                            <small style="color: var(--text3); font-size: 11px; font-weight: 600; text-transform: uppercase;">Net
                                P/L</small>
                            <h5 class="m-0 fw-bold"
                                style="color: {{ $totalNetProfit >= 0 ? '#10b981' : '#ef4444' }}; font-size: 16px;">{{
                    $totalNetProfit >= 0 ? '+' : '' }}${{ number_format($totalNetProfit, 2) }}</h5>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <select class="form-select shadow-none"
                            style="width: auto; background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px; font-size: 14px;">
                            <option>Last 7 Days</option>
                            <option>This Month</option>
                            <option>Last 3 Months</option>
                            <option>All Time</option>
                        </select>
                        <button class="btn d-flex align-items-center gap-2"
                            style="padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; background: var(--accent2); color: var(--text); border: 1px solid var(--border); transition: 0.3s;">
                            <i class="fa-solid fa-download"></i> Export
                        </button>
                    </div>
                </div>

                <div class="trends-table">
                    <div class="table-responsive"
                        style="border: 1px solid var(--border); border-radius: 12px; background: var(--bg-color);">
                        <table class="table table-hover table-custom align-middle mb-0" style="background: transparent;">
                            <thead style="background: var(--accent2); border-bottom: 1px solid var(--border);">
                                <tr>
                                    <th class="py-3 px-4 text-start"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Date & Time</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Master</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Symbol</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Type</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Lot</th>
                                    <th class="py-3"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Open / Close</th>
                                    <th class="text-end py-3 px-4"
                                        style="color: var(--text3); font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                        Net P/L</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($closedTrades as $trade)
                                <tr>
                                    <td class="py-3 px-4 text-start">
                                        <span style="color: var(--text); font-weight: 500; font-size: 13px;">{{
                                \Carbon\Carbon::parse($trade->closed_at)->format('M d, Y') }}</span>
                                        <br>
                                        <small style="color: var(--text3); font-size: 11px;">{{
                                \Carbon\Carbon::parse($trade->closed_at)->format('H:i:s') }}</small>
                                    </td>
                                    <td class="py-3">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($trade->master->name ?? 'U') }}&background={{ $trade->master->avatar_bg_color ?? '000' }}&color=fff"
                                                style="width: 24px; height: 24px; border-radius: 50%;">
                                            <span style="color: var(--text); font-size: 13px; font-weight: 500;">{{
                                    $trade->master->name ?? 'Unknown' }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3"><span style="font-weight: 700; color: var(--text); font-size: 13px;">{{
                                $trade->symbol }}</span></td>
                                    <td class="py-3"><span
                                            style="background: {{ $trade->type === 'BUY' ? 'rgba(16, 185, 129, 0.1)' : 'rgba(239, 68, 68, 0.1)' }}; color: {{ $trade->type === 'BUY' ? '#10b981' : '#ef4444' }}; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 700;">{{
                                $trade->type }}</span></td>
                                    <td class="py-3"><span style="color: var(--text); font-size: 13px;">{{ $trade->lot }}</span>
                                    </td>
                                    <td class="py-3">
                                        <span style="color: var(--text); font-size: 12px;">O: {{ number_format($trade->entry_price,
                                5) }}</span><br>
                                        <span style="color: var(--text3); font-size: 12px;">C: {{ number_format($trade->close_price,
                                5) }}</span>
                                    </td>
                                    <td class="text-end py-3 px-4">
                                        <span
                                            style="color: {{ $trade->net_profit >= 0 ? '#10b981' : '#ef4444' }}; font-weight: 700; font-size: 14px;">{{
                                $trade->net_profit >= 0 ? '+' : '' }}${{ number_format($trade->net_profit, 2) }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No closed trades found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Trade History Tab End -->

            <!-- Risk Configuration Tab Start -->
            <div id="tab-risk" class="tab-pane-custom d-none">
                <form id="riskConfigForm">
                    <div class="row">
                        <div class="col-12 col-xl-10">
                            <div class="settings-container" style="background: transparent; padding-bottom: 0;">
                                <div class="content-area">

                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <i class="fa-solid fa-globe text-primary" style="font-size: 18px;"></i>
                                        <div class="header m-0" style="font-size: 18px; color: var(--text);">Global Risk Parameters</div>
                                    </div>
                                    <div class="card-item p-4 mb-4" style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px;">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="toggle" style="border-color: var(--border); background: var(--bg-color);">
                                                    <h4 style="color: var(--text);">Force Exit on Drawdown</h4>
                                                    <label class="switch mb-0">
                                                        <input type="checkbox" id="risk_force_exit" {{ $riskConfig->force_exit_drawdown ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="toggle" style="border-color: var(--border); background: var(--bg-color);">
                                                    <h4 style="color: var(--text);">Slippage Protection</h4>
                                                    <label class="switch mb-0">
                                                        <input type="checkbox" id="risk_slippage" {{ $riskConfig->slippage_protection ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="toggle" style="border-color: var(--border); background: var(--bg-color);">
                                                    <h4 style="color: var(--text);">Copy SL / TP</h4>
                                                    <label class="switch mb-0">
                                                        <input type="checkbox" id="risk_copy_sl_tp" {{ $riskConfig->copy_sl_tp ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="toggle" style="border-color: var(--border); background: var(--bg-color);">
                                                    <h4 style="color: var(--text);">Weekend Protection</h4>
                                                    <label class="switch mb-0">
                                                        <input type="checkbox" id="risk_weekend" {{ $riskConfig->weekend_protection ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center gap-2 mb-3 mt-5">
                                        <i class="fa-solid fa-sliders text-warning" style="font-size: 18px;"></i>
                                        <div class="header m-0" style="font-size: 18px; color: var(--text);">Advanced Limits</div>
                                    </div>
                                    <div class="card-item p-4" style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px;">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label class="form-label" style="font-size: 13px; font-weight: 600; color: var(--text);">Max Daily Loss ($)</label>
                                                <input type="number" id="risk_max_loss" class="form-control shadow-none" value="{{ $riskConfig->max_daily_loss }}" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px;">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="font-size: 13px; font-weight: 600; color: var(--text);">Max Open Positions</label>
                                                <input type="number" id="risk_max_positions" class="form-control shadow-none" value="{{ $riskConfig->max_open_positions }}" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px;">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mt-4 pt-3" style="border-top: 1px solid var(--border);">
                                            <button type="submit" id="saveRiskBtn" class="btn px-4 fw-bold" style="background: var(--accent); color: var(--text7); border-radius: 8px; font-size: 14px; border: none; transition: 0.3s;">Save Configuration</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Risk Configuration Tab End -->

        </div>
    </div>

    <!-- Copy Trade Modal Start -->
    <div class="modal fade" id="copySettingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold" style="color: var(--text); font-size: 18px;">Copy Settings</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon);"></button>
                </div>

                <form id="copyTraderForm">
                    <div class="modal-body px-4 py-4">
                        <input type="hidden" id="modal_master_id">

                        <div class="d-flex align-items-center gap-3 mb-4 p-3 rounded" style="background: var(--accent2); border: 1px solid var(--border);">
                            <img src="" id="modalMasterAvatar" style="width: 40px; height: 40px; border-radius: 50%;">
                            <div>
                                <h6 class="m-0 fw-bold" id="modalMasterName" style="color: var(--text);">Master Name</h6>
                                <span style="font-size: 12px; color: var(--text3);">Setting up copy parameters</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size: 13px; color: var(--text);">Investment Amount ($)</label>
                            <input type="number" id="modal_invested_amount" class="form-control shadow-none" placeholder="e.g. 500" required style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px; font-size: 14px; padding: 10px 15px;">
                            <small style="color: var(--text3); font-size: 11px;">Available Balance: <strong style="color: var(--text);">$102,450.00</strong></small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size: 13px; color: var(--text);">Lot Multiplier</label>
                            <select id="modal_multiplier" class="form-select shadow-none" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px; font-size: 14px; padding: 10px 15px;">
                                <option value="1.0x (Proportional)">Proportional (Recommended)</option>
                                <option value="0.5x (Half Risk)">Half Risk (0.5x)</option>
                                <option value="2.0x (Double Risk)">Double Risk (2.0x)</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer border-0 pt-0 px-4 pb-4 flex-nowrap">
                        <button type="button" class="btn w-50 py-2 fw-bold" data-bs-dismiss="modal" style="border: 1px solid var(--border); color: var(--text); background: transparent; border-radius: 8px;">Cancel</button>
                        <button type="submit" class="btn w-50 py-2 fw-bold" id="confirmCopyBtn" style="background: var(--accent); color: var(--text7); border-radius: 8px; transition: 0.3s; border: none;">Confirm Copy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Copy Trade Modal End -->

    <!-- Edit Connection Modal Start -->
    <div class="modal fade" id="editConnectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold" style="color: var(--text); font-size: 18px;">Update Copy Settings</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon);"></button>
                </div>

                <form id="editConnectionForm">
                    <div class="modal-body px-4 py-4">
                        <input type="hidden" id="edit_connection_id">

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size: 13px; color: var(--text);">Update Investment Amount ($)</label>
                            <input type="number" id="edit_invested_amount" class="form-control shadow-none" required style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px; font-size: 14px; padding: 10px 15px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size: 13px; color: var(--text);">Update Lot Multiplier</label>
                            <select id="edit_multiplier" class="form-select shadow-none" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); border-radius: 8px; font-size: 14px; padding: 10px 15px;">
                                <option value="1.0x (Proportional)">Proportional (Recommended)</option>
                                <option value="0.5x (Half Risk)">Half Risk (0.5x)</option>
                                <option value="2.0x (Double Risk)">Double Risk (2.0x)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 px-4 pb-4 flex-nowrap">
                        <button type="button" class="btn w-50 py-2 fw-bold" data-bs-dismiss="modal" style="border: 1px solid var(--border); color: var(--text); background: transparent; border-radius: 8px;">Cancel</button>
                        <button type="submit" class="btn w-50 py-2 fw-bold" id="confirmEditBtn" style="background: var(--accent); color: var(--text7); border-radius: 8px; transition: 0.3s; border: none;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Connection Modal End -->
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // 🌟 Mobile Sidebar Script 🌟
        const sidebar = document.getElementById('copyTraderSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('mobileSidebarToggle');
        const closeBtn = document.getElementById('mobileSidebarClose');

        if (toggleBtn && closeBtn && sidebar && overlay) {
            const openSidebar = () => {
                sidebar.classList.add('show-mobile');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            };
            const closeSidebar = () => {
                sidebar.classList.remove('show-mobile');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            };

            toggleBtn.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);
        }

        // 🌟 JS Tab Switcher Logic 🌟
        const sidebarItems = document.querySelectorAll('.sidebar-menu-item');
        const tabs = document.querySelectorAll('.tab-pane-custom');
        const mainTitle = document.getElementById('main-page-title');
        const mainDesc = document.getElementById('main-page-desc');

        sidebarItems.forEach(item => {
            item.addEventListener('click', function(e) {
                const target = this.getAttribute('data-target');
                if (!target) return; // Ignore links without data-target
                e.preventDefault();

                // 1. Remove active class from all, add to clicked
                sidebarItems.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');

                // 2. Dynamic Header Update
                if (target === 'tab-overview') {
                    mainTitle.innerText = "Portfolio Overview";
                    mainDesc.innerText = "Manage your active copy trading portfolio.";
                } else if (target === 'tab-discover') {
                    mainTitle.innerText = "Discover Masters";
                    mainDesc.innerText = "Find and copy the best performing strategies.";
                } else if (target === 'tab-connections') {
                    mainTitle.innerText = "Active Connections";
                    mainDesc.innerText = "Monitor and manage your ongoing copy trading connections.";
                } else if (target === 'tab-history') {
                    mainTitle.innerText = "Trade History";
                    mainDesc.innerText = "Review your past copy trading performance and closed positions.";
                } else if (target === 'tab-risk') {
                    mainTitle.innerText = "Risk Configuration";
                    mainDesc.innerText = "Set your risk parameters and safety limits for copy trading.";
                }

                // 3. Show target Tab and hide others
                tabs.forEach(tab => {
                    tab.classList.add('d-none');
                    if (tab.id === target) {
                        tab.classList.remove('d-none');
                    }
                });
            });
        });

        // 🌟 Dynamic Chart Logic for Dark/Light Mode 🌟
        const canvas = document.getElementById('copyTraderChart');
        if (canvas) {
            const ctx = canvas.getContext('2d');

            const dynamicLabels = @json($chartLabels);
            const dynamicData = @json($chartData);

            // Read CSS Variables from DOM
            const style = getComputedStyle(document.body);
            const accentColor = style.getPropertyValue('--accent').trim() || '#1d5053';
            const borderColor = style.getPropertyValue('--border').trim() || '#e4e4e7';
            const text3Color = style.getPropertyValue('--text3').trim() || '#858d9d';

            // Create gradient
            let gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, accentColor + '40'); // opacity
            gradient.addColorStop(1, accentColor + '00');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dynamicLabels, // 🌟 Updated
                    datasets: [{
                        label: 'Account Equity',
                        data: dynamicData, // 🌟 Updated
                        borderColor: accentColor,
                        backgroundColor: gradient,
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: accentColor,
                        pointBorderColor: '#fff',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        // 🌟 টুলটিপে $ সাইন দেখানোর জন্য 🌟
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' Balance: $' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: borderColor
                            },
                            ticks: {
                                color: text3Color,
                                font: {
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: text3Color,
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        }
    });

    // ==========================================
    // 🔥 Dynamic Modal Trigger Logic 🔥
    // ==========================================
    function openCopyModal(id, masterName, bgColor) {
        document.getElementById('modal_master_id').value = id;
        document.getElementById('modalMasterName').innerText = masterName;
        document.getElementById('modalMasterAvatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(masterName)}&background=${bgColor}&color=fff`;

        var myModal = new bootstrap.Modal(document.getElementById('copySettingsModal'));
        myModal.show();
    }

    // ==========================================
    // 🔥 Confirm Copy Submit Action (AJAX) 🔥
    // ==========================================
    document.getElementById('copyTraderForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const btn = document.getElementById('confirmCopyBtn');
        const originalText = btn.innerText;

        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
        btn.disabled = true;

        const data = {
            master_id: document.getElementById('modal_master_id').value,
            invested_amount: document.getElementById('modal_invested_amount').value,
            multiplier: document.getElementById('modal_multiplier').value,
            _token: "{{ csrf_token() }}"
        };

        try {
            const response = await axios.post("{{ route('copy-trader.connect') }}", data);
            if (response.data.success) {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Connected Successfully!';
                btn.classList.add('bg-success');

                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        } catch (error) {
            alert('Failed to connect to Master Trader.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    });

    // ==========================================
    // 🔥 Risk Config Submit Action (AJAX) 🔥
    // ==========================================
    document.getElementById('riskConfigForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const btn = document.getElementById('saveRiskBtn');
        const originalText = btn.innerText;

        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
        btn.disabled = true;

        const data = {
            force_exit_drawdown: document.getElementById('risk_force_exit').checked,
            slippage_protection: document.getElementById('risk_slippage').checked,
            copy_sl_tp: document.getElementById('risk_copy_sl_tp').checked,
            weekend_protection: document.getElementById('risk_weekend').checked,
            max_daily_loss: document.getElementById('risk_max_loss').value,
            max_open_positions: document.getElementById('risk_max_positions').value,
            _token: "{{ csrf_token() }}"
        };

        try {
            const response = await axios.post("{{ route('copy-trader.risk.update') }}", data);
            if (response.data.success) {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Saved!';
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }, 2000);
            }
        } catch (error) {
            alert('Failed to save settings.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    });

    // ==========================================
    // 🔥 Toggle Status (Pause/Play) Action 🔥
    // ==========================================
    async function toggleStatus(id) {
        try {
            const response = await axios.post(`/copy-trader/connection/${id}/toggle`, {
                _token: "{{ csrf_token() }}"
            });
            if (response.data.success) {
                window.location.reload();
            }
        } catch (error) {
            alert('Failed to update status.');
        }
    }

    // ==========================================
    // 🔥 Open Edit Modal 🔥
    // ==========================================
    function openEditModal(id, amount, multiplier) {
        document.getElementById('edit_connection_id').value = id;
        document.getElementById('edit_invested_amount').value = amount;
        document.getElementById('edit_multiplier').value = multiplier;

        var editModal = new bootstrap.Modal(document.getElementById('editConnectionModal'));
        editModal.show();
    }

    // ==========================================
    // 🔥 Submit Edit Form (AJAX) 🔥
    // ==========================================
    document.getElementById('editConnectionForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        const btn = document.getElementById('confirmEditBtn');
        const originalText = btn.innerText;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
        btn.disabled = true;

        const id = document.getElementById('edit_connection_id').value;
        const data = {
            invested_amount: document.getElementById('edit_invested_amount').value,
            multiplier: document.getElementById('edit_multiplier').value,
            _token: "{{ csrf_token() }}"
        };

        try {
            const response = await axios.post(`/copy-trader/connection/${id}/update`, data);
            if (response.data.success) {
                window.location.reload();
            }
        } catch (error) {
            alert('Failed to update connection.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    });

    // ==========================================
    // 🔥 Stop / Delete Connection 🔥
    // ==========================================
    async function stopConnection(id) {
        if (confirm('Are you sure you want to stop copying this master? This action cannot be undone.')) {
            try {
                const response = await axios.delete(`/copy-trader/connection/${id}`, {
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                });
                if (response.data.success) {
                    window.location.reload();
                }
            } catch (error) {
                alert('Failed to stop connection.');
            }
        }
    }
</script>


@php
$currentUserId = auth()->id() ?? \App\Models\User::first()->id ?? 1;
@endphp

<script>
    // 🌟 Laravel Reverb / Echo Setup 🌟
    const authUserId = @json($currentUserId);

    document.addEventListener("DOMContentLoaded", function() {

        console.log("Echo Status:", typeof window.Echo !== 'undefined' ? "Active" : "Not Found");

        if (typeof window.Echo !== 'undefined') {

            window.Echo.private(`user.${authUserId}`)
                .listen('.trade.updated', (e) => {
                    console.log('🔥 Real-time update received!', e);
                    const trade = e.trade;

                    if (e.action === 'open') {
                        showLiveToast('success', `🚀 New Trade Opened: ${trade.symbol} ${trade.type} by Master!`);
                        insertOpenTradeRow(trade);
                    } else if (e.action === 'close') {
                        const profit = parseFloat(trade.net_profit);
                        const profitColor = profit >= 0 ? 'success' : 'danger';
                        const profitSign = profit >= 0 ? '+' : '';

                        showLiveToast(profitColor, `💰 Trade Closed: ${trade.symbol} (${profitSign}$${profit.toFixed(2)})`);

                        setTimeout(() => {
                            window.location.reload();
                        }, 2500);
                    }
                });
        }
    });

    // ==========================================
    // 🌟 Helper: Insert Open Trade Row 🌟
    // ==========================================
    function insertOpenTradeRow(trade) {
        const tables = document.querySelectorAll('#tab-overview table tbody');
        if (tables.length < 2) return;
        const tbody = tables[1];

        const emptyRow = tbody.querySelector('td[colspan="6"]');
        if (emptyRow) emptyRow.parentElement.remove();

        const tr = document.createElement('tr');
        tr.style.borderBottom = '1px solid var(--border)';

        const typeColor = trade.type === 'BUY' ? '#10b981' : '#ef4444';

        tr.innerHTML = `
            <td class="text-start fw-bold" style="color: var(--text);">${trade.symbol}</td>
            <td><span style="color: ${typeColor}; font-weight: 600;">${trade.type}</span></td>
            <td style="color: var(--text2);">${parseFloat(trade.entry_price).toFixed(5)}</td>
            <td style="color: var(--text);">${parseFloat(trade.entry_price).toFixed(5)}</td>
            <td style="color: var(--text);">${trade.lot}</td>
            <td><span style="color: #10b981; font-weight: 600;">+$0.00</span></td>
        `;

        tr.style.backgroundColor = 'rgba(16, 185, 129, 0.2)';
        tr.style.transition = 'background-color 1.5s ease';

        tbody.prepend(tr);

        setTimeout(() => {
            tr.style.backgroundColor = 'transparent';
        }, 1500);
    }

    // ==========================================
    // 🌟 Helper: Show Live Toast 🌟
    // ==========================================
    function showLiveToast(type, message) {
        const bg = type === 'success' ? '#10b981' : '#ef4444';
        const toast = document.createElement('div');

        toast.style.position = 'fixed';
        toast.style.bottom = '30px';
        toast.style.right = '30px';
        toast.style.backgroundColor = bg;
        toast.style.color = '#fff';
        toast.style.padding = '14px 24px';
        toast.style.borderRadius = '8px';
        toast.style.boxShadow = '0 10px 20px rgba(0,0,0,0.15)';
        toast.style.zIndex = '9999';
        toast.style.fontWeight = '600';
        toast.style.fontSize = '14px';
        toast.style.transform = 'translateY(100px)';
        toast.style.opacity = '0';
        toast.style.transition = 'all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
        toast.innerHTML = message;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';
        }, 100);

        setTimeout(() => {
            toast.style.transform = 'translateY(100px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 400);
        }, 4000);
    }

    // ==========================================
    // 🔥 AJAX: Search & Filter Master Traders 🔥
    // ==========================================
    const searchMasterInput = document.getElementById('searchMasterInput');
    const sortMasterSelect = document.getElementById('sortMasterSelect');
    const mastersContainer = document.getElementById('mastersContainer');

    const fetchFilteredMasters = async () => {
        const search = searchMasterInput.value;
        const sort = sortMasterSelect.value;

        mastersContainer.style.opacity = '0.5';

        try {
            const response = await axios.get("{{ route('copy-trader.masters.filter') }}", {
                params: {
                    search: search,
                    sort: sort
                }
            });

            if (response.data.success) {
                renderMasters(response.data.masters);
            }
        } catch (error) {
            console.error("Failed to fetch masters data", error);
        } finally {
            mastersContainer.style.opacity = '1';
        }
    };

    if (searchMasterInput) searchMasterInput.addEventListener('input', fetchFilteredMasters);
    if (sortMasterSelect) sortMasterSelect.addEventListener('change', fetchFilteredMasters);

    const renderMasters = (masters) => {
        if (masters.length === 0) {
            mastersContainer.innerHTML = `<div class="col-12 text-center text-muted py-5">No master traders found matching your criteria.</div>`;
            return;
        }

        const formatDate = (dateString) => {
            return new Date(dateString).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short'
            });
        };

        mastersContainer.innerHTML = masters.map(master => {
            const verifiedBadge = master.is_verified ? `<i class="fa-solid fa-circle-check ms-1" style="color: #3b82f6; font-size: 13px;" title="Verified Master"></i>` : '';
            const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(master.name)}&background=${master.avatar_bg_color || '000'}&color=fff`;

            return `
            <div class="col-12 col-md-6 col-xl-4">
                <div class="folder-card p-4 h-100 d-flex flex-column justify-content-between" style="background: var(--bg-color); border: 1px solid var(--border); border-radius: 12px; transition: 0.3s; cursor: pointer;">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="${avatarUrl}" alt="Avatar" style="width: 48px; height: 48px; border-radius: 50%;">
                                <div>
                                    <h5 class="m-0 fw-bold" style="color: var(--text); font-size: 16px;">${master.name} ${verifiedBadge}</h5>
                                    <span style="font-size: 12px; color: var(--text3);">Since ${formatDate(master.since_date)}</span>
                                </div>
                            </div>
                            <span style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 700;">Risk: ${master.risk_score}/10</span>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="p-2 rounded text-center" style="background: var(--accent2);">
                                    <p class="m-0" style="font-size: 11px; color: var(--text3); text-transform: uppercase; font-weight: 600;">Monthly ROI</p>
                                    <h4 class="m-0 fw-bold mt-1" style="color: #10b981; font-size: 18px;">+${master.monthly_roi}%</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 rounded text-center" style="background: var(--accent2);">
                                    <p class="m-0" style="font-size: 11px; color: var(--text3); text-transform: uppercase; font-weight: 600;">Followers</p>
                                    <h4 class="m-0 fw-bold mt-1" style="color: var(--text); font-size: 18px;">${Number(master.followers_count).toLocaleString()}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3" style="border-top: 1px dashed var(--border);">
                        <span style="font-size: 13px; color: var(--text3); font-weight: 500;">Win Rate: <strong style="color: var(--text);">${master.win_rate}%</strong></span>
                        <button class="btn btn-sm px-4 fw-bold" onclick="openCopyModal(${master.id}, '${master.name.replace(/'/g, "\\'")}', '${master.avatar_bg_color}')" style="background: var(--accent); color: var(--text7); border-radius: 8px; font-size: 13px; border: none; transition: 0.2s;">
                            Copy Now
                        </button>
                    </div>
                </div>
            </div>`;
        }).join('');
    };
</script>
@endsection