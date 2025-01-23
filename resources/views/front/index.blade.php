@extends('front.layouts.master')
@section('title')
{{json_decode(get_settings()['website_name'], true)[\app()->getLocale()]}}
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
                                                    @if($row->photo)
                                                        <img src="{{asset('storage/' . $row->photo->filename)}}" width="50px"
                                                            height="50px" alt="icon">
                                                    @endif

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
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 main-right">
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
                            <a href="#"><img src="{{asset('front/image/catalog/banners/banner1.jpg')}}" alt="image"></a>
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
                        <a href="#"><img src="{{asset('front/image/catalog/banners/call-us.jpg')}}" alt="image"></a>
                        <ul class="block-infos">
                            <li class="info1">
                                <div class="inner">
                                    <i class="fa fa-file-text-o"></i>
                                    <div class="info-cont">
                                        <a href="#">free delivery</a>
                                        <p>On order over $49.86</p>
                                    </div>
                                </div>
                            </li>
                            <li class="info2">
                                <div class="inner">
                                    <i class="fa fa-shield"></i>
                                    <div class="info-cont">
                                        <a href="#">order protection</a>
                                        <p>secured information</p>
                                    </div>
                                </div>
                            </li>
                            <li class="info3">
                                <div class="inner">
                                    <i class="fa fa-gift"></i>
                                    <div class="info-cont">
                                        <a href="#">promotion gift</a>
                                        <p>special offers!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="info4">
                                <div class="inner">
                                    <i class="fa fa-money"></i>
                                    <div class="info-cont">
                                        <a href="#">money back</a>
                                        <p>return over 30 days</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="module extra">
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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

                    <h3 class="modtitle"><span>Latest Posts</span></h3>
                    <div class="modcontent clearfix">

                        <div class="so-blog-external buttom-type1 button-type1">
                            <div class="blog-external-simple">
                                <div class="cat-wrap">
                                    <div class="media">

                                        <div class="item item-1">
                                            <div class="media-left">
                                                <a href="#" target="_self">
                                                    <img src="{{asset('front/image/catalog/blog/1.jpg')}}"
                                                        alt="Biten demons lector in henderit in vulp"
                                                        class="media-object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#" title="Biten demons lector in henderit in vulp"
                                                        target="_self">Biten demons lector in henderit in vulp
                                                        nemusa tumps</a>
                                                </h4>
                                                <div class="media-content">
                                                    <div class="media-date-added"><i class="fa fa-calendar"></i>
                                                        December 4th, 2017</div>
                                                    <div class="media-subcontent">
                                                        <span class="media-comment"><i class="fa fa-comments"></i>0
                                                            Comment</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="cat-wrap">
                                    <div class="media">

                                        <div class="item item-2">
                                            <div class="media-left">
                                                <a href="#" target="_self">
                                                    <img src="{{asset('front/image/catalog/blog/2.jpg')}}"
                                                        alt="Commodo laoreet semper tincidun sit" class="media-object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#" title="Commodo laoreet semper tincidun sit"
                                                        target="_self">Commodo laoreet semper tincidun sit dolor
                                                        spums</a>
                                                </h4>
                                                <div class="media-content">
                                                    <div class="media-date-added"><i class="fa fa-calendar"></i>
                                                        November 15th, 2017</div>
                                                    <div class="media-subcontent">
                                                        <span class="media-comment"><i class="fa fa-comments"></i>0
                                                            Comment</span>
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
                </div>


                <div class="module">
                    <div class="banners banners5">
                        <div class="banner">
                            <a href="#"><img src="{{asset('front/image/catalog/banners/banner2.jpg')}}" alt="image"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 main-right">


                <div class="static-cates">
                    <ul>
                        @foreach (get_models('Category', ['active' => '1']) as $row)
                            @if($row->photo)
                                <li>
                                    <a href="{{ route('category', $row->slug) }}"><img
                                            src="{{asset('storage/' . $row->photo->filename)}}" alt="image"></a>
                                </li>
                            @endif
                        @endforeach


                    </ul>
                </div>

                <!-- Deals -->
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>51</b> </p>
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>62</b> </p>
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>45</b> </p>
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>30</b> </p>
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>40</b> </p>
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>51</b> </p>
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
                                                        title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                            class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                <p class="a2">Sold: <b>51</b> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Deals -->

                <!-- Banners -->
                <div class="banners3 banners">
                    <div class="item1">
                        <a href="#"><img src="{{asset('front/image/catalog/banners/banner3.jpg')}}" alt="image"></a>
                    </div>
                    <div class="item2">
                        <a href="#"><img src="{{asset('front/image/catalog/banners/banner4.jpg')}}" alt="image"></a>
                    </div>
                    <div class="item3">
                        <a href="#"><img src="{{asset('front/image/catalog/banners/banner5.jpg')}}" alt="image"></a>
                    </div>
                </div>
                <!-- end Banners -->

                @foreach (get_category() as $row)

                    <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1">
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

                                <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes"
                                    data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30"
                                    data-items_column00="4" data-items_column0="4" data-items_column1="2"
                                    data-items_column2="1" data-items_column3="2" data-items_column4="1" data-arrows="yes"
                                    data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                                    @foreach (get_category_products($row->id) as $products)


                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
