<!doctype html>
<html lang="en">
<head>
@include('front.layouts.head')
</head>
<body class="common-home res layout-1">
<div id="wrapper" class="wrapper-fluid banners-effect-3">
    @include('front.layouts.header')
    @yield('content')
    @include('front.layouts.footer')
</div>
@include('front.layouts.footerjs')
</body>
</html>
