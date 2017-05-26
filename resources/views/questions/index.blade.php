@extends('layouts.app')

@section('content')
    <div class="container box">
        <ul>
            @foreach($lists as $list)
                <li><a href="{{url('/questions/'.$list->id)}}">{{$list->title}}</a></li>
            @endforeach
        </ul>
    </div>

@endsection
