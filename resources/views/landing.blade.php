@extends('templates.master')

@section('title', 'StokBox home')

@section('head')
<style>
    body {
        background-color: #7bdcb5;
    }

    #logo {
        width: 350px;
        Padding: 10px;
    }

    nav ul li a {
        text-decoration: none;
        color: black
    }

    #login-button a {
        color: white
    }
</style>
@endsection

@section('content') 
<header>
    <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-03@3x.png') }}" alt="Logo">
    <nav>
        <ul>
            <li><a href="#support">Support</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#features">Features</a></li>
            <li id="login-button"><a href="#login">Login</a></li>
        </ul>
    </nav>
</header>
@endsection