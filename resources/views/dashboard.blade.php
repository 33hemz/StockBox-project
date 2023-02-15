@extends('templates.master')

@section('title', 'Dashboard')

@section('head')
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
        }
        html {
            font-size: 14px;
        }

        body {
            width: 100vw;
            height: 100vh;
            font-family: poppins, sans-serif;
            font-size: 0,88rem;
            user-select: none;
            overflow-x: hidden;
            background: rgb(255, 255, 255);

        }

        .container {
            display: grid;
            width: 95%;
            margin: 0;
            gap: 1.2rem;
            grid-template-columns: 14rem auto 23rem;

        }

        aside{
            height: 100vh;
            background: rgb(255, 255, 255);
            margin: 0;

        }
        aside .top{
            background: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.1rem;
        }

        aside .logo img{
            width: 25rem;
            height: 5.9rem ;
            margin-left: 1rem;
        }

        aside .sidebar{
            background: rgb(224, 224, 224);
            display: flex;
            flex-direction: column;
            height: 86vh;
            position: relative;
            top: 2rem;
            border-radius: 25px;
            padding-top: 1em;
        }
    
        aside .sidebar a{
            display: flex;
            margin-left: 2rem;
            gap: 1rem;
            position: relative;
            align-items: center;
            height: 3.5rem;
            transition: all 300ms ease;
            color: rgb(119, 119, 119);
        }

        aside .sidebar hr.divider{
            margin: 0 1rem 1rem;
        }

        aside .sidebar a.active{
            background: rgb(255, 255, 255);
            color: #2db28e;
            margin-left: 0;
        }

        aside .sidebar a.active::before{
            content: '';
            width: 6px;
            height: 100%;
            background:#2db28e; 
        }

        aside .sidebar a:hover{
            color: #2db28e;
        }

        .mid-container {
            display: grid;
            width: 100%%;
            margin-top: 120px;
            
        }

    </style>

@endsection

@section('content') 
<!-------------   SIDEBAR  ---------------->

    <div class = "container">
        <aside>
            <div class = "top">
                <div class = "logo">
                    <img src = "{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}">
                </div>
            </div> 
            <div class = "sidebar">
                <a style="text-decoration:none" href="#">
                    <h3>Data 1</h3>
                </a>
                <hr class="divider my-0">
                <a style="text-decoration:none" href="#">
                    <h3>Data 2</h3>
                </a>
                <hr class="divider my-0">
                <a style="text-decoration:none" href="#">
                    <h3>Data 3</h3>
                </a>
                <hr class="divider my-0">
                <a style="text-decoration:none" href="#">
                    <h3>Data 4</h3>
                </a>
            </div>
        </aside>
    
<!------------  CHARTS ---------------->

    <div class="mid-container">

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div><canvas id="myChart"></canvas></div>
        <div><canvas id="dChart"></canvas></div>

<!------------   BARCHART --------------->

        <div class="bubble">
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
        </div>

<!------------  DOUGNUT  --------------->

        <div class="bubble">
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
        </div>
    </div>
     

@endsection
