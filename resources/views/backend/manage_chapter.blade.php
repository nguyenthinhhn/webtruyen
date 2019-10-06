@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div>
    <div>
        <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Add chapter') }}</a>

        <br><br>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="chapters-table">
            <thead>
                <tr>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Name chapter') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Content') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Description') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Slug') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.View') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Status') }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="chapter_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Add chapter') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="">{{ __('trans.Name chapter') }}<span class="clred"> (*) </span></label>
                                    <input type="text" class="form-control" id="name" name="name" onkeyup="edit_slug()">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('trans.Slug') }}<span class="clred"> (*) </span></label>
                                    <input type="text" class="form-control" name="slug" id="slug_add">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('trans.Description') }}<span class="clred"> (*) </span></label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('trans.Content') }}<span class="clred"> (*) </span></label>
                                    <textarea class="form-control " id="content"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" name="manga_id" id="manga_id" value="{{ $id }}">
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
                    <form method="POST" action="" id="chapter_edit" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 class="text-center">{{ __('trans.Edit chapter') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="">{{ __('trans.Name chapter') }}<span class="clred"> (*) </span></label>
                                    <input type="text" class="form-control" id="name_edit" name="name" onkeyup="edit_slug()">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('trans.Slug') }}<span class="clred"> (*) </span></label>
                                    <input type="text" class="form-control" name="slug" id="slug_edit">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('trans.Description') }}<span class="clred"> (*) </span></label>
                                    <textarea class="form-control" name="description" id="description_edit" cols="30" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('trans.Content') }}<span class="clred"> (*) </span></label>
                                    <textarea class="form-control " id="content_edit"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" name="id" id="id_edit">
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
<script type="text/javascript" src="{{ asset('js/admin/chapter.js') }}"></script>
<script type="text/javascript">

</script>
@endsection
