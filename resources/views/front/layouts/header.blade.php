<!-- Header Container  -->
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
                            <a href="#" title="My Account " class="btn-xs dropdown-toggle"
                               data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span
                                    class="fa fa-caret-down"></span>
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a href="register.html"><i class="fa fa-user"></i> Register</a></li>
                                <li><a href="login.html"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="header-top-right collapsed-block col-lg-5 col-md-4 col-sm-6 col-xs-8">
                    <ul class="top-link list-inline lang-curr">
                        <li class="currency">
                            <div class="btn-group currencies-block">
                                <form action="index.html" method="post" enctype="multipart/form-data"
                                      id="currency">
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
{{--                                    {{asset('front/image/catalog/flags/gb.png')}}--}}
                                    @if(app()->getLocale() === 'ar')

                                        <img src="{{asset('front/image/catalog/flags/ar.png')}} " alt="{{ app()->getLocale() }}"
                                             title="{{ app()->getLocale() }}">


                                    @else
                                        <img src="{{asset('front/image/catalog/flags/gb.png')}} " alt="{{ app()->getLocale() }}"
                                             title="{{ app()->getLocale() }}">
                                    @endif

                                    <span class="">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                                    <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                @if($localeCode == "ar")
                                                    <img class="image_flag"

                                                         src="{{asset('front/image/catalog/flags/ar.png')}}"
                                                         alt="{{ $properties['native'] }}"
                                                         title="{{ $properties['native'] }}" />

                                                @else
                                                    <img class="image_flag"

                                                         src="{{asset('front/image/catalog/flags/gb.png')}}"
                                                         alt="{{ $properties['native'] }}"
                                                         title="{{ $properties['native'] }}" />
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
                    <div class="logo"><a href="{{route('home.index')}}"><img src="{{asset('front/image/catalog/logo.png')}}"
                                                                title="Your Store"
                                                                alt="Your Store"/></a></div>
                </div>
                <!-- //end Logo -->


                <!-- Search -->
                <div class="col-lg-7 col-md-6 col-sm-5">
                    <div class="search-header-w">
                        <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i>
                        </div>

                        <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                            <form method="GET" action="index.html">
                                <div id="search0" class="search input-group form-group">
                                    <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                        <select class="no-border" name="category_id">
                                            <option value="0">All Categories</option>

                                            @foreach(get_models('Category',['active'=>'1']) as $row)
                                                <option value="{{$row->slug}}">{{$row->name()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="autosearch-input form-control" type="text" value="" size="50"
                                           autocomplete="off" placeholder="Keyword here..." name="search">
                                    <button type="submit" class="button-search btn btn-primary"
                                            name="submit_search"><i class="fa fa-search"></i></button>
                                </div>
                                <input type="hidden" name="route" value="product/search"/>
                            </form>
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
                                                    <span class="items_cart">02</span><span class="items_cart2">
                                                        item(s)</span><span class="items_carts">( $162.00 )</span>
                                                </span>
                                    </div>
                                </div>
                            </a>

                            <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                <li>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html">
                                                    <img src="{{asset('front/image/catalog/demo/product/80/1.jpg')}}"
                                                         style="width:70px" alt="Yutculpa ullamcon"
                                                         title="Yutculpa ullamco" class="preview">
                                                </a>
                                            </td>
                                            <td class="text-left"><a class="cart_product_name"
                                                                     href="product.html">Yutculpa ullamco</a>
                                            </td>
                                            <td class="text-center">x1</td>
                                            <td class="text-center">$80.00</td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('2');"
                                                   class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html">
                                                    <img src="{{asset('front/image/catalog/demo/product/80/2.jpg')}}"
                                                         style="width:70px" alt="Xancetta bresao"
                                                         title="Xancetta bresao" class="preview">
                                                </a>
                                            </td>
                                            <td class="text-left"><a class="cart_product_name"
                                                                     href="product.html">Xancetta bresao</a>
                                            </td>
                                            <td class="text-center">x1</td>
                                            <td class="text-center">$60.00</td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('1');"
                                                   class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Sub-Total</strong>
                                                </td>
                                                <td class="text-right">$140.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                </td>
                                                <td class="text-right">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>VAT (20%)</strong>
                                                </td>
                                                <td class="text-right">$20.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong>
                                                </td>
                                                <td class="text-right">$162.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-right"><a class="btn view-cart" href="cart.html"><i
                                                    class="fa fa-shopping-cart"></i>View
                                                Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart"
                                                                              href="checkout.html"><i
                                                    class="fa fa-share"></i>Checkout</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!--//cart-->

                    <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">
                        <li class="compare hidden-xs"><a href="#" class="top-link-compare" title="Compare "><i
                                    class="fa fa-refresh"></i></a>
                        </li>
                        <li class="wishlist hidden-xs"><a href="#" id="wishlist-total" class="top-link-wishlist"
                                                          title="Wish List (0) "><i class="fa fa-heart"></i></a>
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
                                            <ul class="megamenu" data-transition="slide"
                                                data-animationtime="250">
                                                <li class="home hover">
                                                    <a href="{{route('home.index')}}">Home</a>

                                                </li>
                                                <li><a class="subcategory_item" href="about-us-2.html">About Us
                                                    </a></li>
                                                <li><a class="subcategory_item" href="shop.html">Shop</a></li>

                                                <li class="with-sub-menu hover">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Categories</strong>
                                                        <img class="label-hot"
                                                             src="{{asset('front/image/catalog/menu/hot-icon.png')}}"
                                                             alt="icon items">

                                                        <b class="caret"></b>
                                                    </a>
                                                    <div class="sub-menu" style="width: 100%; display: none;">

                                                        <div class="content">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-3 img img1">
                                                                            <a href="category-v2.html"><img
                                                                                    src="{{asset('front/image/catalog/menu/megabanner/image-1.jpg')}}"
                                                                                    alt="banner1"></a>
                                                                        </div>
                                                                        <div class="col-md-3 img img2">
                                                                            <a href="category-v2.html"><img
                                                                                    src="{asset{(front/'')}}{{asset('front/image/catalog/menu/megabanner/image-2.jpg')}}"
                                                                                    alt="banner2"></a>
                                                                        </div>
                                                                        <div class="col-md-3 img img3">
                                                                            <a href="category-v2.html"><img
                                                                                    src="{{asset('front/image/catalog/menu/megabanner/image-3.jpg')}}"
                                                                                    alt="banner3"></a>
                                                                        </div>
                                                                        <div class="col-md-3 img img4">
                                                                            <a href="category-v2.html"><img
                                                                                    src="{{asset('front/image/catalog/menu/megabanner/image-4.jpg')}}"
                                                                                    alt="banner4"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a href="category-v2.html"
                                                                       class="title-submenu">Automotive</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Car
                                                                                            Alarms and
                                                                                            Security</a></li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Car
                                                                                            Audio &amp;
                                                                                            Speakers</a></li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Gadgets
                                                                                            &amp; Auto Parts</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">More
                                                                                            Car Accessories</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="category-v2.html"
                                                                       class="title-submenu">Funitures</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Bathroom</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Bedroom</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Decor</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Living
                                                                                            room</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="category-v2.html"
                                                                       class="title-submenu">Jewelry &amp;
                                                                        Watches</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Earings</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Wedding
                                                                                            Rings</a></li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Men
                                                                                            Watches</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="category-v2.html"
                                                                       class="title-submenu">Electronics</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Computer</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Smartphone</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Tablets</a>
                                                                                    </li>
                                                                                    <li><a href="category-v2.html"
                                                                                           class="main-menu">Monitors</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>


                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{route('home.blog')}}" class="clearfix">
                                                        <strong>Blog</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="contact.html" class="clearfix">
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
                            <li><a href="#"><i class="fa fa-truck"></i>track your order</a></li>
                            <li><a href="#"><i class="fa fa-phone-square"></i>Hotline (+123)4 567 890</a></li>
                        </ul>
                    </div>
                    <div class="signin-w hidden-md hidden-sm hidden-xs">
                        <ul class="signin-link blank">
                            <li class="log login"><i class="fa fa-lock"></i> <a class="link-lg"
                                                                                href="login.html">Login </a> or <a
                                    href="register.html">Register</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>
<!-- //Header Container  -->
