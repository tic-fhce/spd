<div class="inner">
	<section>
		<a href="{{route('panelkardex')}}">Escritorio</a>
	</section>
	<section>
	    <div class="content">
	    	<h4>{{$carrera->carrera}}</h4>
	       	<ul>
	       		<?php $kardex = array('id_carrera' => $datos->id_carrera,'id_concepto'=>'0' ); ?>
	       		<li><a href="{{route('listaconvocatoriakardex',$kardex)}}" >Convocatorias Vigentes</a></li>
	       	</ul>
	    </div>
	</section>
</div>