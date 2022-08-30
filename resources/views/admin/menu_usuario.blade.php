<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Adicionar Usuarios</a>
    <ul class="sub-menu children dropdown-menu">
        @if($datos->id_permiso=='0')
    	<li><i class="fa fa-id-card-o"></i><a href="{{route('formulariousuario')}}">Crear Usuarios</a></li>
        @endif
	    <li><i class="fa fa-group"></i><a href="{{route('formulariousuariocomicion')}}">Crear Comisiones</a></li>
    </ul>
</li>

<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Listar Usuarios</a>
    <ul class="sub-menu children dropdown-menu">
        @if($datos->id_permiso=='0')
    	<li><i class="fa fa-id-card-o"></i><a href="{{route('listausuarios')}}">Listar Usuarios</a></li>
        @endif
    	<li><i class="fa fa-group"></i><a href="{{route('listausuariocomicion')}}">Listar Comisiones</a></li>
    </ul>

</li>
