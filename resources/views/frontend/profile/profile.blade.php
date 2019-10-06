@extends('frontend.layouts.main')
@section('title', trans('frontend.profile'))
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height   m-portlet--rounded">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                @if(isset(Auth::user()->avatar))
                                    <img src="{{ '/storage' . Auth::user()->avatar }}"
                                     alt=""/>
                                @else
                                    <img src="{{ asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                     alt=""/>
                                @endif
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ Auth::user()->fullname }}</span>
                            <a href="" class="m-card-profile__email m-link">{{ Auth::user()->email }}</a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text"></span>
                        </li>
                        <li class="m-nav__item {{ route('client.profile') == URL::current() ? 'm-nav__item--active' : null }}">
                            <a href="{{ route('client.profile') }}"
                               class="m-nav__link {{ route('client.profile') == URL::current() ? 'm-nav__item--active' : null }}">
                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">@lang('frontend.profile')</span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__item {{ route('client.profile.follow') == URL::current() ? 'm-nav__item--active' : null }}">
                            <a href="{{ route('client.profile.follow') }}"
                               class="m-nav__link {{ route('client.profile.follow') == URL::current() ? 'm-nav__item--active' : null }}">
                                <i class="m-nav__link-icon flaticon-share"></i>
                                <span class="m-nav__link-text">@lang('frontend.List follow')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="@yield('head_icon')"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                @yield('head_title')
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    @yield('content_profile')
                </div>
            </div>
        </div>
    </div>

@endsection
