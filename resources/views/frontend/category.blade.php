@extends('frontend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/home.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 m-portlet__body">
        <h3 class="colorh">{{ __('trans.Manga category') }}</h3>
        <div class="row" id="post">
            @foreach ($manganew as $manga)                                           
            <div class=" col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                <a href="{{ asset('manga') }}/{{ $manga->slug }}">
                    @if($manga->cover == 1)
                        <img class="image" src="{{ $manga->image }}">
                    @else
                        <img class="image" src="{{ asset('storage') }}{{ $manga->image }}">
                    @endif
                </a>
                <div class="bge7e7ff">
                    <i class="fa fa-eye"></i> {{ $manga->view }} &nbsp<i class="fa fa-comment"></i>&nbsp {{ $manga->count_comment }}
                </div><br>
                <h6 class="m--font-brand"><a class="m--font-info" href="{{ asset('manga') }}/{{ $manga->slug }}">{{ $manga->name }}</a></h6>
                <p>{{ $manga->created_at->diffForHumans() }}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-portlet" id="menuright">
        <div class="m-portlet__body"> 
            <h4 class="colorh">{{ __('trans.Top view manga') }}</h4><br>
            @foreach ($top5view as $key => $manga)   
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <h2>{{ $key + 1 }}</h2>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <a href="{{ asset('manga') }}/{{ $manga->slug }}">
                        @if($manga->cover == 1)
                            <img class="width70" src="{{ $manga->image }}">
                        @else
                            <img class="width70" src="{{ asset('storage') }}{{ $manga->image }}">
                        @endif
                    </a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h6><a class="m--font-info" href="{{ asset('manga') }}/{{ $manga->slug }}">{{ $manga->name }}</a></h6>
                    <p>{{ $manga->created_at->diffForHumans() }}</p>
                    <i class="fa fa-eye"></i> {{ $manga->view }} &nbsp <i class="fa fa-comment"></i>&nbsp {{ $manga->count_comment }}
                </div>
            </div>    
            <br>                                 
            @endforeach

            <h4 class="colorh">{{ __('trans.Category') }}</h4><br>
            @foreach ($categories as $category)   
            <span><button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info category-tag "><a class="colorwhite" href="{{ asset('category') }}/{{ $category->slug }}">{{ $category->name }}</a></button></span>
            @endforeach
            <br>
        </div>
    </div>
</div>
@endsection

@section('footer')
@endsection
