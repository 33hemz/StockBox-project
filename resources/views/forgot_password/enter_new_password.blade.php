@extends('templates.master')

@section('title', 'Enter New Password')

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
        <h1 class="text-center">Reset Password</h1>
        
        <div style="padding: 50px;">
        <form action="{{ route('password.update') }}" method="post">
            @csrf

            <input type="hidden" id="token" name="token" value="{{ $token }}">

            <div style="padding: 7px;">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $email }}" name="email" id="email">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <br>
            </div>

            <div style="padding: 7px;">
                <label for="password">New Password</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <br>
            </div>
            
            
            <div style="padding: 7px;">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <br>
            </div>


            <div style="padding: 7px;">
            <input type="submit" value="Change Password" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection