@extends('layouts.test.header')

@section('content')

    <!-- Main container -->
      <div class="main-content">

        <div class="col-lg-12 mt-5">
            @include('flash-message')
            <div class="card custom-card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{-- Lacak --}}
                        <div class="card card-slided-down">
                            <header class="card-header">
                            <h4 class="card-title text-white"><strong>Lacak Pengaduan Anda</strong></h4>
                            <ul class="card-controls">
                                <li><a class="card-btn-fullscreen text-white" href="#"></a></li>
                            </ul>
                            </header>
                            <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <form action="{{ route('panjalusearch') }}" method="POST">
                                    @csrf
                                        <div class="input-group">
                                        <input type="text" class="form-control" name="cari" placeholder="Masukkan Kode Registrasi Anda">
                                        <span class="input-group-btn">
                                            <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                        </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @isset($cari)
                            @forelse ($cari as $item)
                            <div class="row text-center mt-5">
                                <div class="col-md-6">
                                    <h3><strong>No. Registrasi</strong><br>{{ $item->noregistrasi }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3><strong>Nama</strong><br>{{ $item->nama_lengkap }}</h3>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <h2><strong>Status</strong><br>{{ $item->status }}</h2>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-danger alert-block mt-3">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h4><strong>Kode <u>{{old('cari')}}</u> yang Anda cari tidak ditemukan!</strong></h4>
                            </div>
                            @endforelse
                            @endisset
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
