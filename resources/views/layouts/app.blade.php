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
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        Laravel.apiToken = "{{Auth::check() ? 'Bearer '.Auth::user()->api_token : 'Bearer '}}";
    </script>
</head>
<body>
<div id="app">
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <a class="nav-item">
                    <img src="{{asset('img/vtr.png')}}" alt="">
                    <a class="nav-item is-tab" href="{{url('questions')}}">
                        微微的社区
                    </a>
                    <div class="nav-item">
                        <p class="control has-icons-right">
                            <input class="input" type="text" placeholder="搜索你感兴趣的内容...">
                            <span class="icon is-small is-right">
                                <i class="fa fa-search"></i>
                            </span>
                        </p>
                    </div>
                    <div class="nav-item">
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="button is-primary" href="{{url('questions/create')}}">
                                    <span>提问</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="nav-right nav-menu">
                <a href="" class="nav-item is-tab"><span class="icon"><i class="fa fa-bell"></i></span></a>
                <a href="{{url('/messages')}}" class="nav-item is-tab"><span class="icon"><i
                                class="fa fa-commenting"></i></span></a>
                @if (Auth::guest())
                    <a class="nav-item is-tab" href="{{url('/login')}}">登录</a>
                    <a class="nav-item is-tab" href="{{url('/register')}}">注册</a>
                @else
                    <div class="setting">
                        <a class="nav-item is-tab" data-toggle="dropdown"><img
                                    src="{{asset(Auth::user()->avatar)}}" alt=""
                                    style="border: 1px solid #7a7a7a;border-radius:14px">
                        </a>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#"><i class="fa fa-user fa-icon-lg"></i> 我的主页</a>
                                <a href="#"><i class="fa fa-user fa-icon-lg"></i> 我的主页</a>
                                <a href="{{url('/logout')}}"><i class="fa fa-user fa-icon-lg"></i> 退出</a>
                            </li>
                        </ul>
                    </div>
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
