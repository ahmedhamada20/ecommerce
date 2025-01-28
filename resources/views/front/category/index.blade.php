@extends('front.layouts.master')
@section('title')
    {{ $category->name() }}
@endsection

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">{{ $category->name() }}</a></li>
        </ul>

        <div class="row">

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <h3 class="title-category ">{{ $category->name() }}</h3>
                    <div class="category-desc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a href="#"><img src="{{ asset('storage/' . $category?->photo?->filename) }}"
                                                alt="img cate"><br></a>
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
                                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"
                                        data-original-title="Grid"><i class="fa fa-th"></i></button>
                                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip"
                                        data-original-title="List"><i class="fa fa-th-list"></i></button>
                                </div>

                            </div>
                            <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
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


                        </div>
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row nopadding-xs so-filter-gird grid">

                        @foreach ($products as $product)
                            <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item-container">
                                    <div class="left-block left-b">

                                        <div class="product-image-container second_img">
                                            <a href="{{ route('shop_details', app()->getlocale() === 'ar' ?$product->slug_ar :$product->slug_en) }}" target="_self" title="Lastrami bacon">
                                                <img src="{{ asset('storage/' .$product?->photo?->filename) }}"
                                                    class="img-1 img-responsive" alt="image1">
                                                <img src="{{ asset('storage/' .$product?->photo?->filename) }}"
                                                    class="img-2 img-responsive" alt="image2">
                                            </a>
                                        </div>
                                        <!--quickview-->
                                        <div class="so-quickview">




                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="##exampleModal{{$product->id }}">
                                                <i class="fa fa-eye"></i><span>Quick view</span>
                                            </button>
                                            @include('front.products.show_model')
                                        </div>
                                        <!--end quickview-->


                                    </div>
                                    <div class="right-block">
                                        <div class="button-group so-quickview cartinfo--left">
                                            <button type="button" data-toggle="modal" data-target="#addToCart{{$product->id}}" class="addToCart" title="Add to cart">
                                                <span>Add to cart </span>
                                            </button>
                                       


                                            <button type="button" data-toggle="modal" data-target="#addTowishlist{{$product->id}}" class="addToCart" title="Add to cart">
                                                <span>Add to Wishlist </span>
                                            </button>



                                            <button type="button" data-toggle="modal" data-target="#addTocomparisons{{$product->id}}" class="addToCart" title="Add to cart">
                                                <span>Compare this  Product </span>
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
                                                <span class="rating-num">( {{ $product->commentable->count() }} )</span>
                                            </div>
                                            <h4><a href="{{ route('shop_details', app()->getlocale() === 'ar' ? $product->slug_ar : $product->slug_en) }}" title="Pastrami bacon"
                                                    target="_self">{{ $product->name() }}</a></h4>

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
                                <form method="GET" action="{{ request()->url() }}" id="filtersForm">
                                    <div class="table_row">
                                        <!-- Category filter -->
                                        <div class="table_cell">
                                            <legend>Search</legend>
                                            <input class="form-control" type="text" name="search"
                                                value="{{ request()->search }}" placeholder="Search" autocomplete="off"
                                                oninput="this.form.submit()">
                                        </div>

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
                                        </div>

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
                                                <button  style="margin-top: 10px" class="btn btn-primary btn-sm">send</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>


                                <!--/ .table_row -->

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
                                    @foreach ($latestProducts as $row)
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="Mandouille short ">
                                                        <img src="{{ asset('storage/' . $row?->photo?->filename) }}"
                                                            alt="Mandouille short">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="#" target="_self"
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
            <!--Right Part End -->


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
                

                @if (auth_user())
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
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('front/js/theme    js/addtocart.js') }}"></script>
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
