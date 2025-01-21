@extends('front.layouts.master')
@section('title')
{{$category->name()}}
@endsection

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">{{$category->name()}}</a></li>
        </ul>

        <div class="row">

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <h3 class="title-category ">{{$category->name()}}</h3>
                    <div class="category-desc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a href="#"><img src="{{asset('storage/'.$category?->photo?->filename)}}" alt="img cate"><br></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Filters -->
                    <div class="product-filter product-filter-top filters-panel">
                        <div class="row">
                            <div class="col-md-5 col-sm-3 col-xs-12 view-mode">

                                <div class="list-view">
                                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" data-original-title="Grid"><i class="fa fa-th"></i></button>
                                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                </div>

                            </div>
                            <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                                <div class="form-group short-by">
                                    <label class="control-label" for="input-sort">Sort By:</label>
                                    <select id="input-sort" class="form-control" onchange="location = this.value;">
                                        <option value="" selected="selected">Default</option>
                                        <option value="">Name (A - Z)</option>
                                        <option value="">Name (Z - A)</option>
                                        <option value="">Price (Low &gt; High)</option>
                                        <option value="">Price (High &gt; Low)</option>
                                        <option value="">Rating (Highest)</option>
                                        <option value="">Rating (Lowest)</option>
                                        <option value="">Model (A - Z)</option>
                                        <option value="">Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-limit">Show:</label>
                                    <select id="input-limit" class="form-control" onchange="location = this.value;">
                                        <option value="" selected="selected">15</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">75</option>
                                        <option value="">100</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row nopadding-xs so-filter-gird grid">

                        @foreach($data as $row)
                            <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="product.html" target="_self" title="Lastrami bacon">
                                                <img src="{{asset('storage/'.$row?->photo?->filename)}}" class="img-1 img-responsive" alt="image1">
                                                <img src="{{asset('storage/'.$row?->photo?->filename)}}" class="img-2 img-responsive" alt="image2">
                                            </a>
                                        </div>
                                        <!--quickview-->
                                        <div class="so-quickview">
                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                        </div>
                                        <!--end quickview-->


                                    </div>
                                    <div class="right-block">
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                            </button>
                                            <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                            </button>

                                        </div>
                                        <div class="caption hide-cont">
                                            <div class="ratings">
                                                <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                <span class="rating-num">( 2 )</span>
                                            </div>
                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">{{$row->name()}}</a></h4>

                                        </div>
                                        <p class="price">
                                            <span class="price-new">${{$row->price}}</span>

                                        </p>
                                        <div class="description item-desc hidden">
                                            <p>
                                                {{$row->short_description()}}
                                            </p>
                                        </div>
                                        <div class="list-block hidden">
                                            <button class="addToCart btn-button" type="button" title="Add to Cart" onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                            </button>
                                            <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                            </button>
                                            <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                            </button>
                                            <!--quickview-->
                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>
                                            <!--end quickview-->
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>


                </div>

            </div>


            <!--Middle Part End-->

            <!--Right Part Start -->
            <aside class="col-sm-4 col-md-3 content-aside" id="column-left">

                <div class="module">
                    <h3 class="modtitle">Filter </h3>
                    <div class="modcontent ">
                        <form class="type_2">

                            <div class="table_layout filter-shopby">
                                <div class="table_row">
                                    <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
                                    <div class="table_cell" style="z-index: 103;">
                                        <legend>Search</legend>
                                        <input class="form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
                                    </div><!--/ .table_cell -->
                                    <!-- - - - - - - - - - - - - - End of category filter - - - - - - - - - - - - - - - - -->
                                    <!-- - - - - - - - - - - - - - SUB CATEGORY - - - - - - - - - - - - - - - - -->
                                    <div class="table_cell">
                                        <fieldset>
                                            <legend>Sub Category</legend>
                                            <ul class="checkboxes_list">
                                                <li>
                                                    <input type="checkbox" checked="" name="category" id="category_1">
                                                    <label for="category_1">Smartphone &amp; Tablets</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="category" id="category_2">
                                                    <label for="category_2">Electronics</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="category" id="category_3">
                                                    <label for="category_3">Shoes</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="category" id="category_4">
                                                    <label for="category_4">Watches</label>
                                                </li>

                                            </ul>

                                        </fieldset>

                                    </div><!--/ .table_cell -->
                                    <!-- - - - - - - - - - - - - - End SUB CATEGORY - - - - - - - - - - - - - - - - -->
                                    <!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
                                    <div class="table_cell">
                                        <fieldset>
                                            <legend>Manufacturer</legend>
                                            <ul class="checkboxes_list">
                                                <li>
                                                    <input type="checkbox" checked="" name="manufacturer" id="manufacturer_1">
                                                    <label for="manufacturer_1">Manufacturer 1</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="manufacturer" id="manufacturer_2">
                                                    <label for="manufacturer_2">Manufacturer 2</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="manufacturer" id="manufacturer_3">
                                                    <label for="manufacturer_3">Manufacturer 3</label>
                                                </li>

                                            </ul>

                                        </fieldset>

                                    </div><!--/ .table_cell -->
                                    <!-- - - - - - - - - - - - - - End manufacturer - - - - - - - - - - - - - - - - -->

                                    <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                                    <div class="table_cell">
                                        <fieldset>
                                            <legend>Price</legend>
                                            <div class="range">
                                                Range :
                                                <span class="min_val">$28.00</span> -
                                                <span class="max_val">$562.00</span>
                                                <input type="hidden" name="" class="min_value" value="28.00">
                                                <input type="hidden" name="" class="max_value" value="562.00">
                                            </div>
                                            <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 3.15795%;"></span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 96.8438%;"></span>
                                                <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 3.15795%; width: 93.6859%;"></div></div>
                                        </fieldset>
                                    </div><!--/ .table_cell -->

                                    <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

                                    <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->

                                    <div class="table_cell">

                                        <fieldset>

                                            <legend>Color</legend>

                                            <div class="row">

                                                <div class="col-sm-6">

                                                    <ul class="simple_vertical_list">

                                                        <li>

                                                            <input type="checkbox" name="" id="color_btn_1">
                                                            <label for="color_btn_1" class="color_btn green">Green</label>

                                                        </li>

                                                        <li>

                                                            <input type="checkbox" name="" id="color_btn_2">
                                                            <label for="color_btn_2" class="color_btn yellow">Yellow</label>

                                                        </li>

                                                        <li>
                                                            <input type="checkbox" name="" id="color_btn_3">
                                                            <label for="color_btn_3" class="color_btn red">Red</label>

                                                        </li>

                                                    </ul>

                                                </div>

                                                <div class="col-sm-6">

                                                    <ul class="simple_vertical_list">

                                                        <li>
                                                            <input type="checkbox" name="" id="color_btn_4">
                                                            <label for="color_btn_4" class="color_btn blue">Blue</label>
                                                        </li>

                                                        <li>
                                                            <input type="checkbox" name="" id="color_btn_5">
                                                            <label for="color_btn_5" class="color_btn grey">Grey</label>
                                                        </li>

                                                        <li>
                                                            <input type="checkbox" name="" id="color_btn_6">
                                                            <label for="color_btn_6" class="color_btn orange">Orange</label>
                                                        </li>

                                                    </ul>

                                                </div>

                                            </div>

                                        </fieldset>

                                    </div><!--/ .table_cell -->

                                    <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

                                </div><!--/ .table_row -->
                                <footer class="bottom_box">
                                    <div class="buttons_row">
                                        <button type="submit" class="button_grey button_submit">Search</button>
                                        <button type="reset" class="button_grey filter_reset">Reset</button>
                                    </div>
                                    <!--Back To Top-->
                                    <div class="back-to-top hidden-top"><i class="fa fa-angle-up"></i></div>
                                </footer>
                            </div><!--/ .table_layout -->



                        </form>
                    </div>

                </div>

                <div class="module product-simple">
                    <h3 class="modtitle">
                        <span>Latest products</span>
                    </h3>
                    <div class="modcontent">
                        <div id="so_extra_slider_1" class="so-extraslider">
                            <!-- Begin extraslider-inner -->
                            <div class="extraslider-inner">
                                <div class="item ">
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Mandouille short ">
                                                    <img src="image/catalog/demo/product/80/1.jpg" alt="Mandouille short">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Mandouille short">Mandouille short </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$76.00 </span>&nbsp;

                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Xancetta bresao ">
                                                    <img src="image/catalog/demo/product/80/2.jpg" alt="Xancetta bresao">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Xancetta bresao">
                                                    Xancetta bresao
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$80.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$89.00 </span>&nbsp;



                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Sausage cowbee ">
                                                    <img src="image/catalog/demo/product/80/3.jpg" alt="Sausage cowbee">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Sausage cowbee">
                                                    Sausage cowbee
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>

                                            <div class="content_price price">
                                    <span class="price product-price">
                                                    $66.00
                                                </span>
                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Chicken swinesha ">
                                                    <img src="image/catalog/demo/product/80/4.jpg" alt="Chicken swinesha">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Chicken swinesha">
                                                    Chicken swinesha
                                                </a>
                                            </div>
                                            <div class="rating">
                                    <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$45.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$56.00 </span>&nbsp;



                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                </div>
                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>

            </aside>
            <!--Right Part End -->


        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('front/js/theme    js/addtocart.js')}}"></script>
@endsection
