<!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('images/admin.png')}}" alt="">
                        </a>

                        <div class="user-menu dropdown-menu">
                            @if(isset($datos->id_permiso))
                                <a class="nav-link" href="{{route('perfil')}}"><i class="fa fa-cog"></i> Perfil</a>
                                <a class="nav-link" href="{{route('formulariopasswordupdate')}}"><i class="fa fa-cog"></i> Contraseña</a>
                            @else
                                <a class="nav-link" href="{{route('formulariopasswordupdatec')}}"><i class="fa fa-cog"></i> Contraseña</a>
                            @endif
                            <a class="nav-link" href="{{route('salir')}}"><i class="fa fa-power-off"></i> Salir</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->