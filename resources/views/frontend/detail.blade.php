@extends('frontend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/home.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 m-portlet__body">
        <h4 class="m--font-primary"><a href="/"><b>{{ __('trans.Home') }}</b></a> >> {{ $manga->name }}</h4><br>
        <h3 class="text-center m--font-success text-uppercase">{{ $manga->name }}</h3><br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <a href="{{ asset('manga') }}/{{ $manga->slug }}">
                    <img class="width200" src="{{ asset('storage') }}{{ $manga->image }}">
                </a>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <ul class="list-info">
                    <li class="author row">
                        <p class="name col-xs-4 "><i class="fa fa-user"></i>{{ __('trans.Author') }} :</p> &nbsp
                        @foreach ($manga->authors as $author)
                        <a href="" class="col-xs-8">{{ $author->name }} &nbsp</a>
                        @endforeach
                    </li>
                    <li class="status row">
                        <p class="name col-xs-4"><i class="fa fa-rss"></i> {{ __('trans.Status') }} : </p>&nbsp
                        <p class="col-xs-8">Hoàn thành</p>
                    </li>
                    <li class="kind row">
                        <p class="name col-xs-4"><i class="fa fa-tags"></i> {{ __('trans.Category') }} : </p>&nbsp
                        @foreach ($manga->categories as $category)
                        <a href="{{ asset('category') }}/{{ $category->slug }}" class="col-xs-8">{{ $category->name }} &nbsp</a>
                        @endforeach
                    </li>
                    <li class="row">
                        <p class="name col-xs-4"><i class="fa fa-eye"></i> {{ __('trans.View') }} : &nbsp</p>
                        <p class="col-xs-8">{{ $manga->view }}</p>
                    </li>
                    <li class="row">
                        <p class="name col-xs-4">{{ $manga->created_at->diffForHumans() }}</p>
                    </li>
                </ul>
                <div>{{ __('trans.Ranking') }}: <rating v-bind:manga_id="{{ $manga->id }}" v-bind:manga_rate="{{ $manga->total_rate ? $manga->rate / $manga->total_rate : 0 }}"></rating><br>
                
                <div>
                    @if ($status == 0)
                    <p class="follow-link btn btn-success" onclick="follow({{ $manga->id }})" ><i class="fa fa-heart"></i> {{ __('trans.Follow') }}</p>
                    @else
                    <p class="follow-link btn btn-warning" onclick="follow({{ $manga->id }})"><i class="fas fa-minus-square"></i> {{ __('trans.UnFollow') }}</p>
                    @endif
                </div>
            </div><br><br>
        </div><br>
        <h3 class="m--font-warning">{{ __('trans.Content') }}</h3><hr>
        <h6>{{ $manga->description }}</h6><br>

        <h3 class="m--font-warning">{{ __('trans.Chapter') }}</h3><hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('trans.Chapter') }}</th>
                    <th>{{ __('trans.View') }}</th>
                    <th>{{ __('trans.Description') }}</th>
                    <th>{{ __('trans.Date create') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manga->chapters as $chapter)
                <tr>
                    <td><a href="{{ asset('manga') }}/{{ $manga->slug }}/{{ $chapter->slug }}">{{ $chapter->name }}</a></td>
                    <td>{{ $chapter->view }}</td>
                    <td>{{ $chapter->description }}</td>
                    <td>{{ $chapter->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="m-portlet__body width100">
            @if(empty($manga->chapters[0]))
                <h5 class="text-center">{{ __('trans.No chapter') }}</h5>
            @endif
            <div class="m-widget3">
                @foreach ($manga->comments as $comment)
                <div class="m-widget3__item">
                    <div class="m-widget3__header">
                        <div class="m-widget3__user-img">
                            <img class="m-widget3__img" src="{{ '/storage' . $comment->user->avatar }}" alt="">
                        </div>
                        <div class="m-widget3__info">
                            <span class="m-widget3__username">
                                {{ $comment->user->fullname }}
                            </span><br>
                            <span class="m-widget3__time">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <div class="m-widget3__body">
                        <p class="m-widget3__text">
                            {{ $comment->content }}
                        </p>
                    </div>
                </div>
                @endforeach
                <div id="append"></div>

                @if (!empty(Auth::user()))
                <div class="m-widget3__item">
                    <div class="m-widget3__header">
                        <div class="m-widget3__user-img">
                            @if(isset(Auth::user()->avatar))
                                <img class="m-widget3__img" src="{{ '/storage' . Auth::user()->avatar }}"
                                     alt=""/>
                            @else
                                <img class="m-widget3__img" src="{{ asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                     alt=""/>
                            @endif

                        </div>
                        <div class="m-widget3__info">
                            <span class="m-widget3__username">
                                {{ Auth::user()->fullname }}
                            </span><br>
                        </div>
                    </div>
                    <div class="m-widget3__body">
                        <form action="" id="comment" method="post" role="form">
                            @csrf
                            <p class="m-widget3__text">
                                <textarea class="form-control m-input" name="content" id="exampleTextarea" rows="2"></textarea>
                            </p>
                            <input type="hidden" name="manga_id" value="{{ $manga->id }}">
                            <button type="submit" class="btn btn-primary">{{ __('trans.Save') }}</button>
                        </form>
                    </div>
                </div>

                @endif
            </div>

        </div>
    </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-portlet" id="menuright">
        <div class="m-portlet__body"> 
            <h4 class="m--font-info">{{ __('trans.Top view manga') }}</h4><br>
            @foreach ($top5view as $key => $manga)   
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <h2>{{ $key + 1 }}</h2>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <a href="{{ asset('manga') }}/{{ $manga->slug }}">
                        <img class="width70" src="{{ asset('storage') }}{{ $manga->image }}">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h6 class="m--font-brand"><a href="{{ asset('manga') }}/{{ $manga->slug }}">{{ $manga->name }}</a></h6>
                    <p>{{ $manga->created_at->diffForHumans() }}</p>
                    <i class="fa fa-eye"></i> {{ $manga->view }} &nbsp <i class="fa fa-comment"></i>&nbsp {{ $manga->count_comment }}
                </div>
            </div>    
            <br>                                 
            @endforeach

            <h4 class="m--font-warning">{{ __('trans.Category') }}</h4><br>
            @foreach ($categories as $category)   
            <span><button type="button" class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning"><a href="{{ asset('category') }}/{{ $category->slug }}">{{ $category->name }}</a></button></span>
            @endforeach
            <br><br>

            <h4 class="m--font-warning">{{ __('trans.Suggestions') }}</h4><br>
            @foreach ($suggest as $key => $suggest)   
            @if ($key > 0 && $key < 6)
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <a href="{{ asset('manga') }}/{{ $suggest->slug }}">
                        <img class="width70" src="{{ asset('storage') }}{{ $suggest->image }}">
                    </a>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <h6 class="m--font-brand"><a href="{{ asset('manga') }}/{{ $suggest->slug }}">{{ $suggest->name }}</a></h6>
                    <p>{{ $suggest->created_at->diffForHumans() }}</p>
                    <i class="fa fa-eye"></i> {{ $suggest->view }} &nbsp <i class="fa fa-comment"></i>&nbsp {{ $manga->count_comment }}
                </div>
            </div>    
            <br>
            @endif 
            @endforeach
            <br>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/client/detail.js') }}"></script>
@endsection
