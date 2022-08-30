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
                    <h4>Editar Items de Convocatoria</h4>                    
                    <form action="{{route('UpdateItem')}}" method="POST">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="hidden" name="id" value="{{$convocatoria->id_convocatoria}}"/><br>
                            <input type="hidden" name="id_item" value="{{$itemUpdate->id}}"/><br>
                            <input type="text" name="materia" value="{{$itemUpdate->materia}}" required="true" /><br>
                            <input type="text" name="sigla" value="{{$itemUpdate->sigla}}" maxlength="100" /><br>
                            <input type="text" name="carga" maxlength="200" value="{{$itemUpdate->carga}}" required="true" /><br>
                            <input type="text" name="plazas" maxlength="200" value="{{$itemUpdate->plazas}}"/><br>
                            <input type="text" name="periodo" maxlength="200" value="{{$itemUpdate->periodo}}"/><br>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Actualizar Datos"><br><br>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="col-6 col-12-xsmall">
                    <div class="table-wrapper">
                    <h4>Items</h4>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Sigla</th>
                                    <th>Carga</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->materia}}</td>
                                    <td><a href="#">{{$value->sigla}}</a></td>
                                    <td>{{$value->carga}}</td>
                                    <td>{{$value->created_at}}</td>
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
