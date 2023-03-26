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
        body {
            background-color: #2db28e;
        }
    </style>
</head>
<body>
    @yield('content')    
    <script src="{{ asset('js/themetoggle.js') }}"></script>
</body>