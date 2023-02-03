@extends('templates.master')

@section('title', 'Login')

@section('head')
<style>
    .center {
        margin: auto;
    }

    body {
        background-color: #2db28e;
    }
</style>
@endsection

@section('content') 
<div class="center" style="width: 450px; margin-top: 50px;">
    <div class="card shadow-lg" style="background-color: aliceblue">
        <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="center">
        
        <h1 class="center">Stokbox Platform</h1>
        <div style="padding: 50px;">
        <form action="/processlogin" method="post">
            @csrf

            <div style="padding: 7px;">
                <label for="username">Username </label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" style="background-color: ">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <br>
            </div>
            
            <div style="padding: 7px;">
                <label for="password">Password </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <br>
            </div>
            
            <div style="padding: 7px;">
            <input type="submit" value="Log in" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection