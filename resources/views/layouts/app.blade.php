<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cowgirl Creations</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link href="/css/lightbox.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/all.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>


    <link rel='stylesheet' href='/fullcalendar/fullcalendar.css' />
    <script src='/fullcalendar/lib/moment.min.js'></script>
    <script src='/fullcalendar/lib/jquery.min.js'></script>

</head>
<body id="app-layout">
    @include('partials.nav')

    @yield('content')



    <!-- JavaScripts -->

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/lightbox.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('scripts')

</body>
@include('partials.footer')
</html>
