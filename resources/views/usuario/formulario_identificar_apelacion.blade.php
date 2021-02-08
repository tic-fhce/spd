@extends('front.frontlogin')

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">
            <div class="row">
                
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">
                        <div class="row">
                            <div class="col-12 col-12-xsmall">
                               <h2> Complete los datos de registro: </h2> 
                               @if(session('mensaje_error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{session('mensaje_error')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-12-xsmall">
                                <form action="{{route('IdentificarApelacion')}}" method="POST">
                                @csrf   
                                    <input type="hidden" name="id_postulante" value="{{$id_postulante}}">
                                    <hr>
                                    <div class="row">
                                        <div class="col-4 col-12-xsmall"> Fecha de Nacimiento : </div>
                                        <div class="col-6 col-12-xsmall"> <input type="date" name="fecha" required="true"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4 col-12-xsmall">Correo : </div>
                                        <div class="col-6 col-12-xsmall"><input type="email" name="correo" required="true"></div>
                                    </div>
                                    <hr>
                                    <div class="row" align="center">
                                        <div class="col-10 col-12-xsmall">
                                            <input type="submit" value="Identificar">
                                        </div>
                                    </div>                                   
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection