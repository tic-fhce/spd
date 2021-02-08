@extends('front.frontlogin')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@endsection

@section('label2')

<div id="heading" >
    <h1>Tutoriales para el registro de postulación</h1>
</div>

<section id="main">
    <div class="inner">
        <div class="content">
            <header>
                <h2>S.P.D. Herramientas</h2>
            </header>
            <div class="row">
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">                        
                        <a href="https://www.7-zip.org/" target="_black">Descarga 7-zip para subir tus documentos</a> 
                        <br><br>
                        <table class="alt">
                            <thead>
                                <tr>                                        
                                    <th>#</th>
                                    <th>Detalle</th>
                                    <th></th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                        
                                    <td>1</td>
                                    <td>Ingreso al Sistema de Postulación Docente Facultad de Humanidades<br><a href="#" >Descargar Pdf</a></td>
                                    <td><a href="#spd1" id="spd1div" class="button fit">Ver Video</a></td>                                    
                                </tr>
                                <tr>                                        
                                    <td>2</td>
                                    <td>Presentación Sistema de Postulación Docente Facultad de Humanidades <br><a href="#" >Descargar Pdf</a></td>
                                    <td><a href="#spd2" id="spd2div" class="button fit">Ver Video</a></td>
                                </tr>

                                <tr>                                        
                                    <td>3</td>
                                    <td>Convocatorias  Sistema de Postulación Docente Facultad de Humanidades <br><a href="#" >Descargar Pdf</a></td>
                                    <td><a href="#spd3" id="spd3div" class="button fit">Ver Video</a></td>
                                </tr>
                                <tr>                                        
                                    <td>4</td>
                                    <td>Crear Archivos digitales para el Sistema de Postulación Docente Facultad de Humanidades <br><a href="{{asset('pdf/tuto1.pdf')}}" target="_blanck">Descargar Pdf</a></td>
                                    <td><a href="#spd4" id="spd4div" class="button fit">Ver Video</a></td>
                                </tr>

                                <tr>                                        
                                    <td>5</td>
                                    <td>Registrarse al Sistema de Postulación Docente Facultad de Humanidades <br><a href="{{asset('pdf/tuto2.pdf')}}" target="_blanck" >Descargar Pdf</a></td>
                                    <td><a href="#spd5" id="spd5div" class="button fit">Ver Video</a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 col-12-xsmall">
                    <a href="{{route('index')}}" class="button fit">Inicio</a>
                </div>
            </div>  
        </div>
    </div>
</section>


<div id="spd1" class="mfp-hide" align="center">
    <iframe width="85%" height="415" src="https://www.youtube.com/embed/zW2A4BYQzS4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div id="spd2" class="mfp-hide" align="center">
    <iframe width="85%" height="415" src="https://www.youtube.com/embed/V2Jr3x1_lSM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div id="spd3" class="mfp-hide" align="center">
    <iframe width="85%" height="415" src="https://www.youtube.com/embed/uCUyk4NH5pA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<div id="spd4" class="mfp-hide" align="center">
    <iframe width="85%" height="415" src="https://www.youtube.com/embed/4W8iOGCDud8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<div id="spd5" class="mfp-hide" align="center">
    <iframe width="85%" height="415" src="https://www.youtube.com/embed/jstSx6GW8Y0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>

<script type="text/javascript">

    $('#spd1div')
    .magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    })
    $('#spd2div')
    .magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    })

    $('#spd3div')
    .magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    })

    $('#spd4div')
    .magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    })
    $('#spd5div')
    .magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    })
</script>
@endsection
