@extends('layout.master')
@section('title', 'Home Page')
@section('content')
@include('components.front-end.components.navbar')

<div id="intro-preloader" style="display: none;">
  <video id="intro-video" muted playsinline>
    <source src="{{ asset('assets/videos/Intro.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <button id="skip-btn" onclick="removePreloader()">Skip Intro</button>
</div>

<div class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 hero-content text-lg-start text-center">
        <div class="sticky-wrap">
          <h2 class="title">
            {{ __('What isn\'t measured can\'t be improved.') }}
          </h2>
          <p class="desc">
            {{ __('If you don\'t record your trades, you don\'t know if your results come from a method or from chance. Without records, you can\'t identify patterns, evaluate decisions, or make sound adjustments. Every adjustment becomes a guess, and every winning streak, an illusion. Recording is what transforms trading into a measurable process and progress into something real. Control begins when you start measuring.') }}
          </p>
          <div class="d-flex align-items-center gap-2">
            <button class="trial-btn">{{ __('Start Free Trial') }}</button>
            <button class="demo-btn">{{ __('Watch Demo') }}</button>
          </div>
        </div>
      </div>

      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="hero-img">
          <img
            src="{{asset('front-end/assets/img/hero-right.webp')}}"
            alt="Trading Dashboard" />
        </div>
      </div>
    </div>
  </div>
</div>

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

<div class="counter-wrapper">
  <div class="container">
    <div class="row text-center counter-box">
      <div class="col-6 col-md-3 counter-item">
        <div
          class="counter-value"
          data-target="75"
          data-start="1"
          data-prefix=""
          data-suffix="%">
          1%
        </div>
        <div class="counter-label">{{ __('Win/Loss Rate') }}</div>
      </div>
      <div class="col-6 col-md-3 counter-item">
        <div
          class="counter-value"
          data-target="12000"
          data-start="1"
          data-prefix=""
          data-suffix="K+">
          1K+
        </div>
        <div class="counter-label">{{ __('Total Trades Made') }}</div>
      </div>
      <div class="col-6 col-md-3 counter-item">
        <div
          class="counter-value"
          data-target="5400000000"
          data-start="1"
          data-prefix=""
          data-suffix="B+">
          1B+
        </div>
        <div class="counter-label">{{ __('Trading Volume') }}</div>
      </div>
      <div class="col-6 col-md-3 counter-item">
        <div
          class="counter-value"
          data-target="16600000000"
          data-start="1"
          data-prefix=""
          data-suffix="B+">
          1B+
        </div>
        <div class="counter-label">{{ __('Total Profit Generated') }}</div>
      </div>
    </div>
  </div>
</div>

