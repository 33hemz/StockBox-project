@extends('templates.master')

@section('title', 'Table')

@section('head')
@endsection

@section('content')
<form action="{{ route('process_csv_file') }}" method="post" enctype="multipart/form-data">
    @csrf

    <h1 class="border-bottom pb-2">Upload New File</h1>

    <div class="mb-3">
        <input type="file" id="file" name="file" value="{{ old('file') }}" class="form-control @error('file') is-invalid @enderror">
        @error('file')
            <div class="invalid-feedback">{!! $message !!}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="submit" value="Upload File" class="btn btn-primary">
    </div>
@endsection