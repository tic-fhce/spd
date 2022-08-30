@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                <h4>FACTORES DE EVALUACIÓN DE MÉRITOS Seleccionar una Carrera</h4>
                <ul>
                    @foreach($carrera as $value)
                        <li><a href="{{route('formularioevaluacion',$value->id)}}">{{$value->carrera}}</a></li>
                    @endforeach
                </ul>
                
            </div> 
        </div>
    </div>
</section>
@endsection
