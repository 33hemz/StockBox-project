@extends('templates.master_auth')

@section('title', 'Forgot Password')

@section('content') 
<div class="center" style="width: 450px; margin: auto; margin-top: 50px;">
    <div class="card shadow-lg bg-body-secondary">
        <a href="{{ route('landing') }}" class="d-block mx-auto">
            <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
        </a>
        
        <h2 class="text-center">Success!</h2>
        <span class="text-center mb-4 mt-2">A recovery link has been sent to your email</span>
        <div class="d-flex justify-content-center mb-5">
            <a href="{{ route('login') }}" class="btn btn-primary">Login Page</a>
        </div>
    </div>
</div>
@endsection