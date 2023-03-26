<!DOCTYPE html>
<html data-bs-theme="light">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/main.min.css') }}">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd1181b8ae.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>@yield('title') | StokBox Analytics</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/Full Logo/PNG/StokBox-Square-01 - Cropped.png') }}">
	@yield('head')
    
</head>

@if ((in_array(request()->path(), ['dashboard', 'logout', 'admin/create-new-user', 'admin/process-new-user', 'admin/manage-user', 'brand-page', 'admin/upload-product-data', 'admin/view-product-data', 'my_personas_page'])) || (str_starts_with(request()->path(), 'admin/edit-user')))

{{-- if one of these page, show sidebar --}}
<body class="d-flex flex-column bg-body">
	<header id="landing_header" class="d-flex align-items-center justify-content-between flex-column flex-md-row border-bottom">
		<a href="{{ route('landing') }}"><img class="my-2 mx-4" src="{{ asset('assets/Full Logo/PNG/StokBox-02.png') }}" width=220 alt="StokBox Logo"></a>
		<nav>
			<ul class="me-4 text-center align-middle d-flex align-items-center">
				<li><span class="fw-bold fs-5"> Welcome Back, <span class="text-primary">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></h2></li>
				<li><a id="dark-mode-toggle" class="btn btn-outline-secondary" style="height:1.5em; width:1.5em; padding:0; margin:0;"> <i id="dark-mode-toggle-text" class="fa-solid fa-sun text-center align-middle fs-6"></i></a></li>
			</ul>
		</nav>
		<script src="{{ asset('js/themetoggle.js') }}"></script>
    </header>
	<div class="d-flex flex-column flex-md-row" style="flex: 1;">
		<div class="page_sidebar" id="auth_sidebar">
			<nav class="Navbar">
				<ul>
					<li><a href="#" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a></li>
					@if (auth()->user()->user_type === 'USER')
					<li><a class="nav-link {{ request()->routeIs('dashboard') ? 'active':'' }}" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i> <span class="nav-text" style="display: none;">Dashboard Page</span></a></li>
					<li><a class="nav-link {{ request()->routeIs('brand_page') ? 'active':'' }}" href="{{ route('brand_page') }}"><i class="fa-solid fa-people-roof"></i> <span class="nav-text" style="display: none;">Brand Page</span></a></li>
					<li><a class="nav-link {{ request()->routeIs('my_personas_page') ? 'active':'' }}" href="{{ route('my_personas_page') }}"><i class="fa-solid fa-user"></i> <span class="nav-text" style="display: none;">My Saved Personas</span></a></li>
					@elseif (auth()->user()->user_type === 'ADMIN')
					<li><a class="nav-link {{ request()->routeIs('create_new_user') ? 'active':'' }}" href="{{ route('create_new_user') }}"><i class="fa-solid fa-user-plus"></i> <span class="nav-text" style="display: none;">Create New Users</span></a></li>
					<li><a class="nav-link {{ request()->routeIs('manage_user') ? 'active':'' }}" href="{{ route('manage_user') }}"><i class="fa-solid fa-pen-to-square"></i> <span class="nav-text" style="display: none;">Manage Users</span></a></li>
					<li><a class="nav-link {{ request()->routeIs('upload_product_data') ? 'active':'' }}" href="{{ route('upload_product_data') }}"><i class="fa-solid fa-upload"></i> <span class="nav-text" style="display: none;">Upload Data</span></a></li>
					<li><a class="nav-link {{ request()->routeIs('view_product_data') ? 'active':'' }}" href="{{ route('view_product_data') }}"><i class="fa-solid fa-eye"></i> <span class="nav-text" style="display: none;">View Product Data</span></a></li>
					@endif
					<li><a class="nav-link" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> <span class="nav-text" style="display: none;">Logout</span></a></li>
				</ul>
				<script src="{{ asset('js/navtoggle.js') }}"></script>
			</nav>
		</div>
			
		<div id="page_content" class="container" style="min-width: 0;">
			@if (session('success'))
            <div class="alert alert-success mt-3 mb-0" role="alert">
                {{ session('success') }}
            </div>
			@endif
			@if (session('warning'))
				<div class="alert alert-warning mt-3 mb-0" role="alert">
					{{ session('warning') }}
				</div>
				@endif
			@if (session('danger'))
			<div class="alert alert-danger mt-3 mb-0" role="alert">
				{{ session('danger') }}
			</div>
			@endif
			<div class="container mt-4">
				@yield('content')
			</div>
		</div>
	</div>
</div>
</body>

@elseif (in_array(request()->path(), ['/', 'user-manual']))
{{-- if these pages, show top header --}}
<body class="d-flex flex-column h-100 bg-body">
	<header id="landing_header" class="d-flex align-items-center justify-content-between flex-column flex-md-row mt-3">
		<a href="{{ route('landing') }}"><img class="my-2 mx-4" src="{{ asset('assets/Full Logo/PNG/StokBox-02.png') }}" width=350 alt="StokBox Logo"></a>
        <nav>
			<ul class="me-4 my-3 align-items-center">
				<li><a class="text-body fw-bold" href="{{ route('landing') }}">Home</a></li>
				<li><a class="text-body fw-bold" href="{{ route('user_manual') }}">Help?</a></li>
				@if (auth()->check())
					<li><a href="{{ route('logout') }}" class="btn btn-outline-primary fw-bold py-1">Logout</a></li>
				@else
				<li><a href="{{ route('login') }}" class="btn btn-outline-primary fw-bold py-1">Sign In</a></li>
				@endif
				<li><a id="dark-mode-toggle" class="btn btn-outline-secondary" style="width:2.2em;"> <i id="dark-mode-toggle-text" class="fa-solid fa-sun text-center align-middle"></i></a></li>
			</ul>
        </nav>
		<script src="{{ asset('js/themetoggle.js') }}"></script>
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