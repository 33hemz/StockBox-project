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
                    <div><canvas id="doughnutChart"></canvas></div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div><canvas id="polarChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------  DOUGNUT  --------------->

        <script>
        const dgc = document.getElementById('doughnutChart');

        new Chart(dgc, {
            type: 'doughnut',
            data: {
            labels: ['Jack','Taz','George','Darren'],
            datasets: [{
                label: 'Bitches',
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
                labels: ['Jack','Taz','George','Darren'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [200, 250, 100, 150],
                    backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(75, 192, 192)'],
                hoverOffset: 4
                }]
            }
                });
            </script>
@endsection
