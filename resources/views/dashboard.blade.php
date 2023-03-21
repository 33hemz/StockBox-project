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
<h1 class="border-bottom pb-2 mb-3">Dashboard</h1>

<h2>Demographic Data</h2>
<div class="sec row row-cols-auto justify-content-evenly mb-5">
    <div class="col card mx-2 my-3">
        <h3 class="card-title fs-5">Gender Distribution</h3>
        <div class="card-content"><canvas id="genderChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
    </div>
    <div class="col card">
        <h3 class="card-title fs-5">Age Distribution</h3>
        <div class="card-content"><canvas id="ageChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
    </div>
    <div class="col card mx-2 my-3">
        <h3 class="card-title fs-5">Countries</h3>
        <div class="card-content"><div id="countriesChart" style="min-width: 590px; max-width: 900px;"></div></div>
    </div>
    <div class="col card mx-2 my-3">
        <h3 class="card-title fs-5">Average Income</h3>
        <div class="card-content"><canvas id="incomeChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
    </div>
    <div class="col card mx-2 my-3">
        <h3 class="card-title fs-5">Number of Dependants</h3>
        <div class="card-content"><canvas id="numOfDependentsChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
    </div>
</div>

<h2>Psychographic Data</h2>
<div class="sec row row-cols-auto justify-content-evenly mb-5">
    <div class="col card mx-2 my-3">
        <h3 class="card-title fs-5">Dietary Requirements</h3>
        <div class="card-content"><canvas id="dietaryChart" style="min-height: 200px; max-height: 200px;"></canvas></div>
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
