@extends('layouts.app')

@section('content')
    @if($article)
        <h1>{{$article->title}}</h1>
        <p>{{$article->body}}</p>
    @endif
@endsection
