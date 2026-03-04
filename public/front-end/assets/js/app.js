// .......................................
// .. Light/Dark Mode Color Start ..........
// .......................................

const toggleBtns = document.querySelectorAll("#toggleMode");
const sunIcon = document.getElementById("sun-icon");
const moonIcon = document.getElementById("moon-icon");

// Set initial theme based on user's preference or a default
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

// .......................................
// .. Light/Dark Mode Color End ..........
// .......................................

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
// .. Counter Start ..........
// .......................................
const counters = document.querySelectorAll(".counter-value");
const duration = 2000; // Total animation duration in milliseconds (2 seconds)

const formatNumber = (num, suffix) => {
  if (suffix === "K+") {
    // Format for Thousands (K+)
    return Math.round(num / 1000) + "K+";
  } else if (suffix === "B+") {
    // Format for Billions (B+)
    return (num / 1000000000).toFixed(1) + "B+";
  } else {
    // Default format (for percentages)
    return num + suffix;
  }
};

const startCounter = (entries, observer) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const counter = entry.target;
      const target = +counter.getAttribute("data-target");
      const start = +counter.getAttribute("data-start");
      const prefix = counter.getAttribute("data-prefix");
      const suffix = counter.getAttribute("data-suffix");

      let current = start;

      // Calculate the number of steps based on the total duration
      const steps = duration / 10;
      const increment = (target - start) / steps;

      const timer = setInterval(() => {
        current += increment;

        if (current < target) {
          counter.innerText = formatNumber(Math.ceil(current), suffix);
        } else {
          counter.innerText = formatNumber(target, suffix);
          clearInterval(timer);
        }
      }, 10);

      observer.unobserve(counter);
    }
  });
};

const observer = new IntersectionObserver(startCounter, {
  threshold: 0.5,
});

counters.forEach((counter) => {
  observer.observe(counter);
});
// .......................................
// ............. Counter End .............
// .......................................

// .......................................
// ...... Achivment Counter Start ........
// .......................................
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll("[data-target]");
  const animatedCounters = new Set();

  const animateCount = (element, target, duration, decimal = 0) => {
    let start = 0;
    let startTime = null;

    const step = (timestamp) => {
      if (!startTime) startTime = timestamp;
      const progress = Math.min((timestamp - startTime) / duration, 1);
      const currentValue = start + progress * (target - start);

      if (decimal > 0) {
        element.textContent = currentValue.toFixed(decimal);
      } else {
        element.textContent = Math.floor(currentValue);
      }

      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };
    requestAnimationFrame(step);
  };

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !animatedCounters.has(entry.target)) {
          const counter = entry.target;
          const target = parseFloat(counter.getAttribute("data-target"));
          const decimal = parseInt(counter.getAttribute("data-decimal") || "0");
          const duration = 2000; // 2 seconds for animation

          const countElement = counter.querySelector(".count-value");
          if (countElement) {
            animateCount(countElement, target, duration, decimal);
          }

          if (
            counter.querySelector(".count-value-h") &&
            counter.querySelector(".count-value-m")
          ) {
            const targetHours = parseInt(
              counter.getAttribute("data-target") || "0"
            );
            const targetMinutes = parseInt(
              counter.getAttribute("data-target-alt") || "0"
            );

            const countHoursElement = counter.querySelector(".count-value-h");
            const countMinutesElement = counter.querySelector(".count-value-m");

            animateCount(countHoursElement, targetHours, duration);
            animateCount(countMinutesElement, targetMinutes, duration);
          }

          animatedCounters.add(counter);
        }
      });
    },
    {
      threshold: 0.5,
    }
  );

  counters.forEach((counter) => {
    observer.observe(counter);
  });
});
// .......................................
// ........ Achivment Counter End ........
// .......................................


