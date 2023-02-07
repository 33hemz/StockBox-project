@extends('templates.master')

@section('title', 'StokBox Home')

@section('head')
<style>
    
</style>
@endsection

@section('content') 
    <div style="height: 15vh;"></div>

    <div class="col-sm-12 col-md-3 offset-md-1">
        <div class="text-black">
            <h1 class="fw-bold mb-4 ">Your products...<br>Our Insight</h1>
            <p class="mb-4 fs-5"><span class="text-primary fw-bold">Understand</span> and <span class="text-primary fw-bold">visualise</span> the marketplace</p> 
            <a href="{{ url('/login') }}" class="btn btn-primary btn-lg mt-2 col-12 text-white fw-bold" role="button">Sign In</a><br>
            <a href="{{ url('/user-manual') }}" class="btn btn-outline-secondary btn-lg mt-2 col-12" style="font-weight:500" role="button">User Manual</a>
        </div>
    </div>
@endsection