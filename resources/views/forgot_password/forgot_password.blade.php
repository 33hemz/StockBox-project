@extends('templates.master')

@section('title', 'Forgot Password')

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
        <h1 class="text-center">Forgot Password</h1>
        <h6 class="text-center mt-3">Let's get you into your account</h3>
        <div style="padding: 50px;">


        <form action="/process-password-recovery" method="post">
            @csrf

            <div style="padding: 7px;">
                <label for="email">Email</label>
                <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" style="background-color: ">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <br>
            </div>
             
            <div style="padding: 7px;" class="d-flex justify-content-between align-items-center">
            <input type="submit" value="Continue" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection