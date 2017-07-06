@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="columns">
                    <div class="column is-8">
                        <div class="question-lists">
                            @foreach($lists as $list)
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-64x64 border-radius">
                                            <img src="{{$list->fromUser->avatar}}">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <p>
                                                {{$list->body}}
                                                <br>
                                                <small>{{$list->created_at->diffForHumans()}}</small>
                                                <br>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
