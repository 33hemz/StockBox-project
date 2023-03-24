@extends('templates.master')

@section('title', 'Login')

@section('head')
<style>
    body {
        background-color: #2db28e;
    }
</style>
@endsection

@section('content') 
<div class="mx-auto position-relative" style="width: 450px; margin-top: 80px;">
    <i id="dark-mode-toggle" class="bi bi-brightness-high-fill btn btn-outline-secondary position-absolute top-0 end-0"></i>
    <div class="card shadow-lg bg-body-secondary">
        <a href="{{ route('landing') }}" class="d-block mx-auto">
            <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
        </a>
        
        <h1 class="text-center">StokBox Analytics</h1>
        <div class="mx-5 my-5 px-3">
            <form action="{{ route('process_login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <input type="submit" value="Log in" class="btn btn-primary">
                    <a href="{{ route('password.request') }}" class="font-italic text-primary">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('themetoggle.js') }}"></script>
@endsection