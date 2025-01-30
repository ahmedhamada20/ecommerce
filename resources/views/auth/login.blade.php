{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

    <!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="https://laravel.wowdash.wowtheme7.com/assets/images/favicon.png" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/remixicon.css')}}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/bootstrap.min.css')}}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/apexcharts.css')}}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/dataTables.min.css')}}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/editor-katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/editor.atom-one-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/editor.quill.snow.css')}}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/flatpickr.min.css')}}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/full-calendar.css')}}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/jquery-jvectormap-2.0.5.css')}}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/magnific-popup.css')}}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/slick.css')}}">
    <!-- prism css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/prism.css')}}">
    <!-- file upload css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/file-upload.css')}}">

    <link rel="stylesheet" href="{{asset('dash/assets/css/lib/audioplayer.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('dash/assets/css/style.css')}}">
</head>

<body>

<section class="auth bg-base d-flex flex-wrap">
    <div class="auth-left d-lg-block d-none">
        <div class="d-flex align-items-center flex-column h-100 justify-content-center">
            <img src="https://laravel.wowdash.wowtheme7.com/assets/images/auth/auth-img.png" alt="">
        </div>
    </div>
    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">
            <div>
                <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
" class="mb-40 max-w-290-px">
                    <img src="https://laravel.wowdash.wowtheme7.com/assets/images/logo.png" alt="">
                </a>
                <h4 class="mb-12">Sign In</h4>
                <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                    <input type="email" class="form-control h-56-px bg-neutral-50 radius-12" name="email" placeholder="Email">
                </div>
                <div class="position-relative mb-20">
                    <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                        <input type="password" class="form-control h-56-px bg-neutral-50 radius-12" id="your-password" name="password" placeholder="Password">
                    </div>
                    <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                </div>
                <div class="">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remeber">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Sign In</button>



            </form>

            <a href="{{ route('auth.google.redirect') }}" class="btn bg-blue-100 p-3 shadow-sm border rounded-md text-blue-900">
                Login with Google 
            </a>
            <a href="{{ route('register') }}" class="btn bg-blue-100 p-3 shadow-sm border rounded-md text-blue-900">
               Register
            </a>
        </div>
    </div>
</section>

<!-- jQuery library js -->
<script src="{{asset('dash/assets/js/lib/jquery-3.7.1.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('dash/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
<!-- Apex Chart js -->
<script src="{{asset('dash/assets/js/lib/apexcharts.min.js')}}"></script>
<!-- Data Table js -->
<script src="{{asset('dash/assets/js/lib/dataTables.min.js')}}"></script>
<!-- Iconify Font js -->
<script src="{{asset('dash/assets/js/lib/iconify-icon.min.js')}}"></script>
<!-- jQuery UI js -->
<script src="{{asset('dash/assets/js/lib/jquery-ui.min.js')}}"></script>
<!-- Vector Map js -->
<script src="{{asset('dash/assets/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
<script src="{{asset('dash/assets/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Popup js -->
<script src="{{asset('dash/assets/js/lib/magnifc-popup.min.js')}}"></script>
<!-- Slick Slider js -->
<script src="{{asset('dash/assets/js/lib/slick.min.js')}}"></script>
<!-- prism js -->
<script src="{{asset('dash/assets/js/lib/prism.js')}}"></script>
<!-- file upload js -->
<script src="{{asset('dash/assets/js/lib/file-upload.js')}}"></script>
<!-- audioplayer -->
<script src="{{asset('dash/assets/js/lib/audioplayer.js')}}"></script>

<!-- main js -->
<script src="{{asset('dash/assets/js/app.js')}}"></script>

<script>
    // ================== Password Show Hide Js Start ==========
    function initializePasswordToggle(toggleSelector) {
        $(toggleSelector).on('click', function() {
            $(this).toggleClass("ri-eye-off-line");
            var input = $($(this).attr("data-toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    // Call the function
    initializePasswordToggle('.toggle-password');
    // ========================= Password Show Hide Js End ===========================
</script>

</body>

</html>
