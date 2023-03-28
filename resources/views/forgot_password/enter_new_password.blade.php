@extends('templates.master_auth')

@section('title', 'Enter New Password')

@section('content')
        <h1 class="text-center mx-5">Reset Password</h1>
        
        <div class="mx-5 my-5 px-3">
            <form action="{{ route('password.update') }}" method="post">
                @csrf

                <input type="hidden" id="token" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="Change Password" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection