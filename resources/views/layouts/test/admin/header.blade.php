<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TheAdmin - Responsive Bootstrap 4 Admin, Dashboard &amp; WebApp Template">
    <meta name="keywords" content="dashboard, index, main">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i|Dosis:300,500" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/css/core.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/css/app.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/css/style.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/img/apple-touch-icon.png">
    <link rel="icon" href="{{asset('assets')}}/img/logo.png">

    <!--  Open Graph Tags -->
    <meta property="og:title" content="The Admin Template of 2018!">
    <meta property="og:description" content="TheAdmin is a responsive, professional, and multipurpose admin template powered with Bootstrap 4.">
    <meta property="og:image" content="http://thetheme.io/theadmin/assets/img/og-img.jpg">
    <meta property="og:url" content="http://thetheme.io/theadmin/">
    <meta name="twitter:card" content="summary_large_image">
  </head>

  <body class="sidebar-folded">

    <!-- Preloader -->
    <div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
    </div>

    <!-- Sidebar -->
    @include('layouts.test.admin.sidebar')
    <!-- END Sidebar -->

    <!-- Topbar -->
    @include('layouts.test.admin.topbar')
    <!-- END Topbar -->

    <main>
        <!-- Content -->
        @yield('content')
        <!-- End Content -->
        <!-- Footer -->
        @include('layouts.test.admin.footer')
        <!-- END Footer -->
    </main>

    <!-- Global quickview -->
    <div id="qv-global" class="quickview" data-url="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/data/quickview-global-for-index.html">
      <div class="spinner-linear">
        <div class="line"></div>
      </div>
    </div>
    <!-- END Global quickview -->

    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/js/core.min.js"></script>
    <script src="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/js/app.min.js"></script>
    <script src="{{ asset('vendor/bootstrap-theadmin-master') }}/assets/js/script.min.js"></script>

    @yield('js')
    
    </body>
  </html>
  