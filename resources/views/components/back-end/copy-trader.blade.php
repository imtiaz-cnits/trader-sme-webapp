@extends('layout.dashboard-sidenav')
@section('title', 'Copy Trader')

@section('content')
<main class="container-fluid px-md-5">
    <div class="main-content pb-4">

        <div class="header-box d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 mb-3 mt-4">
            <div>
                <h2 class="dashboard-title">Copy Trader</h2>
                <p style="color: var(--text3); font-size: 14px; margin-bottom: 0;">Replicate trades across multiple accounts instantly.</p>
            </div>

            <div class="d-flex gap-2">
                <button class="btn-custom d-flex align-items-center gap-2" style="padding: 8px 20px; border-radius: 8px; cursor: pointer; transition: 0.3s; border: 1px solid #1d5053;">
                    <i class="fa-solid fa-gear"></i> Config
                </button>
                <button class="btn-log-trade d-flex align-items-center gap-2" style="background-color: #1d5053; border: none;">
                    <i class="fa-solid fa-play"></i> System Active
                </button>
            </div>
        </div>

        <div class="tab-content">
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch m-0">
                    <div class="card-item w-100 mt-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 class="title">Master Account</h3>
                                <span style="background: rgba(29, 80, 83, 0.1); color: #1d5053; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; border: 1px solid #1d5053;">LIVE</span>
                            </div>
                            <div>
                                <p class="price" style="font-size: 20px;">Alpha Main</p>
                                <p class="daily-task">Broker: FTMO • #882910</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch m-0">
                    <div class="card-item w-100 mt-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 class="title">Total Balance</h3>
                                <span class="icon">
                                    <i class="fa-solid fa-wallet" style="color: var(--text3); font-size: 18px;"></i>
                                </span>
                            </div>
                            <div>
                                <p class="price" style="font-size: 20px;">$102,450.00</p>
                                <p class="daily-task" style="color: #1d5053;">+ $1,240.00 Today</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch m-0">
                    <div class="card-item w-100 mt-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 class="title">Broadcast Status</h3>
                                <span class="icon">
                                    <i class="fa-solid fa-tower-broadcast" style="color: var(--text3); font-size: 18px;"></i>
                                </span>
                            </div>
                            <div>
                                <p class="price" style="color: #1d5053; font-size: 20px;">Broadcasting</p>
                                <p class="daily-task">Latency: 45ms</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="chart-card">
                    <div class="chart-header mb-3">
                        <div>
                            <h2>Master Performance</h2>
                            <p>Growth tracking of the master account over the last 24 hours.</p>
                        </div>
                        <div class="chart-pills d-flex gap-1">
                            <a href="#" class="nav-link active">24H</a>
                            <a href="#" class="nav-link">7D</a>
                            <a href="#" class="nav-link">1M</a>
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
                <h3 class="title mb-0">Connected Accounts (Followers)</h3>
                <button class="btn-custom d-flex align-items-center gap-2" style="padding: 8px 14px; border-radius: 8px;">
                    <i class="fa-solid fa-plus"></i> Link New Account
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 20px">
                                <input class="form-check-input" type="checkbox" id="selectAllAccounts" />
                            </th>
                            <th class="text-start">Account Name</th>
                            <th>Broker</th>
                            <th>Balance</th>
                            <th>Multiplier</th>
                            <th>Risk Mode</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" /></td>
                            <td class="text-start" style="font-weight: 500; color: var(--text);">Prop Firm Challenge</td>
                            <td style="color: var(--text2);">MyForexFunds</td>
                            <td style="font-weight: 600; color: var(--text);">$50,000</td>
                            <td><span style="background: var(--bg-color); border: 1px solid var(--border); padding: 4px 8px; border-radius: 6px; font-size: 12px; color: var(--text2);">0.5x</span></td>
                            <td style="color: var(--text2);">Low</td>
                            <td><span style="background: rgba(29, 80, 83, 0.1); color: #1d5053; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 500;">Active</span></td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn-custom p-1 px-2 border" style="font-size: 12px;"><i class="fa-solid fa-pause"></i></button>
                                    <button class="btn-custom p-1 px-2 border" style="font-size: 12px;"><i class="fa-solid fa-gear"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" /></td>
                            <td class="text-start" style="font-weight: 500; color: var(--text);">Personal Account</td>
                            <td style="color: var(--text2);">IC Markets</td>
                            <td style="font-weight: 600; color: var(--text);">$12,300</td>
                            <td><span style="background: var(--bg-color); border: 1px solid var(--border); padding: 4px 8px; border-radius: 6px; font-size: 12px; color: var(--text2);">0.1x</span></td>
                            <td style="color: var(--text2);">Medium</td>
                            <td><span style="background: rgba(29, 80, 83, 0.1); color: #1d5053; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 500;">Active</span></td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn-custom p-1 px-2 border" style="font-size: 12px;"><i class="fa-solid fa-pause"></i></button>
                                    <button class="btn-custom p-1 px-2 border" style="font-size: 12px;"><i class="fa-solid fa-gear"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" /></td>
                            <td class="text-start" style="font-weight: 500; color: var(--text);">Backup Account</td>
                            <td style="color: var(--text2);">OANDA</td>
                            <td style="font-weight: 600; color: var(--text);">$5,000</td>
                            <td><span style="background: var(--bg-color); border: 1px solid var(--border); padding: 4px 8px; border-radius: 6px; font-size: 12px; color: var(--text2);">0.05x</span></td>
                            <td style="color: var(--text2);">Low</td>
                            <td><span style="background: rgba(245, 158, 11, 0.1); color: #f59e0b; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 500;">Paused</span></td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn-custom p-1 px-2 border" style="font-size: 12px;"><i class="fa-solid fa-play"></i></button>
                                    <button class="btn-custom p-1 px-2 border" style="font-size: 12px;"><i class="fa-solid fa-gear"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="trends-table mt-5">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h3 class="title mb-0">Active Open Positions</h3>
                <span style="font-size: 12px; color: var(--text3);"><i class="fa-solid fa-circle-notch fa-spin me-1"></i> Live Updating</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-start">Symbol</th>
                            <th>Type</th>
                            <th>Entry Price</th>
                            <th>Current Price</th>
                            <th>Master Lot</th>
                            <th>Floating P/L</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start text-dark fw-bold">GBPUSD</td>
                            <td><span style="color: #1d5053; font-weight: 600;">BUY</span></td>
                            <td style="color: var(--text2);">1.26450</td>
                            <td style="color: var(--text);">1.26580</td>
                            <td>1.50</td>
                            <td><span style="color: #1d5053; font-weight: 600;">+$195.00</span></td>
                        </tr>
                        <tr>
                            <td class="text-start text-dark fw-bold">US30</td>
                            <td><span style="color: #ef4444; font-weight: 600;">SELL</span></td>
                            <td style="color: var(--text2);">34,150.00</td>
                            <td style="color: var(--text);">34,120.00</td>
                            <td>0.50</td>
                            <td><span style="color: #1d5053; font-weight: 600;">+$300.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="trends-table mt-5">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h3 class="title mb-0">Recent Executions</h3>
                <div class="dropdown">
                    <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Columns
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Date</a></li>
                        <li><a class="dropdown-item" href="#">Pair</a></li>
                        <li><a class="dropdown-item" href="#">Profit</a></li>
                    </ul>
                </div>
            </div>

            <div class="card-item w-100 p-0" style="overflow: hidden;">
                <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="border-color: var(--border) !important;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background: rgba(29, 80, 83, 0.1); color: #1d5053; padding: 8px; border-radius: 8px;">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold" style="font-size: 14px; color: var(--text);">XAUUSD <span style="color: #1d5053; font-size: 12px;">BUY</span></h6>
                            <small style="color: var(--text3); font-size: 12px;">Master: 1.0 Lot &rarr; Copied to 3 accounts</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="d-block fw-bold" style="color: #1d5053; font-size: 14px;">+$120.00</span>
                        <small style="color: var(--text3); font-size: 12px;">10:42 AM</small>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center p-3 border-bottom" style="border-color: var(--border) !important;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background: rgba(239, 68, 68, 0.1); padding: 8px; border-radius: 8px; color: #ef4444;">
                            <i class="fa-solid fa-arrow-trend-down"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold" style="font-size: 14px; color: var(--text);">EURUSD <span style="color: #ef4444; font-size: 12px;">SELL</span></h6>
                            <small style="color: var(--text3); font-size: 12px;">Master: 2.0 Lot &rarr; Copied to 3 accounts</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="d-block fw-bold" style="color: #1d5053; font-size: 14px;">+$85.50</span>
                        <small style="color: var(--text3); font-size: 12px;">09:15 AM</small>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background: rgba(29, 80, 83, 0.1); color: #1d5053; padding: 8px; border-radius: 8px;">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold" style="font-size: 14px; color: var(--text);">US30 <span style="color: #1d5053; font-size: 12px;">BUY</span></h6>
                            <small style="color: var(--text3); font-size: 12px;">Master: 0.5 Lot &rarr; Copied to 2 accounts</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="d-block fw-bold" style="color: #ef4444; font-size: 14px;">-$40.00</span>
                        <small style="color: var(--text3); font-size: 12px;">08:05 AM</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="settings-container mt-5" style="background: transparent; padding-bottom: 0;">
            <div class="content-area">
                <div class="row">
                    <div class="col-12">
                        <div class="header mb-3" style="font-size: 18px;">Global Risk Configuration</div>
                        <div class="card-item p-4" style="background: var(--bg-color);">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="toggle">
                                        <h4>Force Exit on Drawdown</h4>
                                        <div class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider"></span>
                                        </div>
                                    </div>
                                    <p style="font-size: 12px; color: var(--text3);">Automatically close all trades if total equity drops by 5%.</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="toggle">
                                        <h4>Slippage Protection</h4>
                                        <div class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </div>
                                    </div>
                                    <p style="font-size: 12px; color: var(--text3);">Prevent copying trades if price difference > 2 pips.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('copyTraderChart').getContext('2d');

        // Create gradient
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(29, 80, 83, 0.2)'); // Brand color #1d5053 with opacity
        gradient.addColorStop(1, 'rgba(29, 80, 83, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', 'Now'],
                datasets: [{
                    label: 'Account Equity',
                    data: [101200, 101500, 101300, 101800, 102100, 102350, 102450],
                    borderColor: '#1d5053',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: '#1d5053',
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
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            color: '#858d9d',
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
                            color: '#858d9d',
                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection