<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>{{ config('app.name', 'SoundCloud') }}</title>
    <!-- Page Favicon -->
    <link href="https://a-v2.sndcdn.com/assets/images/sc-icons/favicon-2cadd14b.ico" rel="icon">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
      <!-- Marter layout -->
    {!! Html::style('assets/css/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('assets/css/views/nav-bar.css') !!}
      <!-- Sub-views Styles -->
    @yield('styles')


    <!-- Fonts -->
    <link href="{{ asset('fonts/interstate/style.css') }}" rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://use.fontawesome.com/14255a829a.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--[endif]-->
</head>
<body>
    <div id="app">
        @include('nav-bar')

        <div id="myContent">
          @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    {!! Html::script('assets/js/popper.min.js') !!}
    {!! Html::script('js/public.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
