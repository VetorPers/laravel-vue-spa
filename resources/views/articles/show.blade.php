@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            @if($article)
                <h1>{{$article->title}}</h1>
                <p>{{$article->body}}</p>
            @endif
        </div>
    </section>
@endsection
