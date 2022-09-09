@extends('front.front_comicion')

@section('label2')
<?php $uri= array('id_convocatoria' =>$convocatoria->id,'id_comicion'=>$datos->id);?>
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{$convocatoria->numeroconvocatoria}}</strong> 
                    </div>
                    <div class="card-body">
                     <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="alert" role="alert">
                                    Carrera : {{$convocatoria->carrera}}
                                </div>

                                <div class="alert alert-info" role="alert">
                                    Convocatoria para : {{$convocatoria->nombre}}
                                </div>
                                <div class="alert alert-success" role="alert">
                                    {{$convocatoria->detalle}}
                                </div>
                            </div>
                        </div>

                        <a href="{{asset('storage/'.$convocatoria->pdf)}}" target="_blanck" class="btn btn-sm btn-success btn-block">Descargar Convocatoria</a>
                        <a href="{{route('panel_comicion')}}" class="btn btn-sm btn-secondary btn-block">Salir</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <strong class="card-title">Materias / Areas / Cargos</strong>
                            </div>
                            <div class="col-md-5">
                                <a href="{{route('pdflistaconvocatoriapostulante',$uri)}}" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Descargar Lista de Postulantes</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('panel_comicion')}}" class="btn btn-secondary btn-block"><i class="fa fa-level-up"></i>Salir</a>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>                                    
                                    <th>Sigla</th>
                                    <th>Materia</th>
                                    <th>Carga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item as $value)
                                <?php $uri= array('id_convocatoria' =>$convocatoria->id,'id_item'=>$value->id_item);?>
                                <tr>
                                    <td>{{$value->id_item}}</td>
                                    <td>{{$value->sigla}}</td>
                                    <td>{{$value->materia}}</td>
                                    <td>{{$value->carga}} Horas/mes</td>
                                    <td><a href="{{route('listaPostulantes',$uri)}}" class="btn btn-sm btn-info btn-block">Ver Postulantes</a></td>
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
@endsection
