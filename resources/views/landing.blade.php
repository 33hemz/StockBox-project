@extends('templates.master')

@section('title', 'StokBox Home')

@section('content') 
    <div style="height: 15vh;"></div>

    <div class="col-sm-12 col-md-3 offset-md-1">
        <div class="text-black block">
            <h1 class="fw-bold mb-4 ">Your products...<br>Our Insight</h1>
            <p class="mb-4 fs-5"><span class="text-primary fw-bold">Understand</span> and <span class="text-primary fw-bold">visualise</span> the marketplace</p> 
            @if (auth()->check())
                @if (auth()->user()->user_type === 'USER')
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg mt-2 col-12 text-white fw-bold" role="button">{{ auth()->user()->first_name }}'s Dashboard</a><br>
                @elseif (auth()->user()->user_type === 'ADMIN')
                    <a href="{{ route('create_new_user') }}" class="btn btn-primary btn-lg mt-2 col-12 text-white fw-bold" role="button">Manage Users</a><br>
                @endif
			@else
			    <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-2 col-12 text-white fw-bold" role="button">Sign In</a><br>
			@endif
            <a href="{{ route('user_manual') }}" class="btn btn-outline-secondary btn-lg mt-2 col-12" style="font-weight:500" role="button">User Manual</a>
        </div>
    </div>
@endsection