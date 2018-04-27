<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('inc.navbar')
    <title>EduShare</title>
    <link rel="icon" href="/image/Logosmall.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <!--<link rel="stylesheet" href="/css/app.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/customcss.css">
</head>
<body>
<div id="app">
    @yield('content')
</div>
<!-- Scripts -->
<script src="/js/app.js"></script>

<footer @include('inc.footer')> </footer>


</body>
</html>
