@extends('front.frontlogin')

@section('label1')

<div class="inner">
            <header class="special">
                <h2>Iniciar  Sesión Comision Evaluadora</h2>
                <p></p>
            </header>
            <div class="highlights">
                <section>
                    
                </section>

                <section>
                    <div class="content">

                        @if(session('mensaje_error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('mensaje_error')}}
                            </div>
                        @endif
                        <form method="post" action="{{route('autenticar_comicion')}}">
                        @csrf
                            <div class="row gtr-uniform">
                                <div class="col-12 col-12-xsmall">
                                    <label>Usuario</label>
                                    <input type="text" name="user" id="user"  placeholder="Usuario" />
                                </div>
                                <div class="col-12 col-12-xsmall">
                                    <label>Contraseña</label>
                                    <input type="password" name="pass">
                                </div>
                                <br>
                                
                                <div class="col-12">
                                    <input type="submit" value="Ingresar" class="button primary fit" />
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <section>
                    
                </section>
            </div>
        </div>

@endsection
