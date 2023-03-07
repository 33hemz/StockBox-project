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
<div class="center" style="width: 450px; margin: auto; margin-top: 50px;">
    <div class="card shadow-lg">
        <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
        
        <h2 class="text-center">Success!</h2>
        <span class="text-center mb-4 mt-2">A recovery link has been sent to your email</span>
        <div class="d-flex justify-content-center mb-5">
            <a href="{{ route('login') }}" class="btn btn-primary">Login Page</a>
        </div>
    </div>
</div>
@endsection