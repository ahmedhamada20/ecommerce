<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wowdash - Bootstrap 5 Admin Dashboard HTML Template</title>
    <link rel="icon" type="image/png" href="https://laravel.wowdash.wowtheme7.com/assets/images/favicon.png"
          sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/remixicon.css')}}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/bootstrap.min.css')}}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/apexcharts.css')}}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/dataTables.min.css')}}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/editor-katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/editor.atom-one-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/editor.quill.snow.css')}}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/flatpickr.min.css')}}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/full-calendar.css')}}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/jquery-jvectormap-2.0.5.css')}}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/magnific-popup.css')}}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/slick.css')}}">
    <!-- prism css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/prism.css')}}">
    <!-- file upload css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/file-upload.css')}}">

    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/audioplayer.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/style.css')}}">
</head>

<body>


<aside class="sidebar" id="rtlSidebar" style="direction: rtl; display: none;">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
" class="sidebar-logo">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo.png" alt="site logo"
                 class="light-logo">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo-light.png" alt="site logo"
                 class="dark-logo">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo-icon.png" alt="site logo"
                 class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./index.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Dashboard Statistics</a>
                    </li>
                    <li>
                        <a href="./index2.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            CRM</a>
                    </li>
                    <li>
                        <a href="./index3.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Financial Management</a>
                    </li>
                    <li>
                        <a href="./index4.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Storage Management</a>
                    </li>
                    <li>
                        <a href="./posindex.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            POS</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>POS</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./manageordersindex.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Manage Orders</a>
                    </li>
                    <li>
                        <a href="./vendor-wiseindex.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Vendor-Wise Shipping</a>
                    </li>
                    <li>
                        <a href="./detailedorderindex.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Detailed Order</a>
                    </li>
                    <li>
                        <a href="./refundindex.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Refund</a>
                    </li>
                    <li>
                        <a href="./ordertrackinginde.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Order Tracking</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>CRM</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./managecustomer.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Manage Customer</a>
                    </li>
                    <li>
                        <a href="./withdrawalrequestsindex.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Withdrawal Requests</a>
                    </li>
                    <li>
                        <a href="./customerloyaltyindex.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Customer Loyalty</a>
                    </li>
                    <li>
                        <a href="./CRMIntegrationindex.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            CRM Integration</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Financial Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./subscriptionindex.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Subscription</a>
                    </li>
                    <li>
                        <a href="./taxcalculationindex.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Tax Calculation</a>
                    </li>
                    <li>
                        <a href="./advancedcurrencyindex.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Advanced Currency</a>
                    </li>
                    <li>
                        <a href="./commissiontrackingindex.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Commission Tracking</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a href="./products.html">
                    <iconify-icon icon="ic:baseline-shopping-cart" class="menu-icon"></iconify-icon>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="./email.html">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Email</span>
                </a>
            </li>
            <li>
                <a href="./pages.html">
                    <iconify-icon icon="mdi:page-next" class="menu-icon"></iconify-icon>
                    <span>Pages</span>
                </a>
            </li>
            <li>
                <a href="./chatmessage.html">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Chat</span>
                </a>
            </li>
            <li>
                <a href="./calendar.html">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                    <span>Calendar</span>
                </a>
            </li>
            <li>
                <a href="./kanban.html">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Kanban</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:blog" class="menu-icon"></iconify-icon> <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./post.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Posts</a>
                    </li>
                    <li>
                        <a href="./categories.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Categories</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./invoice-list.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="./invoice-preview.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Preview</a>
                    </li>
                    <li>
                        <a href="./invoice-add.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add new</a>
                    </li>
                    <li>
                        <a href="./invoice-edit.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Edit</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-robot-2-line"></i>
                    <span>Ai Application</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./textgenerator.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Text Generator</a>
                    </li>
                    <li>
                        <a href="./codegenerator.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Code Generator</a>
                    </li>
                    <li>
                        <a href="./imagegenerator.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Image Generator</a>
                    </li>
                    <li>
                        <a href="./voicegenerator.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Voice Generator</a>
                    </li>
                    <li>
                        <a href="./videogenerator.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Video Generator</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">UI Elements</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Components</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./typography.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Typography</a>
                    </li>
                    <li>
                        <a href="./colors.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Colors</a>
                    </li>
                    <li>
                        <a href="./button.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Button</a>
                    </li>
                    <li>
                        <a href="./dropdown.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i>
                            Dropdown</a>
                    </li>
                    <li>
                        <a href="./alert.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Alerts</a>
                    </li>
                    <li>
                        <a href="./card.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Card</a>
                    </li>
                    <li>
                        <a href="./carousel.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Carousel</a>
                    </li>
                    <li>
                        <a href="./avatar.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Avatars</a>
                    </li>
                    <li>
                        <a href="./progress.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Progress bar</a>
                    </li>
                    <li>
                        <a href="./tabs.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Tab & Accordion</a>
                    </li>
                    <li>
                        <a href="./pagination.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Pagination</a>
                    </li>
                    <li>
                        <a href="./badges.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Badges</a>
                    </li>
                    <li>
                        <a href="./tooltip.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i>
                            Tooltip & Popover</a>
                    </li>
                    <li>
                        <a href="./videos.html"><i class="ri-circle-fill circle-icon text-cyan w-auto"></i>
                            Videos</a>
                    </li>
                    <li>
                        <a href="./starrating.html"><i class="ri-circle-fill circle-icon text-indigo w-auto"></i>
                            Star Ratings</a>
                    </li>
                    <li>
                        <a href="./tags.html"><i class="ri-circle-fill circle-icon text-purple w-auto"></i>
                            Tags</a>
                    </li>
                    <li>
                        <a href="./list.html"><i class="ri-circle-fill circle-icon text-red w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="./calendar.html"><i class="ri-circle-fill circle-icon text-yellow w-auto"></i>
                            Calendar</a>
                    </li>
                    <li>
                        <a href="./radio.html"><i class="ri-circle-fill circle-icon text-orange w-auto"></i>
                            Radio</a>
                    </li>
                    <li>
                        <a href="./switch.html"><i class="ri-circle-fill circle-icon text-pink w-auto"></i>
                            Switch</a>
                    </li>
                    <li>
                        <a href="./imageupload.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Upload</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>
                    <span>Forms</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./form.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Input Forms</a>
                    </li>
                    <li>
                        <a href="./form-layout.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Input Layout</a>
                    </li>
                    <li>
                        <a href="./form-validation.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Form Validation</a>
                    </li>
                    <li>
                        <a href="./wizard.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Form Wizard</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                    <span>Table</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./tablebasic.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Basic Table</a>
                    </li>
                    <li>
                        <a href="./tabledata.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Data Table</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>
                    <span>Chart</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./linechart.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Line Chart</a>
                    </li>
                    <li>
                        <a href="./columnchart.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Column Chart</a>
                    </li>
                    <li>
                        <a href="./piechart.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Pie Chart</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./widgets.html">
                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
                    <span>Widgets</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./users-list.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Users List</a>
                    </li>
                    <li>
                        <a href="./users-grid.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Users Grid</a>
                    </li>
                    <li>
                        <a href="./add-user.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add User</a>
                    </li>
                    <li>
                        <a href="./view-user.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            View User</a>
                    </li>
                    <li>
                        <a href="./view-profile.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            View Profile</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">Application</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>
                    <span>Authentication</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./signin.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Sign In</a>
                    </li>
                    <li>
                        <a href="./signup.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Sign Up</a>
                    </li>
                    <li>
                        <a href="./forgotpassword.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Forgot Password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./gallery.html">
                    <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a href="./pricing.html">
                    <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>
                    <span>Pricing</span>
                </a>
            </li>
            <li>
                <a href="./faq.html">
                    <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>
                    <span>FAQs.</span>
                </a>
            </li>
            <li>
                <a href="./error.html">
                    <iconify-icon icon="streamline:straight-face" class="menu-icon"></iconify-icon>
                    <span>404</span>
                </a>
            </li>
            <li>
                <a href="./termscondition.html">
                    <iconify-icon icon="octicon:info-24" class="menu-icon"></iconify-icon>
                    <span>Terms & Conditions</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./company.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Company</a>
                    </li>
                    <li>
                        <a href="./company.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Notification</a>
                    </li>
                    <li>
                        <a href="./notification-alert.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Notification Alert</a>
                    </li>
                    <li>
                        <a href="./theme.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Theme</a>
                    </li>
                    <li>
                        <a href="./currencies.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Currencies</a>
                    </li>
                    <li>
                        <a href="./language.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Languages</a>
                    </li>
                    <li>
                        <a href="./payment-gateway.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Payment Gateway</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- ..::  header area end ::.. -->

