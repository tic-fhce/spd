<div class="inner">
	<section>
		<a href="{{route('panelperfil')}}">Escritorio</a>
	</section>
	<section>
	    <div class="content">
	    	<h4>{{$persona->nombre}}</h4>
	       	<ul>
	       		<li><a href="{{route('formulariopasswordupdate')}}">Cambiar Contraseña</a></li>       		
	       	</ul>
	       	
	    </div>
	</section>
</div>