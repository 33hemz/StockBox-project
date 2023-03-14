@extends('templates.master')

@section('title', 'View Product Data')
@section('head')
<script src='https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href='https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css'>
<link rel="stylesheet" href='https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css'>
@endsection

@section('content')

<h1 class="border-bottom pb-2">View Product Data</h1>

    <table id="product_data_table" class="table table-striped">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Price</th>
            <th>Price per person</th>
            <th>Ingredients</th>            
            <th>Allergen Information</th>
            <th>Recycling Information</th>
            <th>Product Link</th>
            <th>Brand Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product_data as $product)
        <tr>
            <td class="text-nowrap">{{$product['brand']}}</td>
            <td style="min-width: 180px;">{{$product['product_name']}}</td>
            <td style="min-width: 180px;">{{$product['category']}}</td>
            <td style="min-width: 180px;">{{$product['subcategory']}}</td>
            <td>{{$product['price_£']}}</td>
            <td style="min-width: 180px;">{{$product['price_per']}}</td>
            <td class="text-truncate" style="max-width: 100px;">{{$product['ingredients']}}</td>
            <td style="min-width: 180px;">{{$product['allergen_information']}}</td>
            <td>{{$product['recycling_information']}}</td>
            <td><a target="_blank" href="{{ $product['product_link'] }}">{{$product['product_link']}}</a></td>
            <td>{{$product['brand_details']}}</td>
        </tr>
        @endforeach    
        
    </tbody>
</table>

    <script>
    let table = new DataTable('#product_data_table', {
        scrollX: true,
    });
    </script>
    

@endsection