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
<body>
    <div class="contents-body">
        <div class="contents-area">
            @yield('content')
            @include('footer')
        </div>
    </div>
</body>
</html>