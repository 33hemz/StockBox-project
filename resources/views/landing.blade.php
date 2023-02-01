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
    <p>Your </p>
</div>
@endsection