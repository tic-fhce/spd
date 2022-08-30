<!DOCTYPE HTML>
<!--
    facultad de humanidades TIC jmmk
-->
<html>
    <head>
        <title>SPD-FHCE-Postulacion</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
        @yield('css')
    </head>
    <body class="is-preload">

        <!-- Header -->
        @include('plantilla.header')    

        <!-- Nav -->
        @include('plantilla.menu')  
        
        <div class="row">
            @yield('label1')
        </div>

        @yield('label2')

        

        <!-- Footer -->
        @include('plantilla.pie')

        <!-- Scripts -->
            <script src="{{asset('assets/js/jquery.min.js')}}"></script>
            <script src="{{asset('assets/js/browser.min.js')}}"></script>
            <script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
            <script src="{{asset('assets/js/util.js')}}"></script>
            <script src="{{asset('assets/js/main.js')}}"></script>
            <script src="{{asset('assets/js/jquery.js')}}"></script>
            <script src="{{asset('assets/js/jquery.form.js')}}"></script>
        @yield('script')
    </body>
</html>