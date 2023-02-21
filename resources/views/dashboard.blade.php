@extends('templates.master')

@section('title', 'Dashboard')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .cards {
            width: 100%;
            padding: 35px 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }   
        
        .cards .card {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 10px;
            box-shadow: 0 7px 25px 0 #bbbbbb;
        }
    </style>
@endsection

@section('content') 
<h1 class="border-bottom pb-2">Dashboard</h1>

<!------------  CHARTS ---------------->
<div class="cards">
    <div class="card">
        <div class="card-content">
            <div><canvas id="doughnutChart"></canvas></div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div><canvas id="polarChart"></canvas></div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div><canvas id="lineChart"></canvas></div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div><canvas id="barChart"></canvas></div>
        </div>
    </div>
</div>


<!------------  DOUGNUT  --------------->
<script>
    const dough = document.getElementById('doughnutChart');

    new Chart(dough, {
        type: 'doughnut',
        data: {
        labels: ['Nestle','Kelloggs','Danone','Coca-Cola'],
        datasets: [{
            label: 'Sales',
            data: [200, 250, 100, 150],
            backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
        hoverOffset: 4
        }]
        }
    });
</script>


<!------------  POLAR AREA   -------------->
<script>
    const abc = document.getElementById('polarChart');

    new Chart(abc, {
        type: 'polarArea',
        data: {
        labels: ['Nestle','Kelloggs','Danone','Coca-Cola'],
        datasets: [{
            label: 'Sales',
            data: [200, 250, 100, 150],
            backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
        hoverOffset: 4
        }]
        }
    });
</script>


<!-------------  BAR CHART -------------->
<script>
    const gde = document.getElementById('barChart');

    new Chart(gde, {
        type: 'bar',
        data: {
        labels: ['Nestle','Kelloggs','Danone','Coca-Cola'],
        datasets: [{
            label: 'Sales',
            data: [200, 250, 100, 150],
            backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 205, 86, 0.2)','rgba(75, 192, 192, 0.2)',],
            borderColor: ['rgb(255, 99, 132)','rgb(255, 159, 64)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
        hoverOffset: 4
        }]
        }
    });
</script>

<!-------------  LINE  ------------------>

<script>
    const line = document.getElementById('lineChart');

    new Chart(line, {
        type: 'line',
        data: {
        labels: ['Nestle','Kelloggs','Danone','Coca-Cola'],
        datasets: [{
            label: 'Sales',
            data: [200, 250, 100, 150],
            borderColor: ['rgb(255, 99, 132)'],
            tension: 0.1,
        hoverOffset: 4
        }]
        }
    });
</script>
@endsection
