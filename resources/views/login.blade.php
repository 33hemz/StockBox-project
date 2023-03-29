@extends('templates.master_auth')



@section('title', 'Login')

@section('content')       
      <h1 class="text-center mx-5">StokBox Analytics</h1>
      <div class="mx-5 my-5 px-3">
        <form action="{{ route('process_login') }}" method="post">
          @csrf
          
          <div class="mb-4">
            <label for="email">Email</label>
            <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <input type="submit" value="Log in" class="btn btn-primary login-button">
            </div>
            <div class="text-end">
              <a href="{{ route('password.request') }}" class="font-italic text-primary text-start">Forgot Password?</a>
            </div>
          </div>
          
          
          
        </form>
      </div>
    </div>
  </div>
</div>
  @endsection
