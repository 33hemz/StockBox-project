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
    <div class="col card mx-2 my-3" style="min-width: 250px;">
        <div class="d-flex flex-column justify-content-center align-items-center">
                {{-- These will vary based on each persona --}}
                <span class="h4 mt-3">{{ $persona['first_name'] }} {{$persona['last_name']}}</span>
                <img src="{{ $persona['image_url'] }}" height="100" width="100" class="rounded-circle mb-2">
                
                <div class="d-flex flex-column justify-content-center align-items-center fs-6">
                    <span>Age: {{ $persona['age'] }}</span>
                    <span>Gender: {{ $persona['gender'] }}</span>
                    <span>Income: £{{ $persona['income'] }}</span>
                    <span>City: {{ $persona['city'] }}</span>
                    <span>Number of Dependents: {{ $persona['number_of_dependents'] }}</span>
                    @if ($persona['dietary_requirements'] !== '')
                        <span>Dietry Requirement(s): {{ $persona['dietary_requirements'] }}</span>
                    @endif
                </div>
                <div class="d-flex mt-2"> 
                    <input type="button" value="More Details" class="btn btn-primary mb-2">
                </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
