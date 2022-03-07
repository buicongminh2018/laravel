<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/fontawesome-free-5.15.3-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/boostrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <script src="{{asset('frontend/js/ajax.js')}}"></script>
    <script src="{{asset('frontend/js/cdnjs.js')}}"></script>
    <script src="{{asset('frontend/js/maxcdn.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.css')}}"></script>
    @yield('title')
    @yield('css')
</head>
<body>

    @yield('content')
    @include('pages.components.footer')
    @yield('js')
</body>
</html>
