@section('title', trans('frontend.profile'))
@section('head_icon', 'flaticon-profile-1')
@section('head_title', trans('frontend.profile'))
@extends('frontend.profile.profile')
@section('content_profile')
    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('client.profile.save') }}"
          method="post">
        @csrf
        <div class="m-portlet__body">
            @if(session('response'))
                <div class="form-group m-form__group m--margin-top-10">
                    <div class="alert m-alert alert-{{ session('response')['status'] }}" role="alert">
                        <strong>{{ session('response')['messages'] }}</strong>
                    </div>
                </div>
            @endif
            <div class="form-group m-form__group row">
                <div class="col-10 ml-auto">
                    <h3 class="m-form__section">@lang('frontend.personal_details')</h3>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="fullname" class="col-2 col-form-label">@lang('frontend.fullname')</label>
                <div class="col-7">
                    <input id="fullname" name="fullname" class="form-control m-input" type="text"
                           value="{{ Auth::user()->fullname }}" placeholder="@lang('auth.fullname_plh')">
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-7">
                        <button type="submit"
                                class="btn btn-accent m-btn m-btn--air m-btn--custom">@lang('frontend.save_changes')
                        </button>&nbsp;&nbsp;
                        <button type="reset"
                                class="btn btn-secondary m-btn m-btn--air m-btn--custom">@lang('frontend.cancel')
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="_id" value="{{ Auth::user()->id }}">
    </form>
@endsection
