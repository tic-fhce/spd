@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                <h4>Seleccionar Carrera para registrar Requisitos de Convocatoria</h4>
                <ul>
                    @foreach($carrera as $value)
                        @if($value->id!=1)
                        <li><a href="{{route('formulariorequisitos',$value->id)}}">{{$value->carrera}}</a></li>
                        @endif
                    @endforeach
                </ul>
                
            </div> 
        </div>
    </div>
</section>
@endsection
