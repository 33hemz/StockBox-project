@extends('templates.master')

@section('title', 'StokBox home')

@section('head')
<style>
    @font-face {
        font-family: SourceSansPro;
        src: url('{{ asset('assets/Font Source Sans Pro/SourceSansPro-Black.ttf') }}');
    }
    body {
        background-color: white;
        
    }
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: SourceSansPro;
    }

    #logo {
        width: 350px;
        Padding: 10px;
    }

    nav ul {
        list-style: none;
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 0 60px;
    }

    nav ul li a {
        text-decoration: none;
        color: black;
        font-family: 'Roboto',Helvetica,Arial,Lucida,sans-serif;
        font-size: 1.4em;
        font-weight: bold;
        
    }
/* Hero Styling Start*/

/*A Custom Container*/
    .container-custom {
        width: 100%;
        padding: 0 1rem;
        margin: 0 auto;
    }
    /*Not sure if these media queries work- will find out later*/
@media(min-width: 1200px) {
    .container-custom { width: 1140px;}}

@media(min-width: 1400px) {
    .container-custom { width: 1340px;}}

@media(min-width: 1400px) {
    .container-custom { width: 1520px;}}

    
    .hero {
        position: relative;
        height: 100vh;
        background-color: white;

    }



    .hero__content-width {
        max-width: 540px;
    }

    #content {
        padding-left:7em;
        padding-bottom:15em;
    }

    p {
        font-size: 20px;
    }

    .green_embolden {
        color:#00d084;
        font-weight: bold;
    }

    .charm:hover {
        color: #fff;
        background-color: #00d084;
        border-color: #00d084; 
    }
/* Hero Styling End*/
</style>
@endsection

@section('content') 
<header>
    <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}" alt="Logo">
    <nav>
        <ul>
            <li><a href="#support">Support</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#features">Features</a></li>
            <li id="login-button"><a href="{{ url('/login') }}">Login</a></li>
        </ul>
    </nav>
</header>

<!--Hero Section Start-->
<div class="hero__content hero container-custom position-relative ">
    <div class="d-flex h-100 align-items-center hero__content-width">
        <div id= "content" class="text-black">
                <h1 class="fw-bold mb-4 ">Your products...<br>Our Insight</h1>
                <p class="mb-4"><span class="green_embolden">Understand</span> and <span class="green_embolden"> visualise</span> the marketplace</p> 
                <a href="{{ url('/login') }}" class="mt-2 col-12 btn btn-lg btn-outline-dark charm" role="button">Get Started!</a><br>
                <a href="#" class="mt-2 btn btn-lg col-12 btn-outline-dark" role="button">Get Support!</a>
            
        </div>
    </div>
</div>
<!--Hero Section End-->

@endsection