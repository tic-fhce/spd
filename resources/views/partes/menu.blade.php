<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img class="align-content" src="{{asset('images/logot.png')}}"></a>
                <a class="navbar-brand hidden" href=""><img src="{{asset('images/logot.png')}}" alt="Logo"></a>
            </div>


            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}"> <i class="menu-icon fa fa-dashboard"></i>Escritorio</a>
                    </li>
                    
                    <h3 class="menu-title">Menu Usuarios</h3>
                    @include('admin.menu_usuario')
                    
                    <h3 class="menu-title">Menu Gestion</h3>
                    @include('admin.menu_gestion')
                </ul>
            </div><!-- /.navbar-collapse -->

        </nav>
</aside><!-- /#left-panel -->