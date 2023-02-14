@extends('templates.master')

@section('title', 'New User')

@section('head')
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

        .bubble {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin: 0;
            position: relative;
            align-items: center;
            background-color: #c5c5c5;
            border-radius: 25%;
            flex: 0 0 25%;
            flex: 1 1 auto;
            min-height: 1px;
        padding: 1.25rem;
        }
    </style>
@endsection

@section('content') 


<h1> Create New User </h1>
<form action="/newuser" method="post">
    @csrf

    <div style="padding: 7px;">
    <label for="company">Company </label>
    <input type="company" class="form-control">
    </div>

    <div style="padding: 7px;">
    <label for="Firstname">First name </label>
    <input type="username" class="form-control">
    </div>

    <div style="padding: 7px;">
    <label for ="Lastname">Last name </label>
    <input type="lastname" class="form-control">
    </div>

    <div style="padding: 7px;">
    <label for ="email">email </label>
    <input type="email" class="form-control">
    </div>

    <div style="padding: 7px;">
    <input type="submit" value="Create New User" class="btn btn-primary">
    </div>

</form>

@endsection