<div class="achivment-counter">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
        <h2 class="title">
          {{ __('We give you the tools; you provide the work and commitment.') }}
        </h2>
        <p class="desc">
          {{ __('Traders SME isn\'t a shortcut. It\'s a tool designed to support your growth as a trader: recording, analyzing, and comparing your trading with real data. Profitability isn\'t promised or sold; it\'s built when personal commitment is based on a measurable and consistent process.') }}
        </p>
        <button class="learn-btn">{{ __('Learn More') }}</button>
      </div>

      <div class="col-12 col-lg-6">
        <div class="row g-3 justify-content-center">
          <div class="col-12 col-sm-6">
            <div class="card-item text-center">
              <p
                class="count"
                data-target="45000"
                data-prefix="$"
                data-suffix="K+">
                $<span class="count-value">0</span>K+
              </p>
              <p class="count-details">{{ __('Average portfolio size') }}</p>
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="card-item text-center">
              <p class="count" data-target="2350" data-suffix="+">
                <span class="count-value">0</span>+
              </p>
              <p class="count-details">{{ __('Profitable trades') }}</p>
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="card-item text-center">
              <p
                class="count"
                data-target="2.5"
                data-decimal="1"
                data-prefix="1:">
                $1:<span class="count-value">0</span>
              </p>
              <p class="count-details">{{ __('Risk/Reward ratio') }}</p>
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="card-item text-center">
              <p
                class="count"
                data-target="2"
                data-target-alt="15"
                data-suffix="m">
                <span class="count-value-h">0</span>h
                <span class="count-value-m">0</span>m
              </p>
              <p class="count-details">{{ __('Average trading time') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="future-section">
  <div class="container">
    <div class="header-box">
      <h2 class="title display-4 fw-bold">
        {{ __('Unlock the future of finance with our streamlined process') }}
      </h2>
      <p class="desc fs-5">
        {{ __('Join a community of traders committed to their growth and informed decision-making. Explore the full potential of Traders SME with a 14-day free trial and start building your progress on real data.') }}
      </p>
    </div>

    <div class="row">
      <div class="col-lg-6 future-content text-start">
        <div class="sticky-wrap">
          <div class="lavel-box d-flex gap-2 mb-3 align-items-center">
            <div class="num">
              <span>1</span>
            </div>
            <div class="bar"></div>
          </div>
          <h2 class="title">{{ __('Daily Trading') }}</h2>
          <p class="desc">
            {{ __('A service designed for the daily recording, organization, and monitoring of your trades, allowing you to maintain control and clarity over your actual market performance.') }}
          </p>
          <ul class="item-list">
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Structured record of each trade, including key execution and outcome data.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Clear organization of your trading activity, facilitating trade review and comparison.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Continuous performance monitoring based on objective metrics.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Tracking of your trading plan, identifying errors and deviations.') }}</span>
            </li>
          </ul>
          <button class="learn-btn">{{ __('Learn more') }}</button>
        </div>
      </div>

      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="future-img">
          <img
            src="{{asset('front-end/assets/img/future-img2.png')}}"
            alt="Trading Dashboard" />
        </div>
      </div>
    </div>

    <div class="row flex-column-reverse flex-lg-row mt-5 pt-5">
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="future-img">
          <img
            src="{{asset('front-end/assets/img/future-img1.png')}}"
            alt="Trading Dashboard" />
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
          <h2 class="title">{{ __('Chronology') }}</h2>
          <p class="desc">
            {{ __('A system for observing your trading behavior, focused on keeping a comprehensive journal of your trading activity. You record not only the results, but also your thought processes, execution, and how well you followed your plan for each trade.') }}
          </p>
          <ul class="item-list">
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Tracking your mental and emotional state to understand how your thoughts influence your decisions.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Monitoring execution and discipline, identifying errors, deviations from the plan, and repetitive behaviors.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Analyzing the trading process, going beyond the specific outcome of each trade.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Post-trade evaluation focused on learning, turning each trade into an opportunity for improvement.') }}</span>
            </li>
          </ul>
          <p class="desc">
            {{ __('Chronology includes structured templates that help you maintain an organized, consistent, and easily analyzed record over time.') }}
          </p>
          <button class="learn-btn">{{ __('Learn more') }}</button>
        </div>
      </div>
    </div>

    <div class="row mt-5 pt-5">
      <div class="col-lg-6 future-content text-start">
        <div class="sticky-wrap">
          <div class="lavel-box d-flex gap-2 mb-3 align-items-center">
            <div class="num">
              <span>3</span>
            </div>
            <div class="bar"></div>
          </div>
          <h2 class="title">{{ __('Copy Trader') }}</h2>
          <p class="desc">
            {{ __('This system allows you to replicate the same trade across multiple accounts, ensuring consistent execution and reducing operational errors when trading more than one account simultaneously.') }}
          </p>
          <ul class="item-list">
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Automatic copying of trades between different accounts.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Simultaneous execution to maintain consistency in entries and exits.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Time savings and reduced manual errors.') }}</span>
            </li>
            <li class="item d-flex align-items-center gap-2">
              <div class="icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.689941" width="24" height="24" rx="12" fill="url(#paint0_linear_22_8004)" />
                  <path d="M7.01136 13.0962L7.76705 12.3206L10.392 14.9059L15.821 9.49676L16.5966 10.2723L10.392 16.457L7.01136 13.0962Z" fill="black" />
                  <defs>
                    <linearGradient id="paint0_linear_22_8004" x1="0" y1="0.689941" x2="24" y2="24.6899" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEDD5" />
                      <stop offset="1" stop-color="#FCE7F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span>{{ __('Greater control and organization when managing multiple accounts under the same strategy.') }}</span>
            </li>
          </ul>
          <button class="learn-btn">{{ __('Learn more') }}</button>
        </div>
      </div>

      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="future-img">
          <img
            src="{{asset('front-end/assets/img/future-img3.png')}}"
            alt="Trading Dashboard" />
        </div>
      </div>
    </div>
  </div>
</div>

<div class="discover-tools">
  <div class="container">
    <div class="header-box">
      <h2 class="title fw-bold">
        {{ __('Discover the tools that make all the difference in your trading') }}
      </h2>
      <p class="desc">
        {{ __('Our suite of tools is designed to help you make better decisions, maintain control of your trading, and improve your performance with clarity and consistency.') }}
      </p>
    </div>
    <div class="tools-card-wrapper">
      <div class="row g-3">
        <div class="col-md-4 d-flex align-content-md-stretch">
          <div class="card-item text-center text-md-start">
            <div class="card-icon card-icon-pink mb-3">
              <svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.419922" width="48" height="48" rx="24" fill="url(#paint0_linear_22_8069)" />
                <path d="M15 15.4199V33.4199H33" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M31 21.4199L26 26.4199L22 22.4199L19 25.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <defs>
                  <linearGradient id="paint0_linear_22_8069" x1="0" y1="0.419922" x2="48" y2="48.4199" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFEDD5" />
                    <stop offset="1" stop-color="#FCE7F3" />
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <h5 class="title">{{ __('Performance Analytics') }}</h5>
            <p class="desc">
              {{ __('Access real-time analytics to assess win rates, profitability, risk/reward ratios, and other key performance metrics.') }}
            </p>
            <a href="#" class="learn-more-btn">{{ __('Learn more') }}
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>
        <div class="col-md-4 d-flex align-content-md-stretch">
          <div class="card-item text-center text-md-start">
            <div class="card-icon card-icon-orange mb-3">
              <svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.419922" width="48" height="48" rx="24" fill="url(#paint0_linear_22_8081)" />
                <path d="M34 19.4199L25.5 27.9199L20.5 22.9199L14 29.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M28 19.4199H34V25.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <defs>
                  <linearGradient id="paint0_linear_22_8081" x1="0" y1="0.419922" x2="48" y2="48.4199" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFEDD5" />
                    <stop offset="1" stop-color="#FCE7F3" />
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <h5 class="title">{{ __('Pattern Identification') }}</h5>
            <p class="desc">
              {{ __('Spot recurring trading patterns and identify strengths and weaknesses in your trading strategy.') }}
            </p>
            <a href="#" class="learn-more-btn">{{ __('Learn more') }}
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>
        <div class="col-md-4 d-flex align-content-md-stretch">
          <div class="card-item text-center text-md-start">
            <div class="card-icon card-icon-blue mb-3">
              <svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.419922" width="48" height="48" rx="24" fill="url(#paint0_linear_22_8093)" />
                <path d="M24 32.4199C26.1217 32.4199 28.1566 31.5771 29.6569 30.0768C31.1571 28.5765 32 26.5417 32 24.4199C32 22.2982 31.1571 20.2634 29.6569 18.7631C28.1566 17.2628 26.1217 16.4199 24 16.4199C21.8783 16.4199 19.8434 17.2628 18.3431 18.7631C16.8429 20.2634 16 22.2982 16 24.4199C16 26.5417 16.8429 28.5765 18.3431 30.0768C19.8434 31.5771 21.8783 32.4199 24 32.4199Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M24 26.4199C24.5304 26.4199 25.0391 26.2092 25.4142 25.8341C25.7893 25.4591 26 24.9504 26 24.4199C26 23.8895 25.7893 23.3808 25.4142 23.0057C25.0391 22.6306 24.5304 22.4199 24 22.4199C23.4696 22.4199 22.9609 22.6306 22.5858 23.0057C22.2107 23.3808 22 23.8895 22 24.4199C22 24.9504 22.2107 25.4591 22.5858 25.8341C22.9609 26.2092 23.4696 26.4199 24 26.4199Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M24 14.4199V16.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M24 34.4199V32.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M29 33.0801L28 31.3501" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M23 22.6898L19 15.7598" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M32.66 29.4199L30.93 28.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M15.34 19.4199L17.07 20.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M26 24.4199H34" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M14 24.4199H16" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M32.66 19.4199L30.93 20.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M15.34 29.4199L17.07 28.4199" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M29 15.7598L28 17.4898" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M23 26.1499L19 33.0799" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <defs>
                  <linearGradient id="paint0_linear_22_8093" x1="0" y1="0.419922" x2="48" y2="48.4199" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFEDD5" />
                    <stop offset="1" stop-color="#FCE7F3" />
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <h5 class="title">{{ __('Customizable Workspace') }}</h5>
            <p class="desc">
              {{ __('Personalize your dashboard to display the most relevant information for your trading style.') }}
            </p>
            <a href="#" class="learn-more-btn">{{ __('Learn more') }}
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="asset-selection">
      <div class="content">
        <div class="content-item">
          <h5 class="title">{{ __('Wide Asset Selections') }}</h5>
          <p class="desc">
            {{ __('Trade across multiple asset classes including stocks, forex, cryptocurrencies, and commodities. Our platform supports all major markets and exchanges.') }}
          </p>
          <a href="#" class="learn-more-btn">{{ __('Learn more') }}
            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </a>
        </div>
        <div class="content-item">
          <div class="table-card">
            <div class="left">
              <div class="title">{{ __('Asset') }}</div>
              <div class="item">AAPL</div>
              <div class="item">EUR/USD</div>
              <div class="item">BTC/USD</div>
              <div class="item">GOLD</div>
            </div>
            <div class="right">
              <div class="title text-end">{{ __('Performance') }}</div>

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

<div class="news-card">
  <div class="container">
    <div class="header-box">
      <h2 class="title fw-bold">
        {{ __('Stay ahead with the latest news and trends in the world of trading') }}
      </h2>
    </div>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card-box">
          <div class="card-image-placeholder">
            <img src="{{asset('front-end/assets/img/news-card.png')}}" alt="" />
          </div>
          <div class="card-body">
            <h6 class="card-subtitle">{{ __('Market Analysis') }}</h6>
            <h5 class="card-title">
              {{ __('How the Fed\'s Rate Decision Impacts Your Trading Strategy') }}
            </h5>
            <p class="card-text">
              {{ __('Learn how monetary policy changes affect asset classes and how to position your portfolios') }}
            </p>
            <a href="#" class="read-more-btn">{{ __('Read more') }}
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
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
            <h6 class="card-subtitle">{{ __('Trading Psychology') }}</h6>
            <h5 class="card-title">
              {{ __('5 Common Trading Mistakes and How to Avoid Them') }}
            </h5>
            <p class="card-text">
              {{ __('Discover the psychological pitfalls that affect most traders and strategies to overcome them.') }}
            </p>
            <a href="#" class="read-more-btn">{{ __('Read more') }}
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
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
            <h6 class="card-subtitle">{{ __('Product Updates') }}</h6>
            <h5 class="card-title">
              {{ __('New Analytics Features Released to Enhance Your Trading') }}
            </h5>
            <p class="card-text">
              {{ __('Explore our latest platform updates designed to give you deeper insights into your trading performance.') }}
            </p>
            <a href="#" class="read-more-btn">{{ __('Read more') }}
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33334 8.41992H12.6667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 3.75342L12.6667 8.42008L8 13.0868" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="testimonial-section">
  <div class="container">
    <h2 class="section-title text-center">
      {{ __('Hear from the community that\'s transforming their trading future with us') }}
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

<div class="faq-container">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="heading">
          <h2 class="faq-header">
            {{ __('Everything you need to know about our platform') }}
          </h2>
          <p class="desc">
            {{ __('Find answers to the most common questions about our trading platform, its features, and subscription plans.') }}
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
                aria-controls="collapseOne">
                {{ __('How do I create an account and start trading?') }}
              </button>
            </h2>
            <div
              id="collapseOne"
              class="accordion-collapse collapse show"
              data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {{ __('Creating an account is simple. Click on "Get Started," fill in your details, and follow the leads to start logging and enjoying your trading in minutes.') }}
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
                aria-controls="collapseTwo">
                {{ __('Is my personal and financial information secure?') }}
              </button>
            </h2>
            <div
              id="collapseTwo"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {{ __('Yes, we use industry-standard encryption and security measures to protect all your data. We never share your information with third parties without your consent.') }}
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
                aria-controls="collapseThree">
                {{ __('What subscription plans are available on the platform?') }}
              </button>
            </h2>
            <div
              id="collapseThree"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {{ __('We offer three plans: Starter, Professional, and Premium. Each plan includes different features to suit your trading needs and budget.') }}
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
                aria-controls="collapseFour">
                {{ __('Can I use the platform for different trading styles?') }}
              </button>
            </h2>
            <div
              id="collapseFour"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {{ __('Our platform is designed to accommodate any trading styles, including day traders and investors. The customizable interface allows you to tailor the experience to your specific trading style.') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="newsletter text-center">
  <div class="container">
    <h2 class="title display-4 fw-bold">
      {{ __('The freedom of trading for everyone, everywhere') }}
    </h2>
    <p class="desc fs-5">
      {{ __('Join thousands of traders who have improved their performance with our platform. Start your Free 14-day trial today.') }}
    </p>
    <div
      class="mt-4 d-flex align-items-center gap-2 justify-content-center">
      <a href="#" class="trial-btn">{{ __('Start Free Trial') }}</a>
      <a href="#" class="contact-btn">{{ __('Contact Sales') }}</a>
    </div>
  </div>
</div>

@include('components.front-end.components.footer')
@endsection