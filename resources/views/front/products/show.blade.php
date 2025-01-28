@extends('front.layouts.master')
@section('title')
Products show
@endsection
<style>
    .addToCart {
        font-size: 12px;
        font-weight: 600;
        color: #fff;
        text-transform: capitalize;
        background-color: #ff5e00;
        border-radius: 18px;
        border: none;
        padding: 0 10px;
        height: 34px;
        line-height: 34px;
        line-height: 100%;
        border: none;
    }
</style>
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
                                    @foreach ($row->photos as $photo)
                                    <li class="owl2-item">
                                        <a data-index="0" class="img thumbnail active"
                                            data-image="{{ asset('storage/' . $photo?->filename) }}"
                                            title="Canon EOS 5D">
                                            <img src="{{ asset('storage/' . $photo?->filename) }}"
                                                title="Canon EOS 5D" alt="Canon EOS 5D">
                                        </a>
                                    </li>
                                    @endforeach
                                  
                                   
                                </ul>


                            </div>
                            <div class="large-image  vertical">
                                <img itemprop="image" class="product-image-zoom"
                                    src="{{ asset('storage/' . $row->photo?->filename) }}"
                                    data-zoom-image="{{ asset('storage/' . $row->photo?->filename) }}"
                                    title="Chicken swinesha" alt="Chicken swinesha">
                            </div>
                        

                        </div>

                        <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                            <div class="title-product">
                                <h1>{{$row->name()}}</h1>
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
                                            <i class="fa fa-star fa-stack-2x {{ $i <= $rating ? '' : 'fa-star-o' }}"></i>
                                        </span>
                                    @endfor
                                </div>

                                <a class="reviews_button" href=""
                                    onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ $row->commentable->count()}}
                                    reviews</a>
                                |
                                <a class="write_review_button" href=""
                                    onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a
                                    review</a>
                            </div>

                            <div class="product-label form-group">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                    itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new" itemprop="price">${{$row->discount_price}}</span>
                                    <span class="price-old">${{$row->price}}</span>
                          
                                </div>
                                <div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span>
                                </div>
                            </div>

                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="price-tax"><span>SKU:</span> {{$row->SKU}}</div>
                                    <div class="price-tax"><span>id:</span> {{$row->id}}</div>
                
                                    <div class="brand"><span>Brand:</span><a href="#">{{$row->brand->name()}}</a> </div>
                                
                                </div>
                            </div>

                            <div class="short_description form-group">
                                <h4>OverView</h4>
                           {!! $row->short_description() !!}
                            </div>
                            <div id="product">
                                <h4>Available Options</h4>
                                <div style="display: flex;justify-content: space-between;align-items: center;    width: 50%;">
                                    
                                    
                                    @foreach ($row->attribute() as $attribute)
                                    <div class="image_option_type form-group required">
                                        <label class="control-label">{{$attribute->attribute->name()}}</label>
                                        <ul class="product-options clearfix" id="input-option231">
                                            <li class="radio active">
                                                <label>
                                                    <input class="image_radio" type="radio" name="{{$attribute->attribute_value->qty}}"
                                                        value="{{$attribute->attribute_value->qty}}">
                                                    <img src="https://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/blue.jpg"
                                                        data-original-title="blue +$12.00"
                                                        class="img-thumbnail icon icon-color"> <i
                                                        class="fa fa-check"></i>
                                                    <label> </label>
                                                </label>
                                            </li>
                                         
                                            <li class="selected-option">
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                 


                                  
                                </div>



                                <div class="form-group box-info-product">
                                    
                                    <div class="cart">
                                        <button type="button" data-toggle="modal" data-target="#addToCart{{$row->id}}"
                                            class="addToCart" title="Add to cart">
                                            <span>Add to cart </span>
                                        </button>
                                        <div class="modal fade" id="addToCart{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                        
                                                            <input type="hidden" name="product_id" value="{{$row->id}}">
                                        
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label>Are you sure you want to add this product to your cart? {{$row->name()}}</label>
                                        
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
                                        


                                        <button type="button" data-toggle="modal"
                                            data-target="#addTowishlist{{$row->id}}" class="addToCart"
                                            title="Add to cart">
                                            <!--<span>Add to Wishlist </span>-->
                                            <i class="fa-regular fa-heart"></i>
                                        </button>

                                        <div class="modal fade" id="addTowishlist{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Add To wishlists</h4>
                                                    </div>
                                                    <div class="modal-body">
                                        
                                        
                                                        @if (auth_user())
                                                            <form action="{{route('addTowishlists')}}" method="post">
                                                                @csrf
                                        
                                                                <input type="hidden" name="product_id" value="{{$row->id}}">
                                        
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label>Are you sure you want to add this product to your Wishlist?
                                                                            {{$row->name()}}</label>
                                        
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
                                        

                                        <button type="button" data-toggle="modal"
                                            data-target="#addTocomparisons{{$row->id}}" class="addToCart"
                                            title="Add to cart">
                                            <!--<span>Compare this  Product </span>-->
                                            <i class="fa fa-refresh"></i>
                                        </button>

                                        <div class="modal fade" id="addTocomparisons{{$row->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Add To comparisons</h4>
                                                    </div>
                                                    <div class="modal-body">
                                        
                                        
                                                        @if (auth_user())
                                                            <form action="{{route('addToComparisons')}}" method="post">
                                                                @csrf
                                        
                                                                <input type="hidden" name="product_id" value="{{$row->id}}">
                                        
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label>Are you sure you want to add this product to your comparisons?
                                                                            {{$row->name()}}</label>
                                        
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
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews ({{$row->commentable->count()}})</a></li>

                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>
                    </ul>
                    <div class="tab-content col-xs-12">
                        <div id="tab-1" class="tab-pane fade active in">
                            <p style="color: black;font-size: 17px;">
                                
                                {!! $row->short_description() !!}
                                
                            </p>
                            

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


                <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes"
                    data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30"
                    data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"
                    data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no"
                    data-lazyload="yes" data-loop="yes" data-hoverpause="yes" style="    width: 130%;">

                    @foreach ($latestProducts as $row)
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                        target="_self" title="Mandouille short ">
                                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}" alt="Mandouille short">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                        target="_self" title="Mandouille short">{{ $row->name() }} </a>
                                                </div>
                                                <div class="rating">
                                                    @php
                                                        $rating = $row->commentable->count();
                                                        $totalStars = 5;
                                                    @endphp

                                                    @for ($i = 1; $i <= $totalStars; $i++)
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x {{ $i <= $rating ? '' : 'fa-star-o' }}"></i>
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
                                <input type="checkbox" name="category[]" value="{{ $category->id }}" @if
                                    (in_array($category->id, request()->get('category', []))) checked @endif
                                onchange="this.form.submit()" id="{{$category->id}}">
                                <label for="category_{{ $category->id }}">{{ $category->name() }}</label>
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
                                                                            <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                                                target="_self" title="Mandouille short ">
                                                                                <img src="{{ asset('storage/' . $row?->photo?->filename) }}"
                                                                                    alt="Mandouille short">
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                    <div class="item-info">
                                                                        <div class="item-title">
                                                                            <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}"
                                                                                target="_self" title="Mandouille short">{{ $row->name() }} </a>
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