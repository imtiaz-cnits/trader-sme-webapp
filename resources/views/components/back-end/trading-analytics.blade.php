@extends('layout.dashboard-sidenav')
@section('title', 'Admin Dashboard')
@section('content')

   <!--Dashboard Main Content -->
    <main class="container-fluid px-md-5">
      <div class="main-content pb-4">
        <!-- Dashboard Tab Content Start -->
        <div
          class="header-box d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 mb-3 mt-4"
        >
          <h2 class="dashboard-title">Dashboard</h2>

          <p id="total-holding" class="total-holding">Total Holdings: <span></span></p>
        </div>

        <!-- Tabs and Buttons -->
        <div class="d-flex flex-row align-items-center mb-3">
          <!-- Tabs -->
          <div class="tab tab-pills d-flex gap-1 flex-wrap" role="tablist">
            <a
              class="nav-link active"
              id="daily-tab"
              data-bs-toggle="pill"
              data-bs-target="#daily-content"
              type="button"
              role="tab"
              aria-controls="daily-content"
              aria-selected="true"
              >Daily</a
            >
            <a
              class="nav-link"
              id="weekly-tab"
              data-bs-toggle="pill"
              data-bs-target="#weekly-content"
              type="button"
              role="tab"
              aria-controls="weekly-content"
              aria-selected="false"
              >Weekly</a
            >
            <a
              class="nav-link"
              id="monthly-tab"
              data-bs-toggle="pill"
              data-bs-target="#monthly-content"
              type="button"
              role="tab"
              aria-controls="monthly-content"
              aria-selected="false"
              >Monthly</a
            >
            <a
              class="nav-link"
              id="yearly-tab"
              data-bs-toggle="pill"
              data-bs-target="#yearly-content"
              type="button"
              role="tab"
              aria-controls="yearly-content"
              aria-selected="false"
              >Yearly</a
            >
            <a
              class="nav-link"
              id="all-time-tab"
              data-bs-toggle="pill"
              data-bs-target="#all-time-content"
              type="button"
              role="tab"
              aria-controls="all-time-content"
              aria-selected="false"
              >All Time</a
            >
          </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
          <!-- Daily Tab Content -->
          <div
            class="tab-pane fade show active"
            id="daily-content"
            role="tabpanel"
            aria-labelledby="daily-tab"
          >
            <!-- Stats Cards Grid -->
            <div class="row g-3">
              <!-- Card 1: Total Holding -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Win/Loss Rate</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="10"
                          height="16"
                          viewBox="0 0 10 16"
                          fill="none"
                        >
                          <path
                            d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p id="win-loss-price" class="price">75%</p>
                      <p id="win-loss-price-daily-task" class="daily-task">+20.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 2: Profitable Trades -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Accumulated Profitability</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p id="accumulated-profit-price" class="price">$12,540.45</p>
                      <p id="accumulated-profit-daily-task"class="daily-task">+180.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 3: Total Trades Made -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Risk/Reward Ratio</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p id="risk-reward-price" class="price">1:2.5</p>
                      <p id="risk-reward-daily-task" class="daily-task">+19% since last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 4: Active Pages -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Average Trading Time</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                        >
                          <path
                            d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p id="avg-trading-time-price" class="price">2h 15m</p>
                      <p id="avg-trading-time-daily-task" class="daily-task">+10m since last day</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Weekly Tab Content -->
          <div
            class="tab-pane fade"
            id="weekly-content"
            role="tabpanel"
            aria-labelledby="weekly-tab"
          >
            <div class="row g-3">
              <!-- Card 1: Total Holding -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Win/Loss Rate</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="10"
                          height="16"
                          viewBox="0 0 10 16"
                          fill="none"
                        >
                          <path
                            d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">75%</p>
                      <p class="daily-task">+20.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 2: Profitable Trades -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Accumulated Profitability</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">$12,540.45</p>
                      <p class="daily-task">+180.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 3: Total Trades Made -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Risk/Reward Ratio</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">1:2.5</p>
                      <p class="daily-task">+19% since last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 4: Active Pages -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Average Trading Time</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                        >
                          <path
                            d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">2h 15m</p>
                      <p class="daily-task">+10m since last day</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Monthly Tab Content -->
          <div
            class="tab-pane fade"
            id="monthly-content"
            role="tabpanel"
            aria-labelledby="monthly-tab"
          >
            <div class="row g-3">
              <!-- Card 1: Total Holding -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Win/Loss Rate</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="10"
                          height="16"
                          viewBox="0 0 10 16"
                          fill="none"
                        >
                          <path
                            d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">75%</p>
                      <p class="daily-task">+20.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 2: Profitable Trades -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Accumulated Profitability</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">$12,540.45</p>
                      <p class="daily-task">+180.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 3: Total Trades Made -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Risk/Reward Ratio</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">1:2.5</p>
                      <p class="daily-task">+19% since last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 4: Active Pages -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Average Trading Time</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                        >
                          <path
                            d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">2h 15m</p>
                      <p class="daily-task">+10m since last day</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Yearly Tab Content -->
          <div
            class="tab-pane fade"
            id="yearly-content"
            role="tabpanel"
            aria-labelledby="yearly-tab"
          >
            <div class="row g-3">
              <!-- Card 1: Total Holding -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Win/Loss Rate</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="10"
                          height="16"
                          viewBox="0 0 10 16"
                          fill="none"
                        >
                          <path
                            d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">75%</p>
                      <p class="daily-task">+20.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 2: Profitable Trades -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Accumulated Profitability</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">$12,540.45</p>
                      <p class="daily-task">+180.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 3: Total Trades Made -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Risk/Reward Ratio</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">1:2.5</p>
                      <p class="daily-task">+19% since last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 4: Active Pages -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Average Trading Time</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                        >
                          <path
                            d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">2h 15m</p>
                      <p class="daily-task">+10m since last day</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- All Time Tab Content -->
          <div
            class="tab-pane fade"
            id="all-time-content"
            role="tabpanel"
            aria-labelledby="all-time-tab"
          >
            <div class="row g-3">
              <!-- Card 1: Total Holding -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Win/Loss Rate</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="10"
                          height="16"
                          viewBox="0 0 10 16"
                          fill="none"
                        >
                          <path
                            d="M5 1.33333V14.6667M8.33333 3.33333H3.33333C2.71449 3.33333 2.121 3.57916 1.68342 4.01675C1.24583 4.45433 1 5.04782 1 5.66666C1 6.2855 1.24583 6.87899 1.68342 7.31658C2.121 7.75416 2.71449 7.99999 3.33333 7.99999H6.66667C7.28551 7.99999 7.879 8.24583 8.31658 8.68341C8.75417 9.121 9 9.71449 9 10.3333C9 10.9522 8.75417 11.5457 8.31658 11.9832C7.879 12.4208 7.28551 12.6667 6.66667 12.6667H1"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">75%</p>
                      <p class="daily-task">+20.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 2: Profitable Trades -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Accumulated Profitability</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M11.0003 14V12.6667C11.0003 11.9594 10.7194 11.2811 10.2193 10.781C9.71918 10.281 9.0409 10 8.33366 10H4.33366C3.62641 10 2.94814 10.281 2.44804 10.781C1.94794 11.2811 1.66699 11.9594 1.66699 12.6667V14M15.0003 14V12.6667C14.9999 12.0758 14.8032 11.5018 14.4412 11.0349C14.0792 10.5679 13.5724 10.2344 13.0003 10.0867M11.0003 2.08667C11.5739 2.23353 12.0823 2.56713 12.4454 3.03487C12.8085 3.50261 13.0056 4.07789 13.0056 4.67C13.0056 5.26211 12.8085 5.83739 12.4454 6.30513C12.0823 6.77287 11.5739 7.10647 11.0003 7.25333M9.00033 4.66667C9.00033 6.13943 7.80642 7.33333 6.33366 7.33333C4.8609 7.33333 3.66699 6.13943 3.66699 4.66667C3.66699 3.19391 4.8609 2 6.33366 2C7.80642 2 9.00033 3.19391 9.00033 4.66667Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">$12,540.45</p>
                      <p class="daily-task">+180.1% from last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 3: Total Trades Made -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Risk/Reward Ratio</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                        >
                          <path
                            d="M2 6.66666H15.3333M3.33333 3.33333H14C14.7364 3.33333 15.3333 3.93028 15.3333 4.66666V11.3333C15.3333 12.0697 14.7364 12.6667 14 12.6667H3.33333C2.59695 12.6667 2 12.0697 2 11.3333V4.66666C2 3.93028 2.59695 3.33333 3.33333 3.33333Z"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">1:2.5</p>
                      <p class="daily-task">+19% since last day</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 4: Active Pages -->
              <div
                class="col-12 col-sm-6 col-lg-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div
                    class="card-body d-flex flex-column justify-content-between"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between mb-3"
                    >
                      <h3 class="title">Average Trading Time</h3>
                      <span class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                        >
                          <path
                            d="M14.6663 8H11.9997L9.99967 14L5.99967 2L3.99967 8H1.33301"
                            stroke="#71717A"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                    <div>
                      <p class="price">2h 15m</p>
                      <p class="daily-task">+10m since last day</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Dashboard Tab Content End -->


          <!-- Profit/loss Over Time Start -->
          <div class="box-wrapper">
            <div class="row">
              <!-- Profit/loss Over Time Chart -->
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
              <!-- Asset Performance Chart -->
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

          <!-- Trade Outcome or Table Start -->
          <div class="box-wrapper mt-4">
            <div class="row">
              <!-- Pie Chart Chart -->
              <div class="col-lg-4">
                <div class="trade-outcome-card">
                  <div
                    class="header d-flex flex-row align-items-start justify-content-between mb-4"
                  >
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
              <!-- Most Profitable Assets Table Start -->
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
                    <table class="profitable-assets-table table-hover">
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
                          <td class="text-start">NASDAQ</td>
                          <td class="profit">+$5,100</td>
                          <td>12</td>
                          <td>75%</td>
                          <td class="trend-up">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="15"
                              height="16"
                              viewBox="0 0 15 16"
                              fill="none"
                            >
                              <path
                                d="M13.2513 5.14258L8.14783 10.246L5.1458 7.244L1.24316 11.1466"
                                stroke="#10B981"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M9.64844 5.14258H13.2509V8.74501"
                                stroke="#10B981"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-start">EUR/USD</td>
                          <td class="profit">+$4,200</td>
                          <td>28</td>
                          <td>68%</td>
                          <td class="trend-up">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="16"
                              height="15"
                              viewBox="0 0 16 15"
                              fill="none"
                            >
                              <path
                                d="M14.0989 10.611L8.99549 5.50754L5.99346 8.50957L2.09082 4.60693"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M10.4961 10.611H14.0985V7.00854"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-start">AAPL</td>
                          <td class="profit">+$3,600</td>
                          <td>8</td>
                          <td>62%</td>
                          <td class="trend-down">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="15"
                              height="16"
                              viewBox="0 0 15 16"
                              fill="none"
                            >
                              <path
                                d="M13.2513 5.14258L8.14783 10.246L5.1458 7.244L1.24316 11.1466"
                                stroke="#10B981"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M9.64844 5.14258H13.2509V8.74501"
                                stroke="#10B981"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-start">GOLD</td>
                          <td class="profit">+$2,400</td>
                          <td>6</td>
                          <td>83%</td>
                          <td class="trend-up">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="15"
                              height="16"
                              viewBox="0 0 15 16"
                              fill="none"
                            >
                              <path
                                d="M13.2513 5.14258L8.14783 10.246L5.1458 7.244L1.24316 11.1466"
                                stroke="#10B981"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M9.64844 5.14258H13.2509V8.74501"
                                stroke="#10B981"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-start">S&P 500</td>
                          <td class="profit">+$1,800</td>
                          <td>5</td>
                          <td>60%</td>
                          <td class="trend-up">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="16"
                              height="15"
                              viewBox="0 0 16 15"
                              fill="none"
                            >
                              <path
                                d="M14.0989 10.611L8.99549 5.50754L5.99346 8.50957L2.09082 4.60693"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M10.4961 10.611H14.0985V7.00854"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-start">TSLA</td>
                          <td class="loss">-$900</td>
                          <td>4</td>
                          <td>25%</td>
                          <td class="trend-down">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="16"
                              height="15"
                              viewBox="0 0 16 15"
                              fill="none"
                            >
                              <path
                                d="M14.0989 10.611L8.99549 5.50754L5.99346 8.50957L2.09082 4.60693"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M10.4961 10.611H14.0985V7.00854"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-start">BTC/USD</td>
                          <td class="loss">-$1,800</td>
                          <td>10</td>
                          <td>40%</td>
                          <td class="trend-down">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="16"
                              height="15"
                              viewBox="0 0 16 15"
                              fill="none"
                            >
                              <path
                                d="M14.0989 10.611L8.99549 5.50754L5.99346 8.50957L2.09082 4.60693"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M10.4961 10.611H14.0985V7.00854"
                                stroke="#EF4444"
                                stroke-width="1.20081"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Trading Activity Heatmap Start -->
          <div class="box-wrapper mt-4">
            <div class="row">
              <div class="col-12">
                <div class="trade-outcome-card">
                  <div class="header">
                    <div>
                      <h2>Trading Activity Heatmap</h2>
                      <p>Analyze performance by day and time</p>
                    </div>
                    <div
                      class="heatmap-container-dropdown"
                      id="dropdown-wrapper"
                    >
                      <button
                        type="button"
                        class="heatmap-dropdown-btn"
                        id="dropdown-button"
                        aria-haspopup="true"
                        aria-expanded="true"
                      >
                        <span id="selected-option-text">Win Rate</span>
                        <i class="fa-solid fa-angle-down"></i>
                      </button>

                      <div
                        class="heatmap-dropdown-options"
                        id="dropdown-options"
                      >
                        <div
                          class="heatmap-dropdown-option"
                          data-value="Win Rate"
                        >
                          Win Rate
                        </div>
                        <div
                          class="heatmap-dropdown-option"
                          data-value="Profit Factor"
                        >
                          Profit Factor
                        </div>
                        <div
                          class="heatmap-dropdown-option"
                          data-value="Drawdown"
                        >
                          Drawdown
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Heat Map Table -->
                  <div class="heatmap-container mt-3">
                    <div class="overflow-x-auto pb-2">
                      <table id="heatmap-table" class="heatmap-table">
                        <thead>
                          <tr id="header-row"></tr>
                        </thead>
                        <tbody id="data-rows"></tbody>
                      </table>
                    </div>

                    <div
                      class="d-flex color-shade-box align-items-center justify-content-center mt-3"
                    >
                      <div class="legend-item-text">
                        <span class="text">Low</span>
                      </div>
                      <div class="legend-item">
                        <div
                          class="legend-color-box"
                          style="background-color: #f87171"
                        ></div>
                        <div
                          class="legend-color-box"
                          style="background-color: #fcd34d"
                        ></div>
                        <div
                          class="legend-color-box"
                          style="background-color: #6ee7b7"
                        ></div>
                        <div
                          class="legend-color-box"
                          style="background-color: #34d399"
                        ></div>
                        <div
                          class="legend-color-box"
                          style="background-color: #10b981"
                        ></div>
                        <div
                          class="legend-color-box"
                          style="background-color: #059669"
                        ></div>
                      </div>
                      <div class="legend-item-text">
                        <span class="text">High</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Trading Performance Radar Start -->
          <div class="box-wrapper mt-4">
            <div class="row">
              <!-- Profit/loss Over Time Chart -->
              <div class="col-lg-7">
                <div class="chart-card p-3">
                  <div class="chart-header mb-4">
                    <div>
                      <h2>Trading Performance Radar</h2>
                      <p>
                        Compare your current and previous performance metrics
                      </p>
                    </div>

                    <div class="tab chart-pills d-flex gap-1 flex-wrap">
                      <a href="#" class="nav-link active">Daily</a>
                      <a href="#" class="nav-link">Weekly</a>
                      <a href="#" class="nav-link">Monthly</a>
                      <a href="#" class="nav-link">Yearly</a>
                    </div>
                  </div>
                  <canvas id="radarChart"></canvas>
                  <div class="period-box text-center mt-3">
                    <span class="period-item current-period">
                      Current Period</span
                    >
                    <span class="period-item previous-period">
                      Previous Period</span
                    >
                  </div>

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
              <!-- Strategy Insights -->
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
                      <div class="icon-container">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="12"
                          height="12"
                          viewBox="0 0 12 12"
                          fill="none"
                        >
                          <path
                            d="M6.37619 10.5466C8.89017 10.5466 10.9282 8.50858 10.9282 5.9946C10.9282 3.48061 8.89017 1.44263 6.37619 1.44263C3.86221 1.44263 1.82422 3.48061 1.82422 5.9946C1.82422 8.50858 3.86221 10.5466 6.37619 10.5466Z"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M6.37669 8.72579C7.88508 8.72579 9.10787 7.503 9.10787 5.99461C9.10787 4.48622 7.88508 3.26343 6.37669 3.26343C4.8683 3.26343 3.64551 4.48622 3.64551 5.99461C3.64551 7.503 4.8683 8.72579 6.37669 8.72579Z"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M6.37621 6.90526C6.87901 6.90526 7.28661 6.49766 7.28661 5.99487C7.28661 5.49207 6.87901 5.08447 6.37621 5.08447C5.87342 5.08447 5.46582 5.49207 5.46582 5.99487C5.46582 6.49766 5.87342 6.90526 6.37621 6.90526Z"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </div>
                      <div class="text-content">
                        <h3 class="card-title">Adjust Risk/Reward Ratio</h3>
                        <p class="card-description">
                          Your current risk/reward ratio is 1:1.5. Increasing it
                          to 1:2 could improve profitability by ~15%.
                        </p>
                      </div>
                    </div>

                    <a href="#" class="review-link">
                      Review trade setups
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </div>
                  <div class="strategy-card mt-3">
                    <div class="card-header">
                      <div class="icon-container">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="12"
                          height="12"
                          viewBox="0 0 12 12"
                          fill="none"
                        >
                          <path
                            d="M6.37619 10.4284C8.89017 10.4284 10.9282 8.39042 10.9282 5.87643C10.9282 3.36245 8.89017 1.32446 6.37619 1.32446C3.86221 1.32446 1.82422 3.36245 1.82422 5.87643C1.82422 8.39042 3.86221 10.4284 6.37619 10.4284Z"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M6.37598 3.14526V5.87645L8.19677 6.78684"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </div>
                      <div class="text-content">
                        <h3 class="card-title">Optimize Trading Hours</h3>
                        <p class="card-description">
                          Your win rate is 82% during US market hours vs. 45%
                          during Asian session. Consider adjusting your trading
                          schedule.
                        </p>
                      </div>
                    </div>

                    <a href="#" class="review-link">
                      View optimal hours
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </div>
                  <div class="strategy-card mt-3">
                    <div class="card-header">
                      <div class="icon-container">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="12"
                          height="12"
                          viewBox="0 0 12 12"
                          fill="none"
                        >
                          <path
                            d="M10.9282 4.13818L7.05899 8.00736L4.783 5.73137L1.82422 8.69016"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M8.19727 4.13818H10.9284V6.86937"
                            stroke="#18181B"
                            stroke-width="0.910394"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </div>
                      <div class="text-content">
                        <h3 class="card-title">Leverage EUR/USD Strength</h3>
                        <p class="card-description">
                          EUR/USD has been your most profitable pair with 68%
                          win rate. Consider increasing position sizes on this
                          pair.
                        </p>
                      </div>
                    </div>

                    <a href="#" class="review-link">
                      Review trade setups
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Recurring Errors Table Start -->
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
                          <td class="text-start">
                            <div class="items">
                              <span class="angle">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M6 12.5303L10 8.53027L6 4.53027"
                                    stroke="#09090B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="icon">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M8.00065 15.1969C11.6825 15.1969 14.6673 12.2121 14.6673 8.53019C14.6673 4.84829 11.6825 1.86353 8.00065 1.86353C4.31875 1.86353 1.33398 4.84829 1.33398 8.53019C1.33398 12.2121 4.31875 15.1969 8.00065 15.1969Z"
                                    stroke="#EF4444"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 5.86353V8.53019"
                                    stroke="#EF4444"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 11.197H8.00667"
                                    stroke="#EF4444"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="text">Exiting too early</span>
                            </div>
                          </td>
                          <td>18</td>
                          <td class="impact-red">
                            Reduced profit potential by ~30%
                          </td>
                          <td class="point-incress">+35%</td>
                        </tr>
                        <tr>
                          <td class="text-start">
                            <div class="items">
                              <span class="angle">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M6 12.5303L10 8.53027L6 4.53027"
                                    stroke="#09090B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="icon">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M8.00065 15.1969C11.6825 15.1969 14.6673 12.2121 14.6673 8.53019C14.6673 4.84829 11.6825 1.86353 8.00065 1.86353C4.31875 1.86353 1.33398 4.84829 1.33398 8.53019C1.33398 12.2121 4.31875 15.1969 8.00065 15.1969Z"
                                    stroke="#EF4444"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 5.86353V8.53019"
                                    stroke="#EF4444"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 11.197H8.00667"
                                    stroke="#EF4444"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="text">Over-leveraging</span>
                            </div>
                          </td>
                          <td>12</td>
                          <td class="impact-red">
                            Increased risk exposure by 2.5x
                          </td>
                          <td class="point-loss">-15%</td>
                        </tr>
                        <tr>
                          <td class="text-start">
                            <div class="items">
                              <span class="angle">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M6 12.5303L10 8.53027L6 4.53027"
                                    stroke="#09090B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="icon">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M14.4876 12.5303L9.15426 3.19693C9.03797 2.99173 8.86933 2.82105 8.66555 2.70231C8.46176 2.58356 8.23012 2.521 7.99426 2.521C7.7584 2.521 7.52677 2.58356 7.32298 2.70231C7.11919 2.82105 6.95055 2.99173 6.83426 3.19693L1.50093 12.5303C1.38338 12.7338 1.32175 12.9649 1.32227 13.1999C1.32279 13.435 1.38545 13.6658 1.50389 13.8688C1.62234 14.0719 1.79236 14.24 1.99673 14.3561C2.20109 14.4723 2.43253 14.5324 2.6676 14.5303H13.3343C13.5682 14.53 13.7979 14.4682 14.0005 14.3511C14.203 14.234 14.3711 14.0657 14.4879 13.863C14.6048 13.6604 14.6663 13.4305 14.6662 13.1966C14.6662 12.9627 14.6046 12.7329 14.4876 12.5303Z"
                                    stroke="#F59E0B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 6.53027V9.19694"
                                    stroke="#F59E0B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 11.8635H8.00667"
                                    stroke="#F59E0B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="text">Trading against trend</span>
                            </div>
                          </td>
                          <td>9</td>
                          <td class="impact-yellow">
                            Resulted in 70% of losses
                          </td>
                          <td class="point-incress">+25%</td>
                        </tr>
                        <tr>
                          <td class="text-start">
                            <div class="items">
                              <span class="angle">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M6 12.5303L10 8.53027L6 4.53027"
                                    stroke="#09090B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="icon">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M14.4876 12.5303L9.15426 3.19693C9.03797 2.99173 8.86933 2.82105 8.66555 2.70231C8.46176 2.58356 8.23012 2.521 7.99426 2.521C7.7584 2.521 7.52677 2.58356 7.32298 2.70231C7.11919 2.82105 6.95055 2.99173 6.83426 3.19693L1.50093 12.5303C1.38338 12.7338 1.32175 12.9649 1.32227 13.1999C1.32279 13.435 1.38545 13.6658 1.50389 13.8688C1.62234 14.0719 1.79236 14.24 1.99673 14.3561C2.20109 14.4723 2.43253 14.5324 2.6676 14.5303H13.3343C13.5682 14.53 13.7979 14.4682 14.0005 14.3511C14.203 14.234 14.3711 14.0657 14.4879 13.863C14.6048 13.6604 14.6663 13.4305 14.6662 13.1966C14.6662 12.9627 14.6046 12.7329 14.4876 12.5303Z"
                                    stroke="#F59E0B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 6.53027V9.19694"
                                    stroke="#F59E0B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 11.8635H8.00667"
                                    stroke="#F59E0B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="text">Emotional trading</span>
                            </div>
                          </td>
                          <td>8</td>
                          <td class="impact-yellow">
                            Led to impulsive entries/exits
                          </td>
                          <td class="point-incress">+40%</td>
                        </tr>
                        <tr>
                          <td class="text-start">
                            <div class="items">
                              <span class="angle">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M6 12.5303L10 8.53027L6 4.53027"
                                    stroke="#09090B"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="icon">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="17"
                                  viewBox="0 0 16 17"
                                  fill="none"
                                >
                                  <path
                                    d="M8.00065 15.1969C11.6825 15.1969 14.6673 12.2121 14.6673 8.53019C14.6673 4.84829 11.6825 1.86353 8.00065 1.86353C4.31875 1.86353 1.33398 4.84829 1.33398 8.53019C1.33398 12.2121 4.31875 15.1969 8.00065 15.1969Z"
                                    stroke="#3B82F6"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 11.1969V8.53027"
                                    stroke="#3B82F6"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M8 5.86353H8.00667"
                                    stroke="#3B82F6"
                                    stroke-width="1.33333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </span>
                              <span class="text">Ignoring economic news</span>
                            </div>
                          </td>
                          <td>5</td>
                          <td class="impact-blue">
                            Missed volatility opportunities
                          </td>
                          <td class="point-incress">+60%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </main>


