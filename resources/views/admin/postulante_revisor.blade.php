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
                            <div class="col-6">
                                @if(session('mensaje_error'))
                                    <div class="alert alert-danger" role="alert">
                                        <a href="#">{{session('mensaje_error')}}</a>
                                    </div>
                                @endif
                                Materia : {{$postulante->materia}}<br>
                                Sigla : {{$postulante->sigla}}<br>        
                            </div>
                            <div class="col-3">
                                <a href="{{asset($file)}}" class="btn btn-success btn-sm btn-block" >Descargar File</a><br><br>
                            </div>
                            <div class="col-3">
                                <a href="{{asset($carta)}}" class="btn btn-success btn-sm btn-block">Descargar Carta</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if($postulante->puntos=='0')
                        <form action="{{route('AddPuntos')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_postulante" value="{{$postulante->id}}">
                            <input type="hidden" name="id_carrera" value="{{$id_carrera}}">
                            <input type="hidden" name="id_convocatoria" value="{{$postulante->id_convocatoria}}">
                            <input type="hidden" name="id_concepto" value="{{$postulante->id_concepto}}">
                            <div class="form-group">
                                <div class="row">
                                    Usar el (.) para decimales <strong>Ej. puntos 18.12</strong>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Detalle</td>
                                            <td>Puntos</td>
                                            <td>Sobre</td>
                                        </tr>
                                        @foreach($factor as $value)
                                        <?php $i='dato'.$value->id;?>
                                        <tr>
                                            <td>{{$value->detalle}} Maxima puntuacion <span class="badge badge-danger">{{$value->maximo}} puntos </span></td>
                                            <td>
                                                <input type="text" id="{{$value->id}}" name="{{$i}}" class="form-control" required="true" maxlength="5">
                                            </td>
                                            <td><h2>/{{$value->maximo}}</h2></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        @if($itemcom->permiso=='5')
                                            <input class="btn btn-success btn-sm btn-block" type="submit" value="Registrar Puntos">
                                        @endif  
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('listaPostulantes',$uri)}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="{{route('UpdatePuntos')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_postulante" value="{{$postulante->id}}">
                            <input type="hidden" name="id_carrera" value="{{$id_carrera}}">
                            <input type="hidden" name="id_convocatoria" value="{{$postulante->id_convocatoria}}">
                            <input type="hidden" name="id_concepto" value="{{$postulante->id_concepto}}">
                            <div class="form-group">
                                <div class="row">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Detalle</td>
                                            <td>Puntos</td>
                                            @if($itemcom->permiso=='5')
                                            <td width="26%">Nueva Puntuacion</td>
                                            @endif

                                        </tr>
                                        <?php $t=0;?>
                                        @foreach($evaluacion as $value)
                                        <?php 
                                            $i='dato'.$value->id;
                                            $t=$t+$value->sobre;
                                        ?>
                                            <tr>
                                                <td>{{$value->detalle}}</td>
                                                <td>{{$value->puntos}} / {{$value->sobre}}</td>
                                                @if($itemcom->permiso=='5')
                                                <td>
                                                    <input type="text" id="{{$value->id}}" name="{{$i}}" value="{{$value->puntos}}" class="form-control" required="true" maxlength="5">
                                                </td>
                                                @endif
                                            </tr>

                                        @endforeach
                                        <tr>
                                            <td><h2>Total</h2></td>
                                            <td><h2>{{$postulante->puntos}}</h2></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        @if($itemcom->permiso=='5')
                                        <input type="submit" class="btn btn-warning btn-sm btn-block" value="Actualizar">
                                        @endif
                                        <br><br>
                                    </div>

                                    <div class="col-6">
                                        <a href="{{route('listaPostulantes',$uri)}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
