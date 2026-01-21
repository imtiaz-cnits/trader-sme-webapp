@extends('layout.master')
@section('title', 'Home Page')
@section('content')
@include('components.front-end.components.navbar')
<!-- Hero Start -->
    <div class="hero-section">
      <div class="container">
        <div class="row">
          <!-- Left Content -->
          <div class="col-lg-6 hero-content text-lg-start text-center">
            <div class="sticky-wrap">
              <h2 class="title">
              Step into tomorrow with your gateway to trading excellence
            </h2>
            <p class="desc">
              Log, analyze, and refine your trading performance with our
              comprehensive platform. Make data-driven decisions and elevate
              your trading strategy.
            </p>
            <div class="d-flex align-items-center gap-2">
              <button class="trial-btn">Start Free Trial</button>
              <button class="demo-btn">Watch Demo</button>
            </div>
            </div>
          </div>

          <!-- Right Image -->
          <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="hero-img">
              <img
                src="{{asset('front-end/assets/img/hero-right.png')}}"
                alt="Trading Dashboard"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero End -->

    <!-- Brand Start -->
    <div class="brand-wrapper">
      <div class="container">
        <div class="row justify-content-center">
          <div class="brand-logo-container">
            <div class="brand-logo">
              <img src="{{asset('front-end/assets/img/brand1.webp')}}" alt="" />
            </div>
            <div class="brand-logo">
              <img src="{{asset('front-end/assets/img/brand2.webp')}}" alt="" />
            </div>
            <div class="brand-logo">
              <img src="{{asset('front-end/assets/img/brand3.webp')}}" alt="" />
            </div>
            <div class="brand-logo">
              <img src="{{asset('front-end/assets/img/brand4.webp')}}" alt="" />
            </div>
            <div class="brand-logo">
              <img src="{{asset('front-end/assets/img/brand5.png')}}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Brand End -->

    <!-- Counter Start -->
    <div class="counter-wrapper">
      <div class="container">
        <div class="row text-center counter-box">
          <div class="col-6 col-md-3 counter-item">
            <div
              class="counter-value"
              data-target="75"
              data-start="1"
              data-prefix=""
              data-suffix="%"
            >
              1%
            </div>
            <div class="counter-label">Win/Loss Rate</div>
          </div>
          <div class="col-6 col-md-3 counter-item">
            <div
              class="counter-value"
              data-target="12000"
              data-start="1"
              data-prefix=""
              data-suffix="K+"
            >
              1K+
            </div>
            <div class="counter-label">Total Trades Made</div>
          </div>
          <div class="col-6 col-md-3 counter-item">
            <div
              class="counter-value"
              data-target="5400000000"
              data-start="1"
              data-prefix=""
              data-suffix="B+"
            >
              1B+
            </div>
            <div class="counter-label">Trading Volume</div>
          </div>
          <div class="col-6 col-md-3 counter-item">
            <div
              class="counter-value"
              data-target="16600000000"
              data-start="1"
              data-prefix=""
              data-suffix="B+"
            >
              1B+
            </div>
            <div class="counter-label">Total Profit Generated</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Counter End -->

    <!-- Achivement Counter Start -->
    <div class="achivment-counter">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <!-- Left Section: Text Content -->
          <div class="col-12 col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
            <h2 class="title">
              We empower individuals to navigate and thrive in the world of
              trading
            </h2>
            <p class="desc">
              Our mission is to provide a secure, intuitive, and comprehensive
              trading platform that enables traders to explore the full
              potential of their strategies.
            </p>
            <button class="learn-btn">Learn More</button>
          </div>

          <!-- Right Section: Counter Cards -->
          <div class="col-12 col-lg-6">
            <div class="row g-3 justify-content-center">
              <!-- Card 1: Average Portfolio Size -->
              <div class="col-12 col-sm-6">
                <div class="card-item text-center">
                  <p
                    class="count"
                    data-target="45000"
                    data-prefix="$"
                    data-suffix="K+"
                  >
                    $<span class="count-value">0</span>K+
                  </p>
                  <p class="count-details">Average portfolio size</p>
                </div>
              </div>

              <!-- Card 2: Profitable Trades -->
              <div class="col-12 col-sm-6">
                <div class="card-item text-center">
                  <p class="count" data-target="2350" data-suffix="+">
                    <span class="count-value">0</span>+
                  </p>
                  <p class="count-details">Profitable trades</p>
                </div>
              </div>

              <!-- Card 3: Risk/Reward Ratio -->
              <div class="col-12 col-sm-6">
                <div class="card-item text-center">
                  <p
                    class="count"
                    data-target="2.5"
                    data-decimal="1"
                    data-prefix="1:"
                  >
                    $1:<span class="count-value">0</span>
                  </p>
                  <p class="count-details">Risk/Reward ratio</p>
                </div>
              </div>

              <!-- Card 4: Average Trading Time -->
              <div class="col-12 col-sm-6">
                <div class="card-item text-center">
                  <p
                    class="count"
                    data-target="2"
                    data-target-alt="15"
                    data-suffix="m"
                  >
                    <span class="count-value-h">0</span>h
                    <span class="count-value-m">0</span>m
                  </p>
                  <p class="count-details">Average trading time</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Achivement Counter End -->

    <!-- Future Start -->
    <div class="future-section">
      <div class="container">
        <div class="header-box">
          <h2 class="title display-4 fw-bold">
            Unlock the future of finance with our <br />
            streamlined process
          </h2>
          <p class="desc fs-5">
            Join thousands of traders who have improved their performance with
            our platform.<br />Start your Free 14-day trial today.
          </p>
        </div>

        <div class="row">
          <!-- Left Content -->
          <div class="col-lg-6 future-content text-start">
            <div class="sticky-wrap">
              <div class="lavel-box d-flex gap-2 mb-3 align-items-center">
              <div class="num">
                <span>1</span>
              </div>
              <div class="bar"></div>
            </div>
            <h2 class="title">Trade Logging & Organization</h2>
            <p class="desc">
              Quickly and accurately record trading data with our intuitive
              interface. Track dates, sessions, instruments, and more with our
              comprehensive logging system.
            </p>
            <ul class="item-list">
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span>Comprehensive trade details capture</span>
              </li>
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span
                  >Chronological organization by date, instrument, or custom
                  categories</span
                >
              </li>
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span>Image upload for trade setups and screenshots</span>
              </li>
            </ul>
            <button class="learn-btn">Learn more</button>
            </div>
          </div>

          <!-- Right Image -->
          <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="future-img">
              <img
                src="{{asset('front-end/assets/img/future-img2.png')}}"
                alt="Trading Dashboard"
              />
            </div>
          </div>
        </div>

        <div
          class="row flex-column-reverse flex-lg-row mt-5"
        >
          <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="future-img">
              <img
                src="{{asset('front-end/assets/img/future-img1.png')}}"
                alt="Trading Dashboard"
              />
            </div>
          </div>

          <div class="col-lg-6 future-content text-start">
            <div class="sticky-wrap">
              <div class="lavel-box d-flex gap-2 mb-3 align-items-center">
              <div class="num">
                <span>2</span>
              </div>
              <div class="bar"></div>
            </div>
            <h2 class="title">Real-Time Analytics</h2>
            <p class="desc">
              Access real-time analytics to assess win rates, profitability,
              risk/reward ratios, and other key performance metrics to make
              data-driven decisions.
            </p>
            <ul class="item-list">
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span>Interactive performance charts and visualizations</span>
              </li>
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span
                  >Trading activity heatmap to identify optimal trading
                  times</span
                >
              </li>
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span
                  >Customizable filters and timeframes for deeper analysis</span
                >
              </li>
            </ul>
            <button class="learn-btn">Learn more</button>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <!-- Left Content -->
          <div class="col-lg-6 future-content text-start">
            <div class="sticky-wrap">
              <div class="lavel-box d-flex gap-2 mb-3 align-items-center">
              <div class="num">
                <span>3</span>
              </div>
              <div class="bar"></div>
            </div>
            <h2 class="title">Collaborative Workspaces</h2>
            <p class="desc">
              Work seamlessly with team members, share insights, and collaborate
              on trading strategies in real-time with our collaborative
              features.
            </p>
            <ul class="item-list">
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span>Real-time collaboration with team members</span>
              </li>
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span>Shared workspaces and customizable permissions</span>
              </li>
              <li class="item d-flex align-items-center gap-2">
                <div class="icon">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.689941"
                      width="24"
                      height="24"
                      rx="12"
                      fill="url(#paint0_linear_22_8004)"
                    />
                    <path
                      d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z"
                      fill="black"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8004"
                        x1="0"
                        y1="0.689941"
                        x2="24"
                        y2="24.6899"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <span>Integrated task management and commenting system</span>
              </li>
            </ul>
            <button class="learn-btn">Learn more</button>
            </div>
          </div>

          <!-- Right Image -->
          <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="future-img">
              <img
                src="../website/assets/img/future-img3.png"
                alt="Trading Dashboard"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Future End -->

    <!-- Discover Tools Start -->
    <div class="discover-tools">
      <div class="container">
        <!-- Our tools -->
        <div class="header-box">
          <h2 class="title fw-bold">
            Discover the tools that set us apart and empower your trading
            journey
          </h2>
          <p class="desc">
            Our comprehensive suite of trading tools helps you make better
            decisions and <br />
            improve your performance.
          </p>
        </div>
        <div class="tools-card-wrapper">
          <div class="row g-3">
            <div class="col-md-4 d-flex align-content-md-stretch">
              <div class="card-item text-center text-md-start">
                <div class="card-icon card-icon-pink mb-3">
                  <svg
                    width="48"
                    height="49"
                    viewBox="0 0 48 49"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.419922"
                      width="48"
                      height="48"
                      rx="24"
                      fill="url(#paint0_linear_22_8069)"
                    />
                    <path
                      d="M15 15.4199V33.4199H33"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M31 21.4199L26 26.4199L22 22.4199L19 25.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8069"
                        x1="0"
                        y1="0.419922"
                        x2="48"
                        y2="48.4199"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <h5 class="title">Performance Analytics</h5>
                <p class="desc">
                  Access real-time analytics to assess win rates, profitability,
                  risk/reward ratios, and other key performance metrics.
                </p>
                <a href="#" class="learn-more-btn"
                  >Learn more
                  <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.33334 8.41992H12.6667"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M8 3.75342L12.6667 8.42008L8 13.0868"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
            <div class="col-md-4 d-flex align-content-md-stretch">
              <div class="card-item text-center text-md-start">
                <div class="card-icon card-icon-orange mb-3">
                  <svg
                    width="48"
                    height="49"
                    viewBox="0 0 48 49"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.419922"
                      width="48"
                      height="48"
                      rx="24"
                      fill="url(#paint0_linear_22_8081)"
                    />
                    <path
                      d="M34 19.4199L25.5 27.9199L20.5 22.9199L14 29.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M28 19.4199H34V25.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8081"
                        x1="0"
                        y1="0.419922"
                        x2="48"
                        y2="48.4199"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <h5 class="title">Pattern Identification</h5>
                <p class="desc">
                  Spot recurring trading patterns and identify strengths and
                  weaknesses in your trading strategy.
                </p>
                <a href="#" class="learn-more-btn"
                  >Learn more
                  <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.33334 8.41992H12.6667"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M8 3.75342L12.6667 8.42008L8 13.0868"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
            <div class="col-md-4 d-flex align-content-md-stretch">
              <div class="card-item text-center text-md-start">
                <div class="card-icon card-icon-blue mb-3">
                  <svg
                    width="48"
                    height="49"
                    viewBox="0 0 48 49"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      y="0.419922"
                      width="48"
                      height="48"
                      rx="24"
                      fill="url(#paint0_linear_22_8093)"
                    />
                    <path
                      d="M24 32.4199C26.1217 32.4199 28.1566 31.5771 29.6569 30.0768C31.1571 28.5765 32 26.5417 32 24.4199C32 22.2982 31.1571 20.2634 29.6569 18.7631C28.1566 17.2628 26.1217 16.4199 24 16.4199C21.8783 16.4199 19.8434 17.2628 18.3431 18.7631C16.8429 20.2634 16 22.2982 16 24.4199C16 26.5417 16.8429 28.5765 18.3431 30.0768C19.8434 31.5771 21.8783 32.4199 24 32.4199Z"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M24 26.4199C24.5304 26.4199 25.0391 26.2092 25.4142 25.8341C25.7893 25.4591 26 24.9504 26 24.4199C26 23.8895 25.7893 23.3808 25.4142 23.0057C25.0391 22.6306 24.5304 22.4199 24 22.4199C23.4696 22.4199 22.9609 22.6306 22.5858 23.0057C22.2107 23.3808 22 23.8895 22 24.4199C22 24.9504 22.2107 25.4591 22.5858 25.8341C22.9609 26.2092 23.4696 26.4199 24 26.4199Z"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M24 14.4199V16.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M24 34.4199V32.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M29 33.0801L28 31.3501"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M23 22.6898L19 15.7598"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M32.66 29.4199L30.93 28.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M15.34 19.4199L17.07 20.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M26 24.4199H34"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M14 24.4199H16"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M32.66 19.4199L30.93 20.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M15.34 29.4199L17.07 28.4199"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M29 15.7598L28 17.4898"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M23 26.1499L19 33.0799"
                      stroke="black"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <defs>
                      <linearGradient
                        id="paint0_linear_22_8093"
                        x1="0"
                        y1="0.419922"
                        x2="48"
                        y2="48.4199"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#FFEDD5" />
                        <stop offset="1" stop-color="#FCE7F3" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>
                <h5 class="title">Customizable Workspace</h5>
                <p class="desc">
                  Personalize your dashboard to display the most relevant
                  information for your trading style.
                </p>
                <a href="#" class="learn-more-btn"
                  >Learn more
                  <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.33334 8.41992H12.6667"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M8 3.75342L12.6667 8.42008L8 13.0868"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Our tools -->

        <!-- Asset Selection Start -->
        <div class="asset-selection">
          <div class="content">
            <div class="content-item">
              <h5 class="title">Wide Asset Selections</h5>
              <p class="desc">
                Trade across multiple asset classes including stocks, forex,
                cryptocurrencies, and commodities. Our platform supports all
                major markets and exchanges.
              </p>
              <a href="#" class="learn-more-btn"
                >Learn more
                <svg
                  width="16"
                  height="17"
                  viewBox="0 0 16 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M3.33334 8.41992H12.6667"
                    stroke="black"
                    stroke-width="1.33333"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M8 3.75342L12.6667 8.42008L8 13.0868"
                    stroke="black"
                    stroke-width="1.33333"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </div>
            <div class="content-item">
              <div class="table-card">
                <div class="left">
                  <div class="title">Asset</div>
                  <div class="item">AAPL</div>
                  <div class="item">EUR/USD</div>
                  <div class="item">BTC/USD</div>
                  <div class="item">GOLD</div>
                </div>
                <div class="right">
                  <div class="title text-end">Performance</div>

                  <div class="item text-end text-succ" style="color: #22c55e">
                    +1.3%
                  </div>

                  <div class="item text-end text-succ" style="color: #22c55e">
                    +0.5%
                  </div>

                  <div class="item text-end text-den" style="color: #ef4444">
                    -2.3%
                  </div>
                  <div class="item text-end text-succ" style="color: #22c55e">
                    +0.8%
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Discover Tools End -->

    <!-- News card Start -->
    <div class="news-card">
      <div class="container">
        <div class="header-box">
          <h2 class="title fw-bold">
           Stay ahead with the latest news and trends in the world of trading
          </h2>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card-box">
              <div class="card-image-placeholder">
                <img src="{{asset('front-end/assets/img/news-card.png')}}" alt="" />
              </div>
              <div class="card-body">
                <h6 class="card-subtitle">Market Analysis</h6>
                <h5 class="card-title">
                  How the Fed's Rate Decision Impacts Your Trading Strategy
                </h5>
                <p class="card-text">
                  Learn how monetary policy changes affect asset classes and how
                  to position your portfolios
                </p>
                <a href="#" class="read-more-btn"
                  >Read more
                  <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.33334 8.41992H12.6667"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M8 3.75342L12.6667 8.42008L8 13.0868"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card-box">
              <div class="card-image-placeholder">
                <img src="{{asset('front-end/assets/img/news-card.png')}}" alt="" />
              </div>
              <div class="card-body">
                <h6 class="card-subtitle">Trading Psychology</h6>
                <h5 class="card-title">
                  5 Common Trading Mistakes and How to Avoid Them
                </h5>
                <p class="card-text">
                  Discover the psychological pitfalls that affect most traders
                  and strategies to overcome them.
                </p>
                <a href="#" class="read-more-btn"
                  >Read more
                  <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.33334 8.41992H12.6667"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M8 3.75342L12.6667 8.42008L8 13.0868"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card-box">
              <div class="card-image-placeholder">
                <img src="{{asset('front-end/assets/img/news-card.png')}}" alt="" />
              </div>
              <div class="card-body">
                <h6 class="card-subtitle">Product Updates</h6>
                <h5 class="card-title">
                  New Analytics Features Released to Enhance Your Trading
                </h5>
                <p class="card-text">
                  Explore our latest platform updates designed to give you
                  deeper insights into your trading performance.
                </p>
                <a href="#" class="read-more-btn"
                  >Read more
                  <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.33334 8.41992H12.6667"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M8 3.75342L12.6667 8.42008L8 13.0868"
                      stroke="black"
                      stroke-width="1.33333"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- News card End -->

    <!-- Testimonials Start -->
    <section class="testimonial-section">
      <div class="container">
        <h2 class="section-title text-center">
          Hear from the community that's transforming their trading future with
          us
        </h2>
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <div class="testimonial-card">
              <div class="testimonial-avatar">
                <img src="{{asset('front-end/assets/img/testimonial-pp.png')}}" alt="" />
              </div>
              <p class="testimonial-text">
                "This platform has completely transformed how I track and
                analyze my trades. The insights I've gained have significantly
                improved my win rate. The interface is so intuitive, and
                transactions are lightning fast. I've gained more confidence in
                navigating the crypto market thanks to their insights,"
              </p>
              <p class="testimonial-author">Alex Thompson</p>
              <p class="testimonial-role">Day Trader</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonials End -->

    <!-- FAQ Start -->
    <div class="faq-container">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="heading">
              <h2 class="faq-header">
                Everything you need to know about our platform
              </h2>
              <p class="desc">
                Find answers to the most common questions about our trading
                platform, its features, and subscription plans.
              </p>
            </div>
          </div>
          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="accordion" id="faqAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    How do I create an account and start trading?
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#faqAccordion"
                >
                  <div class="accordion-body">
                    Creating an account is simple. Click on "Get Started," fill
                    in your details, and follow the leads to start logging and
                    enjoying your trading in minutes.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    Is my personal and financial information secure?
                  </button>
                </h2>
                <div
                  id="collapseTwo"
                  class="accordion-collapse collapse"
                  data-bs-parent="#faqAccordion"
                >
                  <div class="accordion-body">
                    Yes, we use industry-standard encryption and security
                    measures to protect all your data. We never share your
                    information with third parties without your consent.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    What subscription plans are available on the platform?
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  data-bs-parent="#faqAccordion"
                >
                  <div class="accordion-body">
                    We offer three plans: Starter, Professional, and Premium.
                    Each plan includes different features to suit your trading
                    needs and budget.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFour"
                    aria-expanded="false"
                    aria-controls="collapseFour"
                  >
                    Can I use the platform for different trading styles?
                  </button>
                </h2>
                <div
                  id="collapseFour"
                  class="accordion-collapse collapse"
                  data-bs-parent="#faqAccordion"
                >
                  <div class="accordion-body">
                    Our platform is designed to accommodate any trading styles,
                    including day traders and investors. The customizable
                    interface allows you to tailor the experience to your
                    specific trading style.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FAQ End -->

    <!-- Newsletter Start -->
    <div class="newsletter text-center">
      <div class="container">
        <h2 class="title display-4 fw-bold">
          The freedom of trading for everyone, <br />
          everywhere
        </h2>
        <p class="desc fs-5">
          Join thousands of traders who have improved their performance with our
          platform.<br />Start your Free 14-day trial today.
        </p>
        <div
          class="mt-4 d-flex align-items-center gap-2 justify-content-center"
        >
          <a href="#" class="trial-btn">Start Free Trial</a>
          <a href="#" class="contact-btn">Contact Sales</a>
        </div>
      </div>
    </div>
    <!-- Newsletter End -->


@include('components.front-end.components.footer')
@endsection

