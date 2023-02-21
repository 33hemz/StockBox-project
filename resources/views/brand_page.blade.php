@extends('templates.master')

@section('title', 'Brand Page')

@section('head')
<style>

</style>
@endsection

@section('content') 

<h1 class="border-bottom pb-2">Brand Details: {{ $company ['company_name'] }}</h1>

<h3>Product Categories</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category ['product_category_name']}}</td>
            <td>
                <form action="{{ route('deleted_product_category') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" id="product_category_id" name="product_category_id" value="{{ $category['id'] }}">
                    <button type="submit" class="delete btn btn-danger" title="Delete" data-toggle="tooltip"><i class='fas fa-trash'></i></button>
                </form>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

<h5>Add New Product Category</h5>
<form action="{{ route('updated_brand_page') }}" method="POST">
    @csrf

    <div class="mb-3">
        <select class="form-select" id="product_category_id" name="product_category_id">
            @foreach ($allCategories as $category)
            <option value="{{ $category['id'] }}">{{$category['product_category_name']}}
            @endforeach
        </select>
    </div>
        
    <div class="mb-3">
        <input type="submit" class="btn btn-primary">
    </div>
</form>


@endsection