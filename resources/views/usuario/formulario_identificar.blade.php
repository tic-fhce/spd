@extends('front.frontlogin')

@section('label2')

<div id="heading" >
    <h1>Registrar datos de postulación</h1>
</div>

<section id="main">
    
    <div class="inner">
        @if(session('mensaje_error'))
            <div class="alert alert-danger" role="alert" align="center">
                <label><a href="#">{{session('mensaje_error')}}</a></label>
            </div>
        @endif
        <div class="content">
            <header>
                <h2>Verifica tus Datos</h2>
            </header>
            <div class="row">
                <div class="col-6">
                    <p>Coloca tus datos para comenzar con el registro de postulación, Coloca tu Cédula de Identidad y tu fecha de nacimiento Ej. 487567 lp</p>
                    <label>Antes de comenzar</label>
                    <ul>
                        <li><a href="https://www.youtube.com/watch?v=jstSx6GW8Y0" target="_blanck"> Mira el tutorial de registro antes de postularte y dejar tus documentos.</a></li>
                        <li><a href="{{asset($cartadox)}}" target="_blanck"> Descarga la Carta Modelo de Postulación.</a></li>
                        <li><a href="#" target="_blanck"> Foto 4x4 fondo celeste claro.</a></li>

                    </ul>

                    <a href="https://www.youtube.com/watch?v=jstSx6GW8Y0" target="_blanck" class="button">Video Tutorial</a>

                    <a href="{{asset($cartadox)}}" target="_blanck" class="button">Descargar Carta de Postulación</a>

                    <br>
                </div>

                <div class="col-6">
                    <form method="post" action="{{route('identificar')}}">
                        @csrf
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <input type="text" name="ci" id="ci" value="" placeholder="Cedula de Identidad" required="true" />
                            </div>
                            <div class="col-12 col-12-xsmall">
                                Fecha de Nacimiento: <input type="date" name="fecha" value="" required="true" />
                            </div>
                            <div class="col-12 col-12-xsmall">
                                <input class="button primary fit" type="submit" value="Registrar"><br>
                            </div>
                            <div class="col-12 col-12-xsmall">
                                <a href="{{route('index')}}" class="button fit">Cancelar Registro</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</section>

@endsection
