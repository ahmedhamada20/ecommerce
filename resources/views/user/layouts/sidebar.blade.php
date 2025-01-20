<aside class="sidebar" id="{{app()->getLocale() == "ar" ? 'rtlSidebar' : 'ltrSidebar'}}"
       style="{{app()->getLocale() == "ar" ? 'direction: rtl;' : null}}">
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
                        <a href="{{route('user_')}}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            User Panel</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-group-title">Application</li>

            <li>
                <a href="{{route('user_orders')}}">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a href="{{route('user_profile')}}">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>user profile</span>
                </a>
            </li>

{{--            <li>--}}
{{--                <a href="./calendar.html">--}}
{{--                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Calendar</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./kanban.html">--}}
{{--                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Kanban</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Invoice</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-list.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-preview.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Preview</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-add.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add new</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="./invoice-edit.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Edit</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="sidebar-menu-group-title">UI Elements</li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>--}}
{{--                    <span>Users</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="./view-profile.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> View Profile</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="sidebar-menu-group-title">Application</li>--}}


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
{{--                        <a href="./payment-gateway.html"><i--}}
{{--                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Payment Gateway</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </div>
</aside>
