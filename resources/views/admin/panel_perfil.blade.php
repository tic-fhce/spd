<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
            	<div class="col-6 col-12-xsmall">
            		<h3>Datos Personales</h3>
            		<label>Nombre : {{$persona->nombre}}</label>
            		<label>Apellido : {{$persona->apellido}}</label>
            		<label>Correo : {{$persona->correo}}</label>	
            		<label>Celular : {{$persona->celular}}</label>	
            	</div>

            	<div class="col-6 col-12-xsmall">
            		<h3>Datos Usuario</h3>
            		<label>Usuario : {{$persona->usser}}</label>
            		<label>Rol : {{$persona->tipo}}</label>
            		<label>Carrera : {{$persona->carrera}}</label>
            	</div>
            	
            </div>
        </div>
    </div>
</section>