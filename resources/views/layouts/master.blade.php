<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Inventory management system')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('application_css_js/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@stack('css')
</head>
<body>
    <!-- Left Panel -->
 @include('partials.sidebar')

    <!-- Left Panel -->

    @yield('content')

    <script src="{{asset('application_css_js/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('application_css_js/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('application_css_js/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('application_css_js/assets/js/main.js')}}"></script>
    
    <script src="{{asset('application_css_js/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('application_css_js/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('application_css_js/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
@stack('js')
</body>

</html>
