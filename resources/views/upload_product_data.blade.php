@extends('templates.master')

@section('title', 'Upload Product Data')

{{-- import product csv --}}
@section('content')
<form action="{{ route('process_csv_file') }}" method="post" enctype="multipart/form-data">
    @csrf

    <h1 class="border-bottom pb-2">Import Product Data via CSV</h1>
    <h3>Ensure the following:</h3>
    <ul>
        <li>
            CSV file should contain the following headers in the correct order:<br>
            <span class="text-muted fst-italic">link, category_1, category_2, product_name, price, price_per, ingredients, allergen_information, brand, recycling_information, brand_details</span>
            
        </li>
        <li>All entries must be separated with semi-colons rather than commas e.g. <span class="text-muted" style="font-family: consolas;">item 1;item 2;item 3</span></li>
    </ul>

    <div class="mb-3">
        <label for="file">CSV file to import</label>
        <input type="file" id="file" name="file" value="{{ old('file') }}" class="form-control @error('file') is-invalid @enderror">
        @error('file')
            <div class="invalid-feedback">{!! $message !!}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="submit" value="Upload File" class="btn btn-primary">
    </div>
</form>

<br>
<br>
    
    {{-- import consumer csv --}}
<form action="{{ route('process_user_data') }}"method="post" enctype="multipart/form-data">
    @csrf
    
    <h1 class="border-bottom pb-2">Import Consumer Data via CSV</h1>
    <h3>Ensure the following:</h3>
    <ul>
        <li>
            CSV file should contain the following headers in the correct order:<br>
            <span class="text-muted fst-italic mb-0">full_name, gender, age, country, income, number_of_dependents, dietry_requirements</span>      
        </li>
        <li>All entries must be separated with semi-colons rather than commas e.g. <span class="text-muted" style="font-family: consolas;">item 1;item 2;item 3</span></li>
    </ul>
    
        
    
    <div class="mb-3">
        <label for="consumer_file">CSV file to import</label>
        <input type="file" id="" name="consumer_file" value="{{ old('consumer_file') }}" class="form-control @error('consumer_file') is-invalid @enderror">
        @error('consumer_file')
            <div class="invalid-feedback">{!! $message !!}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <input type="submit" value="Upload File" class="btn btn-primary">
    </div>
</form>
@endsection