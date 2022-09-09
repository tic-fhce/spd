@extends('front.frontadmin')

@section('label1')
<section id="main">
    <div class="inner">
       <div class="row">
            <div class="col-12 col-12-xsmall">
                    <h4>Convocatoria :</h4>
                    <a href="#"> {{$convocatoria->numeroconvocatoria}}</a>
                    <hr>
                    Concepto : {{$convocatoria->nombre}}<br>
                    Gestion : {{$convocatoria->gestion}}<br>
                    Carrera : {{$convocatoria->carrera}}<br>
                    Fecha Inicio : {{$convocatoria->fecha_ini}}<br>
                    Fecha Fin : {{$convocatoria->fecha_fin}}<br>
                    <hr>
                    <a href="{{route('formularioitem',$convocatoria->id_convocatoria)}}" class="button primary fit small">Salir</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                
                <div class="col-6 col-12-xsmall">
                    <h3>Editar Requisitos de Convocatoria</h3>
                    <form action="{{route('UpdateRequisito')}}" method="POST">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="hidden" name="id" value="{{$convocatoria->id_convocatoria}}"/><br>
                            <input type="hidden" name="id_requisito" value="{{$requisitoUpdate->id}}"/><br>
                            <input type="text" name="inciso" value="{{$requisitoUpdate->inciso}}" required="true" /><br>
                            <textarea required="true" name="detalle">{{$requisitoUpdate->detalle}}</textarea>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Actualizar Datos"><br><br>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="col-6 col-12-xsmall">
                    <div class="table-wrapper">
                    <h4>Requisitos</h4>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Inciso</th>
                                    <th>Detalle</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requisito as $value)
                                        
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->inciso}}</td>
                                    <td>{{$value->detalle}}</td>                                            
                                    <td>{{$value->created_at}}</td>
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
