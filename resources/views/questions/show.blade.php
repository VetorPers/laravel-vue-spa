@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column">
            @if($inf)
                <div class="tile is-parent box">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <article class="tile is-child">
                                <p class="title"><strong>{{$inf->title}}</strong></p>
                                <div class="content">
                                    {{$inf->body}}
                                </div>
                                <p>
                                    <small>10条评论</small>
                                </p>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="columns">
                        <div class="column is-10 is-offset-1">
                            <div class="columns">
                                <div class="column is-8">
                                    <div class="box">

                                        @foreach($inf->answers as $answer)
                                            <article class="media">
                                                <figure class="media-left">
                                                    <p class="image is-64x64 border-radius">
                                                        <img src="{{$answer->user->avatar}}">
                                                    </p>
                                                </figure>
                                                <div class="media-content">
                                                    <div class="content">
                                                        <p>
                                                            <strong>{{$answer->user->name}}</strong>
                                                            <br>
                                                            {{$answer->body}}
                                                            <br>
                                                            <small><a>赞</a> · <a>回复</a>
                                                                · {{$answer->created_at->diffForHumans()}}
                                                            </small>
                                                        </p>
                                                    </div>

                                                    @foreach($answer->comments as $comment)
                                                        <article class="media">
                                                            <figure class="media-left">
                                                                <p class="image is-48x48 border-radius">
                                                                    <img src="{{$comment->user->avatar}}">
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
                                                                            · {{$comment->created_at->diffForHumans()}}
                                                                        </small>
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
                                                            <textarea class="textarea"
                                                                      placeholder="填写你的答案..."></textarea>
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
                                <div class="column is-4">
                                    <div class="card">
                                        <header class="card-header">
                                            <p class="card-header-title">
                                                关于作者
                                            </p>
                                        </header>
                                        <div class="card-content">
                                            <div class="content">
                                                <article class="media">
                                                    <figure class="media-left">
                                                        <p class="image is-64x64 border-radius">
                                                            <img src="{{$inf->user->avatar}}" alt="">
                                                        </p>
                                                    </figure>
                                                    <div class="media-content">
                                                        <div class="content">
                                                            <p>
                                                                <strong>{{$inf->user->name}}</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </article>

                                                <hr>
                                                <div class="user-statics">
                                                    <div class="statics-item">
                                                        <div class="statics-text">问题</div>
                                                        <div class="statics-count"><strong>10</strong></div>
                                                    </div>
                                                    <div class="statics-item">
                                                        <div class="statics-text">回答</div>
                                                        <div class="statics-count"><strong>10</strong></div>
                                                    </div>
                                                    <div class="statics-item">
                                                        <div class="statics-text">关注者</div>
                                                        <div class="statics-count"><strong>10</strong></div>
                                                    </div>
                                                </div>

                                                <div style="margin-top: 15px;">
                                                    <a class="button is-success" style="width: 100px"><span
                                                                style="margin-right: 5px"
                                                                class="icon"><i
                                                                    class="fa fa-plus"></i></span>关注他</a>
                                                    <a class="button pull-right" style="width: 100px"><span
                                                                style="margin-right: 5px"
                                                                class="icon"><i
                                                                    class="fa fa-comments-o"></i></span>发私信</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
