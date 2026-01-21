// .......................................
// .. Auth Page Function Start ..........
// .......................................
function showForm(type) {
  const registerForm = document.getElementById("register-form");
  const loginForm = document.getElementById("login-form");
  const buttons = document.querySelectorAll(".tab-button");

  const animateIn = (element) => {
    element.classList.add("active", "form-wrapper-fade-in");
    setTimeout(() => {
      element.classList.remove("form-wrapper-fade-in"); // Remove after animation
    }, 500); // Match duration of CSS animation
  };

  if (type === "register") {
    loginForm.classList.remove("active");
    registerForm.classList.remove("form-wrapper-fade-in");
    animateIn(registerForm);

    buttons[0].classList.add("active");
    buttons[1].classList.remove("active");
  } else {
    registerForm.classList.remove("active");
    loginForm.classList.remove("form-wrapper-fade-in");
    animateIn(loginForm);

    buttons[0].classList.remove("active");
    buttons[1].classList.add("active");
  }
}

// Password visibility toggle.......
function setupPasswordToggle() {
  const toggles = document.querySelectorAll(".toggle-password");

  toggles.forEach(function (toggle) {
    toggle.addEventListener("click", function () {
      const input = this.parentElement.querySelector("input");

      if (input.type === "password") {
        input.type = "text";
        this.classList.remove("fa-eye");
        this.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        this.classList.remove("fa-eye-slash");
        this.classList.add("fa-eye");
      }
    });
  });
}

setupPasswordToggle();
// .......................................
// .. Auth Page Function End .............
// .......................................

// ..................................................
// .. Navbar User Dropdown Function Start ..........
// ..................................................

document.addEventListener("DOMContentLoaded", () => {
  const profileButton = document.getElementById("profile-button");
  const profileOptions = document.getElementById("profile-options");
  const profileWrapper = document.getElementById("profile-dropdown-wrapper");

  // Custom profile Logic
  profileButton.addEventListener("click", () => {
    profileOptions.classList.toggle("open");
    profileButton.setAttribute(
      "aria-expanded",
      profileOptions.classList.contains("open")
    );
  });

  profileOptions
    .querySelectorAll(".profile-dropdown-option")
    .forEach((option) => {
      option.addEventListener("click", () => {
        profileOptions.classList.remove("open");
        profileButton.setAttribute("aria-expanded", "false");
      });
    });

  // Close profile when clicking outside
  document.addEventListener("click", (event) => {
    if (
      !profileWrapper.contains(event.target) &&
      profileOptions.classList.contains("open")
    ) {
      profileOptions.classList.remove("open");
      profileButton.setAttribute("aria-expanded", "false");
    }
  });
});
// ..................................................
// .. Navbar User Dropdown Function End ..........
// ..................................................

// .......................................
// .. Language Selector Start ..........
// .......................................
document.querySelectorAll(".language-selector").forEach((languageSelector) => {
  const selectedLanguageDiv =
    languageSelector.querySelector(".selected-language");
  const languageList = languageSelector.querySelector(".language-list");
  const languages = languageList.querySelectorAll("li");

  // Toggle dropdown
  selectedLanguageDiv.addEventListener("click", (e) => {
    e.stopPropagation(); // Prevent outside click handler from firing
    // Close other dropdowns
    document.querySelectorAll(".language-selector.open").forEach((el) => {
      if (el !== languageSelector) el.classList.remove("open");
    });
    languageSelector.classList.toggle("open");
  });

  // Handle language selection
  languages.forEach((language) => {
    language.addEventListener("click", (e) => {
      e.stopPropagation();
      const lang = language.getAttribute("data-lang");
      const flagSrc = language.querySelector(".flag").src;
      const langName = language.textContent.trim();

      // Update selected language display
      selectedLanguageDiv.querySelector(".flag").src = flagSrc;
      selectedLanguageDiv.querySelector("span").textContent = langName;

      console.log(`Language changed to: ${lang}`);

      languageSelector.classList.remove("open");
    });
  });
});

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
  document.querySelectorAll(".language-selector.open").forEach((el) => {
    if (!el.contains(e.target)) el.classList.remove("open");
  });
});

// .......................................
// .. Language Selector End ..........
// .......................................

// .......................................
// .. Light/Dark Mode Color Start ..........
// .......................................

// ....... Navbar Toggle Dark mode.......

