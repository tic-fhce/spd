@extends('front.frontlogin')

@section('label2')

<div id="heading" >
    <h1>Convocatorias Vigentes de la Facultad de Humanidades y Ciencias de la Educación </h1>
</div>

<section id="main">
    <div class="inner">
        <div class="content">
            <header>
                <h2>Convocatorias Vigentes</h2>
            </header>
            <div class="row">
                <div class="col-6 col-12-xsmall">
                    Recuerda solo puedes postular a 2 materias<br><a href="{{asset($cartadox)}}" target="_black">Descargar Modelo de Carta Postulación</a> 
                    <br>
                    <a href="{{asset('pdf/tabladeevaluacion.pdf')}}" target="_black">Descargar TABLA EVALUACIÓN DOC. INT. CAU ADAPTADA A FAC. HUM.</a> 
                    <br><br>
                </div>
                <div class="col-6 col-12-xsmall">
                    <form action="{{route('BuscarConvocatoriaUsuario')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6 col-12-xsmall">
                                <select name="carrera" required="true">
                                    <option value="">Buscar Por Carrera</option>
                                    @foreach($carrera as $value)
                                        <option value="{{$value->id}}">{{$value->carrera}}</option>
                                    @endforeach
                                </select><br>
                            
                            </div>
                            
                            <div class="col-3 col-12-xsmall">
                                <input type="submit" value="Buscar" class="button fit small">
                                <br><br>
                            </div>                            
                            <div class="col-3 col-12-xsmall"><a href="{{route('convocatorias','0')}}" class="button primary fit small">Ver Todo</a><br>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">                        
                        <table class="alt">
                            <thead>
                                <tr>                                        
                                    <th>#</th>
                                    <th>Convocatoria</th>
                                    <th>Carrera</th>
                                    <th>Fecha Limite</th>                                        
                                    <th>Concepto</th>
                                    <th>Gestión</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($convocatoria as $value)
                                <?php $i=$i+1;?>
                                <tr>                                        
                                    <td>{{$i}}</td>
                                    <td>Ver <a href="{{route('item',$value->id)}}"> {{$value->numeroconvocatoria}}</a></td>
                                    <td>{{$value->carrera}}</td>
                                    <td><a href="#">{{$value->fecha_fin}}</a></td>
                                    <td>{{$value->nombre}}</td>
                                    <td>{{$value->gestion}}</td>
                                    <td><a href="{{asset('storage/'.$value->pdf)}}" target="_blanck" class="button primary fit">Descargar PDF</a></td>

                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-6">
                    
                </div>
            </div>  
        </div>
    </div>
</section>

@endsection
