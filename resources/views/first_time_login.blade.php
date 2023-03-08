@extends('templates.master')

@section('title', 'Create Password')

@section('head')
<style>
    body {
        background-color: #2db28e;
    }
</style>
@endsection

@section('content') 
<div class="mx-auto" style="width: 450px; margin-top: 50px;">
    <div class="card shadow-lg">
        <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
        
        <h1 class="text-center">Welcome to StokBox!</h1>
        <div class="mx-5 my-5 px-3">
            <form action="{{ route('process_first_time_login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="password">Create a Password</label>
                    <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autofocus>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <p style='font-size: 12px; color: #525252;'>
                A password should be longer than 8 characters, containing uppercase and lowercase letters and at least one number.
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <input type="submit" value="Access Account" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
