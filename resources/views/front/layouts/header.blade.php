<style>
    #products-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
    }

    .product-card {
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 250px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .product-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .product-card p {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .product-card .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    .product-card .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
<header id="header" class=" typeheader-1">

    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-7 col-md-8 col-sm-6 col-xs-4">
                    <div class="hidden-md hidden-sm hidden-xs welcome-msg">Welcome to SuperMarket! Wrap new
                        offers / gift every single day on Weekends - New Coupon code: <span>Happy2018</span>
                    </div>
                    <ul class="top-link list-inline hidden-lg ">
                        <li class="account" id="my_account">
                            @if (auth_user())
                                <a href="{{route('user_')}}" title="My Account " class="btn-xs dropdown-toggle"
                                    data-toggle="dropdown">
                                    <span class="hidden-xs">My Account </span> <span class="fa fa-caret-down"></span>
                                </a>
                            @endif

                            <ul class="dropdown-menu ">
                                <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
                                <li><a href="{{route('login')}}"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="header-top-right collapsed-block col-lg-5 col-md-4 col-sm-6 col-xs-8">
                    <ul class="top-link list-inline lang-curr">
                        <li class="currency">
                            <div class="btn-group currencies-block">
                                <form action="index.html" method="post" enctype="multipart/form-data" id="currency">
                                    <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                        <span class="icon icon-credit "></span> $ US Dollar <span
                                            class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu btn-xs">
                                        <li><a href="#">(€)&nbsp;Euro</a></li>
                                        <li><a href="#">(£)&nbsp;Pounds </a></li>
                                        <li><a href="#">($)&nbsp;US Dollar </a></li>
                                    </ul>
                                </form>
                            </div>
                        </li>
                        <li class="language">
                            <div class="btn-group languages-block ">

                                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                    {{-- {{asset('front/image/catalog/flags/gb.png')}} --}}
                                    @if (app()->getLocale() === 'ar')
                                        <img src="{{ asset('front/image/catalog/flags/ar.png') }} "
                                            alt="{{ app()->getLocale() }}" title="{{ app()->getLocale() }}">
                                    @else
                                        <img src="{{ asset('front/image/catalog/flags/gb.png') }} "
                                            alt="{{ app()->getLocale() }}" title="{{ app()->getLocale() }}">
                                    @endif

                                    <span class="">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                                    <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                @if ($localeCode == 'ar')
                                                    <img class="image_flag"
                                                        src="{{ asset('front/image/catalog/flags/ar.png') }}"
                                                        alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}" />
                                                @else
                                                    <img class="image_flag"
                                                        src="{{ asset('front/image/catalog/flags/gb.png') }}"
                                                        alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}" />
                                                @endif


                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>


                            </div>

                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->

    <!-- Header center -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="logo"><a href="{{ route('home.index') }}"><img
                                src="{{ asset('front/image/catalog/logo.png') }}" title="Your Store"
                                alt="Your Store" /></a></div>
                </div>
                <!-- //end Logo -->


                <!-- Search -->
                <div class="col-lg-7 col-md-6 col-sm-5">
                    <div class="search-header-w">
                        <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i>
                        </div>

                        <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                            <form method="GET" action="{{route('search')}}" id="search-form">
                                @csrf
                                <div id="search0" class="search input-group form-group">
                                    <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                        <select class="no-border" name="category_id" id="category_id">
                                            <option value="0">All Categories</option>
                                            @foreach (get_models('Category', ['active' => '1']) as $row)
                                                <option value="{{ $row->slug }}">{{ $row->name() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="autosearch-input form-control" type="text" value="" size="50"
                                        autocomplete="off" placeholder="Keyword here..." name="search"
                                        id="search-input">
                                    <button type="submit" class="button-search btn btn-primary" name="submit_search"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </form>
                            <div id="products-list"></div>
                        </div>
                    </div>
                </div>
                <!-- //end Search -->
                <div class="middle-right col-lg-3 col-md-3 col-sm-3">
                    <!--cart-->
                    <div class="shopping_cart">
                        <div id="cart" class="btn-shopping-cart">

                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="true">
                                <div class="shopcart">
                                    <span class="icon-c">
                                        <i class="fa fa-shopping-bag"></i>
                                    </span>
                                    <div class="shopcart-inner">
                                        <p class="text-shopping-cart">

                                            My cart
                                        </p>

                                        <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart">{{ Cart::count() ?? 0 }}</span><span
                                                class="items_cart2">
                                                item(s)</span><span class="items_carts">



                                            </span>
                                        </span>


                                    </div>
                                </div>
                            </a>

                            <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                <li>
                                    <table class="table table-striped">
                                        <tbody>

                                            @foreach (Cart::content() as $row)

                                                <tr>
                                                    <td class="text-center" style="width:70px">
                                                        <a
                                                            href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->model->slug_ar : $row->model->slug_en) }}">
                                                            <img src="{{ asset('storage/' . $row->model?->photo?->filename) }}"
                                                                style="width:70px" alt="Yutculpa ullamcon"
                                                                title="Yutculpa ullamco" class="preview">
                                                        </a>
                                                    </td>
                                                    <td class="text-left"><a class="cart_Product_name"
                                                            href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->model->slug_ar : $row->model->slug_en) }}">{{ app()->getLocale() === 'ar' ? $row->model->name_ar : $row->model->name_en }}</a>
                                                    </td>
                                                    <td class="text-center">x{{$row->qty}}</td>
                                                    <td class="text-center">${{ $row->model->price }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->model->slug_ar : $row->model->slug_en) }}"
                                                            class="fa fa-edit"></a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{route('delete_addTocart', $row->rowId)}}"
                                                            class="fa fa-times fa-delete"></a>
                                                    </td>
                                                </tr>
                                            @endforeach




                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>


                                                <tr>
                                                    <td class="text-left"><strong>Total</strong>
                                                    </td>
                                                    <td class="text-right">$
                                                        {{Cart::subtotal()}}
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>

                                        <p class="text-right"><a class="btn view-cart" href="{{ route('viewCart') }}"><i
                                                    class="fa fa-shopping-cart"></i>View
                                                Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart"
                                                href="{{route('checkout')}}"><i class="fa fa-share"></i>Checkout</a>



                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!--//cart-->

                    <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">

                        <li class="compare hidden-xs"><a href="{{route('user_comparisons')}}" class="top-link-compare"
                                title="Compare "><i class="fa fa-refresh"></i></a>
                        </li>
                        <li class="wishlist hidden-xs"><a href="{{ route('user_wishlists') }}" id="wishlist-total"
                                class="top-link-wishlist" title="Wish List (0) "><i class="fa fa-heart"></i></a>
                        </li>

                    </ul>


                </div>

            </div>

        </div>
    </div>
    <!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="row">


                <!-- Main menu -->
                <div class="col-lg-2"></div>
                <div class="main-menu-w col-lg-10 col-md-9">
                    <div class="responsive so-megamenu megamenu-style-dev">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal open ">
                                <div class="navbar-header">
                                    <button type="button" id="show-megamenu" data-toggle="collapse"
                                        class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="container-mega">
                                            <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="home hover">
                                                    <a href="{{ route('home.index') }}">Home</a>

                                                </li>
                                                <li><a class="subcategory_item" href="{{route('aboutsUs')}}">About Us
                                                    </a></li>
                                                <li><a class="subcategory_item" href="{{ route('shop') }}">Shop</a>
                                                </li>

                                                <li class="with-sub-menu hover">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Categories</strong>
                                                        <img class="label-hot"
                                                            src="{{ asset('front/image/catalog/menu/hot-icon.png') }}"
                                                            alt="icon items">

                                                        <b class="caret"></b>
                                                    </a>
                                                    <div class="sub-menu" style="width: 100%; display: none;">

                                                        <div class="content">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        @foreach (\App\Models\Category::where('active', 1)->where('parent_id', null)->orderBy('created_at', 'desc')->take(4)->get() as $row)
                                                                            <div class="col-md-3 img img1">
                                                                                <a
                                                                                    href="{{ route('category', $row->slug) }}"><img
                                                                                        src="{{ asset('front/image/catalog/menu/megabanner/image-1.jpg') }}"
                                                                                        alt="banner1"></a>
                                                                                <a href="{{ route('category', $row->slug) }}"
                                                                                    class="title-submenu">{{ $row->name() }}</a>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 hover-menu">
                                                                                        <div class="menu">
                                                                                            <ul>
                                                                                                @foreach ($row->parents as $app)
                                                                                                    <li><a href="{{ route('category', $app->slug) }}"
                                                                                                            class="main-menu">{{ $app->name() }}</a>
                                                                                                    </li>
                                                                                                @endforeach


                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach


                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>


                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('home.blog') }}" class="clearfix">
                                                        <strong>Blog</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{route('contactUs')}}" class="clearfix">
                                                        <strong>Contact Us</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- //end Main menu -->

                <div class="bottom3">
                    <div class="telephone hidden-xs hidden-sm hidden-md">
                        <ul class="blank">

                            <li>
                                <a href="#"><i class="fa fa-phone-square"></i>
                                    {{ isset(get_settings()['phone']) ? get_settings()['phone'] : ''}}

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="signin-w hidden-md hidden-sm hidden-xs">
                        <ul class="signin-link blank">
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                                <li class="log login"><i class="fa fa-lock"></i> <a class="link-lg"
                                        href="{{auth()->user()->type == "customer" ? route('user_') : route('admin_')}}">Dashboard
                                    </a>
                                </li>
                            @else
                                <li class="log login"><i class="fa fa-lock"></i> <a class="link-lg"
                                        href="{{route('login')}}">Login </a> or <a href="{{route('register')}}">Register</a>
                                </li>
                            @endauth

                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>
<!-- //Header Container  -->

<script>
    var appLocale = "{{ app()->getLocale() }}";
    document.getElementById('search-form').addEventListener('submit', function (event) {
        event.preventDefault();

        let category_id = document.getElementById('category_id').value;
        let search_term = document.getElementById('search-input').value;

        $.get("{{ route('search') }}", {
            category_id: category_id,
            search: search_term
        }, function (data) {
            let productsList = document.getElementById('products-list');
            productsList.innerHTML = '';

            if (data.length > 0) {
                data.forEach(function (product) {
                    let productSlug = appLocale === 'ar' ? product.slug_ar : product.slug_en;

                    let productHTML = `
                        <div class="product-card">
                            <h3>${product.name_en}</h3>
                            <p>${product.description_en}</p>
                            <a href="/${appLocale === 'ar' ? 'ar' : 'en'}/shop/${productSlug}" class="btn btn-primary">View Details</a>
                        </div>
                    `;
                    productsList.innerHTML += productHTML;
                });
            } else {
                productsList.innerHTML = '<p>No products found.</p>';
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log('Error:', textStatus, errorThrown);
            });
    });
</script>