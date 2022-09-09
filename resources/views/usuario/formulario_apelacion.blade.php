@extends('front.frontlogin')

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                <div class="col-3 col-12-xsmall">
                    @include('usuario.datos')
                    <hr>
                    <a href="{{route('SalirUsuario')}}" class="button primary fit small">Salir</a>
                    
                </div>
                
                <div class="col-5 col-12-xsmall">
                    <h3>Resultados de la Postulacion</h3>
                    Carrera : {{$postulante->carrera}}<br>
                    Convocatoria # : {{$postulante->numero}}<br>
                    Para : {{$postulante->convocatoria}}<br>
                    Materia : <a href="#">{{$postulante->materia}}</a><br>
                    Sigla : {{$postulante->sigla}}<br>
                    NDI : {{$postulante->codex}}<br>
                    <hr>
                    <a href="#">Verificado por Vicedecanato</a> : {{$postulante->verificado}}<br>
                    Nota Final : {{$postulante->puntos}}<br>
                    Requistos  : 
                    @if ($postulante->cumple =='s')
                        No Revisado 
                    @else
                        <a href="#">{{$postulante->cumple}}</a>
                    @endif
                        <br>
                    Detalle  : {{$postulante->detalle}}<br>
                    <hr>
                    <h3>Evaluacion </h3>
                    <table>
                        <tr>
                            <td>Detalle</td>
                            <td>Puntos</td>
                            <td>Puntos</td>
                        </tr>
                        <?php $t=0;?>
                        @foreach($evaluacion as $value)
                        <?php 
                            $t=$t+$value->sobre;
                        ?>
                        <tr>
                            <td><font size="1.8px">{{$value->detalle}}</font></td>
                            <td>{{$value->puntos}}</td>
                            <td>/ {{$value->sobre}}</td>
                        </tr>

                        @endforeach
                        <tr>
                            <td><h2>Total</h2></td>
                            <td><h3>{{$postulante->puntos}}</h3></td>
                            <td><h3>/ {{$t}}</h3></td>
                        </tr>
                    </table>
                </div>
                <div class="col-1 col-12-xsmall">
                    <br>
                </div>
                <div class="col-3 col-12-xsmall">
                    <div class="table-wrapper">
                        @if(isset($apelacion))
                        <a href="{{asset('storage/'.$postulante->folder)}}" class="button fit small" >Descargar File</a><br><br>
                        <a href="{{asset('storage/'.$postulante->carta)}}" target="_blanck" class="button fit small">Descargar Carta</a>
                        <br>
                        <br>
                        @if(session('mensaje_error'))
                            <div class="alert alert-danger" role="alert">
                                <a href="#">{{session('mensaje_error')}}</a>
                            </div>
                        @endif
                            @if($apelacion->estado=='1')
                            <h3>Formulario de Apelación</h3>

                                                    
                            <form action="{{route('UpdateApelacion')}}" method="post">
                                @csrf 
                                <input type="hidden" name="id_apelacion" value="{{$apelacion->id}}">
                                Seleccione una observación :
                                <select name="por" required="true">
                                    <option value="">Seleccionar</option>
                                    <option value="NO Cumplo Con los Requisitos">NO Cumplo Con los Requisitos</option>
                                    <option value="Revisión del Examen">Revisión del Examen</option>
                                    <option value="No fue Verificado por Vicedecanato">No fue Verificado por Vicedecanato</option>
                                    <option value="Otros">Otros </option>
                                </select>
                                <br>
                                Detalle :
                                <textarea name="detalle" required="true">{{$apelacion->detalle}}</textarea>
                                <br>
                                Obs :
                                <textarea name="obs" required="true">{{$apelacion->obs}}</textarea>
                                <hr>
                                <input type="submit" value="Enviar" class="button small">
                            </form>
                            @else
                                <h3>Respuesta Evaluada</h3>
                                Apelacion por : {{$apelacion->por}}<br><br>
                                Detalle : {{$apelacion->detalle}}<br><br>
                                Obs : {{$apelacion->obs}}<br><br>
                                Respuesta : {{$apelacion->respuesta}}<br>
                            @endif

                        @else
                            No puede realizar Apelaciones por el Momento esto por:
                            <ul>
                                <li>La Comisión evaluadora no comenzó con las evaluaciones.</li>
                                <li>La Comisión evaluadora se encuentra en plena Evaluación.</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection
