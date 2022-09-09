@extends('front.front_admin')

@section('label2')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><strong class="card-title">{{$convocatoria->numeroconvocatoria}}</strong></div>
                            <div class="col-md-6">
                                @if($convocatoria->estado=='1')
                                    <span class="btn btn-outline-info btn-sm">En Postulaciones</span>
                                @endif
                                @if($convocatoria->estado=='2')
                                    <span class="btn btn-outline-warning btn-sm">Proceso de Evaluacion</span>
                                @endif
                                @if($convocatoria->estado=='3')
                                    <span class="btn btn-outline-success btn-sm">Ciclo Terminado</span>
                                @endif
                            </div>
                        </div>

                        
                    </div>
                    <div class="card-body">
                     <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                @if(session('mensaje_error'))
                                <div class="alert alert-success" role="alert">
                                    {{session('mensaje_error')}}
                                </div>
                                @endif

                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        Gestion :
                                    </div>
                                    <div class="col-lg-6">
                                        {{$convocatoria->gestion}}
                                    </div>
                                </div>
                                <div class=" row form-group">
                                    <div class="col-lg-6">
                                        Desde el {{$convocatoria->fecha_ini}}
                                    </div>
                                    <div class="col-lg-6">
                                        Hasta el {{$convocatoria->fecha_fin}}
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        Numero de Convocatoria :
                                    </div>
                                    <div class="col-lg-6">
                                        {{$convocatoria->numeroconvocatoria}}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        Concepto :
                                    </div>
                                    <div class="col-lg-6">
                                        {{$name}}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        Detalle :
                                    </div>
                                    <div class="col-md-6">
                                        {{$convocatoria->detalle}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-md-6">Estado :</div>
                                    <div class="col-md-6">
                                        @if($convocatoria->estado=='1')
                                            <span class="btn btn-outline-info btn-sm btn-block">En Postulaciones</span>
                                        @endif
                                        @if($convocatoria->estado=='2')
                                            <span class="btn btn-outline-warning btn-sm btn-block">Proceso de Evaluacion</span>
                                        @endif
                                        @if($convocatoria->estado=='3')
                                            <span class="btn btn-outline-success btn-sm btn-block">Ciclo Terminado</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">Ver Items : </div>
                                    <div class="col-md-6">
                                       <a href="{{route('formularioitem',$convocatoria->id)}}" class="btn btn-outline-info btn-sm btn-block">Ver Items</a>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">Descargar PDF : </div>
                                    <div class="col-md-6">
                                       <a href="{{asset('storage/'.$convocatoria->pdf)}}" class="btn btn-outline-info btn-sm btn-block" target="_blanck">Descargar PDF</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class= "card-header">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"><a href="{{route('listaconvocatoria',$datos->id_carrera)}}" class="btn btn-secondary btn-block"><i class="fa fa-level-up"></i> Salir</a></div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="custom-tab">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Editar</a>
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Cambiar Pdf</a>
                                    
                                </div>
                            </nav>
                        
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                    <form action="{{route('UpdateConvocatoria')}}" method="POST" enctype="multipart/form-data">
                                    @csrf          
                                        <input type="hidden" name="id" value="{{$convocatoria->id}}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    Gestion :
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="gestion" value="{{$convocatoria->gestion}}" maxlength="100" required="true" />
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    Desde el <input type="date" class="form-control" name="inicio" value="{{$convocatoria->fecha_ini}}" maxlength="100" required="true" />    
                                                </div>
                                                <div class="col-lg-6">
                                                    Hasta el <input type="date" class="form-control" name="fin" id="name" value="{{$convocatoria->fecha_fin}}" maxlength="100" required="true" />            
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    Numero de Convocatoria :
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="numero" value="{{$convocatoria->numeroconvocatoria}}" required="true" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    Concepto :
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="concepto" class="form-control" required="true">
                                                        <option value="">{{$name}}</option>
                                                        @foreach($concepto as $value)
                                                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="detalle" class="form-control" required="true">{{$convocatoria->detalle}}</textarea><br>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    Estado :
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="estado" class="form-control" required="true">
                                                        <option value="">Selecciona Estado</option>
                                                        <option value="1">En Postulaciones</option>
                                                        <option value="2">Proceso de Evaluacion</option>
                                                        <option value="3">Ciclo Terminado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <hr>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input class="btn  btn-info btn-block" type="submit" value="Actualizar Datos">        
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="{{route('listaconvocatoria',0)}}" class="btn btn-secondary btn-block">Cancelar</a>                      
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <form action="{{route('UpdatePdf')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="id" value="{{$convocatoria->id}}">
                                        <div class="row form-group">
                                            <div class="col-lg-12">
                                                <input type="file" class="form-control" name="pdf" value="" required="true" />
                                            </div>                                            
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-lg-12">
                                                <input type="submit" class="btn btn-info btn-block" value="Actualizar PDF">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection
