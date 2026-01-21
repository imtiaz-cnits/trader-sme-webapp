@extends('layout.dashboard-sidenav')
@section('title', 'Admin Dashboard')
@section('content')

  <!--Dashboard Main Content -->
    <main class="container-fluid px-md-5">
      <div class="main-content pb-4">
        <!-- Dashboard Tab Content Start -->
        <div class="mb-3 mt-4">
          <h2 class="dashboard-title">Dashboard</h2>
        </div>

        <!-- Tabs and Buttons -->
        <div
          class="d-flex flex-column flex-md-row justify-content-between align-items-end align-items-md-end mb-3"
        >
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

          <!-- Buttons -->
          <div class="button-box d-flex flex-sm-row gap-2 mt-3 mt-md-0">
            <button type="button" class="btn-new-page">Start a New Page</button>
            <button type="button" class="btn-log-trade">Log a New Trade</button>
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
                      <h3 class="title">Total Holding</h3>
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
                      <p id="total-holding" class="price">$45,231.89</p>
                      <p id="total-holding-daily-task" class="daily-task">+20.1% from last day</p>
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
                      <h3 class="title">Profitable Trades</h3>
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
                      <p id="profitable-trades" class="price">+2350</p>
                      <p id="profitable-trades-daily-task" class="daily-task">+180.1% from last day</p>
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
                      <h3 class="title">Total Trades Made</h3>
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
                      <p id="total-trades-made" class="price">+12,234</p>
                      <p id="total-trades-made-daily-task" class="daily-task">+19% since last day</p>
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
                      <h3 class="title">Active Pages</h3>
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
                      <p id="active-pages" class="price">+573</p>
                      <p id="active-pages-daily-task" class="daily-task">+201 since last day</p>
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
                      <h3 class="title">Total Holding</h3>
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
                      <p class="price">$45,231.89</p>
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
                      <h3 class="title">Profitable Trades</h3>
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
                      <p class="price">+2350</p>
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
                      <h3 class="title">Total Trades Made</h3>
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
                      <p class="price">+12,234</p>
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
                      <h3 class="title">Active Pages</h3>
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
                      <p class="price">+573</p>
                      <p class="daily-task">+201 since last day</p>
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
                      <h3 class="title">Total Holding</h3>
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
                      <p class="price">$45,231.89</p>
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
                      <h3 class="title">Profitable Trades</h3>
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
                      <p class="price">+2350</p>
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
                      <h3 class="title">Total Trades Made</h3>
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
                      <p class="price">+12,234</p>
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
                      <h3 class="title">Active Pages</h3>
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
                      <p class="price">+573</p>
                      <p class="daily-task">+201 since last day</p>
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
                      <h3 class="title">Total Holding</h3>
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
                      <p class="price">$45,231.89</p>
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
                      <h3 class="title">Profitable Trades</h3>
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
                      <p class="price">+2350</p>
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
                      <h3 class="title">Total Trades Made</h3>
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
                      <p class="price">+12,234</p>
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
                      <h3 class="title">Active Pages</h3>
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
                      <p class="price">+573</p>
                      <p class="daily-task">+201 since last day</p>
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
                      <h3 class="title">Total Holding</h3>
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
                      <p class="price">$45,231.89</p>
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
                      <h3 class="title">Profitable Trades</h3>
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
                      <p class="price">+2350</p>
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
                      <h3 class="title">Total Trades Made</h3>
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
                      <p class="price">+12,234</p>
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
                      <h3 class="title">Active Pages</h3>
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
                      <p class="price">+573</p>
                      <p class="daily-task">+201 since last day</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Dashboard Tab Content End -->

        <!-- Latest News Start -->
        <div class="latest-news">
    <div
        class="d-flex flex-row justify-content-between align-items-center my-3"
    >
        <h3 class="title mb-0">Latest News</h3>

        <a href="#" class="view-all-btn mt-2 mt-md-0"> View All</a>
    </div>

 <div class="latest-news-content">
    <div class="row">
        
        <div class="col-12 col-md-4">
            <div class="tradingview-widget-container" style="height: 200px !important; overflow: hidden;">
                <div class="tradingview-widget-container__widget" style="height: 100% !important;"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/news/top-providers/tradingview/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"></span></div>
                 <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                  {
                  "displayMode": "regular",
                  "feedMode": "symbol",
                  "symbol": "OANDA:EURUSD",
                  "colorTheme": "light",
                  "isTransparent": false,
                  "locale": "en",
                  "width": "100%",
                  "height": 200
                }
                  </script>
            </div>
            </div>

        <div class="col-12 col-md-4">
            <div class="tradingview-widget-container" style="height: 200px !important; overflow: hidden;">
                <div class="tradingview-widget-container__widget" style="height: 100% !important;"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/news/top-providers/tradingview/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"></span></div>
               <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                {
                "displayMode": "regular",
                "feedMode": "symbol",
                "symbol": "BINANCE:BTCUSDT",
                "colorTheme": "light",
                "isTransparent": false,
                "locale": "en",
                 "width": "100%",
                  "height": 200
              }
                </script>
            </div>
            </div>

        <div class="col-12 col-md-4">
            <div class="tradingview-widget-container" style="height: 200px !important; overflow: hidden;">
                <div class="tradingview-widget-container__widget" style="height: 100% !important;"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/news/top-providers/tradingview/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"> </span></div>
               <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                {
                "displayMode": "regular",
                "feedMode": "symbol",
                "symbol": "NASDAQ:NVDA",
                "colorTheme": "light",
                "isTransparent": false,
                "locale": "en",
                "width": "100%",
                  "height": 200
              }
                </script>
            </div>
            </div>
        
    </div>
</div>





