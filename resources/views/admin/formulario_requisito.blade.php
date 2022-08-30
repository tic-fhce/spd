@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                
                <div class="col-6 col-12-xsmall">
                    <h4>Adicionar Requisitos de Convocatoria para la Carrera de {{$namecarrera}}</h4>
                    <form action="{{route('AddRequisito')}}" method="POST">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                        	<select name="convocatoria" required="true">
                                <option value="">Seleccionar Convocatoria</option>
                                @foreach($convocatoria as $value)
                                    <option value="{{$value->id}}">{{$value->numeroconvocatoria}}</option>
                                @endforeach
                            </select><br>
                            <input type="text" name="inciso" value="" placeholder="Inciso" maxlength="5" required="true" /><br>

                            <textarea name="detalle" required="true"></textarea>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Registrar Datos">
                        </div>
                    </div>
                    </form>
                </div>

                <div class="col-6 col-12-xsmall">
                    <div class="row gtr-uniform">
                    </div>
                </div>
                
            </div> 
        </div>
    </div>
</section>
@endsection