const toggleBtns = document.querySelectorAll("#toggleMode");
const sunIcon = document.getElementById("sun-icon");
const moonIcon = document.getElementById("moon-icon");

const systemPrefersDark =
  window.matchMedia &&
  window.matchMedia("(prefers-color-scheme: dark)").matches;
const initialTheme =
  localStorage.getItem("theme") || (systemPrefersDark ? "dark" : "light");

if (initialTheme === "dark") {
  document.documentElement.setAttribute("data-theme", "dark");
}

toggleBtns.forEach(function (toggleBtn) {
  toggleBtn.addEventListener("click", function () {
    const currentTheme = document.documentElement.getAttribute("data-theme");

    if (currentTheme === "dark") {
      document.documentElement.removeAttribute("data-theme");
      localStorage.setItem("theme", "light");
    } else {
      document.documentElement.setAttribute("data-theme", "dark");
      localStorage.setItem("theme", "dark");
    }
  });
});

// ..............................................
// .... Setting Page Toggle Dark mode Start......
// ..............................................
const themeBoxes = document.querySelectorAll(".theme-box .box");

const systemPrefersDarks =
  window.matchMedia &&
  window.matchMedia("(prefers-color-scheme: dark)").matches;
const initialThemes =
  localStorage.getItem("theme") || (systemPrefersDark ? "dark" : "light");

if (initialTheme === "dark") {
  document.documentElement.setAttribute("data-theme", "dark");
} else {
  document.documentElement.removeAttribute("data-theme");
}

themeBoxes.forEach(function (box) {
  box.addEventListener("click", function () {
    if (box.classList.contains("dark")) {
      document.documentElement.setAttribute("data-theme", "dark");
      localStorage.setItem("theme", "dark");
    } else if (box.classList.contains("light")) {
      document.documentElement.removeAttribute("data-theme");
      localStorage.setItem("theme", "light");
    }
  });
});

// .......................................
// .. Light/Dark Mode Color End ..........
// .......................................

// .......................................
// .. Date Range Calender JS Start ..........
// .......................................
document.addEventListener("DOMContentLoaded", function () {
  const selectAllCheckbox = document.getElementById("selectAll");
  const rowCheckboxes = document.querySelectorAll(".row-checkbox");
  const selectedEntriesText = document.getElementById("selected-entries-text");

  // Date Range Picker
  $("#date-range-btn").daterangepicker(
    {
      startDate: moment("2023-06-13"),
      endDate: moment("2023-07-14"),
      opens: "left",
      locale: {
        format: "DD MMMM YYYY",
      },
    },
    function (start, end) {
      document.getElementById("date-range-text").textContent = `${start.format(
        "DD MMMM YYYY"
      )} - ${end.format("DD MMMM YYYY")}`;
    }
  );

  // Select All Functionality
  function updateSelectedEntriesText() {
    const selectedCount = document.querySelectorAll(
      ".row-checkbox:checked"
    ).length;
    selectedEntriesText.textContent = `${selectedCount} of ${rowCheckboxes.length} row(s) selected.`;
  }

  selectAllCheckbox.addEventListener("change", function () {
    rowCheckboxes.forEach((checkbox) => {
      checkbox.checked = this.checked;
      checkbox
        .closest("tr")
        .classList.toggle("table-row-selected", this.checked);
    });
    updateSelectedEntriesText();
  });

  rowCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      const row = this.closest("tr");
      row.classList.toggle("table-row-selected", this.checked);
      selectAllCheckbox.checked = Array.from(rowCheckboxes).every(
        (cb) => cb.checked
      );
      updateSelectedEntriesText();
    });
  });

  updateSelectedEntriesText();
});
// .......................................
// .. Date Range Calender JS End ..........
// .......................................

// .......................................
// .. Daily Trend Slider JS Start ..........
// .......................................
function initTrendSwiper() {
  const swiper = new Swiper(".trendSwiper", {
    slidesPerView: 5,
    spaceBetween: 15,
    autoplay: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 5,
      },
      1200: {
        slidesPerView: 7,
      },
    },
  });
}

document.addEventListener("DOMContentLoaded", initTrendSwiper);

// .......................................
// .. Daily Trend Slider JS End ..........
// .......................................

