<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. Sidebar is the main navigation for most of admin templates and web apps.">
    <meta name="keywords" content="sidebar, icons, boxed">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">
    <link href="{{asset('vendor')}}/fontawesome-free-5.15.3-web/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('vendor')}}/bootstrap-theadmin-master/assets/css/core.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/app.css" rel="stylesheet">
    <link href="{{asset('vendor')}}/bootstrap-theadmin-master/assets/css/style.min.css" rel="stylesheet">

    <link href="{{asset('assets')}}/css/sweetalert2.min.css" rel="stylesheet">
    <!-- <link href="{{asset('assets')}}/css/style.css" rel="stylesheet"> -->

    <!-- Favicons -->
    <link href="{{asset('favicon.ico')}}" rel="icon">
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-dots">
            <span class="dot1"></span>
            <span class="dot2"></span>
            <span class="dot3"></span>
        </div>
    </div>

    @yield('content')

    <!-- Scripts -->
    <script src="{{asset('vendor')}}/bootstrap-theadmin-master/assets/js/core.min.js"></script>
    <script src="{{asset('vendor')}}/bootstrap-theadmin-master/assets/js/app.min.js"></script>
    <script src="{{asset('vendor')}}/bootstrap-theadmin-master/assets/js/script.min.js"></script>

    <script src="{{asset('assets')}}/js/sweetalert2.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery-3.5.1.js"></script>

</body>

</html>