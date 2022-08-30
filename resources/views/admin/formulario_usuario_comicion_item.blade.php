@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        {{$titulo}}
                        @if(session('mensaje_error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('mensaje_error')}}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        Nombre(s): {{$comicion->nombre}}<br>
                        Apellido(s) : {{$comicion->apellido}}<br>
                        C.i. : {{$comicion->ci}}<br>
                        Correo : {{$comicion->correo}}<br>
                        <hr>
                        <form action="{{route('AddItemCom')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_comicion" value="{{$comicion->id_comicion}}">
                            <input type="hidden" name="ci" value="{{$comicion->ci}}">       
                            
                            <div class="row form-group">
                                <div class="col-md-6">Carrera :</div>
                                <div class="col-md-6">
                                    <select name="carrera" class="form-control" required="true" id="carrera">
                                        <option>Carrera</option>
                                        @foreach($carrera as $value)
                                            <option value="{{$value->id}}">{{$value->carrera}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">Convocatoria :</div>
                                <div class="col-md-6">
                                    <select name="id_convocatoria" class="form-control" id="convocatoria" required="true">
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">Item :</div>
                                <div class="col-md-6">
                                    <select name="id_item" class="form-control" id="item" required="true">
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    Rol :
                                </div>
                                <div class="col-md-6">
                                    <select name="permiso" class="form-control" required="true">
                                        <option value="">Rol</option>
                                        @foreach($permisos as $value)
                                        @if($value->id>'3')
                                            <option value="{{$value->id}}">{{$value->tipo}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input class="btn btn-success btn-block" type="submit" value="Registrar Datos">
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('listausuariocomicion')}}" class="btn btn-secondary btn-block">Salir</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <a href="{{route('listausuariocomicion')}}" class="btn btn-secondary btn-block"><i class="fa fa-level-up"></i> Salir</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Concepto</th>
                                    <th># Convocatoria</th>
                                    <th>Materia / Area / Cargo</th>
                                    <th>Carga Horaria</th>
                                    <th>Permisos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($itemcom as $value)
                                <tr>
                                    <td>{{$value->nombre}}</td>
                                    <td><a href="#" >{{$value->numeroconvocatoria}}</a></td>
                                    <td>{{$value->materia}} {{$value->sigla}}</td>
                                    <td>{{$value->carga}} hora/mes</td>
                                    <td>
                                        @if ($value->permiso =='5')
                                            Evaluador
                                        @else
                                            Revisor
                                        @endif
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
    <script>
        $(function(){
            $('#carrera').on('change',convocatoria);
        });
        function convocatoria(){
            var idcarrera=$(this).val();
            if(! idcarrera)
                $('#convocatoria').html('<option value="">Seleccionar Convocatoria</option>');
            else
            {

                $.get('https://svfhce.umsa.bo/sv/spd/api/apilistaconvocatoria/'+idcarrera,function(data){
                var html_select='<option value="">Seleccionar Convocatoria</option>';
                for(var i=0; i<data.length; ++i)
                    html_select+='<option value="'+data[i].id+'">'+data[i].detalle+'</option>';

                $('#convocatoria').html(html_select);

                });
            }
        }
        $(function(){
            $('#convocatoria').on('change',item);
        });
        function item(){
            var idconvocatoria=$(this).val();
            if(! idconvocatoria)
                $('#item').html('<option value="">Seleccionar Materia / Area / Cargo </option>');
            else
            {

                $.get('https://svfhce.umsa.bo/sv/spd/api/apilistaitem/'+idconvocatoria,function(data){
                var html_select='<option value="">Seleccionar Materia / Area / Cargo</option>';
                for(var i=0; i<data.length; ++i)
                    html_select+='<option value="'+data[i].id+'">'+data[i].materia+' - '+data[i].sigla+'</option>';

                html_select+='<option value="todos">Todos</option>';

                $('#item').html(html_select);

                });
            }
        }
    </script>
@endsection
