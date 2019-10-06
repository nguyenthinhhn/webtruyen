<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | Manga Mega</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="{{ asset('/js/webfont.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Global Theme Styles -->
    <link href="{{ asset(config('assets.path_bower').config('assets.vendors_css')) }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset(config('assets.path_bower').config('assets.style_css_client')) }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/frontend/layouts.css') }}"
          rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->
    <!--begin::Page Vendors Styles -->
    <link href="{{ asset('/bower_components/metronic-theme/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}"
          rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon"
          href="{{ asset(config('assets.path_bower').config('assets.favicon')) }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('css_init')
    @yield('head')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m-page--loading-enabled m-page--loading m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">
<!-- begin::Page loader -->
<div class="m-page-loader m-page-loader--base">
    <div class="m-blockui">
        <span>@lang('frontend.please_wait')</span>
        <span>
            <div class="m-loader m-loader--brand"></div>
        </span>
    </div>
</div>
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- begin::Header -->
    @include('frontend.layouts.header')
    <!-- end::Header -->
    <div class="mgtop100 m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content" id="app">
                @yield('content')
            </div>
        </div>
    </div>
    @include('frontend.layouts.footer')
</div>

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->
<!--begin::Global Theme Bundle -->
<script src="{{ asset(config('assets.path_bower').config('assets.vendors_js')) }}"
        type="text/javascript"></script>
<script src="{{ asset(config('assets.path_bower').config('assets.scripts_js_client')) }}"
        type="text/javascript"></script>
<script src="{{ asset('/js/firebase-6.0.4/firebase-app.js') }}"></script>
<script src="{{ asset('/js/firebase-6.0.4/firebase-auth.js') }}"></script>
<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="{{ asset('/bower_components/metronic-theme/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('/js/client/main.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('/js/lang.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/app.js') }}" defer></script>
<!--end::Page Vendors -->
<!--begin::Page Scripts -->
@yield('js_init')
@yield('footer')
<!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
