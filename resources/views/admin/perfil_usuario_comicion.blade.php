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
								<a href="{{route('listausuariocomicion')}}" class="btn btn-secondary btn-sm btn-block"><i class="fa fa-level-up"></i> Salir</a>
							</div>
							
						</div>
					</div>
					<div class="card-body">

						<div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Actualizar</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-item" role="tab" aria-controls="nav-profile" aria-selected="false">Items de Evaluacion</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar Contraseña</a>
                                         
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form action="{{route('UpdateUsuarioC')}}" method="POST">
                                    @method('PUT')
			                        @csrf
			                        	<input type="hidden" name="id" value="{{$persona->id}}"/>

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
                                			<a href="{{route('UpdatePassuserC',$usuario->id_comicion)}}" class="btn btn-success btn-sm btn-block"> Restableser Contraseña</a>
                                		</div>
                                	</div>
                                </div>

                                <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-profile-tab">
                                	@if($datos->id_permiso=='0')
                                	<div class="row">
                                		<div class="col-md-6"></div>
                                		<div class="col-md-6">
                                			<a href="{{route('formulariocomicionitem',$persona->ci)}}" class="btn btn-success btn-sm btn-block">Adicionar Items</a>
                                		</div>
                                	</div>
                                	@endif
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
			                                    	@if($datos->id_permiso<'3')
				                                        @if ($value->permiso =='5')
				                                            <a href="{{route('UpdatePermisoR',$value->id_itemcon)}}" class="btn btn-outline-warning btn-sm btn-block">Evaluador</a>
				                                        @else
				                                            <a href="{{route('UpdatePermisoE',$value->id_itemcon)}}" class="btn btn-outline-success btn-sm btn-block">Revisor</a>
				                                        @endif
				                                    
				                                    @else
				                                    	@if ($value->permiso =='5')
				                                            Evaluador
				                                        @else
				                                            Revisor
				                                        @endif
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
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
