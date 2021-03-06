<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{url('/')}}/css/styles.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="index.html">POINT OF SALE</a>
		<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
					<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="text-white mt-3"><h6>{{ Auth::user()->name }}</h6></li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading">
							{{-- logo --}}
							
						</div>
						<a class="nav-link bg-secondary" href="{{url('/home')}}">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						@can('manage-users')
							<a class="nav-link" href="{{ route('users.index') }}">
								<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
								User Management
							</a>
							<a class="nav-link" href="{{ route('products.index') }}">
								<div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
								Products
							</a>
							<a class="nav-link" href="{{ route('sales.index') }}">
								<div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
							Sales
							</a>
						@endcan
						<a class="nav-link" href="{{ route('details.index') }}">
							<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
							Order
						</a>
						<a class="nav-link" href="{{ route('transactions.index') }}">
							<div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
							Transactions
						</a>
						<a class="nav-link" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-lg pr-2"></i>{{ __('Logout') }}
                        </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        	@csrf
                        </form>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as:</div>
						<h6 class="text-center">{{ implode(', ', Auth::user()->roles()->get()->pluck('name')->toArray()) }}</h6>
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			@yield('content')
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; POS DELA TORRE & SIOC 2021</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{url('/')}}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{url('/')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{url('/')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="{{url('/')}}/assets/demo/datatables-demo.js"></script>
		
</body>
@yield('script')
</html>
