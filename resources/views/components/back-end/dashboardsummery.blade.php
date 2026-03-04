@extends('layout.dashboard-sidenav')
@section('title', 'Admin Dashboard')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<main class="container-fluid px-md-5">
  <div class="main-content pb-4">

    <div class="header-box d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 mb-3 mt-4">
      <h2 class="dashboard-title">Dashboard</h2>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-end align-items-md-end mb-3">
      <div class="tab tab-pills d-flex gap-1 flex-wrap" role="tablist">
        <a class="nav-link active" id="daily-tab" data-period="daily" type="button" role="tab">Daily</a>
        <a class="nav-link" id="weekly-tab" data-period="weekly" type="button" role="tab">Weekly</a>
        <a class="nav-link" id="monthly-tab" data-period="monthly" type="button" role="tab">Monthly</a>
        <a class="nav-link" id="yearly-tab" data-period="yearly" type="button" role="tab">Yearly</a>
        <a class="nav-link" id="all-time-tab" data-period="all_time" type="button" role="tab">All Time</a>
      </div>

      <div class="button-box d-flex flex-sm-row gap-2 mt-3 mt-md-0">
        <button type="button" class="btn-new-page">Start a New Page</button>
        <button type="button" class="btn-log-trade">Log a New Trade</button>
      </div>
    </div>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="dynamic-content" role="tabpanel">
        <div class="row g-3">

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Total Holding</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" viewBox="0 0 10 16" fill="none">
                      <path d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="total-holding" class="price">$0.00</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Profitable Trades</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                      <path d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="profitable-trades" class="price">0</p>
                  <p id="profitable-trades-daily-task" class="daily-task">0 from last period</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Total Trades Made</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                      <path d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="total-trades-made" class="price">0</p>
                  <p id="total-trades-made-daily-task" class="daily-task">0 from last period</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0">
            <div class="card-item">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h3 class="title">Active Pages</h3>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16" fill="none">
                      <path d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301" stroke="#71717A" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                </div>
                <div>
                  <p id="active-pages" class="price">0</p>
                  <p id="active-pages-daily-task" class="daily-task">Active folders count</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="latest-news mt-5">
      <div class="d-flex flex-row justify-content-between align-items-center my-3">
        <h3 class="title mb-0">Latest News</h3>
        <a href="#" class="view-all-btn mt-2 mt-md-0"> View All</a>
      </div>
      <div class="latest-news-content">
        <div class="row g-3" id="latest-news-wrapper">
          <div class="col-12 text-center text-muted py-4">Loading real-time news...</div>
        </div>
      </div>
    </div>

    <div class="daily-trend mt-5">
      <div class="header-row d-flex flex-row justify-content-between align-items-center my-3">
        <h5 class="section-title">Daily Trends</h5>
        <div class="swiper-nav-buttons">
          <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide">
            <i class="fa-solid fa-angle-left"></i>
          </div>
          <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide">
            <i class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </div>
      <div class="swiper trendSwiper">
        <div class="swiper-wrapper" id="daily-trends-wrapper">
        </div>
      </div>
    </div>

    <div class="profitable-assets mt-5">
      <div class="d-flex justify-content-start align-items-center my-3">
        <h3 class="title mb-0">Most Profitable Assets</h3>
      </div>
      <div class="profitable-content">
        <div class="row g-3" id="profitable-assets-wrapper">
          <div class="col-12 text-center text-muted py-4">Loading assets...</div>
        </div>
      </div>
    </div>

    <div class="trends-table mt-5">
      <div class="mb-3">
        <h3 class="title mb-0">Best Trades Executed</h3>
      </div>

      <div class="d-flex flex-column gap-2 flex-sm-row justify-content-between mb-3">
        <div class="d-flex align-items-center gap-2">
          <button id="date-range-btn" class="btn btn-custom d-flex align-items-center gap-2">
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
          <button type="button" class="btn btn-download">Download Report</button>
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
          <tbody id="best-trades-tbody">
            <tr>
              <td colspan="14" class="text-center py-4 text-muted">Loading trades...</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="pagination-container d-flex gap-2 flex-column flex-sm-row justify-content-between mt-3">
        <span id="selected-entries-text">Showing 0 entries</span>
        <ul class="pagination m-0" id="best-trades-pagination">
        </ul>
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

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

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
          },
          {
            type: 'error',
            background: '#ff6363',
            icon: {
              className: 'fa-solid fa-circle-xmark',
              tagName: 'i',
              color: '#fff'
            }
          }
        ]
      });
    }

    if (notyfInstance) {
      type === 'success' ? notyfInstance.success(message) : notyfInstance.error(message);
    } else {
      alert(message); // Fallback if CDN fails
    }
  }

  document.addEventListener("DOMContentLoaded", function() {

    let currentPeriod = 'daily';
    let currentStartDate = '';
    let currentEndDate = '';
    window.currentPagination = null;

    // --- MODAL & LOGIC START ---
    const modalWrapper = document.getElementById('tradeModalWrapper');
    const openBtns = document.querySelectorAll('.btn-log-trade');
    const closeBtns = document.querySelectorAll('.close-modal-btn, .btn-cancel');
    const saveBtn = document.getElementById('saveTradeBtn');

    if (modalWrapper) {
      openBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          modalWrapper.style.display = 'flex';
        });
      });

      closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          modalWrapper.style.display = 'none';
        });
      });

      window.addEventListener('click', (e) => {
        if (e.target === modalWrapper) {
          modalWrapper.style.display = 'none';
        }
      });
    }

    if (typeof flatpickr !== "undefined") {
      flatpickr("#dateOfOperation", {
        dateFormat: "Y-m-d",
        allowInput: true,
        position: "auto center",
        static: true
      });

      const timeConfig = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",
        time_24hr: false,
        minuteIncrement: 1,
        allowInput: true,
        position: "auto center",
        static: true
      };

      flatpickr("#entryTime", timeConfig);
      flatpickr("#exitTime", timeConfig);

      document.querySelectorAll(".calendar-icon").forEach((btn) => {
        btn.addEventListener("click", (e) => {
          e.preventDefault();
          const input = btn.previousElementSibling;
          if (input && input._flatpickr) {
            input._flatpickr.toggle();
          }
        });
      });
    }

    if (saveBtn) {
      saveBtn.addEventListener('click', async function() {
        const btnOriginalText = saveBtn.innerText;
        saveBtn.innerText = 'Saving...';
        saveBtn.disabled = true;

        const form = document.getElementById('logTradeForm');
        const formData = new FormData(form);
        const payload = Object.fromEntries(formData.entries());

        try {
          const response = await fetch("{{ route('daily-trading.store') }}", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify(payload)
          });

          const result = await response.json();

          if (response.ok || result.success) {
            showToast('success', 'Trade Logged Successfully!');
            modalWrapper.style.display = 'none';
            form.reset();

            loadTradeStats(currentPeriod);
            loadMostProfitableAssets(currentPeriod);
            loadBestTrades(1);
            loadDailyTrends();
          } else {
            showToast('error', 'Error saving trade!');
          }
        } catch (error) {
          console.error(error);
          showToast('error', 'Error saving trade!');
        } finally {
          saveBtn.innerText = btnOriginalText;
          saveBtn.disabled = false;
        }
      });
    }
    // --- MODAL & LOGIC END ---

    // 1. Tabs Logic
    const tabs = document.querySelectorAll(".tab-pills .nav-link");
    tabs.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        e.preventDefault();

        tabs.forEach((t) => t.classList.remove("active"));
        tab.classList.add("active");

        currentPeriod = tab.getAttribute('data-period');
        currentStartDate = '';
        currentEndDate = '';

        const textEl = document.getElementById('date-range-text');
        if (textEl) textEl.textContent = 'Select Date Range';

        loadTradeStats(currentPeriod);
        loadMostProfitableAssets(currentPeriod);
        if (typeof loadBestTrades === 'function') loadBestTrades(1);
      });
    });

    // 2. Initial Load calls
    try {
      loadTradeStats(currentPeriod);
    } catch (e) {
      console.error(e);
    }
    try {
      loadMostProfitableAssets(currentPeriod);
    } catch (e) {
      console.error(e);
    }
    try {
      loadBestTrades(1);
    } catch (e) {
      console.error(e);
    }
    try {
      loadDailyTrends();
    } catch (e) {
      console.error(e);
    }
    try {
      loadLatestNews();
    } catch (e) {
      console.error(e);
    }

    // 3. Stats Fetch Function
    async function loadTradeStats(period) {
      try {
        let url = `/dashboard/trade-stats?period=${period}`;
        if (period === 'custom' && currentStartDate && currentEndDate) {
          url += `&start_date=${currentStartDate}&end_date=${currentEndDate}`;
        }

        const response = await fetch(url);
        const jsonResponse = await response.json();
        const data = jsonResponse.data || jsonResponse;

        document.getElementById("total-holding").innerText = "$" + parseFloat(data.total_holding || 0).toLocaleString('en-US', {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });
        document.getElementById("profitable-trades").innerText = parseInt(data.profitable_trades || 0).toLocaleString('en-US');
        const profTask = document.getElementById("profitable-trades-daily-task");
        if (profTask) profTask.innerText = period === 'all_time' ? "All time records" : `${data.profitable_diff || 0} from last period`;

        document.getElementById("total-trades-made").innerText = parseInt(data.total_trades_made || 0).toLocaleString('en-US');
        const totalTask = document.getElementById("total-trades-made-daily-task");
        if (totalTask) totalTask.innerText = period === 'all_time' ? "All time records" : `${data.total_diff || 0} from last period`;

        document.getElementById("active-pages").innerText = parseInt(data.active_pages || 0).toLocaleString('en-US');
        const activeTask = document.getElementById("active-pages-daily-task");
        if (activeTask) activeTask.innerText = "Active folders count";

      } catch (error) {
        console.error("Stats API Error:", error);
      }
    }

    // 4. Latest News Fetch
    async function loadLatestNews() {
      try {
        const response = await fetch("/api/dashboard/latest-news");
        if (!response.ok) throw new Error("News API Failed");

        const resData = await response.json();
        const newsData = resData.data;

        const newsWrapper = document.getElementById('latest-news-wrapper');
        if (!newsWrapper) return;
        newsWrapper.innerHTML = '';

        newsData.forEach(news => {
          const isPos = news.percentage.includes('+');
          const color = isPos ? '#00b29c' : '#ff6363';
          const imgSrc = news.image.startsWith('http') ? news.image : `https://www.cryptocompare.com${news.image}`;

          const card = `
          <div class="col-12 col-md-6 col-lg-3 col-xxl-2 d-flex align-items-stretch m-0">
            <div class="card-item" style="cursor:pointer;" onclick="window.open('${news.url}', '_blank')">
              <div class="card-body d-flex align-items-start gap-2">
                <img src="${imgSrc}" alt="News">
                <div class="details">
                  <p class="desc">${news.title}</p>
                  <div class="others d-flex flex-wrap flex-column flex-sm-row gap-1 align-items-start justify-content-between">
                    <h4 class="brand m-0">${news.brand}<span class="m-2" style="font-size: 12px; color: ${color}">${news.percentage}</span></h4>
                    <p class="timing m-0">${news.source} 
                      <span>
                        <svg width="2" height="2" viewBox="0 0 2 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1.21875 1.85742C1.01172 1.85742 0.832031 1.7832 0.679688 1.63477C0.53125 1.48242 0.457031 1.30273 0.457031 1.0957C0.457031 0.884766 0.53125 0.705078 0.679688 0.556641C0.832031 0.408203 1.01172 0.333984 1.21875 0.333984C1.42969 0.333984 1.60938 0.408203 1.75781 0.556641C1.90625 0.705078 1.98047 0.884766 1.98047 1.0957C1.98047 1.30273 1.90625 1.48242 1.75781 1.63477C1.60938 1.7832 1.42969 1.85742 1.21875 1.85742Z" fill="currentColor"></path>
                        </svg>
                      </span>
                      ${news.time}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>`;
          newsWrapper.insertAdjacentHTML('beforeend', card);
        });
      } catch (error) {
        console.error('Latest News Load Failed:', error);
      }
    }

    // 5. Daily Trends Swiper
    async function loadDailyTrends() {
      try {
        const response = await fetch("/daily-trends-data");
        const data = await response.json();
        const swiperWrapper = document.getElementById('daily-trends-wrapper');
        if (!swiperWrapper) return;

        swiperWrapper.innerHTML = '';

        data.forEach(item => {
          let valueClass = 'neutral';
          if (item.profit.includes('+') && item.profit !== '+$0.00' && item.profit !== '$0.00') {
            valueClass = 'positive';
          } else if (item.profit.includes('-')) {
            valueClass = 'negative';
          }

          const slide = `
            <div class="swiper-slide">
              <div class="card-item">
                <div class="card-body d-flex flex-column justify-content-between">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3 class="date">${item.day} <span>${item.weekday}</span></h3>
                    <span class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
                        <path d="M19.4522 7.65377V19.1952C19.4522 19.6899 19.0571 20.0895 18.5698 20.0895H4.34579C3.85861 20.0895 3.46338 19.6952 3.46338 19.2086V3.20514C3.46338 2.7286 3.86195 2.32416 4.35361 2.32416H14.1198L19.4522 7.65377ZM17.6757 8.54204H13.2343V4.1007H5.23992V18.313H17.6757V8.54204Z" fill="#9B9B9B"></path>
                      </svg>
                    </span>
                  </div>
                  <div>
                    <p class="value ${valueClass}">${item.profit}</p>
                    <p class="trends">${item.trades}</p>
                  </div>
                </div>
              </div>
            </div>`;
          swiperWrapper.insertAdjacentHTML('beforeend', slide);
        });

        if (typeof Swiper !== 'undefined') {
          new Swiper(".trendSwiper", {
            slidesPerView: 2,
            spaceBetween: 15,
            observer: true,
            observeParents: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            },
            breakpoints: {
              640: {
                slidesPerView: 3
              },
              768: {
                slidesPerView: 4
              },
              1024: {
                slidesPerView: 5
              },
              1200: {
                slidesPerView: 6
              }
            },
          });
        }
      } catch (error) {
        console.error('Daily Trends API Failed:', error);
      }
    }

    // 6. Most Profitable Assets Fetch
    async function loadMostProfitableAssets(period) {
      try {
        let url = `/dashboard/assets?period=${period}`;
        if (period === 'custom' && currentStartDate && currentEndDate) {
          url += `&start_date=${currentStartDate}&end_date=${currentEndDate}`;
        }
        const response = await fetch(url);
        const res = await response.json();
        const items = res.data || res;

        const wrapper = document.getElementById('profitable-assets-wrapper');
        if (!wrapper) return;
        wrapper.innerHTML = '';

        items.slice(0, 4).forEach((row, index) => {
          const isProfit = row.profit >= 0;
          const sign = isProfit ? '+' : '';
          const shortName = (row.asset || 'N/A').substring(0, 3);

          const card = `
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3 d-flex align-items-stretch m-0">
                  <div class="card-item">
                    <div class="card-body">
                      <div class="details">
                        <div class="brand-box">
                          <span class="icon">
                            <div style="width:38px; height:38px; background:var(--bg-black); border-radius:50%; display:flex; align-items:center; justify-content:center; color:var(--text7); font-weight:bold; font-size:12px;">${shortName}</div>
                          </span>
                          <div class="wrapper">
                            <h3 class="name">${row.asset || 'N/A'}</h3>
                            <span class="sub-dtls">${row.trades} Trades</span>
                          </div>
                        </div>
                        <div class="others d-flex flex-wrap flex-row gap-1 align-items-end">
                          <h4 class="price m-0">${sign}$${formatNumber(row.profit)}</h4>
                          <p class="timing m-0 ${isProfit ? 'text-success' : 'text-danger'}">${row.win_rate}% Win Rate</p>
                        </div>
                      </div>
                      <div class="chart mt-2">
                        <canvas id="profChart${index}" style="display: block; box-sizing: border-box; height: 90px; width: 100%;"></canvas>
                      </div>
                    </div>
                  </div>
                </div>`;
          wrapper.insertAdjacentHTML('beforeend', card);

          setTimeout(() => {
            const ctx = document.getElementById(`profChart${index}`);
            if (ctx && typeof Chart !== 'undefined') {
              new Chart(ctx, {
                type: 'line',
                data: {
                  labels: ['1', '2', '3', '4', '5', '6'],
                  datasets: [{
                    data: isProfit ? [10, 20, 15, 30, 25, 40] : [40, 30, 35, 20, 25, 10],
                    borderColor: isProfit ? '#00b29c' : '#ff6363',
                    borderWidth: 2,
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
                    x: {
                      display: false
                    },
                    y: {
                      display: false
                    }
                  },
                  elements: {
                    point: {
                      radius: 0
                    }
                  }
                }
              });
            }
          }, 100);
        });
      } catch (error) {
        console.error("Profitable Assets API Failed:", error);
      }
    }

    // --- 7. BEST TRADES TABLE LOGIC ---
    if (typeof $ !== 'undefined' && $.fn.daterangepicker) {
      let existingPicker = $('#date-range-btn').data('daterangepicker');
      if (existingPicker) existingPicker.remove();

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

        loadTradeStats(currentPeriod);
        loadMostProfitableAssets(currentPeriod);
        loadBestTrades(1);
      });

      $('#date-range-btn').on('cancel.daterangepicker', function(ev, picker) {
        $('#date-range-text').html('Select Date Range');
        currentStartDate = '';
        currentEndDate = '';
        const dailyTab = document.getElementById('daily-tab');
        if (dailyTab) dailyTab.click();
      });
    }

    const columnLinks = document.querySelectorAll('.dropdown-menu .dropdown-item');
    const colMap = {
      'Date': 2,
      'Session': 3,
      'Instrument': 4
    };

    columnLinks.forEach(link => {
      const colName = link.textContent.trim();
      link.innerHTML = `<i class="fa-solid fa-check text-success" style="width:16px;"></i> ${colName}`;
      link.dataset.visible = 'true';

      link.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const colIdx = colMap[colName];
        if (!colIdx) return;

        const isVisible = this.dataset.visible === 'true';
        this.dataset.visible = !isVisible;

        this.innerHTML = !isVisible ?
          `<i class="fa-solid fa-check text-success" style="width:16px;"></i> ${colName}` :
          `<span style="width:16px; display:inline-block;"></span> ${colName}`;

        const th = document.querySelector(`.trends-table table thead tr th:nth-child(${colIdx})`);
        if (th) th.style.display = !isVisible ? '' : 'none';

        document.querySelectorAll(`.trends-table table tbody tr`).forEach(tr => {
          const td = tr.querySelector(`td:nth-child(${colIdx})`);
          if (td) td.style.display = !isVisible ? '' : 'none';
        });
      });
    });

    const downloadBtn = document.querySelector('.btn-download');
    if (downloadBtn) {
      downloadBtn.addEventListener('click', function() {
        let csvContent = "data:text/csv;charset=utf-8,";
        const table = document.querySelector('.trends-table table');
        const rows = table.querySelectorAll('tr');

        rows.forEach(function(row) {
          let rowData = [];
          const cols = row.querySelectorAll('th, td');
          cols.forEach((col, idx) => {
            if (col.style.display !== 'none' && idx !== 0 && idx !== 13) {
              let text = col.innerText.replace(/"/g, '""');
              rowData.push(`"${text}"`);
            }
          });
          if (rowData.length > 0) csvContent += rowData.join(",") + "\r\n";
        });

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "Best_Trades_Report.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      });
    }

    document.addEventListener('change', function(e) {
      if (e.target && e.target.id === 'selectAll') {
        document.querySelectorAll(".row-checkbox").forEach(cb => {
          cb.checked = e.target.checked;
          cb.closest('tr').classList.toggle('table-row-selected', e.target.checked);
        });
      }
      if (e.target && e.target.classList.contains('row-checkbox')) {
        e.target.closest('tr').classList.toggle('table-row-selected', e.target.checked);
        const allChecked = document.querySelectorAll('.row-checkbox:checked').length === document.querySelectorAll('.row-checkbox').length;
        const selectAllEl = document.getElementById('selectAll');
        if (selectAllEl) selectAllEl.checked = allChecked;
      }
    });

    async function loadBestTrades(page = 1) {
      try {
        let url = `/dashboard/best-trades?page=${page}&period=${currentPeriod}`;
        if (currentStartDate && currentEndDate) {
          url += `&start_date=${currentStartDate}&end_date=${currentEndDate}`;
        }

        const response = await fetch(url);
        const responseData = await response.json();
        const trades = responseData.data || responseData.best_trades || responseData || [];
        const pagination = responseData.data ? responseData : {
          total: trades.length,
          current_page: 1,
          last_page: 1
        };
        window.currentPagination = pagination;

        const tableBody = document.getElementById("best-trades-tbody");
        if (!tableBody) return;
        tableBody.innerHTML = "";

        const selectAll = document.getElementById('selectAll');
        if (selectAll) selectAll.checked = false;

        if (trades.length === 0) {
          tableBody.innerHTML = `<tr><td colspan="14" class="text-center py-4 text-muted">No trades found.</td></tr>`;
          document.querySelector('.pagination-container').style.display = 'none';
          return;
        }

        document.querySelector('.pagination-container').style.display = 'flex';

        let hiddenCols = [];
        document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(link => {
          if (link.dataset.visible === 'false') {
            const colName = link.textContent.trim();
            if (colMap[colName]) hiddenCols.push(colMap[colName]);
          }
        });

        trades.forEach((trade) => {
          const formatTime = (t) => {
            if (!t) return '-';
            const [h, m] = t.split(':');
            return `${h%12||12}:${m} ${h>=12?'PM':'AM'}`;
          };

          const isWin = trade.outcome === 'Win' || parseFloat(trade.net_profit) > 0;
          const netProfitColor = isWin ? 'text-success' : 'text-danger';

          const row = `
                <tr>
                    <td><input class="form-check-input row-checkbox" type="checkbox" /></td>
                    <td class="text-start" ${hiddenCols.includes(2) ? 'style="display:none;"' : ''}>${trade.date_of_operation ?? '-'}</td>
                    <td ${hiddenCols.includes(3) ? 'style="display:none;"' : ''}>${trade.trading_session ?? "-"}</td>
                    <td class="fw-bold" ${hiddenCols.includes(4) ? 'style="display:none;"' : ''}>${trade.financial_instrument ?? "-"}</td>
                    <td>${trade.lot_size ?? "-"}</td>
                    <td>${trade.position_type ?? "-"}</td>
                    <td>${trade.risk_benefit_metrics ?? "-"}</td>
                    <td>${formatTime(trade.entry_time)}</td>
                    <td>${formatTime(trade.exit_time)}</td>
                    <td>${trade.outcome ?? "-"}</td>
                    <td>$${formatNumber(trade.gross_profit)}</td>
                    <td>$${formatNumber(trade.commission_details)}</td>
                    <td class="${netProfitColor} fw-bold">$${formatNumber(trade.net_profit)}</td>
                    <td class="text-end">${trade.trade_image_link ? `<a href="${trade.trade_image_link}" target="_blank" class="text-primary text-decoration-underline">View</a>` : "-"}</td>
                </tr>`;
          tableBody.insertAdjacentHTML("beforeend", row);
        });

        updatePaginationUI(pagination);
      } catch (error) {
        console.error("Best Trades API Failed:", error);
      }
    }

    function updatePaginationUI(pagination) {
      const infoText = document.getElementById('selected-entries-text');
      if (infoText) infoText.textContent = `Showing ${pagination.from || 0} to ${pagination.to || 0} of ${pagination.total} entries.`;

      const paginationUl = document.getElementById('best-trades-pagination');
      if (!paginationUl) return;

      let paginationHTML = '';

      if (pagination.prev_page_url) {
        paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="window.loadBestTradesPage(${pagination.current_page - 1}); return false;">Prev</a></li>`;
      } else {
        paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>`;
      }

      for (let i = 1; i <= pagination.last_page; i++) {
        paginationHTML += `<li class="page-item ${i === pagination.current_page ? 'active' : ''}"><a class="page-link" href="#" onclick="window.loadBestTradesPage(${i}); return false;">${i}</a></li>`;
      }

      if (pagination.next_page_url) {
        paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="window.loadBestTradesPage(${pagination.current_page + 1}); return false;">Next</a></li>`;
      } else {
        paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>`;
      }

      paginationUl.innerHTML = paginationHTML;
    }

    window.loadBestTradesPage = loadBestTrades;

    function formatNumber(num) {
      return num ? parseFloat(num).toFixed(2) : "0.00";
    }

  });
</script>

@endsection