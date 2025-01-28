@extends('front.layouts.master')
@section('title')
@if(isset(get_settings()['website_name']) && isset(json_decode(get_settings()['website_name'], true)[app()->getLocale()]))
    {{ json_decode(get_settings()['website_name'], true)[app()->getLocale()] }}
@else
    Home
@endif

@endsection
@section('css')

@endsection
@section('content')

<!-- Main Container  -->
<div class="main-container container">
    <div id="content">
        <div class="content-top-w">
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 main-left display-3">
                <nav class="navbar-default">

                    <div class="container-megamenu vertical">
                        <div id="menuHeading">
                            <div class="megamenuToogle-wrapper">
                                <div class="megamenuToogle-pattern">
                                    <div class="container">
                                        <div>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        All Categories
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="navbar-header">
                            <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
                                <i class="fa fa-bars"></i>
                                <span> All Categories </span>
                            </button>
                        </div>
                        <div class="vertical-wrapper">
                            <span id="remove-verticalmenu" class="fa fa-times"></span>
                            <div class="megamenu-pattern">
                                <div class="container-mega">
                                    <ul class="megamenu">

                                        @foreach(get_models('Category', ['active' => '1']) as $row)
                                            <li class="item-vertical  with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="#" class="clearfix">
                                                    <!--@if($row->photo)-->
                                                    <!--    <img src="{{asset('storage/' . $row->photo->filename)}}" width="50px"-->
                                                    <!--        height="50px" alt="icon">-->
                                                    <!--@endif-->
                                                    <img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico10.png" alt="icon">

                                                    <span>{{$row->name()}}</span>

                                                </a>

                                            </li>
                                        @endforeach

                                        <li class="loadmore">
                                            <i class="fa fa-plus-square-o"></i>
                                            <span class="more-view">More Categories</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 main-right">
                <div class="slider-container row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 col2 carosoul-3">
                        <div class="module sohomepage-slider ">
                            <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no"
                                data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1"
                                data-items_column0="1" data-items_column1="1" data-items_column2="1"
                                data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes"
                                data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                @foreach(get_models('Slider', ['is_active' => 1]) as $row)
                                    @if($row->photo)
                                        <div class="yt-content-slide">
                                            <a href="#"><img src="{{asset('storage/' . $row->photo->filename)}}" alt="slider1"
                                                    class="img-responsive"></a>
                                        </div>
                                    @endif
                                @endforeach


                            </div>

                            <div class="loadeding"></div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col3">
                        <div class="module product-simple extra-layout1">
                            <h3 class="modtitle">
                                <span>Best Selling</span>
                            </h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_1" class="so-extraslider">
                                    <!-- Begin extraslider-inner -->
                                    <div class="yt-content-slider extraslider-inner" data-rtl="yes"
                                        data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6"
                                        data-margin="0" data-items_column00="1" data-items_column0="1"
                                        data-items_column1="1" data-items_column2="1" data-items_column3="1"
                                        data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no"
                                        data-buttonpage="top">

                                        <div class="item ">
                                            @foreach ($products as $row)
                                                                                        <div class="product-layout item-inner style1 ">
                                                                                            <div class="item-image">
                                                                                                <div class="item-img-info">
                                                                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                                                                        target="_self" title="{{$row->name()}} ">
                                                                                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}"
                                                                                                            alt="{{$row->name()}}">
                                                                                                    </a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="item-info">
                                                                                                <div class="item-title">
                                                                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                                                                        target="_self" title="{{$row->name()}}">{{$row->name()}}
                                                                                                    </a>
                                                                                                </div>
                                                                                                <div class="rating">
                                                                                                    @php
                                                                                                        $rating = $row->commentable->count();
                                                                                                        $totalStars = 5;
                                                                                                    @endphp

                                                                                                    @for ($i = 1; $i <= $totalStars; $i++)
                                                                                                        <span class="fa fa-stack">
                                                                                                            <i
                                                                                                                class="fa fa-star fa-stack-2x {{ $i <= $rating ? '' : 'fa-star-o' }}"></i>
                                                                                                        </span>
                                                                                                    @endfor
                                                                                                </div>
                                                                                                <div class="content_price price">
                                                                                                    <span class="price-new product-price">${{$row->price}}
                                                                                                    </span>&nbsp;&nbsp;

                                                                                                    <span class="price-old">${{$row->discount_price}} </span>&nbsp;

                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- End item-info -->
                                                                                            <!-- End item-wrap-inner -->
                                                                                        </div>
                                            @endforeach
                                        </div>


                                    </div>
                                    <!--End extraslider-inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row content-main-w">

            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 main-left">

                <div class="module">
                    <div class="banners banners2">
                        <div class="banner">
                            <!--<a href="#"><img src="{{asset('banner')}}" alt="image"></a>-->
                            <a href="#"><img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner1.jpg" alt="image"></a>
                        </div>
                    </div>
                </div>

                <div class="module product-simple extra-layout1">
                    <h3 class="modtitle">
                        <span>Latest Products</span>
                    </h3>
                    <div class="modcontent">
                        <div id="so_extra_slider_1" class="so-extraslider">
                            <!-- Begin extraslider-inner -->
                            <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes"
                                data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0"
                                data-items_column00="1" data-items_column0="1" data-items_column1="1"
                                data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no"
                                data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                <div class="item ">
                                    @foreach ($products as $row)
                                                                        <div class="product-layout item-inner style1 ">
                                                                            <div class="item-image">
                                                                                <div class="item-img-info">
                                                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                                                        target="_self" title="{{$row->name()}} ">
                                                                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}"
                                                                                            alt="{{$row->name()}}">
                                                                                    </a>
                                                                                </div>

                                                                            </div>
                                                                            <div class="item-info">
                                                                                <div class="item-title">
                                                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                                                        target="_self" title="{{$row->name()}}">{{$row->name()}}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="rating">
                                                                                    @php
                                                                                        $rating = $row->commentable->count();
                                                                                        $totalStars = 5;
                                                                                    @endphp

                                                                                    @for ($i = 1; $i <= $totalStars; $i++)
                                                                                        <span class="fa fa-stack">
                                                                                            <i
                                                                                                class="fa fa-star fa-stack-2x {{ $i <= $rating ? '' : 'fa-star-o' }}"></i>
                                                                                        </span>
                                                                                    @endfor
                                                                                </div>
                                                                                <div class="content_price price">
                                                                                    <span class="price-new product-price">${{$row->price}}
                                                                                    </span>&nbsp;&nbsp;

                                                                                    <span class="price-old">${{$row->discount_price}} </span>&nbsp;

                                                                                </div>
                                                                            </div>
                                                                            <!-- End item-info -->
                                                                            <!-- End item-wrap-inner -->
                                                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>

                <div class="module">
                    <div class="policy-w">
                        @if (latest_banners()->photo)
                        <!--<a href="#"><img src="{{asset('storage/' . latest_banners()->photo?->filename)}}" alt="image"></a>-->
                        <a href="#"><img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/call-us.jpg" alt="image"></a>
                    @endif

                    </div>
                </div>

                <div class="module extra" style="margin-top:20px;">
                    <h3 class="modtitle">
                        <span>Recommended</span>
                    </h3>
                    <div class="modcontent">
                        <div id="so_extra_slider_1" class="so-extraslider">
                            <!-- Begin extraslider-inner -->
                            <div class="products-list yt-content-slider extraslider-inner" data-rtl="yes"
                                data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0"
                                data-items_column00="1" data-items_column0="1" data-items_column1="1"
                                data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no"
                                data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">

                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Duis aute irure ">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/e10.jpg')}}"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/e7.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="rating"> <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Duis aute irure </a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$48.00</span>

                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">

                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Excepteur sint occ">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/f5.jpg')}}"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/f6.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="rating"> <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Excepteur sint occ</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$90.00</span>

                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">

                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Cenison meatloa">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/e3.jpg')}}"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/e4.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="rating"> <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Cenison meatloa</a></h4>

                                                </div>
                                                <p class="price">$42.00</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>

                <div class="module so-latest-blog blog-sidebar">

                    <h3 class="modtitle"><span>Latest Blogs</span></h3>
                    <div class="modcontent clearfix">

                        <div class="so-blog-external buttom-type1 button-type1">
                            <div class="blog-external-simple">
                                <div class="cat-wrap">
                                    <div class="media">

                                        @if (latest_blogs())
	                                <div class="item item-1">
	                                    <div class="media-left">
	                                        @if(latest_blogs())
	                                            <a href="{{route('home.blog_detail', latest_blogs()->slug)}}"
	                                                target="_self">
	                                                <img src="{{asset('storage/' . latest_blogs()->photo?->filename)}}"
	                                                    alt="Biten demons lector in henderit in vulp"
	                                                    class="media-object">
	                                            </a>
	                                        @endif
	                                    </div>
	                                    <div class="media-body">
	                                        <h4 class="media-heading">
	                                            <a href="{{route('home.blog_detail', latest_blogs()->slug)}}"
	                                                title="{{latest_blogs()->name()}}"
	                                                target="_self">{{latest_blogs()->name()}}
	                                            </a>
	                                        </h4>
	                                        <div class="media-content">
	
	                                            <div class="media-date-added"><i class="fa fa-calendar"></i>
	                                                @php
	                                                    $date = \Carbon\Carbon::parse(latest_blogs()->updated_at);
	                                                @endphp
	                                                <b>{{ $date->format('d') }}</b> {{ $date->format('M') }}
	                                            </div>
	                                            <div class="media-subcontent">
	                                                <span class="media-comment"><i
	                                                        class="fa fa-comments"></i>{{latest_blogs()->count_comments}}
	                                                    Comment</span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
                                        @endif


                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                {{--
                <div class="module testimonials">
                    <h3 class="modtitle"><span>Testimonials</span></h3>
                    <div class="slider-testimonials">
                        <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no"
                            data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0"
                            data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"
                            data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes"
                            data-lazyload="yes" data-hoverpause="yes">
                            <div class="item">
                                <div class="img"><img src="{{asset('front/image/catalog/demo/client/user-1.jpg')}}"
                                        alt="Image">
                                </div>
                                <div class="name">Johny Walker</div>
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore”</p>
                            </div>
                            <div class="item">
                                <div class="img"><img src="{{asset('front/image/catalog/demo/client/user-2.jpg')}}"
                                        alt="Image">
                                </div>
                                <div class="name">Jen Nguyen</div>
                                <p>“Ut enim ad minim veniam, lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Sed do eiusmod tempor incidi”</p>
                            </div>
                            <div class="item">
                                <div class="img"><img src="{{asset('front/image/catalog/demo/client/user-3.jpg')}}"
                                        alt="Image">
                                </div>
                                <div class="name">Vin Jame</div>
                                <p>“sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, lorem
                                    ipsum dolor sit amet, consectetur adip”</p>
                            </div>
                        </div>
                    </div>
                </div> --}}


                <!--<div class="module">-->
                <!--    <div class="banners banners5">-->
                <!--        <div class="banner">-->
                <!--            @if (latest_banners()->photo)-->
                <!--            <a href="#"><img src="{{asset('storage/' . latest_banners()->photo?->filename)}}" alt="image"></a>-->
                <!--        @endif-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 main-right">


                <!--<div class="static-cates">-->
                <!--    <ul>-->
                <!--        @foreach (get_models('Category', ['active' => '1']) as $row)-->
                <!--            @if($row->photo)-->
                <!--                <li>-->
                <!--                    <a href="{{ route('category', $row->slug) }}"><img-->
                <!--                            src="{{asset('storage/' . $row->photo->filename)}}" alt="image"></a>-->
                <!--                </li>-->
                <!--            @endif-->
                <!--        @endforeach-->


                <!--    </ul>-->
                <!--</div>-->

                {{-- <!-- Deals -->
                <div class="module deals-layout1">
                    <div class="head-title">
                        <div class="modtitle">
                            <span>Flash Sale</span>
                            <div class="cslider-item-timer">
                                <div class="product_time_maxprice">

                                    <div class="item-time">
                                        <div class="item-timer">
                                            <div class="defaultCountdown-30"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a class="viewall" href="?route=product/special">View All</a>

                        </div>
                    </div>
                    <div class="modcontent">
                        <div id="so_deal_1" class="so-deal style1">
                            <div class="extraslider-inner products-list yt-content-slider" data-rtl="yes"
                                data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30"
                                data-items_column00="6" data-items_column0="5" data-items_column1="3"
                                data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes"
                                data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-11%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Pastrami bacon">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/h1.jpg')}}"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/h2.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 2 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Pastrami bacon</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$85.00</span>
                                                    <span class="price-old">$96.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="77%" data-toggle='tooltip'
                                                        style="width: 77%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>51</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-15%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Lommodo quiutvenia">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/f1.jp')}}g"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/f2.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 3 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Lommodo quiutvenia</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$50.00</span>
                                                    <span class="price-old">$59.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="65%" data-toggle='tooltip'
                                                        style="width: 65%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>62</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-12%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Mapicola incidid">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/fu1.jpg')}}"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/fu2.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 1 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Mapicola incidid</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$90.00</span>
                                                    <span class="price-old">$102.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="67%" data-toggle='tooltip'
                                                        style="width: 67%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>45</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-8%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Duis aute irure">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/f3.jpg')}}"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('front/image/catalog/demo/product/270/f4.jpg')}}"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 5 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Duis aute irure </a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$48.00</span>
                                                    <span class="price-old">$52.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="37%" data-toggle='tooltip'
                                                        style="width: 37%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>30</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-10%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Excepteur sint occ">
                                                        <img src="{{asset('image/catalog/demo/product/270')}}/e1.jpg"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('image/catalog/demo/product/270')}}/e2.jpg"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 2 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Excepteur sint occ</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$90.00</span>
                                                    <span class="price-old">$100.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="38%" data-toggle='tooltip'
                                                        style="width: 38%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>40</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-11%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Cenison meatloa">
                                                        <img src="{{asset('image/catalog/demo/product/270')}}/h3.jpg"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('image/catalog/demo/product/270')}}/h4.jpg"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 1 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Cenison meatloa</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$70.00</span>
                                                    <span class="price-old">$80.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="77%" data-toggle='tooltip'
                                                        style="width: 77%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>51</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-9%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Ninim spareri sed">
                                                        <img src="{{asset('image/catalog/demo/product/270')}}/e3.jpg"
                                                            class="img-1 img-responsive" alt="image1">
                                                        <img src="{{asset('image/catalog/demo/product/270')}}/e4.jpg"
                                                            class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                        href="quickview.html" title="Quick view"
                                                        data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick
                                                            view</span></a>
                                                </div>
                                                <!--end quickview-->


                                            </div>
                                            <div class="right-block">
                                                <div class="button-group so-quickview cartinfo--left">
                                                    <button type="button" class="addToCart" title="Add to cart"
                                                        onclick="cart.add('60 ');">
                                                        <span>Add to cart </span>
                                                    </button>
                                                    <button type="button" class="wishlist btn-button"
                                                        title="Add to Wish List" onclick="wishlist.add('60');">
                                                        <i class="fa-regular fa-heart"></i><span>Add to Wish
                                                            List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button"
                                                        title="Compare this Product " onclick="compare.add('60');"><i
                                                            class="fa fa-retweet"></i><span>Compare this
                                                            Product</span>
                                                    </button>

                                                </div>
                                                <div class="caption hide-cont">
                                                    <div class="ratings">
                                                        <div class="rating-box"> <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <span class="rating-num">( 3 )</span>
                                                    </div>
                                                    <h4><a href="product.html" title="Pastrami bacon"
                                                            target="_self">Ninim spareri sed</a></h4>

                                                </div>
                                                <p class="price">
                                                    <span class="price-new">$90.00</span>
                                                    <span class="price-old">$99.00</span>
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                    <span class="color_width" data-title="77%" data-toggle='tooltip'
                                                        style="width: 77%"></span>
                                                </div>
                                                <p class="a2">Sold: <b>51</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Deals --> --}}
                 <div class="banners3 banners" style="margin-top:25px;">
                            <div class="item1">
                                <a href="#"><img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner3.jpg" alt="image"></a>
                            </div>
                            <div class="item2">
                                <a href="#"><img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner4.jpg" alt="image"></a>
                            </div>
                            <div class="item3">
                                <a href="#"><img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner5.jpg" alt="image"></a>
                            </div>
                        </div>

                <!-- Banners -->
                <!--<div class="banners3 banners">-->

                <!--    @if (latest_banners()->photo)-->
                <!--        <div class="item1">-->
                <!--            <a href="#"><img src="{{asset('storage/' . latest_banners()->photo?->filename)}}" alt="image"></a>-->
                <!--        </div>-->
                <!--    @endif-->

                <!--    @if (latest_banners()->photo)-->
                <!--        <div class="item2">-->
                <!--            <a href="#"><img src="{{asset('storage/' . latest_banners()->photo?->filename)}}" alt="image"></a>-->
                <!--        </div>-->
                <!--    @endif-->

                <!--    @if (latest_banners()->photo)-->
                <!--        <div class="item2">-->
                <!--            <a href="#"><img src="{{asset('storage/' . latest_banners()->photo?->filename)}}" alt="image"></a>-->
                <!--        </div>-->
                <!--    @endif-->


                <!--</div>-->
                <!-- end Banners -->

                @foreach (get_category() as $row)

                            <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1 mt-3">
                                <div class="modcontent">
                                    <div class="page-top">
                                        <div class="page-title-categoryslider">{{$row->name()}}</div>
                                        <div class="item-sub-cat">
                                            <ul>
                                                @foreach ($row->parents as $category)
                                                    <li><a href="{{ route('category', $category->slug) }}" title="Smartphone"
                                                            target="_self">{{$category->name()}}</a></li>

                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="categoryslider-content">
                                        <div class="item-cat-image" style="min-height: 351px;">
                                        <a href="#" title="Technology" target="_self">
                                  <img class="categories-loadimage" alt="Technology" src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/category/tab2.jpg">
                                </a>
                                    </div>

                                        <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes"
                                            data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30"
                                            data-items_column00="4" data-items_column0="4" data-items_column1="2"
                                            data-items_column2="1" data-items_column3="2" data-items_column4="1" data-arrows="yes"
                                            data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                                            @foreach (get_category_products($row->id) as $product)

                                                                        <div class="item">
                                                                            <div class="item-inner product-layout transition product-grid">
                                                                                <div class="product-item-container">
                                                                                    <div class="left-block left-b">
                                                                                        @if ($product->photo)

                                                                                            <div class="product-image-container second_img">
                                                                                                <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $product->slug_ar : $product->slug_en) }}"
                                                                                                    target="_self" title="Lastrami bacon">
                                                                                                    <img src="{{ asset('storage/' . $product?->photo?->filename) }}"
                                                                                                        class="img-1 img-responsive" alt="image1">
                                                                                                    <img src="{{ asset('storage/' . $product?->photo?->filename) }}"
                                                                                                        class="img-2 img-responsive" alt="image2">
                                                                                                </a>
                                                                                            </div>
                                                                                        @endif
                                                                                        <!--quickview-->
                                                                                        <div class="">

                                                                                            <button type="button" class="btn btn-primary btn-lg iframe-link btn-button quickview quickview_handler visible-lg"
                                                                                                data-toggle="modal" data-target="#myModal{{$product->id}}">
                                                                          <i class="fa fa-eye"></i>                      <!--oulick view-->
                                                                                            </button>




                                                                                        </div>
                                                                                        <!--end quickview-->


                                                                                    </div>
                                                                                    <div class="right-block">
                                                                                        <div class="button-group so-quickview cartinfo--left">
                                                                                            <button type="button" data-toggle="modal" data-target="#addToCart{{$product->id}}" class="addToCart" title="Add to cart">
                                                                                                <span>Add to cart </span>
                                                                                            </button>



                                                                                            <button type="button" data-toggle="modal" data-target="#addTowishlist{{$product->id}}" class="addToCart" title="Add to cart">
                                                         <i class="fa-regular fa-heart"></i>                                       
                                                                                            </button>



                                                                                            <button type="button" data-toggle="modal" data-target="#addTocomparisons{{$product->id}}" class="addToCart" title="Add to cart">
                                                                                                <i class="fa fa-retweet"></i>
                                                                                            </button>


                                                                                        </div>
                                                                                        <div class="caption hide-cont">
                                                                                            <div class="ratings">
                                                                                                <div class="rating-box">
                                                                                                    @php
                                                                                                        $rating = $product->commentable->count();
                                                                                                        $totalStars = 5;
                                                                                                    @endphp

                                                                                                    @for ($i = 1; $i <= $totalStars; $i++)
                                                                                                        <span class="fa fa-stack">
                                                                                                            <i
                                                                                                                class="fa fa-star fa-stack-2x {{ $i <= $rating ? '' : 'fa-star-o' }}"></i>
                                                                                                        </span>
                                                                                                    @endfor
                                                                                                </div>
                                                                                                <span class="rating-num">( {{ $product->commentable->count() }}
                                                                                                    )</span>
                                                                                            </div>
                                                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                                                    target="_self">{{$product->name()}}</a></h4>

                                                                                        </div>
                                                                                        <p class="price">
                                                                                            <span class="price-new">${{$product->price}}</span>

                                                                                        </p>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                @endforeach





                <!-- Banners -->
                <div class="banners4 banners">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a href="#"><img src="{{asset('front/image/catalog/banners/bn1.jpg')}}" alt="image"></a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a href="#"><img src="{{asset('front/image/catalog/banners/bn2.jpg')}}" alt="image"></a>
                        </div>
                    </div>
                </div>
                <!-- end Banners -->

                <!-- Listing tabs -->
                <div class="module listingtab-layout1">

                    <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                        <div class="loadeding"></div>
                        <div class="ltabs-wrap">
                            <div class="ltabs-tabs-container" data-delay="300" data-duration="600"
                                data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="3"
                                data-sm="2" data-xs="1" data-margin="30">
                                <!--Begin Tabs-->
                                <div class="ltabs-tabs-wrap">
                                    <span class="ltabs-tab-selected">Bathroom</span> <span
                                        class="ltabs-tab-arrow">▼</span>
                                    <div class="item-sub-cat">
                                        <ul class="ltabs-tabs cf">
                                            <li class="ltabs-tab tab-sel" data-category-id="20"
                                                data-active-content=".items-category-20"> <span
                                                    class="ltabs-tab-label">Best Seller</span></li>
                                            <li class="ltabs-tab " data-category-id="18"
                                                data-active-content=".items-category-18"> <span
                                                    class="ltabs-tab-label">New Arrivals</span></li>
                                            <li class="ltabs-tab " data-category-id="25"
                                                data-active-content=".items-category-25"> <span
                                                    class="ltabs-tab-label">Most Rating</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Tabs-->
                            </div>

                            <div class="ltabs-items-container products-list grid">
                                <!--Begin Items-->
                                <div class="ltabs-items ltabs-items-selected items-category-20" data-total="16">
                                    <div class="ltabs-items-inner ltabs-slider">
                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self"
                                                                title="Ullamco occaeca">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/h1.jpg')}}"
                                                                    class="img-1 img-responsive" alt="image1">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/h7.jpg')}}"
                                                                    class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i
                                                                    class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart"
                                                                onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button"
                                                                title="Add to Wish List"
                                                                onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to
                                                                    Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button"
                                                                title="Compare this Product "
                                                                onclick="compare.add('60');"><i
                                                                    class="fa fa-retweet"></i><span>Compare this
                                                                    Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating"> <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">Ullamco occaeca </a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$45.00</span>

                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href=" product.html" target="_self"
                                                                title="Eiusmod tempor incid">
                                                                <img src="
                                                        {{asset('front/image/catalog/demo/product/270/e3.jpg')}}"
                                                                    class="img-1 img-responsive" alt="image1">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/e8.jpg')}}"
                                                                    class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i
                                                                    class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart"
                                                                onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button"
                                                                title="Add to Wish List"
                                                                onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to
                                                                    Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button"
                                                                title="Compare this Product "
                                                                onclick="compare.add('60');"><i
                                                                    class="fa fa-retweet"></i><span>Compare this
                                                                    Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating"> <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">Eiusmod tempor incid</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$76.00</span>

                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self"
                                                                title=" Duis aute irure ">
                                                                <img src="
                                                            {{asset('front/image/catalog/demo/product/270/e4.jpg')}}"
                                                                    class="img-1 img-responsive" alt="image1">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/e7.jpg')}}"
                                                                    class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i
                                                                    class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart"
                                                                onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button"
                                                                title="Add to Wish List"
                                                                onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to
                                                                    Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button"
                                                                title="Compare this Product "
                                                                onclick="compare.add('60');"><i
                                                                    class="fa fa-retweet"></i><span>Compare this
                                                                    Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating"> <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">Duis aute irure </a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$85.00</span>

                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self"
                                                                title=" Excepteur sint occ">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/fu5.jpg')}}"
                                                                    class="img-1 img-responsive" alt="image1">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/fu6.jpg')}}"
                                                                    class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i
                                                                    class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart"
                                                                onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button"
                                                                title="Add to Wish List"
                                                                onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to
                                                                    Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button"
                                                                title="Compare this Product "
                                                                onclick="compare.add('60');"><i
                                                                    class="fa fa-retweet"></i><span>Compare this
                                                                    Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating"> <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">Excepteur sint occ</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$90.00</span>

                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href=" product.html" target="_self"
                                                                title="PCenison meatloa">
                                                                <img src="
                                                        {{asset('front/image/catalog/demo/product/270/f6.jpg')}}"
                                                                    class="img-1 img-responsive" alt="image1">
                                                                <img src="{{asset('front/image/catalog/demo/product/270/f2.jpg')}}"
                                                                    class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i
                                                                    class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart"
                                                                onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button"
                                                                title="Add to Wish List"
                                                                onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to
                                                                    Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button"
                                                                title="Compare this Product "
                                                                onclick="compare.add('60');"><i
                                                                    class="fa fa-retweet"></i><span>Compare this
                                                                    Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating"> <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">Cenison meatloa</a></h4>

                                                        </div>
                                                        <p class="price">$42.00</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">-10%</span>
                                                        </div>
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self"
                                                                title="Quis nostrud exercita">
                                                                <img src="
                                                            {{asset('front/image/catalog/demo/product/270/f2.jpg')}}"
                                                                    class="img-1 img-responsive" alt="image1"> <img
                                                                    src="{{asset('front/image/catalog/demo/product/270/f4.jpg')}}"
                                                                    class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i
                                                                    class="fa fa-eye"></i><span>Quick
                                                                    view</span></a>
                                                        </div>
                                                        <!--end quickview-->

                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart"
                                                                onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button"
                                                                title="Add to Wish List"
                                                                onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to
                                                                    Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button"
                                                                title="Compare this Product "
                                                                onclick="compare.add('60');"><i
                                                                    class="fa fa-retweet"></i><span>Compare this
                                                                    Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating"> <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">Quis nostrud exercita</a>
                                                            </h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$50.00</span>
                                                            <span class="price-old">$59.00</span>
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="ltabs-items items-category-18 grid" data-total="16">
                                    <div class="ltabs-loading"></div>

                                </div>
                                <div class="ltabs-items  items-category-25 grid" data-total="16">
                                    <div class=" ltabs-loading"></div>
                                </div>
                                <!--End Items-->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end Listing tabs -->

                <!-- Slider Brands -->
                <div class="slider-brands col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="yt-content-slider contentslider" data-autoplay="no" data-delay="4" data-speed="0.6"
                        data-margin="0" data-items_column00="7" data-items_column0="7" data-items_column1="5"
                        data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes"
                        data-pagination="no" data-lazyload="yes" data-loop="yes">
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b1.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b2.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b3.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b4.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b5.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b6.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b4.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b5.png')}}" alt="brand">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('front/image/catalog/brands/b6.png')}}" alt="brand">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Slider Brands -->


            </div>

        </div>

    </div>
