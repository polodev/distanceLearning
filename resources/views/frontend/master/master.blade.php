<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('frontendf/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontendf/css/bootstrap-material-design.css') }}">
    <link rel="stylesheet" href="{{ asset('frontendf/css/ripples.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('frontendf/css/style.css') }}">
</head>
<body>
    @include('frontend.master.navbar');
    <div id="slider">
        @yield('slider')
    </div>
    @yield('content')
<script src="{{ asset('frontendf/js/jquery.js') }}"></script>
<script src="{{ asset('frontendf/js/bootstrap.js') }}"></script>
</body>
</html>