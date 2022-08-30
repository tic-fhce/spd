@extends('front.front_comicion')

@section('label2')


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <?php $image="storage/".$persona->filefoto;?>
                <section class="card">
                    <div class="twt-feed bg-flat-color-3">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <div class="fa fa-user-plus wtt-mark"></div>

                        <div class="media">
                            <a href="#">
                                <img class="align-self-center rounded-circle mr-3" style="width:125px; height:125px;" alt="" src="{{asset($image)}}">
                            </a>
                            <div class="media-body">                                    
                                <h2 class="text-white display-6">{{$persona->grado}}</h2>
                                <p class="text-light">C.I. : {{$persona->ci}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        Verificacion de Requisitos :<br>
                        {{$postulante->numeroconvocatoria}}
                    </div>
                    
                    <div class="card-footer">
                        @if(session('mensaje_error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('mensaje_error')}}
                            </div>
                        @endif
                        Nombre (s): {{$persona->nombre}}<br>
                        Apellido (s) : {{$persona->apellido}}<br>
                        Correo : {{$persona->correo}}<br>
                        Celular : {{$persona->celular}}<br>
                        <?php $uri = array('id_convocatoria' => $postulante->id_convocatoria,'id_item'=>$postulante->id_item); ?>
                    </div>
                    
                </section>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Datos de la Postulación</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Convocatoria a : {{$postulante->concepto}}</li>
                                    <li class="list-group-item">Materia : {{$postulante->materia}}</li>
                                    <li class="list-group-item">Sigla : {{$postulante->sigla}}</li>
                                    <li class="list-group-item">NDI : {{$postulante->codex_postulante}}</li>
                                    <li class="list-group-item">Verificado por Vicedecanato : <span class="badge badge-success">{{$postulante->verificado}}</span></li>
                                    <li class="list-group-item">Creado : {{$postulante->fecha}}</li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <a href="{{asset('storage/'.$postulante->file)}}" class="btn btn-success btn-sm btn-block" >Descargar File</a>
                                <a href="{{asset('storage/'.$postulante->codex_comp)}}" target="_blanck" class="btn btn-success btn-sm btn-block">Descargar Carta</a>
                                
                                <a href="{{route('listaPostulantes',$uri)}}" class="btn btn-secondary btn-sm btn-block">Salir</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="alert alert-success" role="alert">
                            Seleccione los requisitos que cumple en postulante.
                        </div>
                    </div> 
                    <div class="card-body">
                        <form method="post" action="{{route('requisitosComicion')}}">
                        @csrf
                            <input type="hidden" name="id_postulante" value="{{$postulante->id_postulante}}">
                            <input type="hidden" name="id_convocatoria" value="{{$postulante->id_convocatoria}}">
                                     
                            @foreach($requisito as $value)
                                <div class="form-check">
                                    <div class="checkbox">
                                    <?php $i='dato'.$value->id;?>
                                    @if(isset($value->valor))
                                        @if($value->valor=='1')
                                            <label for="{{$value->id}}" class="form-check-label">
                                            <input type="checkbox" id="{{$value->id}}" name="{{$i}}" value="{{$value->id}}" checked="true" class="form-check-input"><strong>{{$value->inciso}})</strong> {{$value->detalle}} </label>
                                                    
                                        @else
                                            <label for="{{$value->id}}" class="form-check-label">
                                            <input type="checkbox" id="{{$value->id}}" name="{{$i}}" value="{{$value->id}}" class="form-check-input"><strong>{{$value->inciso}})</strong> {{$value->detalle}}</label>
                                        @endif
                                    @else
                                        <label for="{{$value->id}}" class="form-check-label">
                                        <input type="checkbox" id="{{$value->id}}" name="{{$i}}" value="{{$value->id}}" class="form-check-input"><strong>{{$value->inciso}})</strong> {{$value->detalle}}</label>
                                    @endif
                                    <br><br>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        @if($itemcom->permiso=='5')
                                        <input class="btn btn-lg btn-info btn-block" type="submit" value="Registrar Datos">
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="{{route('listaPostulantes',$uri)}}" class="btn btn-lg btn-secondary btn-block">Salir</a>
                                    </div>
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
