@extends('front.layouts.master')
@section('title')
About Us
@endsection

@section('content')
       <!-- Main Container  -->
       <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Page</a></li>
            <li><a href="#">About Us 2</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">

                <div class="about-us about-demo-2">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 about-us-center about-4" style="margin-top: 20px;margin-bottom: 20px;">
                            <div class="col-md-6">
                                <div class="about-image-slider">
                                    <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1"
                                        data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                   
                                     <div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="  {{isset(get_settings()['aboutus_image']) ? asset(get_settings()['aboutus_image']) : ''}}" alt="About Us"> </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="content-description">
                                    <h2 class="about-title">About Us</h2>
                                    <p>{{ isset(get_settings()['about_us']) ?   json_decode(get_settings()['about_us'], true)[app()->getLocale()] : ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                   
                </div>
             

            </div>
        </div>
    </div>
    <!-- //Main Container -->
@endsection

@section('js')
  
@endsection
