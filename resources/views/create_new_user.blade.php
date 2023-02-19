@extends('templates.master')

@section('title', 'New User')

@section('head')
<style>

</style>
@endsection

@section('content') 


<form action="{{ route('process_new_user') }}" method="post">
    @csrf

    <div class="container">
        <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
        <h1 class="border-bottom pb-2"> Create New User</h1>
        
        {{-- <div style="padding: 7px;">
        <label for="company">Company </label>
        <input type="text" id="company" name="company" value="{{ old('company') }}" class="form-control @error('company') is-invalid @enderror">
        @error('company')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div> --}}

        <div style="padding: 7px;">
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror">
        @error('first_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div style="padding: 7px;">
        <label for ="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
        @error('last_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div style="padding: 7px;">
        <label for ="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div style="padding: 7px;">
        <input type="submit" value="Create New User" class="btn btn-primary">
        </div>
    </div>

</form>

@endsection