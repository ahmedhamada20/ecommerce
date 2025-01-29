@extends('front.layouts.master')
@section('title')
    blogs
@endsection

@section('content')

    <!-- Main Container  -->
    <div class="main-container container">


        <div class="row">

            <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column " id="column-left">


                <div class="module product-simple">
                    <h3 class="modtitle">
                        <span>Latest products</span>
                    </h3>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <!-- Begin extraslider-inner -->
                            <div class="yt-content-slider extraslider-inner">
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
                                                    title="Mandouille short"> </a>
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

                <div class="module banner-left hidden-xs ">
                    <div class="banner-sidebar banners">
                        <div>
                            <a title="Banner Image" href="#">
                                <img src="image/catalog/banners/banner-sidebar.jpg" alt="Banner Image">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="blog-header">
                    <h3>Our Blog</h3>

                </div>
                <div class="blog-category clearfix">
                    <div class="blog-listitem row">
                        @foreach($blogs as $blog)
                            <div class="blog-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-item-inner clearfix">
                                    <div class="itemBlogImg clearfix">
                                        <div class="article-image">
                                            <div>
                                                <a class="popup-gallery"
                                                   href="{{asset('storage/'.$blog?->photo?->filename)}}">
                                                    <img src="{{asset('storage/'.$blog?->photo?->filename)}}"
                                                         alt="Duis autem vel eum irure sed diam nonumy"/>
                                                </a>
                                            </div>
                                            <div class="article-date">
                                                <div class="date"> <span class="article-date">
                                       @php
                                           $date = \Carbon\Carbon::parse($blog->updated_at);
                                       @endphp
                                    <b>{{ $date->format('d') }}</b> {{ $date->format('M') }}
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="itemBlogContent clearfix ">
                                        <div class="blog-content">
                                            <div class="article-title font-title">
                                                <h4><a href="{{route('home.blog_detail',$blog->slug)}}">
                                                        {{$blog->name()}}
                                                    </a></h4>
                                            </div>
                                            <div class="blog-meta"><span class="author"><i class="fa fa-user"></i><span>{{$blog->user->name()}}</span>
                                            </div>
                                            <p class="article-description">{{$blog->short_description()}}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="product-filter product-filter-bottom filters-panel clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->
@endsection

@section('js')
@endsection
