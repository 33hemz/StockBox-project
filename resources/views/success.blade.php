@extends('templates.master')

@section('title', 'Success')

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
        
        <h6 class="text-center mt-3">A recovery link has been sent to your email</h6>
        <div style="padding: 50px;">
        </div>
    </div>
</div>
@endsection