@extends('backend.layouts.main')

@section('head')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
    <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Import file') }}</a><br><br>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/calender/import" method="POST" role="form" enctype="multipart/form-data">
                        <legend>Form title</legend>
                        @csrf
                        <div class="form-group">
                            <label for="">label</label>
                            <input type="file" class="form-control" name="calender" id="" placeholder="Input field">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/admin/user.js') }}"></script>
@endsection
