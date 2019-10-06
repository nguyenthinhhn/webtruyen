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
    <link href="{{ asset(config('assets.path_bower').config('assets.style_css')) }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/admin/layouts.css') }}"
          rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->
    <!--begin::Page Vendors Styles -->
    <link href="{{ asset('/bower_components/metronic-theme/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}"
          rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon"
          href="{{ asset(config('assets.path_bower').config('assets.favicon')) }}"/>
    <link href="{{ asset('/bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('head')
    @yield('css_init')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
@include('backend.layouts.header')

<!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('backend.layouts.aside')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <!-- <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">@yield('title')</h3>
                    </div>
                </div>
            </div> -->

            <!-- END: Subheader -->
            <div class="m-content">
                @yield('content')
                
            </div>
        </div>
    </div>

    <!-- end:: Body -->

    <!-- begin::Footer -->
@include('backend.layouts.footer')

<!-- end::Footer -->
</div>

<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->
<!--begin::Global Theme Bundle -->
<script src="{{ asset(config('assets.path_bower').config('assets.vendors_js')) }}"
        type="text/javascript"></script>
<script src="{{ asset(config('assets.path_bower').config('assets.scripts_js')) }}"
        type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="{{ asset('/bower_components/metronic-theme/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}"
        type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{{ asset(config('assets.path_bower') . '/assets/app/js/dashboard.js') }}"
        type="text/javascript"></script>

<script src="{{ asset('/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"
        type="text/javascript"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('/js/lang.js') }}" type="text/javascript"></script>
@yield('footer')
@yield('js_init')
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