@if ($products->photo)
    
<div class="product-image-container second_img">
    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $products->slug_ar : $products->slug_en) }}" target="_self" title="Lastrami bacon">
        <img src="{{ asset('storage/' . $products?->photo?->filename) }}"
            class="img-1 img-responsive" alt="image1">
        <img src="{{ asset('storage/' . $products?->photo?->filename) }}"
            class="img-2 img-responsive" alt="image2">
    </a>
</div>
@endif
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                href="quickview.html" title="Quick view"
                                                                data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>
                                                                    Quick
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
                                                                title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                                    class="fa-regular fa-heart"></i><span>Add to Wish
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
                                                                <div class="rating-box">
                                                                    @php
                                                                    $rating = $products->commentable->count();
                                                                    $totalStars = 5;
                                                                @endphp
                    
                                                                @for ($i = 1; $i <= $totalStars; $i++)
                                                                    <span class="fa fa-stack">
                                                                        <i
                                                                            class="fa fa-star fa-stack-2x {{ $i <= $rating ? '' : 'fa-star-o' }}"></i>
                                                                    </span>
                                                                @endfor
                                                                </div>
                                                                <span class="rating-num">( {{ $products->commentable->count() }} )</span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon"
                                                                    target="_self">{{$products->name()}}</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">${{$products->price}}</span>

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
                                                    class="ltabs-tab-label">Best Seller</span> </li>
                                            <li class="ltabs-tab " data-category-id="18"
                                                data-active-content=".items-category-18"> <span
                                                    class="ltabs-tab-label">New Arrivals</span> </li>
                                            <li class="ltabs-tab " data-category-id="25"
                                                data-active-content=".items-category-25"> <span
                                                    class="ltabs-tab-label">Most Rating</span> </li>
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
                                                            onclick="cart.add('60 ');"> <span>Add to cart </span>
                                                        </button>
                                                        <button type="button" class="wishlist btn-button"
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
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
                                                            <a href=" product.html" target="_self" title="Eiusmod tempor incid">
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
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
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
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
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
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
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
                                                            <a href=" product.html" target="_self" title="PCenison meatloa">
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
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
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
                                                        <a href="product.html" target="_self" title="Quis nostrud exercita">
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
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
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
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card">
                                        <a class="img-card"
                                            href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                            <img
                                                src="https://1.bp.blogspot.com/-Bii3S69BdjQ/VtdOpIi4aoI/AAAAAAAABlk/F0z23Yr59f0/s640/cover.jpg" />
                                        </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                            <a
                                                href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                                Bootstrap 3 Carousel FadeIn Out
                                            </a>
                                            </h4>
                                            <p class="">
                                                Tutorial to make a carousel bootstrap by adding more wonderful
                                                effect fadein ...
                                            </p>
                                            </div> <div class="card-read-more">
                                            <a href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html"
                                                class="btn btn-link btn-block">
                                                Read More
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card"> <a class="img-card"
                                        href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">
                                        <img
                                            src="https://3.bp.blogspot.com/-bAsTyYC8U80/VtLZRKN6OlI/AAAAAAAABjY/kAoljiMALkQ/s400/material%2Bnavbar.jpg" />
                                        </a> <div class="card-content">
                                        <h4 class="card-title">
                                            <a
                                                href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html">
                                                Material Design Responsive
                                            </a>
                                        </h4>
                                        <p class="">
                                            Material Design is a visual programming language made by Google.
                                            Language programming...
                                        </p>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="https://codepen.io/wisnust10/full/ZWERZK/"
                                            class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="card">
                                    <a class="img-card"
                                        href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">
                                        <img
                                            src="https://4.bp.blogspot.com/-TDIJ17DfCco/Vtneyc-0t4I/AAAAAAAABmk/aa4AjmCvRck/s1600/cover.jpg" />
                                    </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a
                                                href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">5
                                                Button Hover Animation
                                            </a>
                                        </h4>
                                        <p class="">
                                            tutorials button hover animation, although very much a hover
                                            button is very beauti...
                                        </p>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html"
                                            class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

    </div>
</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<!-- end blog -->
@endsection

@section('js')

@endsection