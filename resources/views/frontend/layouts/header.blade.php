<header id="m_header" class="m-grid__item m-header" m-minimize="minimize" m-minimize-mobile="minimize"
        m-minimize-offset="10" m-minimize-mobile-offset="10">
    <div class="m-header__top">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- begin::Brand -->
                <div class="m-stack__item m-brand m-stack__item--left">
                    <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="#" class="m-brand__logo-wrapper">
                                <img alt=""
                                     src="{{ asset(config('assets.path_bower') . '/demo10/assets/demo/demo10/media/img/logo/logo_mini.png') }}"
                                     class="m-brand__logo-desktop"/>
                                <img alt=""
                                     src="{{ asset(config('assets.path_bower') . '/demo10/assets/demo/demo10/media/img/logo/logo_mini.png') }}"
                                     class="m-brand__logo-mobile"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- begin::Quick Actions-->
                            <a href="/" class="btn btn-link m-btn m-btn--icon m-btn--pill m-link">
                                <h6>@lang('frontend.home')</h6>
                            </a>
                            <!-- begin::Responsive Header Menu Toggler-->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- end::Responsive Header Menu Toggler-->
                            <!-- begin::Topbar Toggler-->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                            <!--end::Topbar Toggler-->
                        </div>
                    </div>
                </div>
                <!-- end::Brand -->
                <!-- begin::Topbar -->
                <div class="m-stack__item m-stack__item--right m-header-head" id="m_header_nav">
                    <div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light"
                                    m-dropdown-toggle="click" id="m_quicksearch"
                                    m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-nav__link-icon"><i class="flaticon-search-1"></i></span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner ">
                                            <div class="m-dropdown__header">
                                                <form method="POST" class="m-list-search__form" id="header-search">
                                                    <div class="m-list-search__form-wrapper">
                                                        <span class="m-list-search__form-input-wrapper">
                                                            <input type="text" name="search"
                                                                   class="m-list-search__form-input"
                                                                   placeholder="@lang('frontend.search')"/>
                                                            {{ csrf_field() }}
                                                        </span>
                                                        <span class="m-list-search__form-icon-close"
                                                              id="m_quicksearch_close">
                                                            <i class="la la-remove"></i>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div>
                                                <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true"
                                                     data-height="300" data-mobile-height="200">
                                                    <div class="m-dropdown__content">
                                                        <div id="search-suggest"
                                                             class="m-dropdown__header m--align-center"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-dropdown m-dropdown--small m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-topbar__userpic">
                                            <img src="{{ config('assets.path_bower') . '/countrys-flags/png/' . config('language.' . session('language') . '.icon') }}"
                                                 class="m--img-rounded m--marginless m--img-centered"
                                                 alt=""/>
                                        </span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center">
                                                <h5>@lang('frontend.language')</h5>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        @foreach(config('language') as $key => $lang)
                                                            <li class="m-nav__item {{ session('language') == $key ? 'm-nav__item--active' : null }}">
                                                                <a href="{{ route('client.language', ['lang' => $key]) }}"
                                                                   class="m-nav__link {{ session('language') == $key ? 'm-nav__item--active' : null }}">
                                                                <span class="m-nav__link-icon">
                                                                    <img class="m-topbar__language-img"
                                                                         src="{{ config('assets.path_bower') . '/countrys-flags/png/' . $lang['icon'] }}"></span>
                                                                    <span class="m-nav__link-title m-topbar__language-text m-nav__link-text">@lang('frontend.lang.' . $key)</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-dropdown m-dropdown--small m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <h6 class="m-topbar__userpic">
                                            {{ __('trans.Category') }}
                                        </h6>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        @foreach ($categories as $category)   
                                                        <span><button type="button" class="mg2 btn m-btn m-btn--gradient-from-danger"><a href="{{ asset('category') }}/{{ $category->slug }}">{{ $category->name }}</a></button></span>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @if(empty(Auth::user()))
                                <li class="m-nav__item m-dropdown m-dropdown--small m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="{{ asset('/user/login') }}" class="m-nav__link">
                                        <h6 class="m-topbar__userpic">
                                            {{ __('trans.Login') }}
                                        </h6>
                                    </a>
                                </li>
                                @else
                                    <li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                        m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-topbar__userpic">
                                            @if(isset(Auth::user()->avatar))
                                            <img src="{{ '/storage' . Auth::user()->avatar }}"
                                                 class="m--img-rounded m--marginless m--img-centered"
                                                 alt=""/>
                                            @else
                                                <img src="{{ asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                                 class="m--img-rounded m--marginless m--img-centered"
                                                 alt=""/>
                                            @endif
                                        </span>
                                            <span class="m-nav__link-icon m-topbar__usericon m--hide">
                                            <span class="m-nav__link-icon-wrapper"><i
                                                        class="flaticon-user-ok"></i></span>
                                        </span>
                                            <span class="m-topbar__username m--hide">@lang('frontend.home')</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <div class="m-card-user m-card-user--skin-light">
                                                        <div class="m-card-user__pic">
                                                            <img src="{{ Auth::user()->avatar ?? asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                                                 class="m--img-rounded m--marginless" alt=""/>
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">{{ Auth::user()->fullname }}</span>
                                                            <a href=""
                                                               class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text"></span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('client.profile') }}"
                                                                   class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-text">@lang('frontend.profile')</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('client.profile.follow') }}"
                                                                   class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-layers"></i>
                                                                    <span class="m-nav__link-text">@lang('frontend.List follow')</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('client.logout') }}"
                                                                   class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">@lang('frontend.log_out')</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end::Topbar -->
            </div>
        </div>
    </div>
</header>
