<nav id="menu">
    <ul class="links">
        @if(isset($datos->id_permiso))
            <li><a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}">Inicio</a></li>
            @if($datos->id_permiso==0)
            	<li><a href="{{route('panelusuario')}}">Panel Usuarios</a></li>
            @endif
            @if($datos->id_permiso<3)
            	<li><a href="{{route('panelgestion')}}">Panel Gestion</a></li>        	
            @endif
            @if(($datos->id_permiso==0) or ($datos->id_permiso==3))
                <li><a href="{{route('panelkardex')}}">Panel Kardex</a></li>          
            @endif
            <li><a href="{{route('panelperfil')}}">Perfil</a></li>
        @else
            <li><a href="{{route('panel_comicion')}}">Escritorio</a></li>
            <li><a href="{{route('formulariopasswordupdatec')}}">Cambiar Contraseña</a></li>
        @endif
        <li><a href="{{route('salir')}}">Salir</a></li>
    </ul>
</nav>