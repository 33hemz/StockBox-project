@extends('templates.master_auth')

@section('title', 'Forgot Password')

@section('content')
        <h1 class="text-center mx-5">Forgot Password</h1>
        <span class="text-center mt-2">Let's get you into your account</span>
        
        <div class="mx-5 my-5 px-3">
            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <input type="submit" value="Continue" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection