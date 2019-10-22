@extends('frontend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/chepter.css') }}">
@endsection

@section('content')
    <div class="cont col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <div class="alert alert-info" role="alert">
            <h2><strong><a style="color: white" href="{{ asset('manga') }}/{{ $manga->slug }}">{{ $manga->name}}</a> - </strong> {{ $chapter->name }}</h2>
        </div>
        <div class="thumbnail">
            {!! $chapter->content !!}
        </div>
        <br>
        @foreach ($listchapter as $chap)
            @if ($chap->slug == $chapter->slug)
                <a href="{{ asset('manga') }}/{{ $manga->slug }}/{{ $chap->slug }}"><button type="button" class="btn btn-outline-success active">{{ $chap->name }}</button></a>
            @else 
                <a href="{{ asset('manga') }}/{{ $manga->slug }}/{{ $chap->slug }}"><button type="button" class="btn btn-outline-success m-btn m-btn--outline-2x ">{{ $chap->name }}</button></a>
            @endif
        @endforeach
    </div>
@endsection

@section('footer')
@endsection
