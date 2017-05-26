@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <ul>
                @foreach($articles as $article)
                    <li><a href="{{url('/articles/'.$article->id)}}">{{$article->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
