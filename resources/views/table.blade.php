@extends('templates.master')

@section('title', 'Table')

@section('head')
@endsection

@section('content')
<form action="{{ route('process_new_user') }}" method="post">
    @csrf

    <div class="container">
        <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
        <h1 class="border-bottom pb-2"> Upload New File</h1>

        <div style="padding: 7px;">
        <input type="file" id="CSVfile" name="CSVfile" value="{{ old('CSVfile') }}" class="form-control @error('CSVfile') is-invalid @enderror">
        @error('CSVfile')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div style="padding: 7px;">
        <input type="submit" value="Upload File" class="btn btn-primary">
        </div>
        <br>
        <br>
    </div>
@endsection