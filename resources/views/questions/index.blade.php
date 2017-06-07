@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($lists as $list)
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img src="{{$list->user->avatar}}">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong> <a href="{{url('questions/'.$list->id)}}">{{$list->title}}</a></strong>
                            <br>
                            {{$list->user->name}} 发表于{{$list->created_at->diffForHumans()}}
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

@endsection

@push('scripts')
<script src="{{asset('js/plugins/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('js/plugins/readmore.min.js')}}"></script>
<script>
//    $('.article-body').readmore();
</script>
@endpush
