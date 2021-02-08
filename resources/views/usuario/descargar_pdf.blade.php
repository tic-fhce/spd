@extends('front.frontlogin')

@section('label2')

<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                
                <div class="col-4 col-12-xsmall">
                    @include('usuario.datos')
                </div>

                <div class="col-8 col-12-xsmall">
                    <div class="table-wrapper">
                            <h4>Postulaciones Resientes</h4>
                            <table class="alt">
                                <thead>
                                    <tr>                                        
                                        <th>ID</th>
                                        <th>Convocatoria</th>
                                        <th>Materia</th>
                                        <th>Sigla</th>
                                        <th>Carrera</th>
                                        <th>Fecha</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($postulante as $value)
                                    <?php #$datos = array('ci' =>$persona->ci,'fecha'=>$persona->fechanac,'id_convocatoria'=>$value->id,'id_carrera'=>$value->id_carrera );?>
                                    <tr>                                        
                                        
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->convocatoria}}</td>
                                        <td>{{$value->materia}}</a></td>
                                        <td>{{$value->sigla}}</a></td>
                                        <td>{{$value->carrera}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td><a href="{{route('postulantePdf',$value->id)}}" class="button primary small">Descargar PDF</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>      
                            </table>
                            <a href="{{route('formulariocarrera',$datos)}}" class="button primary fit">Convocatorias Vigentes</a><br><br>
                        </div>
                </div>
                
            </div> 
        </div>
    </div>
</section>

@endsection