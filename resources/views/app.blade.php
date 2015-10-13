<!DOCTYPE html>
<html lang="{{ trans('messages.common.lang') }}">
<head>

<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<link rel="shortcut icon" href="{{ asset('/shared/images/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('/shared/css/sanitize.css') }}" media="screen,print">
<link rel="stylesheet" href="{{ asset('/shared/css/style.css') }}" media="screen,print">
<link rel="stylesheet" href="{{ asset('/shared/css/language.css') }}" media="screen,print">
<link rel="stylesheet" href="{{ asset('/shared/css/jquery.datetimepicker.css') }}" media="screen,print">
<script type="text/javascript" src="{{ asset('/shared/scripts/lib/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/shared/scripts/lib/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('/shared/scripts/lib/jquery.datetimepicker.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('/shared/scripts/lib/keymaster.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('/shared/scripts/config.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('/shared/scripts/functions.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('/shared/scripts/controller.js') }}" defer></script>

<title>{{ trans('pages.common.app_name')}}:{{ $title or '' }}</title>
@yield('assets')

</head>
<body id="{{ $id or '' }}" class="{{ $class or '' }}" mode="{{ $mode or '' }}" console="{{ $console or '' }}" name="{{ $name or '' }}">

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