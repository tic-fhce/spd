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
                                    <th>C.I.</th>
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>Celular</th>
                                    <th>Carrera</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($usuario as $value)
                                
                                <tr>
                                    <td>{{$value->id_usuario}}</td>
                                    <td><a href="{{route('perfil_usuario',$value->id_usuario)}}" class="btn btn-info"> {{$value->ci}}</a></td>
                                    <td>{{$value->nombre}} {{$value->apellido}}</td>                                    
                                    <td>{{$value->usser}}</td>
                                    <td>{{$value->celular}}</td>
                                    <td>{{$value->carrera}}</td>
                                    <td>{{$value->tipo}}                                      
                                    </td>                                    
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
