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
<body class="hold-transition sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

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

  <!-- Modal -->
  <div class="modal fade my-modal" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pengajuan Layanan Antar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('layananantar/store')}}" method="POST" id="quickForm" name="formSubmit">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-group mb-3">
                <label for="" class="form-label">No. Registrasi Barang Bukti</label>
                <input type="text" readonly name="no_reg" id="reg" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="" class="form-label">Status Penerima BB</label>
                <select class="custom-select form-control-border" name="status_pemilik" id="exampleSelectBorder">
                  <option selected>Pilih</option>
                  <option value="Keluarga Korban">Keluarga Korban</option>
                  <option value="Keluarga Terpidana">Keluarga Terpidana</option>
                  <option value="Korban">Korban</option>
                </select>
              </div>
              <div class=" form-group mb-3">
                <label for="" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat" id="validationTextarea" placeholder="Masukkan Alamat Lenkap Penerimas"></textarea>
              </div>
            </div>
            <div class="col" colspan="2">
              <div class="form-group mb-3">
                <label for="" class="form-label">Nama Pemilik BB</label>
                <input type="text" name="nama_pemilik" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="" class="form-label">Nomor Tlp/WA</label>
                <input type="text" name="notelp" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="" class="form-label">Keterangan BB</label>
                <textarea class="form-control" name="keterangan" id="validationTextarea" placeholder="Masukkan Keterangan Barang Bukti"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> --}}
          <button type="submit" class="btn toastsDefaultSuccess" id="mySubmit">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <section class="content">

  <!-- Menampilkan Content -->
  @yield('content')

  <!-- Menampilkan Footer -->
  @include('layouts.template_layantar.footer')
