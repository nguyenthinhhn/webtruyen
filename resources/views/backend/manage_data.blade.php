@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body"><br>
        <h3>{{ __('trans.Backup') }}</h3>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="data">
            <thead>
                <tr>
                    <th class="stl-column color-column">#</th> 
                    <th class="stl-column color-column">{{ __('trans.Name file') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Link') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Size') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Date create') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th> 
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/admin/data.js') }}"></script>
@endsection
