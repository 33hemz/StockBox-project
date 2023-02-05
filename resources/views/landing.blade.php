@extends('templates.master')

@section('title', 'StokBox home')

@section('head')
<style>
    
</style>
@endsection

@section('content') 
<header id="landing_header">
    <img id="landing_logo" src="{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}" alt="Logo">
    <nav>
        <ul>
            <li><a href="#support">Support</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#features">Features</a></li>
            <li id="login-button"><a href="{{ url('/login') }}" style="color:#2DB28E">Log In</a></li>
        </ul>
    </nav>
</header>

<!--Hero Section Start-->
<div class="hero__content hero container-custom position-relative ">
    <div class="d-flex h-100 align-items-center hero__content-width">
        <div id= "content" class="text-black">
                <h1 class="fw-bold mb-4 ">Your products...<br>Our Insight</h1>
                <p class="mb-4"><span class="green_embolden">Understand</span> and <span class="green_embolden"> visualise</span> the marketplace</p> 
                <a href="{{ url('/login') }}" class="mt-2 col-12 btn btn-lg btn-outline-dark charm" style="background-color: #2DB28E; color:white; font-weight:bold" role="button">Get Started</a><br>
                <a href="{{ url('/user-manual') }}" class="mt-2 btn btn-lg col-12 btn-outline-dark charm2" style="font-weight:500" role="button">Get Support</a>
            
        </div>
    </div>
</div>
<!--Hero Section End-->

@endsection