</div>

    
</div>
    </div>
        <!-- Latest News End -->

        <!-- Daily Trends Start -->

          <div class="daily-trend">
          <div
            class="header-row d-flex flex-row justify-content-between align-items-center my-3"
          >
            <h5 class="section-title">Daily Trends</h5>
            <div class="swiper-nav-buttons">
              <div class="swiper-button-prev">
                <i class="fa-solid fa-angle-left"></i>
              </div>
              <div class="swiper-button-next">
                <i class="fa-solid fa-angle-right"></i>
              </div>
            </div>
          </div>

         <div class="swiper trendSwiper">
          <div class="swiper-wrapper">
            <!-- 8 slides with hardcoded data -->
          </div>
        </div>
        </div>

        <!-- Daily Trends End -->

        <!-- Profitable Assets Start -->
        <div class="profitable-assets">
          <div class="d-flex justify-content-start align-items-center my-3">
            <h3 class="title mb-0">Most Profitable Assets</h3>
          </div>

          <!-- profitable Content -->


              <!-- profitable Content -->
          <div class="profitable-content">
            <div class="row g-3">

            <div
                class="col-12 col-sm-6 col-lg-4 col-xxl-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div class="card-body">
                   <!-- TradingView Widget BEGIN -->
                  <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"> </span></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                    "symbol": "BINANCE:BTCUSDT",
                    "chartOnly": false,
                    "dateRange": "12M",
                    "noTimeScale": false,
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "locale": "en",
                    "width": "100%",
                    "autosize": true,
                    "height": "100%"
                  }
                    </script>
                  </div>
                  <!-- TradingView Widget END -->
                  </div>
                </div>
              </div>




              <div
                class="col-12 col-sm-6 col-lg-4 col-xxl-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div class="card-body">
                   <!-- TradingView Widget BEGIN -->
                  <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/XAUUSD/?exchange=OANDA" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"></span></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                    "symbol": "OANDA:XAUUSD",
                    "chartOnly": false,
                    "dateRange": "12M",
                    "noTimeScale": false,
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "locale": "en",
                    "width": "100%",
                    "autosize": true,
                    "height": "100%"
                  }
                    </script>
                  </div>
                  <!-- TradingView Widget END -->
                  </div>
                </div>
              </div>



              <div
                class="col-12 col-sm-6 col-lg-4 col-xxl-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div class="card-body">
                   <!-- TradingView Widget BEGIN -->
                  <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"></span></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                    "symbol": "NASDAQ:AAPL",
                    "chartOnly": false,
                    "dateRange": "12M",
                    "noTimeScale": false,
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "locale": "en",
                    "width": "100%",
                    "autosize": true,
                    "height": "100%"
                  }
                    </script>
                  </div>
                  <!-- TradingView Widget END -->
                  </div>
                </div>
              </div>

              <div
                class="col-12 col-sm-6 col-lg-4 col-xxl-3 d-flex align-items-stretch m-0"
              >
                <div class="card-item">
                  <div class="card-body">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                      <div class="tradingview-widget-container__widget"></div>
                      <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-TSLA/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a><span class="trademark"></span></div>
                      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                      {
                      "symbol": "NASDAQ:TSLA",
                      "chartOnly": false,
                      "dateRange": "12M",
                      "noTimeScale": false,
                      "colorTheme": "dark",
                      "isTransparent": false,
                      "locale": "en",
                      "width": "100%",
                      "autosize": true,
                      "height": "100%"
                    }
                      </script>
                    </div>
                    <!-- TradingView Widget END -->
                  </div>
                </div>
              </div>
             
              
            </div>
          </div>
        </div>
        <!-- Profitable Assets End -->

        <!-- Table Start -->
        <div class="trends-table">
          <div class="d-flex justify-content-start align-items-center my-3">
            <h3 class="title mb-0">Best Trades Executed</h3>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
              <button
                class="btn btn-custom d-flex align-items-center"
                id="date-range-btn"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="17"
                  viewBox="0 0 16 17"
                  fill="none"
                >
                  <path
                    d="M11.2007 2.06665C11.2188 2.06689 11.2338 2.08168 11.2339 2.09985V3.13306H13.3335C13.941 3.13306 14.4331 3.62613 14.4331 4.23364V13.8333C14.4331 14.4407 13.941 14.9329 13.3335 14.9329H2.6665C2.05917 14.9327 1.56689 14.4406 1.56689 13.8333V4.23364C1.56689 3.62626 2.05917 3.13327 2.6665 3.13306H4.76709V2.09985C4.76716 2.08151 4.78193 2.06665 4.80029 2.06665C4.81863 2.06669 4.83343 2.08153 4.8335 2.09985V3.13306H11.1665V2.09985C11.1666 2.08153 11.1823 2.06665 11.2007 2.06665ZM1.6333 13.8333C1.6333 14.4037 2.09597 14.8662 2.6665 14.8665H13.3335C13.9041 14.8665 14.3667 14.4039 14.3667 13.8333V6.39966H1.6333V13.8333ZM3.73389 12.7336C3.75212 12.7338 3.76709 12.7486 3.76709 12.7668C3.76699 12.785 3.75205 12.7999 3.73389 12.8C3.71557 12.8 3.70079 12.7851 3.70068 12.7668C3.70068 12.7485 3.71551 12.7336 3.73389 12.7336ZM5.8667 12.7336C5.88508 12.7336 5.8999 12.7485 5.8999 12.7668C5.8998 12.7851 5.88501 12.8 5.8667 12.8C5.84847 12.7999 5.8336 12.7851 5.8335 12.7668C5.8335 12.7485 5.84841 12.7337 5.8667 12.7336ZM8.00049 12.7336C8.01875 12.7338 8.03369 12.7485 8.03369 12.7668C8.03359 12.7851 8.01869 12.7999 8.00049 12.8C7.98217 12.8 7.96739 12.7851 7.96729 12.7668C7.96729 12.7485 7.98211 12.7336 8.00049 12.7336ZM10.1333 12.7336C10.1517 12.7336 10.1665 12.7485 10.1665 12.7668C10.1664 12.7851 10.1516 12.8 10.1333 12.8C10.1151 12.7999 10.1002 12.7851 10.1001 12.7668C10.1001 12.7485 10.115 12.7338 10.1333 12.7336ZM3.73389 10.5999C3.75206 10.6 3.76695 10.6149 3.76709 10.6331C3.76709 10.6514 3.75214 10.6661 3.73389 10.6663C3.71548 10.6663 3.70068 10.6515 3.70068 10.6331C3.70083 10.6148 3.71557 10.5999 3.73389 10.5999ZM5.8667 10.5999C5.88502 10.5999 5.89976 10.6148 5.8999 10.6331C5.8999 10.6515 5.88511 10.6663 5.8667 10.6663C5.84838 10.6662 5.8335 10.6514 5.8335 10.6331C5.83364 10.6148 5.84847 10.6 5.8667 10.5999ZM8.00049 10.5999C8.01869 10.6 8.03355 10.6149 8.03369 10.6331C8.03369 10.6514 8.01877 10.6661 8.00049 10.6663C7.98208 10.6663 7.96729 10.6515 7.96729 10.6331C7.96743 10.6148 7.98217 10.5999 8.00049 10.5999ZM10.1333 10.5999C10.1516 10.5999 10.1664 10.6148 10.1665 10.6331C10.1665 10.6515 10.1517 10.6663 10.1333 10.6663C10.115 10.6661 10.1001 10.6514 10.1001 10.6331C10.1002 10.6149 10.1151 10.6 10.1333 10.5999ZM12.2671 10.5999C12.2853 10.6 12.3002 10.6149 12.3003 10.6331C12.3003 10.6514 12.2854 10.6662 12.2671 10.6663C12.2487 10.6663 12.2339 10.6514 12.2339 10.6331C12.234 10.6148 12.2488 10.5999 12.2671 10.5999ZM8.00049 8.46704C8.01877 8.46718 8.03369 8.48193 8.03369 8.50024C8.03355 8.51845 8.01869 8.53331 8.00049 8.53345C7.98217 8.53345 7.96743 8.51853 7.96729 8.50024C7.96729 8.48184 7.98208 8.46704 8.00049 8.46704ZM10.1333 8.46704C10.1517 8.46704 10.1665 8.48184 10.1665 8.50024C10.1664 8.51853 10.1516 8.53345 10.1333 8.53345C10.1151 8.53331 10.1002 8.51844 10.1001 8.50024C10.1001 8.48193 10.115 8.46718 10.1333 8.46704ZM12.2671 8.46704C12.2854 8.46715 12.3003 8.48193 12.3003 8.50024C12.3002 8.51844 12.2853 8.53334 12.2671 8.53345C12.2488 8.53345 12.234 8.5185 12.2339 8.50024C12.2339 8.48186 12.2487 8.46704 12.2671 8.46704ZM2.6665 3.20044C2.09599 3.20065 1.6333 3.66308 1.6333 4.23364V6.33325H14.3667V4.23364C14.3667 3.66292 13.9041 3.20044 13.3335 3.20044H11.2339V4.23364C11.2337 4.25173 11.2188 4.2666 11.2007 4.26685C11.1824 4.26685 11.1667 4.25188 11.1665 4.23364V3.20044H4.8335V4.23364C4.83332 4.25188 4.81856 4.26681 4.80029 4.26685C4.782 4.26685 4.76727 4.2519 4.76709 4.23364V3.20044H2.6665Z"
                    fill="#1C1917"
                    stroke="#1C1917"
                  />
                </svg>
                <span id="date-range-text" class="ms-2"
                  >13 June 2023 - 14 July 2023</span
                >
              </button>
            </div>
            <div class="d-flex align-items-center gap-2">
              <div class="dropdown">
                <button
                  class="btn btn-custom dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                >
                  Columns
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Date</a></li>
                  <li><a class="dropdown-item" href="#">Session</a></li>
                  <li><a class="dropdown-item" href="#">Instrument</a></li>
                  <li><a class="dropdown-item" href="#">Lot Size</a></li>
                  <li><a class="dropdown-item" href="#">Position</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-hover table-custom">
              <thead>
                <tr>
                  <th style="width: 20px">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="selectAll"
                    />
                  </th>
                  <th class="text-start">Date</th>
                  <th>Session</th>
                  <th>Instrument</th>
                  <th>
                    Lot Size
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="15"
                      viewBox="0 0 16 17"
                      fill="none"
                    >
                      <path
                        d="M13.9998 10.9319L11.3332 13.5986L8.6665 10.9319"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M11.3335 13.5986V2.93195"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M2 5.59861L4.66667 2.93195L7.33333 5.59861"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M4.6665 2.93195V13.5986"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </th>
                  <th>
                    Position
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="17"
                      viewBox="0 0 16 17"
                      fill="none"
                    >
                      <path
                        d="M13.9998 10.9319L11.3332 13.5986L8.6665 10.9319"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M11.3335 13.5986V2.93195"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M2 5.59861L4.66667 2.93195L7.33333 5.59861"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M4.6665 2.93195V13.5986"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </th>
                  <th>R/B</th>
                  <th>Entry</th>
                  <th>Exit</th>
                  <th>
                    Outcome
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="17"
                      viewBox="0 0 16 17"
                      fill="none"
                    >
                      <path
                        d="M13.9998 10.9319L11.3332 13.5986L8.6665 10.9319"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M11.3335 13.5986V2.93195"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M2 5.59861L4.66667 2.93195L7.33333 5.59861"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M4.6665 2.93195V13.5986"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </th>
                  <th>
                    Gross Profit
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="17"
                      viewBox="0 0 16 17"
                      fill="none"
                    >
                      <path
                        d="M13.9998 10.9319L11.3332 13.5986L8.6665 10.9319"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M11.3335 13.5986V2.93195"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M2 5.59861L4.66667 2.93195L7.33333 5.59861"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M4.6665 2.93195V13.5986"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </th>
                  <th>Fee</th>
                  <th>
                    Net Profit
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="17"
                      viewBox="0 0 16 17"
                      fill="none"
                    >
                      <path
                        d="M13.9998 10.9319L11.3332 13.5986L8.6665 10.9319"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M11.3335 13.5986V2.93195"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M2 5.59861L4.66667 2.93195L7.33333 5.59861"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M4.6665 2.93195V13.5986"
                        stroke="#71717A"
                        stroke-width="1.33333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </th>
                  <th class="text-end">Image Link</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-row">
                  <td>
                    <input
                      class="form-check-input row-checkbox"
                      type="checkbox"
                    />
                  </td>
                  <td class="text-start">01/03/2025</td>
                  <td>NEW YORK</td>
                  <td>EUR USD</td>
                  <td>1.0</td>
                  <td>BUY</td>
                  <td>2:1</td>
                  <td>10:00 AM</td>
                  <td>11:00 AM</td>
                  <td>TP</td>
                  <td>$500.00</td>
                  <td>$50</td>
                  <td><strong>$316.00</strong></td>
                  <td>
                    <div class="progress-line d-flex justify-content-end">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="59"
                        height="29"
                        viewBox="0 0 59 29"
                        fill="none"
                      >
                        <g filter="url(#filter0_d_2006_10438)">
                          <path
                            d="M7 19.2738C12.1568 16.8848 14.2754 22.9533 17.7133 20.5643C21.1511 18.1753 19.6811 13.6224 24.8378 11.03C27.4785 9.70257 30.4136 14.6673 32.9459 13.9154C35.3588 13.1989 36.9839 9.96392 39.5 7.63262C44.6568 2.85461 48.5622 12.1329 52 12.1329"
                            stroke="url(#paint0_linear_2006_10438)"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            shape-rendering="crispEdges"
                          />
                        </g>
                        <defs>
                          <filter
                            id="filter0_d_2006_10438"
                            x="0.25"
                            y="0.515137"
                            width="58.5"
                            height="28.3673"
                            filterUnits="userSpaceOnUse"
                            color-interpolation-filters="sRGB"
                          >
                            <feFlood
                              flood-opacity="0"
                              result="BackgroundImageFix"
                            />
                            <feColorMatrix
                              in="SourceAlpha"
                              type="matrix"
                              values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                              result="hardAlpha"
                            />
                            <feOffset dy="1" />
                            <feGaussianBlur stdDeviation="3" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix
                              type="matrix"
                              values="0 0 0 0 0.945098 0 0 0 0 0.321569 0 0 0 0 0.321569 0 0 0 0.15 0"
                            />
                            <feBlend
                              mode="normal"
                              in2="BackgroundImageFix"
                              result="effect1_dropShadow_2006_10438"
                            />
                            <feBlend
                              mode="normal"
                              in="SourceGraphic"
                              in2="effect1_dropShadow_2006_10438"
                              result="shape"
                            />
                          </filter>
                          <linearGradient
                            id="paint0_linear_2006_10438"
                            x1="54"
                            y1="10.6324"
                            x2="-6.47763"
                            y2="26.2193"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop stop-color="#FF5555" />
                            <stop
                              offset="1"
                              stop-color="#E8E8E8"
                              stop-opacity="0"
                            />
                          </linearGradient>
                        </defs>
                      </svg>
                    </div>
                  </td>
                </tr>
                <tr class="table-row">
                  <td>
                    <input
                      class="form-check-input row-checkbox"
                      type="checkbox"
                    />
                  </td>
                  <td class="text-start">01/03/2025</td>
                  <td>NEW YORK</td>
                  <td>EUR USD</td>
                  <td>1.0</td>
                  <td>BUY</td>
                  <td>2:1</td>
                  <td>10:00 AM</td>
                  <td>11:00 AM</td>
                  <td>TP</td>
                  <td>$500.00</td>
                  <td>$50</td>
                  <td><strong>$316.00</strong></td>
                  <td>
                    <div class="progress-line d-flex justify-content-end">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="59"
                        height="29"
                        viewBox="0 0 59 29"
                        fill="none"
                      >
                        <g filter="url(#filter0_d_2006_10453)">
                          <path
                            d="M7 18.092C13 18.092 12.6238 21.092 17 21.092C21.3762 21.092 23.1238 12.592 27.5 12.592C31.8762 12.592 33.1238 18.8204 37.5 17.092C39.9245 16.1344 39.5555 10.6961 42.5823 7.64307C45.7231 4.47501 47 7.04011 52 6.09192"
                            stroke="url(#paint0_linear_2006_10453)"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            shape-rendering="crispEdges"
                          />
                        </g>
                        <defs>
                          <filter
                            id="filter0_d_2006_10453"
                            x="0.25"
                            y="0.250122"
                            width="58.5"
                            height="28.5918"
                            filterUnits="userSpaceOnUse"
                            color-interpolation-filters="sRGB"
                          >
                            <feFlood
                              flood-opacity="0"
                              result="BackgroundImageFix"
                            />
                            <feColorMatrix
                              in="SourceAlpha"
                              type="matrix"
                              values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                              result="hardAlpha"
                            />
                            <feOffset dy="1" />
                            <feGaussianBlur stdDeviation="3" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix
                              type="matrix"
                              values="0 0 0 0 0.745098 0 0 0 0 0.941176 0 0 0 0 0.427451 0 0 0 0.2 0"
                            />
                            <feBlend
                              mode="normal"
                              in2="BackgroundImageFix"
                              result="effect1_dropShadow_2006_10453"
                            />
                            <feBlend
                              mode="normal"
                              in="SourceGraphic"
                              in2="effect1_dropShadow_2006_10453"
                              result="shape"
                            />
                          </filter>
                          <linearGradient
                            id="paint0_linear_2006_10453"
                            x1="51.8964"
                            y1="3.50564"
                            x2="-11.8635"
                            y2="22.2645"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop stop-color="#94ED04" />
                            <stop
                              offset="1"
                              stop-color="#E7E7E7"
                              stop-opacity="0"
                            />
                          </linearGradient>
                        </defs>
                      </svg>
                    </div>
                  </td>
                </tr>
                <tr class="table-row">
                  <td>
                    <input
                      class="form-check-input row-checkbox"
                      type="checkbox"
                    />
                  </td>
                  <td class="text-start">01/03/2025</td>
                  <td>NEW YORK</td>
                  <td>EUR USD</td>
                  <td>1.0</td>
                  <td>BUY</td>
                  <td>2:1</td>
                  <td>10:00 AM</td>
                  <td>11:00 AM</td>
                  <td>TP</td>
                  <td>$500.00</td>
                  <td>$50</td>
                  <td><strong>$316.00</strong></td>
                  <td>
                    <div class="progress-line d-flex justify-content-end">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="59"
                        height="29"
                        viewBox="0 0 59 29"
                        fill="none"
                      >
                        <g filter="url(#filter0_d_2006_10438)">
                          <path
                            d="M7 19.2738C12.1568 16.8848 14.2754 22.9533 17.7133 20.5643C21.1511 18.1753 19.6811 13.6224 24.8378 11.03C27.4785 9.70257 30.4136 14.6673 32.9459 13.9154C35.3588 13.1989 36.9839 9.96392 39.5 7.63262C44.6568 2.85461 48.5622 12.1329 52 12.1329"
                            stroke="url(#paint0_linear_2006_10438)"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            shape-rendering="crispEdges"
                          />
                        </g>
                        <defs>
                          <filter
                            id="filter0_d_2006_10438"
                            x="0.25"
                            y="0.515137"
                            width="58.5"
                            height="28.3673"
                            filterUnits="userSpaceOnUse"
                            color-interpolation-filters="sRGB"
                          >
                            <feFlood
                              flood-opacity="0"
                              result="BackgroundImageFix"
                            />
                            <feColorMatrix
                              in="SourceAlpha"
                              type="matrix"
                              values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                              result="hardAlpha"
                            />
                            <feOffset dy="1" />
                            <feGaussianBlur stdDeviation="3" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix
                              type="matrix"
                              values="0 0 0 0 0.945098 0 0 0 0 0.321569 0 0 0 0 0.321569 0 0 0 0.15 0"
                            />
                            <feBlend
                              mode="normal"
                              in2="BackgroundImageFix"
                              result="effect1_dropShadow_2006_10438"
                            />
                            <feBlend
                              mode="normal"
                              in="SourceGraphic"
                              in2="effect1_dropShadow_2006_10438"
                              result="shape"
                            />
                          </filter>
                          <linearGradient
                            id="paint0_linear_2006_10438"
                            x1="54"
                            y1="10.6324"
                            x2="-6.47763"
                            y2="26.2193"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop stop-color="#FF5555" />
                            <stop
                              offset="1"
                              stop-color="#E8E8E8"
                              stop-opacity="0"
                            />
                          </linearGradient>
                        </defs>
                      </svg>
                    </div>
                  </td>
                </tr>
                <tr class="table-row">
                  <td>
                    <input
                      class="form-check-input row-checkbox"
                      type="checkbox"
                    />
                  </td>
                  <td class="text-start">01/03/2025</td>
                  <td>NEW YORK</td>
                  <td>EUR USD</td>
                  <td>1.0</td>
                  <td>BUY</td>
                  <td>2:1</td>
                  <td>10:00 AM</td>
                  <td>11:00 AM</td>
                  <td>TP</td>
                  <td>$500.00</td>
                  <td>$50</td>
                  <td><strong>$316.00</strong></td>
                  <td>
                    <div class="progress-line d-flex justify-content-end">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="59"
                        height="29"
                        viewBox="0 0 59 29"
                        fill="none"
                      >
                        <g filter="url(#filter0_d_2006_10453)">
                          <path
                            d="M7 18.092C13 18.092 12.6238 21.092 17 21.092C21.3762 21.092 23.1238 12.592 27.5 12.592C31.8762 12.592 33.1238 18.8204 37.5 17.092C39.9245 16.1344 39.5555 10.6961 42.5823 7.64307C45.7231 4.47501 47 7.04011 52 6.09192"
                            stroke="url(#paint0_linear_2006_10453)"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            shape-rendering="crispEdges"
                          />
                        </g>
                        <defs>
                          <filter
                            id="filter0_d_2006_10453"
                            x="0.25"
                            y="0.250122"
                            width="58.5"
                            height="28.5918"
                            filterUnits="userSpaceOnUse"
                            color-interpolation-filters="sRGB"
                          >
                            <feFlood
                              flood-opacity="0"
                              result="BackgroundImageFix"
                            />
                            <feColorMatrix
                              in="SourceAlpha"
                              type="matrix"
                              values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                              result="hardAlpha"
                            />
                            <feOffset dy="1" />
                            <feGaussianBlur stdDeviation="3" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix
                              type="matrix"
                              values="0 0 0 0 0.745098 0 0 0 0 0.941176 0 0 0 0 0.427451 0 0 0 0.2 0"
                            />
                            <feBlend
                              mode="normal"
                              in2="BackgroundImageFix"
                              result="effect1_dropShadow_2006_10453"
                            />
                            <feBlend
                              mode="normal"
                              in="SourceGraphic"
                              in2="effect1_dropShadow_2006_10453"
                              result="shape"
                            />
                          </filter>
                          <linearGradient
                            id="paint0_linear_2006_10453"
                            x1="51.8964"
                            y1="3.50564"
                            x2="-11.8635"
                            y2="22.2645"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop stop-color="#94ED04" />
                            <stop
                              offset="1"
                              stop-color="#E7E7E7"
                              stop-opacity="0"
                            />
                          </linearGradient>
                        </defs>
                      </svg>
                    </div>
                  </td>
                </tr>
                <tr class="table-row">
                  <td>
                    <input
                      class="form-check-input row-checkbox"
                      type="checkbox"
                    />
                  </td>
                  <td class="text-start">01/03/2025</td>
                  <td>NEW YORK</td>
                  <td>EUR USD</td>
                  <td>1.0</td>
                  <td>BUY</td>
                  <td>2:1</td>
                  <td>10:00 AM</td>
                  <td>11:00 AM</td>
                  <td>TP</td>
                  <td>$500.00</td>
                  <td>$50</td>
                  <td><strong>$316.00</strong></td>
                  <td>
                    <div class="progress-line d-flex justify-content-end">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="59"
                        height="29"
                        viewBox="0 0 59 29"
                        fill="none"
                      >
                        <g filter="url(#filter0_d_2006_10453)">
                          <path
                            d="M7 18.092C13 18.092 12.6238 21.092 17 21.092C21.3762 21.092 23.1238 12.592 27.5 12.592C31.8762 12.592 33.1238 18.8204 37.5 17.092C39.9245 16.1344 39.5555 10.6961 42.5823 7.64307C45.7231 4.47501 47 7.04011 52 6.09192"
                            stroke="url(#paint0_linear_2006_10453)"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            shape-rendering="crispEdges"
                          />
                        </g>
                        <defs>
                          <filter
                            id="filter0_d_2006_10453"
                            x="0.25"
                            y="0.250122"
                            width="58.5"
                            height="28.5918"
                            filterUnits="userSpaceOnUse"
                            color-interpolation-filters="sRGB"
                          >
                            <feFlood
                              flood-opacity="0"
                              result="BackgroundImageFix"
                            />
                            <feColorMatrix
                              in="SourceAlpha"
                              type="matrix"
                              values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                              result="hardAlpha"
                            />
                            <feOffset dy="1" />
                            <feGaussianBlur stdDeviation="3" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix
                              type="matrix"
                              values="0 0 0 0 0.745098 0 0 0 0 0.941176 0 0 0 0 0.427451 0 0 0 0.2 0"
                            />
                            <feBlend
                              mode="normal"
                              in2="BackgroundImageFix"
                              result="effect1_dropShadow_2006_10453"
                            />
                            <feBlend
                              mode="normal"
                              in="SourceGraphic"
                              in2="effect1_dropShadow_2006_10453"
                              result="shape"
                            />
                          </filter>
                          <linearGradient
                            id="paint0_linear_2006_10453"
                            x1="51.8964"
                            y1="3.50564"
                            x2="-11.8635"
                            y2="22.2645"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop stop-color="#94ED04" />
                            <stop
                              offset="1"
                              stop-color="#E7E7E7"
                              stop-opacity="0"
                            />
                          </linearGradient>
                        </defs>
                      </svg>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="pagination-container">
            <span id="selected-entries-text">0 of 2 row(s) selected.</span>
            <div>
              <button class="btn btn-pagination" id="prev-btn">Previous</button>
              <button class="btn btn-pagination" id="next-btn">Next</button>
            </div>
          </div>
        </div>
        <!-- Table End -->
      </div>
    </main>

       <!-- Log a New Trade pop-up Modal Start -->
    <div class="new-trend-modal">
      <div class="modal-overlay" id="tradeModalOverlay">
        <div class="modal-content">
          <div
            class="modal-header d-flex justify-content-between align-items-center"
          >
            <h2 class="modal-title">Add a Trade Log</h2>
            <button type="button" class="close-modal-btn">&times;</button>
          </div>

          <div class="modal-body">
            <!-- Date of Operation -->
            <div class="mb-2">
              <label for="dateOfOperation" class="form-label"
                >Date of Operation</label
              >
              <div class="position-relative">
                <input
                  type="text"
                  id="dateOfOperation"
                  class="form-control"
                  placeholder="Select Date"
                />
                <button
                  type="button"
                  class="calendar-icon position-absolute top-50 translate-middle-y"
                  style="right: 1rem"
                  aria-label="Open date picker"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="17"
                    height="16"
                    viewBox="0 0 17 16"
                    fill="none"
                  >
                    <g clip-path="url(#clip0_2412_1801)">
                      <path
                        d="M0.5 12.6665C0.501059 13.5502 0.852588 14.3975 1.47748 15.0224C2.10237 15.6472 2.9496 15.9988 3.83333 15.9998H13.1667C14.0504 15.9988 14.8976 15.6472 15.5225 15.0224C16.1474 14.3975 16.4989 13.5502 16.5 12.6665V6.6665H0.5V12.6665ZM11.8333 9.6665C12.0311 9.6665 12.2245 9.72515 12.3889 9.83503C12.5534 9.94492 12.6815 10.1011 12.7572 10.2838C12.8329 10.4665 12.8527 10.6676 12.8141 10.8616C12.7755 11.0556 12.6803 11.2338 12.5404 11.3736C12.4006 11.5135 12.2224 11.6087 12.0284 11.6473C11.8344 11.6859 11.6334 11.6661 11.4507 11.5904C11.2679 11.5147 11.1117 11.3865 11.0019 11.2221C10.892 11.0576 10.8333 10.8643 10.8333 10.6665C10.8333 10.4013 10.9387 10.1469 11.1262 9.9594C11.3138 9.77186 11.5681 9.6665 11.8333 9.6665ZM8.5 9.6665C8.69778 9.6665 8.89112 9.72515 9.05557 9.83503C9.22002 9.94492 9.34819 10.1011 9.42388 10.2838C9.49957 10.4665 9.51937 10.6676 9.48079 10.8616C9.4422 11.0556 9.34696 11.2338 9.20711 11.3736C9.06726 11.5135 8.88907 11.6087 8.69509 11.6473C8.50111 11.6859 8.30004 11.6661 8.11732 11.5904C7.93459 11.5147 7.77841 11.3865 7.66853 11.2221C7.55865 11.0576 7.5 10.8643 7.5 10.6665C7.5 10.4013 7.60536 10.1469 7.79289 9.9594C7.98043 9.77186 8.23478 9.6665 8.5 9.6665ZM5.16667 9.6665C5.36445 9.6665 5.55779 9.72515 5.72224 9.83503C5.88669 9.94492 6.01486 10.1011 6.09055 10.2838C6.16623 10.4665 6.18604 10.6676 6.14745 10.8616C6.10887 11.0556 6.01363 11.2338 5.87377 11.3736C5.73392 11.5135 5.55574 11.6087 5.36176 11.6473C5.16778 11.6859 4.96671 11.6661 4.78398 11.5904C4.60126 11.5147 4.44508 11.3865 4.3352 11.2221C4.22532 11.0576 4.16667 10.8643 4.16667 10.6665C4.16667 10.4013 4.27202 10.1469 4.45956 9.9594C4.6471 9.77186 4.90145 9.6665 5.16667 9.6665Z"
                        fill="#858D9D"
                      />
                      <path
                        d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z"
                        fill="#858D9D"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_2412_1801">
                        <rect
                          width="16"
                          height="16"
                          fill="white"
                          transform="translate(0.5)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
            </div>

            <!-- Trading Session -->
            <div class="mb-2">
              <label for="tradingSession" class="form-label"
                >Trading Session</label
              >
              <div class="select-wrapper">
                <select id="tradingSession" class="form-select">
                  <option value="" disabled selected>
                    Select a Trading Session...
                  </option>
                  <option value="morning">Morning</option>
                  <option value="afternoon">Afternoon</option>
                  <option value="evening">Evening</option>
                </select>
                <span class="select-icon">
                  <i class="fa-solid fa-sort-down"></i>
                </span>
              </div>
            </div>

            <!-- Financial Instrument -->
            <div class="mb-2">
              <label for="financialInstrument" class="form-label"
                >Financial Instrument</label
              >
              <div class="select-wrapper">
                <select id="financialInstrument" class="form-select">
                  <option value="" disabled selected>
                    Select a Financial Instrument...
                  </option>
                  <option value="stocks">Stocks</option>
                  <option value="forex">Forex</option>
                  <option value="crypto">Cryptocurrency</option>
                </select>
                <span class="select-icon">
                  <i class="fa-solid fa-sort-down"></i>
                </span>
              </div>
            </div>

            <!-- Lot Size -->
            <div class="mb-2">
              <label for="lotSize" class="form-label">Lot Size</label>
              <input
                type="number"
                id="lotSize"
                class="form-control"
                placeholder="Type Lot Size here..."
              />
            </div>

            <!-- Position Type -->
            <div class="mb-2">
              <label for="positionType" class="form-label">Position Type</label>
              <div class="select-wrapper">
                <select id="positionType" class="form-select">
                  <option value="" disabled selected>
                    Select the position type...
                  </option>
                  <option value="long">Long</option>
                  <option value="short">Short</option>
                </select>
                <span class="select-icon">
                  <i class="fa-solid fa-sort-down"></i>
                </span>
              </div>
            </div>

            <!-- Risk/Benefits Metrics -->
            <div class="mb-2">
              <label for="riskMetrics" class="form-label"
                >Risk/Benefits Metrics</label
              >
              <input
                type="text"
                id="riskMetrics"
                class="form-control"
                placeholder="Type R/B Metrics here..."
              />
            </div>
            
           <!-- Entry/Exit Time -->
              <div class="row mb-2">
                <!-- Entry Time -->
                <div class="col-6">
                  <label for="entryTime" class="form-label">Entry Time</label>
                  <div class="position-relative">
                    <input
                      type="time"
                      id="entryTime"
                      class="form-control"
                      placeholder="Select Entry Time"
                      step="60"
                    />
                    <button
                      type="button"
                      class="calendar-icon position-absolute top-50 translate-middle-y"
                      style="right: 1rem"
                      aria-label="Open entry time picker"
                      onclick="document.getElementById('entryTime').showPicker()"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="17"
                        height="16"
                        viewBox="0 0 17 16"
                        fill="none"
                      >
                        <g clip-path="url(#clip0_entry)">
                          <path
                            d="M0.5 12.6665C0.501059 13.5502 0.852588 14.3975 1.47748 15.0224C2.10237 15.6472 2.9496 15.9988 3.83333 15.9998H13.1667C14.0504 15.9988 14.8976 15.6472 15.5225 15.0224C16.1474 14.3975 16.4989 13.5502 16.5 12.6665V6.6665H0.5V12.6665Z"
                            fill="#858D9D"
                          />
                          <path
                            d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z"
                            fill="#858D9D"
                          />
                        </g>
                        <defs>
                          <clipPath id="clip0_entry">
                            <rect
                              width="16"
                              height="16"
                              fill="white"
                              transform="translate(0.5)"
                            />
                          </clipPath>
                        </defs>
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- Exit Time -->
                <div class="col-6">
                  <label for="exitTime" class="form-label">Exit Time</label>
                  <div class="position-relative">
                    <input
                      type="time"
                      id="exitTime"
                      class="form-control"
                      placeholder="Select Exit Time"
                      step="60"
                    />
                    <button
                      type="button"
                      class="calendar-icon position-absolute top-50 translate-middle-y"
                      style="right: 1rem"
                      aria-label="Open exit time picker"
                      onclick="document.getElementById('exitTime').showPicker()"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="17"
                        height="16"
                        viewBox="0 0 17 16"
                        fill="none"
                      >
                        <g clip-path="url(#clip0_exit)">
                          <path
                            d="M0.5 12.6665C0.501059 13.5502 0.852588 14.3975 1.47748 15.0224C2.10237 15.6472 2.9496 15.9988 3.83333 15.9998H13.1667C14.0504 15.9988 14.8976 15.6472 15.5225 15.0224C16.1474 14.3975 16.4989 13.5502 16.5 12.6665V6.6665H0.5V12.6665Z"
                            fill="#858D9D"
                          />
                          <path
                            d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z"
                            fill="#858D9D"
                          />
                        </g>
                        <defs>
                          <clipPath id="clip0_exit">
                            <rect
                              width="16"
                              height="16"
                              fill="white"
                              transform="translate(0.5)"
                            />
                          </clipPath>
                        </defs>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>


            <!-- Outcome -->
            <div class="mb-2">
              <label for="outcome" class="form-label">Outcome</label>
              <div class="select-wrapper">
                <select id="outcome" class="form-select">
                  <option value="" disabled selected>
                    Select the Outcome type...
                  </option>
                  <option value="profit">Profit</option>
                  <option value="loss">Loss</option>
                  <option value="breakeven">Break-even</option>
                </select>
                <span class="select-icon">
                  <i class="fa-solid fa-sort-down"></i>
                </span>
              </div>
            </div>

            <!-- Gross Profit -->
            <div class="mb-2">
              <label for="grossProfit" class="form-label">Gross Profit</label>
              <input
                type="number"
                id="grossProfit"
                class="form-control"
                placeholder="Type Gross Profit here..."
              />
            </div>

            <!-- Commission details -->
            <div class="mb-2">
              <label for="commissionDetails" class="form-label"
                >Commission details</label
              >
              <input
                type="text"
                id="commissionDetails"
                class="form-control"
                placeholder="Type Commission details here..."
              />
            </div>

            <!-- Net profit -->
            <div class="mb-2">
              <label for="netProfit" class="form-label">Net profit</label>
              <input
                type="number"
                id="netProfit"
                class="form-control"
                placeholder="Type net profit here..."
              />
            </div>

            <!-- Trade Image Link -->
            <div class="mb-0">
              <label for="tradeImageLink" class="form-label"
                >Trade Image Link</label
              >
              <input
                type="url"
                id="tradeImageLink"
                class="form-control"
                placeholder="Type Trade Image Link here..."
              />
            </div>
          </div>

          <div class="modal-footer d-flex justify-content-between gap-2">
            <button type="button" class="btn-cancel close-modal-btn">Cancel</button>
            <!-- <button type="submit" class="btn-submit">Submit</button> -->
            <button type="button" onclick="saveTradeLog()">Save Trade</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Log a New Trade pop-up Modal End -->


    

