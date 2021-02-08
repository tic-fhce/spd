@extends('front.frontlogin')

@section('label2')

<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                
                <div class="col-3 col-12-xsmall">
                    @include('usuario.datos')
                </div>

                <div class="col-1 col-12-xsmall">
                    <br>
                </div>

                <div class="col-8 col-12-xsmall"> 
                    <header>
                        <h3>Convocatorias Vigentes de las Carreras</h3>
                    </header>                    
                    <div class="highlights">
                        
                        @foreach($carrera as $value)
                        <?php  $data = array('ci' =>$datos['ci'] ,'fecha'=>$datos['fecha'],'carrera'=>$value->id); ?>
                        <section>
                            <div class="content">
                                <header>
                                    <a href="{{route('formulariopostulo',$data)}}" class="icon fa fa-address-card"><span class="label">Icon</span></a>
                                    <h4>{{$value->carrera}}</h4>
                                </header>
                                <a href="{{route('formulariopostulo',$data)}}" class="button">Postular</a>
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