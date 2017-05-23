@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-8">
            @if($inf)
                <strong>{{$inf->title}}</strong>
                <p>{{$inf->body}}</p>
                <hr>

                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">

                            @foreach($inf->answers as $answer)
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-64x64">
                                            <img src="http://bulma.io/images/placeholders/128x128.png">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <p>
                                                <strong>{{$answer->user->name}}</strong>
                                                <br>
                                                {{$answer->body}}
                                                <br>
                                                <small><a>赞</a> · <a>回复</a> · {{$answer->created_at->diffForHumans()}}
                                                </small>
                                            </p>
                                        </div>

                                        @foreach($answer->comments as $comment)
                                            <article class="media">
                                                <figure class="media-left">
                                                    <p class="image is-48x48">
                                                        <img src="http://bulma.io/images/placeholders/96x96.png">
                                                    </p>
                                                </figure>
                                                <div class="media-content">
                                                    <div class="content">
                                                        <p>
                                                            <strong>{{$comment->user->name}}</strong>
                                                            <br>
                                                            {{$comment->body}}
                                                            <br>
                                                            <small><a>赞</a> · <a>回复</a>
                                                                · {{$comment->created_at->diffForHumans()}}</small>
                                                        </p>
                                                    </div>

                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                </article>
                            @endforeach

                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                        <img src="http://bulma.io/images/placeholders/128x128.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="field">
                                        <p class="control">
                                            <textarea class="textarea" placeholder="填写你的答案..."></textarea>
                                        </p>
                                    </div>
                                    <div class="field level-right">
                                        <p class="control">
                                            <button class="button">提交答案</button>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="column is-4"></div>
    </div>
@endsection
