<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd1181b8ae.js" crossorigin="anonymous"></script>
	<title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="icon" type="image/x-icon" href="assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png">
	@yield('head')
    
</head>

@if (in_array(request()->path(), ['dashboard', 'logout', 'create_new_user', 'processnewuser', 'brand_page']))
{{-- if one of these page, show sidebar --}}
<body class="d-flex flex-row" onload="toggleNav()">
	<div class="page_sidebar">
		<nav class="Navbar">
			<ul>
			<a href="javascript:void(0)" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
			<a href="{{ url('/dashboard') }}"><i class="fa-solid fa-gauge"></i> <span class="nav-text">Dashboard Page</span></a>
			<a href="{{ url('/create_new_user') }}"><i class="fa-solid fa-user-plus"></i> <span class="nav-text">New User</span></a>
			<a href="{{ url('/brand_page') }}"><i class="fa fa-empire"></i> <span class="nav-text">Brand Page</span></a>
			<a href="{{ url('/logout') }}"><i class="fa-solid fa-right-from-bracket"></i> <span class="nav-text">Logout</span></a>
			</ul>
		</nav>
	</div>
		
	<div id="page_content" class="container">
		@yield('content')
	</div>

	<script>
	let minimised = false;
	function toggleNav() {
		var navTexts = document.getElementsByClassName("nav-text");

		for (var i = 0; i < navTexts.length; i++) {
			if (minimised) {
				navTexts.item(i).style.display = 'inline-block';
			} else {
				navTexts.item(i).style.display = 'none';
			}
		}
		minimised = !minimised;
	}
	</script>
</body>
@elseif (in_array(request()->path(), ['/', 'user_manual']))
{{-- if these pages, show top header --}}
<body class="d-flex flex-column h-100">
	<header id="landing_header" class="d-flex align-items-center justify-content-between flex-column flex-md-row mt-3   ">
		<img id="landing_logo" class="ms-4" src="{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}" alt="StokBox Logo">
        <nav>
			<ul class="me-4">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ url('/user-manual') }}">User Manual</a></li>
				@if (auth()->check())
				<li><a href="{{ url('/dashboard') }}" class="text-primary">{{ auth()->user()->first_name }}'s Dashboard</a></li>
				@else
				<li><a href="{{ url('/login') }}" class="text-primary">Sign In</a></li>
				@endif
				
			</ul>
        </nav>
    </header>
	
	<div id="page_content">
		@yield('content')
	</div>
</body>
@else
{{-- else, show no header --}}
<body>
	@yield('content')
</body>
@endif

</html>