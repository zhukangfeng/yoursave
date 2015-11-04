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
                        @if (Auth::check())
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @if (Session::get('ProduceCompany'))
                                <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('pages.mycompany.title.index') }}</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/mycompany') }}">{{ trans('pages.mycompany.title.show') }}</a></li>
                                        @if (Session::get('ProduceCompanyUser')->type !== DB_PRODUCE_COMPANY_USERS_TYPE_GUEST)
                                            <li><a href="{{ url('/mycompany/goods') }}">{{ trans('pages.mycompany.title.goods') }}</a></li>
                                            <li><a href="{{ url('/mycompany/users') }}">{{ trans('pages.mycompany.title.users') }}</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (Session::get('Shop'))
                                <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('pages.myshop.title.index') }}</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/myshop') }}">{{ trans('pages.myshop.title.show') }}</a></li>
                                        @if (Session::get('Shop')->type !== DB_PRODUCE_COMPANY_USERS_TYPE_GUEST)
                                            <li><a href="{{ url('/myshop/goods') }}">{{ trans('pages.myshop.title.goods') }}</a></li>
                                            <li><a href="{{ url('/myshop/users') }}">{{ trans('pages.myshop.title.users') }}</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Session::get('User')->u_name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/user') }}">{{ trans('pages.user.title.index') }}</a></li>
                                    <li><a href="{{ url('/user/friends') }}">{{ trans('pages.user.title.friends') }}</a></li>
                                    <li><a href="{{ url('/logout') }}">{{ trans('pages.common.buttons.logout') }}</a></li>
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
            <div class="flash-massage col-md-10 col-md-offset-1">
                @if (Session::has('success_messages'))
                    <div class="success-messages alert alert-success" role="alert">
                        @foreach (Session::get('success_messages') as $message)
                            <label>{{ $message }}</label><br />
                        @endforeach
                    </div>
                @endif
                @if (Session::has('waring_messages'))
                    <div class="waring-messages alert alert-info" role="alert">
                        @foreach (Session::get('waring_messages') as $message)
                            <label>{{ $message }}</label><br />
                        @endforeach
                    </div>
                @endif
                @if (Session::has('error_messages'))
                    <div class="error-messages alert alert-danger" role="alert">
                        @foreach (Session::get('error_messages') as $message)
                            <label>{{ $message }}</label><br />
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