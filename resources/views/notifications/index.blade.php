@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="columns">
                    <div class="column is-10">
                        <div class="question-lists">
                            @foreach($lists as $list)
                                <div class="notification is-success">
                                    <button class="delete"></button>
                                    <a href="#">{{$list['data']['name']}}</a>给你发送了一封私信。
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