<main class="dashboard-main" id="rtlMain" style="direction: rtl; display: none;">

    <!-- ..::  navbar start ::.. -->
    <div class="navbar-header">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-4">
                    <button type="button" class="sidebar-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                        <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                    </button>
                    <button type="button" class="sidebar-mobile-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                    </button>
                    <form class="navbar-search">
                        <input type="text" name="search" placeholder="Search">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                    <div class="dropdown d-none d-sm-inline-block">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/lang-flag.png" alt="image"
                                 class="w-24 h-24 object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Choose Your Language
                                    </h6>
                                </div>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">
                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="english">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/flags/flag1.png"
                                                     alt=""
                                                     class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">English</span>
                                            </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="english">
                                </div>

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="japan">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/flags/flag2.png"
                                                     alt=""
                                                     class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">Japan</span>
                                            </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="japan" checked>
                                </div>
                            </div>
                        </div>
                    </div><!-- Language dropdown end -->

                    <div class="dropdown">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                            <div
                                class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Message</h6>
                                </div>
                                <span
                                    class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-3.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-4.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px  bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">2</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-5.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-6.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-7.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                    </div>
                                </a>

                            </div>
                            <div class="text-center py-12 px-16">
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                    Message</a>
                            </div>
                        </div>
                    </div><!-- Message dropdown end -->

                    <div class="dropdown">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                            <div
                                class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
                                </div>
                                <span
                                    class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <iconify-icon icon="bitcoin-icons:verify-outline"
                                                              class="icon text-xxl"></iconify-icon>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Congratulations</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile
                                                has been Verified. Your profile has been Verified</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-1.png"
                                                     alt="">
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Ronald Richards</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can
                                                stitch between artboards</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                AM
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Arlene McCoy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-2.png"
                                                     alt="">
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Annette Black</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                DR
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Darlene Robertson</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>
                            </div>

                            <div class="text-center py-12 px-16">
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                    Notification</a>
                            </div>

                        </div>
                    </div><!-- Notification dropdown end -->

                    <div class="dropdown">
                        <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/user.png" alt="image"
                                 class="w-40-px h-40-px object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-2">Shaidul Islam</h6>
                                    <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                </div>
                                <button type="button" class="hover-text-danger">
                                    <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                </button>
                            </div>
                            <ul class="to-top-list">
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                       href="https://laravel.wowdash.wowtheme7.com/users/view-profile">
                                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                       href="https://laravel.wowdash.wowtheme7.com/email">
                                        <iconify-icon icon="tabler:message-check"
                                                      class="icon text-xl"></iconify-icon> Inbox
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                       href="./company.html">
                                        <iconify-icon icon="icon-park-outline:setting-two"
                                                      class="icon text-xl"></iconify-icon> Setting
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                       href="javascript:void(0)">
                                        <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log
                                        Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Profile dropdown end -->
                </div>
            </div>
        </div>
    </div> <!-- ..::  navbar end ::.. -->
    <div class="dashboard-main-body">

        <!-- ..::  breadcrumb  start ::.. -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Faq</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
