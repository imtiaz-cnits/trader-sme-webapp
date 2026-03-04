@extends('layout.dashboard-sidenav')
@section('title', 'Daily Trading & Analytics')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<main class="container-fluid px-md-5">
  <div class="main-content pb-4">

    <div class="header-box d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 mb-3 mt-4">
      <h2 class="dashboard-title">Daily Trading</h2>
      <p id="total-holding" class="total-holding">Total Holdings: <span>$0.00</span></p>
    </div>

    <div class="d-flex flex-row align-items-center mb-3">
      <div class="tab tab-pills d-flex gap-1 flex-wrap" role="tablist">
        <a class="nav-link active" id="daily-tab" data-period="daily" type="button">Daily</a>
        <a class="nav-link" id="weekly-tab" data-period="weekly" type="button">Weekly</a>
        <a class="nav-link" id="monthly-tab" data-period="monthly" type="button">Monthly</a>
        <a class="nav-link" id="yearly-tab" data-period="yearly" type="button">Yearly</a>
        <a class="nav-link" id="all-time-tab" data-period="all_time" type="button">All Time</a>
      </div>
    </div>

    <div class="tab-content">
      <div class="tab-pane fade show active" id="daily-content" role="tabpanel">
        <div class="row g-3">
          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Win/Loss Rate</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" viewBox="0 0 10 16" fill="none">
                      <path d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="win-loss-price" class="price">0%</p>
                  <p id="win-loss-price-daily-task" class="daily-task">Loading...</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Accumulated Profitability</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                      <path d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="accumulated-profit-price" class="price">$0.00</p>
                  <p id="accumulated-profit-daily-task" class="daily-task">Loading...</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Risk/Reward Ratio</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                      <path d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="risk-reward-price" class="price">1:0</p>
                  <p id="risk-reward-daily-task" class="daily-task">Loading...</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Average Trading Time</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="avg-trading-time-price" class="price">0h 0m</p>
                  <p id="avg-trading-time-daily-task" class="daily-task">Loading...</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="trends-table mt-4">

      <div class="mb-3">
        <h3 class="title mb-0">Trading Statistical Analysis</h3>
      </div>

      <div class="analysis-box d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
        <ul class="nav nav-pills analysis-pills d-flex gap-1" id="analysisTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-trades-tab" data-bs-toggle="pill" data-bs-target="#pills-trades" type="button" role="tab" aria-selected="true">Logged Trades</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-selected="false">Analysis & Patterns</button>
          </li>
        </ul>

        <button type="button" class="btn-log-trade btn-log-trade-custom" id="openTradeModalBtn">
          Log a New Trade
        </button>
      </div>

      <div class="tab-content mt-4" id="analysisTabsContent">

        <div class="tab-pane fade show active" id="pills-trades" role="tabpanel" aria-labelledby="pills-trades-tab" tabindex="0">
          <div class="d-flex flex-column gap-2 flex-sm-row justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
              <button id="date-range-btn" class="btn btn-custom d-flex align-items-center gap-2" style="background: var(--bg-color); border: 1px solid var(--border); padding: 0.5rem 1rem;">
                <i class="fa-regular fa-calendar"></i>
                <span id="date-range-text">Select Date Range</span>
                <i class="fa-solid fa-angle-down ms-1"></i>
              </button>
            </div>
            <div class="d-flex align-items-center gap-2">
              <div class="dropdown">
                <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown">Columns</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Date</a></li>
                  <li><a class="dropdown-item" href="#">Session</a></li>
                  <li><a class="dropdown-item" href="#">Instrument</a></li>
                </ul>
              </div>
              <button type="button" class="btn-download">Download Report</button>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-hover table-custom">
              <thead>
                <tr>
                  <th style="width: 20px"><input class="form-check-input" type="checkbox" id="selectAll" /></th>
                  <th class="text-start">Date</th>
                  <th>Session</th>
                  <th>Instrument</th>
                  <th>Lot Size</th>
                  <th>Position</th>
                  <th>R/B</th>
                  <th>Entry</th>
                  <th>Exit</th>
                  <th>Outcome</th>
                  <th>Gross Profit</th>
                  <th>Fee</th>
                  <th>Net Profit</th>
                  <th class="text-end">Image Link</th>
                </tr>
              </thead>
              <tbody id="trade-log-table-body">
                <tr>
                  <td colspan="14" class="text-center py-4 text-muted">Loading trades...</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="pagination-container d-flex gap-2 flex-column flex-sm-row justify-content-between">
            <span id="selected-entries-text">Showing recent trades.</span>
            <ul class="pagination">
              <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
            </ul>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-analytics" role="tabpanel" tabindex="0">
          <div class="box-wrapper">
            <div class="row">
              <div class="col-lg-7">
                <div class="chart-card">
                  <div class="chart-header">
                    <div>
                      <h2>Profit/loss Over Time</h2>
                      <p>Track your trading performance over time</p>
                    </div>
                  </div>
                  <div id="chart" style="min-height: 350px;"></div>
                </div>
              </div>
              <div class="col-lg-5 mt-3 mt-lg-0">
                <div class="chart-card">
                  <div class="chart-header">
                    <div>
                      <h2>Asset Performance</h2>
                      <p>Compare profitability across different assets</p>
                    </div>
                  </div>
                  <div id="asset-chart" style="min-height: 350px;"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-wrapper mt-4">
            <div class="row">
              <div class="col-lg-4">
                <div class="trade-outcome-card" style="height: 100%;">
                  <div class="header d-flex flex-row align-items-start justify-content-between mb-4">
                    <div>
                      <h2>Trade Outcome Breakdown</h2>
                      <p>Distribution of trade outcomes</p>
                    </div>
                  </div>
                  <div style="height: 250px; position: relative; margin:auto;">
                    <canvas id="tradeChart"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 mt-3 mt-lg-0">
                <div class="trade-outcome-card" style="height: 100%;">
                  <div class="header">
                    <div>
                      <h2>Most Profitable Assets</h2>
                      <p>Assets ranked by profitability</p>
                    </div>
                  </div>
                  <div class="profitable-table-wrap">
                    <table class="profitable-assets-table table-hover" id="profitableAssetsTable">
                      <thead>
                        <tr>
                          <th class="text-start">Asset</th>
                          <th>Profit/Loss</th>
                          <th>Trades</th>
                          <th>Win Rate</th>
                          <th>Trend</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="5" class="text-center text-muted">Loading...</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-wrapper mt-4">
            <div class="row">
              <div class="col-12">
                <div class="trade-outcome-card">
                  <div class="header">
                    <div>
                      <h2>Trading Activity Heatmap</h2>
                      <p>Analyze performance by day and time</p>
                    </div>
                  </div>
                  <div class="heatmap-container mt-3">
                    <div class="overflow-x-auto pb-2">
                      <table id="heatmap-table" class="heatmap-table" style="width: 100%;">
                        <thead>
                          <tr id="header-row"></tr>
                        </thead>
                        <tbody id="data-rows"></tbody>
                      </table>
                    </div>
                    <div class="d-flex color-shade-box align-items-center justify-content-center mt-3">
                      <div class="legend-item-text"><span class="text">Low</span></div>
                      <div class="legend-item d-flex gap-1">
                        <div class="legend-color-box" style="width:20px; height:20px; background-color: #f87171"></div>
                        <div class="legend-color-box" style="width:20px; height:20px; background-color: #fcd34d"></div>
                        <div class="legend-color-box" style="width:20px; height:20px; background-color: #6ee7b7"></div>
                        <div class="legend-color-box" style="width:20px; height:20px; background-color: #34d399"></div>
                        <div class="legend-color-box" style="width:20px; height:20px; background-color: #10b981"></div>
                        <div class="legend-color-box" style="width:20px; height:20px; background-color: #059669"></div>
                      </div>
                      <div class="legend-item-text"><span class="text">High</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-wrapper mt-4">
            <div class="row">
              <div class="col-lg-7">
                <div class="chart-card p-3">
                  <div class="chart-header mb-4">
                    <div>
                      <h2>Trading Performance Radar</h2>
                      <p>Compare your current and previous performance metrics</p>
                    </div>
                  </div>

                  <div style="position: relative; height: 350px; width: 100%; margin: 0 auto;">
                    <canvas id="radarChart"></canvas>
                  </div>

                  <div class="row g-3 mt-4">
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Win Rate</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Risk/Reward</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Profit Factor</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Avg Trade Duration</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Consistency</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Discipline</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 mt-3 mt-lg-0">
                <div class="chart-card p-3" style="height: 100%;">
                  <div class="chart-header">
                    <div>
                      <h2>Strategy Insights</h2>
                      <p>AI-powered trading recommendations</p>
                    </div>
                  </div>
                  <div id="insights-container">
                    <div class="text-center text-muted mt-5">Analyzing data...</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-wrapper mt-4">
            <div class="row">
              <div class="col-12">
                <div class="chart-card p-3">
                  <div class="chart-header">
                    <div>
                      <h2>Recurring Errors</h2>
                      <p>Common trading mistakes to avoid</p>
                    </div>
                  </div>
                  <div class="recurring-container mt-3">
                    <div class="table-responsive">
                      <table class="recurring-errors-table table-hover w-100">
                        <thead>
                          <tr>
                            <th class="text-start">Error Type</th>
                            <th>Occurrences</th>
                            <th>Impact</th>
                            <th>Improvement</th>
                          </tr>
                        </thead>
                        <tbody id="recurring-errors-body">
                          <tr>
                            <td colspan="4" class="text-center text-muted">Analyzing trade logs...</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<div class="new-trend-modal" id="tradeModalWrapper" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background: rgba(0,0,0,0.5); justify-content: center; align-items: center;">
  <div class="modal-content" style="opacity: 1 !important; transform: none !important; visibility: visible !important; display: flex; flex-direction: column; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
    <div class="modal-header d-flex justify-content-between align-items-center flex-shrink-0">
      <h2 class="modal-title m-0 fw-bold" style="font-size: 1.5rem;">Add a Trade Log</h2>
      <button type="button" class="close-modal-btn" style="border:none; background:none; font-size:1.5rem; cursor: pointer; color: #666;">&times;</button>
    </div>
    <div class="modal-body" style="overflow-y: auto;">
      <form id="logTradeForm">
        @csrf
        <div class="mb-2">
          <label for="dateOfOperation" class="form-label">Date of Operation</label>
          <div class="position-relative">
            <input type="text" id="dateOfOperation" name="date_of_operation" class="form-control" placeholder="Select Date" autocomplete="off" />
            <button type="button" class="calendar-icon position-absolute top-50 translate-middle-y" style="right: 1rem; border: none; background: none; pointer-events: none;">
              <i class="fa-regular fa-calendar"></i>
            </button>
          </div>
        </div>
        <div class="mb-2">
          <label for="tradingSession" class="form-label">Trading Session</label>
          <input class="form-control" list="sessionOptions" name="trading_session" placeholder="Select/Type..." autocomplete="off">
          <datalist id="sessionOptions">
            <option value="Asian">
            <option value="London">
            <option value="New York">
            <option value="London/New York Overlap">
          </datalist>
        </div>
        <div class="mb-2">
          <label for="financialInstrument" class="form-label">Financial Instrument</label>
          <input class="form-control" list="instrumentOptions" name="financial_instrument" placeholder="Select/Type..." autocomplete="off">
          <datalist id="instrumentOptions">
            <option value="EUR/USD">
            <option value="GBP/USD">
            <option value="USD/JPY">
            <option value="XAU/USD">
            <option value="BTC/USD">
          </datalist>
        </div>
        <div class="mb-2"><label class="form-label">Lot Size</label><input type="number" step="0.01" name="lot_size" class="form-control" placeholder="e.g. 1.00" /></div>
        <div class="mb-2">
          <label class="form-label">Position</label>
          <div class="select-wrapper">
            <select name="position_type" class="form-select">
              <option value="Buy">Buy</option>
              <option value="Sell">Sell</option>
            </select>
            <span class="select-icon"><i class="fa-solid fa-sort-down"></i></span>
          </div>
        </div>
        <div class="mb-2"><label class="form-label">Risk/Reward</label><input type="text" name="risk_benefit_metrics" class="form-control" placeholder="1:2" /></div>
        <div class="row mb-2">
          <div class="col-6">
            <label class="form-label">Entry Time</label>
            <input type="text" name="entry_time" id="entryTime" class="form-control" placeholder="00:00 AM" autocomplete="off" />
          </div>
          <div class="col-6">
            <label class="form-label">Exit Time</label>
            <input type="text" name="exit_time" id="exitTime" class="form-control" placeholder="00:00 PM" autocomplete="off" />
          </div>
        </div>
        <div class="mb-2">
          <label class="form-label">Outcome</label>
          <div class="select-wrapper">
            <select name="outcome" class="form-select">
              <option value="Win">Win</option>
              <option value="Loss">Loss</option>
              <option value="Breakeven">Breakeven</option>
            </select>
            <span class="select-icon"><i class="fa-solid fa-sort-down"></i></span>
          </div>
        </div>
        <div class="mb-2"><label class="form-label">Gross Profit</label><input type="number" step="0.01" name="gross_profit" class="form-control" /></div>
        <div class="mb-2"><label class="form-label">Commission</label><input type="number" step="0.01" name="commission_details" class="form-control" /></div>
        <div class="mb-2"><label class="form-label">Net Profit</label><input type="number" step="0.01" name="net_profit" class="form-control" required /></div>
        <div class="mb-0"><label class="form-label">Image Link</label><input type="url" name="trade_image_link" class="form-control" /></div>
      </form>
    </div>
    <div class="modal-footer d-flex justify-content-between gap-2 mt-3 flex-shrink-0">
      <button type="button" class="btn-cancel close-modal-btn px-4 py-2 border rounded bg-light" style="min-width: 100px;">Cancel</button>
      <button type="button" class="btn-submit px-4 py-2 border-0 rounded text-white" id="saveTradeBtn" style="background-color: #1D5053; min-width: 120px;">Save Trade</button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  let notyfInstance = null;

  function showToast(type, message) {
    if (!notyfInstance && typeof Notyf !== 'undefined') {
      notyfInstance = new Notyf({
        duration: 3000,
        position: {
          x: 'right',
          y: 'top'
        },
        ripple: true,
        types: [{
          type: 'success',
          background: '#1D5053',
          icon: {
            className: 'fa-solid fa-circle-check',
            tagName: 'i',
            color: '#fff'
          }
        }, {
          type: 'error',
          background: '#ff6363',
          icon: {
            className: 'fa-solid fa-circle-xmark',
            tagName: 'i',
            color: '#fff'
          }
        }]
      });
    }
    if (notyfInstance) {
      type === 'success' ? notyfInstance.success(message) : notyfInstance.error(message);
    } else {
      alert(message);
    }
  }

  document.addEventListener("DOMContentLoaded", function() {

    let currentPeriod = 'daily';
    let currentStartDate = '';
    let currentEndDate = '';
    window.currentPagination = null;

    let profitChartInstance = null;
    let assetChartInstance = null;
    let outcomeChartInstance = null;

    // Modal Logic
    const modalWrapper = document.getElementById('tradeModalWrapper');
    const openBtns = document.querySelectorAll('.btn-log-trade');
    const closeBtns = document.querySelectorAll('.close-modal-btn, .btn-cancel');
    const saveBtn = document.getElementById('saveTradeBtn');

    if (modalWrapper) {
      openBtns.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        modalWrapper.style.display = 'flex';
      }));
      closeBtns.forEach(btn => btn.addEventListener('click', () => {
        modalWrapper.style.display = 'none';
      }));
      window.addEventListener('click', (e) => {
        if (e.target === modalWrapper) modalWrapper.style.display = 'none';
      });
    }

    if (typeof flatpickr !== "undefined") {
      flatpickr("#dateOfOperation", {
        dateFormat: "Y-m-d",
        allowInput: true
      });
      flatpickr("#entryTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K"
      });
      flatpickr("#exitTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K"
      });

      if (typeof $ !== 'undefined' && $.fn.daterangepicker) {
        $('#date-range-btn').daterangepicker({
          opens: 'left',
          autoUpdateInput: false,
          locale: {
            format: 'DD MMM YYYY',
            cancelLabel: 'Clear'
          }
        });
        $('#date-range-btn').on('apply.daterangepicker', function(ev, picker) {
          $('#date-range-text').html(picker.startDate.format('DD MMM YYYY') + ' - ' + picker.endDate.format('DD MMM YYYY'));
          currentStartDate = picker.startDate.format('YYYY-MM-DD');
          currentEndDate = picker.endDate.format('YYYY-MM-DD');
          currentPeriod = 'custom';
          document.querySelectorAll('.tab-pills .nav-link').forEach(l => l.classList.remove('active'));
          reloadAllData();
        });
        $('#date-range-btn').on('cancel.daterangepicker', function(ev, picker) {
          $('#date-range-text').html('Select Date Range');
          currentStartDate = '';
          currentEndDate = '';
          document.getElementById('daily-tab').click();
        });
      }
    }

    if (saveBtn) {
      saveBtn.addEventListener('click', async function() {
        const btnOriginalText = saveBtn.innerText;
        saveBtn.innerText = 'Saving...';
        saveBtn.disabled = true;
        const form = document.getElementById('logTradeForm');
        const payload = Object.fromEntries(new FormData(form).entries());

        try {
          const response = await axios.post("{{ route('daily-trading.store') }}", payload);
          if (response.data.success || response.status === 200) {
            showToast('success', 'Trade Logged Successfully!');
            modalWrapper.style.display = 'none';
            form.reset();
            reloadAllData();
          }
        } catch (error) {
          showToast('error', 'Error saving trade');
        } finally {
          saveBtn.innerText = btnOriginalText;
          saveBtn.disabled = false;
        }
      });
    }

    // Main Tabs Logic
    const topTabs = document.querySelectorAll('.tab-pills .nav-link');
    topTabs.forEach(link => {
      link.addEventListener('click', function(e) {
        if (this.dataset.bsToggle !== 'pill') {
          topTabs.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
          currentPeriod = this.getAttribute('data-period') || 'all_time';
          currentStartDate = '';
          currentEndDate = '';
          const textEl = document.getElementById('date-range-text');
          if (textEl) textEl.textContent = 'Select Date Range';
          reloadAllData();
        }
      });
    });

    const analysisTabBtn = document.getElementById('pills-analytics-tab');
    if (analysisTabBtn) {
      analysisTabBtn.addEventListener('shown.bs.tab', function(e) {
        fetchAnalyticsCharts(currentPeriod);
      });
    }

    function reloadAllData() {
      fetchTradeLogs(1);
      fetchDashboardStats(currentPeriod);
      loadMostProfitableAssets(currentPeriod);
      fetchAnalyticsCharts(currentPeriod);
    }

    reloadAllData();

    // --- Analytics Charts Fetch & Render ---
    async function fetchAnalyticsCharts(period) {
      try {
        let params = {
          period: period
        };
        if (currentStartDate && currentEndDate) {
          params.start_date = currentStartDate;
          params.end_date = currentEndDate;
        }

        const response = await axios.get("{{ route('analytics.charts') }}", {
          params: params
        });
        const data = response.data;

        renderProfitChart(data.candlestickData);
        renderAssetChart(data.assetPerformance);
        renderOutcomeChart(data.outcomes);
        renderHeatmap(data.heatmapData);

        // Render step 3 Dynamic Data
        renderRadarChart(data.radarData);
        renderInsights(data.insights);
        renderRecurringErrors(data.errors);

      } catch (error) {
        console.error("API Error or No Data.");
        renderProfitChart([]);
        renderAssetChart({
          categories: [],
          positive: [],
          negative: []
        });
        renderOutcomeChart({
          Win: 0,
          Loss: 0,
          Breakeven: 0
        });
      }
    }

    function renderProfitChart(data) {
      let seriesData = (data && data.length > 0) ? data : [{
        x: 'No Data',
        y: [0, 0, 0, 0]
      }];
      const options = {
        chart: {
          type: "candlestick",
          height: 280,
          width: "100%",
          toolbar: {
            show: false
          }
        },
        series: [{
          name: "Balance",
          data: seriesData
        }],
        xaxis: {
          type: "category",
          tickAmount: 10,
          axisTicks: {
            show: false
          },
          axisBorder: {
            show: false
          }
        },
        yaxis: {
          tooltip: {
            enabled: true
          },
          labels: {
            formatter: (val) => val >= 1000 ? "$" + (val / 1000).toFixed(1) + "k" : "$" + val,
            style: {
              fontSize: "10px",
              colors: ["#666"]
            }
          },
          forceNiceScale: true
        },
        plotOptions: {
          candlestick: {
            colors: {
              upward: "#2F9196",
              downward: "#D2225A"
            },
            wick: {
              useFillColor: true
            }
          }
        },
        grid: {
          borderColor: "#e7e7e7",
          strokeDashArray: 2,
          xaxis: {
            lines: {
              show: false
            }
          },
          yaxis: {
            lines: {
              show: true
            }
          }
        }
      };
      if (profitChartInstance) {
        profitChartInstance.updateOptions(options);
        profitChartInstance.updateSeries([{
          data: seriesData
        }]);
      } else {
        profitChartInstance = new ApexCharts(document.querySelector("#chart"), options);
        profitChartInstance.render();
      }
    }

    function renderAssetChart(assetData) {
      let categories = (assetData && assetData.categories.length > 0) ? assetData.categories : ['EUR', 'USD', 'AAPL'];
      let positiveData = (assetData && assetData.positive.length > 0) ? assetData.positive : [0, 0, 0];
      let negativeData = (assetData && assetData.negative.length > 0) ? assetData.negative : [0, 0, 0];
      const options = {
        chart: {
          type: "bar",
          height: 280,
          toolbar: {
            show: false
          }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "40%",
            borderRadius: 4
          }
        },
        dataLabels: {
          enabled: false
        },
        colors: ["#2BB2FE", "#F9C80E"],
        fill: {
          type: "gradient",
          gradient: {
            shade: "light",
            type: "vertical",
            shadeIntensity: 0.5,
            gradientToColors: ["#22CAAD", "#F86624"],
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
          }
        },
        series: [{
          name: "Positive",
          data: positiveData
        }, {
          name: "Negative",
          data: negativeData
        }],
        xaxis: {
          categories: categories,
          labels: {
            style: {
              fontSize: "10px"
            }
          }
        },
        yaxis: {
          labels: {
            formatter: function(value) {
              return "$" + value;
            }
          }
        },
        grid: {
          borderColor: "#e4e4e7"
        },
        legend: {
          show: false
        }
      };
      if (assetChartInstance) {
        assetChartInstance.updateOptions({
          xaxis: {
            categories: categories
          }
        });
        assetChartInstance.updateSeries([{
          data: positiveData
        }, {
          data: negativeData
        }]);
      } else {
        assetChartInstance = new ApexCharts(document.querySelector("#asset-chart"), options);
        assetChartInstance.render();
      }
    }

    function renderOutcomeChart(data) {
      const tradeCanvas = document.getElementById("tradeChart");
      if (!tradeCanvas) return;
      const ctx = tradeCanvas.getContext("2d");
      const takeProfitGradient = ctx.createLinearGradient(0, 0, 0, 400);
      takeProfitGradient.addColorStop(0, "#883DCF");
      takeProfitGradient.addColorStop(1, "#CFB1EC");
      const breakEvenGradient = ctx.createLinearGradient(0, 0, 0, 400);
      breakEvenGradient.addColorStop(0, "#2BB2FE");
      breakEvenGradient.addColorStop(1, "#AAE0FF");
      const stopLossGradient = ctx.createLinearGradient(0, 0, 0, 400);
      stopLossGradient.addColorStop(0, "#EB3D4D");
      stopLossGradient.addColorStop(1, "#F7B1B8");
      const win = data ? (data.Win || 0) : 0;
      const loss = data ? (data.Loss || 0) : 0;
      const breakeven = data ? (data.Breakeven || 0) : 0;
      let chartData = [win, breakeven, loss];
      let bgColors = [takeProfitGradient, breakEvenGradient, stopLossGradient];
      if (win === 0 && loss === 0 && breakeven === 0) {
        chartData = [1, 1, 1];
        bgColors = ["#e4e4e7", "#e4e4e7", "#e4e4e7"];
      }
      if (outcomeChartInstance) {
        outcomeChartInstance.data.datasets[0].data = chartData;
        outcomeChartInstance.data.datasets[0].backgroundColor = bgColors;
        outcomeChartInstance.update();
      } else {
        outcomeChartInstance = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: ["Take Profit", "Break Even", "Stop Loss"],
            datasets: [{
              data: chartData,
              backgroundColor: bgColors,
              spacing: 4,
              borderRadius: 12,
              borderColor: "transparent"
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: "bottom",
                align: "start",
                labels: {
                  usePointStyle: true,
                  boxWidth: 10,
                  padding: 20
                }
              }
            },
            cutout: "90%"
          }
        });
      }
    }

    function renderHeatmap(data) {
      const headerRow = document.getElementById("header-row");
      const dataRows = document.getElementById("data-rows");
      if (!headerRow || !dataRows) return;
      headerRow.innerHTML = "";
      dataRows.innerHTML = "";
      const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
      const hours = Array.from({
        length: 12
      }, (_, i) => String(i * 2).padStart(2, "0") + ":00");
      const dayHourHeader = document.createElement("th");
      dayHourHeader.classList.add("grid-header");
      dayHourHeader.textContent = "Day / Hour";
      headerRow.appendChild(dayHourHeader);
      hours.forEach((hour) => {
        const header = document.createElement("th");
        header.classList.add("grid-header");
        header.textContent = hour;
        headerRow.appendChild(header);
      });
      days.forEach((day) => {
        const row = document.createElement("tr");
        const dayHeader = document.createElement("th");
        dayHeader.classList.add("grid-header");
        dayHeader.textContent = day;
        row.appendChild(dayHeader);
        const dayData = data ? data[day] : null;
        for (let i = 0; i < 12; i++) {
          const value = dayData ? dayData[i] : 0;
          const cell = document.createElement("td");
          let colorClass = "";
          if (value >= 80) colorClass = "color-high";
          else if (value >= 70) colorClass = "color-medium-high";
          else if (value >= 60) colorClass = "color-medium-high-low";
          else if (value >= 50) colorClass = "color-medium";
          else if (value >= 40) colorClass = "color-medium-low";
          else if (value > 0) colorClass = "color-low";
          if (colorClass) cell.classList.add("grid-cell", colorClass);
          else cell.classList.add("grid-cell");
          cell.textContent = value > 0 ? `${value}%` : "-";
          row.appendChild(cell);
        }
        dataRows.appendChild(row);
      });
    }

    // 🔴 FIXED: Professional Radar Chart configuration with Borders and Background
    function renderRadarChart(data) {
      const radar = document.getElementById("radarChart");
      if (!radar || !data) return;

      if (window.radarChartInstance) {
        window.radarChartInstance.data.datasets[0].data = data.current;
        window.radarChartInstance.data.datasets[1].data = data.previous;
        window.radarChartInstance.update();
      } else {
        window.radarChartInstance = new Chart(radar, {
          type: "radar",
          data: {
            labels: ["Win Rate", "Risk/Reward", "Profit Factor", "Avg Duration", "Consistency", "Discipline"],
            datasets: [{
                label: "Current Period",
                data: data.current,
                backgroundColor: "rgba(42, 157, 144, 0.4)",
                borderColor: "#2A9D90", // Border outline added
                borderWidth: 2,
                pointBackgroundColor: "#2A9D90", // Points added
                order: 2
              },
              {
                label: "Previous Period",
                data: data.previous,
                backgroundColor: "rgba(231, 110, 80, 0.4)",
                borderColor: "#E76E50",
                borderWidth: 2,
                pointBackgroundColor: "#E76E50",
                order: 1
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: true,
                position: 'bottom'
              }
            }, // Show legend
            scales: {
              r: {
                angleLines: {
                  color: "#e4e4e7"
                },
                grid: {
                  color: "#e4e4e7"
                },
                min: 0,
                max: 100,
                pointLabels: {
                  color: "#6c757d",
                  font: {
                    size: 12
                  }
                },
                ticks: {
                  display: false
                }
              }
            }
          }
        });
      }

      if (data.stats) {
        const updateStatBox = (index, currentVal, previousVal) => {
          const boxes = document.querySelectorAll('.stat-box');
          if (!boxes[index]) return;
          const currentEl = boxes[index].querySelector('.current');
          const previousEl = boxes[index].querySelector('.previous');
          const changeEl = boxes[index].querySelector('.change, .decress');

          if (currentEl) currentEl.textContent = currentVal;
          if (previousEl) previousEl.textContent = previousVal;

          if (changeEl) {
            const diff = (currentVal - previousVal).toFixed(1);
            changeEl.textContent = (diff > 0 ? '+' : '') + diff;
            changeEl.className = 'stat-point ' + (diff >= 0 ? 'change' : 'decress');
          }
        };
        updateStatBox(0, data.stats.win_rate.current, data.stats.win_rate.previous);
        updateStatBox(1, data.stats.risk_reward.current, data.stats.risk_reward.previous);
        updateStatBox(2, data.stats.profit_factor.current, data.stats.profit_factor.previous);
        updateStatBox(3, data.stats.avg_duration.current, data.stats.avg_duration.previous);
        updateStatBox(4, data.stats.consistency.current, data.stats.consistency.previous);
        updateStatBox(5, data.stats.discipline.current, data.stats.discipline.previous);
      }
    }

    // 🔴 6. Render Dynamic Strategy Insights
    function renderInsights(insights) {
      const container = document.getElementById("insights-container");
      if (!container || !insights) return;
      container.innerHTML = "";

      insights.forEach(insight => {
        const card = `
        <div class="strategy-card mt-3">
          <div class="card-header">
            <div class="icon-container"><i class="fa-solid ${insight.icon}"></i></div>
            <div class="text-content">
              <h3 class="card-title">${insight.title}</h3>
              <p class="card-description">${insight.desc}</p>
            </div>
          </div>
          <a href="#" class="review-link" onclick="document.getElementById('pills-trades-tab').click(); return false;">Review setups <i class="fa-solid fa-arrow-right"></i></a>
        </div>`;
        container.insertAdjacentHTML("beforeend", card);
      });
    }

    // 🔴 7. Render Dynamic Recurring Errors
    function renderRecurringErrors(errors) {
      const tbody = document.getElementById("recurring-errors-body");
      if (!tbody || !errors) return;
      tbody.innerHTML = "";

      errors.forEach(err => {
        const isPositive = err.improvement.includes('+');
        const tr = `
        <tr>
          <td class="text-start">${err.type}</td>
          <td>${err.occurrences}</td>
          <td class="${err.occurrences !== '-' ? 'impact-red text-danger' : 'text-success'}">${err.impact}</td>
          <td class="${isPositive ? 'point-incress text-success' : 'text-muted'}">${err.improvement}</td>
        </tr>`;
        tbody.insertAdjacentHTML("beforeend", tr);
      });
    }

    // --- Core Data Fetch Functions ---
    async function fetchTradeLogs(page = 1) {
      try {
        let url = `{{ route('daily-trading.data') }}?page=${page}&period=${currentPeriod}`;
        if (currentStartDate && currentEndDate) url += `&start_date=${currentStartDate}&end_date=${currentEndDate}`;
        const response = await axios.get(url);
        const logs = response.data.data;
        const pagination = response.data;
        window.currentPagination = pagination;

        const tableBody = document.getElementById("trade-log-table-body");
        if (!tableBody) return;
        tableBody.innerHTML = "";

        if (logs.length === 0) {
          tableBody.innerHTML = `<tr><td colspan="14" class="text-center py-4 text-muted">No trades found.</td></tr>`;
          document.getElementById('selected-entries-text').textContent = 'Showing 0 entries';
          return;
        }

        logs.forEach((log) => {
          const row = `<tr>
                    <td><input class="form-check-input row-checkbox" type="checkbox" /></td>
                    <td class="text-start">${log.date_of_operation ?? '-'}</td>
                    <td>${log.trading_session ?? '-'}</td>
                    <td class="fw-bold">${log.financial_instrument ?? '-'}</td>
                    <td>${log.lot_size ?? '-'}</td>
                    <td>${log.position_type ?? '-'}</td>
                    <td>${log.risk_benefit_metrics ?? '-'}</td>
                    <td>${formatTime(log.entry_time)}</td>
                    <td>${formatTime(log.exit_time)}</td>
                    <td>${log.outcome ?? '-'}</td>
                    <td>$${log.gross_profit ?? '-'}</td>
                    <td>$${log.commission_details ?? '-'}</td>
                    <td class="fw-bold ${parseFloat(log.net_profit) >= 0 ? 'text-success' : 'text-danger'}">$${log.net_profit ?? '-'}</td>
                    <td class="text-end">${log.trade_image_link ? `<a href="${log.trade_image_link}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-image"></i></a>` : '-'}</td>
                </tr>`;
          tableBody.insertAdjacentHTML("beforeend", row);
        });

        document.getElementById('selected-entries-text').textContent = `Showing ${pagination.from || 0} to ${pagination.to || 0} of ${pagination.total} entries`;
      } catch (error) {}
    }

    async function fetchDashboardStats(period) {
      try {
        let params = {
          period: period
        };
        if (currentStartDate && currentEndDate) {
          params.start_date = currentStartDate;
          params.end_date = currentEndDate;
        }
        const response = await axios.get("{{ route('dashboard.stats') }}", {
          params: params
        });
        const data = response.data;
        const safeText = (id, txt) => {
          const el = document.getElementById(id);
          if (el) el.textContent = txt;
        };

        const totalEl = document.querySelector('#total-holding span');
        if (totalEl) totalEl.textContent = `$${safeNum(data.total_holdings)}`;

        safeText('accumulated-profit-price', `$${safeNum(data.accumulated_profit)}`);
        let wlRate = String(data.win_loss_rate ?? '0').replace('%', '');
        safeText('win-loss-price', wlRate + '%');
        safeText('risk-reward-price', data.risk_reward_ratio ?? '1:0');
        safeText('avg-trading-time-price', data.avg_trading_time ?? '0h 0m');
      } catch (error) {}
    }

    async function loadMostProfitableAssets(period) {
      const tbody = document.querySelector("#profitableAssetsTable tbody");
      if (!tbody) return;
      try {
        let params = {
          period: period
        };
        if (currentStartDate && currentEndDate) {
          params.start_date = currentStartDate;
          params.end_date = currentEndDate;
        }
        const response = await axios.get("{{ route('dashboard.assets') }}", {
          params: params
        });
        const items = response.data.data || response.data;
        if (items.length > 0) {
          tbody.innerHTML = "";
          items.forEach(row => {
            const tr = `<tr>
                        <td class="text-start">${row.asset || row.financial_instrument}</td>
                        <td class="${row.profit >= 0 ? 'text-success' : 'text-danger'}">${row.profit >= 0 ? '+' : ''}$${safeNum(row.profit)}</td>
                        <td>${row.trades}</td>
                        <td>${row.win_rate}%</td>
                        <td class="${row.trend === 'up' ? 'text-success' : 'text-danger'}"></td>
                    </tr>`;
            tbody.insertAdjacentHTML("beforeend", tr);
          });
        } else {
          tbody.innerHTML = `<tr><td colspan="5" class="text-center text-muted">No data found.</td></tr>`;
        }
      } catch (error) {}
    }

    function formatTime(timeStr) {
      if (!timeStr) return '-';
      const [hour, minute] = timeStr.split(':');
      let h = parseInt(hour);
      const ampm = h >= 12 ? 'PM' : 'AM';
      return `${h % 12 || 12}:${minute} ${ampm}`;
    }

    function safeNum(n) {
      return n ? parseFloat(n).toFixed(2) : '0.00';
    }

  });
</script>
@endsection