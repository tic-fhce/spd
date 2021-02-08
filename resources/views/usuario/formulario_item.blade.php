@extends('front.frontlogin')

@section('css')
<style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
</style>
@endsection

@section('label2')

<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                
                <div class="col-3 col-12-xsmall">
                    @include('usuario.datos')
                </div>

                <div class="col-1 col-12-xsmall">
                    <br><br>
                </div>

                <div class="col-8 col-12-xsmall">
                    Convocatoria <a href="#"># {{$convocatoria->numeroconvocatoria}}</a><br>
                    Convocatoria a <a href="#">"{{$convocatoria->nombre}}"</a><br>
                    Carrera: <a href="#">{{$convocatoria->carrera}}</a><br>
                    Gestion: <a href="#">{{$convocatoria->gestion}}</a><br>
                    Detalle: <br>{{$convocatoria->detalle}}<br>
                    <hr>                    
                    <form action="{{url('AddFolder')}}" method="POST" enctype="multipart/form-data">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="hidden" name="ci" value="{{$datos['ci']}}"><input type="hidden" name="fecha" value="{{$datos['fecha']}}">
                            <input type="hidden" name="id_carrera" value="{{$datos['id_carrera']}}"><input type="hidden" name="id_convocatoria" value="{{$datos['id_convocatoria']}}">

                            <select name="id_item" required="true">
                                <option value="">Materia o Área a Postular</option>
                                @foreach($item as $value)
                                    <option value="{{$value->id}}">{{$value->materia}}  {{$value->sigla}}</option>
                                @endforeach
                            </select>
                            <br>
                            Documentos de Postulacion  en formato ZIP o RAR:<br>
                            <input type="file" name="folder" accept=".zip,.rar,.7zip" required="true" /><br><br>
                            Carta de Postulación:<br>
                            <input type="file" name="carta" accept=".docx,.doc" required="true" /><br>
                            <hr>
                            <div class="progress">
                                <div class="bar"></div >
                                <div class="percent">0%</div >
                            </div>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Registrar Datos"><br><br>
                            <a href="{{route('formulariopostulo',$atras)}}" class="button fit">Cancelar</a><br><br>
                        </div>
                    </div>
                    </form>
                </div>

                
            </div> 
        </div>
    </div>
</section>

@endsection

@section('script')

<script type="text/javascript">
 
    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.folder.value) {
            alert('File not found');
            return false;
        }
    }
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('form').ajaxForm({
        beforeSubmit: validate,
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=folder]').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Guardando Archivos';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);            
            alert("Los Datos Fueron Guardados Corectamente C.I. {{$datos['ci']}}");
            window.location.href = "https://svfhce.umsa.bo/sv/spd/postulacion/{{$datos['ci']}}/{{$datos['fecha']}}";
        }
    });
     
    })();
</script>
@endsection
