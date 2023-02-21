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


        <form action="#" method="post">
            @csrf

            <div style="padding: 7px;">
                <label for="password">Email</label>
                <input type="text" class="form-control " name="password" id="password">

                <br>
            </div>

            <div style="padding: 7px;">
                <label for="password">New Password</label>
                <input type="text" class="form-control " name="password" id="password">

                <br>
            </div>
             

            <div style="padding: 7px;">
                <label for="password">Confirm New Password</label>
                <input type="text" class="form-control " name="password" id="password">
                
                <br>
            </div>


            <div style="padding: 7px;" class="d-flex justify-content-between align-items-center">
            <input type="submit" value="Change Password" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection