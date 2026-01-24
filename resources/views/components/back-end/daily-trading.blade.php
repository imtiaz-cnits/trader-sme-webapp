@extends('layout.dashboard-sidenav')
@section('title', 'Daily Trading & Analytics')

@section('content')

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
              <button id="date-range-btn" class="btn btn-custom d-flex align-items-center gap-2" style="background: #fff; border: 1px solid #e2e8f0; padding: 0.5rem 1rem;">
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
                    <div class="tab chart-pills d-flex gap-1 flex-wrap">
                      <a href="#" class="nav-link active">Daily</a>
                      <a href="#" class="nav-link">Weekly</a>
                      <a href="#" class="nav-link">Monthly</a>
                      <a href="#" class="nav-link">Yearly</a>
                    </div>
                  </div>
                  <div id="chart"></div>
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
                  <div id="asset-chart"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-wrapper mt-4">
            <div class="row">
              <div class="col-lg-4">
                <div class="trade-outcome-card">
                  <div class="header d-flex flex-row align-items-start justify-content-between mb-4">
                    <div>
                      <h2>Trade Outcome Breakdown</h2>
                      <p>Distribution of trade outcomes</p>
                    </div>
                    <div class="menu-toggle" onclick="toggleDropdown(event)">
                      ⋮
                      <div id="cardDropdown" class="dropdown-menu">
                        <a href="#">Edit chart</a>
                        <a href="#">Export as image</a>
                        <a href="#">View details</a>
                      </div>
                    </div>
                  </div>
                  <canvas id="tradeChart" width="400" height="400"></canvas>
                </div>
              </div>
              <div class="col-lg-8 mt-3 mt-lg-0">
                <div class="trade-outcome-card">
                  <div class="header">
                    <div>
                      <h2>Most Profitable Assets</h2>
                      <p>Assets ranked by profitability</p>
                    </div>
                    <div class="tab chart-pills d-flex gap-1 flex-wrap">
                      <a href="#" class="nav-link active">Daily</a>
                      <a href="#" class="nav-link">Weekly</a>
                      <a href="#" class="nav-link">Monthly</a>
                      <a href="#" class="nav-link">Yearly</a>
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
                    <div class="heatmap-container-dropdown" id="dropdown-wrapper">
                      <button type="button" class="heatmap-dropdown-btn" id="dropdown-button" aria-haspopup="true" aria-expanded="true">
                        <span id="selected-option-text">Win Rate</span>
                        <i class="fa-solid fa-angle-down"></i>
                      </button>
                      <div class="heatmap-dropdown-options" id="dropdown-options">
                        <div class="heatmap-dropdown-option" data-value="Win Rate">Win Rate</div>
                        <div class="heatmap-dropdown-option" data-value="Profit Factor">Profit Factor</div>
                        <div class="heatmap-dropdown-option" data-value="Drawdown">Drawdown</div>
                      </div>
                    </div>
                  </div>
                  <div class="heatmap-container mt-3">
                    <div class="overflow-x-auto pb-2">
                      <table id="heatmap-table" class="heatmap-table">
                        <thead>
                          <tr id="header-row"></tr>
                        </thead>
                        <tbody id="data-rows"></tbody>
                      </table>
                    </div>
                    <div class="d-flex color-shade-box align-items-center justify-content-center mt-3">
                      <div class="legend-item-text"><span class="text">Low</span></div>
                      <div class="legend-item">
                        <div class="legend-color-box" style="background-color: #f87171"></div>
                        <div class="legend-color-box" style="background-color: #fcd34d"></div>
                        <div class="legend-color-box" style="background-color: #6ee7b7"></div>
                        <div class="legend-color-box" style="background-color: #34d399"></div>
                        <div class="legend-color-box" style="background-color: #10b981"></div>
                        <div class="legend-color-box" style="background-color: #059669"></div>
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
                    <div class="tab chart-pills d-flex gap-1 flex-wrap">
                      <a href="#" class="nav-link active">Daily</a>
                      <a href="#" class="nav-link">Weekly</a>
                      <a href="#" class="nav-link">Monthly</a>
                      <a href="#" class="nav-link">Yearly</a>
                    </div>
                  </div>
                  <canvas id="radarChart"></canvas>

                  <div class="row g-3 mt-2">
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Win Rate</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">72.3</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">63.7</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">8.7</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Risk/Reward</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">2.1</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">2.0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0.1</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Profit Factor</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">1.8</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">1.7</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">0.2</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Avg Trade Duration</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">42.4</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">56.0</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point decress">-13.6</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Consistency</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">82.1</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">66.4</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">15.7</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 d-flex align-items-lg-stretch">
                      <div class="stat-box">
                        <div class="stat-title">Discipline</div>
                        <div class="wrap">
                          <div class="stat-name">Current:</div>
                          <div class="stat-point current">79.6</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Previous:</div>
                          <div class="stat-point previous">73.5</div>
                        </div>
                        <div class="wrap">
                          <div class="stat-name">Change:</div>
                          <div class="stat-point change">6.0</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 mt-3 mt-lg-0">
                <div class="chart-card p-3">
                  <div class="chart-header">
                    <div>
                      <h2>Strategy Insights</h2>
                      <p>AI-powered trading recommendations</p>
                    </div>
                  </div>
                  <div class="strategy-card mt-3">
                    <div class="card-header">
                      <div class="icon-container"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                          <path d="M6.37619 10.5466C8.89017 10.5466 10.9282 8.50858 10.9282 5.9946C10.9282 3.48061 8.89017 1.44263 6.37619 1.44263C3.86221 1.44263 1.82422 3.48061 1.82422 5.9946C1.82422 8.50858 3.86221 10.5466 6.37619 10.5466Z" stroke="#18181B" stroke-width="0.910394" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M6.37669 8.72579C7.88508 8.72579 9.10787 7.503 9.10787 5.99461C9.10787 4.48622 7.88508 3.26343 6.37669 3.26343C4.8683 3.26343 3.64551 4.48622 3.64551 5.99461C3.64551 7.503 4.8683 8.72579 6.37669 8.72579Z" stroke="#18181B" stroke-width="0.910394" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M6.37621 6.90526C6.87901 6.90526 7.28661 6.49766 7.28661 5.99487C7.28661 5.49207 6.87901 5.08447 6.37621 5.08447C5.87342 5.08447 5.46582 5.49207 5.46582 5.99487C5.46582 6.49766 5.87342 6.90526 6.37621 6.90526Z" stroke="#18181B" stroke-width="0.910394" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></div>
                      <div class="text-content">
                        <h3 class="card-title">Adjust Risk/Reward Ratio</h3>
                        <p class="card-description">Your current risk/reward ratio is 1:1.5. Increasing it to 1:2 could improve profitability.</p>
                      </div>
                    </div>
                    <a href="#" class="review-link">Review setups <i class="fa-solid fa-arrow-right"></i></a>
                  </div>

                  <div class="strategy-card mt-3">
                    <div class="card-header">
                      <div class="icon-container"><i class="fa-solid fa-clock"></i></div>
                      <div class="text-content">
                        <h3 class="card-title">Optimize Trading Hours</h3>
                        <p class="card-description">Your win rate is 82% during US market hours. Consider adjusting schedule.</p>
                      </div>
                    </div>
                    <a href="#" class="review-link">View optimal hours <i class="fa-solid fa-arrow-right"></i></a>
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
                  <div class="recurring-container">
                    <table class="recurring-errors-table table-hover">
                      <thead>
                        <tr>
                          <th class="text-start">Error Type</th>
                          <th>Occurrences</th>
                          <th>Impact</th>
                          <th>Improvement</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-start">Exiting too early</td>
                          <td>18</td>
                          <td class="impact-red">Reduced profit potential by ~30%</td>
                          <td class="point-incress">+35%</td>
                        </tr>
                        <tr>
                          <td class="text-start">Over-leveraging</td>
                          <td>12</td>
                          <td class="impact-red">Increased risk exposure by 2.5x</td>
                          <td class="point-loss">-15%</td>
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
</main>

