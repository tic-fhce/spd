@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Agregar Requisitos de Convocatoria</strong> 
                    </div>
                    <div class="card-body">
                     <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('AddRequisito')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$convocatoria->id_convocatoria}}"/>
                                <input type="hidden" name="id" value="{{$convocatoria->id_convocatoria}}"/>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Inciso :
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="inciso" value="" placeholder="Inciso" required="true" />                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Detalle :
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea required="true" class="form-control" name="detalle"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input class="btn btn-info btn-block" type="submit" value="Registrar Datos">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('formularioitem',$convocatoria->id_convocatoria)}}" class="btn btn-secondary btn-block">Salir</a>
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
                                <a href="{{route('formularioitem',$convocatoria->id_convocatoria)}}" class="btn btn-sm btn-secondary btn-block"> <i class="fa fa-level-up"></i> Salir</a>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
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
                                    <td><a href="#">{{$value->inciso}}</a></td>
                                    <td><a href="#">{{$value->detalle}}</a></td>                                            
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
</div>
@endsection
