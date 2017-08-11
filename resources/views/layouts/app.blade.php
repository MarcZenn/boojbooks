<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booj Books Code Test</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Raleway:400,700,400italic,700italic|Josefin+Sans">

    <!-- Secure Styles -->
    <!-- <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ secure_asset('css/leaflet.css') }}" rel="stylesheet"> -->

    <!-- Unsecure Styles - for Dev -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/leaflet.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    @include('partials.nav')

    @yield('content')


    <!-- Secure scripts - Prod -->
    <!-- <script src="{{secure_asset('js/libs/js/all.js')}}"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

    <!-- Unsecure Styles - Dev -->
    <script src="{{asset('js/libs/js/all.js')}}"></script>
</body>
</html>
