@extends('templates.master')

@section('title', 'Login')



@section('content') 
<h1>Login Page</h1>
<form action="/processlogin" method="post">
    @csrf
    <label for="username">Username: </label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username">
    
@error('username')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <br>

    <label for="password">Password: </label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
    @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <br>

    <input type="submit" class="btn btn-primary">
</form>
@endsection