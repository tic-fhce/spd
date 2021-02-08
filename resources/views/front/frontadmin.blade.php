<!DOCTYPE HTML>
<!--
    facultad de humanidades TIC jmmk
-->
<html>
    <head>
        <title>SPD-FHCEADMIN</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    </head>
    <body class="is-preload">

        <!-- Header -->
        @include('plantilla.headeradmin')    

        <!-- Nav -->
        @include('plantilla.menuadmin')  
        
        <div class="row">
            <div class="col-3">
                <h2>Menu</h2>
                @yield('label1')    
            </div>
            <div class="col-9">
                @yield('label2')
            </div>
            
        </div>

        

        <!-- Footer -->
        @include('plantilla.pie')

        <!-- Scripts -->
            <script src="{{asset('assets/js/jquery.min.js')}}"></script>
            <script src="{{asset('assets/js/browser.min.js')}}"></script>
            <script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
            <script src="{{asset('assets/js/util.js')}}"></script>
            <script src="{{asset('assets/js/main.js')}}"></script>
        @yield('scripts')

    </body>
</html>