@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{$titulo}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('AddConvocatoria')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4"> Gestion : </div>
                            <div class="col-md-8">
                                <input type="text" name="gestion" value="" placeholder="Gestion" maxlength="100" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4"> Carrera :</div>
                            <div class="col-md-8">
                                <select name="carrera" required="true" class="form-control">
                                    <option>Carrera</option>
                                    @foreach($carrera as $value)
                                        <option value="{{$value->id}}">{{$value->carrera}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4"> Desde el :</div>
                            <div class="col-md-8">
                                 <input type="date" name="inicio" value="" maxlength="100" required="true" class="form-control"/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4">
                                Hasta el :
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="fin" id="name" value="" maxlength="100" required="true" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-4">
                                Numero de Convocatoria :
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="numero" value="" placeholder="Numero de Convocatoria" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                Concepto :
                            </div>
                            <div class="col-md-8">
                                <select name="concepto" required="true" class="form-control"> 
                                    <option>Concepto de Convocatoria</option>
                                    @foreach($concepto as $value)
                                        <option value="{{$value->id}}">{{$value->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4">
                                Detalle :
                            </div>
                            <div class="col-md-8">
                                <textarea name="detalle" required="true" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                Convocatoria en Formato Pdf: <input type="file" name="pdf" required="true" accept=".pdf" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input class="btn btn-success btn-sm btn-block" type="submit" value="Registrar Datos">
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
                            </div>
                        </div>

                        </form>    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