<!-- Log a New Trade pop-up Modal Start -->
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
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                <path d="M0.5 12.6665C0.501059 13.5502 0.852588 14.3975 1.47748 15.0224C2.10237 15.6472 2.9496 15.9988 3.83333 15.9998H13.1667C14.0504 15.9988 14.8976 15.6472 15.5225 15.0224C16.1474 14.3975 16.4989 13.5502 16.5 12.6665V6.6665H0.5V12.6665ZM11.8333 9.6665C12.0311 9.6665 12.2245 9.72515 12.3889 9.83503C12.5534 9.94492 12.6815 10.1011 12.7572 10.2838C12.8329 10.4665 12.8527 10.6676 12.8141 10.8616C12.7755 11.0556 12.6803 11.2338 12.5404 11.3736C12.4006 11.5135 12.2224 11.6087 12.0284 11.6473C11.8344 11.6859 11.6334 11.6661 11.4507 11.5904C11.2679 11.5147 11.1117 11.3865 11.0019 11.2221C10.892 11.0576 10.8333 10.8643 10.8333 10.6665C10.8333 10.4013 10.9387 10.1469 11.1262 9.9594C11.3138 9.77186 11.5681 9.6665 11.8333 9.6665ZM8.5 9.6665C8.69778 9.6665 8.89112 9.72515 9.05557 9.83503C9.22002 9.94492 9.34819 10.1011 9.42388 10.2838C9.49957 10.4665 9.51937 10.6676 9.48079 10.8616C9.4422 11.0556 9.34696 11.2338 9.20711 11.3736C9.06726 11.5135 8.88907 11.6087 8.69509 11.6473C8.50111 11.6859 8.30004 11.6661 8.11732 11.5904C7.93459 11.5147 7.77841 11.3865 7.66853 11.2221C7.55865 11.0576 7.5 10.8643 7.5 10.6665C7.5 10.4013 7.60536 10.1469 7.79289 9.9594C7.98043 9.77186 8.23478 9.6665 8.5 9.6665ZM5.16667 9.6665C5.36445 9.6665 5.55779 9.72515 5.72224 9.83503C5.88669 9.94492 6.01486 10.1011 6.09055 10.2838C6.16623 10.4665 6.18604 10.6676 6.14745 10.8616C6.10887 11.0556 6.01363 11.2338 5.87377 11.3736C5.73392 11.5135 5.55574 11.6087 5.36176 11.6473C5.16778 11.6859 4.96671 11.6661 4.78398 11.5904C4.60126 11.5147 4.44508 11.3865 4.3352 11.2221C4.22532 11.0576 4.16667 10.8643 4.16667 10.6665C4.16667 10.4013 4.27202 10.1469 4.45956 9.9594C4.6471 9.77186 4.90145 9.6665 5.16667 9.6665Z" fill="#858D9D" />
                <path d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z" fill="#858D9D" />
              </svg>
            </button>
          </div>
        </div>

        <div class="mb-2">
          <label for="tradingSession" class="form-label">Trading Session</label>
          <div class="position-relative">
            <input class="form-control" list="sessionOptions" name="trading_session" placeholder="Select/Type..." autocomplete="off">
            <datalist id="sessionOptions">
              <option value="Asian">
              <option value="London">
              <option value="New York">
              <option value="London/New York Overlap">
            </datalist>
          </div>
        </div>

        <div class="mb-2">
          <label for="financialInstrument" class="form-label">Financial Instrument</label>
          <div class="position-relative">
            <input class="form-control" list="instrumentOptions" name="financial_instrument" placeholder="Select/Type..." autocomplete="off">
            <datalist id="instrumentOptions">
              <option value="EUR/USD">
              <option value="GBP/USD">
              <option value="USD/JPY">
              <option value="XAU/USD">
              <option value="BTC/USD">
            </datalist>
          </div>
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
            <div class="position-relative">
              <input type="text" name="entry_time" id="entryTime" class="form-control" placeholder="00:00 AM" autocomplete="off" />
              <button type="button" class="calendar-icon position-absolute top-50 translate-middle-y" style="right: 1rem; border: none; background: none; pointer-events: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                  <path d="M0.5 12.6665C0.501059 13.5502 0.852588 14.3975 1.47748 15.0224C2.10237 15.6472 2.9496 15.9988 3.83333 15.9998H13.1667C14.0504 15.9988 14.8976 15.6472 15.5225 15.0224C16.1474 14.3975 16.4989 13.5502 16.5 12.6665V6.6665H0.5V12.6665Z" fill="#858D9D" />
                  <path d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z" fill="#858D9D" />
                </svg>
              </button>
            </div>
          </div>
          <div class="col-6">
            <label class="form-label">Exit Time</label>
            <div class="position-relative">
              <input type="text" name="exit_time" id="exitTime" class="form-control" placeholder="00:00 PM" autocomplete="off" />
              <button type="button" class="calendar-icon position-absolute top-50 translate-middle-y" style="right: 1rem; border: none; background: none; pointer-events: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                  <path d="M0.5 12.6665C0.501059 13.5502 0.852588 14.3975 1.47748 15.0224C2.10237 15.6472 2.9496 15.9988 3.83333 15.9998H13.1667C14.0504 15.9988 14.8976 15.6472 15.5225 15.0224C16.1474 14.3975 16.4989 13.5502 16.5 12.6665V6.6665H0.5V12.6665Z" fill="#858D9D" />
                  <path d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z" fill="#858D9D" />
                </svg>
              </button>
            </div>
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
<!-- Log a New Trade pop-up Modal End -->

