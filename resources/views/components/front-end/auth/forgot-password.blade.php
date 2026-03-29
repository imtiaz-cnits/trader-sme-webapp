@extends('layout.app')
@section('title', 'Forgot Password | Trader SME')
@section('content')

<div class="auth-container">

    <div class="left-panel" style="display: flex; flex-direction: column; justify-content: space-between; align-items: start; padding: 30px; background: var(--bg-black); position: relative; overflow: hidden;">

        <div style="position: relative; z-index: 2; height: 100%; width: 100%; display: flex; flex-direction: column; justify-content: space-between;">
            <div class="logo">
                <svg width="89" height="25" viewBox="0 0 89 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.6763 18.7216C2.14971 18.4924 1.68508 18.1764 1.28859 17.7799C0.892101 17.3834 0.576148 16.9188 0.346928 16.3922C0.117708 15.8656 0 15.2895 0 14.6762C0 14.0567 0.117708 13.4867 0.346928 12.9601C0.576148 12.4335 0.892101 11.9689 1.28859 11.5724C1.68508 11.1759 2.14971 10.86 2.6763 10.6307C3.20289 10.4015 3.77903 10.2838 4.39235 10.2838H24.4584C24.8983 10.2838 25.2762 10.4387 25.5797 10.7484C25.8895 11.0582 26.0444 11.4299 26.0444 11.8698C26.0444 12.3096 25.8895 12.6875 25.5797 12.9911C25.27 13.3008 24.8983 13.4557 24.4584 13.4557H4.32421C3.99586 13.4557 3.6985 13.5734 3.45069 13.8027C3.19669 14.0319 3.07279 14.3292 3.07279 14.6762C3.07279 15.0045 3.19669 15.2957 3.45069 15.5373C3.70469 15.7789 3.99586 15.9028 4.32421 15.9028H22.6061C23.2256 15.9028 23.8017 16.0205 24.3407 16.2497C24.8797 16.4789 25.3505 16.7949 25.747 17.1914C26.1435 17.5879 26.4594 18.0587 26.6887 18.5977C26.9179 19.1367 27.0356 19.719 27.0356 20.3323C27.0356 20.9518 26.9179 21.5218 26.6887 22.0484C26.4594 22.575 26.1435 23.0396 25.747 23.4361C25.3505 23.8326 24.8797 24.1423 24.3407 24.3592C23.8017 24.5822 23.2194 24.6875 22.6061 24.6875H2.57718C2.13732 24.6875 1.75942 24.5326 1.45586 24.2229C1.1461 23.9131 0.991222 23.5414 0.991222 23.1016C0.991222 22.6617 1.1461 22.2838 1.45586 21.9802C1.76561 21.6705 2.13732 21.5156 2.57718 21.5156H22.7423C23.0707 21.5156 23.3619 21.3979 23.6035 21.1687C23.8451 20.9394 23.969 20.6545 23.969 20.3261C23.969 19.973 23.8451 19.6756 23.6035 19.434C23.3619 19.1924 23.0769 19.0685 22.7423 19.0685H4.39855C3.77903 19.0685 3.20908 18.957 2.6763 18.7216Z" fill="white" />
                    <path d="M33.0573 24.2291C32.7475 24.5389 32.3758 24.6938 31.9359 24.6938C31.4961 24.6938 31.1182 24.5389 30.8146 24.2291C30.5049 23.9194 30.35 23.5477 30.35 23.1078V11.8636C30.35 11.4238 30.5049 11.0459 30.8146 10.7423C31.1244 10.4326 31.4961 10.2777 31.9359 10.2777C32.159 10.2777 32.3572 10.321 32.5307 10.4078C32.7041 10.4945 32.8838 10.606 33.0573 10.7361C34.4697 11.969 35.684 12.9416 36.7124 13.6478C37.7346 14.3541 38.6762 14.8807 39.525 15.2338C40.3737 15.5869 41.1729 15.8099 41.9225 15.8967C42.6721 15.9834 43.4775 16.0268 44.3386 16.0268C45.1997 16.0268 45.9989 15.9896 46.7361 15.9091C47.4733 15.8347 48.2539 15.6179 49.0841 15.2648C49.908 14.9116 50.8373 14.3851 51.8595 13.6788C52.8817 12.9726 54.1145 11.9937 55.5456 10.7361C55.9173 10.4264 56.2952 10.2715 56.6669 10.2715C57.1068 10.2715 57.4847 10.4264 57.7882 10.7361C58.098 11.0459 58.2529 11.4176 58.2529 11.8574V23.0954C58.2529 23.5353 58.098 23.9132 57.7882 24.2167C57.4785 24.5265 57.1068 24.6814 56.6669 24.6814C56.2271 24.6814 55.8492 24.5265 55.5456 24.2167C55.2358 23.907 55.081 23.5353 55.081 23.0954V15.271C54.0897 16.0639 53.1357 16.7268 52.2188 17.2534C51.3019 17.78 50.4098 18.2075 49.5425 18.5234C48.669 18.8456 47.8079 19.0686 46.9467 19.1987C46.0856 19.3288 45.2183 19.3969 44.3324 19.3969C43.3845 19.3969 42.4739 19.3288 41.6065 19.1987C40.733 19.0686 39.8657 18.8394 38.9922 18.5234C38.1187 18.2013 37.239 17.78 36.3469 17.2534C35.4548 16.7268 34.5131 16.0639 33.5219 15.271V23.1078C33.5219 23.5477 33.367 23.9194 33.0573 24.2291Z" fill="white" />
                    <path d="M68.3634 13.4496C67.589 13.4496 66.9695 13.5859 66.4986 13.8647C66.0216 14.1435 65.6499 14.478 65.3773 14.8745C65.0985 15.271 64.9127 15.7046 64.8135 16.1817C64.7144 16.6587 64.6649 17.0924 64.6649 17.4888C64.6649 17.8853 64.7144 18.319 64.8135 18.796C64.9127 19.273 65.0985 19.7067 65.3773 20.1032C65.6499 20.4997 66.0278 20.8342 66.4986 21.113C66.9695 21.3918 67.5952 21.5281 68.3634 21.5281H86.5771C87.0169 21.5281 87.3948 21.683 87.6984 21.9927C88.0081 22.3025 88.163 22.6742 88.163 23.114C88.163 23.5539 88.0081 23.9318 87.6984 24.2354C87.3886 24.5451 87.0169 24.7 86.5771 24.7H67.304C66.3995 24.7 65.5941 24.477 64.8879 24.0371C64.1816 23.5973 63.5807 23.0273 63.0851 22.3334C62.5895 21.6396 62.2116 20.8652 61.9452 20.0041C61.6788 19.143 61.5487 18.3066 61.5487 17.4888C61.5487 16.6525 61.685 15.81 61.9638 14.9612C62.2364 14.1125 62.639 13.3443 63.1718 12.6443C63.6984 11.9504 64.3427 11.3804 65.0923 10.9406C65.8419 10.5007 66.6907 10.2777 67.6385 10.2777H86.5833C87.0231 10.2777 87.401 10.4326 87.7046 10.7423C88.0143 11.0521 88.1692 11.4238 88.1692 11.8637C88.1692 12.3035 88.0143 12.6814 87.7046 12.985C87.3948 13.2947 87.0231 13.4496 86.5833 13.4496H68.3634ZM86.3169 16.3613C86.6266 16.6711 86.7815 17.0428 86.7815 17.4827C86.7815 17.9225 86.6266 18.3004 86.3169 18.604C86.0071 18.9137 85.6354 19.0686 85.1955 19.0686H68.7351C68.2952 19.0686 67.9173 18.9137 67.6137 18.604C67.304 18.2942 67.1491 17.9225 67.1491 17.4827C67.1491 17.0428 67.304 16.6649 67.6137 16.3613C67.9235 16.0516 68.2952 15.8967 68.7351 15.8967H85.1955C85.6354 15.8967 86.0071 16.0516 86.3169 16.3613Z" fill="white" />
                    <path d="M8.159 0C8.31388 0 8.39441 0.0681469 8.39441 0.223025V1.22044C8.39441 1.37532 8.31388 1.45586 8.159 1.45586H4.9747V6.8828C4.9747 7.03768 4.90655 7.10582 4.75167 7.10582H3.64274C3.48786 7.10582 3.41972 7.03768 3.41972 6.8828V1.45586H0.235416C0.0805379 1.45586 0 1.37532 0 1.22044V0.223025C0 0.0681469 0.0805379 0 0.235416 0H8.159Z" fill="white" />
                    <path d="M19.0066 0C20.5616 0 21.1873 0.718637 21.1873 2.08776V2.66391C21.1873 3.8224 20.7413 4.49767 19.6757 4.69592L21.4103 6.84563C21.4723 6.91377 21.4599 7.09963 21.2802 7.09963H19.9731C19.7996 7.09963 19.75 7.05626 19.6881 6.96953L18.0835 4.85699H14.8063V6.8766C14.8063 7.03148 14.7382 7.09963 14.5833 7.09963H13.4868C13.3319 7.09963 13.2513 7.03148 13.2513 6.8766V0.303563C13.2513 0.0991237 13.3505 0 13.5549 0H19.0066ZM14.8063 3.62416H18.6907C19.3783 3.62416 19.6323 3.32679 19.6323 2.71967V2.2922C19.6323 1.68508 19.3783 1.38771 18.6907 1.38771H14.9364C14.8435 1.38771 14.8063 1.43108 14.8063 1.51162V3.62416Z" fill="white" />
                    <path d="M30.9013 0C31.4217 0 31.7315 0.161075 32.066 0.768199L35.4238 6.86421C35.4919 6.99431 35.4672 7.09963 35.2999 7.09963H34.0113C33.8812 7.09963 33.8316 7.06865 33.7759 6.96953L33.0573 5.66236H28.287L27.587 6.96953C27.5374 7.06865 27.4754 7.09963 27.3515 7.09963H26.032C25.8585 7.09963 25.8275 7.00051 25.9019 6.86421L29.2287 0.768199C29.5632 0.161075 29.8668 0 30.2942 0H30.9013ZM28.9313 4.48528H32.4192L30.8084 1.51162C30.7774 1.46205 30.7465 1.44347 30.6969 1.44347H30.635C30.5854 1.44347 30.5544 1.46205 30.5234 1.51162L28.9313 4.48528Z" fill="white" />
                    <path d="M45.2988 0C47.4981 0 48.4026 0.87971 48.4026 2.86215V4.24367C48.4026 6.21992 47.4981 7.10582 45.2988 7.10582H40.5533C40.3489 7.10582 40.2498 7.0067 40.2498 6.80226V0.303563C40.2498 0.0991237 40.3489 0 40.5533 0H45.2988ZM41.7985 5.56323C41.7985 5.65616 41.8419 5.69333 41.9286 5.69333H45.2554C46.4511 5.69333 46.8476 5.30923 46.8476 4.11357V2.99845C46.8476 1.80279 46.4511 1.41869 45.2554 1.41869H41.9286C41.8357 1.41869 41.7985 1.46205 41.7985 1.56118V5.56323Z" fill="white" />
                    <path d="M60.8548 0C61.0097 0 61.0902 0.0681469 61.0902 0.223025V1.18947C61.0902 1.34435 61.0097 1.41249 60.8548 1.41249H56.4191C55.3659 1.41249 55.0686 1.72844 55.0686 2.79401V2.89313H60.7991C60.9539 2.89313 61.0221 2.96128 61.0221 3.11616V3.91533C61.0221 4.07021 60.9539 4.13835 60.7991 4.13835H55.0686V4.31182C55.0686 5.37738 55.3659 5.69333 56.4191 5.69333H60.8548C61.0097 5.69333 61.0902 5.76148 61.0902 5.91636V6.8828C61.0902 7.03768 61.0097 7.10582 60.8548 7.10582H56.3881C54.3375 7.10582 53.5446 6.3748 53.5446 4.42952V2.6825C53.5446 0.737222 54.3375 0.00619552 56.3881 0.00619552H60.8548V0Z" fill="white" />
                    <path d="M71.9627 0C73.5177 0 74.1434 0.718637 74.1434 2.08776V2.66391C74.1434 3.8224 73.6973 4.49767 72.6318 4.69592L74.3664 6.84563C74.4283 6.91377 74.416 7.09963 74.2363 7.09963H72.9291C72.7557 7.09963 72.7061 7.05626 72.6441 6.96953L71.0396 4.85699H67.7624V6.8766C67.7624 7.03148 67.6942 7.09963 67.5394 7.09963H66.4428C66.2879 7.09963 66.2074 7.03148 66.2074 6.8766V0.303563C66.2074 0.0991237 66.3065 0 66.511 0H71.9627ZM67.7624 3.62416H71.6467C72.3344 3.62416 72.5884 3.32679 72.5884 2.71967V2.2922C72.5884 1.68508 72.3344 1.38771 71.6467 1.38771H67.8925C67.7996 1.38771 67.7624 1.43108 67.7624 1.51162V3.62416Z" fill="white" />
                    <path d="M86.292 0C86.4469 0 86.515 0.0681469 86.515 0.223025V1.18947C86.515 1.34435 86.4469 1.41249 86.292 1.41249H81.2058C80.8217 1.41249 80.6668 1.62313 80.6668 1.98244V2.32937C80.6668 2.70728 80.8403 2.89933 81.1934 2.89933H84.9972C86.1619 2.89933 86.7752 3.53123 86.7752 4.64635V5.45792C86.7752 6.44294 86.2053 7.11202 84.9786 7.11202H79.3597C79.2048 7.11202 79.1242 7.04387 79.1242 6.88899V5.92255C79.1242 5.76767 79.2048 5.69953 79.3597 5.69953H84.6875C85.0716 5.69953 85.2264 5.48889 85.2264 5.12957V4.7145C85.2264 4.3366 85.053 4.14455 84.6999 4.14455H80.896C79.7314 4.14455 79.118 3.51264 79.118 2.39752V1.6541C79.118 0.669076 79.688 0 80.9146 0H86.292Z" fill="white" />
                </svg>
            </div>

            <p style="color: white; font-size: 16px; margin: 0; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                “Being inside Traders SME has definitely been a change, and it's
                helping me get started positively. Let’s see how everything goes after
                joining.”
            </p>
        </div>
    </div>


    <div class="right-panel">

        <div class="wrap w-100 d-flex flex-column" style="min-height: 100vh; padding-top: 20px !important; padding-bottom: 20px;">

            <div class="box d-flex justify-content-end gap-2 align-items-center mb-4 w-100">
                <p class="tag m-0" style="font-size: 14px;">Forgot Password</p>
                <span style="color: var(--border);">|</span>

                <div class="language-selector" id="langSelector">
                    <div class="selected-language">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png" class="flag" />
                        <span>Eng</span>
                        <span class="dropdown-icon"><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                    <ul class="language-list">
                        <li data-lang="en">Eng</li>
                        <li data-lang="es">Esp</li>
                    </ul>
                </div>

                <button id="toggleMode" class="theme-toggle" aria-label="Toggle dark and light mode">
                    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    <svg id="moon-icon" style="display:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3A7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>
            </div>

            <div class="form-wrapper active w-100" id="forgot-pass-form" style="margin-top: auto; margin-bottom: auto;">
                <div class="content">
                    <h5 class="title">Forgot Password</h5>
                    <p class="desc">
                        Enter the email address you used when joined and we’ll send
                        reset instructions to reset your password.
                    </p>

                    <form id="forgotPasswordForm">
                        <div class="form-grp mt-5 mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="reset-email" class="form-control" placeholder="Your email. . ." required />
                        </div>

                        <button type="submit" id="submitBtn" class="login-btn w-100 mt-2">
                            Send Reset Instructions
                        </button>

                        <div id="successMessage" class="mt-3 text-success text-center fw-bold" style="display: none; font-size: 14px;">
                            ✅ Reset link sent! Check your inbox.
                        </div>

                        <div class="account-msg">
                            Back to log in page?
                            <a href="{{ route('login.page') }}" class="btn btn-link">Login</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

    // Theme Toggle Logic
    const setupThemeSwitcher = () => {
        const toggleBtn = document.getElementById('toggleMode');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');

        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                const body = document.documentElement;
                const currentTheme = body.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                body.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);

                sunIcon.style.display = newTheme === 'dark' ? 'none' : 'block';
                moonIcon.style.display = newTheme === 'dark' ? 'block' : 'none';
            });
        }
    };

    // Form Submit (Axios)
    async function onForgotPassword(event) {
        event.preventDefault();

        const emailInput = document.getElementById('reset-email');
        const submitBtn = document.getElementById('submitBtn');
        const successMsg = document.getElementById('successMessage');
        const originalBtnText = submitBtn.innerText;

        if (!emailInput.value) return;

        // Loading State
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';
        submitBtn.disabled = true;
        successMsg.style.display = 'none';

        try {
            let response = await axios.post("/api/forgot-password", {
                email: emailInput.value
            }, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            // Success State
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
            successMsg.style.display = 'block';
            emailInput.value = ''; // clear input

        } catch (error) {
            // Error State
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
            alert(error.response?.data?.message || '❌ Failed to send reset link. Please try again.');
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        setupThemeSwitcher();

        // Language Dropdown Toggle
        document.getElementById('langSelector')?.addEventListener('click', function(e) {
            this.classList.toggle('open');
            e.stopPropagation();
        });
        document.addEventListener('click', () => document.getElementById('langSelector')?.classList.remove('open'));

        // Form Listener
        document.getElementById('forgotPasswordForm')?.addEventListener('submit', onForgotPassword);

        // Persistent Theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
        if (savedTheme === 'dark') {
            document.getElementById('sun-icon').style.display = 'none';
            document.getElementById('moon-icon').style.display = 'block';
        }
    });
</script>
@endsection