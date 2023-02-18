@extends('templates.master')

@section('title', 'Table')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<style>

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

        .heading {
            text-align: center;
        }



        .input-row {
            margin-top: 0px;
            margin-bottom: 20px;
        }

        .btn-submit {
            background: #efefef;
            border: #d3d3d3 1px solid;
            width: 100%;
            border-radius: 20px;
            cursor: pointer;
            padding: 12px;
        }

        .btn-submit:hover {
            background: #d9d8d8;
            border: #c3c1c1 1px solid;
        }

        .outer-container table {
            border-collapse: collapse;
            width: 100%;
        }

        .outer-container th {
            border-top: 2px solid #dddddd;
            background: #f9f9f9;
            padding: 8px;
            text-align: left;
            font-weight: normal;
        }

        .outer-container td {
            border-top: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .outer-container label {
            margin-bottom: 5px;
            display: inline-block;
        }

        #response {
            padding: 10px;
            border-radius: 15px;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        .file {
            border: 1px solid #cfcdcd;
            padding: 10px;
            border-radius: 20px;
            color: #171919;
            width: 100%;
            margin-bottom: 20px;
        }
</style>
@endsection

@section('content')
<html>
<body>
    <div class = "container">
        <aside>
            <div class = "top">
                <div class = "logo">
                    <img src = "{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}">
                </div>
            </div> 
        </aside>
    </div>
</body>
</html>




@endsection