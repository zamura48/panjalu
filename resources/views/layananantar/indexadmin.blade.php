@extends('layouts.test.admin.header')

<!-- Section untuk title -->
@section('title', 'Admin Layanan Barang Bukti')

<!-- Section untuk content -->
@section('content')

<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Light mode
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="col-lg-12 mt-3">
<div class="card">
    <div class="card-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs panjalu-custom nav-tabs-light-mode">
        <li class="nav-item">
            <a class="nav-link {{ $tabsId === 'custom-tabs-one-home-tab' ? 'active' : '' }}" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Belum di antar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $tabsId === 'custom-tabs-one-profile-tab' ? 'active' : '' }}" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Sudah di antar</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade show {{ $tabsId === 'custom-tabs-one-home-tab' ? 'active' : '' }}" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            <div class="container-fluid mb-3">
              <div class="row justify-content-center">
                  <div class="col-md-5 offset-md-2 ">
                      <form action="{{route('adminsearchtab1')}}" method="POST">
                          @csrf
                          <div class="input-group">
                              <input type="search" class="form-control form-control-md" name="caritab1" value="{{ old('caritab1') }}">
                              <input type="hidden" name="tabId" value="custom-tabs-one-home-tab">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-md btn-default" id="click">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
           <div class="card-body table-responsive p-0" style="height: 500px;">
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
                      @if ($nbelum->status_pengembalian == 'Belum Diantar')
                      <td>{{$loop->iteration}}</td>
                      <td hidden>{{ $nbelum->id }}</td>
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
                      @endif
                    </tr>
                  @empty
                    <tr>
                        <td class="text-center" colspan="9">KOSONG</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
        </div>
        <div class="tab-pane fade show {{ $tabsId === 'custom-tabs-one-profile-tab' ? 'active' : '' }}" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <div class="container-fluid mb-3">
              <div class="row justify-content-center">
                  <div class="col-md-5 offset-md-2">
                      <form action="{{route('adminsearchtab2')}}" method="POST">
                          @csrf
                          <div class="input-group">
                              <input type="search" class="form-control form-control-md" name="caritab2" placeholder="">
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
           <div class="card-body table-responsive p-0" style="height: 500px;">
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
                  @forelse ($sudah as $sudah)
                    <tr>
                      @if ($sudah->status_pengembalian == 'Sudah Diantar')
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $sudah->no_reg }}</td>
                      <td>{{ $sudah->nama_pemilik }}</td>
                      <td>{{ $sudah->status_pemilik }}</td>
                      <td>{{ $sudah->alamat }}</td>
                      <td>{{ $sudah->keterangan }}</td>
                      <td>{{ $sudah->notelp }}</td>
                      <td>{{ $sudah->status_pengembalian }}</td>
                      @endif
                    </tr>
                  @empty
                    <tr>
                        <td class="text-center" colspan="8">KOSONG</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
        </div>
    </div>

    </div>
</div>
</div>

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
			<div class="col-md-6">
				<div class="form-group mb-3">
				  <label for="" class="form-label">No. Registrasi Barang Bukti</label>
				  <input type="text" readonly id="reg" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group mb-3">
                    <label for="" class="form-label">Nama Pemilik BB</label>
                    <input type="text" readonly id="nama_pemilik" class="form-control">
                </div>
			</div>
            <div class="col-md-12">
                <div class="form-group mb-6">
                    <label for="" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" readonly name="keterangan" id="alamat" placeholder="Masukkan Keterangan Barang Bukti"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Status Barang Bukti</label>
                <div class="form-group mb-3">
                    <input type="text" id="id" hidden name="id">
                    <select class="custom-select form-control-border" name="status_pengembalian" id="exampleSelectBorder">
                        <option selected>Pilih</option>
                        <option value="Sudah Diantar">Sudah Diantar</option>
                    </select>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="submit" class="btn toastsDefaultSuccess" id="mySubmit">Simpan</button>
        </div>
        </form>
      </div>
    </div>
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
