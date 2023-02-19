@extends('templates.master')

@section('title', 'Brand Page')

@section('head')
<style>

</style>
@endsection

@section('content') 
    <div class="container" style="padding: 7px;">
        <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
        <h1 class="border-bottom pb-2">{{$company ['company_name']}}Brand Details</h1>




   
            <div><h3 >Product Categories</h3></div>
       

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
                            <form action="{{route('deleted_product_category')}}" method="POST">
                            @csrf
                            <input type="hidden" id="product_id" name="product_id" value="{{ $category['id'] }}">
                            <button type="submit" class="delete btn btn-danger" title="Delete" data-toggle="tooltip"><i class='fas fa-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>


    <h5 style="margin: 10px 0 0 0;">Add New Product Category</h5>
    <form action="{{route('updated_brand_page')}}" method="POST">
        @csrf
        
    <div style="padding: 7px 0;">
        <div class="input-group mb-3">
            <select class="form-select" id="inputGroupSelect02">
            @foreach ($categories as $category)
              <option>{{$category ['product_category_name']}}
            @endforeach
            </select>
        </div>
    </div>
    <div style="padding: 7px 0;">
        <input type="submit" class="btn btn-primary">
    </div>
</form>


@endsection