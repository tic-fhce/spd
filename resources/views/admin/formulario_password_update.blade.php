@extends('front.front_admin')


@section('label2')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @if(session('mensaje_suses'))
                        <div class="alert alert-success" role="alert">
                            {{session('mensaje_suses')}}
                        </div>
                        @endif
                        @if(session('mensaje_error'))
                        <div class="alert alert-danger" role="alert">
                                {{session('mensaje_error')}}
                        </div>
                        @endif
                        <h3>Actualizar Contraseña</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('UpdatePassword')}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <input type="text" name="password" value="" class="form-control" placeholder="Nueva Contraseña" required="true" />    
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <input type="text" name="password2" value="" class="form-control" placeholder="Contraseña Actual" required="true" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <input class="btn btn-warning btn-sm btn-block" type="submit" value="Actualizar Contraseña"><br><br>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('perfil')}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
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
