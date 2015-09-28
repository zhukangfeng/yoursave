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

<title>AdFlow:{{ $title }}</title>
@yield('assets')

</head>
<body id="{{ $id }}" class="{{ $class }}" mode="{{ $mode or ''}}" console="{{ $console or ''}}">

@yield('header')

<div class="contents-body">
    @if(Auth::check())
    @include('contents-console')
    @endif
    @yield('console')
    <div class="contents-area">
        @yield('content')
        @include('contents-footer')
    </div><!-- /.contents-area -->
</div><!-- /.contents-body -->

<div class="to-page-top"></div>

</body>
</html>