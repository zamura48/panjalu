@extends('layouts.test.admin.header')

@section('title', 'Admin Panjalu Kejari Kediri')

@section('content')
<div class="main-content">
    <div class="card">
        <a href="{{url('/panjalu/admin')}}" class="card-title btn-lg"><i class="fa fa-mail-reply"></i></a>
        <div class="card-title">
            <div class="card-body">
                <div class="card-content">
                    <h4 class="card-title"><strong>Identitas Diri</strong></h4>
                    <div class="card-body">
                    <div class="row">
                    @foreach ($data as $data)
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap Anda</label>
                            <input type="text" class="form-control" readonly name="nama_lengkap" value="{{ $data->nama_lengkap }}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Anda</label>
                            <input type="text" class="form-control" readonly name="email" value="{{ $data->email }}">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Hp/Telp</label>
                            <input type="text" class="form-control" readonly name="nohp" value="{{ $data->nohp }}">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Alamat Anda</label>
                            <textarea class="form-control" readonly name="alamat" id="textarea" rows="4" value="Isikan Alamat Lengkap Anda">{{ $data->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gap-y gap-2" data-provide="photoswipe">
                        <div class="col-md-6">
                        <div class="form-group form-type-fill file-group">
                            <label>Foto E-KTP Anda</label>
                            <a href="">
                                <img src="{{ asset('panjalu/foto_ktp/'.$data->ktp) }}" data-original-src="{{ asset('panjalu/foto_ktp/'.$data->ktp) }}" data-original-src-width="1920" data-original-src-height="1280">
                            </a>
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
                            <input type="text" class="form-control" readonly name="judul_pengaduan" value="{{ $data->judul_pengaduan }}">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Isi Pengaduan</label>
                            <textarea class="form-control" readonly name="detail_pengaduan" id="textarea" rows="6"
                            value="">{{ $data->detail_masalah }}</textarea>
                        </div>
                        </div>
                    </div>
                </div>
                <br>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <h4 class="card-title">Lampiran berkas</h4>
        <div class="card-title">
            <h4 class="card-title">Lampiran Foto</h4>
            @forelse ($pic as $item)
                <a class="col-6 col-lg-3 mt-3" href="#">
                    <img src="{{ asset('panjalu/lampiran_foto/'.$item->nama_file) }}" data-original-src="{{ asset('panjalu/lampiran_foto/'.$item->nama_file) }}" data-original-src-width="1920" data-original-src-height="1280">
                </a>
                @empty
                <h4 class="text-center mt-3">Lampiran Foto Kosong</h4>
            @endforelse
        </div>
        <br>
        <div class="card-title">
            <h4 class="card-title">Lampiran Dokumen</h4>
            @forelse ($doc as $item)
                <object data="{{ asset('panjalu/lampiran_dokumen/'.$item->nama_file) }}" class=" mt-3" width="100%" height="500" type=""></object>
                @empty
                <h4 class="text-center mt-3">Lampiran Dokumen Kosong</h4>
            @endforelse
        </div>
    </div>
</div>
@endsection
