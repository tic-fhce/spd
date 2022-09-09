@extends('front.frontlogin')

@section('label2')

<div id="heading">
    <h1>Selecciona la Carrera Para ver la lista de Habilitados</h1>
</div>
<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">

                <div class="col-12 col-12-xsmall"> 
                    
                    <div class="highlights">
                        
                        @foreach($carrera as $value)
                        <?php $uri = array('id_carrera'=> $value->id,'ci'=>0); ?>
                        <section>
                            <div class="content">
                                <header>
                                    <a href="{{route('lista_habilitado',$uri)}}" class="icon fa fa-address-card"><span class="label">Icon</span></a>
                                    <h4>{{$value->carrera}}</h4>
                                </header>
                                <a href="{{route('lista_habilitado',$uri)}}" class="button">Ver Lista</a>
                            </div>
                        </section>
                        @endforeach
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>

@endsection