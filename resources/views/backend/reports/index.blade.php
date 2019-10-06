@extends('backend.layouts.main')
@section('title', trans('backend.report'))
@section('content')
    <div class="m-portlet m-portlet--tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        @lang('backend.report')
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin::Section-->
            <!--begin: Selected Rows Group Action Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30 collapse"
                 id="m_datatable_group_action_form">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="m-form__group m-form__group--inline">
                            <div class="m-form__label m-form__label-no-wrap">
                                <label class="m--font-bold m--font-danger-">@lang('backend.selected')
                                    <span id="m_datatable_selected_number"></span> :</label>
                            </div>
                            <div class="m-form__control">
                                <div class="btn-toolbar">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-accent btn-sm dropdown-toggle"
                                                data-toggle="dropdown">
                                            @lang('backend.update_status')
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="javascript:void(0)"
                                               onclick="updateAllStatus(1)">@lang('backend.active')</a>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                               onclick="updateAllStatus(-1)">@lang('backend.disable')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="m_datatable" id="local_record_selection" gets="{{ route('admin.report.gets') }}"></div>
            <!--end::Section-->
        </div>
    </div>
@endsection
@section('js_init')
    <script type="text/javascript" src="{{ asset('/js/admin/report.js') }}"></script>
@endsection
@section('css_init')

@endsection
