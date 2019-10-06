@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body">
        <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Add category') }}</a><br><br>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="categories-table">
            <thead>
                <tr>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Name') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Slug') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Title') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Description') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Keywords') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Date create') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="category_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <h2 class="text-center" >{{ __('trans.Add category') }}</h2>
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('trans.Name') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" onkeyup="edit_slug()" name="name" id="name_add">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Slug') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="slug" id="slug_add">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Title') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="meta_title" >
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Description') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="meta_description">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Keywords') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="meta_keywords">
                            <div class="help-block with-errors"></div>
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
                    <form method="POST" action="" id="category_edit" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <h2 class="text-center;">{{ __('trans.Edit category') }}</h2>
                        @csrf
                        <input type="hidden" id="id_edit" name="id">
                        <div class="form-group">
                            <label for="">{{ __('trans.Name') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" onkeyup="edit_slug()" name="name" id="name_edit">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Slug') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="slug" id="slug_edit">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Title') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="meta_title" id='meta_title_edit'>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Description') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="meta_description" id='meta_description_edit'>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('trans.Keywords') }}<span class="clred"> (*) </span></label>
                            <input type="text" class="form-control" name="meta_keywords" id='meta_keywords_edit'>
                            <div class="help-block with-errors"></div>
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
<script type="text/javascript" src="{{ asset('js/admin/category.js') }}"></script>
@endsection
