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
<body class="d-block d-lg-flex">
	@auth
	<div id="collapse">
        <button class="open" onclick="openNav()"><i class="fa-solid fa-bars"></i></button>
      </div>
      <div class="sidebar_back"></div>
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
		
		<script>
		function openNav() {
			document.getElementById("navbar").style.width = "260px";
			document.getElementById("collapse").style.marginLeft = "260px";
		}

		function closeNav() {
			document.getElementById("navbar").style.width = "0";
			document.getElementById("collapse").style.marginLeft= "0";
		}
		</script>
	</div>
	@endauth
	<div id="page_content">
		@yield('content')
	</div>
</body>
</html>