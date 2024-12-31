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
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Invoice</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-list.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            List</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-preview.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Preview</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-add.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>--}}
{{--                            Add new</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-edit.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Edit</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <i class="ri-robot-2-line"></i>--}}
{{--                    <span>Ai Application</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./textgenerator.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Text Generator</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./codegenerator.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Code Generator</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./imagegenerator.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>--}}
{{--                            Image Generator</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./voicegenerator.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Voice Generator</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./videogenerator.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>--}}
{{--                            Video Generator</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="sidebar-menu-group-title">UI Elements</li>--}}

{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Components</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./typography.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Typography</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./colors.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Colors</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./button.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>--}}
{{--                            Button</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./dropdown.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i>--}}
{{--                            Dropdown</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./alert.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Alerts</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./card.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Card</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./carousel.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>--}}
{{--                            Carousel</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./avatar.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>--}}
{{--                            Avatars</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./progress.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Progress bar</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./tabs.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Tab & Accordion</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./pagination.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Pagination</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./badges.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>--}}
{{--                            Badges</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./tooltip.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i>--}}
{{--                            Tooltip & Popover</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./videos.html"><i class="ri-circle-fill circle-icon text-cyan w-auto"></i>--}}
{{--                            Videos</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./starrating.html"><i class="ri-circle-fill circle-icon text-indigo w-auto"></i>--}}
{{--                            Star Ratings</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./tags.html"><i class="ri-circle-fill circle-icon text-purple w-auto"></i>--}}
{{--                            Tags</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./list.html"><i class="ri-circle-fill circle-icon text-red w-auto"></i>--}}
{{--                            List</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./calendar.html"><i class="ri-circle-fill circle-icon text-yellow w-auto"></i>--}}
{{--                            Calendar</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./radio.html"><i class="ri-circle-fill circle-icon text-orange w-auto"></i>--}}
{{--                            Radio</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./switch.html"><i class="ri-circle-fill circle-icon text-pink w-auto"></i>--}}
{{--                            Switch</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./imageupload.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Upload</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Forms</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./form.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Input Forms</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./form-layout.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Input Layout</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./form-validation.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>--}}
{{--                            Form Validation</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./wizard.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>--}}
{{--                            Form Wizard</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Table</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./tablebasic.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>--}}
{{--                            Basic Table</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./tabledata.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>--}}
{{--                            Data Table</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
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