</div>
<!-- //Main Container -->

<!-- blog -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="wrapper">
                <div class="container-fostrap">

                    <div class="content">
                        <div class="container">
                            <div class="row">
                                @foreach (get_blogs() as $row)
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="card">
                                            <a class="img-card" href="{{route('home.blog_detail', $row->slug)}}">
                                                @if ($row->photo)
                                                    <img src="{{asset('storage/' . $row?->photo?->filename)}}" />
                                                @endif

                                            </a>
                                            <div class="card-content">
                                                <h4 class="card-title">
                                                    <a href="{{route('home.blog_detail', $row->slug)}}">
                                                        {{$row->name()}}
                                                    </a>
                                                </h4>
                                                <p class="">
                                                    {{$row->short_description()}}
                                                </p>
                                            </div>
                                            <div class="card-read-more">
                                                <a href="{{route('home.blog')}}" class="btn btn-link btn-block">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@foreach (get_category() as $row)
    @foreach (get_category_products($row->id) as $product)

        <div class="modal fade" id="myModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">product view</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </div>
            </div>
        </div>


        <div class="modal fade" id="addToCart{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add To Cart</h4>
                    </div>
                    <div class="modal-body">


                  
                            <form action="{{route('addTocart')}}" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <div class="row">
                                    <div class="col">
                                        <label>Are you sure you want to add this product to your cart? {{$product->name()}}</label>

                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

         



                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade" id="addTowishlist{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add To wishlists</h4>
                    </div>
                    <div class="modal-body">


                        @auth
                            <form action="{{route('addTowishlists')}}" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <div class="row">
                                    <div class="col">
                                        <label>Are you sure you want to add this product to your Wishlist? {{$product->name()}}</label>

                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            @else

                            <label>You must log in first.</label>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                            </div>

                        @endif

                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="addTocomparisons{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add To comparisons</h4>
                    </div>
                    <div class="modal-body">


                        @auth
                            <form action="{{route('addToComparisons')}}" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <div class="row">
                                    <div class="col">
                                        <label>Are you sure you want to add this product to your comparisons? {{$product->name()}}</label>

                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            @else

                            <label>You must log in first.</label>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                            </div>

                        @endif

                    </div>

                </div>
            </div>
        </div>

    @endforeach

@endforeach

@endsection

@section('js')

@endsection
