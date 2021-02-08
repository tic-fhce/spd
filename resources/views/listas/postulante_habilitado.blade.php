@extends('front.frontadmin')

@section('label1')
    @include('admin.menu_comicion')
    <hr>
    <div class="inner">
    <section>
        <div class="content">
            Postulantes de la Convocatoria<br>
            <strong><a href="#"># {{$convocatoria->numeroconvocatoria}}</a></strong><br>
            {{$convocatoria->detalle}}<br>
            <ul>
                <li><a href="{{asset('storage/'.$convocatoria->pdf)}}" target="_blanck">Descargar Convocatoria</a></li>
                <li><a href="{{asset('storage/'.$convocatoria->pdf)}}" target="_blanck">Descargar Lista de Postulantes</a></li>
            </ul>
            <hr>
        </div>
    </section>
    </div>
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                <div class="col-6 col-12-xsmall">
                    <h2>Seleccionar Postulantes Ganadores</h2>
                </div>
                <div class="col-6 col-12-xsmall">
                    <p>Seleccione a los postulantes ganadores de la convocatoria, para que estos lleven su documentación física a las unidades académicas correspondientes</p>
                </div>
            </div>
            <div class="row"><div class="col-12 col-12-xsmall"><hr></div></div>
            <div class="row">
                
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">
                        
                        @foreach($lista as $l)
                        <div class="row">
                            <div class="col-6 col-12-xsmall">
                                <label>Convocatoria # <a href="{{route('item',$l->id_convocatoria)}}">{{$l->numeroconvocatoria}}</a></label>
                                <strong>Para : {{$l->nombre}}</strong><br><br>
                            </div>
                            <div class="col-6 col-12-xsmall"><strong>Materia :</strong><a href="#"> {{$l->materia}} {{$l->sigla}}</a></div>
                        </div>
                        
                        <table class="alt">
                            <thead>
                                <tr>                                        
                                    <th>ID</th>
                                    <th>C.I.</th>
                                    <th>Postulante</th>
                                    <th>Verificado</th>
                                    <th>Cumple Requisitos</th>
                                    <th>Apelacion</th>                                        
                                    <th>Nota Final</th>
                                    <th>Ganador</th>                                    
                                    <th>Fecha de Modificacion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($postulante as $value)
                                @if($l->id_item == $value->id_item)
                                <?php $i=$i+1;?>
                                <tr>                                        
                                    <td>{{$value->id_postulante}}</td>
                                    <td><a href="#"> {{$value->ci}}</a></td>
                                    <td><font size="1.5px">{{$value->nombre}} {{$value->apellido}}</font></td>
                                    <td>
                                        @if($value->verificado=='NO')
                                            <a href="#">{{$value->verificado}}</a>
                                        @else
                                            {{$value->verificado}}
                                        @endif
                                    </td>                                    
                                    <td>{{$value->cumple}}</td>
                                    <td>
                                        {{$value->habilitado}}                                        
                                    </td>
                                    <td>{{$value->puntos}}</td>
                                    <td>
                                        @if($value->fisico=='NO')
                                            {{$value->fisico}}
                                        @else
                                            <a href="#">{{$value->fisico}}</a>
                                        @endif                                        
                                    </td>
                                    <td>{{$value->updated_at}}</td>
                                    <td>
                                        @if($l->permiso=='5')
                                            @if($value->puntos>20)
                                                @if($value->fisico=='SI')
                                                    <a href="{{route('UpdatePerdedor',$value->id_postulante)}}" class="button fit small">Quitar Como Ganador</a>
                                                @else
                                                <a href="{{route('UpdateGanador',$value->id_postulante)}}" class="button primary fit small">Seleccionar Como Ganador</a>
                                                @endif
                                            @endif
                                        @endif

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"><h3>Total Postulantes</h3></td>
                                    <td><h1>{{$i}}</h1></td>
                                </tr>
                            </tfoot>      
                        </table>
                        <hr>
                        @endforeach
                    </div>
                    <a href="#" class="button primary fit small">Imprimir Lista Final</a>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection
