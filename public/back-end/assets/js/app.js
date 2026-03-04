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
            profileOptions.classList.contains("open"),
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