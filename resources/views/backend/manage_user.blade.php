@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body">
        <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Add user') }}</a><br><br>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="users-table">
            <thead>
                <tr>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Account') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Name') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Email') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Avatar') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Role') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Exp') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Point') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Deactive/active') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Date create') }}</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="user_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center" >{{ __('trans.Add user') }}</h2>
                            @csrf
                            <br>
                            <div id="prod-error-add" class="text-center">
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img class="width150" id="avatar_show_add" src="{{ asset(config('assets.avatar_default')) }}">
                                            <label for="avatar">{{ __('trans.Select image') }}</label>
                                            <div style="display: none">
                                                <input type="file" id="avatar" name="avatar"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                
                                            <label> {{ __('trans.Role') }} </label><br>
                                            <select name="role" class="form-control" >
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Account') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="username" id="username_add" placeholder="Tài khoản đăng nhập" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Name') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="fullname" id="fullname_add" placeholder="Họ và tên" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Email') }}<span class="clred"> (*) </span></label>
                                                <input type="email" class="form-control" name="email" id="email_add" placeholder="Email" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Password') }}<span class="clred"> (*) </span></label>
                                                <input type="password" class="form-control" name="password1_add" id="password1_add" required>
                                                        <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Password confirm') }}<span class="clred"> (*) </span></label>
                                                <input type="password" class="form-control" name="password2_add" id="password2_add" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
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

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="user_edit" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Edit user') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img width="150px" id="avatar_show_edit" src="{{ asset(config('assets.avatar_default')) }}">
                                            <label for="avatar">{{ __('trans.Select image') }}</label>
                                            <div style="display: none">
                                                <input type="file" id="avatar_edit" name="avatar"/>
                                            </div>
                                            <input type="hidden" id="id_edit" name="id"/>
                                        </div>
                                        <div class="form-group">                                
                                            <label> {{ __('trans.Role') }} </label><br>
                                            <select name="role" class="form-control" >
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Account') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="username" id="username_edit" placeholder="Tài khoản đăng nhập" readonly>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Name') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="fullname" id="fullname_edit" placeholder="Họ và tên" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Email') }}<span class="clred"> (*) </span></label>
                                                <input type="email" class="form-control" name="email" id="email_edit" placeholder="Email" readonly>
                                                <div class="help-block with-errors"></div>
                                            </div> 
                                        </div>
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
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/admin/user.js') }}"></script>
@endsection
