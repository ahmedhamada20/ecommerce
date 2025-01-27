<!-- ..::  breadcrumb  start ::.. -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">@yield('title')</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
            <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
"
               class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                @yield('title')
            </a>
        </li>
        <li>-</li>
        <li class="fw-medium">AI</li>
    </ul>
</div> <!-- ..::  header area end ::.. -->
