@extends('layouts.test.admin.header')

@section('title', 'Admin Panjalu Kejari Kediri')
@section('content')

    {{-- Modal Edit --}}
    <div class="modal fade my-modal" id="modal-edit">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Ubah Status Pengaduan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ url('/panjalu/admin/update') }}" method="POST" id="quickForm" name="formSubmit">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="myId" name="myId" hidden readonly>
                    </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="form-label">Status Pengaduan</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" list="status_pengaduan" name="status">
                            <datalist id="status_pengaduan" style="width: 100%">
                            <option>Proses Pulbaket</option>
                            <option>Diteruskan ke Seksi TP Khusus</option>
                            <option>Diteruskan ke Seksi Perdata dan TUN</option>
                            <option>Diteruskan ke APIP</option>
                            <option>Diteruskan ke Instansi Lainnya</option>
                            <option>Dihentikan karena tidak ada indikasi Tindak Pidana/Perbuatan Melawan Hukum</option>
                            </datalist>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary toastsDefaultSuccess float-right" id="mySubmit">Simpan</button>
            </div>
            </form>
        </div>
        </div>
    </div>


    {{-- Modal Show --}}
    <div class="modal fade my-modal" id="modal-show">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Aduan Atasnama <strong id="an"></strong> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Registrasi</label>
                        <input type="text" class="form-control" id="no_registrasi" readonly>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Tanggal Aduan Masuk</label>
                            <input type="text" class="form-control" id="masuk" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="nohp" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="form-label">KTP</label>
                        <div class="w-500px" id="ktp"></div>
                        {{-- <input type="text" class="form-control" id="ktp" readonly> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <textarea class="form-control" readonly id="alamat" rows="3">
                            {{-- {{ old('$alamat') }} --}}
                        </textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-label">Subyek Pengaduan</label>
                        <input type="text" class="form-control" id="judul_pengaduan" readonly>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" readonly class="form-label">Isi Pengaduan</label>
                            <textarea class="form-control" id="detail_masalah" rows="8">

                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" readonly class="form-label">Status Pengaduan</label>
                            <input type="text" class="form-control" id="status" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Main container -->
    <div class="main-content">
        @include('flash-message')
        <div class="card">
            <h4 class="card-title"><strong>PANJALU </strong>| Admin Aduan dan Tindak Lanjut</h4>
            <div class="card-body">
              <div class="flexbox mb-20">
                <form action="{{ route('panjaluAdminsearch') }}" method="POST">
                  @csrf
                  <div class="lookup">
                    <input class="w-200px" type="text" name="cari" id="cari" value="{{old('cari')}}" placeholder="Cari Data Anda">
                  </div>
                </form>
                <div class="btn-toolbar">
                  <div class="btn-group btn-group-sm">
                    <button class="btn" data-provide="tooltip" onClick="window.location.reload();"><i class="ion-refresh"></i></button>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-responsive" id="display-table">
                <thead>
                  <tr>
                    <th class="text-center align-middle">#</th>
                    <th class="text-center align-middle">Nomer Registrasi</th>
                    <th class="text-center align-middle">Tanggal Aduan Masuk</th>
                    <th class="text-center align-middle">Nama Lengkap</th>
                    <th class="text-center align-middle">Email</th>
                    <th class="text-center align-middle">Nomer Telpon</th>
                    <th class="text-center align-middle">Subyek Pengaduan</th>
                    <th class="text-center align-middle">Status Pengaduan</th>
                    <th class="text-center align-middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($data as $ndata)
                  <tr>
                        <td>{{ $loop->iteration + $data->firstItem()-1 }}</td>
                        <td>{{ $ndata->noregistrasi }}</td>
                        <td>{{ date('d M Y', strtotime($ndata->created_at)) }}</td>
                        <td>{{ $ndata->nama_lengkap }}</td>
                        <td>{{ $ndata->email }}</td>
                        <td>{{ $ndata->nohp }}</td>
                        <td hidden>{{ $ndata->alamat }}</td>
                        <td>{{ $ndata->judul_pengaduan }}</td>
                        <td hidden>{{ $ndata->detail_masalah}}</td>
                        <td hidden>
                            {{ asset('foto_ktp/'.$ndata->ktp) }}
                        </td>
                        <td>{{ $ndata->status}}</td>
                        <td class="text-center table-actions w-50px">
                            <a class="table-action hover-primary" data-toggle="modal" data-target="#modal-edit"><i class="ti-pencil"></i></a>
                            <a href="{{route('show.panjalu',$ndata->noregistrasi)}}" class="table-action hover-primary" ><i class="ti-menu-alt"></i></a>
                        </td>
                        @empty
                        <td class="text-center" colspan="10">DATA YANG ANDA CARI TIDAK DITEMUKAN</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
              {!! $data->links('vendor.pagination.bootstrap-4') !!}
            </div>
          </div>
      </div>
    <!--/.main-content -->
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
            //   var dataId = rowSelected.cells[1].innerHTML;
            document.getElementById('myId').value = rowSelected.cells[1].innerHTML;
              document.getElementById('no_registrasi').value = rowSelected.cells[1].innerHTML;
              document.getElementById('masuk').value = rowSelected.cells[2].innerHTML;
              document.getElementById('nama_lengkap').value = rowSelected.cells[3].innerHTML;
              document.getElementById('an').innerHTML = rowSelected.cells[3].innerHTML;
              document.getElementById('email').value = rowSelected.cells[4].innerHTML;
              document.getElementById('nohp').value = rowSelected.cells[5].innerHTML;
              document.getElementById('alamat').value = rowSelected.cells[6].innerHTML;
              document.getElementById('judul_pengaduan').value = rowSelected.cells[7].innerHTML;
              document.getElementById('detail_masalah').value = rowSelected.cells[8].innerHTML;
            //   document.getElementById('ktp').value = rowSelected.cells[9].innerHTML;
              document.getElementById('status').value = rowSelected.cells[10].innerHTML;
              var img = document.createElement("img");
              img.src = rowSelected.cells[9].innerHTML;
              if(img.src === null){
                console.log(src)
              } else{
                var img = document.createElement("img");
                img.src = rowSelected.cells[9].innerHTML;
                var src = document.getElementById("ktp");
                src.appendChild(img);
              }

          }
      }
  }
</script>
@endsection
