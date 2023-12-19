<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TOPCOM')</title>
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    @stack('styles')

	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="shortcut icon" href="/assets/images/favicon.png" />
	
</head>

<body> 
	<div id="wrapper">      
        @include('JangKeyte::partials.header')
     
		<main id="main" class="mt-5 pt-3"> 
            @yield('content')
		</main><!-- #main -->

        @include('JangKeyte::partials.footer')

	</div><!-- #wrapper -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Theme script -->
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
