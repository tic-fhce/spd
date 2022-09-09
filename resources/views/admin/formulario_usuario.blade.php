@extends('front.front_admin')

@section('label2')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
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

                        <form action="{{route('AddUsuario')}}" method="POST">
                        @csrf

                            <div class="row form-group">
                                <div class="col-md-3">
                                    C.I. :
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="ci" class="form-control" value="" placeholder="Cedula de Identidad" maxlength="100" required="true" />                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-3">
                                    Nombre :
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nombre" class="form-control" value="" placeholder="Nombre (s)" maxlength="100" required="true" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    Apellido :
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="apellido" class="form-control" id="name" value="" placeholder="Apellido (s)" maxlength="100" required="true" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    Correo :
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="correo" class="form-control" value="" placeholder="Correo" required="true" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    Celular :
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="celular" class="form-control" value="" placeholder="Número Telefono - Número Celular" maxlength="50" required="true" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    Rol :
                                </div>
                                <div class="col-md-6">
                                    <select name="permiso" class="form-control" required="true">
                                        <option>Rol</option>
                                        @foreach($permisos as $value)
                                            <option value="{{$value->id}}">{{$value->tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    Carrera : 
                                </div>
                                <div class="col-md-6">
                                    <select name="carrera" class="form-control" required="true">
                                        <option value="">Carrera</option>
                                        @foreach($carrera as $value)
                                            <option value="{{$value->id}}">{{$value->carrera}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input class="btn btn-success btn-block" type="submit" value="Registrar Datos">
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}" class="btn btn-secondary btn-block">Cancelar </a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
