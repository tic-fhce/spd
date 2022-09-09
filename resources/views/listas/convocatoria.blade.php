@extends('front.front_admin')

@section('label2')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gestion</th>
                                    <th>Carrera</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Convocatoria #</th>
                                    <th>Concepto</th>
                                    <th>Estado</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($convocatoria as $value)
                                <?php $uri = array('id_carrera'=> $value->id_carrera,'id_convocatoria'=>$value->id_convocatoria ); ?>
                                <tr>
                                    <td>{{$value->id_convocatoria}}</td>
                                    <td>{{$value->gestion}}</td>
                                    <td>
                                        @if($datos->id_permiso==0)
                                            <a href="{{route('PerfilConvocatoria',$value->id_convocatoria)}}" class="btn btn-info btn-block"> {{$value->carrera}}</a>
                                        @else
                                            {{$value->carrera}}
                                        @endif
                                    </td>
                                    <td>{{$value->fecha_ini}}</td>
                                    <td>{{$value->fecha_fin}}</td>
                                    <td><a href="{{route('formularioitem',$value->id_convocatoria)}}">{{$value->numeroconvocatoria}}</a></td>
                                    <td>
                                        @if($datos->id_permiso==0)
                                            <a href="{{route('formularioevaluacion',$uri)}}" >{{$value->nombre}}</a>
                                        @else
                                            {{$value->nombre}}
                                        @endif
                                    </td>

                                    <td> 
                                        @if($value->estado=='1')
                                            <span class="btn btn-outline-info btn-sm">En Postulaciones</span>
                                        @endif
                                        @if($value->estado=='2')
                                            <span class="btn btn-outline-warning btn-sm">Proceso de Evaluacion</span>
                                        @endif
                                        @if($value->estado=='3')
                                            <span class="btn btn-outline-success btn-sm">Ciclo Terminado</span>
                                        @endif
                                        <br>
                                        <font size="1.5px"> Fecha de creacion : <a href="{{asset('storage/'.$value->pdf)}}" target="_blank">{{$value->created_at}}</a>
                                    </td>                                    
                                    <td><a href="{{route('listaItem',$value->id_convocatoria)}}" class="btn btn-outline-success btn-sm">Resultados</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8"><h3></h3></td>
                                    <td><h1></h1></td>
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

