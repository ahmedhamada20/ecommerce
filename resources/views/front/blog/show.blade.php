@extends('front.layouts.master')
@section('title')
    blogs
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<style>
    div#social-links {
        margin: 0 auto;
        max-width: 500px;
    }
    div#social-links ul li {
        display: inline-block;
    }          
    div#social-links ul li a {
        padding: 20px;
        border: 1px solid #ccc;
        margin: 1px;
        font-size: 30px;
        color: #222;
        background-color: #ccc;
    }
</style>
@section('content')
    <!-- Main Container  -->
    <div class="main-container container">


        <div class="row">
            <!--Left Part Start -->
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
                                        <div class="product-layout item-inner">
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

                <div class="module banner-left hidden-xs ">
                    <div class="banner-sidebar banners">
                        <div>
                            <a title="Banner Image" href="#">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="article-info">
                    <div class="blog-header">
                        <h3>{{ $blog->name() }}</h3>
                    </div>
                    <div class="article-sub-title">
                        <span class="article-author">Post by: <a href="#"> {{ $blog->user->name() }}</a></span>
                        @php
                            $date = \Carbon\Carbon::parse($blog->created_at);
                        @endphp
                        <span class="article-date">
                            Created Date: {{ $date->format('D, M d, Y') }}
                        </span>
                        <span class="article-comment"> {{ $blog->count_comments }} Comments</span>
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('storage/' . $blog?->photo?->filename) }}" class="image-popup"><img
                                src="{{ asset('storage/' . $blog?->photo?->filename) }}"
                                alt="Kire tuma demonstraverunt lector"></a>
                    </div>

                    <div class="article-description">
                        <p>
                            {!! $blog->description() !!}
                        </p>



                        <div class="container mt-4">
                            <h2 class="mb-5 text-center">Share</h2>
                            {!! $shareComponent !!}
                        </div>
                    </div>

                    <div class="panel panel-default related-comment">
                        <div class="panel-body">
                            <div class="form-group">
                                <div id="comments" class="blog-comment-info">

                                    <h3 id="review-title">Leave your comment </h3>
                                    <input type="hidden" name="blog_article_reply_id" value="0" id="blog-reply-id">
                                    <div class="comment-left contacts-form row">
                                        <div class="col-md-6">
                                            <b>Your Name:</b>
                                            <br>
                                            <input type="text" name="name" value="" class="form-control">
                                            <br>
                                        </div>
                                        <div class="col-md-12">
                                            <b>Your Comment:</b>
                                            <br>
                                            <textarea rows="6" cols="50" name="text" class="form-control"></textarea>
                                            <span style="font-size: 11px;">Note: HTML is not translated!</span>
                                            <br>
                                            <br>
                                        </div>
                                       
                                    </div>
                                    <br>
                                    <div class="text-left"><a id="button-comment"
                                            class="btn buttonGray"><span>Submit</span></a>
                                    </div>
                                </div>
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
