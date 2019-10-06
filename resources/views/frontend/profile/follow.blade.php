@section('title', trans('frontend.List follow'))
@section('head_icon', 'flaticon-share')
@section('head_title', trans('frontend.List follow'))
@extends('frontend.profile.profile')
@section('content_profile')
    <div class="m-portlet__body">
        <table class="table m-table m-table--head-bg-brand">
            <thead>
            <tr>
                <th>#</th>
                <th>@lang('frontend.manga_name')</th>
                <th>@lang('trans.Description')</th>
                <th>@lang('trans.View')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mangas as $manga)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a class="m-link"
                           href="{{ '/manga/' . $manga->slug }}">{{ $manga->name }}</a>
                    </td>
                    <td>
                        <span>{{ $manga->description }}</span>
                    </td>
                    <td>
                        <span>{{ $manga->view }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
