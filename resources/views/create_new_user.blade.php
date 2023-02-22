@extends('templates.master')

@section('title', 'New User')


@section('content') 
<h1 class="border-bottom pb-2">Add New Company</h1>
<form action="{{ route('add_new_company')}}" method='post'>
    @csrf

    <div class="mb-3">
        <label for="company_name">Company Name</label>
        <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="form-control @error('company_name') is-invalid @enderror">
        @error('company_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="submit" value="Add Company" class="btn btn-primary">
    </div>
</form>

<br>

<h1 class="border-bottom pb-2"> Create New User</h1>
<form action="{{ route('process_new_user') }}" method="post">
    @csrf
    
    <div class="mb-3">
    <label for="first_name">First name</label>
    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror">
    @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
    <label for ="last_name">Last name</label>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for ="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="company_id">Choose a Company </label><br>
        <select name="company_id" id="company_id" value="{{ old('company_id') }}" class="form-select @error('company_id') is-invalid @enderror">
            <option value="" disabled selected>-- Select a company --</option>
            @foreach ($companies as $company)
                <option value="{{ $company['id'] }}" {{ old('company_id') == $company['id'] ? 'selected' : ''}}>{{$company['company_name']}}</option>
            @endforeach       
        </select>
        @error('company_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="submit" value="Create New User" class="btn btn-primary">
    </div>
</form>
@endsection