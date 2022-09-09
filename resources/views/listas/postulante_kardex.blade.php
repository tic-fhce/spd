@extends('front.front_admin')


@section('label2')
<?php $uri = array('id_convocatoria'=>$item->id_convocatoria,'id_item'=>$item->id,'id_usuario'=>$datos->id); ?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">Postulantes para : {{$item->materia}}</div>
                            <div class="col-md-2">
                                <div class="alert alert-info" role="alert">
                                    Sigla : {{$item->sigla}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('pdflistaitempostulantekardex',$uri)}}" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Descargar Lista de Postulantes</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('listaItem',$item->id_convocatoria)}}" class="btn btn-secondary btn-block"><i class="fa fa-level-up"></i> Salir</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>                                        
                                    <th>#</th>
                                    <th>C.I.</th>
                                    <th>Postulante</th>
                                    <th>Verificado</th>
                                    <th>Cumple Requisitos</th>
                                    <th>Nota Final</th>                                    
                                    <th>Apelacion</th>
                                    <th>Seleccionado(a)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($postulante as $value)
                                 <?php    
                                    $i=$i+1;
                                    $uri = array('ci' => $value->ci,'fecha'=>$value->fecha,'id'=>$value->id);
                                 ?>
                                <tr>                                        
                                    <td>{{$i}}</td>                                    
                                    <td>
                                        
                                        @if($value->fisico=='SI')
                                            <a href="{{route('datospostulantekardex',$uri)}}" class="btn btn-outline-info btn-sm btn-block">  {{$value->ci}}</a>
                                        @else
                                            {{$value->ci}}
                                        @endif
                                    </td>
                                    <td>{{$value->postulante}} {{$value->apellido}}<br><font size="1.5px">Fecha de Registro {{$value->created_at}}</font></td>
                                    <td>
                                        @if($value->verificado=='SI')
                                        <span class="btn btn-outline-success btn-sm btn-block">{{$value->verificado}}</span>
                                        @else
                                        <span class="btn btn-outline-danger btn-sm btn-block">{{$value->verificado}}</span>
                                        @endif
                                            
                                    </td>
                                    <td>
                                        @if($value->cumple=='Cumple')
                                            <span class="btn btn-outline-success btn-sm btn-block">{{$value->cumple}}</span>
                                        @else
                                            <span class="btn btn-outline-danger btn-sm btn-block">{{$value->cumple}}</span>
                                        @endif
                                    </td>
                                    <td>{{$value->puntos}}</td>
                                    
                                    <td>
                                        @if($value->habilitado=='SI')
                                            <span class="btn btn-outline-danger btn-sm btn-block">Apelacion</a>
                                        @else                                        
                                            {{$value->habilitado}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->fisico=='SI')
                                            <div class="alert alert-info" role="alert">
                                                {{$value->fisico}}
                                            </div>
                                        @else
                                            {{$value->fisico}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"><h3>Total Postulantes </h3></td>
                                    <td><h1>{{$i}}</h1></td>
                                </tr>
                            </tfoot>      
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
@endsection
