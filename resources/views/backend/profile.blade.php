@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<!-- END: Subheader -->
<div class="m-content">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <img src="{{ asset('storage') }}{{ $user->avatar }}" alt="" />
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $user->fullname }}</span>
                            <a href="" class="m-card-profile__email m-link">{{ $user->email }}</a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__item">
                            <p class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                <span class="m-nav__link-text">{{ $user->role->title }}</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    {{ __('trans.Update profile') }}
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    {{ __('trans.Change password') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <form class="m-form m-form--fit m-form--label-align-right" id='updateprofile'>
                            <div class="m-portlet__body">
                                @csrf
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">{{ __('trans.User name') }}</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{ $user->username }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">{{ __('trans.Email') }}</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>    
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">{{ __('trans.Full name') }}</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" name="fullname" type="text" value="{{ $user->fullname }}">
                                    </div>
                                </div>    
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">{{ __('trans.Save') }}</button>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <form class="m-form m-form--fit m-form--label-align-right" id="editpass">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">{{ __('trans.Password') }}</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" id="pw1" name="pw1">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">{{ __('trans.New password') }}</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" id="pw2" name="pw2">
                                    </div>
                                </div>    
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">{{ __('trans.Confirm password') }}</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" id="pw3" name="pw3">
                                    </div>
                                </div>    
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submid" class="btn btn-accent m-btn m-btn--air m-btn--custom">{{ __('trans.Save') }}</button>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/admin/user.js') }}"></script>
@endsection
