@extends('layouts.template_layantar.headeradmin')

<!-- Section untuk title -->
@section('title', 'Admin Layanan Barang Bukti')

<!-- Section untuk content -->
@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Modal -->
  <div class="modal fade my-modal" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Status</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('layananantar/update')}}" method="POST" id="quickForm" name="formSubmit">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-group mb-3">
                <input type="text" id="id" name="id">
                <label for="" class="form-label">Status Barang Bukti</label>
                <select class="custom-select form-control-border" name="status_pemilik" id="exampleSelectBorder">
                  <option Value="Belum Diantar" selected>Pilih</option>
                  <option value="Sudah Diantar">Sudah Diantar</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary toastsDefaultSuccess" id="mySubmit">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary card-admin card-tabs">
              <div class="p-0 pt-2 my-card-header">
                <ul class="nav nav-tabs my-card-header" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item my-item">
                    <a class="nav-link {{ $tabsId === 'custom-tabs-one-home-tab' ? 'active' : '' }} my-item" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Belum di antar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ $tabsId === 'custom-tabs-one-profile-tab' ? 'active' : '' }}" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Sudah di antar</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  	<div class="container-fluid mb-3">
			            <div class="row">
			                <div class="col-md-8 offset-md-2">
			                    <form action="{{url('layananantar/admin/cari/b')}}" method="POST">
			                    	@csrf
			                        <div class="input-group">
			                            <input type="search" class="form-control form-control-md" name="caritab1" placeholder="Type your keywords here">
			                            <input type="hidden" name="tabId" value="custom-tabs-one-home-tab">
			                            <div class="input-group-append">
			                                <button type="submit" class="btn btn-md btn-default">
			                                    <i class="fa fa-search"></i>
			                                </button>
			                            </div>
			                        </div>
			                    </form>
			                </div>
			            </div>
			        </div>
                     <div class="card-body table-responsive p-0" style="height: 700px;">
	                    <table class="table table-head-fixed table-bordered" id="display-table">
	                      <thead>
	                        <tr>
	                          <th>#</th>
	                          <th>No. Registrasi Barbuk</th>
	                          <th>Nama Pemilik</th>
	                          <th>Status</th>
	                          <th>Alamat</th>
	                          <th>Barang</th>
	                          <th>Nomor Telepon</th>
	                          <th>Status Pengembalian</th>
	                          <th>Aksi</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        @forelse($belum as $nbelum)
	                          <tr>
	                            <td>{{$loop->iteration}}</td>
	                            <td>{{$nbelum->no_reg }}</td>
	                            <td>{{$nbelum->nama_pemilik }}</td>
	                            <td>{{$nbelum->status_pemilik }}</td>
	                            <td>{{$nbelum->alamat }}</td>
	                            <td>{{$nbelum->keterangan }}</td>
	                            <td>{{$nbelum->notelp }}</td>
	                            <td>{{$nbelum->status_pengembalian }}</td>
	                            <td><!-- Button trigger modal -->
                              	<button type="button" class="btn my-btn-table" data-toggle="modal" data-target="#modal-default">
                                	Antar Barang
                              	</button>
                          		</td>
	                          </tr>
	                        @empty
	                          <tr>
	                          	<td>KOSONG</td>
	                          </tr>
	                        @endforelse
	                      </tbody>
	                    </table>
	                  </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  	<div class="container-fluid mb-3">
			            <div class="row">
			                <div class="col-md-8 offset-md-2">
			                    <form action="{{url('layananantar/admin/cari/s')}}" method="POST">
			                    	@csrf
			                        <div class="input-group">
			                            <input type="search" class="form-control form-control-md" name="caritab2" placeholder="Type your keywords here">
			                            <input type="hidden" name="tabId" value="custom-tabs-one-profile-tab">
			                            <div class="input-group-append">
			                                <button type="submit" class="btn btn-md btn-default">
			                                    <i class="fa fa-search"></i>
			                                </button>
			                            </div>
			                        </div>
			                    </form>
			                </div>
			            </div>
			        </div>
                     <div class="card-body table-responsive p-0" style="height: 700px;">
	                    <table class="table table-head-fixed table-bordered" id="display-table">
	                      <thead>
	                        <tr>
	                          <th>#</th>
	                          <th>No. Registrasi Barbuk</th>
	                          <th>Nama Pemilik</th>
	                          <th>Status</th>
	                          <th>Alamat</th>
	                          <th>Barang</th>
	                          <th>Nomor Telepon</th>
	                          <th>Status Pengembalian</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        @foreach ($sudah as $sudah)
	                          <tr>
	                            <td>{{$loop->iteration}}</td>
	                            <td>{{ $sudah->no_reg }}</td>
	                            <td>{{ $sudah->nama_pemilik }}</td>
	                            <td>{{ $sudah->status_pemilik }}</td>
	                            <td>{{ $sudah->alamat }}</td>
	                            <td>{{ $sudah->keterangan }}</td>
	                            <td>{{ $sudah->notelp }}</td>
	                            <td>{{ $sudah->status_pengembalian }}</td>
	                          </tr>
	                        @endforeach
	                      </tbody>
	                    </table>
	                  </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
				document.getElementById('id').value = dataId;
				document.getElementById('reg').value = rowSelected.cells[2].innerHTML;
				document.getElementById('nama_pemilik').value = rowSelected.cells[3].innerHTML;
				document.getElementById('alamat').value = rowSelected.cells[5].innerHTML;
			}
		}
	}
  </script>
@endsection
