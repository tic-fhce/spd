<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>FHCE-PDF {{$postulante->ci}}</title>
        <style type="text/css">
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            background-color: white;
            font-size:9pt;
            line-height: 15pt;
        }
        h2 {
            
            text-align: right;
            float:left;
            padding:0;
            margin:0;
            clear:both;
            font-size:22pt;
            margin-bottom:-12px;
            color:#1b4491;
        }
        h3{
            
            text-align: right;
            float:left;
            padding:0;
            margin:0;
            clear:both;
            font-size:15pt;
            margin-bottom:-12px;
            color:#1b4491;
        }
        .cabecera{
            font-size:8px;
            padding: 0;
            line-height: 11pt;
        }
        </style>
    </head>
    <body>
        <!-- Begin Wrapper -->
        <table width="100%">
            <tr>
                <td>
                    <img src="{{asset('images/logou.jpg')}}" width="50px" height="100px">
                </td>
                <td class="cabecera">
                    <h3>Universidad Mayor de San Andrés</h3><br>
                    Facultad de Humanidades y Ciencias de la Educación<br>
                    Vicedecanato Gestion {{$postulante->gestion}}<br>
                    La Paz: Bolivia {{$postulante->created_at}}
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><h1>Comprobante de Registro S.P.D.</h1></td>
            </tr>
            <tr>
                <td colspan="2" align="center">Sistema de Postulación a Docencia - Facultad de Humanidades y Ciencias de la Educación.</td>
            </tr>
        </table>
        <hr>

        <table width="100%">
            <tr>
                <td width="70%">
                    <h2>{{$postulante->postulante}}</h2><br>
                    <label>{{$postulante->apellido}}</label><br>
                    <ul>
                        <li><a href="#">ID : {{$postulante->id}}</a></li>
                        <li>C.I.: {{$postulante->ci}}</li>
                        <li>Correo.: {{$postulante->correo}}</li>
                        <li>Tel-Cel.: {{$postulante->celular}}</li>
                        <li>Grado Académico : {{$postulante->grado}}</li>
                        <li>NDI.: {{$postulante->codex}}</li>
                    </ul>
                </td>
                <td width="30%">
                    <?php $image="storage/".$postulante->foto;?>
                    <img src="{{asset($image)}}" alt="{{$postulante->postulante}}" width="180px" height="180px" />    
                </td>
            </tr>
        </table>
        <hr>

        <table width="100%">
            <tr>
                <td width="30%">
                    <h3>Convocatoria</h3>
                </td>
                <td width="70%"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <h3>N°: {{$postulante->numero}}</h3>
                    <br>
                    <lu>
                        <li>Convocatoria {{$postulante->numero}} para <a href="#">{{$postulante->convocatoria}}</a>.</li>
                        <li>Carrera: {{$postulante->carrera}}.</li>
                        <li>Materia: {{$postulante->materia}} - {{$postulante->sigla}}.</li>
                        <li>Carga Horaria: {{$postulante->carga}} Hrs/mes</li>
                        <li>Detalle: {{$convocatoria->detalle}}.</li>
                        <li>Nombre File: {{$postulante->folder}}</li>
                    </lu>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td>
                    <h3>Verificación Física</h3>                    
                </td>
                <td>                    
                </td>
                <td>                   
                </td>
            </tr>
            <tr>
                <td align="left">
                    <?php $qr='qr/'.$admin?>
                    <img src="{{asset($qr)}}">
                </td>
                <td><br><br><br>
                    <h3>Vicedecanato FHCE</h3><br>
                    Facultad de Humanidades y Ciencias de la Educación
                    <p>Para hacer valido tu registro :<p>
                    <ol>
                        <li>Presentar la carta de postulación.</li>
                        <li>Adjuntar la presente nota en oficinas de la Facultad de Humanidades y Ciencias de la Educación, donde se sellara como constancia de tu postulación.</li>
                        <li>Puedes presentar la Carta y el Comprobante 24 horas después de la fecha límite de la convocatoria.</li>
                    </ol>                        
                </td>
                <td align="right">
                    <?php $qr='qr/'.$nameqr?>
                    <img src="{{asset($qr)}}">
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%">
            <tr>
                <td class="cabecera">
                    <h3>Universidad Mayor de San Andrés</h3><br>
                    Facultad de Humanidades y Ciencias de la Educación<br>
                    <hr>
                    Casa Marcelo Quiroga Santa Cruz  Avenida 6 de agosto  N° 2118 <br>
                    La Paz – Bolivia<br>
                    Vicedecanato<br> 
                    Teléfono: 2441988<br> 
                    Correo: vicedecanato.fhce@umsa.bo<br>
                    
                </td>
                <td align="right" class="cabecera">
                    <img src="{{asset('images/logou.jpg')}}" width="25px" height="50px">
                    <img src="{{asset('images/logof.jpg')}}" width="45px" height="25px">
                    <img src="{{asset('images/logot.jpg')}}" width="45px" height="35px"><br>
                    Unidad de Tecnologías de Información 2020 Jmmk<br>
                    {{$postulante->codex}}
                </td>               
            </tr>
            
        </table>
        
        
    </body>
</html>
