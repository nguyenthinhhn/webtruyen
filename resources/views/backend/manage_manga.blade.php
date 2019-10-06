@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body">
        <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Add manga') }}</a><br><br>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mangas-table">
            <thead>
                <tr>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Name manga') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Image') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Description') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Rate') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Total rate') }}</th>  
                    <th class="stl-column color-column">{{ __('trans.Status') }}</th>
                    <th class="stl-column color-column">{{ __('trans.View') }}</th>

                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="manga_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Add manga') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img class="width150" id="avatar_show_add" src="{{ asset(config('assets.avatar_default')) }}">
                                            <label for="avatar">{{ __('trans.Select image') }}</label>
                                            <div class='dp-none'>
                                                <input type="file" id="avatar" name="image"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                           
                                            <label> {{ __('trans.Category') }} </label><br>
                                            <select name="category[]" class="form-control" multiple>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">                           
                                            <label> {{ __('trans.Author') }} </label><br>
                                            <select name="author" class="form-control">
                                                @foreach ($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Name manga') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" onkeyup="edit_slug()" id="name_add" name="name" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Slug') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" id="slug_add" name="slug" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Description') }}<span class="clred"> (*) </span></label>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="10" required></textarea>
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
                    <form method="POST" action="" id="manga_edit" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Edit manga') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="hidden" id="id_edit" name="id">
                                        <div class="form-group">
                                            <img class="width150" id="avatar_show_edit" src="{{ asset(config('assets.avatar_default')) }}">
                                            <label for="avatar">{{ __('trans.Select image') }}</label>
                                            <div class="dp-none">
                                                <input type="file" id="avatar_edit" name="image"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                           
                                            <label> {{ __('trans.Category') }} </label><br>
                                            <select name="category[]" class="form-control" multiple>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">                           
                                            <label> {{ __('trans.Author') }} </label><br>
                                            <select name="author" class="form-control">
                                                @foreach ($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Name manga') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Slug') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" id="slug" name="slug" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Description') }}<span class="clred"> (*) </span></label>
                                                <textarea class="form-control" id="description" name="description" id="" cols="30" rows="10" required></textarea>
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
<script type="text/javascript" src="{{ asset('js/admin/manga.js') }}"></script>
@endsection