// ........................................................
// ........ Log a New Trade pop-up Modal JS Start .........
// ........................................................
document.addEventListener("DOMContentLoaded", () => {
  // Modal controls
  const tradeModalOverlay = document.getElementById("tradeModalOverlay");
  const openModalBtn = document.querySelector(".btn-log-trade");
  const closeModalBtns = document.querySelectorAll(".close-modal-btn");

  function openModal() {
    tradeModalOverlay.classList.add("open");
    document.body.style.overflow = "hidden";
  }

  function closeModal() {
    tradeModalOverlay.classList.remove("open");
    document.body.style.overflow = "";
  }

  if (openModalBtn) {
    openModalBtn.addEventListener("click", openModal);
  }

  closeModalBtns.forEach((btn) => {
    btn.addEventListener("click", closeModal);
  });

  if (tradeModalOverlay) {
    tradeModalOverlay.addEventListener("click", (e) => {
      if (e.target === tradeModalOverlay) closeModal();
    });
  }

  // --- Flatpickr initialization ---
  if (typeof flatpickr !== "undefined") {
    flatpickr("#dateOfOperation", {
      dateFormat: "m/d/Y",
      allowInput: true,
      position: "auto center",
      onValueUpdate: function (selectedDates, dateStr, instance) {
        instance.element.value = dateStr;
      },
    });

    // Time pickers for Entry and Exit Time
    flatpickr("#entryTime", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true,
      minuteIncrement: 1,
      allowInput: true,
      position: "auto center",
      onValueUpdate: function (selectedDates, dateStr, instance) {
        instance.element.value = dateStr;
      },
    });

    flatpickr("#exitTime", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true,
      minuteIncrement: 1,
      allowInput: true,
      position: "auto center",
      onValueUpdate: function (selectedDates, dateStr, instance) {
        instance.element.value = dateStr;
      },
    });

    // Calendar/time icon click handler
    document.querySelectorAll(".calendar-icon, .clock-icon").forEach((btn) => {
      btn.addEventListener("click", () => {
        const input = btn.previousElementSibling;
        if (input && input._flatpickr) {
          input._flatpickr.toggle();
        }
      });
    });
  }

  // Dropdown chevron rotation handling
  document.querySelectorAll(".form-select").forEach((sel) => {
    sel.addEventListener("mousedown", () => {
      const icon = sel.parentElement.querySelector(".select-icon");
      if (icon) {
        icon.classList.add("rotate-180");
      }
    });
    sel.addEventListener("blur", () => {
      const icon = sel.parentElement.querySelector(".select-icon");
      if (icon) {
        icon.classList.remove("rotate-180");
      }
    });
    sel.addEventListener("change", () => {
      const icon = sel.parentElement.querySelector(".select-icon");
      if (icon) {
        icon.classList.remove("rotate-180");
      }
    });
    sel.addEventListener("focus", () => {
      const icon = sel.parentElement.querySelector(".select-icon");
      if (icon) {
        icon.classList.add("transition-transform");
      }
    });
  });
});
// ........................................................
// .......... Log a New Trade pop-up Modal JS End ...........
// .........................................................

