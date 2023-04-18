<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>Layanan Barang Bukti</title> -->
  <title>@yield('title')</title>
  <!-- Icon Title -->
  <link rel="icon" href="{{asset('assets')}}/img/logo.png">

  <!-- Google Font: Source Noto Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- Google Font: Open Sans -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('vendor')}}/AdminLTE-3.1.0/dist/css/adminlte.min.css">
  <!-- Custom -->
  <link href="{{asset('assets')}}/css/custom.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-collapse">

  <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <div class="row">
        <div class="col">
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw my-spinner" role="status"></i>
        </div>
        <div class="col">
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw my-spinner" role="status"></i>
        </div>
        <div class="col">
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw my-spinner" role="status"></i>
        </div>
      </div>
    </div>


  <!-- Navbar -->
  @include('layouts.template_layantar.navbar')

  <!-- Menampilkan Sidebar -->

  <!-- Menampilkan Content -->
  @yield('content')

  <!-- Menampilkan Footer -->
  @include('layouts.template_layantar.footer')