<script>
document.addEventListener("DOMContentLoaded", function () {
  loadBestTrades();

  // Example date range handling (if date-range-btn triggers it)
  const dateRangeBtn = document.getElementById("date-range-btn");
  if (dateRangeBtn) {
    dateRangeBtn.addEventListener("click", () => {
      // For now just reload without filters
      loadBestTrades();
    });
  }
});

async function loadBestTrades(startDate = "", endDate = "") {
  try {
    const response = await axios.get("/dashboard/best-trades", {
      params: { start_date: startDate, end_date: endDate },
    });

    const trades = response.data.best_trades || [];
    const tableBody = document.querySelector(".trends-table tbody");
    tableBody.innerHTML = "";

    if (trades.length === 0) {
      tableBody.innerHTML = `
        <tr>
          <td colspan="14" class="text-center">No best trades found.</td>
        </tr>`;
      return;
    }

    trades.forEach((trade) => {
      const row = `
        <tr class="table-row">
          <td><input class="form-check-input row-checkbox" type="checkbox" /></td>
          <td class="text-start">${formatDate(trade.date_of_operation)}</td>
          <td>${trade.trading_session || ""}</td>
          <td>${trade.financial_instrument || ""}</td>
          <td>${trade.lot_size || ""}</td>
          <td>${trade.position_type || ""}</td>
          <td>${trade.risk_benefit_metrics || ""}</td>
          <td>${trade.entry_time || ""}</td>
          <td>${trade.exit_time || ""}</td>
          <td>${trade.outcome || ""}</td>
          <td>$${formatNumber(trade.gross_profit)}</td>
          <td>$${formatNumber(trade.commission_details)}</td>
          <td><strong>$${formatNumber(trade.net_profit)}</strong></td>
          <td class="text-end">
            ${
              trade.trade_image_link
                ? `<img src="${trade.trade_image_link}" width="60" alt="trade chart" />`
                : "-"
            }
          </td>
        </tr>`;
      tableBody.insertAdjacentHTML("beforeend", row);
    });

    updateSelectedCount();

  } catch (error) {
    console.error("Error loading best trades:", error);
    alert("Failed to load best trades.");
  }
}

