@extends('templates.master')

@section('title', 'StokBox Home')

@section('head')
<style>
    
</style>
@endsection

@section('content') 
<div class="d-flex flex-column h-100">
    <header id="landing_header" class="d-flex align-items-center justify-content-between flex-column flex-md-row">
        <img id="landing_logo" src="{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}" alt="StokBox Logo">
        <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/user-manual') }}">User Manual</a></li>
            <li><a href="{{ url('/login') }}" class="text-primary">Log In</a></li>
        </ul>
        </nav>
    </header>

    <div style="height: 15vh;"></div>

    <div class="col-sm-12 col-md-3 offset-md-1">
    <div class="text-black">
        <h1 class="fw-bold mb-4 ">Your products...<br>Our Insight</h1>
        <p class="mb-4 fs-5"><span class="text-primary fw-bold">Understand</span> and <span class="text-primary fw-bold">visualise</span> the marketplace</p> 
        <a href="{{ url('/login') }}" class="btn btn-primary btn-lg mt-2 col-12 text-white fw-bold" role="button">Sign In</a><br>
        <a href="{{ url('/user-manual') }}" class="btn btn-outline-secondary btn-lg mt-2 col-12" role="button">User Manual</a>
    </div>
    </div>
</div>

@endsection