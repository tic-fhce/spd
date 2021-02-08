@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                <h4>Seleccionar Carrera</h4>
                <ul>
                    @foreach($carrera as $value)
                    <?php $postu = array('id_carrera'=>$value->id,'ci'=>0);?>
                        @if($value->id!=1)
                        <li><a href="{{route('listaPostulante',$postu)}}">{{$value->carrera}}</a></li>
                        @endif
                    @endforeach
                </ul>
                
            </div> 
        </div>
    </div>
</section>
@endsection

