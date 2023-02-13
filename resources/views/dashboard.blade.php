@extends('templates.master')

@section('title', 'StokBox Home')

@section('head')
<<<<<<< HEAD
<<<<<<< HEAD
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
    </style>

@endsection

@section('content') 
{{-- {{ auth()->user()->username; }} --}}
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
    </div>
<div class = "chart-container">
    <canvas id="myChart"></canvas>
</div>
@endsection


