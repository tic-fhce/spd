@extends('front.front_comicion')

@section('label2')
<?php 
    $file="storage/".$postulante->folder;
    $carta="storage/".$postulante->carta;
    $image="storage/".$persona->filefoto;
    $uri = array('id_convocatoria' => $postulante->id_convocatoria,'id_item'=>$postulante->id_item); 
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <font size="2px">
                    @include('admin.admin_datos')
                </font>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h2>Apelacion del Postulante</h2></div>
                            <div class="col-6">
                                 @if(session('mensaje_error'))
                                    <div class="alert alert-danger" role="alert">
                                        <a href="#">{{session('mensaje_error')}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="roe">
                            <div class="col-6">
                                <p><strong>Motivo : </strong>{{$apelacion->por}}</p>
                                <p><strong>Detalle : </strong>{{$apelacion->detalle}}</p>
                                <p><strong>Obs : </strong>{{$apelacion->obs}}</p>
                                <p><strong>Respuesta : </strong>{{$apelacion->respuesta}}</p>
                                <hr>
                                @if($itemcom->permiso=='5')
                                <form action="{{route('UpdateApelacionComicion')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        
                                        <div class="col-12 col-12-xsmall">
                                            <input type="hidden" name="id_apelacion" value="{{$apelacion->id}}">
                                            <a href="#">Respuesta al Postulante</a> 
                                            <textarea name="respuesta" class="form-control" required="true">{{$apelacion->respuesta}}</textarea>
                                            <br>
                                        </div>
                                        <div class="col-6 col-12-xsmall" align="center">
                                            <input type="submit" value="Mandar Respuesta" class="btn btn-success btn-sm btn-block">
                                        </div>
                                        <div class="col-6 col-12-xsmall" align="center">
                                            <a href="{{route('listaPostulantes',$uri)}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                @endif
                            </div>
                            <div class="col-6">
                                <a href="{{route('datospostulantecomicion',$postulante->id)}}" class="btn btn-success btn-sm btn-block">Actualizar Requisitos</a><br><br>
                                <a href="{{route('datospostulanteRevisor',$postulante->id)}}" class="btn btn-success btn-sm btn-block">Actualizar Nota Final</a>
                                <a href="{{route('listaPostulantes',$uri)}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Puntuacion del Postulante
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Detalle</td>
                        <td>Puntos</td>
                        <td>Sobre</td>
                    </tr>
                    <?php $t=0;?>
                    @foreach($evaluacion as $value)
                        <?php 
                            $t=$t+$value->sobre;
                        ?>
                    <tr>
                        <td>{{$value->detalle}}</td>
                        <td>{{$value->puntos}}</td>
                        <td>/ {{$value->sobre}}</td>
                    </tr>

                    @endforeach
                    <tr>
                        <td><h2>Total</h2></td>
                        <td><h2>{{$postulante->puntos}}</h2></td>
                        <td><h2>/{{$t}}</h2></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                
                <div class="col-5 col-12-xsmall">
                   
                    <div class="row">
                        <div class="col-12 col-12-xsmall">
                            <h3></h3>
                                
                            
                            <hr>
                            
                        </div>

                        
                        <div class="col-12 col-12-xsmall">
                            
                        </div>
                        <div class="col-12 col-12-xsmall" align="center">
                            <a href="{{route('listaPostulantes',$uri)}}" class="button fit small">Salir</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-12-xsmall">
                    <div class="row">
                        <div class="col-12 col-12-xsmall">
                                
                        </div>
                    </div>
                </div>
                
            </div> 
        </div>
    </div>
</section>
@endsection
