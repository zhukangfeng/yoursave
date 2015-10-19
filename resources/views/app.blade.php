<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>

<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<link rel="shortcut icon" href="{{ asset('/shared/images/favicon.ico') }}">
@include ('common_assets')
<title>{{ trans('pages.common.app_name')}}:{{ $title or '' }}</title>
@yield('assets')

</head>
<body id="{{ $id or '' }}" class="{{ $class or '' }}" mode="{{ $mode or '' }}" console="{{ $console or '' }}" name="{{ $name or '' }}">
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Yoursave</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @if (!is_null(Session::get('Account')))
                        @if (Session::get('Corporate')->contract_type == 0)
                        <li><a href="{{ url('/order') }}">案件オーダー</a></li>
                        <li><a href="{{ url('/material') }}">素材管理</a></li>
                        <li>
                            <a href="{{ url('/config') }}"　class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">各種設定</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/config/clients') }}">広告主管理</a></li>
                                <li><a href="{{ url('/config/tag') }}">タグ管理</a></li>
                                <li><a href="{{ url('/config/media') }}">メディアマスタ設定</a></li>
                                <li><a href="{{ url('/config/menus') }}">広告メニューマスタ設定</a></li>
                            </ul>
                        </li>
                        @endif
                        <li><a href="{{ url('/items/ordered') }}">案件一覧</a></li>
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->lastname.Auth::user()->firstname }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/user') }}">ユーザ情報</a></li>
                                <li><a href="{{ url('/accounts') }}">アカウント</a></li>
                                @if (!is_null(Session::get('Account')))
                                <li><a href="{{ url('/corp_info/corp') }}">企業情報管理</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    @yield('header')

    <div class="contents-body">
        @if(Auth::check())
        @include('console')
        @endif
        @yield('console')
        <div class="contents-area">
            <div class="flash-massage">
                @if (Session::has('success_messages'))
                    <div class="success-messages">
                        @foreach (Session::get('success_messages') as $message)
                            {{ $message }}<br />
                        @endforeach
                    </div>
                @endif
                @if (Session::has('waring_messages'))
                    <div class="waring-messages">
                        @foreach (Session::get('waring_messages') as $message)
                            {{ $message }}<br />
                        @endforeach
                    </div>
                @endif
                @if (Session::has('error_messages'))
                    <div class="error-messages">
                        @foreach (Session::get('error_messages') as $message)
                            {{ $message }}<br />
                        @endforeach
                    </div>
                @endif
            </div>
            @yield('content')
            @include('footer')
        </div><!-- /.contents-area -->
    </div><!-- /.contents-body -->

    <div class="to-page-top"></div>
</body>
</html>