@extends('templates.master')

@section('title', 'Dashboard')

@section('head')
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root{
            --color-primary: #2db28e; 
        }
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            appearance: none;
            border: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
            font-family: 'poppins', 'san-serif';
        }

        body {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        background-color: var(--veryLightGray);
        }

        .main{
            position: absolute;
            top: 220px;
            width: 90%;
            min-height: calc(100vh - 60px);
        }

        .cards {
            width: 100%;
            padding: 35px 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }   
        
        .cards .card{
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-radius: 10px;
            box-shadow: 0 7px 25px 0 #bbbbbb;
        }

    </style>

@endsection

@section('content') 

<!------------  LOGO   --------------->
 
<div class="container">
        <div class="logo">
            <img class="mt-5 mb-2" id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}" width="100" alt="Logo">
            <h1 class="border-bottom pb-2">Dashboard</h1>
        </div>
    </div>


<!------------  CHARTS ---------------->

    <div class="main">
        <div class="cards">
            <div class="card">
                <div class="card-content">
                    <div><canvas id="dChart"></canvas></div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div><canvas id="myChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------   BARCHART --------------->
        <script>
            const ctx = document.getElementById('myChart');
        
            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                beginAtZero: true
                }
                }
                }
            });
        </script>

<!------------  DOUGNUT  --------------->

        <script>
        const dgc = document.getElementById('dChart');

        new Chart(dgc, {
            type: 'doughnut',
            data: {
            labels: ['Red','Blue','Yellow'],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)'],
            hoverOffset: 4
            }]
        }
            });
        </script>
@endsection
