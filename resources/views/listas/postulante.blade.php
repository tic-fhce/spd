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
                                    <th>NRO</th>
                                    <th>C.I.</th>
                                    <th>Postulante</th>
                                    <th>DNI</th>
                                    <th>Convocatoria</th>
                                    <th>Sigla</th>
                                    <th>Carrera</th>
                                    <th>Verificado</th>
                                    <th>Fecha de Registro</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($postulante as $value)
                                <?php 
                                    $uri = array('ci' =>$value->ci,'fecha'=>$value->fecha,'id'=>$value->id);
                                    $i=$i+1;
                                ?>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('datospostulante',$uri)}}" class="btn btn-info"> {{$value->ci}}</a></td>
                                    <td>{{$value->postulante}} {{$value->apellido}}</td>
                                    <td><?php echo(substr($value->codex,0,9));?></td>
                                    <td>{{$value->numero}}</td>
                                    <td><a href="{{route('datospostulante',$uri)}}">{{$value->sigla}}</a></td>
                                    <td>{{$value->carrera}}</td>
                                    <td>
                                        @if($value->verificado=='NO')
                                        <div class="alert alert-danger" role="alert">
                                        {{$value->verificado}}
                                        </div>
                                        @else
                                        <div class="alert alert-success" role="alert">
                                            {{$value->verificado}}
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8"><h3>Total Postulantes Encontrados</h3></td>
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
