@extends('templates.master')

@section('title', 'View Product Data')
@section('head')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

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
        {{-- <tr>
            <td class="text-nowrap"></td>
            <td style="min-width: 180px;"></td>
            <td style="min-width: 180px;"></td>
            <td style="min-width: 180px;"></td>
            <td></td>
            <td style="min-width: 180px;"></td>
            <td class="text-truncate" style="max-width: 100px;"></td>
            <td style="min-width: 180px;"></td>
            <td></td>
            <td><a target="_blank" href=""></a></td>
            <td></td>
        </tr> --}}
    </tbody>
</table>

    <script>
    // let table = new DataTable('#product_data_table', {
    //     scrollX: true,
    // });
    $(function () {
        var table = $('#product_data_table').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: {
                url: "{{ route('view_product_data') }}",
                beforeSend: function () {
                    console.log("loading");
                    
                },
                complete: function () {
                    console.log("done");
                },
            },
            columns: [
                {data: 'brand', name: 'brand'},
                {data: 'product_name', name: 'product_name'},
                {data: 'category', name: 'category'},
                {data: 'subcategory', name: 'subcategory'},
                {data: 'price_£', name: 'price_£'},
                {data: 'price_per', name: 'price_per'},
                {
                    data: 'ingredients', 
                    name: 'ingredients',
                    createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                        $(cell).addClass('text-truncate');
                        $(cell).css('max-width', '100px');
                        $(cell).css('font-size', '15px');
                    }
                },
                {data: 'allergen_information', name: 'allergen_information'},
                {data: 'recycling_information', name: 'recycling_information'},
                {
                    data: 'product_link', 
                    name: 'product_link',
                    render: function(data, type, row, meta) {
                        return '<a target="_blank" href="' +  data + '">' + data + '</a>';
                    }
                },
                {data: 'brand_details', name: 'brand_details'},
            ]
        });
    });
    </script>
    

@endsection