// .............................................................................................
// .......... Chronology Page All JS Start .....................................................
// ............................................................................................
// ........................................
// ......Sidebar Start....................
// ........................................
document.addEventListener("DOMContentLoaded", function () {
  var sidebarToggle = document.getElementById("sidebarToggle");
  var sidebarContent = document.getElementById("sidebar-content");
  var sidebarWrapper = document.getElementById("sidebar-wrapper");
  var collapseToggles = document.querySelectorAll(".collapse-toggle");

  // Toggle sidebar on mobile
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", function () {
      sidebarContent.classList.toggle("toggled");
    });
  }

  // Close sidebar when clicking outside on mobile (optional, but good UX)
  sidebarContent.addEventListener("click", function (e) {
    if (
      sidebarContent.classList.contains("toggled") &&
      !sidebarWrapper.contains(e.target) &&
      !sidebarToggle.contains(e.target)
    ) {
      sidebarContent.classList.remove("toggled");
    }
  });

  // Adjust sidebar state on resize to desktop from mobile
  window.addEventListener("resize", function () {
    if (window.innerWidth > 768) {
      wrapper.classList.remove("toggled"); // Ensure sidebar is visible on desktop
    }
  });

  // Exclusive dropdown behavior for sidebar (accordion-like)
  collapseToggles.forEach(function (toggle) {
    toggle.addEventListener("click", function (event) {
      event.preventDefault();

      var targetId = toggle.getAttribute("href");
      var targetCollapse = document.querySelector(targetId);
      var bsTargetCollapse = bootstrap.Collapse.getInstance(targetCollapse);

      // Close all other open dropdowns
      document
        .querySelectorAll(".collapse-content.show")
        .forEach(function (openCollapse) {
          if (openCollapse !== targetCollapse) {
            var bsOpenCollapse = bootstrap.Collapse.getInstance(openCollapse);
            if (bsOpenCollapse) {
              bsOpenCollapse.hide();
            }
          }
        });

      // Toggle the clicked dropdown
      if (bsTargetCollapse) {
        bsTargetCollapse.toggle();
      } else {
        // Create and toggle if no instance exists (first click)
        new bootstrap.Collapse(targetCollapse, { toggle: true });
      }
    });
  });

  // Listener for Bootstrap collapse events to handle icon rotation precisely
  document.querySelectorAll(".collapse-content").forEach(function (collapseEl) {
    collapseEl.addEventListener("hidden.bs.collapse", function () {
      var toggle = document.querySelector('[href="#' + collapseEl.id + '"]');
      if (toggle) {
        toggle.classList.add("collapsed");
        toggle.setAttribute("aria-expanded", "false");
      }
    });
    collapseEl.addEventListener("shown.bs.collapse", function () {
      var toggle = document.querySelector('[href="#' + collapseEl.id + '"]');
      if (toggle) {
        toggle.classList.remove("collapsed");
        toggle.setAttribute("aria-expanded", "true");
      }
    });
  });
});
// ........................................
// ......Sidebar End....................
// ........................................
// ..............................................................................................
// .......... Chronology Page All JS End .......................................................
// ...............................................................................................

// ...................................
// .. Dashboard Chart Start ..........
// ...................................
const chartData = {
  labels: Array.from({ length: 25 }, (_, i) => i + 1),
  datasets: [
    {
      label: "",
      data: [
        1, 1.2, 1.8, 1.8, 2.5, 3, 2.2, 3.4, 3.3, 4.2, 3.4, 4.8, 5.1, 5.5, 5.3,
        5.2, 6.1, 6.7, 7.3, 6.8, 7.5, 8.5, 7.8, 8.1, 7.9,
      ],
      borderColor: "#1d505398",
      fill: true,
      tension: 0,
      borderWidth: 2,
      pointRadius: 0,
    },
  ],
};

const chartOptions = {
  responsive: true,
  plugins: {
    legend: { display: false },
    tooltip: { enabled: false },
  },
  scales: {
    x: { display: false },
    y: { display: false },
  },
};

function createChart(canvasId) {
  const ctx = document.getElementById(canvasId)?.getContext("2d");
  if (!ctx) {
    console.error(`Canvas with ID ${canvasId} not found`);
    return;
  }
  const gradient = ctx.createLinearGradient(0, 0, 0, 400);
  gradient.addColorStop(0, "rgba(134, 191, 193, 0.2)");
  gradient.addColorStop(1, "rgba(134, 191, 193, 0)");

  const localData = JSON.parse(JSON.stringify(chartData)); // Deep copy
  localData.datasets[0].backgroundColor = gradient;

  return new Chart(ctx, {
    type: "line",
    data: localData,
    options: chartOptions,
  });
}

// Initialize Chart.js charts
createChart("myChart");
createChart("myChart2");
createChart("myChart3");
// .......................................
// .. Dashboard Chart End ..........
// .......................................