"
                       class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Faq</li>
            </ul>
        </div> <!-- ..::  header area end ::.. -->


        <div class="card basic-data-table">
            <div class="card-header p-0 border-0">
                <div class="responsive-padding-40-150 bg-light-pink">
                    <div class="row gy-4 align-items-center">
                        <div class="col-xl-7">
                            <h4 class="mb-20">Frequently asked questions.</h4>
                            <p class="mb-0 text-secondary-light max-w-634-px text-xl">Lorem Ipsum is simply dummy
                                text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard du text ever since the 1500s, when an unkn</p>
                        </div>
                        <div class="col-xl-5 d-xl-block d-none">
                            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/faq-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body bg-base responsive-padding-40-150">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="active-text-tab nav flex-column nav-pills bg-base shadow py-0 px-24 radius-12 border"
                             id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom active"
                                id="v-pills-about-us-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about-us"
                                type="button" role="tab" aria-controls="v-pills-about-us" aria-selected="true">About
                                Us</button>
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom"
                                id="v-pills-ux-ui-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ux-ui"
                                type="button" role="tab" aria-controls="v-pills-ux-ui" aria-selected="false">UX UI
                                Design</button>
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom"
                                id="v-pills-development-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-development" type="button" role="tab"
                                aria-controls="v-pills-development" aria-selected="false">Development</button>
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom"
                                id="v-pills-use-case-tab" data-bs-toggle="pill" data-bs-target="#v-pills-use-case"
                                type="button" role="tab" aria-controls="v-pills-use-case" aria-selected="false">How
                                to can i use WowDash? </button>
                            <button class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16"
                                    id="v-pills-use-agency-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-use-agency" type="button" role="tab"
                                    aria-controls="v-pills-use-agency" aria-selected="false">Can I use my
                                agency?</button>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-about-us" role="tabpanel"
                                 aria-labelledby="v-pills-about-us-tab" tabindex="0">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFive" aria-expanded="false"
                                                    aria-controls="collapseFive">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseSix" aria-expanded="false"
                                                    aria-controls="collapseSix">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-ux-ui" role="tabpanel"
                                 aria-labelledby="v-pills-ux-ui-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleTwo">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-1"
                                                    aria-expanded="true" aria-controls="c-1">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-1" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-2"
                                                    aria-expanded="false" aria-controls="c-2">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-2" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-3"
                                                    aria-expanded="false" aria-controls="c-3">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-3" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-4"
                                                    aria-expanded="false" aria-controls="c-4">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-4" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-5"
                                                    aria-expanded="false" aria-controls="c-5">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-5" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-6"
                                                    aria-expanded="false" aria-controls="c-6">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-6" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-development" role="tabpanel"
                                 aria-labelledby="v-pills-development-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleThree">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-7"
                                                    aria-expanded="true" aria-controls="c-7">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-7" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-8"
                                                    aria-expanded="false" aria-controls="c-8">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-8" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-9"
                                                    aria-expanded="false" aria-controls="c-9">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-9" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-10"
                                                    aria-expanded="false" aria-controls="c-10">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-10" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-11"
                                                    aria-expanded="false" aria-controls="c-11">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-11" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-12"
                                                    aria-expanded="false" aria-controls="c-12">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-12" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-use-case" role="tabpanel"
                                 aria-labelledby="v-pills-use-case-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleFour">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-13"
                                                    aria-expanded="true" aria-controls="c-13">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-13" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-14"
                                                    aria-expanded="false" aria-controls="c-14">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-14" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-15"
                                                    aria-expanded="false" aria-controls="c-15">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-15" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-16"
                                                    aria-expanded="false" aria-controls="c-16">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-16" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-17"
                                                    aria-expanded="false" aria-controls="c-17">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-17" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-18"
                                                    aria-expanded="false" aria-controls="c-18">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-18" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-use-agency" role="tabpanel"
                                 aria-labelledby="v-pills-use-agency-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleFIve">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-19"
                                                    aria-expanded="true" aria-controls="c-19">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-19" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-20"
                                                    aria-expanded="false" aria-controls="c-20">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-20" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-21"
                                                    aria-expanded="false" aria-controls="c-21">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-21" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-22"
                                                    aria-expanded="false" aria-controls="c-22">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-22" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-23"
                                                    aria-expanded="false" aria-controls="c-23">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-23" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-24"
                                                    aria-expanded="false" aria-controls="c-24">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-24" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- ..::  footer  start ::.. -->
    <footer class="d-footer">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
            </div>
            <div class="col-auto">
                <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
            </div>
        </div>
    </footer> <!-- ..::  footer area end ::.. -->

