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
                        <a href="{{route('panel_comicion')}}"> <i class="menu-icon fa fa-dashboard"></i>Escritorio</a>
                    </li>

                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Convocatorias</a>
                        <ul class="sub-menu children dropdown-menu">
                            @foreach($convocatorias as $value)
                            <?php $uri= array('id_convocatoria'=>$value->id_convocatoria,'ci'=>'0'); ?>
                                <li><i class="fa fa-folder-open-o"></i><a href="{{route('listaItems',$value->id_convocatoria)}}">{{$value->numeroconvocatoria}}</a></li>
                            @endforeach
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Tutoriales</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-id-card-o"></i><a href="">Revisar Requisitos</a></li>            
                            <li><i class="fa fa-id-badge"></i><a href="">Calificar</a></li>
                            <li><i class="fa fa-folder-open-o"></i><a href="">Curso Actual</a></li>
                            <li><i class="fa fa-folder-open-o"></i><a href="">Mis Cursos</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->

        </nav>
</aside><!-- /#left-panel -->