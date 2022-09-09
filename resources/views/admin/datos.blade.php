<?php $image="storage/".$persona->filefoto;?>
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
                  
    <div class="weather-category twt-category">
                            
    </div>
    <footer class="twt-footer">
        <h4><strong class="card-title mb-3">{{$titulo}}</strong></h4>
    </footer>
    <div class="card-footer">
        Nombre (s): {{$persona->nombre}}<br>
        Apellido (s) : {{$persona->apellido}}<br>
        Correo : {{$persona->correo}}<br>
        Celular : {{$persona->celular}}<br>
    </div>
</section>