// .......................................
// .. Profit/loss Over Time JS Start ......
// .......................................
function renderApexCandleChart() {
  const apexChartData = [
    { x: 1, y: [200, 250, 150, 220] },
    { x: 2, y: [220, 300, 200, 280] },
    { x: 3, y: [280, 320, 250, 260] },
    { x: 4, y: [260, 290, 230, 270] },
    { x: 5, y: [270, 400, 250, 350] },
    { x: 6, y: [350, 450, 340, 400] },
    { x: 7, y: [400, 600, 380, 580] },
    { x: 8, y: [580, 650, 550, 620] },
    { x: 9, y: [620, 700, 600, 680] },
    { x: 10, y: [680, 750, 660, 720] },
    { x: 11, y: [720, 800, 700, 780] },
    { x: 12, y: [780, 850, 760, 820] },
    { x: 13, y: [820, 900, 800, 880] },
    { x: 14, y: [880, 950, 860, 920] },
    { x: 15, y: [920, 1000, 900, 980] },
    { x: 16, y: [980, 1050, 960, 1020] },
    { x: 17, y: [1020, 1100, 1000, 1050] },
    { x: 18, y: [1050, 1150, 1030, 1100] },
    { x: 19, y: [1100, 1200, 1080, 1150] },
    { x: 20, y: [1150, 1200, 1130, 1180] },
    { x: 21, y: [1180, 1250, 1160, 1220] },
    { x: 22, y: [1220, 1300, 1200, 1280] },
    { x: 23, y: [1280, 1350, 1260, 1300] },
    { x: 24, y: [1300, 1400, 1280, 1350] },
    { x: 25, y: [1350, 1450, 1330, 1400] },
    { x: 26, y: [1400, 1500, 1380, 1450] },
    { x: 27, y: [1450, 1550, 1430, 1500] },
    { x: 28, y: [1500, 1600, 1480, 1550] },
    { x: 29, y: [1550, 1650, 1530, 1600] },
    { x: 30, y: [1600, 1700, 1580, 1650] },
    { x: 31, y: [1650, 1750, 1630, 1700] },
    { x: 32, y: [1700, 1800, 1680, 1750] },
    { x: 33, y: [1750, 1850, 1730, 1800] },
    { x: 34, y: [1800, 1900, 1780, 1850] },
    { x: 35, y: [1850, 1950, 1830, 1900] },
    { x: 36, y: [1900, 2000, 1880, 1950] },
    { x: 37, y: [1950, 2050, 1930, 2000] },
    { x: 38, y: [2000, 2100, 1980, 2050] },
    { x: 39, y: [2050, 2150, 2030, 2100] },
    { x: 40, y: [2100, 2200, 2080, 2150] },
    { x: 41, y: [2150, 2250, 2130, 2200] },
  ];

  const options = {
    chart: {
      type: "candlestick",
      height: 280,
      width: "100%",
      toolbar: { show: false },
    },
    series: [{ name: "Candle", data: apexChartData }],
    title: { text: undefined },
    xaxis: {
      type: "category",
      labels: {
        formatter: function (val) {
          const interval = Math.floor(41 / 10);
          if (val % interval === 1 || val === 41) {
            return "Lbl";
          }
          return "";
        },
      },
      tickAmount: 10,
      axisTicks: { show: false },
      axisBorder: { show: false },
    },
    yaxis: {
      tooltip: { enabled: true },
      labels: {
        formatter: function (val) {
          if (val >= 1000) return "$" + (val / 1000).toFixed(1) + "k";
          return "$" + val;
        },
        style: { fontSize: "4px", colors: ["#666"] },
      },
      min: 0,
      max: 2400,
      tickAmount: 6,
      forceNiceScale: true,
    },
    plotOptions: {
      candlestick: {
        colors: { upward: "#2F9196", downward: "#D2225A" },
        wick: { useFillColor: true },
      },
    },
    grid: {
      borderColor: "#e7e7e7",
      strokeDashArray: 2,
      xaxis: { lines: { show: false } },
      yaxis: { lines: { show: true } },
    },
    tooltip: {
      x: {
        formatter: function (val) {
          return "Lbl " + val;
        },
      },
    },
  };

  const chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
}

// .......................................
// .. Profit/loss Over Time JS End ......
// .......................................

// ...............................................
// .. Settings page All Function Start ...........
// ...............................................
// Multi-select search dropdown input..........
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("select[multiple]").forEach(function (select) {
    new TomSelect(select, {
      plugins: ["remove_button"],
      maxItems: null,
      valueField: "value",
      labelField: "name",
      searchField: ["name", "value"],
      create: true,
      render: {
        option: function (data, escape) {
          const avatar = data.avatar
            ? `<img src="${escape(data.avatar)}" class="user-avatar" />`
            : "";
          return `<div class="user-info">${avatar}<span class="user-name">${escape(
            data.name
          )}</span> <small>${escape(data.value)}</small></div>`;
        },
        item: function (data, escape) {
          const avatar = data.avatar
            ? `<img src="${escape(data.avatar)}" class="user-avatar" />`
            : "";
          return `<div class="user-info">${avatar}${escape(data.name)}</div>`;
        },
      },
      onInitialize: function () {
        // Preload data-name from <option>
        this.options = Object.fromEntries(
          Array.from(select.options).map((o) => [
            o.value,
            {
              value: o.value,
              name: o.dataset.name || o.textContent,
              avatar: o.dataset.avatar,
            },
          ])
        );
      },
    });
  });
});
// Multi-select search dropdown input..........
// Unlimited Add URL JS...............
const container = document.getElementById("url-container");
const addBtn = document.getElementById("add-url-btn");

