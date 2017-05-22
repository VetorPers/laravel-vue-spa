@extends('layouts.app')

@section('content')
    <ul>
        @foreach($lists as $list)
            <li><a href="{{url('/questions/'.$list->id)}}">{{$list->title}}</a></li>
        @endforeach
    </ul>
@endsection
