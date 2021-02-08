@extends('front.front_admin')

@section('label2')
<?php $uri = array('id_convocatoria' =>$postulante->id_convocatoria ,'id_item'=>$postulante->id_item ); ?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                @include('admin.datos')
                @if(session('mensaje_error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('mensaje_error')}}
                    </div>
                @endif
                @if(session('mensaje_aprobar'))
                    <div class="alert alert-success" role="alert">
                        {{session('mensaje_aprobar')}}
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Opciones 
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('listaPostulantesKardex',$uri)}}" class="btn btn-sm btn-secondary btn-block"><i class="fa fa-level-up"></i> Salir</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="custom-tab">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Datos de Registro</a>
                                    @if($datos->id_permiso==0)
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Cambiar File</a>
                                    @endif
                                    
                                </div>
                            </nav>
                        
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row form-group">
                                                <div class="col-md-4">Carrera :</div>
                                                <div class="col-md-8">{{$postulante->carrera}}</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Convocatoria: </div>
                                                <div class="col-md-8">{{$postulante->convocatoria}}</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Numero : </div>
                                                <div class="col-md-8">{{$postulante->numero}}</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Materia : </div>
                                                <div class="col-md-8">{{$postulante->materia}}</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Sigla : </div>
                                                <div class="col-md-8">{{$postulante->sigla}}</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">NDI : </div>
                                                <div class="col-md-8">{{$postulante->codex}}</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Documentos Fisicos : </div>
                                                <div class="col-md-8">
                                                    @if($postulante->fisico=='SI')
                                                        <span class="badge badge-danger">Documentos Fisicos No Entregados</span>
                                                        <a href="{{route('UpdateFisicoOk',$postulante->id)}}" class="btn btn btn-outline-success btn-sm">Registrar</a>
                                                    @else
                                                        <span class="badge badge-success">Documentos Fisicos Entregados</span>
                                                        <a href="{{route('UpdateFisicoDonw',$postulante->id)}}" class="btn btn-outline-warning btn-sm">Dar de Baja</a>
                                                        
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Puntuación : </div>
                                                <div class="col-md-8"><a href="#">{{$postulante->puntos}}</a></div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col-md-4">Habilitado : </div>
                                                <div class="col-md-8"><a href="#">{{$postulante->habilitado}}</a></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Verificado por Vicedecanato : </div>
                                                <div class="col-md-8">
                                                    {{$postulante->verificado}}
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">Creado : </div>
                                                <div class="col-md-6"><a href="#">{{$postulante->created_at}}</a></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <?php 
                                            $file="storage/".$postulante->folder;
                                            $carta="storage/".$postulante->carta;
                                            ?> 
                                            <a href="{{asset($file)}}" class="btn btn-success btn-block">Descargar File</a>
                                            <a href="{{asset($carta)}}" class="btn btn-success btn-block" target="_blanck">Descargar Carta</a>
                                            <hr>
                                                <h1>ID : {{$postulante->id}}</h1>
                                            <hr>

                                            <label>Verificado por Vicedecanato</label>
                                            
                                            @if($postulante->verificado=='SI')
                                            <div class="alert alert-success">
                                            @else
                                            <div class="alert alert-danger">
                                            @endif
                                                <h1>{{$postulante->verificado}}</h1>
                                            </div>    
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="id" value="#">
                                        <div class="row form-group">
                                            <div class="col-lg-12">
                                                <input type="file" class="form-control" name="pdf" value="" required="true" />
                                            </div>                                            
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-lg-12">
                                                <input type="submit" class="btn btn-info btn-block" value="Cambiar File">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
