<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="index.html" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap"> 
                            <span class="m-menu__link-text">{{ __('trans.Dashboard') }}</span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">2</span>
                            </span> 
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Components</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            @can('manage-user')
            <li class="m-menu__item" m-menu-submenu-toggle="hover">
                <a href="/admin/user" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-network"></i>
                    <span class="m-menu__link-text">{{ __('trans.Manage user') }}</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('manage-category')
            <li class="m-menu__item" m-menu-submenu-toggle="hover">
                <a href="/admin/category" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-9"></i>
                    <span class="m-menu__link-text">{{ __('trans.Manage category') }}</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('manage-role')
            <li class="m-menu__item" m-menu-submenu-toggle="hover">
                <a href="/admin/role" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-suitcase"></i>
                    <span class="m-menu__link-text">{{ __('trans.Manage role') }}</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('manage-manga')
            <li class="m-menu__item" m-menu-submenu-toggle="hover">
                <a href="/admin/manga" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">{{ __('trans.Manage manga') }}</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('manage-database')
            <li class="m-menu__item" m-menu-submenu-toggle="hover">
                <a href="/admin/database" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">{{ __('trans.Manage database') }}</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('manage-report')
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">@lang('backend.report')</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item m-menu__item--parent" aria-haspopup="true">
                        <span class="m-menu__link">
                            <span class="m-menu__link-text">@lang('backend.report')</span>
                        </span>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('admin.report.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">@lang('backend.manager')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
