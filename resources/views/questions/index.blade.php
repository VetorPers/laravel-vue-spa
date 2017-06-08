@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="columns">
                    <div class="column is-8">
                        <div class="question-head box">
                            问题列表头部
                        </div>
                        <div class="question-lists">
                            <div class="new-action"><h4 class="ui dividing header"><i class="fa fa-list fa-icon-lg"
                                                                                      style="margin-right: 10px;vertical-align: bottom"></i>最新动态
                                </h4></div>
                            <hr>
                            @foreach($lists as $list)
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-64x64 border-radius">
                                            <img src="{{$list->user->avatar}}">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <p>
                                                <strong><a href="{{url('questions/'.$list->id)}}">{{$list->title}}</a></strong>
                                                <br>
                                                <strong><a href="" class="user-name-a">{{$list->user->name}}</a></strong>
                                                <small>发表于{{$list->created_at->diffForHumans()}}</small>
                                                <br>
                                            <div class="article-body">
                                                {{mb_substr(strip_tags($list->body),0,66,"utf-8")}}
                                            </div>
                                            </p>
                                        </div>
                                        <nav class="level is-mobile">
                                            <div class="level-left">
                                                <a class="level-item">
                                                    <span class="icon is-small"><i class="fa fa-reply"></i></span>
                                                </a>
                                                <a class="level-item">
                                                    <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                                                </a>
                                                <a class="level-item">
                                                    <span class="icon is-small"><i class="fa fa-heart"></i></span>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="column is-3 is-offset-1">
                        推荐列表
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{asset('js/plugins/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('js/plugins/readmore.min.js')}}"></script>
<script>
    //    $('.article-body').readmore();
</script>
@endpush
