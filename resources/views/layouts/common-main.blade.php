<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- cssをインポート -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>@yield('title')</title>
    @yield('css')

</head>
<body>
    @include('components.header-main')
    @yield('content')
    @include('components.footer')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>