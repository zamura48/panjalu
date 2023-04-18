<?php
$bg_login = asset('assets/img/bg-login.jpg');
?>

@section('title', 'Login Admin | PTSP')
@extends('layouts._template_auth')

@section('content')

<div class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url({{$bg_login}});" data-overlay="7">
    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
        <a href="{{url('/')}}">
            <img src="{{asset('assets/img')}}/logo-2.png" alt="logo">
        </a>
        <h5 class="text-uppercase text-center mt-3">Login</h5>
        <form class="form-type-material" method="POST" action="/postlogin">
            @csrf
            <!-- username -->
            <div class="form-group">
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="on" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="username">Username</label>
            </div>

            <!-- password -->
            <div class="form-group">
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" minlength="8" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password">Password</label>
            </div>

            @error('username')
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Login Gagal!</strong><br> Username atau Password Salah.
            </div>
            @enderror

            <div class="form-group">
                <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
            </div>

        </form>
        <!-- <button class="btn btn-brown" id="btn-ok">click me!</button> -->
    </div>
</div>

@endsection