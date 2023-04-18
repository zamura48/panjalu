@extends('layouts.template_layantar.header')
<!-- Section untuk title -->
@section('title', 'Layanan Barang Bukti')

<!-- Section untuk content -->
@section('content')

<!-- Header -->
    <div class="container-fluid my-container-header">
      <!-- Title row -->
      <div class="row-sm-4 my-row1-header">
        <div class="col-12">
          <a class="my-row1-h4-header" href="{{url('layananantar')}}">
            Pelayanan Barang Bukti Kejari Kota Kediri
          <a>
        </div>
      </div>
      <!-- Subtitle row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          <h3 class="my-h3-header-subtitle">Layanan Antar Barang Bukti</h3>
          <p class="lead my-p-header-subtitle">
            <b><b>Lacak Status Barang Bukti Anda</b> dengan memasukkan <b>Nama Terpidana</b> atau <b>Nama Barang.</b>
            <b>Cari Data Barang Bukti Anda</b> dan kemudian lakukan pengajuan pengiriman <b>Barang Bukti.</b></b>
          </p>
        </div>
        <div class="col-sm-6 invoice-col my-image-header">
        </div>
      </div>
    </div>

    <!-- Pencarian -->
    <div class="container-fluid">
      <div class="card-body my-card">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">PENCARIAN</h3>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('layananantar')}}" method="post">
                    @csrf
                        <div class="input-group">
                            <input type="search" name="cari" class="form-control form-control-md" placeholder="Masukkkan Kata Kunci">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-md btn-default my-icon-pencarian">
                                    <i class="fa fa-search text-white"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>

@include('flash-message')

      @isset($keyword)

      @if(!empty($result))
      <!-- Result -->
        <div class="card" id="result">
          <div class="card-header">
            <h3 class="card-title">Hasil Pencarian "{{$keyword}}"</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool my-btn-result" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <a href="{{url('layananantar')}}" type="button" class="btn btn-tool my-btn-result">
                <i class="fas fa-times"></i>
              </a>
            </div>
          </div>
          <!-- Tabel -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body table-responsive p-0" style="height: 700px;">
                    <table class="table table-head-fixed table-bordered" id="display-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. Registrasi Barbuk</th>
                          <th>Nama Terdakwa</th>
                          <th>Nama Barang</th>
                          <th>Status Barang</th>
                          <th>Status Pengambilan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($result as $i =>$bb)
                          <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $bb->reg_barbuk }}</td>
                            <td>{{ $bb->tersangka }}</td>
                            <td>{{ $bb->nama_barbuk }}</td>
                            <td>{{ $bb->status }}</td>
                            <td>{{ $bb->status_pengambilan }}</td>
                            <td>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn my-btn-table" data-toggle="modal" data-target="#modal-default">
                                Antar Barang
                              </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      @else
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><u>{{$keyword}}</u  > tidak ditemukan!</strong>
      </div>
      @endif

      @endisset
@endsection

@section('js')
<script type="text/javascript">
  highlight_row();
  function highlight_row() {
      var table = document.getElementById('display-table');
      var cells = table.getElementsByTagName('td');

      for (var i = 0; i < cells.length; i++) {
          // Take each cell
          var cell = cells[i];
          // do something on onclick event for cell
          cell.onclick = function () {
              // Get the row id where the cell exists
              var rowId = this.parentNode.rowIndex;
              var rowsNotSelected = table.getElementsByTagName('tr');
              var rowSelected = table.getElementsByTagName('tr')[rowId];
              var dataId = rowSelected.cells[1].innerHTML;
              document.getElementById('reg').value = dataId;
          }
      }
  }
</script>
<script>
$(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     var form = document.getElementById("quickForm");
  //     document.getElementById("mySubmit").addEventListener("click", function () {
  //       form.submit();
  //     })
  //     $(document).Toasts('create', {
  //       class: 'bg-success',
  //       title: 'Berhasil!!',
  //       body: 'Anda Berhasil Mengajukan Layanan Antar Barang Bukti. Tunggu Konfirmasi Dari Kami Melalui Telepon. Terimakasih.'
  //     })
  //   }
  // });
  $('#quickForm').validate({
    rules: {
      nama_pemilik: {
        required: true
      },
      notelp: {
        required: true,
        minlength: 11
      },
      alamat: {
        required: true
      },
      keterangan: {
        required: true
      },
    },
    messages: {
      nama_pemilik: {
        required: "Nama Pemilik Barang Bukti Wajib Diisi"
      },
      status_pemilik: {
        required: "Pilih Status Anda Sebagai Pemilik Barang Bukti"
      },
      notelp: {
        required: "Nomor Telepon Wajib Diisi",
        minlength: "Nomor Telepon Anda Harus Minimal 11 Karakter"
      },
      alamat: {
        required: "Alamat Wajib Diisi"
      },
      keterangan: {
        required: "Masukkan Deskripsi Barang Bukti Anda"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<!-- @if ($message = Session::get('success'))
<script type="text/javascript">
  $('.toastsDefaultSuccess').ready(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Berhasil!!',
        body: 'Anda Berhasil Mengajukan Layanan Antar Barang Bukti. Tunggu Konfirmasi Dari Kami Melalui Telepon. Terimakasih.'
      })
      $('.but').trigger('click');
    });
</script>
@endif -->
@endsection
