<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPD-Evaluación</title>

</head>
<body>
<table border="0" width="100%">
  <tr>
    <td width="100px"> <img src="{{asset('images/logof.png')}}" width="90px" height="50px"></td>
    <td><font size="11px">
      <strong>Sistema de Postulación de Docentes y Auxiliares</strong><br>
      Facultad de Humanidades y Ciencias de la Educación<br>
      La Paz - Bolivia<br></font>
    </td>
    <td><font size="11px">
      Web: fhce.umsa.bo , svfhce.umsa.bo/sv/spd<br>
      E-mail: vicedecanato.fhce@umsa.bo, tic.fhce@umsa.bo<br>
      Tel: <br>
        </font>
    </td>
    <td align="right">
        <img src="{{asset('qr/'.$nameqr)}}" width="100px" height="100px">
    </td>
  </tr>

  <tr>
    <td colspan="2">
     
    </td>
    <td colspan="2">
      Fecha : <?php echo(date('Y/m/d H:i:s'));?><br>
    </td>
  </tr>
</table>
<table>
  <tr>
    <td width="20%"><h3>Elavorado por :</h3></td>
    <td><h3>Materia Evaluada :</h3></td>
    <td><h3>Convocatoria :</h3></td>
  </tr>
  <tr>
    <td>
      
      C.I. : {{$persona->ci}}<br>
      Nombre : {{$persona->nombre}} {{$persona->apellido}}<br>
      Correo : {{$persona->correo}}<br>
      Fecha : <?php echo(date('Y/m/d H:i:s'));?><br>
    </td>
    <td>
        <ul>
            <li>ID : {{$item->id}}</li>
            <li>Materia : {{$item->materia}}</li>
            <li>Sigla : {{$item->sigla}}</li>
            <li><strong>Para : {{$concepto->nombre}}</strong></li>
            <li>Carga : {{$item->carga}} horas/mes</li>
            <li>Gestion : {{$item->periodo}}</li>
        </ul>
    </td>
    <td>
        <strong>Carrera : {{$carrera->carrera}}</strong><br>
        Convocatoria # : {{$convocatoria->numeroconvocatoria}}<br>
        Fecha de Inicio : {{$convocatoria->fecha_ini}}<br>
        Fecha de Fin : {{$convocatoria->fecha_fin}}<br>
        Detalle : {{$convocatoria->detalle}}
    </td>
  </tr>
</table>
<br>
<table border="1" width="100%" cellspacing=0 cellpadding=2 bordercolor="666633">
    <?php $i=0;?>
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>C.I.</th>
        <th>Postulante</th>
        <th>Verificado</th>
        <th>Requisitos</th>
        <th>Nota Final</th>                                    
        <th>Apelacion</th>
        <th>Seleccionado(a)</th>
    </tr>
    <tbody>
    @foreach($postulante as $value)
    <?php $i=$i+1;?>
    <tr>
        <td>{{$i}}</td>
        <td>{{$value->id}}</td>
        <td>{{$value->ci}}</td>
        <td>{{$value->postulante}} {{$value->apellido}}<br><font size="9px">{{$value->grado}}</font><br><font size="9px">Fecha de Registro {{$value->created_at}}</font></td>
        <td>{{$value->verificado}}</td>
        <td>{{$value->cumple}}</td>
        <td>{{$value->puntos}}</td>
        <td>
            @if($value->habilitado=='SI')
                Apelacion
            @else                                        
                {{$value->habilitado}}
            @endif
        </td>
        <td>{{$value->fisico}}</td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"><h3>Total Postulantes </h3></td>
            <td><h1>{{$i}}</h1></td>
        </tr>
    </tfoot>
  </table>
  <hr>
  <br>
  <h3>Comision Evaluadora</h3>
  <table border="1" width="100%" cellspacing=0 cellpadding=2 bordercolor="666633">
      <tr>
            <td>ID</td>
            <td>C.I.</td>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Detalle</td>
      </tr>
      @foreach($firma as $value)
      <tr>
            <td>{{$value->id_comicion}}</td>
            <td>{{$value->ci}}</td>
            <td>{{$value->nombre}} {{$value->apellido}}</td>
            <td>{{$value->correo}}</td>
            <td>
                @if($value->permiso=='5')
                    Presidente Comicion
                @else
                    Revisor
                @endif
            </td>
      </tr>
      @endforeach
  </table>
  <br>
  <table border="0" width="100%">
    <tr>
        <td>
          <h3>Universidad Mayor de San Andrés</h3><br>
            Facultad de Humanidades y Ciencias de la Educación<br>
            <hr>
            Casa Marcelo Quiroga Santa Cruz  Avenida 6 de agosto  N° 2118 <br>
            La Paz – Bolivia<br>
            Vicedecanato<br> 
            Teléfono: 2441988<br> 
            Correo: vicedecanato.fhce@umsa.bo<br> 
        </td>
        <td>
            <img src="{{asset('images/logou.jpg')}}" width="25px" height="50px">
            <img src="{{asset('images/logof.jpg')}}" width="45px" height="25px">
            <img src="{{asset('images/logot.jpg')}}" width="45px" height="35px"><br>
            Unidad de Tecnologías de Información 2020 Jmmk<br>
          
        </td>
    </tr>
  </table>
  </body>
</html>