@extends('front.frontlogin')

@section('label2')
<div id="heading" >
    <h1>Materias Vigentes en la Convocatoria </h1>
</div>

<section id="main" class="wrapper">
    <div class="inner">
        <div class="content">
            <header>
                <h2>Carrera de {{$convocatoria->carrera}}</h2>
            </header>
            <div class="row">
                
                <div class="col-3 col-12-xsmall">
                    Convocatoria <a href="#"># {{$convocatoria->numeroconvocatoria}}</a><br>
                    Convocatoria a <a href="#">"{{$convocatoria->nombre}}"</a><br>
                    Carrera: <a href="{{$convocatoria->obs}}">{{$convocatoria->carrera}}</a><br>
                    Gestion: <a href="#">{{$convocatoria->gestion}}</a><br>
                    Detalle:<br> {{$convocatoria->detalle}}<br><br>
                    <hr>
                    <a href="../storage/{{$convocatoria->pdf}}" target="_blanck" class="button primary fit">Descargar PDF</a><br><br>
                    <a href="{{asset($cartadox)}}" target="_blanck" class="button  fit">Descargar Carta Modelo</a>
                </div>

                <div class="col-1 col-12-xsmall">
                    <br><br>
                </div>

                <div class="col-8 col-12-xsmall">
                    <div class="table-wrapper">
                    <h4>Items</h4>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Materia</th>
                                    <th>Sigla</th>
                                    <th>Carga</th>
                                    <th>Plazas</th>
                                    <th>Periodo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->materia}}</td>
                                    <td>{{$value->sigla}}</a></td>
                                    <td>{{$value->carga}} Hrs/mes</td>
                                    <td>{{$value->plazas}}</td>
                                    <td>{{$value->periodo}}</td>
                                </tr>
                                @endforeach        
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>

@endsection