addBtn.addEventListener("click", () => {
  const input = document.createElement("input");
  input.type = "text";
  input.className = "form-control mb-2 add-url-input";
  input.placeholder = "https://twitter.com/shadcn";
  container.appendChild(input);
});
// Unlimited Add URL JS...............
// ...............................................
// .... Settings page All Function End ...........
// ...............................................

// ..............................................
// .. Asset Performance Chart JS Start .........
// ..............................................
function renderAssetPerformanceChart() {
  const options1 = {
    chart: { type: "bar", height: 280 },
    plotOptions: {
      bar: { horizontal: false, columnWidth: "40%", endingShape: "rounded" },
    },
    dataLabels: { enabled: false },
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
        stops: [0, 100],
      },
    },
    series: [
      {
        name: "Positive",
        data: [600, 550, 500, 400, 0, 0, 0, 550, 0, 650, 0, 600, 0],
      },
      {
        name: "Negative",
        data: [0, 0, 0, 0, -400, -300, -800, 0, -700, 0, -500, 0, -600],
      },
    ],
    xaxis: {
      categories: [
        "EUR",
        "USD",
        "AAPL",
        "S&P",
        "GOLD",
        "BTC",
        "GBP",
        "USD",
        "ETH",
        "AAPL",
        "MSDO",
        "SSP",
        "BSP",
      ],
      labels: { style: { fontSize: "5px" } },
    },
    yaxis: {
      labels: {
        formatter: function (value) {
          return "$" + value;
        },
      },
    },
    grid: { borderColor: "#e4e4e7" },
    legend: { show: false },
  };

  const chart1 = new ApexCharts(
    document.querySelector("#asset-chart"),
    options1
  );
  chart1.render();
}

// Initialize all charts on DOMContentLoaded
document.addEventListener("DOMContentLoaded", () => {
  renderApexCandleChart();
  renderAssetPerformanceChart();
});
// ..............................................
// .. Asset Performance Chart JS End ...........
// ..............................................

// ..............................................
// .. Trade Outcome Pie Chart JS End ...........
// ..............................................
const ctx = document.getElementById("tradeChart").getContext("2d");

const takeProfitGradient = ctx.createLinearGradient(0, 0, 0, ctx.canvas.height);
takeProfitGradient.addColorStop(0, "#883DCF");
takeProfitGradient.addColorStop(1, "#CFB1EC");

const breakEvenGradient = ctx.createLinearGradient(0, 0, 0, ctx.canvas.height);
breakEvenGradient.addColorStop(0, "#2BB2FE");
breakEvenGradient.addColorStop(1, "#AAE0FF");

const stopLossGradient = ctx.createLinearGradient(0, 0, 0, ctx.canvas.height);
stopLossGradient.addColorStop(0, "#EB3D4D");
stopLossGradient.addColorStop(1, "#F7B1B8");

new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["Take Profit", "Break Even", "Stop Loss"],
    datasets: [
      {
        data: [40, 44, 18],
        backgroundColor: [
          takeProfitGradient,
          breakEvenGradient,
          stopLossGradient,
        ],
        spacing: 4,
        borderRadius: 12,
        borderColor: "transparent",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "bottom",
        align: "start",
        labels: {
          usePointStyle: true,
          boxWidth: 10,
          padding: 20,
        },
      },
    },
    cutout: "90%",
  },
});

// ড্রপডাউন ফাংশনালিটির জন্য JavaScript
function toggleDropdown(event) {
  event.stopPropagation();
  document.getElementById("cardDropdown").classList.toggle("show");
}

window.onclick = function (event) {
  if (!event.target.matches(".menu-toggle")) {
    var dropdown = document.getElementById("cardDropdown");
    if (dropdown.classList.contains("show")) {
      dropdown.classList.remove("show");
    }
  }
};
// ..............................................
// .. Trade Outcome Pie Chart JS End ...........
// ..............................................

