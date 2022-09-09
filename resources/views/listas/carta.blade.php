@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                
                <div class="col-5 col-12-xsmall">
                    <h3>Agregar Nueva Carta Modelo </h3>
                    <hr>
                    <form action="{{route('AddCarta')}}" method="POST" enctype="multipart/form-data">
                    @csrf          
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="file" name="carta" value="" required="true"  accept=".docx, .doc" /><br>
                            <hr>
                            <input class="button primary fit small" type="submit" value="Subir Carta"><br><br>
                        </div>
                    </div>
                    </form>

                </div>
                <div class="col-1 col-12-xsmall" ></div>
                <div class="col-6 col-12-xsmall" >
                    <div class="table-wrapper">
                    <h4>Modelo de Cartas</h4>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Modelo de Carta</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carta as $value)
                                <?php $cartadox="storage/".$value->carta; ?> 
                                <tr>
                                    <td><a href="#" >{{$value->id}}</a></td>
                                    <td><a href="{{asset($cartadox)}}" target="_blanck">Revisar</a></td>
                                    <td>{{$value->estado}}</td>                                    
                                    <td>{{$value->created_at}}</td>
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

