@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <a href="{{asset('storage/'.$convocatoria->pdf)}}" target="_blanck"> {{$convocatoria->numeroconvocatoria}}</a>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-4">Concepto :</div>
                            <div class="col-md-8">{{$convocatoria->nombre}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">Gestion :</div>
                            <div class="col-md-8">{{$convocatoria->gestion}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">Carrera :</div>
                            <div class="col-md-8">{{$convocatoria->carrera}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">Detalle :</div>
                            <div class="col-md-8">{{$conv->detalle}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">Inicio :</div>
                            <div class="col-md-8">{{$convocatoria->fecha_ini}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">Fin :</div>
                            <div class="col-md-8">{{$convocatoria->fecha_fin}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">Estado :</div>
                            <div class="col-md-8">
                                @if($conv->estado=='1')
                                    <span class="btn btn-outline-info btn-sm">En Postulaciones</span>
                                @endif
                                @if($conv->estado=='2')
                                    <span class="btn btn-outline-warning btn-sm">Proceso de Evaluacion</span>
                                @endif
                                @if($conv->estado=='3')
                                    <span class="btn btn-outline-success btn-sm">Ciclo Terminado</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('listaconvocatoria',$datos->id_carrera)}}" class="btn btn-secondary btn-block">Salir</a>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Items de la Convocatoria
                                    </div>
                                    <div class="col-md-6">
                                        @if($datos->id_permiso<'3')
                                            <a href="{{route('formularioadditem',$convocatoria->id_convocatoria)}}" class="btn btn-success btn-block">Agregar Items</a>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Sigla</th>
                                            <th>Carga</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($item as $value)
                                        <?php $items = array('id_convocatoria' => $convocatoria->id_convocatoria,'id_item'=>$value->id); ?>
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td><a href="{{route('formularioitemUpdate',$items)}}">{{$value->materia}}</a></td>
                                            <td><a href="{{route('formularioitemUpdate',$items)}}">{{$value->sigla}}</a></td>
                                            <td>{{$value->carga}} horas/mes</td>
                                            <td>{{$value->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>      
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">Requisitos de la Convocatoria</div>
                                    <div class="col-md-6">
                                        @if($datos->id_permiso<'3')
                                            <a href="{{route('formularioaddrequisito',$convocatoria->id_convocatoria)}}" class="btn btn-success btn-block">Agregar Requisitos</a>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Inciso</th>
                                            <th>Detalle</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requisito as $value)
                                        <?php $requi = array('id_convocatoria' => $convocatoria->id_convocatoria,'id_requisito'=>$value->id); ?>
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td><a href="{{route('FormularioRequisitoUpdate',$requi)}}">{{$value->inciso}}</a></td>
                                            <td><a href="{{route('FormularioRequisitoUpdate',$requi)}}">{{$value->detalle}}</a></td>                                            
                                            <td>{{$value->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>      
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
