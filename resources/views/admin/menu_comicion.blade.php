<div class="inner">
	<section>
		<a href="{{route('panel_comicion')}}">Escritorio</a>
	</section>
	<section>
	    <div class="content">
	    	<h4>Convocatorias</h4>
	       	<ul>
	       		@foreach($convocatorias as $value)
	       			<?php $uri= array('id_convocatoria' =>$value->id_convocatoria,'id_item'=>'0'); ?>
	       			<li><a href="{{route('listaPostulantes',$uri)}}">{{$value->numeroconvocatoria}}</a> {{$value->carrera}}</li>
	       		@endforeach
	       	</ul>
	    </div>
	</section>
</div>