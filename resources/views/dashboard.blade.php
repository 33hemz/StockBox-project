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
        <div class="d-flex gap-3">
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-select">
                    <option value=""></option>
                    @foreach ((array_keys($genderData)) as $gender)
                        <option value="{{ $gender }}" {{ request('gender') == $gender ? 'selected' : '' }}>{{$gender}}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="age">Age:</label>
                <select class="form-select" name="age">
                    <option value=""></option>
                    @foreach ((array_keys($ageData)) as $age)
                    <option value="{{ $age }}">{{$age}}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="country">Countries:</label>
                <select class="form-select">
                    <option value=""></option>
                    @foreach (($countries) as $country)
                        <option value="{{ $country }}">{{$country}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="income">Income:</label>
                <select class="form-select">
                    <option value=""></option>
                    @foreach ((array_keys($incomeData)) as $income)
                        <option value="{{ $income }}">{{$income}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="number_of_dependants">Dependants:</label>
                <select class="form-select">
                    <option value=""></option>
                    @foreach (($numOfDependentsData->keys()) as $dependants)
                        <option value="{{ $dependants }}">{{$dependants}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dietary">Dietary Requirements:</label>
                <select class="form-select">
                    <option value=""></option>
                    @foreach (($dietaryData->keys()) as $dietary)
                        <option value="{{ $dietary }}">{{$dietary}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
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
        <div class="col mx-2 my-3 rounded p-3">
            <h3 class="card-title fs-5">Countries</h3>
            <div class="card-content"><div id="countriesChart" style="min-width: 590px; max-width: 900px;"></div></div>
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

    google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable({{ Js::from($countriesData) }}, true);

        var options = {
            colorAxis: {colors: ['#ffffff', '#2db28e']} 
        };

        var chart = new google.visualization.GeoChart(document.getElementById('countriesChart'));

        chart.draw(data, options);
    }


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

    const dietaryChart = document.getElementById('dietaryChart');
    new Chart(dietaryChart, {
        type: 'bar',
        data: {
            labels: {{ Js::from($dietaryData->keys()) }},
            datasets: [{
                data: {{ Js::from($dietaryData->values()) }},
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
</script>
@endsection
