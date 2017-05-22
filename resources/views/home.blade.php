@extends('layouts.app')

@section('content')
    <ul>
        @foreach($articles as $article)
            <li><a href="{{url('articles/'.$article->id)}}">{{$article->title}}</a></li>
        @endforeach
    </ul>
@endsection
