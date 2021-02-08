@extends('front.front_admin')


@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
	
				<section class="card">
				    <div class="twt-feed bg-flat-color-3">
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
				        <h4><strong class="card-title mb-3">{{$titulo}}</strong></h4>
				    </footer>
				    <div class="card-footer">
				        Nombre (s): {{$persona->nombre}}<br>
				        Apellido (s) : {{$persona->apellido}}<br>
				        Correo : {{$persona->correo}}<br>
				        Celular : {{$persona->celular}}<br>
				    </div>
				</section>
			</div>
			<div class="col-md-4">
				<section class="card">
					<div class="card-header"><h2>Opciones</h2></div>
					<div class="card-body">
						<a href="{{route('formulariopasswordupdate')}}" class="btn btn-success btn-sm btn-block"> Cambiar Contraseña</a>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
