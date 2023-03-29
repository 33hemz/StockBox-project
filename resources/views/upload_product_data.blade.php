@extends('templates.master')

@section('title', 'Upload Product Data')

{{-- import product csv --}}
@section('content')
<form id=product_upload_form action="{{ route('process_csv_file') }}" method="post" enctype="multipart/form-data">
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
        <input id="product_upload_button" type="submit" value="Upload File" class="btn btn-primary">
    </div>
</form>

<script>
    document.getElementById("product_upload_form").addEventListener("submit", function() {
        // Create a new button element with the desired HTML content
        var button = document.createElement("button");
        button.classList.add("btn", "btn-primary");
        button.setAttribute("type", "button");
        button.setAttribute("disabled", "disabled");
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';

        // Replace the existing button with the new one
        var oldButton = document.getElementById("product_upload_button");
        oldButton.parentNode.replaceChild(button, oldButton);
    });
</script>

<br>
<br>
    
    {{-- import consumer csv --}}
<form id=consumer_upload_form action="{{ route('process_user_data') }}"method="post" enctype="multipart/form-data">
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
        <input id="con_upload_button" type="submit" value="Upload File" class="btn btn-primary">
    </div>
</form>

<script>
    document.getElementById("consumer_upload_form").addEventListener("submit", function() {
        // Create a new button element with the desired HTML content
        var button = document.createElement("button");
        button.classList.add("btn", "btn-primary");
        button.setAttribute("type", "button");
        button.setAttribute("disabled", "disabled");
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';

        // Replace the existing button with the new one
        var oldButton = document.getElementById("con_upload_button");
        oldButton.parentNode.replaceChild(button, oldButton);
    });
</script>

<div class="mb-3">
    <form id="generate_list"action="{{route('create_shopping_list')}}" method="POST">

        <h3 class="border-bottom pb-2">Generate Consumer Data with Purchase History</h3>
        <p class="mb-2">This generates a new set of consumer data. It maintains a record of each individual consumer's purchase history. <br>This history is specific to each consumer and is generated as a result of their unique interactions with the platform.</p>
        @csrf
   
        <div class="mb-3">
            <label for="quantity">Number of Consumers (between 1 and 100):</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="100" value="1"> 
        
        </div>
            <input id="gen_upload_button" type="submit" value="Generate" class="btn btn-primary">
    </form>
</div>

<script>
    document.getElementById("generate_list").addEventListener("submit", function() {
        // Create a new button element with the desired HTML content
        var button = document.createElement("button");
        button.classList.add("btn", "btn-primary");
        button.setAttribute("type", "button");
        button.setAttribute("disabled", "disabled");
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Generating...';

        // Replace the existing button with the new one
        var oldButton = document.getElementById("gen_upload_button");
        oldButton.parentNode.replaceChild(button, oldButton);
    });
</script>
@endsection