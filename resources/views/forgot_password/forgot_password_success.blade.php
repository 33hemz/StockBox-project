@extends('templates.master_auth')

@section('title', 'Forgot Password')

@section('content')
        <h2 class="text-center mx-5">Success!</h2>
        <span class="text-center mb-4 mt-2">A recovery link has been sent to your email</span>
        <div class="d-flex justify-content-center mb-5">
            <a href="{{ route('login') }}" class="btn btn-primary">Login Page</a>
        </div>
    </div>
</div>
@endsection