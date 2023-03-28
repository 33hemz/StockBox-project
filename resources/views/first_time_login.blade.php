@extends('templates.master_auth')

@section('title', 'Create Password')

@section('content')
        <h1 class="text-center mx-5">Welcome to StokBox!</h1>
        <div class="mx-5 my-5 px-3">
            <form action="{{ route('process_first_time_login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="password">Create a Password</label>
                    <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autofocus>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <p class="text-muted text-wrap" style="font-size: 0.8em">
                    A password should be longer than 8 characters, containing uppercase and lowercase letters and at least one number.
                </p>
                <input type="submit" value="Access Account" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