</main>

<aside class="sidebar" id="ltrSidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
" class="sidebar-logo">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo.png" alt="site logo"
                 class="light-logo">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo-light.png" alt="site logo"
                 class="dark-logo">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo-icon.png" alt="site logo"
                 class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./index.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Dashboard Statistics</a>
                    </li>
                    <li>
                        <a href="./index2.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            CRM</a>
                    </li>
                    <li>
                        <a href="./index3.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Financial Management</a>
                    </li>
                    <li>
                        <a href="./index4.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Storage Management</a>
                    </li>
                    <li>
                        <a href="./posindex.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            POS</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>POS</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./manageordersindex.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Manage Orders</a>
                    </li>
                    <li>
                        <a href="./vendor-wiseindex.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Vendor-Wise Shipping</a>
                    </li>
                    <li>
                        <a href="./detailedorderindex.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Detailed Order</a>
                    </li>
                    <li>
                        <a href="./refundindex.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Refund</a>
                    </li>
                    <li>
                        <a href="./ordertrackinginde.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Order Tracking</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>CRM</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./managecustomer.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Manage Customer</a>
                    </li>
                    <li>
                        <a href="./withdrawalrequestsindex.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Withdrawal Requests</a>
                    </li>
                    <li>
                        <a href="./customerloyaltyindex.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Customer Loyalty</a>
                    </li>
                    <li>
                        <a href="./CRMIntegrationindex.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            CRM Integration</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Financial Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./subscriptionindex.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Subscription</a>
                    </li>
                    <li>
                        <a href="./taxcalculationindex.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Tax Calculation</a>
                    </li>
                    <li>
                        <a href="./advancedcurrencyindex.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Advanced Currency</a>
                    </li>
                    <li>
                        <a href="./commissiontrackingindex.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Commission Tracking</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a href="./products.html">
                    <iconify-icon icon="ic:baseline-shopping-cart" class="menu-icon"></iconify-icon>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="./email.html">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Email</span>
                </a>
            </li>
            <li>
                <a href="./pages.html">
                    <iconify-icon icon="mdi:page-next" class="menu-icon"></iconify-icon>
                    <span>Pages</span>
                </a>
            </li>
            <li>
                <a href="./chatmessage.html">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Chat</span>
                </a>
            </li>
            <li>
                <a href="./calendar.html">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                    <span>Calendar</span>
                </a>
            </li>
            <li>
                <a href="./kanban.html">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Kanban</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:blog" class="menu-icon"></iconify-icon> <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./post.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Posts</a>
                    </li>
                    <li>
                        <a href="./categories.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Categories</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./invoice-list.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="./invoice-preview.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Preview</a>
                    </li>
                    <li>
                        <a href="./invoice-add.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add new</a>
                    </li>
                    <li>
                        <a href="./invoice-edit.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Edit</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-robot-2-line"></i>
                    <span>Ai Application</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./textgenerator.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Text Generator</a>
                    </li>
                    <li>
                        <a href="./codegenerator.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Code Generator</a>
                    </li>
                    <li>
                        <a href="./imagegenerator.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Image Generator</a>
                    </li>
                    <li>
                        <a href="./voicegenerator.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Voice Generator</a>
                    </li>
                    <li>
                        <a href="./videogenerator.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Video Generator</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">UI Elements</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Components</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./typography.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Typography</a>
                    </li>
                    <li>
                        <a href="./colors.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Colors</a>
                    </li>
                    <li>
                        <a href="./button.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Button</a>
                    </li>
                    <li>
                        <a href="./dropdown.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i>
                            Dropdown</a>
                    </li>
                    <li>
                        <a href="./alert.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Alerts</a>
                    </li>
                    <li>
                        <a href="./card.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Card</a>
                    </li>
                    <li>
                        <a href="./carousel.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Carousel</a>
                    </li>
                    <li>
                        <a href="./avatar.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Avatars</a>
                    </li>
                    <li>
                        <a href="./progress.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Progress bar</a>
                    </li>
                    <li>
                        <a href="./tabs.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Tab & Accordion</a>
                    </li>
                    <li>
                        <a href="./pagination.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Pagination</a>
                    </li>
                    <li>
                        <a href="./badges.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Badges</a>
                    </li>
                    <li>
                        <a href="./tooltip.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i>
                            Tooltip & Popover</a>
                    </li>
                    <li>
                        <a href="./videos.html"><i class="ri-circle-fill circle-icon text-cyan w-auto"></i>
                            Videos</a>
                    </li>
                    <li>
                        <a href="./starrating.html"><i class="ri-circle-fill circle-icon text-indigo w-auto"></i>
                            Star Ratings</a>
                    </li>
                    <li>
                        <a href="./tags.html"><i class="ri-circle-fill circle-icon text-purple w-auto"></i>
                            Tags</a>
                    </li>
                    <li>
                        <a href="./list.html"><i class="ri-circle-fill circle-icon text-red w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="./calendar.html"><i class="ri-circle-fill circle-icon text-yellow w-auto"></i>
                            Calendar</a>
                    </li>
                    <li>
                        <a href="./radio.html"><i class="ri-circle-fill circle-icon text-orange w-auto"></i>
                            Radio</a>
                    </li>
                    <li>
                        <a href="./switch.html"><i class="ri-circle-fill circle-icon text-pink w-auto"></i>
                            Switch</a>
                    </li>
                    <li>
                        <a href="./imageupload.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Upload</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>
                    <span>Forms</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./form.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Input Forms</a>
                    </li>
                    <li>
                        <a href="./form-layout.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Input Layout</a>
                    </li>
                    <li>
                        <a href="./form-validation.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Form Validation</a>
                    </li>
                    <li>
                        <a href="./wizard.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Form Wizard</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                    <span>Table</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./tablebasic.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Basic Table</a>
                    </li>
                    <li>
                        <a href="./tabledata.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Data Table</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>
                    <span>Chart</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./linechart.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Line Chart</a>
                    </li>
                    <li>
                        <a href="./columnchart.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Column Chart</a>
                    </li>
                    <li>
                        <a href="./piechart.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Pie Chart</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./widgets.html">
                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
                    <span>Widgets</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./users-list.html"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Users List</a>
                    </li>
                    <li>
                        <a href="./users-grid.html"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Users Grid</a>
                    </li>
                    <li>
                        <a href="./add-user.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add User</a>
                    </li>
                    <li>
                        <a href="./view-user.html"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            View User</a>
                    </li>
                    <li>
                        <a href="./view-profile.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            View Profile</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">Application</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>
                    <span>Authentication</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./signin.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Sign In</a>
                    </li>
                    <li>
                        <a href="./signup.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Sign Up</a>
                    </li>
                    <li>
                        <a href="./forgotpassword.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Forgot Password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./gallery.html">
                    <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a href="./pricing.html">
                    <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>
                    <span>Pricing</span>
                </a>
            </li>
            <li>
                <a href="./faq.html">
                    <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>
                    <span>FAQs.</span>
                </a>
            </li>
            <li>
                <a href="./error.html">
                    <iconify-icon icon="streamline:straight-face" class="menu-icon"></iconify-icon>
                    <span>404</span>
                </a>
            </li>
            <li>
                <a href="./termscondition.html">
                    <iconify-icon icon="octicon:info-24" class="menu-icon"></iconify-icon>
                    <span>Terms & Conditions</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="./company.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Company</a>
                    </li>
                    <li>
                        <a href="./company.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Notification</a>
                    </li>
                    <li>
                        <a href="./notification-alert.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Notification Alert</a>
                    </li>
                    <li>
                        <a href="./theme.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Theme</a>
                    </li>
                    <li>
                        <a href="./currencies.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Currencies</a>
                    </li>
                    <li>
                        <a href="./language.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Languages</a>
                    </li>
                    <li>
                        <a href="./payment-gateway.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Payment Gateway</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- ..::  header area end ::.. -->

<main class="dashboard-main" id="ltrMain">

    <!-- ..::  navbar start ::.. -->
    <div class="navbar-header">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-4">
                    <button type="button" class="sidebar-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                        <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                    </button>
                    <button type="button" class="sidebar-mobile-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                    </button>
                    <form class="navbar-search">
                        <input type="text" name="search" placeholder="Search">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                    <div class="dropdown d-none d-sm-inline-block">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/lang-flag.png" alt="image"
                                 class="w-24 h-24 object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Choose Your Language
                                    </h6>
                                </div>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">
                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="english">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/flags/flag1.png"
                                                     alt=""
                                                     class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">English</span>
                                            </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="english1"
                                           checked>
                                </div>

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="japan">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/flags/flag2.png"
                                                     alt=""
                                                     class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">uvfd</span>
                                            </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="japan1">
                                </div>
                            </div>
                        </div>
                    </div><!-- Language dropdown end -->

                    <div class="dropdown">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                            <div
                                class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Message</h6>
                                </div>
                                <span
                                    class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-3.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-4.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px  bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">2</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-5.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-6.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-7.png"
                                                     alt="">
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                    </div>
                                </a>

                            </div>
                            <div class="text-center py-12 px-16">
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                    Message</a>
                            </div>
                        </div>
                    </div><!-- Message dropdown end -->

                    <div class="dropdown">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                            <div
                                class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
                                </div>
                                <span
                                    class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <iconify-icon icon="bitcoin-icons:verify-outline"
                                                              class="icon text-xxl"></iconify-icon>
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Congratulations</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile
                                                has been Verified. Your profile has been Verified</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-1.png"
                                                     alt="">
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Ronald Richards</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can
                                                stitch between artboards</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                AM
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Arlene McCoy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="https://laravel.wowdash.wowtheme7.com/assets/images/notification/profile-2.png"
                                                     alt="">
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Annette Black</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                   class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                DR
                                            </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Darlene Robertson</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>
                            </div>

                            <div class="text-center py-12 px-16">
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                    Notification</a>
                            </div>

                        </div>
                    </div><!-- Notification dropdown end -->

                    <div class="dropdown">
                        <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/user.png" alt="image"
                                 class="w-40-px h-40-px object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-2">Shaidul Islam</h6>
                                    <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                </div>
                                <button type="button" class="hover-text-danger">
                                    <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                </button>
                            </div>
                            <ul class="to-top-list">
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                       href="https://laravel.wowdash.wowtheme7.com/users/view-profile">
                                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                       href="https://laravel.wowdash.wowtheme7.com/email">
                                        <iconify-icon icon="tabler:message-check"
                                                      class="icon text-xl"></iconify-icon> Inbox
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                       href="./company.html">
                                        <iconify-icon icon="icon-park-outline:setting-two"
                                                      class="icon text-xl"></iconify-icon> Setting
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                       href="javascript:void(0)">
                                        <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log
                                        Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Profile dropdown end -->
                </div>
            </div>
        </div>
    </div> <!-- ..::  navbar end ::.. -->
    <div class="dashboard-main-body">

        <!-- ..::  breadcrumb  start ::.. -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Faq</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
