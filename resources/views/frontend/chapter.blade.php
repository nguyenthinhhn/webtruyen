@extends('frontend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/chepter.css') }}">
@endsection

@section('content')
<div class="bg75">
    <div class="cont">
        <br>
        <div class="alert alert-info" role="alert">
            <h2><strong>{{ $manga->name}} - </strong> {{ $chapter->name }}</h2>
        </div>
        {!! $chapter->content !!}
        <br>
        @foreach ($listchapter as $chap)
            @if ($chap->slug == $chapter->slug)
                <a href="{{ asset('manga') }}/{{ $manga->slug }}/{{ $chap->slug }}"><button type="button" class="btn btn-outline-success active">{{ $chap->name }}</button></a>
            @else 
                <a href="{{ asset('manga') }}/{{ $manga->slug }}/{{ $chap->slug }}"><button type="button" class="btn btn-outline-success m-btn m-btn--outline-2x ">{{ $chap->name }}</button></a>
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('footer')
@endsection
