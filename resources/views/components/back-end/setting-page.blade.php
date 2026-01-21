@extends('layout.dashboard-sidenav')
@section('title', 'Admin Dashboard')
@section('content')

  <!--Dashboard Main Content -->
    <main class="container-fluid px-md-5">
      <div class="settings-container">
        <h3 class="heading">Settings</h3>
        <div class="row">
          <!-- Sidebar Tabs -->
          <div class="col-md-3 d-flex align-items-lg-stretch">
            <div class="tab-item-box">
              <div class="tab-item">
                <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link active"
                      id="profile-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#profile"
                      type="button"
                      role="tab"
                    >
                      Profile
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="account-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#account"
                      type="button"
                      role="tab"
                    >
                      Account
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="appearance-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#appearance"
                      type="button"
                      role="tab"
                    >
                      Appearance
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="notifications-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#notifications"
                      type="button"
                      role="tab"
                    >
                      Notifications
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="API-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#API"
                      type="button"
                      role="tab"
                    >
                      Third Party APIs
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="plan-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#your-plan"
                      type="button"
                      role="tab"
                    >
                      Your Plan
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="plan-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#your-plan-team"
                      type="button"
                      role="tab"
                    >
                      Your Plan Team
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-9 d-flex align-items-lg-stretch">
            <div class="tab-content" id="settingsContent">
              <!-- Profile Tab -->
              <div
                class="tab-pane fade show active"
                id="profile"
                role="tabpanel"
              >
                <div class="content-area">
                  <h2 class="header">Profile</h2>
                  <p>This is how others will see you on the site.</p>

                  <hr />

                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="name" />
                    <p>
                      This is your public display name. It can be your real name
                      or a pseudonym. You can only change this once every 30
                      days
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="username" />
                    <p>
                      This is your public display name. It can be your real name
                      or a pseudonym. You can only change this once every 30
                      days
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="email" />
                    <!-- <div class="select-wrapper">
                      <select id="email" class="hide-appearance">
                        <option value="">
                          Select a verified email to display
                        </option>
                        <option value="">example@gmail.com</option>
                      </select>
                    </div> -->
                    <p>
                      You can manage verified email addresses in your email
                      settings.
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea
                      id="bio"
                      placeholder="I own a computer..."
                    ></textarea>
                    <p>
                      You can @mention other users and organizations to link to
                      them.
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="urls">URLs</label>
                    <p class="mb-2">
                      Add links to your website, blog, or social media profiles.
                    </p>

                    <!-- added input -->
                    <div id="url-container">
                      <!-- Inputs will be added here -->
                      <input
                        class="mb-2"
                        type="text"
                        id="urls"
                        placeholder="https://shadcn.com"
                      />
                      <input
                        class="mb-2"
                        type="text"
                        id="urls"
                        placeholder="https://twitter.com/shadcn"
                      />
                    </div>

                    <button type="button" class="add-url-btn" id="add-url-btn">
                      Add URL
                    </button>
                  </div>

                  <button type="button" class="update-profile">Update profile</button>
                </div>
              </div>

              <!-- Account Tabs -->
              <div class="tab-pane fade" id="account" role="tabpanel">
                <div class="content-area">
                  <h2 class="header">Account</h2>
                  <p>
                    Update your account settings. Set your preferred language
                    and timezone.
                  </p>

                  <hr />

                  <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" placeholder="your name" />
                    <p>
                      This is the name that will be displayed on your profile
                      and in emails.
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="username">Date of birth</label>
                    <div class="position-relative">
                      <input
                        type="text"
                        id="dateOfOperation"
                        class="form-control flatpickr-input"
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
                            ></path>
                            <path
                              d="M13.1667 1.33333H12.5V0.666667C12.5 0.489856 12.4298 0.320286 12.3047 0.195262C12.1797 0.0702379 12.0101 0 11.8333 0C11.6565 0 11.487 0.0702379 11.3619 0.195262C11.2369 0.320286 11.1667 0.489856 11.1667 0.666667V1.33333H5.83333V0.666667C5.83333 0.489856 5.7631 0.320286 5.63807 0.195262C5.51305 0.0702379 5.34348 0 5.16667 0C4.98986 0 4.82029 0.0702379 4.69526 0.195262C4.57024 0.320286 4.5 0.489856 4.5 0.666667V1.33333H3.83333C2.9496 1.33439 2.10237 1.68592 1.47748 2.31081C0.852588 2.93571 0.501059 3.78294 0.5 4.66667L0.5 5.33333H16.5V4.66667C16.4989 3.78294 16.1474 2.93571 15.5225 2.31081C14.8976 1.68592 14.0504 1.33439 13.1667 1.33333Z"
                              fill="#858D9D"
                            ></path>
                          </g>
                          <defs>
                            <clipPath id="clip0_2412_1801">
                              <rect
                                width="16"
                                height="16"
                                fill="white"
                                transform="translate(0.5)"
                              ></rect>
                            </clipPath>
                          </defs>
                        </svg>
                      </button>
                    </div>
                    <p>Your date of birth is used to calculate your age.</p>
                  </div>

                  <div class="form-group">
                    <label for="email">Language</label>
                    <div class="select-wrapper">
                      <select id="email" class="hide-appearance">
                        <option value="">Select Language</option>
                        <option value="">English</option>
                        <option value="">Spanish</option>
                      </select>
                    </div>
                    <p>
                      This is the language that will be used in the dashboard.
                    </p>
                  </div>

                  <button type="submit" class="update-account">
                    Update account
                  </button>
                </div>
              </div>

              <!-- Appearance Tabs -->
              <div class="tab-pane fade" id="appearance" role="tabpanel">
                <div class="content-area">
                  <h2 class="header">Appearance</h2>
                  <p>
                    Customize the appearance of the app. Automatically switch
                    between day and night themes.
                  </p>

                  <hr />

                  <div class="form-group">
                    <label for="font">Font</label>
                    <div class="select-wrapper">
                      <select id="font" class="hide-appearance">
                        <option value="">Select font</option>
                        <option value="">Inter</option>
                        <option value="">Public Sans</option>
                      </select>
                    </div>
                    <p>Set the font you want to use in the dashboard.</p>
                  </div>

                  <div class="form-group">
                    <label for="theme">Theme</label>
                    <p class="mb-1">Select the theme for the dashboard.</p>

                    <div class="theme-box">
                      <div class="box light" id="lightTheme">
                        <img src="./assets/img/theam1.png" alt="Light Theme" />
                      </div>
                      <div class="box dark" id="darkTheme">
                        <img src="./assets/img/theam2.png" alt="Dark Theme" />
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="update-preferences">
                    Update preferences
                  </button>
                </div>
              </div>

              <!-- Notification Tabs -->
              <div class="tab-pane fade" id="notifications" role="tabpanel">
                <div class="content-area">
                  <h2 class="header">Notifications</h2>
                  <p>Configure how you receive notifications.</p>

                  <hr />

                  <div class="form-group">
                    <div class="radio-checkbox">
                      <h2>Notify me about...</h2>
                      <div class="option">
                        <input
                          type="radio"
                          id="all"
                          name="notification"
                          checked
                        />
                        <label for="all">All new messages</label>
                      </div>
                      <div class="option">
                        <input type="radio" id="direct" name="notification" />
                        <label for="direct">Direct messages and mentions</label>
                      </div>
                      <div class="option">
                        <input type="radio" id="none" name="notification" />
                        <label for="none">Nothing</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="notifications">Email Notifications</label>

                    <div class="notification-box">
                      <div class="section">
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Communication emails</h4>
                            <span
                              >Receive emails about your account activity.</span
                            >
                          </div>
                          <label class="switch">
                            <input type="checkbox" />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Marketing emails</h4>
                            <span
                              >Receive emails about new products, features, and
                              more.</span
                            >
                          </div>

                          <label class="switch">
                            <input type="checkbox" />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Social emails</h4>
                            <span
                              >Receive emails for friend requests, follows, and
                              more.</span
                            >
                          </div>

                          <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Security emails</h4>
                            <span
                              >Receive emails about your account activity and
                              security.</span
                            >
                          </div>

                          <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="radio-checkbox">
                      <div class="option">
                        <input
                          type="checkbox"
                          id="check"
                          name="notification"
                          checked
                        />
                        <label for="check"
                          >Use different settings for my mobile devices<br />
                          <span class="sub-text">
                            You can manage your mobile notifications in the
                            <a href="#" class="link">mobile settings</a>
                            page.</span
                          >
                        </label>
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="update-notifications">
                    Update notifications
                  </button>
                </div>
              </div>

              <!-- Third Party APIs Tabs -->
              <div class="tab-pane fade" id="API" role="tabpanel">
                <div class="content-area">
                  <h2 class="header">Third Party APIs</h2>
                  <p>Configure third party APIs</p>

                  <hr />

                  <div class="form-group">
                    <div class="APIs-box">
                      <div class="section">
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Calender</h4>
                          </div>
                          <label class="switch">
                            <input type="checkbox" />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Drive</h4>
                          </div>

                          <label class="switch">
                            <input type="checkbox" />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Zapier</h4>
                          </div>

                          <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Open AI</h4>
                          </div>

                          <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Notion Database</h4>
                          </div>

                          <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                          </label>
                        </div>
                        <div class="toggle">
                          <div class="d-flex flex-column w-75">
                            <h4>Slack</h4>
                          </div>

                          <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="update-setting">
                    Update Settings
                  </button>
                </div>
              </div>

              <!-- Your Current Plan Tabs -->
              <div class="tab-pane fade" id="your-plan" role="tabpanel">
                <div class="content-area">
                  <h2 class="header">Your Current Plan</h2>
                  <div class="account-plan">
                    <div class="account">
                      <div class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                        >
                          <path
                            d="M16.0525 14.5786C16.0525 18.2261 13.0956 21.183 9.4481 21.183C5.80062 21.183 2.84375 18.2261 2.84375 14.5786C2.84375 10.9312 5.80062 7.97429 9.4481 7.97429C13.0956 7.97429 16.0525 10.9312 16.0525 14.5786Z"
                            fill="black"
                          />
                          <path
                            d="M17.7013 14.5688C20.213 13.634 22.0022 11.2146 22.0022 8.3773C22.0022 4.72982 19.0453 1.77295 15.3978 1.77295C12.464 1.77295 9.97698 3.68593 9.11608 6.33258C9.2264 6.32821 9.33729 6.326 9.44869 6.326C14.0032 6.326 17.696 10.0155 17.7013 14.5688Z"
                            fill="black"
                          />
                        </svg>
                      </div>
                      <h4 class="title">Single Account</h4>
                      <p class="desc">
                        Use TraderSME by yourself. annual $199 only!
                      </p>
                    </div>

                    <div class="account active">
                      <div class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                        >
                          <path
                            d="M4.5981 14.5188L11.9534 3.13562C12.3591 2.50767 13.3333 2.79503 13.3333 3.54266L13.3333 9.67778C13.3333 9.73301 13.3781 9.77778 13.4333 9.77778H18.842C19.3285 9.77778 19.6128 10.3263 19.3322 10.7238L12.0294 21.0695C11.6074 21.6673 10.6667 21.3687 10.6667 20.637L10.6667 15.5444C10.6667 15.4892 10.6219 15.4444 10.5667 15.4444H5.10205C4.62672 15.4444 4.34013 14.9181 4.5981 14.5188Z"
                            fill="black"
                          />
                        </svg>
                      </div>
                      <h4 class="title">Team Account</h4>
                      <p class="desc">
                        Use TraderSME by yourself and your team. annual $399
                        only!
                      </p>
                    </div>
                  </div>

                  <div class="form-group mt-5">
                    <label for="notifications">Invite Team Members</label>
                    <div class="plan-wrapper">
                      <div class="Plan-box">
                        <div class="section m-0">
                          <h5>Invite by email</h5>
                          <div class="filter-src-box">
                            <select
                              id="invite-by-email"
                              class="form-control"
                              multiple
                              placeholder="Invite your friend.."
                            >
                              <option
                                value="sebastian.graham@example.com"
                                data-avatar="./assets/img/pp6.png"
                              >
                                <span>Sebastian Graham</span>
                              </option>
                              <option
                                value="sara.cruz@example.com"
                                data-avatar="./assets/img/pp4.png"
                              >
                                Sara Curz
                              </option>
                            </select>

                            <button class="send-invite">
                              Send Invite
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                              >
                                <g clip-path="url(#clip0_2546_11613)">
                                  <path
                                    d="M10.0016 2.19971L5.10156 7.09971"
                                    stroke="white"
                                    stroke-width="0.96"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M2.42958 6.06169C1.95331 5.87647 1.71517 5.78386 1.64564 5.65042C1.58537 5.53474 1.58529 5.39694 1.64543 5.28119C1.71479 5.14767 1.95282 5.05478 2.42888 4.869L9.10575 2.26339C9.53549 2.09569 9.75036 2.01183 9.88767 2.0577C10.0069 2.09754 10.1005 2.19111 10.1403 2.31035C10.1862 2.44765 10.1023 2.66252 9.93462 3.09227L7.32902 9.76913C7.14324 10.2452 7.05035 10.4832 6.91683 10.5526C6.80108 10.6127 6.66328 10.6126 6.5476 10.5524C6.41415 10.4828 6.32154 10.2447 6.13633 9.76843L5.2005 7.36203C5.16291 7.26535 5.14411 7.21701 5.11507 7.17631C5.08934 7.14023 5.05779 7.10868 5.02171 7.08294C4.981 7.05391 4.93266 7.03511 4.83599 6.99751L2.42958 6.06169Z"
                                    stroke="white"
                                    stroke-width="0.96"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </g>
                                <defs>
                                  <clipPath id="clip0_2546_11613">
                                    <rect
                                      width="11.2"
                                      height="11.2"
                                      fill="white"
                                      transform="translate(0.199219 0.799805)"
                                    />
                                  </clipPath>
                                </defs>
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="Plan-box mt-3">
                        <div class="section m-0">
                          <h5>Members List:</h5>
                          <div class="user-list-container">
                            <!-- User 1: Owner -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp1.png"
                                  alt="Marvin McKinney"
                                  class="user-avatar"
                                />
                                <span class="user-name">Marvin McKinney</span>
                              </div>
                              <button
                                class="btn btn-sm btn-owner action-button"
                                disabled
                              >
                                Owner
                              </button>
                            </div>

                            <!-- User 2: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp2.png"
                                  alt="Ronald Richards"
                                  class="user-avatar"
                                />
                                <span class="user-name">Ronald Richards</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <!-- Dropdown menu (optional, for functionality beyond design) -->
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 3: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp3.png"
                                  alt="Cameron Williamson"
                                  class="user-avatar"
                                />
                                <span class="user-name"
                                  >Cameron Williamson</span
                                >
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 4: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp4.png"
                                  alt="Arlene McCoy"
                                  class="user-avatar"
                                />
                                <span class="user-name">Arlene McCoy</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 5: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp5.png"
                                  alt="Jerome Bell"
                                  class="user-avatar"
                                />
                                <span class="user-name">Jerome Bell</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 6: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp6.png"
                                  alt="Dianne Russell"
                                  class="user-avatar"
                                />
                                <span class="user-name">Dianne Russell</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu tr">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="save-btn w-100">Save</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Your Current Plan Tabs -->
              <div class="tab-pane fade" id="your-plan-team" role="tabpanel">
                <div class="content-area">
                  <h2 class="header">Your Current Plan</h2>
                  <div class="account-plan">
                    <div class="account">
                      <div class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                        >
                          <path
                            d="M16.0525 14.5786C16.0525 18.2261 13.0956 21.183 9.4481 21.183C5.80062 21.183 2.84375 18.2261 2.84375 14.5786C2.84375 10.9312 5.80062 7.97429 9.4481 7.97429C13.0956 7.97429 16.0525 10.9312 16.0525 14.5786Z"
                            fill="black"
                          />
                          <path
                            d="M17.7013 14.5688C20.213 13.634 22.0022 11.2146 22.0022 8.3773C22.0022 4.72982 19.0453 1.77295 15.3978 1.77295C12.464 1.77295 9.97698 3.68593 9.11608 6.33258C9.2264 6.32821 9.33729 6.326 9.44869 6.326C14.0032 6.326 17.696 10.0155 17.7013 14.5688Z"
                            fill="black"
                          />
                        </svg>
                      </div>
                      <h4 class="title">Single Account</h4>
                      <p class="desc">
                        Use TraderSME by yourself. annual $199 only!
                      </p>
                    </div>

                    <div class="account active">
                      <div class="icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                        >
                          <path
                            d="M4.5981 14.5188L11.9534 3.13562C12.3591 2.50767 13.3333 2.79503 13.3333 3.54266L13.3333 9.67778C13.3333 9.73301 13.3781 9.77778 13.4333 9.77778H18.842C19.3285 9.77778 19.6128 10.3263 19.3322 10.7238L12.0294 21.0695C11.6074 21.6673 10.6667 21.3687 10.6667 20.637L10.6667 15.5444C10.6667 15.4892 10.6219 15.4444 10.5667 15.4444H5.10205C4.62672 15.4444 4.34013 14.9181 4.5981 14.5188Z"
                            fill="black"
                          />
                        </svg>
                      </div>
                      <h4 class="title">Team Account</h4>
                      <p class="desc">
                        Use TraderSME by yourself and your team. annual $399
                        only!
                      </p>
                    </div>
                  </div>

                  <div class="form-group mt-5">
                    <label for="notifications">Invite Team Members</label>
                    <div class="plan-wrapper">
                      <div class="Plan-box">
                        <div class="section m-0">
                          <h5>Invite by email</h5>
                          <div class="filter-src-box">
                            <select
                              id="invite-by-email2"
                              class="form-control"
                              multiple
                              placeholder="Invite your friend.."
                            >
                              <option
                                value="sebastian.graham@example.com"
                                data-avatar="./assets/img/pp6.png"
                              >
                                <span>Sebastian Graham</span>
                              </option>
                              <option
                                value="sara.cruz@example.com"
                                data-avatar="./assets/img/pp4.png"
                              >
                                Sara Curz
                              </option>
                            </select>

                            <button class="send-invite">
                              Send Invite
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                              >
                                <g clip-path="url(#clip0_2546_11613)">
                                  <path
                                    d="M10.0016 2.19971L5.10156 7.09971"
                                    stroke="white"
                                    stroke-width="0.96"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                  <path
                                    d="M2.42958 6.06169C1.95331 5.87647 1.71517 5.78386 1.64564 5.65042C1.58537 5.53474 1.58529 5.39694 1.64543 5.28119C1.71479 5.14767 1.95282 5.05478 2.42888 4.869L9.10575 2.26339C9.53549 2.09569 9.75036 2.01183 9.88767 2.0577C10.0069 2.09754 10.1005 2.19111 10.1403 2.31035C10.1862 2.44765 10.1023 2.66252 9.93462 3.09227L7.32902 9.76913C7.14324 10.2452 7.05035 10.4832 6.91683 10.5526C6.80108 10.6127 6.66328 10.6126 6.5476 10.5524C6.41415 10.4828 6.32154 10.2447 6.13633 9.76843L5.2005 7.36203C5.16291 7.26535 5.14411 7.21701 5.11507 7.17631C5.08934 7.14023 5.05779 7.10868 5.02171 7.08294C4.981 7.05391 4.93266 7.03511 4.83599 6.99751L2.42958 6.06169Z"
                                    stroke="white"
                                    stroke-width="0.96"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </g>
                                <defs>
                                  <clipPath id="clip0_2546_11613">
                                    <rect
                                      width="11.2"
                                      height="11.2"
                                      fill="white"
                                      transform="translate(0.199219 0.799805)"
                                    />
                                  </clipPath>
                                </defs>
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="Plan-box mt-3">
                        <div class="section m-0">
                          <h5>Members List:</h5>
                          <div class="user-list-container">
                            <!-- User 1: Owner -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp1.png"
                                  alt="Marvin McKinney"
                                  class="user-avatar"
                                />
                                <span class="user-name">Marvin McKinney</span>
                              </div>
                              <button
                                class="btn btn-sm btn-owner action-button"
                                disabled
                              >
                                Owner
                              </button>
                            </div>

                            <!-- User 2: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp2.png"
                                  alt="Ronald Richards"
                                  class="user-avatar"
                                />
                                <span class="user-name">Ronald Richards</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <!-- Dropdown menu (optional, for functionality beyond design) -->
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 3: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp3.png"
                                  alt="Cameron Williamson"
                                  class="user-avatar"
                                />
                                <span class="user-name"
                                  >Cameron Williamson</span
                                >
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 4: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp4.png"
                                  alt="Arlene McCoy"
                                  class="user-avatar"
                                />
                                <span class="user-name">Arlene McCoy</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 5: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp5.png"
                                  alt="Jerome Bell"
                                  class="user-avatar"
                                />
                                <span class="user-name">Jerome Bell</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>

                            <!-- User 6: Can Edit -->
                            <div class="user-item">
                              <div class="user-info">
                                <img
                                  src="./assets/img/pp6.png"
                                  alt="Dianne Russell"
                                  class="user-avatar"
                                />
                                <span class="user-name">Dianne Russell</span>
                              </div>
                              <button
                                class="btn btn-sm btn-can-edit action-button"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Can Edit
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="8"
                                  height="5"
                                  viewBox="0 0 8 5"
                                  fill="none"
                                >
                                  <path
                                    d="M1 1.19971L3.8 3.99971L6.6 1.19971"
                                    stroke="white"
                                    stroke-width="0.933333"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>

                                <ul class="dropdown-menu tr">
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Can View</a
                                    >
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#"
                                      >Remove Access</a
                                    >
                                  </li>
                                </ul>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="save-btn w-100">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


