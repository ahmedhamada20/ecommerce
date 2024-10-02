<!doctype html>
<html lang="en" dir="rtl">
<head>
   @include('admin.layouts.head')
</head>
<body>

<div class="wrapper" style="font-family: 'Cairo', sans-serif;">
    @include('admin.layouts.header')
    @include('admin.layouts.Activity')
    @include('admin.layouts.Sidebar')
    @include('admin.layouts.Menu')
    <div class="page-content">
        <div class="container-fluid">
            @include('admin.messages')
            @yield('content')
        </div>

        @include('admin.layouts.footer')
    </div>

</div>
@include('admin.layouts.footerjs')
</body>
</html>
