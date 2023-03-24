@extends('templates.master')

@section('title', 'Forgot Password')

@section('head')
<style>
    body {
        background-color: #2db28e;
    }
</style>
@endsection

@section('content') 
<div class="mx-auto" style="width: 450px; margin-top: 50px;">
    <div class="card shadow-lg bg-body-secondary">
        <a href="{{ route('landing') }}" class="d-block mx-auto">
            <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
        </a>
        <h1 class="text-center">Forgot Password</h1>
        <span class="text-center mt-2">Let's get you into your account</span>
        
        <div class="mx-5 my-5 px-3">
            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between">
                    <input type="submit" value="Continue" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('themetoggle.js') }}"></script>
@endsection