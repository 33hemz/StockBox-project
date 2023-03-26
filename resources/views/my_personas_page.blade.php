@extends('templates.master')

@section('title', 'Dashboard')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style> 
        .sec {
            padding: 20px;
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 2px 15px 0 #bbbbbb;
        }
    </style>
@endsection

@section('content') 
<h1 class="border-bottom pb-2 mb-3">Saved Buyer Personas</h1>

<div class="row row-cols-auto justify-content-start mb-5">

    {{-- for loop to be executed on each instance of a persona move to controller --}}
    @foreach ($personas as $persona)
    <div class="col card mx-2 my-3">
        <div class="profileimage d-flex flex-column justify-content-center align-items-center">
                {{-- These will vary based on each persona --}}
                <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100"> {{--profile pic--}}
                
                <span class="name mt-3">{{ $persona['first_name'] }} {{$persona['last_name']}}</span>{{--name--}}
                <span class="age">Age: {{ $persona['age'] }}</span>{{--age--}}
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <span class="id_income">Customer ID: {{ $persona['customer_id'] }}</span> {{--customer id--}} 
                    <span class="id_income">Income: {{ $persona['income'] }}</span> {{--income--}}
                    <span class="id_income">Education: {{ $persona['education'] }}</span> {{--education--}}
                </div>
                <div class="d-flex mt-2"> 
                    <input type="button" value="More Details" class="btn btn-primary">{{--More Details--}}
                </div>
                <div class="profile_text mt-3">
                    <span>Description: {{ $persona['description'] }}</span> {{--more details--}}
                </div>
                <div class="px-2 rounded mt-4 date mb-3">
                    <span class="join">Date Generated:{{$persona['date_generated']}}</span>
                </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
