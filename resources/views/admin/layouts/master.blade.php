<!doctype html>
<html lang="en" data-theme="light">
<head>
    @include('admin.layouts.head')
</head>
<body>
@include('admin.layouts.sidebar')
<main class="dashboard-main" id="{{app()->getLocale() == "ar" ? 'rtlMain' : 'ltrMain'}}" style="{{app()->getLocale() == "ar" ? 'direction: rtl; display: block;' : null}}">
    @include('admin.layouts.navbar')
    <div class="dashboard-main-body">
        @include('admin.layouts.breadcrumb')

        @yield('content')
    </div>
    @include('admin.layouts.footer')
</main>
@include('admin.layouts.footer_script')
</body>
</html>