"
                       class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Faq</li>
            </ul>
        </div> <!-- ..::  header area end ::.. -->


        <div class="card basic-data-table">
            <div class="card-header p-0 border-0">
                <div class="responsive-padding-40-150 bg-light-pink">
                    <div class="row gy-4 align-items-center">
                        <div class="col-xl-7">
                            <h4 class="mb-20">Frequently asked questions.</h4>
                            <p class="mb-0 text-secondary-light max-w-634-px text-xl">Lorem Ipsum is simply dummy
                                text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard du text ever since the 1500s, when an unkn</p>
                        </div>
                        <div class="col-xl-5 d-xl-block d-none">
                            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/faq-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body bg-base responsive-padding-40-150">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="active-text-tab nav flex-column nav-pills bg-base shadow py-0 px-24 radius-12 border"
                             id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom active"
                                id="v-pills-about-us-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about-us"
                                type="button" role="tab" aria-controls="v-pills-about-us" aria-selected="true">About
                                Us</button>
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom"
                                id="v-pills-ux-ui-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ux-ui"
                                type="button" role="tab" aria-controls="v-pills-ux-ui" aria-selected="false">UX UI
                                Design</button>
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom"
                                id="v-pills-development-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-development" type="button" role="tab"
                                aria-controls="v-pills-development" aria-selected="false">Development</button>
                            <button
                                class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16 border-bottom"
                                id="v-pills-use-case-tab" data-bs-toggle="pill" data-bs-target="#v-pills-use-case"
                                type="button" role="tab" aria-controls="v-pills-use-case" aria-selected="false">How
                                to can i use WowDash? </button>
                            <button class="nav-link text-secondary-light fw-semibold text-xl px-0 py-16"
                                    id="v-pills-use-agency-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-use-agency" type="button" role="tab"
                                    aria-controls="v-pills-use-agency" aria-selected="false">Can I use my
                                agency?</button>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-about-us" role="tabpanel"
                                 aria-labelledby="v-pills-about-us-tab" tabindex="0">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFive" aria-expanded="false"
                                                    aria-controls="collapseFive">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseSix" aria-expanded="false"
                                                    aria-controls="collapseSix">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-ux-ui" role="tabpanel"
                                 aria-labelledby="v-pills-ux-ui-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleTwo">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-1"
                                                    aria-expanded="true" aria-controls="c-1">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-1" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-2"
                                                    aria-expanded="false" aria-controls="c-2">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-2" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-3"
                                                    aria-expanded="false" aria-controls="c-3">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-3" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-4"
                                                    aria-expanded="false" aria-controls="c-4">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-4" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-5"
                                                    aria-expanded="false" aria-controls="c-5">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-5" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-6"
                                                    aria-expanded="false" aria-controls="c-6">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-6" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleTwo">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-development" role="tabpanel"
                                 aria-labelledby="v-pills-development-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleThree">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-7"
                                                    aria-expanded="true" aria-controls="c-7">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-7" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-8"
                                                    aria-expanded="false" aria-controls="c-8">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-8" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-9"
                                                    aria-expanded="false" aria-controls="c-9">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-9" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-10"
                                                    aria-expanded="false" aria-controls="c-10">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-10" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-11"
                                                    aria-expanded="false" aria-controls="c-11">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-11" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-12"
                                                    aria-expanded="false" aria-controls="c-12">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-12" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleThree">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-use-case" role="tabpanel"
                                 aria-labelledby="v-pills-use-case-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleFour">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-13"
                                                    aria-expanded="true" aria-controls="c-13">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-13" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-14"
                                                    aria-expanded="false" aria-controls="c-14">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-14" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-15"
                                                    aria-expanded="false" aria-controls="c-15">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-15" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-16"
                                                    aria-expanded="false" aria-controls="c-16">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-16" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-17"
                                                    aria-expanded="false" aria-controls="c-17">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-17" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-18"
                                                    aria-expanded="false" aria-controls="c-18">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-18" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFour">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-use-agency" role="tabpanel"
                                 aria-labelledby="v-pills-use-agency-tab" tabindex="0">
                                <div class="accordion" id="accordionExampleFIve">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-19"
                                                    aria-expanded="true" aria-controls="c-19">
                                                Is there a free trial available?
                                            </button>
                                        </h2>
                                        <div id="c-19" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-20"
                                                    aria-expanded="false" aria-controls="c-20">
                                                Can I change my plan later?
                                            </button>
                                        </h2>
                                        <div id="c-20" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-21"
                                                    aria-expanded="false" aria-controls="c-21">
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="c-21" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-22"
                                                    aria-expanded="false" aria-controls="c-22">
                                                Can other info be added to an invoice?
                                            </button>
                                        </h2>
                                        <div id="c-22" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-23"
                                                    aria-expanded="false" aria-controls="c-23">
                                                How does billing work?
                                            </button>
                                        </h2>
                                        <div id="c-23" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-primary-light text-xl collapsed"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#c-24"
                                                    aria-expanded="false" aria-controls="c-24">
                                                How do I change my account email?
                                            </button>
                                        </h2>
                                        <div id="c-24" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionExampleFIve">
                                            <div class="accordion-body">
                                                Yes, you can try us for free for 30 days. If you want, we’ll provide
                                                you with a free, personalized 30-minute onboarding call to get you
                                                up and running as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- ..::  footer  start ::.. -->
    <footer class="d-footer">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
            </div>
            <div class="col-auto">
                <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
            </div>
        </div>
    </footer> <!-- ..::  footer area end ::.. -->

