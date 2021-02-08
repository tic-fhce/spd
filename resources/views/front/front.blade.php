<!DOCTYPE HTML>
<!--
    facultad de humanidades TIC jmmk
-->
<html>
    <head>
        <title>SPD-FHCE</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    </head>
    <body class="is-preload">

        <!-- Header -->
        @include('plantilla.header')    

        <!-- Nav -->
        @include('plantilla.menu')  
            

        <!-- Banner -->
        @include('plantilla.banner')
	   @include('plantilla.comunicado')

        <!-- Highlights -->
        @include('plantilla.portfolio')

        <!-- CTA -->
        <section id="cta" class="wrapper">
            <div class="inner">
                <h2>LA FACULTAD DE HUMANIDADES Y CIENCIAS DE LA EDUCACIÓN.</h2>
                <p>Vela por los estudiantes y usuarios asistentes que participan en los eventos de la Facultad, resguardando y validando sus certificados que son verificados y de fácil acceso por todas las instituciones del mundo. Permitiendo dar a los estudiantes y usuarios un respaldo digital de la experiencia teórica y práctica que han desarrollado u obtenido a lo largo de su vida académica en la Facultad de Humanidades y Ciencias de la Educación.</p>
            </div>
        </section>

        <!-- Testimonials -->
        @include('plantilla.testimonial')

        <!-- Footer -->
        @include('plantilla.pie')

        <!-- Scripts -->
            <script src="{{asset('assets/js/jquery.min.js')}}"></script>
            <script src="{{asset('assets/js/browser.min.js')}}"></script>
            <script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
            <script src="{{asset('assets/js/util.js')}}"></script>
            <script src="{{asset('assets/js/main.js')}}"></script>
            <script src="{{asset('assets/js/jquery.form.js')}}"></script>
            <script src="{{asset('assets/js/jquery.js')}}"></script>

    </body>
</html>
