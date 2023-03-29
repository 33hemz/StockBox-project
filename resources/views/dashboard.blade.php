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
            box-shadow: rgba(0, 0, 0, 0.15) 1px 1px 2px 2px;
        }
    </style>
@endsection

@section('content')
<h1 class="border-bottom pb-2 mb-3">Dashboard</h1>
<div class="sec row row-cols-auto justify-content-evenly mb-5">
    <form method="GET" action="{{ route('dashboard') }}">
        <div class="d-flex gap-3 align-items-center flex-md-row flex-column">
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-select">
                    <option value=""></option>
                    @foreach ((array_keys($genderDataOriginal)) as $gender)
                        <option value="{{ $gender }}" {{ request('gender') === $gender ? 'selected' : '' }}>{{$gender}}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="age">Age:</label>
                <select class="form-select" name="age">
                    <option value=""></option>
                    @foreach ((array_keys($ageDataOriginal)) as $age)
                        <option value="{{ $age }}" {{ request('age') === $age ? 'selected' : '' }}>{{$age}}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="country">City:</label>
                <select class="form-select" id="city" name="city">
                    <option value=""></option>
                    @foreach ($citiesDataOriginal->keys() as $city)
                        <option value="{{ $city }}" {{ request('city') === $city ? 'selected' : '' }}>{{$city}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="income">Income:</label>
                <select class="form-select" id="income" name="income">
                    <option value=""></option>
                    @foreach ((array_keys($incomeDataOriginal)) as $income)
                        <option value="{{ $income }}" {{ request('income') === $income ? 'selected' : '' }}>{{$income}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="number_of_dependants">Dependants:</label>
                <select class="form-select" id="number_of_dependents" name="number_of_dependents">
                    <option value="" selected></option>
                    @foreach (($numOfDependentsDataOriginal->keys()) as $number_of_dependents)
                        <option value="{{ $number_of_dependents }}" {{ request('number_of_dependents') === $number_of_dependents ? 'selected' : '' }}>{{$number_of_dependents}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dietary">Dietary Requirements:</label>
                <select class="form-select" id="dietary_requirements" name="dietary_requirements">
                    <option value=""></option>
                    @foreach (($dietaryDataOriginal->keys()) as $dietary_requirements)
                        <option value="{{ $dietary_requirements }}" {{ request('dietary_requirements') === $dietary_requirements ? 'selected' : '' }}>{{$dietary_requirements}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column gap-2 ">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{route("dashboard")}}"class="btn btn-secondary" >Reset</a>  
            </div>
        </div>
    </form>
</div>
<div class="sec row">
    <div class="row">
        <div class="col bg-body-tertiary mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Gender Distribution</h3>
            <div><canvas id="genderChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
        </div>
        <div class="col bg-body-tertiary mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Age Distribution</h3>
            <div class="card-content"><canvas id="ageChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
        </div>
    </div>
    <div class="row">
        <div class="col bg-body-tertiary mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Average Income</h3>
            <div class="card-content"><canvas id="incomeChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
        </div>
        <div class="col bg-body-tertiary mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Number of Dependants</h3>
            <div class="card-content"><canvas id="numOfDependentsChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
        </div>
    </div>
    <div class="row">
        <div class="col bg-body-tertiary mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Cities (Top 5)</h3>
            <div class="card-content"><canvas id="citiesChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
        </div>
    </div>
    <div class="row">
        <div class="col bg-body-tertiary mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Dietary Requirements</h3>
            <div class="card-content"><canvas id="dietaryChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
        </div>
    </div> 
</div>

<script>
    const genderChart = document.getElementById('genderChart');
    new Chart(genderChart, {
        type: 'doughnut',
        data: {
            labels: {{ Js::from(array_keys($genderData)) }},
            datasets: [{
                data: {{ Js::from(array_values($genderData)) }},
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true
                },
                colors: {
                    colours: true
                }
            }
        }
    });

    const ageChart = document.getElementById('ageChart');
    new Chart(ageChart, {
        type: 'bar',
        data: {
            labels: {{ Js::from(array_keys($ageData)) }},
            datasets: [{
                data: {{ Js::from(array_values($ageData)) }},
                backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                colors: {
                    colours: true
                }
            }
        }
    });

    
    const incomeChart = document.getElementById('incomeChart');
    new Chart(incomeChart, {
        type: 'line',
        data: {
            labels: {{ Js::from(array_keys($incomeData)) }},
            datasets: [{
                data: {{ Js::from(array_values($incomeData)) }},
                backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                colors: {
                    colours: true
                }
            }
        }
    });

    
    const numOfDependentsChart = document.getElementById('numOfDependentsChart');
    new Chart(numOfDependentsChart, {
        type: 'polarArea',
        data: {
            labels: {{ Js::from($numOfDependentsData->keys()) }},
            datasets: [{
                data: {{ Js::from($numOfDependentsData->values()) }},
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true
                },
                colors: {
                    colours: true
                }
            }
        }
    });

    const citiesChart = document.getElementById('citiesChart');
    new Chart(citiesChart, {
        type: 'bar',
        data: {
            labels: {{ Js::from(($citiesData->keys())) }},
            datasets: [{
                data: {{ Js::from(($citiesData->values())) }},
                backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
            }]
        },
        options: {
            indexAxis: 'y',
            elements: {
                bar: {
                    borderWidth: 3,
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                colors: {
                    colours: true
                }
            }
        }
    });

    const dietaryChart = document.getElementById('dietaryChart');
    new Chart(dietaryChart, {
        type: 'polarArea',
        data: {
            labels: {{ Js::from($dietaryData->keys()) }},
            datasets: [{
                data: {{ Js::from($dietaryData->values()) }},
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true
                },
                colors: {
                    colours: true
                }
            }
        }
    });
</script>
@endsection
