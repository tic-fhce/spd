@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_kardex')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                <div class="col-4 col-12-xsmall">
                    <h2>Convocatorias</h2>
                </div>
                <div class="col-8 col-12-xsmall">
                    <form action="{{route('BuscarConvocatoriaKardex')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <select name="concepto" required="true">
                                    <option value="">Buscar Por :</option>
                                    @foreach($concepto as $value)
                                        <option value="{{$value->id}}">{{$value->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="submit" value="Buscar">
                            </div>
                            <?php $kardex = array('id_carrera' => $datos->id_carrera,'id_concepto'=>'0' ); ?>
                            <div class="col-3"><a href="{{route('listaconvocatoriakardex',$kardex)}}" class="button primary">Mostrar Todo</a></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">
                    
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Gestion</th>
                                    <th>Fecha Limite</th>
                                    <th>Convocatoria #</th>
                                    <th>Concepto</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($convocatoria as $value)
                                <tr>
                                    <td>
                                        <?php $postu = array('id_carrera'=>$datos->id_carrera,'id_convocatoria'=>$value->id_convocatoria,'ci'=>0,'cumple'=>0);?>
                                        <a href="{{route('listaPostulanteKardex',$postu)}}" class="button primary">Ver Postulantes</a>
                                    </td>
                                    <td>{{$value->gestion}}</td>
                                    <td>{{$value->fecha_fin}}</td>
                                    <td><a href="{{route('formularioitem',$value->id_convocatoria)}}" >{{$value->numeroconvocatoria}}</a></td>
                                    <td>{{$value->nombre}}</td>
                                    <td>{{$value->carrera}}</td>
                                </tr>
                                @endforeach        
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection
