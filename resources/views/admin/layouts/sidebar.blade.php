<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="https://laravel.wowdash.wowtheme7.com/dashboard/index" class="sidebar-logo">
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
                        <a href="{{route('admin_')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Dashboard</a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_users.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Users List</a>
                    </li>


                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Brand</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_brands.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            brands</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>sliders</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_sliders.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            sliders</a>
                    </li>

                </ul>
            </li>
{{--            --}}
{{--            --}}
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>currencies</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_currencies.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            currencies</a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:blog" class="menu-icon"></iconify-icon>
                    <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_blogs.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                           blogs</a>
                    </li>

                    <li>
                        <a href="{{route('admin_blogs.create')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                           Add blogs</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>coupons</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_coupons.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            coupons</a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-robot-2-line"></i>
                    <span>categories</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_categories.index')}}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                           All categories</a>
                    </li>
                    <li>
                        <a href="{{route('admin_categories.create')}}"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add new category</a>
                    </li>

                </ul>
            </li>



            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Reward</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_rewards.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Reward</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>
                    <span>tags</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_tags.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            tags</a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                    <span>installments</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_installments.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            installments</a>
                    </li>

                </ul>
            </li>
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Chart</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./linechart.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Line Chart</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./columnchart.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Column Chart</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./piechart.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>--}}
{{--                            Pie Chart</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./widgets.html">--}}
{{--                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Widgets</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="sidebar-menu-group-title">Application</li>--}}

{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Authentication</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./signin.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Sign In</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./signup.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Sign Up</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./forgotpassword.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>--}}
{{--                            Forgot Password</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./gallery.html">--}}
{{--                    <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Gallery</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./pricing.html">--}}
{{--                    <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Pricing</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./faq.html">--}}
{{--                    <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>--}}
{{--                    <span>FAQs.</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./error.html">--}}
{{--                    <iconify-icon icon="streamline:straight-face" class="menu-icon"></iconify-icon>--}}
{{--                    <span>404</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./termscondition.html">--}}
{{--                    <iconify-icon icon="octicon:info-24" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Terms & Conditions</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Settings</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./company.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Company</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./company.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Notification</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./notification-alert.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>--}}
{{--                            Notification Alert</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./theme.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Theme</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./currencies.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Currencies</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./language.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Languages</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./payment-gateway.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Payment Gateway</a>--}}
{{--                    </li>--}}
        </ul>
        </li>
        </ul>
    </div>
</aside>