@endsection


<script>
document.addEventListener("DOMContentLoaded", function () {
  fetchUserProfile();
});

// Fetch user profile data
function fetchUserProfile() {
  fetch("/profile")
    .then((res) => res.json())
    .then((data) => {
      document.getElementById("username").value = data.username || "";
      document.getElementById("name").value = data.name || "";
      document.getElementById("email").value = data.email || "";
      document.getElementById("bio").value = data.bio || "";
      

      // Clear previous URLs and re-add dynamically
      const urlContainer = document.getElementById("url-container");
      urlContainer.innerHTML = "";

      if (data.urls && Array.isArray(JSON.parse(data.urls))) {
        JSON.parse(data.urls).forEach((url) => {
          const input = document.createElement("input");
          input.type = "text";
          input.classList.add("mb-2");
          input.value = url;
          input.placeholder = "https://example.com";
          urlContainer.appendChild(input);
        });
      }
    })
    .catch((err) => console.error("Error fetching profile:", err));
}
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  document.querySelector(".update-profile").addEventListener("click", async function (e) {
    e.preventDefault();

    const username = document.querySelector("#username").value;
    const name = document.querySelector("#name").value;
    const email = document.querySelector("#email").value;
    const bio = document.querySelector("#bio").value;
   

    try {
      const res = await axios.post("/profile/update", {
        username,
        name,
        email,
        bio,
      
      }, {
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
      });

      alert(res.data.message);
      console.log(res.data);
    } catch (err) {
      console.error("Error updating profile:", err.response ? err.response.data : err);
      alert("Profile update failed. Check console for details.");
    }
  });
});
</script>


