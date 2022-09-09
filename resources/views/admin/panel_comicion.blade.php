@extends('front.front_comicion')

@section('label2')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            @foreach($convocatorias as $value)
                <div class="col-md-4">
                <section class="card">
                    <div class="twt-feed bg-flat-color-1">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <div class="fa fa-user-plus wtt-mark"></div>

                            <div class="media">
                                <div class="media-body">                                    
                                    <h2 class="text-white display-6">{{$value->carrera}}</h2>
                                    {{$value->numeroconvocatoria}}
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <p>{{$value->nombre}}</p>
                        <p><a href="#">{{$value->numeroconvocatoria}}</a></p>
                        <p>{{$value->detalle}}</p>
                        
                    </div>
                    <div>
                        <a href="{{route('listaItems',$value->id_convocatoria)}}" class="btn btn-sm btn-success btn-block">Ver Postulantes</a>
                    </div>

                </section>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


