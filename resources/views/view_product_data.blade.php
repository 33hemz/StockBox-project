@extends('templates.master')

@section('title', 'View Product Data')
@section('head')
<script src='https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href='https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css'>
@endsection

@section('content')

<h1 class="border-bottom pb-2">View Product Data</h1>

    <table id="product_data_table" class="display">
    <thead>
        <tr>
            <th>brand</th>
            <th>product name</th>
            <th>category</th>
            <th>subcategory</th>
            <th> price</th>
            <th>price per person</th>
            <th>ingredients</th>            
            <th>allergen information</th>
            <th>recycling information</th>
            <th>product link</th>
            <th>brand details</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product_data as $product)
        <tr>
            <td>{{$product['brand']}}</td>
            <td>{{$product['product_name']}}</td>
            <td>{{$product['category']}}</td>
            <td>{{$product['subcategory']}}</td>
            <td>{{$product['price_£']}}</td>
            <td>{{$product['price_per']}}</td>
            <td>{{$product['ingredients']}}</td>
            <td>{{$product['allergen_information']}}</td>
            <td>{{$product['recycling_information']}}</td>
            <td>{{$product['product_link']}}</td>
            <td>{{$product['brand_details']}}</td>
        </tr>
        @endforeach    
        
    </tbody>
</table>

    <script>
    let table = new DataTable('#product_data_table', {
        responsive: true,
        paging: false,
        scrollX : 400
    });
    </script>
    

@endsection