<header>
    <h4>Datos Personales</h4>
</header>
<div class="row gtr-uniform">
    <div class="col-12 col-12-xsmall">
        <?php $image="storage/".$persona->filefoto;?>
        <img src="{{asset($image)}}" width="180 px" height="180 px">    
    </div>
    <div class="col-12 col-12-xsmall">
        <label>C.I. : {{$persona->ci}}</label>  
        Nombre (s): {{$persona->nombre}}<br>
        Apellido (s) : {{$persona->apellido}}<br>
        Correo : {{$persona->correo}}<br>
        Celular : {{$persona->celular}}<br>
    </div>

    <?php  $datos = array('ci' => $persona->ci,'fecha'=>$persona->fechanac);?>
    <div class="col-12 col-12-xsmall">
        <a href="{{route('formulariocarrera',$datos)}}" class="button primary fit">Convocatorias Vigentes</a><br><br>
        <a href="{{route('postulacion',$datos)}}" class="button primary fit">Mis Postulaciones</a>
    </div>
</div>