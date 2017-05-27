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
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <img src="{{asset('img/vtr.png')}}" alt="">
                </a>
            </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
            <div class="nav-right nav-menu">
                <a class="nav-item is-tab is-hidden-mobile" href="{{url('/')}}">首页</a>{{--todo:is-active 设置a标签的点击事件--}}
                <a class="nav-item is-tab" href="{{url('questions')}}">
                    微微的社区
                </a>
                <a class="nav-item is-tab" href="{{url('questions/create')}}">提问</a>
                @if (Auth::guest())
                    <a class="nav-item is-tab">登录</a>
                    <a class="nav-item is-tab">注册</a>
                @else
                    <a class="nav-item is-tab">退出</a>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<!-- 配置文件 -->
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.all.js') }}"></script>
<script>
    window.UEDITOR_CONFIG.serverUrl = '{{ config('ueditor.route.name') }}'
</script>
@stack('scripts')
</body>
</html>
