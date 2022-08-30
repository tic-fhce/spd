@extends('front.front_admin')


@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
	
				<section class="card">
				    <div class="twt-feed bg-flat-color-2">
				        <div class="corner-ribon black-ribon">
				            <i class="fa fa-user-plus"></i>
				        </div>
				        <div class="fa fa-user-plus wtt-mark"></div>

				            <div class="media">	                
				                <div class="media-body">                                    
				                    <h2 class="text-white display-6">{{$persona->nombre}}</h2>
				                    <p class="text-light">C.I. : {{$persona->ci}}</p>
				                </div>
				            </div>
				    </div>
				                  
				    <div class="weather-category twt-category">
				                            
				    </div>
				    <footer class="twt-footer">
				    	@if(session('mensaje_error'))
                            <div class="alert alert-success" role="alert">
                                {{session('mensaje_error')}}
                            </div>
                        @endif
				        <h4><strong class="card-title mb-3">{{$titulo}}</strong></h4>
				    </footer>
				    <div class="card-footer">
				    	<div class="row">
				    		<div class="col-md-4">Nombre (s) : </div>
				    		<div class="col-md-8">{{$persona->nombre}}</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-4">Apellido (s) : </div>
				    		<div class="col-md-8">{{$persona->apellido}}</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-4">Correo : </div>
				    		<div class="col-md-8">{{$persona->correo}}</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-4">Celular : </div>
				    		<div class="col-md-8">{{$persona->celular}}</div>
				    	</div>
				    </div>
				</section>
			</div>
			<div class="col-md-8">
				<section class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">Opciones</div>
							<div class="col-md-6">
								<a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}" class="btn btn-secondary btn-sm btn-block"><i class="fa fa-level-up"></i> Salir</a>
							</div>
							
						</div>
					</div>
					<div class="card-body">

						<div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Actualizar</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar Contraseña</a>
                                         
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form action="{{route('UpdateUsuario')}}" method="POST">
                                    @method('PUT')
			                        @csrf
			                        	<input type="hidden" name="id" value="{{$persona->id}}"/>
			                        	<input type="hidden" name="id_usuario" value="{{$usuario->id_usuario}}"/>

			                            <div class="row form-group">
			                                <div class="col-md-3">
			                                    Nombre :
			                                </div>
			                                <div class="col-md-6">
			                                    <input type="text" name="nombre" class="form-control" value="{{$persona->nombre}}" placeholder="Nombre (s)" maxlength="100" required="true" />
			                                </div>
			                            </div>
			                            <div class="row form-group">
			                                <div class="col-md-3">
			                                    Apellido :
			                                </div>
			                                <div class="col-md-6">
			                                    <input type="text" name="apellido" class="form-control" id="name" value="{{$persona->apellido}}" placeholder="Apellido (s)" maxlength="100" required="true" />
			                                </div>
			                            </div>
			                            <div class="row form-group">
			                                <div class="col-md-3">
			                                    Correo :
			                                </div>
			                                <div class="col-md-6">
			                                    <input type="email" name="correo" class="form-control" value="{{$persona->correo}}" placeholder="Correo" required="true" />
			                                </div>
			                            </div>
			                            <div class="row form-group">
			                                <div class="col-md-3">
			                                    Celular :
			                                </div>
			                                <div class="col-md-6">
			                                    <input type="text" name="celular" class="form-control" value="{{$persona->celular}}" placeholder="Número Telefono - Número Celular" maxlength="50" required="true" />
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
			                                    <input class="btn btn-success btn-block" type="submit" value="Actualizar Datos">
			                                </div>
			                                <div class="col-md-6">
			                                    <a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}" class="btn btn-secondary btn-block">Cancelar </a>
			                                </div>
			                            </div>
			                            
			                        </form>
                                </div>
                                
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                	<br>
                                	<div class="row form-group">
                                		<div class="col-md-6">
                                			<a href="{{route('UpdatePassuser',$usuario->id_usuario)}}" class="btn btn-success btn-sm btn-block"> Restableser Contraseña</a>
                                		</div>
                                	</div>
                                </div>
                            </div>

                        </div>
						
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
