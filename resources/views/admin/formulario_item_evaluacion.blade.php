@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">
            
            <div class="row">
                <div class="col-4 col-12-xsmall">
                    <h4>Adicionar Items de Evaluación</h4>
                    <h4><strong># {{$factor->detalle}}</strong></h4>
                    Maxima Calificacion : {{$factor->maximo}}<br>
                    <hr>

                    <form action="{{route('AddItemFactor')}}" method="POST">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="hidden" name="id" value="{{$factor->id}}">                           
                            <input type="text" name="item" value="" placeholder="ITEM ej. 1.1" required="true" /><br>
                            <input type="text" name="detalle" value="" placeholder="Detalle" required="true" /><br>
                            <input type="text" name="maximo" value="" placeholder="Puntaje Maximo" required="true" /><br>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Registrar Item de Factor"><br><br>
                            <a href="{{route('formularioevaluacion')}}" class="button primary fit small">Salir</a>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="col-8 col-12-xsmall">
                    <div class="table-wrapper">
                    <h4><strong>Items de {{$factor->detalle}}</strong></h4>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ITEM</th>
                                    <th>Detalle</th>
                                    <th>Puntos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody><?php $i=0;?>
                                @foreach($itemfactor as $value)
                                <?php $i=$i+$value->maximo;?>
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->item}}</td>
                                    <td>{{$value->detalle}}</td>
                                    <td>{{$value->maximo}}</td>
                                    <td><a href="#">Items de Evaluación</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td colspan="2"><h3>{{$i}} puntos</h3></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>     
            </div> 
        </div>
    </div>
</section>
@endsection
