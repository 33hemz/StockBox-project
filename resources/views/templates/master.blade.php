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
	@yield('head')
    
</head>
<<<<<<< HEAD
<body class="d-block d-lg-flex">
	@auth
    <header>
	<div id="collapse">
        <button class="open" onclick="openNav()"><i class="fa-solid fa-bars"></i></button>
      </div>
      <div class="navbar_preview"></div>
      <div class="icon-preview ">
        <i class="fa-solid fa-gauge"></i>
      </div>
      <div class="icon-preview ">
        <i class="fa-solid fa-user"></i>
      </div>
		<nav id="navbar" class="Navbar " >
        <a href="javascript:void(0)" onclick="closeNav()" class="close"><i class="fa-solid fa-circle-xmark"></i></a>
			<ul>
          <a href=""><i class="fa-solid fa-gauge"></i> Dashboard Page</a>
          <a href=""><i class="fa-solid fa-user"></i> About Us</a>
        </ul>
        </nav>
    </header>

=======

@if (in_array(request()->path(), ['login']))
{{-- if these pages, show no header --}}
<body>
	@yield('content')
</body>

@elseif (in_array(request()->path(), ['/', 'user-manual']))
{{-- if these pages, show top header --}}
<body class="d-flex flex-column h-100">
    <header id="landing_header" class="d-flex align-items-center justify-content-between flex-column flex-md-row mt-3   ">
        <img id="landing_logo" class="ms-4" src="{{ asset('assets/Full Logo/PNG/StokBox-02@3x.png') }}" alt="StokBox Logo">
        <nav>
        <ul class="me-4">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/user-manual') }}">User Manual</a></li>
            <li><a href="{{ url('/login') }}" class="text-primary">Sign In</a></li>
        </ul>
        </nav>
    </header>

>>>>>>> b1c6b9b22b925b7b8391f6f9291eeec18a4b74db
	<div id="page_content">
		@yield('content')
	</div>
</body>
@else
{{-- else show sidebar --}}
<body class="d-flex flex-row" onload="toggleNav()">
	<div class="page_sidebar">
		<nav class="Navbar">
			<ul>
			<a href="javascript:void(0)" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
			<a href=""><i class="fa-solid fa-gauge"></i> <span class="nav-text">Dashboard Page</span></a>
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
@endif

</html>