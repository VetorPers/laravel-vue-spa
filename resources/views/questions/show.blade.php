@extends('layouts.app')

@section('content')
    <div class="content">
        @if($inf)
            <div class="content_head box">
                <div class="tile is-parent">
                    <div class="columns" style="width: 100%">
                        <div class="column is-10 is-offset-1">
                            <div class="columns">
                                <div class="column is-6 is-offset-2">
                                    <div class="topics">
                                        @foreach($inf->topics as $topic)
                                            <span class="tag is-primary">{{$topic->name}}</span>
                                        @endforeach
                                    </div>
                                    <article class="tile is-child">
                                        <p class="title"><strong>{{$inf->title}}</strong></p>
                                        <div class="content">
                                            {!! $inf->body !!}
                                        </div>
                                        <p>
                                            <small><span class="icon is-small"><i
                                                            class="fa fa-comment"></i></span>{{$inf->answers_count}}条回答
                                            </small>
                                        </p>
                                    </article>
                                </div>
                                <div class="column is-4">
                                    <div class="question-statics">
                                        <div class="statics-item pull-left">
                                            <div class="statics-text">关注者</div>
                                            <div class="statics-count"><strong>{{$inf->followers_count}}</strong></div>
                                        </div>
                                        <div class="statics-item pull-left">
                                            <div class="statics-text">被浏览</div>
                                            <div class="statics-count"><strong>100</strong></div>
                                        </div>
                                    </div>
                                    @if(Auth::check())
                                        <div style="margin-top: 50px;">
                                            <question-follow-button question="{{$inf->id}}"></question-follow-button>
                                            <a class="button is-info is-outlined" style="width: 100px" id="answer"><span
                                                        style="margin-right: 5px"
                                                        class="icon"><i
                                                            class="fa fa-pencil-square-o"></i></span>写回答</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="columns">
                    <div class="column is-10 is-offset-1">
                        <div class="columns">
                            <div class="column is-8 box">
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
                                                    <small>
                                                        @if(Auth::check())
                                                            <like-this-answer
                                                                    answer="{{$answer->id}}"></like-this-answer>
                                                            · <a class="no-like-a">回复</a>·
                                                        @endif
                                                        {{$answer->created_at->diffForHumans()}}
                                                    </small>

                                                </p>
                                            </div>

                                            @foreach($answer->comments as $comment)
                                                <div style="margin-right: 50px">
                                                    <strong>{{$comment->user->name}}:</strong>
                                                    {{$comment->body}}
                                                    <small class="pull-right">{{$comment->created_at->diffForHumans()}}</small>
                                                    <br>
                                                </div>
                                            @endforeach
                                            <form action="{{url('/comments')}}" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="answer_id" value="{{$answer->id}}">
                                                <div class="field">
                                                    <p class="control">
                                                        <input class="input" type="text" name="body">
                                                    </p>
                                                </div>

                                                <div class="field is-grouped pull-right">
                                                    <p class="control">
                                                        <button class="button is-small is-link">取消</button>
                                                    </p>
                                                    <p class="control">
                                                        <button class="button is-small is-primary">提交</button>
                                                    </p>
                                                </div>
                                            </form>

                                        </div>
                                    </article>
                                @endforeach

                                @if(Auth::check())
                                    <article class="media">
                                        <figure class="media-left">
                                            <p class="image is-64x64 border-radius">
                                                <img src="{{Auth::user()->avatar}}">
                                            </p>
                                        </figure>
                                        <div class="media-content">

                                            <form action="{{url('questions/'.$inf->id.'/answer')}}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="field">
                                                    <p class="control">
                                                            <textarea class="textarea"
                                                                      placeholder="填写你的答案..." name="body"
                                                                      id="answer-box"></textarea>
                                                    </p>
                                                </div>
                                                <div class="field level-right">
                                                    <p class="control">
                                                        <button class="button" type="submit">提交答案</button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </article>
                                @endif
                            </div>
                            <div class="column is-4" style="margin-top: -12px;padding-right: 50px">
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
                                                    <div class="statics-count">
                                                        <strong>{{$inf->user->questions_count}}</strong></div>
                                                </div>
                                                <div class="statics-item">
                                                    <div class="statics-text">回答</div>
                                                    <div class="statics-count">
                                                        <strong>{{$inf->user->answers_count}}</strong></div>
                                                </div>
                                                <div class="statics-item">
                                                    <div class="statics-text">关注者</div>
                                                    <div class="statics-count">
                                                        <strong>{{$inf->user->followers_count}}</strong></div>
                                                </div>
                                            </div>

                                            @if(Auth::check())
                                                @if(Auth::id()!==$inf->user_id)
                                                    <div style="margin-top: 15px;margin-left: 15px">
                                                        <user-follow-button
                                                                user="{{$inf->user_id}}"></user-follow-button>
                                                        <a class="button" id="send-message" style="width: 100px"><span
                                                                    style="margin-right: 5px"
                                                                    class="icon"><i
                                                                        class="fa fa-comments-o"></i></span>发私信</a>
                                                    </div>
                                                @endif
                                            @endif

                                            {{--发送私信--}}
                                            <div class="modal send-message-modal">
                                                <div class="modal-background"></div>
                                                <div class="modal-card" style="width: 400px">
                                                    <header class="modal-card-head">
                                                        <p class="modal-card-title">发送私信</p>
                                                        <button class="delete send-message-delete"></button>
                                                    </header>
                                                    <form action="{{url('/messages')}}" method="post">
                                                        {!! csrf_field() !!}
                                                        <section class="modal-card-body">
                                                            <div style="margin-bottom: 6px;">
                                                                <strong>{{$inf->user->name}}</strong>
                                                                <input type="hidden" value="{{$inf->user_id}}"
                                                                       name="to_user_id">
                                                            </div>
                                                            <p class="control"><textarea class="textarea"
                                                                                         placeholder="私信内容"
                                                                                         name="body"></textarea>
                                                            </p>
                                                        </section>
                                                        <footer class="modal-card-foot">
                                                            <button class="button is-success" type="submit">发送</button>
                                                            <a class="button send-message-delete">取消</a>
                                                        </footer>
                                                    </form>
                                                </div>
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
@endsection

@push('scripts')
<script>
    $('#answer').click(function () {
        $('#answer-box').focus();
    });

    $('#send-message').click(function () {
        $('.send-message-modal').addClass('is-active');
    });

    $('.send-message-delete').click(function () {
        $('.send-message-modal').removeClass('is-active');
    });
</script>
@endpush
