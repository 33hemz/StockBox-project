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
        font-family: SourceSansPro;
    }
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    button {
        border: none;
        text-align: center;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        width: 405px;
        left: 0px;
        top: 276px;
        border-radius: 16px;
        color: #36B18E
    }

    .bland {
        color: #F5F5F5;
    }

    #my-button {
        display:flex;
        flex-direction: column;
        justify-content: space-between;
    }

    #login-button a {
        color: #00d084;
    }
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
            <li id="login-button"><a href="#login">Login</a></li>
        </ul>
    </nav>
</header>

<div id="intro">
<article>
   
    <h1>Your products...<br> 
    Our Insight</h1>
    <p>Understand  and visualise the marketplace</p>
</article>
<section id="my-button">
    <a href="#login"><button type="button">Get Started!</button></a>
    <a href="#login"><button type="button" class= "bland">Get Support</button></div></a>
</section>
</div>
@endsection