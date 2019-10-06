@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body">
        <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Add role') }}</a><br><br>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="roles-table">
            <thead>
                <tr>
                    <th class="stl-column color-column">#</th> 
                    <th class="stl-column color-column">{{ __('trans.Name role') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.List Permission') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Date create') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th> 
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="modal-permission">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="permission_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Add Permission') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <input type="hidden" id="role_id" name="role_id">
                                <div id="form-step-0" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="">{{ __('trans.Name role') }}<span class="clred"> (*) </span></label>
                                        <select name="permission_id" class="form-control" >
                                            @foreach ($permissions as $permission)
                                            <option value="{{$permission->id}}">{{$permission->code}}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('trans.Save') }}</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('trans.Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="role_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Add role') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="">{{ __('trans.Role') }}<span class="clred"> (*) </span></label>
                                    <input type="text" class="form-control" name="title" required>
                                    <div class="help-block with-errors"></div>      
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('trans.Save') }}</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('trans.Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/admin/role.js') }}"></script>
@endsection
