@extends('templates.master')

@section('title', 'My Personas')

@section('head')
    

@endsection

@section('content') 
<h1 class="border-bottom pb-2 mb-3">Saved Buyer Personas</h1>





<div class="sec2 row row-cols-auto justify-content-evenly mb-5 container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">

        {{-- for loop for each saved persona in the database --}}

        <div class="profilecard p-4">

            <div class="profileimage d-flex flex-column justify-content-center align-items-center">
                
                {{-- These will vary based on each persona --}}
                <button class="profile_background1 btn-primary">
                <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /> {{--profile pic--}}
                </button>
                <span class="name mt-3">David Igandan</span>{{--name--}}
                <span class="age">Age: 30</span>{{--age--}}
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="id_income">Customer ID: </span> {{--customer id--}} 
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span class="id_income">Income: </span> {{--income--}}
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="id_income">Education:  </span> {{--education--}}
                </div>
                <div class="d-flex mt-2"> 
                <input type="button" value="More Details" class="btn btn-primary">{{--More Details--}}
                </div>
                <div class="profile_text mt-3">
                <span>Description....</span> {{--more details--}}
                </div>
                <div class="px-2 rounded mt-4 date">
                <span class="join">Date Generated: </span>
                </div>
            </div>
        </div>
    </div>  
</div>




@endsection
