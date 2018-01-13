<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SoundCloud') }}</title>
    <link href="https://a-v2.sndcdn.com/assets/images/sc-icons/favicon-2cadd14b.ico" rel="icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/styles.css') !!}

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    <div id="app">
        @include('nav-bar')

        @yield('content')
    </div>

    <!-- Scripts -->
    {!! Html::script('assets/js/popper.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
