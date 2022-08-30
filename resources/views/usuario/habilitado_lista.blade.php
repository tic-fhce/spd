@extends('front.frontlogin')

@section('label2')
<div id="heading">
    <h1>Postulantes de la Carrera de {{$carrera->carrera}}</h1>
</div>

<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                <div class="col-4 col-12-xsmall">
                    
                </div>
                <div class="col-8 col-12-xsmall">
                    <form action="{{route('BuscarPostulantesLista')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="id_carrera" value="{{$carrera->id}}">
                                <input type="text" name="ci" placeholder="Buscar Cédula de Identidad" required="true">
                            </div>
                            <div class="col-3">
                                <input type="submit" value="Buscar">
                            </div>
                            <?php $uri = array('id_carrera'=>$carrera->id,'ci'=>0);?>
                            <div class="col-3"><a href="{{route('lista_habilitado',$uri)}}" class="button primary">Mostrar Todo</a></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">
                        
                        @foreach($lista as $l)
                        <div class="row">
                            <div class="col-6 col-12-xsmall">
                                <label>Convocatoria # <a href="{{route('item',$l->id_convocatoria)}}">{{$l->numeroconvocatoria}}</a></label>
                                <strong>Para : {{$l->nombre}}</strong><br><br>
                            </div>
                            <div class="col-3 col-12-xsmall"></div>
                            <div class="col-3 col-12-xsmall"><h3><label>Materia : {{$l->materia}} {{$l->sigla}}</label></h3></div>
                        </div>
                        
                        <table class="alt">
                            <thead>
                                <tr>                                        
                                    <th>ID</th>
                                    <th>C.I.</th>
                                    <th>Verificado</th>
                                    <th>Materia / Area / Cargo</th>
                                    <th>Cumple Requisitos</th>
                                    <th>Apelacion</th>                                        
                                    <th>Nota Final</th>
                                    <th>Habilitado</th>                                    
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
                                    <td>{{$value->id}}</td>
                                    <td><a href="#"> {{$value->ci}}</a></td>
                                    <td>
                                        @if($value->verificado=='NO')
                                            <a href="#">{{$value->verificado}}</a>
                                        @else
                                            {{$value->verificado}}
                                        @endif
                                    </td>
                                    <td><font size="1.5px">{{$value->materia}}<br> <a href="#"> {{$value->sigla}}</a></font></td>
                                    <td>{{$value->cumple}}</td>
                                    <td>{{$value->habilitado}}</td>
                                    <td>{{$value->puntos}}</td>
                                    <td>{{$value->fisico}}</td>
                                    <td>{{$value->updated_at}}</td>
                                    <td><a href="{{route('formularioapleacionidentificar',$value->id)}}" class="button primary fit small">Hacer una Apelacion</a></td>
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
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection
