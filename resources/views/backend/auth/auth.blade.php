<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>Login | Manga Mega</title>
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
    <link rel="shortcut icon"
          href="{{ asset(config('assets.path_bower').config('assets.favicon')) }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3 auth-bg" id="m_login">
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{ asset(config('assets.path_bower').config('assets.auth_logo')) }}">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">@lang('auth.title')</h3>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('login') }}" method="post">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="@lang('auth.email_plh')" name="email"
                                   autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password"
                                   placeholder="@lang('auth.password_plh')" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox m-checkbox--light">
                                    <input type="checkbox" name="remember"> @lang('auth.remember')
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">@lang('auth.forget_password')</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit"
                                    class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">@lang('auth.sign_in')
                            </button>
                        </div>
                    </form>
                </div>
                <div class="m-login__signup">
                    <div class="m-login__head">
                        <h3 class="m-login__title">@lang('auth.sign_up')</h3>
                        <div class="m-login__desc">@lang('auth.sign_up_desc')</div>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('register') }}" method="post">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="@lang('auth.fullname_plh')" name="fullname">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="@lang('auth.username_plh')" name="username">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="@lang('auth.email_plh')" name="email"
                                   autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="password" placeholder="@lang('auth.password_plh')" name="password">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password"
                                   placeholder="@lang('auth.password_re_plh')" name="password_confirmation">
                        </div>
                        <div class="row form-group m-form__group m-login__form-sub">
                            <div class="col m--align-left">
                                <label class="m-checkbox m-checkbox--light">
                                    <input type="checkbox" name="agree">@lang('auth.agree_term') <a href="#" class="m-link m-link--focus">@lang('auth.terms_and_conditions')</a>
                                    <span></span>
                                </label>
                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signup_submit"
                                    class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">@lang('auth.sign_up')
                            </button>&nbsp;&nbsp;
                            <button id="m_login_signup_cancel"
                                    class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">@lang('auth.cancel')
                            </button>
                        </div>
                    </form>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">@lang('auth.forgotten_title')</h3>
                        <div class="m-login__desc">@lang('auth.forgotten_desc')</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="@lang('auth.email_plh')" name="email"
                                   id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit"
                                    class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                @lang('auth.request')
                            </button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel"
                                    class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">@lang('auth.cancel')
                            </button>
                        </div>
                    </form>
                </div>
                <div class="m-login__account">
                    <span class="m-login__account-msg">
                        @lang('auth.forgotten_msg_1')
                    </span>&nbsp;&nbsp;
                    <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">@lang('auth.sign_up')</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Global Theme Bundle -->
<script src="{{ asset(config('assets.path_bower').config('assets.vendors_js')) }}"
        type="text/javascript"></script>
<script src="{{ asset(config('assets.path_bower').config('assets.scripts_js')) }}"
        type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script src="{{ asset('/js/login.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/lang.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
