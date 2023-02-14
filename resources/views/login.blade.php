@extends('templates.master')

@section('title', 'Login')

@section('head')
<style>
    body {
        background-color: #2db28e;
    }
</style>
@endsection

@section('content') 
<div class="center" style="width: 450px; margin: auto; margin-top: 50px;">
    <div class="card shadow-lg" style="background-color: aliceblue">
        <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
        
        <h1 class="text-center">Stokbox Platform</h1>
        <div style="padding: 50px;">
        <form action="/processlogin" method="post">
            @csrf

            <div style="padding: 7px;">
                <label for="username">Username </label>
                <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" name="username" id="username" style="background-color: ">
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
            
            <div style="padding: 7px;" class="d-flex justify-content-between align-items-center">
            <input type="submit" value="Log in" class="btn btn-primary">
            <a href="#" class="font-italic">Forgot Password?</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection