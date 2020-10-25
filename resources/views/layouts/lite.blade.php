<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield("title")</title>
    <link rel="icon" href="{{ asset(\App\Custom::$info['c-logo']) }}">

    <link rel="stylesheet" href="{{ asset('theme/css/chatbot.css') }}">
    <link rel="stylesheet" href="{{asset('theme/vendor/feather-icons-web/feather.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendor/animate_it/animate.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">

    @yield('head')
</head>
<body>

    <div class="min-vh-100 d-flex justify-content-between align-items-center">
        @yield('content')
    </div>

    <script src="{{ asset('theme/js/jquery.js') }}"></script>
    @yield("foot")
</body>
</html>
