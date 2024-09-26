<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin-panel/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin-panel/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-panel/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-panel/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('admin-panel/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin-panel/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin-panel/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-panel/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('admin-panel/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-panel/assets/css/icons.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    
    <link href="{{ asset('admin-panel/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>

    <!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin-panel/assets/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('admin-panel/assets/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('admin-panel/assets/css/header-colors.css') }}"/>

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        @include('layouts.navigation')


        <!-- Page Content -->
        <main>
            <!--start header -->
            @include('layouts.header')
            <!--end header -->
            {{ $slot }}
        </main>

        <!--start switcher-->
        @include('layouts.theme-switcher')
        <!--end switcher-->
    </div>
    <!-- end wrapper -->

	<!-- Bootstrap JS -->
	<script src="{{ asset('admin-panel/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin-panel/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin-panel/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/plugins/chartjs/js/chart.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin-panel/assets/js/app.js') }}"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
    <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
    <!-- DataTable -->
	<script src="{{ asset('admin-panel/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin-panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
</body>

</html>
