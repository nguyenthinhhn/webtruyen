@extends('frontend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/home.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 m-portlet__body">
        <h3 class="colorh">{{ __('trans.Manga new') }}</h3>
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
                <div class="bge7e7ff align-center">
                    <i class="fa fa-eye"></i> {{ $manga->view }} &nbsp<i class="fa fa-comment"></i>&nbsp {{ $manga->count_comment }}
                </div><br>
                <h6 class="m--font-brand align-center"><a class="m--font-info" href="{{ asset('manga/') }}/{{ $manga->slug }}">{{ $manga->name }}</a></h6>
                <p class="align-center">{{ $manga->created_at->diffForHumans() }}</p>
            </div>
            @endforeach
        </div>
        {!! $manganew->links() !!}
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
            <div class="category">
            <div><br>
            <h4 class="colorh">{{ __('trans.Category') }}</h4>
            @foreach ($categories as $category)   
            <span><button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info category-tag "><a class="colorwhite" href="{{ asset('category') }}/{{ $category->slug }}">{{ $category->name }}</a></button></span>
            @endforeach
            <br>
            <div><br><br>
            <div class="m-widget3">
                <h4 class="colorh">{{ __('trans.New comment') }}</h4>
                @foreach ($comments as $comment) 
                <div class="m-widget3__item">
                    <div class="m-widget3__header">
                        <div class="m-widget3__user-img">
                            @if(isset($comment->user->avatar))
                                <img class="m-widget3__img" src="{{ '/storage' . $comment->user->avatar }}" alt="">
                            @else
                                <img class="m-widget3__img" src="{{ asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                             alt=""/>
                            @endif
                        </div>
                        <div class="m-widget3__info">
                            <b class="m--font-info">
                                {{ $comment->user->fullname }}
                            </b><br>
                            <span class="m-widget3__time">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <div class="m-widget3__body">
                        <a href="{{ asset('manga') }}/{{ $comment->manga->slug }}">{{$comment->manga->name}}<a>
                        <p class="m-widget3__text">
                            {{ $comment->content }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@endsection
