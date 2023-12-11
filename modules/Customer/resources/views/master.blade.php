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
    <title>{{ config('app.name', 'Chăm sóc Khách hàng') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="shortcut icon" href="/assets/images/favicon.png" />
	
    {{ Html::style(asset('assets/css/styles.css')) }}
    {{ Html::script(asset('assets/js/scripts.js')) }}
    {{ Html::script(asset('assets/js/typeahead.bundle.min.js')) }}
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body> 
	<div id="wrapper">        
		<main id="main">            
            @section('content')
                <p>Dòng này là của master.blade.php</p>
                
            @show
		</main><!-- #main -->

        <footer id="footer" class="footer-wrapper bg-dark-gradient footer">
            <div class="footer-top">
                <div class="container">
                    
                </div>
            </div>
            <div class="footer-bottom footer-border-top light py-3">
                <div class="container text-center">
                    <p class="m-0">© 2023 copyright <a href="#" class="text-reset">TOPCOM</a></p>
                </div>
            </div>
        </footer><!-- .footer-wrapper -->

	</div><!-- #wrapper -->

</body>
</html>
