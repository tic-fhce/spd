                    <section class="card">
                        <div class="twt-feed bg-flat-color-2">
                            <div class="corner-ribon black-ribon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="fa fa-user-plus wtt-mark"></div>

                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:125px; height:125px;" alt="" src="{{asset($image)}}">
                                </a>
                                <div class="media-body">                                    
                                    <h2 class="text-white display-6">{{$persona->grado}}</h2>
                                    <p class="text-light">C.I. : {{$persona->ci}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{$titulo}}
                        </div>
                        
                        <div class="card-footer">
                            @if(session('mensaje_error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('mensaje_error')}}
                                </div>
                            @endif
                            Nombre (s): {{$persona->nombre}}<br>
                            Apellido (s) : {{$persona->apellido}}<br>
                            Correo : {{$persona->correo}}<br>
                            Celular : {{$persona->celular}}<br>
                            <hr>
                            Carrera : {{$postulante->carrera}}<br>
                            Convocatoria : {{$postulante->convocatoria}}<br>
                            Numero : {{$postulante->numero}}<br>
                            Materia : {{$postulante->materia}}<br>
                            Sigla : {{$postulante->sigla}}<br>
                            NDI : {{$postulante->codex}}<br>
                            Verificado por Vicedecanato<span class="badge badge-success">{{$postulante->verificado}}</span>
                        </div>
                        
                    </section>