@extends('front.layouts.master')
@section('title')
Products show
@endsection

@section('content')
<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Smartphone &amp; Tablets</a></li>
        <li><a href="#">Chicken swinesha</a></li>
    </ul>

    <div class="row">

        <!--Middle Part Start-->
        <div id="content" class="col-md-9 col-sm-8">

            <div class="product-view">
                <div class="left-content-product">
                    <div class="row">
                        <div class="content-product-left col-md-6 col-sm-12 col-xs-12">
                            <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                <!-- <span class="btn-more prev-thumb nt"><i class="fa fa-angle-up"></i></span>
                                <span class="btn-more next-thumb nt"><i class="fa fa-angle-down"></i></span> -->
                                <ul class="thumb-vertical">
                                    <li class="owl2-item">
                                        <a data-index="0" class="img thumbnail active"
                                            data-image="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/1.jpg"
                                            title="Canon EOS 5D">
                                            <img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/1.jpg"
                                                title="Canon EOS 5D" alt="Canon EOS 5D">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="1" class="img thumbnail "
                                            data-image="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/2.jpg"
                                            title="Chicken swinesha">
                                            <img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/2.jpg"
                                                title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="2" class="img thumbnail"
                                            data-image="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/3.jpg"
                                            title="Chicken swinesha">
                                            <img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/3.jpg"
                                                title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="3" class="img thumbnail"
                                            data-image="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/4.jpg"
                                            title="Chicken swinesha">
                                            <img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/4.jpg"
                                                title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="3" class="img thumbnail"
                                            data-image="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/5.jpg"
                                            title="Chicken swinesha">
                                            <img src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/5.jpg"
                                                title="Chicken swinesha" alt="Chicken swinesha">
                                        </a>
                                    </li>
                                </ul>


                            </div>
                            <div class="large-image  vertical">
                                <img itemprop="image" class="product-image-zoom"
                                    src="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/1.jpg"
                                    data-zoom-image="https://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/1.jpg"
                                    title="Chicken swinesha" alt="Chicken swinesha">
                            </div>
                            <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i
                                    class="fa fa-youtube-play"></i></a>

                        </div>

                        <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                            <div class="title-product">
                                <h1>Chicken swinesha</h1>
                            </div>
                            <!-- Review ---->
                            <div class="box-review form-group">
                                <div class="ratings">
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

                                <a class="reviews_button" href=""
                                    onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ $row->commentable->count()}} reviews</a>
                                |
                                <a class="write_review_button" href=""
                                    onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a
                                    review</a>
                            </div>

                            <div class="product-label form-group">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                    itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new" itemprop="price">$114.00</span>
                                    <span class="price-old">$122.00</span>
                                </div>
                                <div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span>
                                </div>
                            </div>

                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="price-tax"><span>Ex Tax:</span> $60.00</div>
                                    <div class="reward"><span>Price in reward points:</span> 400</div>
                                    <div class="brand"><span>Brand:</span><a href="#">Apple</a> </div>
                                    <div class="model"><span>Product Code:</span> Product 15</div>
                                    <div class="reward"><span>Reward Points:</span> 100</div>
                                </div>
                            </div>

                            <div class="short_description form-group">
                                <h4>OverView</h4>
                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution.
                                Designed specifically for the creative professional, this display provid...
                            </div>
                            <div id="product">
                                <h4>Available Options</h4>
                                <div style="display: flex;justify-content: space-between;align-items: center;    width: 50%;">
                                <div class="image_option_type form-group required">
                                    <label class="control-label">Colors</label>
                                    <ul class="product-options clearfix" id="input-option231">
                                        <li class="radio active">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="33">
                                                <img src="https://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/blue.jpg"
                                                    data-original-title="blue +$12.00"
                                                    class="img-thumbnail icon icon-color"> <i class="fa fa-check"></i>
                                                <label> </label>
                                            </label>
                                        </li>
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="34">
                                                <img src="https://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/brown.jpg"
                                                    data-original-title="brown -$12.00"
                                                    class="img-thumbnail icon icon-color"> <i class="fa fa-check"></i>
                                                <label> </label>
                                            </label>
                                        </li>
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="35">
                                                <img src="https://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/green.jpg"
                                                    data-original-title="green +$12.00"
                                                    class="img-thumbnail icon icon-color"> <i class="fa fa-check"></i>
                                                <label> </label>
                                            </label>
                                        </li>
                                        <li class="selected-option">
                                        </li>
                                    </ul>
                                </div>
                                <div class="image_option_type form-group required">
                                    <label class="control-label">Size</label>
                                    <ul class="product-options clearfix" id="input-option231">
                                        <li class="radio active">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="33">
                                                <!--<img src=""-->
                                                <!--    data-original-title="blue +$12.00"-->
                                                <!--    class="img-thumbnail icon icon-color">-->
                                                    
                                                <label style="border: 1px solid;padding: 1px 8px;color: black;font-size: 14px;">XL </label>
                                            </label>
                                        </li>
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="34">
                                                <!--<img src=""-->
                                                <!--    data-original-title="brown -$12.00"-->
                                                <!--    class="img-thumbnail icon icon-color">-->
                                                    
                                                <label style="border: 1px solid;padding: 1px 8px;color: black;font-size: 14px;"> M </label>
                                            </label>
                                        </li>
                                        <li class="radio">
                                            <label>
                                                <input class="image_radio" type="radio" name="option[231]" value="35">
                                                <!--<img src=""-->
                                                <!--    data-original-title="green +$12.00"-->
                                                <!--    class="img-thumbnail icon icon-color">-->
                                                    
                                                <label style="border: 1px solid;padding: 1px 8px;color: black;font-size: 14px;"> L </label>
                                            </label>
                                        </li>
                                        <li class="selected-option">
                                        </li>
                                    </ul>
                                </div>
                                </div>



                                <div class="form-group box-info-product">
                                    <div class="option quantity">
                                        <div class="input-group quantity-control" unselectable="on"
                                            style="-webkit-user-select: none;">
                                            <label>Qty</label>
                                            <input class="form-control" type="text" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="50">
                                            <span class="input-group-addon product_quantity_down">−</span>
                                            <span class="input-group-addon product_quantity_up">+</span>
                                        </div>
                                    </div>
                                    <div class="cart">
                                        <input type="button" data-toggle="tooltip" title="" value="Add to Cart"
                                            data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg"
                                            onclick="cart.add('42', '1');" data-original-title="Add to Cart">
                                    </div>
                                    <div class="add-to-links wish_comp">
                                        <ul class="blank list-inline">
                                            <li class="wishlist">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                    onclick="wishlist.add('50');"
                                                    data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                    onclick="compare.add('50');"
                                                    data-original-title="Compare this Product"><i
                                                        class="fa fa-exchange"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <!-- end box info product -->

                        </div>
                    </div>
                </div>


            </div>

            <!-- Product Tabs -->
            <div class="producttab ">
                <div class="tabsslider horizontal-tabs  col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
                        
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>
                    </ul>
                    <div class="tab-content col-xs-12">
                        <div id="tab-1" class="tab-pane fade active in">
                            <p style="color: black;font-size: 17px;">
                                The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution.
                                Designed specifically for the creative professional, this display provides more space
                                for easier access to all the tools and palettes needed to edit, format and composite
                                your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there's
                                no limit to what you can achieve. <br>
                                <br>
                                The Cinema HD features an active-matrix liquid crystal display that produces
                                flicker-free images that deliver twice the brightness, twice the sharpness and twice the
                                contrast ratio of a typical CRT display. Unlike other flat panels, it's designed with a
                                pure digital interface to deliver distortion-free images that never need adjusting. With
                                over 4 million digital pixels, the display is uniquely suited for scientific and
                                technical applications such as visualizing molecular structures or analyzing geological
                                data. <br>
                                <br>
                                Offering accurate, brilliant color performance, the Cinema HD delivers up to 16.7
                                million colors across a wide gamut allowing you to see subtle nuances between colors
                                from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from
                                edge to edge. Apple's ColorSync technology allows you to create custom profiles to
                                maintain consistent color onscreen and in print. The result: You can confidently use
                                this display in all your color-critical applications. <br>
                                <br>
                                Housed in a new aluminum design, the display has a very thin bezel that enhances visual
                                accuracy. Each display features two FireWire 400 ports and two USB 2.0 ports, making
                                attachment of desktop peripherals, such as iSight, iPod, digital and still cameras, hard
                                drives, printers and scanners, even more accessible and convenient. Taking advantage of
                                the much thinner and lighter footprint of an LCD, the new displays support the VESA
                                (Video Electronics Standards Association) mounting interface standard. Customers with
                                the optional Cinema Display VESA Mount Adapter kit gain the flexibility to mount their
                                display in locations most appropriate for their work environment. <br>
                                <br>
                                The Cinema HD features a single cable design with elegant breakout for the USB 2.0,
                                FireWire 400 and a pure digital connection using the industry standard Digital Video
                                Interface (DVI) interface. The DVI connection allows for a direct pure-digital
                                connection.<br>
                            </p>
                            <!--<h3>-->
                            <!--    Features:</h3>-->
                            <!--<p>-->
                            <!--    Unrivaled display performance</p>-->
                            <!--<ul>-->
                            <!--    <li>-->
                            <!--        30-inch (viewable) active-matrix liquid crystal display provides breathtaking image-->
                            <!--        quality and vivid, richly saturated color.</li>-->
                            <!--    <li>-->
                            <!--        Support for 2560-by-1600 pixel resolution for display of high definition still and-->
                            <!--        video imagery.</li>-->
                            <!--    <li>-->
                            <!--        Wide-format design for simultaneous display of two full pages of text and graphics.-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        Industry standard DVI connector for direct attachment to Mac- and Windows-based-->
                            <!--        desktops and notebooks</li>-->
                            <!--    <li>-->
                            <!--        Incredibly wide (170 degree) horizontal and vertical viewing angle for maximum-->
                            <!--        visibility and color performance.</li>-->
                            <!--    <li>-->
                            <!--        Lightning-fast pixel response for full-motion digital video playback.</li>-->
                            <!--    <li>-->
                            <!--        Support for 16.7 million saturated colors, for use in all graphics-intensive-->
                            <!--        applications.</li>-->
                            <!--</ul>-->
                            <!--<p>-->
                            <!--    Simple setup and operation</p>-->
                            <!--<ul>-->
                            <!--    <li>-->
                            <!--        Single cable with elegant breakout for connection to DVI, USB and FireWire ports-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        Built-in two-port USB 2.0 hub for easy connection of desktop peripheral devices.-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        Two FireWire 400 ports to support iSight and other desktop peripherals</li>-->
                            <!--</ul>-->
                            <!--<p>-->
                            <!--    Sleek, elegant design</p>-->
                            <!--<ul>-->
                            <!--    <li>-->
                            <!--        Huge virtual workspace, very small footprint.</li>-->
                            <!--    <li>-->
                            <!--        Narrow Bezel design to minimize visual impact of using dual displays</li>-->
                            <!--    <li>-->
                            <!--        Unique hinge design for effortless adjustment</li>-->
                            <!--    <li>-->
                            <!--        Support for VESA mounting solutions (Apple Cinema Display VESA Mount Adapter sold-->
                            <!--        separately)</li>-->
                            <!--</ul>-->

                        </div>
                        <div id="tab-review" class="tab-pane fade">
                            <form>
                                <div id="review">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong>Super Administrator</strong></td>
                                                <td class="text-right">29/07/2015</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p>Best this product opencart</p>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-1x"></i><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-1x"></i><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-1x"></i><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-1x"></i><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-right"></div>
                                </div>
                                <h2 id="review-title">Write a review</h2>
                                <div class="contacts-form">
                                    <div class="form-group"> <span class="icon icon-user"></span>
                                        <input type="text" name="name" class="form-control" value="Your Name"
                                            onblur="if (this.value == '') {this.value = 'Your Name';}"
                                            onfocus="if(this.value == 'Your Name') {this.value = '';}">
                                    </div>
                                    <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                                        <textarea class="form-control" name="text"
                                            onblur="if (this.value == '') {this.value = 'Your Review';}"
                                            onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                                    </div>
                                    <span style="font-size: 11px;"><span class="text-danger">Note:</span> HTML is not
                                        translated!</span>

                                    <div class="form-group">
                                        <b>Rating</b> <span>Bad</span>&nbsp;
                                        <input type="radio" name="rating" value="1"> &nbsp;
                                        <input type="radio" name="rating" value="2"> &nbsp;
                                        <input type="radio" name="rating" value="3"> &nbsp;
                                        <input type="radio" name="rating" value="4"> &nbsp;
                                        <input type="radio" name="rating" value="5"> &nbsp;<span>Good</span>

                                    </div>
                                    <div class="buttons clearfix"><a id="button-review"
                                            class="btn buttonGray">Continue</a></div>
                                </div>
                            </form>
                        </div>
                       
                        <div id="tab-5" class="tab-pane fade">
                            <p>{!! $row->description() !!} </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Product Tabs -->

            <!-- Related Products -->
            <div class="related titleLine products-list grid module ">
                <h3 class="modtitle">Related Products </h3>

              
                  <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"
                                        data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes" style="    width: 130%;">

                                        @foreach ($latestProducts as $row)
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}" target="_self" title="Mandouille short ">
                                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}"
                                                            alt="Mandouille short">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}" target="_self"
                                                        title="Mandouille short">{{ $row->name() }} </a>
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
                                                    <span class="price-new product-price">${{ $row->price }}
                                                    </span>&nbsp;&nbsp;

                                                    <span class="price-old">${{ $row->discount_price }} </span>&nbsp;

                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        @endforeach
                                 
                                   

                                    </div>
            </div>

            <!-- end Related  Products-->




        </div>
     
        <aside class="col-sm-4 col-md-3 content-aside" id="column-left">
            {{-- <div class="module category-style">
                <h3 class="modtitle">Categories</h3>
                <div class="table_cell">
                    <fieldset>
                    
                        <ul class="">
                            @foreach ($categories as $category)
                        
                                <li>
                                    <input type="checkbox" name="category[]"
                                        value="{{ $category->id }}"
                                        @if (in_array($category->id, request()->get('category', []))) checked @endif
                                        onchange="this.form.submit()" id="{{$category->id}}">
                                    <label
                                        for="category_{{ $category->id }}">{{ $category->name() }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </fieldset>
                </div>
            </div> --}}
            <div class="module product-simple">
                <h3 class="modtitle">
                    <span>Latest products</span>
                </h3>
                <div class="modcontent">
                    <div class="so-extraslider">
                        <!-- Begin extraslider-inner -->
                        <div class="extraslider-inner">
                            <div class="item ">
                                @foreach ($latestProducts as $row)
                                <div class="product-layout item-inner style1 ">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}" target="_self" title="Mandouille short ">
                                                <img src="{{ asset('storage/' . $row?->photo?->filename) }}"
                                                    alt="Mandouille short">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="item-info">
                                        <div class="item-title">
                                            <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}" target="_self"
                                                title="Mandouille short">{{ $row->name() }} </a>
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
                                            <span class="price-new product-price">${{ $row->price }}
                                            </span>&nbsp;&nbsp;

                                            <span class="price-old">${{ $row->discount_price }} </span>&nbsp;

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
        
        </aside>
    </div>

</div>
<!-- //Main Container -->

@endsection

@section('js')

@endsection