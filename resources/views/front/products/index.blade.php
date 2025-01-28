@extends('front.layouts.master')
@section('title')
Products
@endsection
@section('css')

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
                                        <input class="form-control" type="text" name="search"
                                            value="{{ request()->search }}" size="30" autocomplete="off"
                                            placeholder="Search" oninput="this.form.submit()">
                                    </div><!--/ .table_cell -->

                                    <!-- Sub Category filter -->
                                    <div class="table_cell">
                                        <fieldset>
                                            <legend>Sub Category</legend>
                                            <ul class="">
                                                @foreach ($categories as $category)

                                                <li>
                                                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                                        @if (in_array($category->id, request()->get('category', [])))
                                                        checked @endif onchange="this.form.submit()"
                                                        id="{{$category->id}}">
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

                    @foreach ($products as $product)
                                        <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">

                                                    <div class="product-image-container second_img">
                                                        <a href="{{ route('shop_details', app()->getLocale() === 'ar' ? $product->slug_ar : $product->slug_en) }}"
                                                            target="_self" title="Lastrami bacon">
                                                            <img src="{{ asset('storage/' . $product?->photo?->filename) }}"
                                                                class="img-1 img-responsive" alt="image1">
                                                            <img src="{{ asset('storage/' . $product?->photo?->filename) }}"
                                                                class="img-2 img-responsive" alt="image2">
                                                        </a>
                                                    </div>
                                                    <!--quickview-->
                                                    <div class="so-quickview">


                                                        <button type="button" data-toggle="modal" data-target="#addToCart{{$product->id}}"
                                                            class="addToCart" title="Add to cart">
                                                            <span>Add to cart </span>
                                                        </button>



                                                        <button type="button" data-toggle="modal"
                                                            data-target="#addTowishlist{{$product->id}}" class="addToCart"
                                                            title="Add to cart">
                                                            <span>Add to Wishlist </span>
                                                        </button>



                                                        <button type="button" data-toggle="modal"
                                                            data-target="#addTocomparisons{{$product->id}}" class="addToCart"
                                                            title="Add to cart">
                                                            <span>Compare this Product </span>
                                                        </button>


                                                    </div>



                                                </div>
                                                <div class="right-block">

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
                                                            <span class="rating-num">( {{ $product->commentable->count() }} )</span>
                                                        </div>
                                                        <h4><a href="{{ route('shop_details', app()->getlocale() === 'ar' ? $product->slug_ar : $product->slug_en) }}"
                                                                title="Pastrami bacon" target="_self">{{ $product->name() }}</a></h4>

                                                    </div>
                                                    <p class="price">
                                                        <span class="price-new">${{ $product->price }}</span>

                                                    </p>
                                                    <div class="description item-desc hidden">
                                                        <p>
                                                            {{ $product->short_description() }}
                                                        </p>
                                                    </div>
                                                    <div class="list-block hidden">
                                                        <button class="addToCart btn-button" type="button" title="Add to Cart"
                                                            onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                                        </button>
                                                        <button class="wishlist btn-button" type="button" title="Add to Wish List"
                                                            onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                                        </button>
                                                        <button class="compare btn-button" type="button" title="Compare this Product"
                                                            onclick="compare.add('101');"><i class="fa fa-refresh"></i>
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

@foreach ($products as $product)


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


                    @if (auth_user())
                        <form action="{{route('addTowishlists')}}" method="post">
                            @csrf

                            <input type="hidden" name="product_id" value="{{$product->id}}">

                            <div class="row">
                                <div class="col">
                                    <label>Are you sure you want to add this product to your Wishlist?
                                        {{$product->name()}}</label>

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


    <div class="modal fade" id="addTocomparisons{{$product->id}}" tabindex="-1" role="dialog"
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

                            <input type="hidden" name="product_id" value="{{$product->id}}">

                            <div class="row">
                                <div class="col">
                                    <label>Are you sure you want to add this product to your comparisons?
                                        {{$product->name()}}</label>

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

@endsection

@section('js')
<script>
    $(document).ready(function () {
        let minPrice = parseFloat("{{ request()->min_price ?? '10.00' }}");
        let maxPrice = parseFloat("{{ request()->max_price ?? '5000.00' }}");

        $("#price_slider").slider({
            range: true,
            min: 10,
            max: 5000,
            values: [minPrice, maxPrice],
            slide: function (event, ui) {
                $(".min_val").text("$" + ui.values[0].toFixed(2));
                $(".max_val").text("$" + ui.values[1].toFixed(2));

                $("#price_min").val(ui.values[0].toFixed(2));
                $("#price_max").val(ui.values[1].toFixed(2));
            },
            stop: function () {
                $("#filtersForm").submit();
            }
        });
    });
</script>
@endsection