// ..............................................
// .... Trading Activity Heatmap JS Start .......
// ..............................................
document.addEventListener("DOMContentLoaded", () => {
  const heatmapTable = document.getElementById("heatmap-table");
  const headerRow = document.getElementById("header-row");
  const dataRows = document.getElementById("data-rows");
  const dropdownButton = document.getElementById("dropdown-button");
  const dropdownOptions = document.getElementById("dropdown-options");
  const selectedOptionText = document.getElementById("selected-option-text");
  const dropdownWrapper = document.getElementById("dropdown-wrapper");

  const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
  const hours = Array.from(
    { length: 12 },
    (_, i) => String(i * 2).padStart(2, "0") + ":00"
  ); // 00:00, 02:00, ..., 22:00

  // Example data (replace with your actual data)
  const data = {
    Monday: [70, 70, 71, 49, 45, 65, 37, 60, 44, 30, 52, 62],
    Tuesday: [52, 51, 87, 78, 85, 60, 58, 84, 84, 36, 40, 38],
    Wednesday: [84, 56, 48, 87, 40, 84, 39, 80, 75, 57, 74, 53],
    Thursday: [77, 42, 49, 86, 74, 51, 79, 69, 70, 49, 64, 66],
    Friday: [33, 51, 32, 54, 39, 62, 57, 64, 47, 80, 43, 36],
  };

  // Function to determine the color class based on value
  const getColorClass = (value) => {
    if (value >= 80) return "color-high";
    if (value >= 70) return "color-medium-high";
    if (value >= 60) return "color-medium-high-low";
    if (value >= 50) return "color-medium";
    if (value >= 40) return "color-medium-low";
    if (value >= 0) return "color-low";
    return "color-low";
  };

  // Function to render the heatmap table
  const renderHeatmap = () => {
    headerRow.innerHTML = ""; // Clear existing headers
    dataRows.innerHTML = ""; // Clear existing data rows

    // Populate header row
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

    // Populate data rows
    days.forEach((day) => {
      const row = document.createElement("tr");
      const dayHeader = document.createElement("th");
      dayHeader.classList.add("grid-header");
      dayHeader.textContent = day;
      row.appendChild(dayHeader);

      const dayData = data[day];
      if (dayData) {
        dayData.forEach((value) => {
          const cell = document.createElement("td");
          cell.classList.add("grid-cell", getColorClass(value));
          cell.textContent = `${value}%`;
          row.appendChild(cell);
        });
      }
      dataRows.appendChild(row);
    });
  };

  // Initial render
  renderHeatmap();

  // Custom Dropdown Logic
  dropdownButton.addEventListener("click", () => {
    dropdownOptions.classList.toggle("open");
    dropdownButton.setAttribute(
      "aria-expanded",
      dropdownOptions.classList.contains("open")
    );
  });

  dropdownOptions
    .querySelectorAll(".heatmap-dropdown-option")
    .forEach((option) => {
      option.addEventListener("click", () => {
        selectedOptionText.textContent = option.dataset.value;
        dropdownOptions.classList.remove("open");
        dropdownButton.setAttribute("aria-expanded", "false");
      });
    });

  // Close dropdown when clicking outside
  document.addEventListener("click", (event) => {
    if (
      !dropdownWrapper.contains(event.target) &&
      dropdownOptions.classList.contains("open")
    ) {
      dropdownOptions.classList.remove("open");
      dropdownButton.setAttribute("aria-expanded", "false");
    }
  });
});
// ..............................................
// .. Trading Activity Heatmap JS End ...........
// ..............................................

// ..............................................
// .. Trading Performance Radar JS Start ........
// ..............................................
const radar = document.getElementById("radarChart");
new Chart(radar, {
  type: "radar",
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [
      {
        label: "Current Period",
        data: [60, 75, 70, 25, 85, 75],
        backgroundColor: "rgba(42, 157, 144, 0.60)",
        borderColor: "rgba(42, 157, 144, 0.60)",
        borderWidth: 0,
        pointBackgroundColor: "transparent",
        order: 2,
      },
      {
        label: "Previous Period",
        data: [24, 55, 45, 65, 50, 46],
        backgroundColor: "#E76E50",
        borderColor: "#E76E50",
        borderWidth: 0,
        pointBackgroundColor: "transparent",
        order: 1,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
    },
    scales: {
      r: {
        angleLines: { color: "#e4e4e7" },
        grid: { color: "#e4e4e7" },
        min: 0,
        max: 100,
        pointLabels: { color: "#6c757d", font: { size: 12 } },
        ticks: { display: false },
      },
    },
  },
});
// ..............................................
// .. Trading Performance Radar JS End ...........
// ..............................................

