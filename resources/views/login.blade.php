@extends('templates.master')

@section('title', 'Login')

@section('head')



<style>
    .center {
        margin: auto;
    }

    body {
        background-color: #2db28e;
        
    }





</style>
@endsection

@section('content') 
<div class="center" style="width: 450px; margin-top: 50px;">
    <div class="card shadow-lg" style="background-color: aliceblue">
        <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="center">
        
        <h1 class="center" style="font-size: 25px"><b>Stokbox Analytics</b></h1>
        <div style="padding: 50px;">
            <form action="/processlogin" method="post" class="w-full max-w-sm">
                @csrf

                <div class="flex items-center border-b border-teal-500 py-2">
                    <input class="@error('username') is-invalid @enderror appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Username" name="username" id="username" aria-label="Username">
                    @error('username')
                    <br>
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <br><br>
                <div class="flex items-center border-b border-teal-500 py-2">
                    <input class="@error('password') is-invalid @enderror appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" placeholder="Password" name="password" id="password" aria-label="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    <br><br>
                @enderror
                </div>
                <!--Show Password functionality-->
                <div>
                    <a style="font-size:11px; padding-right:90px" href="{{ url('/user-manual') }}"><em>Forgot your Password?</em></a>

                    <input style="" type="checkbox" onclick="myFunction()"> Show Password
                    
                    <script>
                        function myFunction() {
                            var x = document.getElementById("password");
                            if (x.name === "password") {
                              x.type = "text";
                            } else {
                              x.type = "password";
                            }
                          }
                        </script>

                </div>
                <div>
                    <button type="submit" style="background-color: #2db28e" class="bg-green-600 hover:bg-green-600 text-gray-800 font-bold py-2 px-4 border border-gray-400 rounded shadow">
                        Log In
                      </button>
                      <br><br>
                    </div>
              </form>

        </div>
    </div>
</div>
@endsection