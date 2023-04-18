@extends('layouts.test.header')

@section('content')

    <!-- Main container -->
      <div class="main-content">

        <div class="col-lg-12 mt-5">
            @include('flash-message')
            <div class="card custom-card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 custom-col align-self-baseline mt-2">
                        <h4 class="">
                            Anda mengetahui tindakan pidana yang telah atau akan dilakukan oleh seseorang yang Anda kenal? <br> Anda dapat melaporkan peristiwa ini menggunakan aplikasi <strong>PANJALU</strong> (Pelayanan Pengaduan Kejaksaan dan Tindak Lanjut). <br> Anda dapat melaporkan <strong>tindak pidana</strong> yang ada disekitar Anda dan Tidak perlu takut identitas Anda akan terungkap karena Kami akan menjamin identitas Anda.
                        </h4>
                    </div>
                    <br>
                    <div class="col-md-6 mt-2">
                        {{-- Ajukan --}}
                        <div class="card card-slided-down">
                            <header class="card-header">
                            <h4 class="card-title text-white"><strong>Ajukan Pengaduan Anda</strong></h4>
                            <ul class="card-controls">
                                <li><a class="card-btn-slide text-white" href="#"></a></li>
                                <li><a class="card-btn-fullscreen text-white" href="#"></a></li>
                            </ul>
                            </header>
                            <div class="card-content">
                            <h4 class="card-title"><strong>Identitas Diri Anda</strong></h4>
                            <div class="card-body">
                                <form action="{{ url('/panjalu/store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap Anda</label>
                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Isikan Nama Lengkap Anda">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Anda</label>
                                        <input type="text" class="form-control" name="email" placeholder="Isikan e-mail anda">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Hp/Telp</label>
                                        <input type="text" class="form-control" name="nohp" placeholder="Isikan nomor telepon anda">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group form-type-fill file-group">
                                        <label>Foto E-KTP Anda</label>
                                        <input type="text"  class="form-control file-value file-browser" placeholder="Pilih File " readonly>
                                        <input type="file" name="file" multiple>
                                        <span class="custom-span">NB: Data anda akan terjamin keamanannya</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Alamat Anda</label>
                                    <textarea class="form-control" name="alamat" id="textarea" rows="4" placeholder="Isikan Alamat Lengkap Anda"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <h4 class="card-title"><strong>Data Pengaduan</strong></h4>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Subyek Pengaduan</label>
                                        <input type="text" class="form-control" name="judul_pengaduan" placeholder="Judul Pengaduan Anda">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Isi Pengaduan</label>
                                        <textarea class="form-control" name="detail_pengaduan" id="textarea" rows="6"
                                        placeholder="Jelaskan kasus secara rinci. Silahkan uraikan mengenai dugaan pelanggaran, siapa yang diduga terlibat, di instansi mana terjadi, dan kapan terjadinya peristiwa tersebut."></textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group form-type-fill file-group">
                                            <label>Lampirkan Foto Jika Ada</label>
                                            <input type="text"  class="form-control file-value file-browser" placeholder="Pilih File " readonly>
                                            <input type="file" name="lampiran_foto[]" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-type-fill file-group">
                                            <label>Lampirkan Dokumen jika ada</label>
                                            <input type="text"  class="form-control file-value file-browser" placeholder="Pilih File " readonly>
                                            <input type="file" name="lampiran_dokumen[]" multiple>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn submit float-right">Adukan Sekarang</button>
                                </form>
                            </div>
                            <br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
      </div>
    <!--/.main-content -->
@endsection