function formatDate(dateStr) {
  if (!dateStr) return "";
  const d = new Date(dateStr);
  return d.toLocaleDateString("en-US", { month: "short", day: "numeric", year: "numeric" });
}

function formatNumber(num) {
  if (num === null || num === undefined) return "0.00";
  return parseFloat(num).toFixed(2);
}

// Checkbox selection display update
function updateSelectedCount() {
  const selectedText = document.getElementById("selected-entries-text");
  const totalRows = document.querySelectorAll(".table-row").length;
  const selectedRows = document.querySelectorAll(".row-checkbox:checked").length;
  selectedText.textContent = `${selectedRows} of ${totalRows} row(s) selected.`;
}

document.addEventListener("change", (e) => {
  if (e.target.classList.contains("row-checkbox") || e.target.id === "selectAll") {
    const checkboxes = document.querySelectorAll(".row-checkbox");
    if (e.target.id === "selectAll") {
      checkboxes.forEach((cb) => (cb.checked = e.target.checked));
    }
    updateSelectedCount();
  }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // Load default stats (daily)
  loadTradeStats("daily");

  // Tab click event listeners
  const tabs = document.querySelectorAll(
    "#daily-tab, #weekly-tab, #monthly-tab, #yearly-tab, #all-time-tab"
  );

  tabs.forEach((tab) => {
    tab.addEventListener("click", (e) => {
      e.preventDefault();

      // Remove active class from all
      tabs.forEach((t) => t.classList.remove("active"));
      // Add active class to clicked tab
      tab.classList.add("active");

      // Get the selected period from tab id
      const period = tab.id.replace("-tab", "").replace("all-time", "alltime");
      loadTradeStats(period);
    });
  });
});

async function loadTradeStats(period = "daily") {
  try {
    const response = await axios.get("/dashboard/trade-stats", {
      params: { period: period },
    });

    const result = response.data;
    if (result.status !== "success") throw new Error(result.message);

    const data = result.data;

    // ✅ Update Total Holding
    document.getElementById("total-holding").innerText =
      "$" + formatNumber(data.total_holding);
    document.getElementById("total-holding-daily-task").innerText =
      `${formatPercent(data.holding_change)}% from last day`;

    // ✅ Profitable Trades
    if (data.profitable_trades !== undefined) {
      document.getElementById("profitable-trades").innerText =
        formatNumber(data.profitable_trades);
      document.getElementById("profitable-trades-daily-task").innerText =
        "+ updated " + period;
    }

    // ✅ Total Trades Made
    if (data.total_trades_made !== undefined) {
      document.getElementById("total-trades-made").innerText =
        formatNumber(data.total_trades_made);
      document.getElementById("total-trades-made-daily-task").innerText =
        "+ updated " + period;
    }

    // ✅ Active Pages
    if (data.active_pages !== undefined) {
      document.getElementById("active-pages").innerText =
        formatNumber(data.active_pages);
      document.getElementById("active-pages-daily-task").innerText =
        "+ updated " + period;
    }
  } catch (error) {
    console.error("Error loading trade stats:", error);
    alert("Failed to load trade statistics.");
  }
}

