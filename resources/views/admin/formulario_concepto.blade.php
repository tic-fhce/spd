@extends('front.front_admin')


@section('label2')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Adicionar Concepto de Convocatorias
                    </div>
                    <div class="card-body">
                        <form action="{{route('AddConcepto')}}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <input type="text" name="nombre" value="" placeholder="Nombre" maxlength="100" required="true" class="form-control" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <textarea name="detalle" required="true" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input class="btn btn-info btn-sm btn-block" type="submit" value="Registrar Datos">
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}" class="btn btn-secondary btn-sm btn-block" >Salir</a>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">Lista Concepto de Convocatorias</div>
                            <div class="col-md-6">
                                <a href="{{route('a691jmmk69866ef77e7b8719892ac8d64efde')}}" class="btn btn-secondary btn-sm btn-block" ><i class="fa fa-level-up"></i> Salir</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Detalle</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($concepto as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td><a href="#" >{{$value->nombre}}</a></td>
                                    <td>{{$value->detalle}}</td>
                                    <td>{{$value->estado}}</td>
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
