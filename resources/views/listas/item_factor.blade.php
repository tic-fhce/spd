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
                    <h4><strong># {{$factor->detalle}}</strong></h4>
                    Maxima Calificacion : {{$factor->maximo}}<br>
                    <hr>

                    <a href="{{route('listaFactor')}}" class="button primary fit small">Salir</a>
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