// Helper: Format numbers nicely
function formatNumber(num) {
  if (num === null || num === undefined || isNaN(num)) return "0";
  return parseFloat(num).toLocaleString("en-US", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
}

// Helper: Format percent with 1 decimal
function formatPercent(num) {
  if (num === null || num === undefined || isNaN(num)) return "0";
  return parseFloat(num).toFixed(1);
}
</script>


@push('scripts')
<script>
// Axios লোড হয়েছে কিনা চেক
if (typeof axios === 'undefined') {
    console.error('Axios is not loaded!');
    document.querySelectorAll('.trendSwiper .swiper-slide').forEach(slide => {
        const value = slide.querySelector('.value');
        const trends = slide.querySelector('.trends');
        if (value) value.textContent = 'Axios Error';
        if (trends) trends.textContent = 'Check console';
    });
} else {
    document.addEventListener('DOMContentLoaded', async () => {
        const slides = document.querySelectorAll('.trendSwiper .swiper-slide');
        if (slides.length !== 8) {
            console.error('Expected 8 slides, found:', slides.length);
            return;
        }

        try {
            console.log('Fetching /daily-trends-data?days=8 ...');
            const response = await axios.get("/daily-trends-data", {
                params: { days: 8 }
            });

            const data = response.data;
            console.log('API Response:', data);

            if (!Array.isArray(data) || data.length === 0) {
                console.warn('No data returned');
                return;
            }

            slides.forEach((slide, index) => {
                const item = data[index] || {
                    day: '—', weekday: '—', profit: '$0', profit_class: 'neutral', trades: '0 Trades'
                };

                const dateEl = slide.querySelector('.date');
                const valueEl = slide.querySelector('.value');
                const trendsEl = slide.querySelector('.trends');

                if (dateEl) {
                    dateEl.innerHTML = `${item.day} <span>${item.weekday}</span>`;
                }
                if (valueEl) {
                    valueEl.textContent = item.profit;
                    valueEl.className = 'value';
                    valueEl.classList.add(item.profit_class);
                }
                if (trendsEl) {
                    trendsEl.textContent = item.trades;
                }
            });

            console.log('Daily Trends updated!');

        } catch (error) {
            console.error('API Failed:', error.message);
            if (error.response) {
                console.error('Status:', error.response.status);
                console.error('Data:', error.response.data);
            }

            // শেষ স্লাইডে এরর
            const last = slides[7];
            if (last) {
                const v = last.querySelector('.value');
                const t = last.querySelector('.trends');
                if (v) { v.textContent = 'API Error'; v.className = 'value text-danger'; }
                if (t) t.textContent = 'Check console';
            }
        }
    });
}
</script>
@endpush

@endsection



