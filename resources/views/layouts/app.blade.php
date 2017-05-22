<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <a class="nav-item">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="nav-item is-tab is-hidden-mobile is-active" href="{{url('/')}}">首页</a>
                <a class="nav-item is-tab is-hidden-mobile">Features</a>
                <a class="nav-item is-tab is-hidden-mobile">Pricing</a>
                <a class="nav-item is-tab is-hidden-mobile">About</a>
            </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
            <div class="nav-right nav-menu">
                <a class="nav-item is-tab" href="{{url('questions')}}">
                    微微的社区
                </a>
                <a class="nav-item is-tab">退出</a>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