<script>
document.addEventListener('DOMContentLoaded', function () {
  // initial load
  fetchDashboardStats('daily');

  // tab buttons
  const mapping = {
    'daily-tab': 'daily',
    'weekly-tab': 'weekly',
    'monthly-tab': 'monthly',
    'yearly-tab': 'yearly',
    'all-time-tab': 'all-time'
  };

  Object.keys(mapping).forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('click', function (e) {
      e.preventDefault();
      // set active class for UI
      document.querySelectorAll('.nav-link').forEach(btn => btn.classList.remove('active'));
      el.classList.add('active');
      fetchDashboardStats(mapping[id]);
    });
  });
});

function safeNum(n, fixed = 2) {
  if (n === null || n === undefined || Number.isNaN(Number(n))) return (fixed ? Number(0).toFixed(fixed) : '0');
  return Number(n).toFixed(fixed);
}

async function fetchDashboardStats(period = 'daily') {
  try {
    const res = await axios.get(`/dashboard/stats?period=${period}`);
    const data = res.data;

    console.log('dashboard stats', data);

    // Total holdings
    const th = document.querySelector('#total-holding span');
    if (th) th.textContent = `$${safeNum(data.total_holdings, 2)}`;

    // Win/Loss
    const wl = document.getElementById('win-loss-price');
    const wlChange = document.getElementById('win-loss-price-daily-task');
    if (wl) wl.textContent = data.win_loss_rate ?? '0%';
    if (wlChange) wlChange.textContent = `${data.win_loss_diff >= 0 ? '+' : ''}${data.win_loss_diff ?? 0}% from last ${period}`;

    // Accumulated Profit
    const ap = document.getElementById('accumulated-profit-price');
    const apChange = document.getElementById('accumulated-profit-daily-task');
    if (ap) ap.textContent = `$${safeNum(data.accumulated_profit, 2)}`;
    if (apChange) apChange.textContent = `${data.accumulated_profit_diff >= 0 ? '+' : ''}${data.accumulated_profit_diff ?? 0}% from last ${period}`;

    // Risk/Reward
    const rr = document.getElementById('risk-reward-price');
    const rrChange = document.getElementById('risk-reward-daily-task');
    if (rr) rr.textContent = data.risk_reward_ratio ? `1:${data.risk_reward_ratio}` : '1:0';
    if (rrChange) rrChange.textContent = `${data.risk_reward_diff >= 0 ? '+' : ''}${data.risk_reward_diff ?? 0}% since last ${period}`;

    // Avg trading time
    const at = document.getElementById('avg-trading-time-price');
    const atChange = document.getElementById('avg-trading-time-daily-task');
    if (at) at.textContent = data.avg_trading_time ?? '0h 0m';
    if (atChange) atChange.textContent = `${data.avg_trading_time_diff ?? '+0m'} since last ${period}`;

  } catch (err) {
    console.error('Fetch dashboard stats error:', err);
    alert('Failed to load dashboard stats. See console for details.');
  }
}
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
  loadMostProfitableAssets("daily");

  document.querySelectorAll(".chart-pills .nav-link").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      document
        .querySelectorAll(".chart-pills .nav-link")
        .forEach((b) => b.classList.remove("active"));
      this.classList.add("active");

      const period = this.textContent.trim().toLowerCase();
      loadMostProfitableAssets(period);
    });
  });
});

async function loadMostProfitableAssets(period = "daily") {
  try {
    const response = await axios.get("/dashboard/most-profitable-assets", {
      params: { period },
    });

    const data = response.data.data;
    const tbody = document.querySelector(".profitable-assets-table tbody");
    tbody.innerHTML = "";

    data.forEach((row) => {
      const tr = document.createElement("tr");

      tr.innerHTML = `
        <td class="text-start">${row.asset}</td>
        <td class="${row.profit >= 0 ? 'profit' : 'loss'}">
          ${row.profit >= 0 ? '+' : ''}$${formatNumber(row.profit)}
        </td>
        <td>${row.trades}</td>
        <td>${row.win_rate}%</td>
        <td class="${row.trend === 'up' ? 'trend-up' : 'trend-down'}"></td>
      `;
      tbody.appendChild(tr);
    });
  } catch (error) {
    console.error("Error loading most profitable assets:", error);
    alert("Failed to load most profitable assets.");
  }
}

function formatNumber(num) {
  if (!num && num !== 0) return "0";
  return parseFloat(num).toLocaleString("en-US", {
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  });
}
</script>






@endsection
