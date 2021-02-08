@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Adicionar Items de Convocatoria</strong> 
                    </div>
                    <div class="card-body">
                     <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('AddItem')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$convocatoria->id_convocatoria}}"/><br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Materia :
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="materia" value="" placeholder="Materia" required="true"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Sigla :
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="sigla" value="" maxlength="100" placeholder="Sigla" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Carga Horaria :
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="carga" value="" maxlength="200" placeholder="Carga Horaria" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Plazas Disponibles :
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="plazas" value="" maxlength="200" placeholder="Plazas Disponibles"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            Periodo :
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="periodo" value="" maxlength="200" placeholder="Periodo"/>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="btn btn-info btn-block" type="submit" value="Registrar Datos">
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('formularioitem',$convocatoria->id_convocatoria)}}" class="btn btn-secondary btn-block"> Salir</a>
                                        </div>
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
                            <div class= "col-md-6">
                                <a href="{{route('formularioitem',$convocatoria->id_convocatoria)}}" class="btn btn-sm btn-secondary btn-block"><i class="fa fa-level-up"></i> Salir</a>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
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
                                    <?php $iteme = array('id_convocatoria' => $convocatoria->id_convocatoria,'id_item'=>$value->id); ?>
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td><a href="{{route('formularioitemUpdate',$iteme)}}">{{$value->materia}}</a></td>
                                    <td><a href="{{route('formularioitemUpdate',$iteme)}}">{{$value->sigla}}</a></td>
                                    <td>{{$value->carga}}</td>
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
