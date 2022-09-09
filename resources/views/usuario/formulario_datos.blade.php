@extends('front.frontlogin')

@section('label2')

<section id="main" >
    <div class="inner">
        <div class="content">
            <header>
                <h4>Datos Personales</h4>
            </header>
            
            <div class="row">
                
                <div class="col-6 col-12-xsmall">
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <h2>C.I. : {{$ci}}</h2>    
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <h2>{{$fecha}}</h2>
                            Fecha de Nacimiento.
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <a href="{{route('index')}}" class="button">Cancelar Registro</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-12-xsmall">
                    <form action="{{route('AddPostulante')}}" method="POST" enctype="multipart/form-data">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="hidden" name="ci" value="{{$ci}}"><input type="hidden" name="fecha" value="{{$fecha}}">
                            <input type="text" name="nombre" value="" placeholder="Nombre (s)" maxlength="100" required="true" /><br>
                            <input type="text" name="apellido" id="name" value="" placeholder="Apellido (s)" maxlength="100" required="true" /><br>
                            <input type="email" name="correo" value="" placeholder="Correo" required="true" /><br>
                            <input type="text" name="celular" value="" placeholder="Número Telefono - Número Celular" maxlength="50" required="true" /><br>
                            <select name="grado" required="true">
                                <option value="">Grado Academico</option>
                                <option value="Univ.">Univ.</option>
                                <option value="Egresado">Egresado</option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                                
                            </select><br>
                      
                            <label>Foto Postulante : 4x4 fonfo celeste claro</label>
                            <input type="file" name="foto" accept=".jpg, .jepg, .png" required="true" /><br>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Registrar Datos">
                        </div>
                    </div>
                    </form>
                </div>
                
            </div> 
        </div>
    </div>
</section>

@endsection