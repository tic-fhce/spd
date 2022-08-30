<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ControllerSpdUpdate extends Controller
{
    #MODULO USUARIO
    public function UpdateUsuario(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona=App\Persona::findOrFail($request->id);
            $persona->nombre=$request->nombre;
            $persona->apellido=$request->apellido;
            $persona->correo=$request->correo;
            $persona->celular=$request->celular;
            $persona->save();

            $usuario=App\Usuario::findOrFail($request->id_usuario);
            $usuario->id_permiso=$request->permiso;
            $usuario->id_carrera=$request->carrera;
            $usuario->save();
            return back()->with('mensaje_error','Usuario Actualizado (a) Correctamente');
        }
        else
            return redirect('/');
        

    }// REVISADO 

    public function UpdatePassuser($id_usuario){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $usuario=App\Usuario::findOrFail($id_usuario);
            $usuario->passw= hash('ripemd160',$usuario->ci);
            $usuario->save();
            return back()->with('mensaje_error','La contraseña fue Actualizada Correctamente');
        }
        else
            return redirect('/');
    }//Revisado

    public function UpdateUsuarioC(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona=App\Persona::findOrFail($request->id);
            $persona->nombre=$request->nombre;
            $persona->apellido=$request->apellido;
            $persona->correo=$request->correo;
            $persona->celular=$request->celular;
            $persona->save();
            
            return back()->with('mensaje_error','Usuario Actualizado (a) Correctamente');
        }
        else
            return redirect('/');
        

    }// REVISADO 

    
    public function UpdatePassuserC($id_comicion){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $usuario=App\Comicion::findOrFail($id_comicion);
            $usuario->passw= hash('ripemd160',$usuario->ci);
            $usuario->save();
            return back()->with('mensaje_error','La contraseña fue Actualizada Correctamente');
        }
        else
            return redirect('/');
    }//Revisado

    //MODULO CONVOCATORIA

    public function UpdateItem(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $item=App\Item::findOrFail($request->id_item);
            $item->materia=$request->materia;
            if(isset($request->sigla))
                $item->sigla= strtoupper($request->sigla);
            else
                $item->sigla="-----";
            $item->carga=$request->carga;

            if(isset($request->plazas))
                $item->plazas=$request->plazas;
            else
                $item->plazas="N/N";
            if(isset($request->periodo))
                $item->periodo=$request->periodo;
            else
                $item->periodo="N/N";

            $item->save();
            return redirect(route('formularioitem',$request->id));
        }
        else
            return redirect('/');
        

    }// funcion que registra al usuario  

    #MODULO CONVOCATORIA
    public function UpdateConvocatoria(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $convocatoria=App\Convocatoria::findOrFail($request->id);
            $convocatoria->gestion=$request->gestion;
            $convocatoria->fecha_ini=$request->inicio;
            $convocatoria->fecha_fin=$request->fin;
            $convocatoria->numeroconvocatoria=$request->numero;
            $convocatoria->id_concepto=$request->concepto;
            $convocatoria->detalle=$request->detalle;
            $convocatoria->estado=$request->estado;
            $convocatoria->save();

            return back()->with('mensaje_error','Convocatoria Actualizada Correctamente');
        }
        else
            return redirect('/');
        

    }// Revisado

    public function UpdatePdf(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $pdf=$request->file('pdf')->store('public');
            $pdf=str_replace('public/','', $pdf);

            $convocatoria=App\Convocatoria::findOrFail($request->id);
            $convocatoria->pdf=$pdf;
            $convocatoria->save();

            return back()->with('mensaje_error','Convocatoria PDF Actualizada Correctamente');
        }
        else
            return redirect('/');
    }//revisado

    public function UpdateRequisito(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $requisito=App\Requisito::findOrFail($request->id_requisito);
            $requisito->inciso=$request->inciso;
            $requisito->detalle=$request->detalle;
            $requisito->save();

            return redirect(route('formularioitem',$request->id));
        }
        else
            return redirect('/');
        

    }// funcion que registra al usuario
    
    public function UpdateFolder(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $folder=$request->file('folder')->store('public');
            $folder=str_replace('public/','', $folder);

            
            $postulante=App\Postulante::findOrFail($request->id);
            $postulante->codex_postulante= hash('ripemd160',substr($folder, 0,6).substr($postulante->carta,0,6));
            $postulante->file=$folder;
            $postulante->save();

            return back()->with('mensaje_error','Folder Cambiado Correctamente');
        }
        else
            return redirect('/');
        
    }

    #MODULO PERFIL

    public function UpdatePassword(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $usuario=App\Usuario::findOrFail($datos->id);
            if(hash('ripemd160',$request->password2)==$usuario->passw)
            {
                $usuario->passw= hash('ripemd160',$request->password);
                $usuario->save();
                return back()->with('mensaje_suses','La contraseña fue Actualizada Correctamente');
            }
            else             
                return back()->with('mensaje_error','La contraseña actual no coincide verifique e intente nuevamente');
        }
        else
            return redirect('/');
    }//revisado

    #MODULO KARDEX
    
    public function requisitosKardex(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $requisito=App\Requisito::where('id_convocatoria',$request->id_convocatoria)->get();
            $cantidadreq=0;
            foreach ($requisito as $value) {
                $cantidadreq=$cantidadreq+1;
            }
            $requestcantidad=0;
            $detalle='No cumple los requisitos por ';

            $rq="";
            $rq=App\Requisitopostulante::where('id_convocatoria',$request->id_convocatoria)->where('id_postulante',$request->id)->first();

            foreach ($requisito as $value) 
            {
                if($rq==""){
                    $requisitopostulante=new App\Requisitopostulante;
                }
                else 
                    $requisitopostulante=App\Requisitopostulante::findOrFail($value->id);
                
                $requisitopostulante->id_postulante=$request->id;
                $requisitopostulante->id_convocatoria=$request->id_convocatoria;
                $requisitopostulante->id_requisito=$value->id;

                $i='dato'.$value->id;
                if(isset($request->$i) and ($request->$i==$value->id)){
                    $requestcantidad=$requestcantidad+1;
                    $requisitopostulante->valor=1;
                }
                else{
                    $detalle=$detalle.' '.$value->inciso.' - '.$value->detalle.'/';
                    $requisitopostulante->valor=0;
                }
                $requisitopostulante->save();
            }

            if($cantidadreq==$requestcantidad){
                $cumple="Cumple";
                $detalle="Cumple Con todos los Requisitos";
            }
            else
                $cumple="NO Cumple";

            $postulante=App\Postulante::findOrFail($request->id);
            $postulante->cumple=$cumple;
            $postulante->detalle=$detalle;
            $postulante->save();

            $registro= new App\Registro;
            $registro->id_usuario=$datos->id;
            $registro->id_postulante=$request->id;
            $registro->obs='';
            $registro->save();

            $kardex= array('id_carrera' => $datos->id_carrera,'id_convocatoria'=>$request->id_convocatoria,'ci'=>0,'cumple'=>0);
            return redirect(route('listaPostulanteKardex',$kardex));

        }
        else
            return redirect('/');
        

        //$datos = array('ci' => $request->ci,'fecha'=>$request->fecha);

        //return redirect(route('postulacion',$datos));
    }
    #MODULO COMISION
    public function UpdatePasswordc(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $comicion=App\Comicion::findOrFail($datos->id);
            if(hash('ripemd160',$request->password2)==$comicion->passw)
            {
                $comicion->passw= hash('ripemd160',$request->password);
                $comicion->save();
                return back()->with('mensaje_suses','La Contraseña fue Actualizada Correctamente');
            }
            else             
                return back()->with('mensaje_error','La contraseña actual no coincide verifique e intente nuevamente');
        }
        else
            return redirect('/');
    }//revisado

    public function requisitosComicion(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $requisito=App\Requisito::where('id_convocatoria',$request->id_convocatoria)->get();
            $cantidadreq=0;
            foreach ($requisito as $value) {
                $cantidadreq=$cantidadreq+1;
            }
            $requestcantidad=0;
            $detalle='No cumple los requisitos por ';

            $postulante=App\Postulante::findOrFail($request->id_postulante);
            $c=$postulante->cumple;

            if($c=='s'){
                foreach ($requisito as $value) 
                {
                    
                    $requisitopostulante=new App\Requisitopostulante;
                    $requisitopostulante->id_postulante=$request->id_postulante;
                    $requisitopostulante->id_convocatoria=$request->id_convocatoria;
                    $requisitopostulante->id_requisito=$value->id;
                    $i='dato'.$value->id;
                    if(isset($request->$i) and ($request->$i==$value->id)){
                        $requestcantidad=$requestcantidad+1;
                        $requisitopostulante->valor=1;
                    }
                    else{
                        $detalle=$detalle.' '.$value->inciso.' - '.$value->detalle.'/';
                        $requisitopostulante->valor=0;
                    }
                    $requisitopostulante->save();
                }
            }
            else{
                $requisitopostulante=App\Requisitopostulante::where('id_convocatoria',$request->id_convocatoria)->where('id_postulante',$request->id_postulante)->get();
                
                foreach ($requisitopostulante as $value) {

                    $req=App\Requisitopostulante::findOrFail($value->id);
                    $i='dato'.$value->id_requisito;
                    if(isset($request->$i) and ($request->$i==$value->id_requisito)){
                        $requestcantidad=$requestcantidad+1;
                        $req->valor=1;
                    }
                    else
                    {
                        $r=App\Requisito::findOrFail($value->id_requisito);
                        $detalle=$detalle.' '.$r->inciso.' - '.$r->detalle.'/';
                        $req->valor=0;   
                    }
                    $req->save();
                }
            }


            if($cantidadreq==$requestcantidad){
                $cumple="Cumple";
                $detalle="Cumple Con todos los Requisitos";
            }
            else
                $cumple="NO Cumple";

            $postulante=App\Postulante::findOrFail($request->id_postulante);
            $id_item=$postulante->id_item;
            $ci=$postulante->ci;
            $postulante->cumple=$cumple;
            $postulante->detalle=$detalle;
            $postulante->save();

            $registro= new App\Registro;
            $registro->id_usuario=$datos->id;
            $registro->id_postulante=$request->id_postulante;
            $registro->obs=$detalle;
            $registro->save();

            if($cumple=='NO Cumple')
                $ci=0;

            $uri= array('id_convocatoria' => $request->id_convocatoria,'id_item'=>$id_item);
            return redirect(route('listaPostulantes',$uri));

        }
        else
            return redirect('/');
    }//revisado

    public function UpdatePuntos(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $factor=App\Factoreva::where('id_carrera',$request->id_carrera)->where('id_convocatoria',$request->id_convocatoria)->where('id_concepto',$request->id_concepto)->get();

            $i=0;
            foreach ($factor as $value) {
                $i=$i+1;
            }

            if($i<2){
                if($request->id_concepto>3 and $request->id_concepto<8)
                    $factor=App\Factoreva::where('id_carrera',1)->where('id_concepto',5)->get();
                else
                    $factor=App\Factoreva::where('id_carrera',1)->where('id_concepto',1)->get();
                $id_carrera=1;
            }

            $factor1=App\Evaluacion::where('id_postulante',$request->id_postulante)->get();
            $total=0;
            $c=0;

            foreach ($factor as $value) {
                $i='dato'.$factor1[$c]->id;
                if($request->$i>$value->maximo)
                    $total=200;
                $c=$c+1;
            }
            if($total==0){
                $factor=App\Evaluacion::where('id_postulante',$request->id_postulante)->get();
                foreach ($factor as $value) {
                    $i='dato'.$value->id;
                    $evaluacion=App\Evaluacion::findOrFail($value->id);
                    $j=$evaluacion->puntos;
                    $k=str_replace(',', '.', $request->$i);
                    $evaluacion->puntos=$k;
                    $total=$total+$k;
                    $evaluacion->save();

                    $registro= new App\Registro;
                    $registro->id_usuario=$datos->id;
                    $registro->id_postulante=$request->id_postulante;
                    $registro->obs=$value->detalle.' Nota ='.$j;
                    $registro->save();
                }

                $postulante=App\Postulante::findOrFail($request->id_postulante);
                $nota=$postulante->puntos;
                $postulante->puntos=$total;
                $postulante->save();
                
                $registro= new App\Registro;
                $registro->id_usuario=$datos->id;
                $registro->id_postulante=$request->id_postulante;
                $registro->obs='Puntos ='.$nota;
                $registro->save();
            
                return redirect(route('datospostulanteRevisor',$request->id_postulante));    
            }
            else
                return back()->with('mensaje_error','Los puntos no Pueden ser mayor a los Establesidos');
            
        }
        else
            return redirect('/');
    }// revisado 

    public function UpdateApelacion(Request $request){
        session_start();
        if(isset($_SESSION['postulante']))
        {
            $apelacion = App\Apelacion::findOrFail($request->id_apelacion);
            $id_postulante=$apelacion->id_postulante;
            $apelacion->por=$request->por;
            $apelacion->detalle=$request->detalle;
            $apelacion->obs=$request->obs;
            $apelacion->estado="2";
            $apelacion->save();

            $postulante=App\Postulante::findOrFail($id_postulante);
            $postulante->habilitado='SI';
            $postulante->save();
            return back()->with('mensaje_error','Apelacion realizada');
        }
        else
            return redirect('/');

    }//revisado
    
    public function UpdateApelacionComicion(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $apelacion = App\Apelacion::findOrFail($request->id_apelacion);
            $apelacion->estado="2";
            $apelacion->respuesta=$request->respuesta;
            $apelacion->save();
            return back()->with('mensaje_error','Respuesta Mandada');
        }
        else
            return redirect('/');

    }

    public function UpdateGanador($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=App\Postulante::findOrFail($id_postulante);
            $postulante->fisico="SI";
            $postulante->save();

            $registro= new App\Registro;
            $registro->id_usuario=$datos->id;
            $registro->id_postulante=$id_postulante;
            $registro->obs='Seleccionado como ganador de la convocatoria'.$postulante->id_convocatoria.' y del item'.$postulante->id_item;
            $registro->save();
            return back();
        }
        else
            return redirect('/');
    }//revisado

    public function UpdatePerdedor($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=App\Postulante::findOrFail($id_postulante);
            $postulante->fisico="NO";
            $postulante->save();

            $registro= new App\Registro;
            $registro->id_usuario=$datos->id;
            $registro->id_postulante=$id_postulante;
            $registro->obs='Seleccionado como perdedor de la convocatoria'.$postulante->id_convocatoria.' y del item'.$postulante->id_item;
            $registro->save();
            return back();
        }
        else
            return redirect('/');
    }//revisado

    public function UpdateFisicoOk($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=App\Postulante::findOrFail($id_postulante);
            $postulante->fisico="SISI";
            $postulante->save();

            $registro= new App\Registro;
            $registro->id_usuario=$datos->id;
            $registro->id_postulante=$id_postulante;
            $registro->obs='Registro de Documentos Fisicos para '.$postulante->id_convocatoria.' y del item'.$postulante->id_item;
            $registro->save();
            return back();
        }
        else
            return redirect('/');
    }//revisado

    public function UpdateFisicoDonw($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=App\Postulante::findOrFail($id_postulante);
            $postulante->fisico="SI";
            $postulante->save();

            $registro= new App\Registro;
            $registro->id_usuario=$datos->id;
            $registro->id_postulante=$id_postulante;
            $registro->obs='Registro de Documentos Fisicos Retirados para '.$postulante->id_convocatoria.' y del item'.$postulante->id_item;
            $registro->save();
            return back();
        }
        else
            return redirect('/');
    }//revisado

    public function UpdatePermisoE($id_itemcon){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $itemcon=App\Itemcom::findOrFail($id_itemcon);
            $itemcon->permiso="5";
            $itemcon->save();
            return back();
        }
        else
            return redirect('/');
    }//revisado

    public function UpdatePermisoR($id_itemcon){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $itemcon=App\Itemcom::findOrFail($id_itemcon);
            $itemcon->permiso="4";
            $itemcon->save();
            return back();
        }
        else
            return redirect('/');
    }//revisado

    

}