// ..............................................
// .. Risk/Reward Analysis Modal JS Start ...........
// ..............................................
// --- Modal functionality (global) ---
const rrModalOverlay = document.getElementById("rrModalOverlay");
const openRRModalBtn = document.getElementById("openRRModalBtn");
const closeRRModalBtn = document.querySelector(
  "#rrModalOverlay .close-modal-btn"
);

function openRRModal() {
  rrModalOverlay.classList.add("open");
  document.body.style.overflow = "hidden";
}
function closeRRModal() {
  rrModalOverlay.classList.remove("open");
  document.body.style.overflow = "";
}

// Attach event listeners outside the DOMContentLoaded for immediate access
openRRModalBtn.addEventListener("click", openRRModal);
closeRRModalBtn.addEventListener("click", closeRRModal);
rrModalOverlay.addEventListener("click", (e) => {
  if (e.target === rrModalOverlay) closeRRModal();
});

// --- Encapsulated functionality for Chart and Tabs ---
document.addEventListener("DOMContentLoaded", () => {
  // Tab functionality for RR Modal
  const rrNavLinks = document.querySelectorAll("#rrModalOverlay .nav-link");
  rrNavLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      rrNavLinks.forEach((nav) => nav.classList.remove("active"));
      e.target.classList.add("active");
    });
  });

  // Chart.js initialization for RR Modal
  const ctx = document.getElementById("rrChart").getContext("2d");
  const rrChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [
        {
          label: "Optimized",
          data: [700, 600, 400, 550, 1100, 800, 600, 850, 400, 800, 650, 1150],
          backgroundColor: (context) => {
            const chart = context.chart;
            const { ctx, chartArea } = chart;
            if (!chartArea) {
              return;
            }
            const gradient = ctx.createLinearGradient(
              0,
              chartArea.bottom,
              0,
              chartArea.top
            );
            gradient.addColorStop(0, "#22CAAD");
            gradient.addColorStop(1, "#2BB2FE");
            return gradient;
          },
          borderRadius: 5,
          categoryPercentage: 0.5,
          barPercentage: 0.9,
        },
        {
          label: "Current",
          data: [600, 500, 350, 450, 950, 700, 500, 750, 350, 700, 550, 1000],
          backgroundColor: (context) => {
            const chart = context.chart;
            const { ctx, chartArea } = chart;
            if (!chartArea) {
              return;
            }
            const gradient = ctx.createLinearGradient(
              0,
              chartArea.bottom,
              0,
              chartArea.top
            );
            gradient.addColorStop(0, "#F86624");
            gradient.addColorStop(1, "#F9C80E");
            return gradient;
          },
          borderRadius: 5,
          categoryPercentage: 0.5,
          barPercentage: 0.9,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          stacked: false,
          grid: {
            display: false,
          },
          ticks: {
            color: "#6c757d",
          },
        },
        y: {
          stacked: false,
          beginAtZero: true,
          grid: {
            color: "#e4e4e7",
          },
          ticks: {
            callback: function (value) {
              if (value >= 1000) {
                return "$" + value / 1000 + "k";
              }
              return "$" + value;
            },
            color: "#6c757d",
          },
        },
      },
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          mode: "index",
          intersect: false,
          backgroundColor: "#1D1F2C",
          borderColor: "#e4e4e7",
          borderWidth: 1,
          titleColor: "#D2D2D5",
          bodyColor: "#D2D2D5",
          padding: 10,
          displayColors: true,
          // Correct way to make tooltip icons rounded
          usePointStyle: true,
          callbacks: {
            label: function (context) {
              let label = context.dataset.label || "";
              let value = context.parsed.y;
              if (label) {
                label += ": ";
              }
              if (value >= 1000) {
                label += "$" + value / 1000 + "k";
              } else {
                label += "$" + value;
              }
              return label;
            },
            labelPointStyle: function (context) {
              return {
                pointStyle: "circle",
              };
            },
          },
        },
      },
    },
  });
});
// ..............................................
// .. Risk/Reward Analysis Modal JS End ...........
// ..............................................
