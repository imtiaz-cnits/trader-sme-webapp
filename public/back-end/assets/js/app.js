// ..................................................
// .. Navbar User Dropdown Function Start ..........
// ..................................................

document.addEventListener("DOMContentLoaded", () => {
    const profileButton = document.getElementById("profile-button");
    const profileOptions = document.getElementById("profile-options");
    const profileWrapper = document.getElementById("profile-dropdown-wrapper");

    if (profileButton && profileOptions) {
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
                profileWrapper && !profileWrapper.contains(event.target) &&
                profileOptions.classList.contains("open")
            ) {
                profileOptions.classList.remove("open");
                profileButton.setAttribute("aria-expanded", "false");
            }
        });
    }
});
// ..................................................
// .. Navbar User Dropdown Function End ..........
// ..................................................