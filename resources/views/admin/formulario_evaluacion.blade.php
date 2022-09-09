@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <strong>Convocatoria <a href="#">{{$convocatoria->numeroconvocatoria}}</a></strong><br>
                                <strong>Para :  {{$convocatoria->nombre}}</strong><br>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                     <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                
                                @if(session('mensaje_error'))
                                    <div class="alert alert-danger" role="alert">
                                        <a href="#">{{session('mensaje_error')}}</a>
                                    </div>
                                @endif
                                <form action="{{route('AddFactor')}}" method="POST">
                                
                                @csrf
                                <input type="hidden" name="id_carrera" value="{{$convocatoria->id_carrera}}">
                                <input type="hidden" name="id_convocatoria" value="{{$convocatoria->id_convocatoria}}">
                                <input type="hidden" name="id_concepto" value="{{$convocatoria->id_concepto}}">
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            Item :
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="item" value="" placeholder="ITEM ej. 1" required="true" />                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            Detalle :
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="detalle" value="" placeholder="Detalle" required="true" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            Puntage Maximo :
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="maximo" maxlength="5" value="" placeholder="Puntaje Maximo" required="true" />                                            
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input class="btn btn-info btn-block" type="submit" value="Registrar Factor">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('listaconvocatoria',$datos->id_carrera)}}" class="btn btn-secondary btn-block">Salir</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="card-title">Items</strong>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('listaconvocatoria',$datos->id_carrera)}}" class="btn btn-sm btn-secondary btn-block"><i class="fa fa-level-up"></i> Salir</a>        
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
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
                                    <td><a href="{{route('formularioTtemEvaluacion',$value->id)}}">{{$value->detalle}}</a></td>
                                    <td>{{$value->maximo}}</td>
                                    <td><a href="{{route('formularioTtemEvaluacion',$value->id)}}">Items de Evaluación</a></td>
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
</div>
@endsection
