<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Traders SME Dashboard</title>

  <link rel="icon" type="image/png" href="{{asset('back-end/assets/icon/fav-icon.png')}}" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

  <link rel="stylesheet" href="{{asset('back-end/assets/css/style.css')}}" />
  <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/progress.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/animate.min.css') }}" rel="stylesheet" />

  <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/config.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg py-3">
    <div class="container-fluid px-md-5">
      <div class="d-flex align-items-center justify-content-between gap-2 w-100">
        <div class="wrapper d-flex align-items-center gap-4">
          <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="26" viewBox="0 0 90 26" fill="none">
              <path d="M3.59 19.37C3.06 19.14 2.6 18.82 2.2 18.43C1.8 18.03 1.49 17.56 1.26 17.04C1.03 16.51 0.91 15.93 0.91 15.32C0.91 14.7 1.03 14.13 1.26 13.61C1.49 13.08 1.8 12.61 2.2 12.22C2.6 11.82 3.06 11.51 3.59 11.28C4.11 11.05 4.69 10.93 5.3 10.93H25.37C25.81 10.93 26.19 11.08 26.49 11.39C26.8 11.7 26.95 12.08 26.95 12.51C26.95 12.95 26.8 13.33 26.49 13.64C26.18 13.95 25.81 14.1 25.37 14.1H5.23C4.91 14.1 4.61 14.22 4.36 14.45C4.11 14.68 3.98 14.97 3.98 15.32C3.98 15.65 4.11 15.94 4.36 16.18C4.62 16.42 4.91 16.55 5.23 16.55H23.52C24.14 16.55 24.71 16.67 25.25 16.89C25.79 17.12 26.26 17.44 26.66 17.84C27.05 18.23 27.37 18.7 27.6 19.24C27.83 19.78 27.95 20.36 27.95 20.98C27.95 21.6 27.83 22.17 27.6 22.69C27.37 23.22 27.05 23.68 26.66 24.08C26.26 24.48 25.79 24.79 25.25 25.01C24.71 25.23 24.13 25.33 23.52 25.33H3.49C3.05 25.33 2.67 25.18 2.37 24.87C2.06 24.56 1.9 24.19 1.9 23.75C1.9 23.31 2.06 22.93 2.37 22.63C2.68 22.32 3.05 22.16 3.49 22.16H23.65C23.98 22.16 24.27 22.04 24.51 21.81C24.76 21.58 24.88 21.3 24.88 20.97C24.88 20.62 24.76 20.32 24.51 20.08C24.27 19.84 23.99 19.71 23.65 19.71H5.31C4.69 19.71 4.12 19.6 3.59 19.37Z" fill="#1D5053" />
              <path d="M33.97 24.87C33.66 25.18 33.29 25.34 32.85 25.34C32.41 25.34 32.03 25.18 31.73 24.87C31.42 24.56 31.26 24.19 31.26 23.75V12.51C31.26 12.07 31.42 11.69 31.73 11.39C32.04 11.08 32.41 10.92 32.85 10.92C33.07 10.92 33.27 10.97 33.44 11.05C33.61 11.14 33.79 11.25 33.97 11.38C35.38 12.61 36.59 13.59 37.62 14.29C38.65 15 39.59 15.53 40.44 15.88C41.28 16.23 42.08 16.46 42.83 16.54C43.58 16.63 44.39 16.67 45.25 16.67C46.11 16.67 46.91 16.63 47.65 16.55C48.38 16.48 49.16 16.26 49.99 15.91C50.82 15.56 51.75 15.03 52.77 14.32C53.79 13.62 55.03 12.64 56.46 11.38C56.83 11.07 57.21 10.92 57.58 10.92C58.02 10.92 58.4 11.07 58.7 11.38C59.01 11.69 59.16 12.06 59.16 12.5V23.74C59.16 24.18 59.01 24.56 58.7 24.86C58.39 25.17 58.02 25.33 57.58 25.33C57.14 25.33 56.76 25.17 56.46 24.86C56.15 24.55 55.99 24.18 55.99 23.74V15.92C55 16.71 54.05 17.37 53.13 17.9C52.21 18.43 51.32 18.85 50.45 19.17C49.58 19.49 48.72 19.71 47.86 19.84C47 19.97 46.13 20.04 45.24 20.04C44.3 20.04 43.38 19.97 42.52 19.84C41.64 19.71 40.78 19.48 39.9 19.17C39.03 18.85 38.15 18.43 37.26 17.9C36.37 17.37 35.42 16.71 34.43 15.92V23.75C34.43 24.19 34.28 24.56 33.97 24.87Z" fill="#1D5053" />
              <path d="M69.27 14.09C68.5 14.09 67.88 14.23 67.41 14.51C66.93 14.79 66.56 15.12 66.29 15.52C66.01 15.92 65.82 16.35 65.72 16.83C65.63 17.3 65.58 17.74 65.58 18.13C65.58 18.53 65.63 18.96 65.72 19.44C65.82 19.92 66.01 20.35 66.29 20.75C66.56 21.14 66.94 21.48 67.41 21.76C67.88 22.04 68.51 22.17 69.27 22.17H87.49C87.93 22.17 88.31 22.33 88.61 22.64C88.92 22.95 89.07 23.32 89.07 23.76C89.07 24.2 88.92 24.58 88.61 24.88C88.3 25.19 87.93 25.35 87.49 25.35H68.21C67.31 25.35 66.5 25.12 65.8 24.68C65.09 24.24 64.49 23.67 64 22.98C63.5 22.28 63.12 21.51 62.86 20.65C62.59 19.79 62.46 18.95 62.46 18.13C62.46 17.3 62.6 16.46 62.87 15.61C63.15 14.76 63.55 13.99 64.08 13.29C64.61 12.6 65.25 12.03 66 11.59C66.75 11.15 67.6 10.92 68.55 10.92H87.49C87.93 10.92 88.31 11.08 88.62 11.39C88.93 11.7 89.08 12.07 89.08 12.51C89.08 12.95 88.93 13.33 88.62 13.63C88.31 13.94 87.93 14.09 87.49 14.09H69.27ZM87.23 17.01C87.54 17.32 87.69 17.69 87.69 18.13C87.69 18.57 87.54 18.95 87.23 19.25C86.92 19.56 86.55 19.71 86.11 19.71H69.65C69.21 19.71 68.83 19.56 68.52 19.25C68.21 18.94 68.06 18.57 68.06 18.13C68.06 17.69 68.21 17.31 68.52 17.01C68.83 16.7 69.21 16.54 69.65 16.54H86.11C86.55 16.54 86.92 16.7 87.23 17.01Z" fill="#1D5053" />
              <path d="M9.07 0.649994C9.22 0.649994 9.3 0.718141 9.3 0.873019V1.87044C9.3 2.02532 9.22 2.10585 9.07 2.10585H5.89V7.53279C5.89 7.68767 5.82 7.75582 5.66 7.75582H4.55C4.4 7.75582 4.33 7.68767 4.33 7.53279V2.10585H1.15C0.99 2.10585 0.91 2.02532 0.91 1.87044V0.873019C0.91 0.718141 0.99 0.649994 1.15 0.649994H9.07Z" fill="black" />
              <path d="M19.92 0.649994C21.47 0.649994 22.1 1.36863 22.1 2.73776V3.3139C22.1 4.47239 21.65 5.14766 20.59 5.34591L22.32 7.49562C22.38 7.56377 22.37 7.74962 22.19 7.74962H20.88C20.71 7.74962 20.66 7.70626 20.6 7.61952L18.99 5.50698H15.72V7.5266C15.72 7.68147 15.65 7.74962 15.49 7.74962H14.4C14.24 7.74962 14.16 7.68147 14.16 7.5266V0.953557C14.16 0.749118 14.26 0.649994 14.47 0.649994H19.92ZM15.72 4.27415H19.6C20.29 4.27415 20.54 3.97678 20.54 3.36966V2.94219C20.54 2.33507 20.29 2.03771 19.6 2.03771H15.85C15.75 2.03771 15.72 2.08107 15.72 2.16161V4.27415Z" fill="black" />
              <path d="M31.81 0.649994C32.33 0.649994 32.64 0.811069 32.98 1.41819L36.33 7.51421C36.4 7.64431 36.38 7.74962 36.21 7.74962H34.92C34.79 7.74962 34.74 7.71865 34.69 7.61952L33.97 6.31235H29.2L28.5 7.61952C28.45 7.71865 28.39 7.74962 28.26 7.74962H26.94C26.77 7.74962 26.74 7.6505 26.81 7.51421L30.14 1.41819C30.47 0.811069 30.78 0.649994 31.2 0.649994H31.81ZM29.84 5.13527H33.33L31.72 2.16161C31.69 2.11205 31.66 2.09346 31.61 2.09346H31.55C31.5 2.09346 31.46 2.11205 31.43 2.16161L29.84 5.13527Z" fill="black" />
              <path d="M46.21 0.649994C48.41 0.649994 49.31 1.5297 49.31 3.51215V4.89366C49.31 6.86991 48.41 7.75582 46.21 7.75582H41.46C41.26 7.75582 41.16 7.6567 41.16 7.45226V0.953557C41.16 0.749118 41.26 0.649994 41.46 0.649994H46.21ZM42.71 6.21323C42.71 6.30616 42.75 6.34333 42.84 6.34333H46.17C47.36 6.34333 47.76 5.95923 47.76 4.76357V3.64844C47.76 2.45278 47.36 2.06868 46.17 2.06868H42.84C42.75 2.06868 42.71 2.11205 42.71 2.21117V6.21323Z" fill="black" />
              <path d="M61.77 0.649994C61.92 0.649994 62 0.718141 62 0.873019V1.83946C62 1.99434 61.92 2.06249 61.77 2.06249H57.33C56.28 2.06249 55.98 2.37844 55.98 3.444V3.54312H61.71C61.86 3.54312 61.93 3.61127 61.93 3.76615V4.56532C61.93 4.7202 61.86 4.78835 61.71 4.78835H55.98V4.96181C55.98 6.02737 56.28 6.34333 57.33 6.34333H61.77C61.92 6.34333 62 6.41147 62 6.56635V7.53279C62 7.68767 61.92 7.75582 61.77 7.75582H57.3C55.25 7.75582 54.46 7.02479 54.46 5.07952V3.33249C54.46 1.38722 55.25 0.656189 57.3 0.656189H61.77V0.649994Z" fill="black" />
              <path d="M72.87 0.649994C74.43 0.649994 75.05 1.36863 75.05 2.73776V3.3139C75.05 4.47239 74.61 5.14766 73.54 5.34591L75.28 7.49562C75.34 7.56377 75.33 7.74962 75.15 7.74962H73.84C73.67 7.74962 73.62 7.70626 73.55 7.61952L71.95 5.50698H68.67V7.5266C68.67 7.68147 68.6 7.74962 68.45 7.74962H67.35C67.2 7.74962 67.12 7.68147 67.12 7.5266V0.953557C67.12 0.749118 67.22 0.649994 67.42 0.649994H72.87ZM68.67 4.27415H72.56C73.25 4.27415 73.5 3.97678 73.5 3.36966V2.94219C73.5 2.33507 73.25 2.03771 72.56 2.03771H68.8C68.71 2.03771 68.67 2.08107 68.67 2.16161V4.27415Z" fill="black" />
              <path d="M87.2 0.649994C87.36 0.649994 87.43 0.718141 87.43 0.873019V1.83946C87.43 1.99434 87.36 2.06249 87.2 2.06249H82.12C81.73 2.06249 81.58 2.27312 81.58 2.63244V2.97937C81.58 3.35727 81.75 3.54932 82.1 3.54932H85.91C87.07 3.54932 87.69 4.18122 87.69 5.29635V6.10791C87.69 7.09294 87.12 7.76201 85.89 7.76201H80.27C80.12 7.76201 80.03 7.69387 80.03 7.53899V6.57255C80.03 6.41767 80.12 6.34952 80.27 6.34952H85.6C85.98 6.34952 86.14 6.13889 86.14 5.77957V5.36449C86.14 4.98659 85.96 4.79454 85.61 4.79454H81.81C80.64 4.79454 80.03 4.16264 80.03 3.04751V2.3041C80.03 1.31907 80.6 0.649994 81.83 0.649994H87.2Z" fill="black" />
            </svg>
          </a>

          <div class="d-none d-lg-flex" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} p-2" href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.daily-trading') ? 'active' : '' }} p-2" href="{{ route('admin.daily-trading') }}">Daily Trading</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.chronology') ? 'active' : '' }} p-2" href="{{ route('admin.chronology') }}">Chronology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.copy-trader') ? 'active' : '' }} p-2" href="{{ route('admin.copy-trader') }}">Copy Trader</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }} p-2" href="{{ route('admin.settings') }}">Settings</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="d-flex gap-2 gap-lg-3 align-items-center">
          <form class="d-none d-lg-flex">
            <div class="input-group">
              <input type="text" class="form-control search-bar w-100" placeholder="Search..." />
            </div>
          </form>

          <button class="btn d-lg-none mobile-menu-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas">
            <i class="fa-solid fa-bars"></i>
          </button>

          <div class="language-selector">
            <div class="selected-language">
              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png" alt="USA Flag" class="flag" />
              <span>Eng</span>
              <span class="dropdown-icon"><i class="fa-solid fa-angle-down"></i></span>
            </div>
          </div>

          <div class="theme-toggle">
            <button id="toggleMode" class="theme-toggle" aria-label="Toggle dark and light mode">

              <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
              </svg>

              <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                <path d="M21 12.79A9 9 0 1 1 11.21 3A7 7 0 0 0 21 12.79z"></path>
              </svg>

            </button>
          </div>

          <div class="user">
            <div class="profile-container-dropdown" id="profile-dropdown-wrapper">
              <button type="button" class="profile-dropdown-btn" id="profile-button">
                <img src="{{asset('back-end/assets/icon/Avatar.png')}}" alt="profile" />
              </button>
              <div class="profile-dropdown-options" id="profile-options">
                <div class="profile-dropdown-option">Profile</div>
                <div class="profile-dropdown-option">Settings</div>
                <div class="profile-dropdown-option" id="logout-btn">Log Out</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarOffcanvas">
    <div class="offcanvas-header">
      <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
        Traders SME
      </a>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} p-2 my-1" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.daily-trading') ? 'active' : '' }} p-2 my-1" href="{{ route('admin.daily-trading') }}">Daily Trading</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.chronology') ? 'active' : '' }} p-2 my-1" href="{{ route('admin.chronology') }}">Chronology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.copy-trader') ? 'active' : '' }} p-2 my-1" href="{{ route('admin.copy-trader') }}">Copy Trader</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }} p-2 my-1" href="{{ route('admin.settings') }}">Settings</a>
        </li>
      </ul>
    </div>
  </div>

  @yield('content')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="{{asset('back-end/assets/js/app.js')}}"></script>

  <script>
    document.getElementById("logout-btn").addEventListener("click", async function() {
      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        let res = await axios.post("{{ route('logout') }}", {}, {
          headers: {
            "X-CSRF-TOKEN": csrfToken
          }
        });
        if (res.data.success) window.location.href = "/login-page";
      } catch (error) {
        console.error("Logout error:", error);
      }
    });

    document.addEventListener("DOMContentLoaded", () => {
      // 1. Select toggle buttons (Robust selection to handle duplicates)
      const toggleBtns = document.querySelectorAll("#toggleMode, .theme-toggle button");
      const themeBoxes = document.querySelectorAll(".theme-box .box");

      // 2. Check System/Storage Preference
      const systemPrefersDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
      const savedTheme = localStorage.getItem("theme");
      let currentTheme = savedTheme || (systemPrefersDark ? "dark" : "light");

      // 3. Universal Function to Apply Theme
      const applyTheme = (theme) => {
        // Select ALL icons on the page dynamically (using classes)
        const sunIcons = document.querySelectorAll(".sun-icon");
        const moonIcons = document.querySelectorAll(".moon-icon");

        if (theme === "dark") {
          document.documentElement.setAttribute("data-theme", "dark");

          // Hide Sun, Show Moon
          sunIcons.forEach(icon => icon.style.display = "none");
          moonIcons.forEach(icon => icon.style.display = "block");
        } else {
          document.documentElement.removeAttribute("data-theme");

          // Show Sun, Hide Moon
          sunIcons.forEach(icon => icon.style.display = "block");
          moonIcons.forEach(icon => icon.style.display = "none");
        }

        // Save preference
        localStorage.setItem("theme", theme);
        currentTheme = theme;
      };

      // 4. Apply Initial Theme on Load
      applyTheme(currentTheme);

      // 5. Event Listener: Navbar/Sidebar Toggle Buttons
      if (toggleBtns.length > 0) {
        toggleBtns.forEach((btn) => {
          // Remove previous listeners to avoid duplicates if app.js runs first
          const newBtn = btn.cloneNode(true);
          btn.parentNode.replaceChild(newBtn, btn);

          newBtn.addEventListener("click", (e) => {
            e.preventDefault();
            const newTheme = currentTheme === "dark" ? "light" : "dark";
            applyTheme(newTheme);
          });
        });
      }

      // 6. Event Listener: Settings Page Theme Boxes
      if (themeBoxes.length > 0) {
        themeBoxes.forEach((box) => {
          box.addEventListener("click", () => {
            if (box.classList.contains("dark")) {
              applyTheme("dark");
            } else if (box.classList.contains("light")) {
              applyTheme("light");
            }
          });
        });
      }
    });
  </script>
</body>

</html>