</main>

<!-- ..::  scripts  start ::.. -->
<!-- jQuery library js -->
<script src="{{asset('dash/assets/js/lib/jquery-3.7.1.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('dash/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
<!-- Apex Chart js -->
<script src="{{asset('dash/assets/js/lib/apexcharts.min.js')}}"></script>
<!-- Data Table js -->
<script src="{{asset('dash/assets/js/lib/dataTables.min.js')}}"></script>
<!-- Iconify Font js -->
<script src="{{asset('dash/assets/js/lib/iconify-icon.min.js')}}"></script>
<!-- jQuery UI js -->
<script src="{{asset('dash/assets/js/lib/jquery-ui.min.js')}}"></script>
<!-- Vector Map js -->
<script src="{{asset('dash/assets/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
<script src="{{asset('dash/assets/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Popup js -->
<script src="{{asset('dash/assets/js/lib/magnifc-popup.min.js')}}"></script>
<!-- Slick Slider js -->
<script src="{{asset('dash/assets/js/lib/slick.min.js')}}"></script>
<!-- prism js -->
<script src="{{asset('dash/assets/js/lib/prism.js')}}"></script>
<!-- file upload js -->
<script src="{{asset('dash/assets/js/lib/file-upload.js')}}"></script>
<!-- audioplayer -->
<script src="{{asset('dash/assets/js/lib/audioplayer.js')}}"></script>

<!-- main js -->
<script src="{{asset('dash/assets/js/app.js')}}"></script>

<!-- &lt;script&gt;
let table = new DataTable(&quot;#dataTable&quot;);
&lt;/script&gt; -->

<!-- ..::  scripts  end ::.. -->

<script src="{{asset('dash/assets/js/lib/direction.js')}}"></script>

</body>

</html>
