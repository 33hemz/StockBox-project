<!DOCTYPE html>
<html data-bs-theme="light">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/main.min.css') }}">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd1181b8ae.js" crossorigin="anonymous"></script>
	<title>@yield('title') | StokBox Analytics</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}">
	@yield('head')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #2db28e;
            min-height: 100vh; 
            height: 100%;
        }
        #main-form{
            width: 28rem;
        } 
        
        @media (max-width: 768px) {
            #main-form{
                width: 100%;
                border-radius: 0;
            }  
        }
    </style>
</head>
<body class="d-flex flex-column align-items-stretch align-items-md-center justify-content-center">
    <div id="main-form" class="card shadow-md bg-body-secondary flex-fill flex-md-shrink-0 flex-md-grow-0 h-100 h-md-auto d-flex flex-column align-items-center justify-content-center">
        <div class="d-flex flex-column w-100">
    
          <a href="{{ route('landing') }}" class="d-block mx-auto">
            <img id="logo" src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" width="150" alt="Logo" class="mx-auto">
          </a>
    @yield('content')    
    <script src="{{ asset('js/themetoggle.js') }}"></script>
</body>