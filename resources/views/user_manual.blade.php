@extends('templates.master')

@section('title', 'User Manual')

@section('content') 
<div style="height: 2vh;"></div>
<div class="ms-4">
    <h1>StokBox: User Manual</h1>
    <h2>Login</h2>
    <ol>
        <li>From the landing page, press sign in to navigate to the login page</li>
        <img width="500" src="{{ asset('assets/User Manual Images/Picture1.png ') }}" alt="">
        <li>Enter your credentials into the text boxes provided</li>
        <img width="500" src="{{ asset('assets/User Manual Images/Picture2.png ') }}" alt="">
        <li>Press the login button</li>
        <ul>
            <li>If your credentials are incorrect, you will be denied access to the dashboard as shown</li>
        </ul>
        <img width="500" src="{{ asset('assets/User Manual Images/Picture3.png ') }}" alt="">
        <li>Otherwise you will be redirected to the dashboard page</li>
    </ol>
</div>

@endsection