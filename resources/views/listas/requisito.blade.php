@extends('front.frontadmin')

@section('label1')
	@include('admin.menu_gestion')
@endsection

@section('label2')
<section id="main" >
    <div class="inner">
        <div class="content">

            <div class="row">
                
                <div class="col-12 col-12-xsmall">
                    <div class="table-wrapper">
                    <h4>Convocatorias</h4>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Convocatoria</th>
                                    <th>Inciso</th>
                                    <th>Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requisito as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->carrera}}</td>
                                    <td>{{$value->inciso}}</td>
                                    <td>{{$value->detalle}}</td>
                                    <td><a href="#">Editar</a></td>
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
