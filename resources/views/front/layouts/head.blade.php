<!-- Basic page needs
    ============================================ -->
<title>@yield('title')</title>
<meta charset="utf-8">
<meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
<meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
<meta name="author" content="Magentech">
<meta name="robots" content="index, follow" />

<!-- Mobile specific metas
============================================ -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicon
============================================ -->
<link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png" />
@if(app()->getLocale() === 'ar')
    <link href="{{asset('front/css/custem-rtl.css')}}" rel="stylesheet">
@else
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap/css/bootstrap.min.css') }}">
@endif


<link href="{{asset('front/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('front/js/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('front/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<link href="{{asset('front/css/themecss/lib.css')}}" rel="stylesheet">
<link href="{{asset('front/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{asset('front/js/minicolors/miniColors.css')}}" rel="stylesheet">

<!-- Theme CSS
============================================ -->
<link href="{{asset('front/css/themecss/so_searchpro.css')}}" rel="stylesheet">
<link href="{{asset('front/css/themecss/so_megamenu.css')}}" rel="stylesheet">
<link href="{{asset('front/css/themecss/so-categories.css')}}" rel="stylesheet">
<link href="{{asset('front/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
<link href="{{asset('front/css/themecss/so-category-slider.css')}}" rel="stylesheet">
<link href="{{asset('front/css/themecss/so-newletter-popup.css')}}" rel="stylesheet">
<!-- cdn fontawsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="{{asset('front/css/footer/footer1.css')}}" rel="stylesheet">
<link href="{{asset('front/css/header/header1.css')}}" rel="stylesheet">
<link id="color_scheme" href="{{asset('front/css/theme.css')}}" rel="stylesheet">
<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('front/css/custem.css')}}" rel="stylesheet">


<!-- Google web fonts
============================================ -->
<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
<style type="text/css">
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>
<link rel="stylesheet" href="{{ asset('front/css/bootstrap/css/bootstrap.min.css') }}">
@yield('css')
