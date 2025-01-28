<aside class="sidebar" id="{{app()->getLocale() == "ar" ? 'rtlSidebar' : 'ltrSidebar'}}"
       style="{{app()->getLocale() == "ar" ? 'direction: rtl;' : null}}">
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
                        <a href="{{route('admin_')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Dashboard</a>
                    </li>

                </ul>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_setting')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Settings</a>
                    </li>

                </ul>
            </li>

            @can('Users')
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
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>crm</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_crm.index')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    crm List</a>
                        </li>


                    </ul>
                </li>
            @endcan

            @can('Brand')
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
            @endcan
            @can('Product')
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="mdi:blog" class="menu-icon"></iconify-icon>
                        <span>Product</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_products.index')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                products </a>
                        </li>

                        <li>
                            <a href="{{route('admin_products.create')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                Add product</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('sliders')
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
            @endcan


            @can('currencies')
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
            @endcan

        @can('Blog')
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
        @endcan


            @can('coupons')
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
            @endcan

            @can('categories')
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
            @endcan



            @can('Reward')
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
            @endcan

            @can('tags')
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>
                        <span>tags</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_tags.index')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                tags</a>
                        </li>

                    </ul>
                </li>
            @endcan

            @can('installments')
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
            @endcan


            @can('advertisement_banners')
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>
                        <span>advertisement banners</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_advertisement_banners.index')}}"><i
                                    class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                                Advertisement banners</a>
                        </li>

                    </ul>
                </li>
            @endcan

            @can('special_products')
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>special products</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin_special_products.index')}}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            special products</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('role_index')
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>role</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_roles.index')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                role</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('permission_index')
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>permissions</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_permissions.index')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                permissions</a>
                        </li>
                    </ul>
                </li>
            @endcan



            @can('orders')
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>
                        <span>orders</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('admin_orders.index')}}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                Orders</a>
                        </li>

                    </ul>
                </li>
            @endcan

            <li>

        </ul>
        </li>
        </ul>
    </div>
</aside>


