@extends('front.layouts.master')
@section('title')
Products
@endsection

@section('content')
<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Funitures</a></li>
    </ul>

    <div class="row">

        <!--Middle Part Start-->
        <div id="content" class="col-md-12 col-sm-12">

            <div class="products-category">


                <!--Content Top -->
                <div class="module filter-v3">
                    <h3 class="modtitle">Filter </h3>
                    <div class="modcontent">
                        <form method="GET" action="{{ request()->url() }}" id="filtersForm">
                            <div class="table_layout filter-row">
                                <div class="table_row">
                                    <!-- Category filter -->
                                    <div class="table_cell" style="z-index: 103;">
                                        <legend>Search</legend>
                                        <input class="form-control" type="text" name="search" value="{{ request()->search }}" size="30" autocomplete="off"
                                            placeholder="Search" oninput="this.form.submit()">
                                    </div><!--/ .table_cell -->
                                    
                                    <!-- Sub Category filter -->
                                    <div class="table_cell">
                                        <fieldset>
                                            <legend>Sub Category</legend>
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
                                    </div><!--/ .table_cell -->
                                    
                                    <!-- Price filter -->
                                    <div class="table_cell">
                                        <fieldset>
                                            <legend>Price</legend>
                                            <div>
                                                Range :
                                                <span class="min_val">${{ request()->min_price ?? '10.00' }}</span> -
                                                <span class="max_val">${{ request()->max_price ?? '5000.00' }}</span>
                                                <input type="hidden" name="min_price" id="price_min"
                                                       value="{{ request()->min_price ?? '10.00' }}">
                                                <input type="hidden" name="max_price" id="price_max"
                                                       value="{{ request()->max_price ?? '5000.00' }}">
                                            </div>
                                            <div id="price_slider"></div>
                                        </fieldset>
                                    </div><!--/ .table_cell -->
                                </div><!--/ .table_row -->
                            </div><!--/ .table_layout -->
                        </form>
                    </div>

                </div>
                <!--Content Top End -->


                <!-- Filters -->
                <div class="product-filter product-filter-top filters-panel">
                    <div class="row">
                        <div class="col-sm-5 view-mode">

                            <div class="list-view">
                                <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"
                                    data-original-title="Grid"><i class="fa fa-th"></i></button>
                                <button class="btn btn-default list" data-view="list" data-toggle="tooltip"
                                    data-original-title="List"><i class="fa fa-th-list"></i></button>
                            </div>

                        </div>
                        <div class="short-by-show form-inline text-right col-md-7 col-sm-7 col-xs-12">
                            <div class="form-group short-by">
                                <label class="control-label" for="input-sort">Sort By:</label>
                                <select id="input-sort" class="form-control"
                                    onchange="location = '{{ request()->url() }}?sort=' + this.value;">
                                    <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default
                                    </option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name
                                        (A
                                        - Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                        Name
                                        (Z - A)</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                        Price
                                        (Low &gt; High)</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                        Price (High &gt; Low)</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-limit">Show:</label>
                                <select id="input-limit" class="form-control"
                                    onchange="location = '{{ request()->fullUrlWithQuery(['limit' => '']) }}' + this.value;">
                                    <option value="15" {{ request('limit') == '15' ? 'selected' : '' }}>15</option>
                                    <option value="25" {{ request('limit') == '25' ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('limit') == '50' ? 'selected' : '' }}>50</option>
                                    <option value="75" {{ request('limit') == '75' ? 'selected' : '' }}>75</option>
                                    <option value="100" {{ request('limit') == '100' ? 'selected' : '' }}>100
                                    </option>
                                </select>

                            </div>
                        </div>
                        <!-- <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                                <ul class="pagination">
                                    <li class="active"><span>1</span></li>
                                    <li><a href="">2</a></li><li><a href="">&gt;</a></li>
                                    <li><a href="">&gt;|</a></li>
                                </ul>
                            </div> -->
                    </div>
                </div>
                <!-- //end Filters -->

                <!--changed listings-->
                <div class="products-list row nopadding-xs so-filter-gird">

                    @foreach ($products as $row)
                    <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                        <div class="product-item-container">
                            <div class="left-block left-b">

                                <div class="product-image-container second_img">
                                    <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}" target="_self" title="Lastrami bacon">
                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}" class="img-1 img-responsive" alt="image1">
                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}" class="img-2 img-responsive" alt="image2">
                                    </a>                                    
                                </div>
                                <!--quickview-->
                                <div class="so-quickview">




                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="##exampleModal{{ $row->id }}">
                                        <i class="fa fa-eye"></i><span>Quick view</span>
                                    </button>
                                    @include('front.products.show_model')
                                </div>
                                <!--end quickview-->


                            </div>
                            <div class="right-block">
                                <div class="button-group so-quickview cartinfo--left">
                                    <button type="button" class="addToCart" title="Add to cart"
                                        onclick="cart.add('60 ');">
                                        <span>Add to cart </span>
                                    </button>
                                    <button type="button" class="wishlist btn-button" title="Add to Wish List"
                                        onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish
                                            List</span>
                                    </button>
                                    {{-- <button type="button" class="compare btn-button" title="Compare this Product "
                                        onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this
                                            Product</span>
                                    </button> --}}

                                </div>
                                <div class="caption hide-cont">
                                    <div class="ratings">
                                        <div class="rating-box">
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
                                        <span class="rating-num">( {{ $row->commentable->count() }} )</span>
                                    </div>
                                    <h4><a href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->slug_ar : $row->slug_en) }}" title="Pastrami bacon"
                                            target="_self">{{ $row->name() }}</a></h4>

                                </div>
                                <p class="price">
                                    <span class="price-new">${{ $row->price }}</span>

                                </p>
                                <div class="description item-desc hidden">
                                    <p>
                                        {{ $row->short_description() }}
                                    </p>
                                </div>
                                <div class="list-block hidden">
                                    <button class="addToCart btn-button" type="button" title="Add to Cart"
                                        onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                    </button>
                                    <button class="wishlist btn-button" type="button" title="Add to Wish List"
                                        onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                    </button>
                                    <button class="compare btn-button" type="button"
                                        title="Compare this Product" onclick="compare.add('101');"><i
                                            class="fa fa-refresh"></i>
                                    </button>
                                    <!--quickview-->
                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                        href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i
                                            class="fa fa-eye"></i></a>
                                    <!--end quickview-->
                                </div>
                            </div>

                        </div>
                    </div>

                    @endforeach
                 
                   

                </div>
                <!--// End Changed listings-->

                <!-- Filters -->
                <div class="product-filter product-filter-bottom filters-panel">
                    <div class="row">
                        <div class="col-sm-6 text-left"></div>
                        <div class="col-sm-6 text-right">Showing 1 to 15 of 15 (1 Pages)</div>
                    </div>
                </div>
                <!-- //end Filters -->

            </div>

        </div>



    </div>
    <!--Middle Part End-->
</div>
<!-- //Main Container -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        let minPrice = parseFloat("{{ request()->min_price ?? '10.00' }}");
        let maxPrice = parseFloat("{{ request()->max_price ?? '5000.00' }}");

        $("#price_slider").slider({
            range: true,
            min: 10,
            max: 5000,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $(".min_val").text("$" + ui.values[0].toFixed(2));
                $(".max_val").text("$" + ui.values[1].toFixed(2));

                $("#price_min").val(ui.values[0].toFixed(2));
                $("#price_max").val(ui.values[1].toFixed(2));
            },
            stop: function() {
                $("#filtersForm").submit();
            }
        });
    });
</script>
@endsection