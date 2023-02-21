@extends('templates.master')

@section('title', 'Table')

@section('head')
@endsection

@section('content')
<form action="{{ route('process_csv_file') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container">
        <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
        <h1 class="border-bottom pb-2"> Upload New File</h1>

        <div style="padding: 7px;">
        <input type="file" id="file" name="file" value="{{ old('file') }}" class="form-control @error('file') is-invalid @enderror">
        @error('file')
            <div class="invalid-feedback">{!! $message !!}</div>
        @enderror
        </div>

        <div style="padding: 7px;">
            <input type="submit" value="Upload File" class="btn btn-primary">
        </div>
        <br>
    </div>
@endsection