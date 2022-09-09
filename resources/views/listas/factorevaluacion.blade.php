@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">
            
            <div class="row">
                <h3>FACTORES DE EVALUACIÓN DE MÉRITOS</h3>
                
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">
                    <h4>Items</h4>
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
                                @foreach($factor as $value)
                                <?php $i=$i+$value->maximo;?>
                                <tr>
                                    
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->item}}</td>
                                    <td><a href="{{route('listaItemFactor',$value->id)}}">{{$value->detalle}}</a></td>
                                    <td>{{$value->maximo}}</td>
                                    <td><a href="{{route('listaItemFactor',$value->id)}}">Items de Evaluación</a></td>
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
