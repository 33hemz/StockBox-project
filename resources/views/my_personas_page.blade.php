@extends('templates.master')

@section('title', 'Dashboard')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">All</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('my_personas_page').'/gender' }}">Gender</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('my_personas_page').'/age' }}">Age</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('my_personas_page').'/income' }}">Income</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('my_personas_page').'/city' }}">City</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('my_personas_page').'/dependants' }}">Dependants</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('my_personas_page').'/dietary-requirements' }}">Dietary Requirements</a>
  </li>
</ul>
<script>
$(document).ready(function() {
  var tabs = $('.nav-tabs .nav-link');
  tabs.click(function() {
    tabs.removeClass('active');
    $(this).addClass('active');
  });
});
</script>


<div class="row row-cols-auto justify-content-start mb-5">

    {{-- for loop to be executed on each instance of a persona move to controller --}}
    @foreach ($personas as $persona)
    <div class="col d-flex card mx-2 my-3" style="min-width: 250px; width: 275px; height: 400px">
        <div class="d-flex flex-column justify-content-center align-items-center">
            {{ $persona['tag'] }}
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
                        <span>Dietry Req(s): {{ $persona['dietary_requirements'] }}</span>
                    @endif
                </div>
                <div class="d-flex mt-2"> 
                    <input type="button" value="More Details" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#persona_{{ $persona['id']}}">
                </div>
        </div>
    </div>
    <div class="modal fade" id="persona_{{ $persona['id']}}" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Persona Profile:</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-size: 30px">
                <img src="{{ $persona['image_url'] }}" height="150" width="150" class="mb-2 border rounded">
                {{ $persona['first_name'] }} {{$persona['last_name']}}
                <br>
                <div style="font-size: 15px">
                <h2 style="font-size: 20px">About this persona:</h2>
                <p>
                    <b>{{$persona['first_name']}} {{$persona['last_name']}}</b> is of age <b>{{$persona['age']}}</b> and lives in the area of
                    <b>{{$persona['city']}}</b>. This persona has been chosen for your company because they earn an salary of: <b>£{{$persona['income']}}</b>
                    per annum and have a <b>{{$persona['number_of_dependents']}}</b> people depending on their income.
                    @if ($persona['dietary_requirements'] !== '')
                    Furthermore, this persona requires that their diet includes <b>{{$persona['dietary_requirements'] }}</b> products.
                    @else
                    This persona has <b>no</b> dietary Requirements.
                    @endif
                    <br>
                    <p>
                        They have been selected for your company due to them being <b>
                        @if ($persona['age'] < 30)
                        young
                        @elseif ($persona['age'] > 70)
                        elderly
                        @else
                        mature
                        @endif
                        </b>
                        with a <b>
                        @if ($persona['income'] < 30000)
                        low
                        @elseif ($persona['income'] > 60000)
                        high
                        @else
                        medium
                        @endif
                        </b> income. Therefore, they are an example of someone who is <b>
                        @if (strlen($persona['last_name']) < 10)
                        likely
                        @else
                        not very likely
                        @endif
                        </b>to purchase your products
                    </p>
                </p>
                </div>
            </div>
            <div class="modal-footer d-flex">
                <div class="text-center">
                <b>This Persona is a
                <p hidden>
                {{$percentage = 0;}}
                @if (strlen($persona['last_name']) < 10)
                    {{$percentage = rand(50, 100);}}
                @else
                    {{$percentage = rand(0, 50);}}
                @endif
                </p>
                <b class="text-primary" style="font-weight: bold;">{{$percentage}}%</b> match</b>
            </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>

@endsection
