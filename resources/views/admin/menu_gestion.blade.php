
@if($datos->id_permiso<'3')
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Adicionar Caracterisitca</a>
    <ul class="sub-menu children dropdown-menu">
    	<li><i class="fa fa-id-card-o"></i><a href="{{route('formularioconcepto')}}">Crear Conceptos de Convocatoria</a></li>
	    <li><i class="fa fa-id-badge"></i><a href="{{route('formularioconvocatoria')}}">Crear Convocatoria</a></li>
    </ul>
</li>
@endif

<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Verificar Listas</a>
    <ul class="sub-menu children dropdown-menu">
    	<li><i class="fa fa-id-card-o"></i><a href="{{route('listaconcepto')}}">Conceptos de Convocatoria</a></li>
	    <li><i class="fa fa-id-card-o"></i><a href="{{route('listaconvocatoria',$datos->id_carrera)}}">Convocatorias</a></li>
    </ul>
</li>

<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Postulantes</a>

    <ul class="sub-menu children dropdown-menu">
    	@foreach($carrera as $value)
            @if($datos->id_carrera=='1')
    	    	@if($value->id!=1)
    	       	<li><i class="fa fa-id-card-o"></i><a href="{{route('listaPostulante',$value->id)}}">{{$value->carrera}}</a></li>
    	       	@endif
            @else
                @if($value->id==$datos->id_carrera)
                <li><i class="fa fa-id-card-o"></i><a href="{{route('listaPostulante',$value->id)}}">{{$value->carrera}}</a></li>
                @endif
            @endif
	    @endforeach
    </ul>
</li>
