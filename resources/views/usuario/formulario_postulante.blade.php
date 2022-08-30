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
                        <div class="table-wrapper">
                            <h4>Lista de las Convocatorias Vigentes de la Carrera </h4>
                            Recuerda solo puedes postular a 2 materias por convocatoria
                            <br><br>
                            <table class="alt">
                                <thead>
                                    <tr>                                        
                                        <th>#</th>
                                        <th>Carrera</th>
                                        <th>Fecha Límite</th>                                        
                                        <th>Convocatoria #</th>
                                        <th>Concepto</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($convocatoria as $value)
                                    <?php $datos = array('ci' =>$persona->ci,'fecha'=>$persona->fechanac,'id_convocatoria'=>$value->id,'id_carrera'=>$value->id_carrera );?>
                                    <tr>                                        
                                        <td>
                                            @if($i<"10")
                                            <a href="{{route('formularioitemusuario',$datos)}}" class="button primary small">Postular</a>
                                            @else
                                            <a href="#" class="button primary small">Postular</a>
                                            @endif
                                        </td>
                                        <td>{{$value->carrera}}</td>
                                        <td>{{$value->fecha_fin}}</td>
                                        <td>
                                            @if($i<"10")
                                                <a href="{{route('formularioitemusuario',$datos)}}" >{{$value->numeroconvocatoria}}</a>
                                            @else
                                                <a href="#">{{$value->numeroconvocatoria}}</a>
                                            @endif
                                        </td>

                                        <td>{{$value->nombre}}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                </div>
            </div> 
        </div>
    </div>
</section>

@endsection
