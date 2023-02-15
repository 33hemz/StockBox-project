@extends('templates.master')

@section('title', 'New User')

@section('head')
<style>

</style>
@endsection

@section('content') 


<form action="/processnewuser" method="post">
    @csrf

    <div class="container">
        <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
        <h1 class="border-bottom pb-2"> Create New User</h1>
        <div style="padding: 7px;">
        <label for="company">Company </label>
        <input type="text" id="company" name="company" class="form-control">
        </div>

        <div style="padding: 7px;">
        <label for ="username">Username </label>
        <input type="text" id="username" name="username" class="form-control">
        </div>

        <div style="padding: 7px;">
        <label for="first_name">First name </label>
        <input type="text" id="first_name" name="first_name" class="form-control">
        </div>

        <div style="padding: 7px;">
        <label for ="last_name">Last name </label>
        <input type="text" id="last_name" name="last_name" class="form-control">
        </div>

        <div style="padding: 7px;">
        <label for ="email">Email </label>
        <input type="text" id="email" name="email" class="form-control">
        </div>

        <div style="padding: 7px;">
        <input type="submit" value="Create New User" class="btn btn-primary">
        </div>
    </div>

</form>

@endsection