@extends('templates.master')

@section('title', 'Edit User')


@section('content') 

<h1 class="border-bottom pb-2"> Edit User</h1>
<form action="{{ route('process_edit_user') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $user->id }}" name="user_id">
    <div class="mb-3">
    <label for="first_name">First name</label>
    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control @error('first_name') is-invalid @enderror">
    @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
    <label for ="last_name">Last name</label>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control @error('last_name') is-invalid @enderror">
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for ="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="company_id">Choose a Company </label><br>
        <select name="company_id" id="company_id" value="{{ old('company_id') }}" class="form-select @error('company_id') is-invalid @enderror">
            <option value="" disabled selected>-- Select a company --</option>
            @foreach ($companies as $company)
                <option value="{{ $company['id'] }}" {{ $user['company_id'] == $company['id'] ? 'selected' : ''}}>{{$company['company_name']}}</option>
            @endforeach       
        </select>
        @error('company_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="submit" value="Edit User" class="btn btn-primary">
        <a href={{ route('manage_user') }} class="btn btn-secondary">Cancel</a>
    </div>
    <div class="mb-3">
    </div>
</form>
@endsection