<script>
  function toggleDropdown(event) {
    event.stopPropagation();
    const dropdown = document.getElementById("cardDropdown");
    if (dropdown) dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  }

  document.addEventListener("DOMContentLoaded", function() {

    // --- 1. MODAL LOGIC (FIXED) ---
    const modalWrapper = document.getElementById('tradeModalWrapper');
    const openBtns = document.querySelectorAll('.btn-log-trade'); // Handles all "Log Trade" buttons
    const closeBtns = document.querySelectorAll('.close-modal-btn, .btn-cancel');
    const saveBtn = document.getElementById('saveTradeBtn');

    if (modalWrapper) {
      // Open Modal
      openBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          // We use flex to center the modal, ensuring it overrides any 'none'
          modalWrapper.style.display = 'flex';
        });
      });

      // Close Modal
      closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          modalWrapper.style.display = 'none';
        });
      });

      // Close on Outside Click
      window.addEventListener('click', (e) => {
        if (e.target === modalWrapper) {
          modalWrapper.style.display = 'none';
        }
      });
    }

    // --- 2. FLATPICKR INITIALIZATION ---
    if (typeof flatpickr !== "undefined") {

      // Modal: Date of Operation
      flatpickr("#dateOfOperation", {
        dateFormat: "Y-m-d", // Standard format for database
        allowInput: true,
        position: "auto center",
        static: true, // Helps with positioning inside modals
        onValueUpdate: function(selectedDates, dateStr, instance) {
          instance.element.value = dateStr;
        },
      });

      // Modal: Time Pickers (Entry & Exit)
      const timeConfig = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K", // 12-hour format with AM/PM
        time_24hr: false,
        minuteIncrement: 1,
        allowInput: true,
        position: "auto center",
        static: true, // Helps with positioning inside modals
        onValueUpdate: function(selectedDates, dateStr, instance) {
          instance.element.value = dateStr;
        },
      };

      flatpickr("#entryTime", timeConfig);
      flatpickr("#exitTime", timeConfig);

      // Icon Click Handler (Opens the Flatpickr of the sibling input)
      document.querySelectorAll(".calendar-icon").forEach((btn) => {
        btn.addEventListener("click", (e) => {
          e.preventDefault();
          const input = btn.previousElementSibling;
          if (input && input._flatpickr) {
            input._flatpickr.toggle();
          }
        });
      });

      // Header: Date Range Filter (Replaced jQuery version with Flatpickr Range)
      flatpickr("#date-range-btn", {
        mode: "range",
        dateFormat: "Y-m-d",
        showMonths: 2,
        defaultDate: [
          new Date(new Date().setDate(new Date().getDate() - 29)),
          new Date()
        ],
        onChange: function(selectedDates, dateStr, instance) {
          if (selectedDates.length === 2) {
            const start = instance.formatDate(selectedDates[0], "d M Y");
            const end = instance.formatDate(selectedDates[1], "d M Y");
            const textEl = document.getElementById('date-range-text');
            if (textEl) textEl.textContent = `${start} - ${end}`;
          }
        }
      });
    }

    // --- 3. SAVE TRADE LOGIC ---
    if (saveBtn) {
      saveBtn.addEventListener('click', async function() {
        const btnOriginalText = saveBtn.innerText;
        saveBtn.innerText = 'Saving...';
        saveBtn.disabled = true;

        const form = document.getElementById('logTradeForm');
        const formData = new FormData(form);
        const payload = Object.fromEntries(formData.entries());

        try {
          const response = await axios.post("{{ route('daily-trading.store') }}", payload);

          if (response.data.success || response.status === 200) {
            alert('Trade Logged Successfully!');
            modalWrapper.style.display = 'none';
            form.reset();

            // Refresh logs & stats (Assuming these functions exist in global scope)
            if (typeof fetchTradeLogs === 'function') fetchTradeLogs();
            if (typeof fetchDashboardStats === 'function') fetchDashboardStats('daily');
          }
        } catch (error) {
          console.error(error);
          alert('Error saving trade: ' + (error.response?.data?.message || error.message));
        } finally {
          saveBtn.innerText = btnOriginalText;
          saveBtn.disabled = false;
        }
      });
    }

    // --- 4. FETCH DATA ---
    fetchTradeLogs();
    fetchDashboardStats('daily');
    loadMostProfitableAssets('daily');

    // Radar Chart Init
    if (typeof Chart !== 'undefined') {
      const ctxRadar = document.getElementById('radarChart');
      if (ctxRadar) {
        new Chart(ctxRadar, {
          type: 'radar',
          data: {
            labels: ['Win Rate', 'Risk/Reward', 'Profit Factor', 'Avg Duration', 'Consistency', 'Discipline'],
            datasets: [{
              label: 'Current',
              data: [72.3, 70, 60, 42.4, 82.1, 79.6],
              backgroundColor: 'rgba(16, 185, 129, 0.2)',
              borderColor: '#10b981',
            }]
          },
          options: {
            responsive: true
          }
        });
      }
    }

    // --- 5. TABS LOGIC ---
    const topTabs = document.querySelectorAll('.tab-pills .nav-link');
    topTabs.forEach(link => {
      link.addEventListener('click', function(e) {
        if (this.dataset.bsToggle !== 'pill') {
          topTabs.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
          const period = this.getAttribute('data-period') || 'daily';
          fetchDashboardStats(period);
        }
      });
    });

    // --- FUNCTIONS ---
    async function fetchTradeLogs() {
      try {
        const response = await axios.get("{{ route('daily-trading.data') }}");
        const logs = response.data;
        const tableBody = document.getElementById("trade-log-table-body");
        if (!tableBody) return;

        tableBody.innerHTML = "";
        if (logs.length === 0) {
          tableBody.innerHTML = `<tr><td colspan="14" class="text-center py-4 text-muted">No trades found.</td></tr>`;
          return;
        }

        logs.forEach((log) => {
          const row = `<tr>
                    <td><input class="form-check-input" type="checkbox" /></td>
                    <td class="text-start">${log.date_of_operation ?? '-'}</td>
                    <td>${log.trading_session ?? '-'}</td>
                    <td class="fw-bold">${log.financial_instrument ?? '-'}</td>
                    <td>${log.lot_size ?? '-'}</td>
                    <td>${log.position_type ?? '-'}</td>
                    <td>${log.risk_benefit_metrics ?? '-'}</td>
                    <td>${formatTime(log.entry_time)}</td>
                    <td>${formatTime(log.exit_time)}</td>
                    <td>${log.outcome ?? '-'}</td>
                    <td>${log.gross_profit ?? '-'}</td>
                    <td>${log.commission_details ?? '-'}</td>
                    <td class="fw-bold ${parseFloat(log.net_profit) >= 0 ? 'text-success' : 'text-danger'}">${log.net_profit ?? '-'}</td>
                    <td class="text-end">${log.trade_image_link ? `<a href="${log.trade_image_link}" target="_blank">View</a>` : '-'}</td>
                </tr>`;
          tableBody.insertAdjacentHTML("beforeend", row);
        });
      } catch (error) {
        console.error(error);
      }
    }

    async function fetchDashboardStats(period) {
      try {
        const response = await axios.get("{{ route('dashboard.stats') }}", {
          params: {
            period
          }
        });
        const data = response.data;

        const safeText = (id, txt) => {
          const el = document.getElementById(id);
          if (el) el.textContent = txt;
        };

        // 1. Total Holdings
        const totalEl = document.querySelector('#total-holding span');
        if (totalEl) totalEl.textContent = `$${safeNum(data.total_holdings)}`;

        // 2. Accumulated Profitability
        safeText('accumulated-profit-price', `$${safeNum(data.accumulated_profit)}`);
        safeText('accumulated-profit-daily-task', `${diffStr(data.accumulated_profit_diff)} from last period`);

        // 3. Win/Loss Rate (Removes existing % before adding one to avoid double %%)
        let wlRate = String(data.win_loss_rate ?? '0').replace('%', '');
        safeText('win-loss-price', wlRate + '%');
        safeText('win-loss-price-daily-task', `${diffStr(data.win_loss_diff)} from last period`);

        // 4. Risk/Reward Ratio (Checks for '1:' prefix to avoid '1:1:2.5')
        let rr = data.risk_reward_ratio ?? '0';
        let rrDisplay = String(rr).startsWith('1:') ? rr : `1:${rr}`;
        safeText('risk-reward-price', rrDisplay);
        safeText('risk-reward-daily-task', `${diffStr(data.risk_reward_diff)} from last period`);

        // 5. Average Trading Time
        safeText('avg-trading-time-price', data.avg_trading_time ?? '0h 0m');
        safeText('avg-trading-time-daily-task', `${data.avg_trading_time_diff ?? '+0m'} from last period`);

      } catch (error) {
        console.error("Error fetching stats:", error);
      }
    }

    async function loadMostProfitableAssets(period) {
      const tbody = document.querySelector("#profitableAssetsTable tbody");
      if (!tbody) return;
      try {
        const response = await axios.get("{{ route('dashboard.assets') }}", {
          params: {
            period
          }
        });
        const data = response.data;
        const items = data.data || data;
        if (items.length > 0) {
          tbody.innerHTML = "";
          items.forEach(row => {
            const tr = `<tr>
                        <td class="text-start">${row.asset || row.financial_instrument}</td>
                        <td class="${row.profit >= 0 ? 'profit' : 'loss'}">${row.profit >= 0 ? '+' : ''}$${safeNum(row.profit)}</td>
                        <td>${row.trades}</td>
                        <td>${row.win_rate}%</td>
                        <td class="${row.trend === 'up' ? 'trend-up' : 'trend-down'}"></td>
                    </tr>`;
            tbody.insertAdjacentHTML("beforeend", tr);
          });
        }
      } catch (error) {
        console.error(error);
      }
    }

    function formatTime(timeStr) {
      if (!timeStr) return '-';
      const [hour, minute] = timeStr.split(':');
      let h = parseInt(hour);
      const ampm = h >= 12 ? 'PM' : 'AM';
      h = h % 12 || 12;
      return `${h}:${minute} ${ampm}`;
    }

    function safeNum(n) {
      return n ? parseFloat(n).toFixed(2) : '0.00';
    }

    // Fix: Remove % if it exists before appending to avoid doubling
    function diffStr(val) {
      if (!val) return '+0%';
      let cleanVal = String(val).replace('%', '');
      let prefix = parseFloat(cleanVal) >= 0 ? '+' : '';
      return prefix + cleanVal + '%';
    }
  });
</script>

@endsection