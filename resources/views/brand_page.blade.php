@extends('templates.master')

@section('title', 'Brand Page')

@section('head')
<style>

</style>
@endsection

@section('content') 

<!--------------   LOGO   ---------->
<form action="/processnewuser" method="post">
    @csrf

    <div class="container">
        <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
        <h1 class="border-bottom pb-2"> Brand Details</h1>
        
        <div style="padding: 7px;">
        <label for="company">Company Name</label>
        <input type="text" id="company" name="company" class="form-control @error('company') is-invalid @enderror">
        @error('company')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div style="padding: 7px;">
        <label for ="username">Products </label>
        <textarea name="products" class="form-control">Dog Food, Cat Food, IDK Food, Vegan Stuff</textarea>    
        </div>

        <div style="padding: 7px;">
        <input type="submit" value="Update Brand Details" class="btn btn-primary">
        </div>
    </div>

</form>

@endsection