<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ControllerSpdAdd extends Controller
{
    ###### MODULO DE USUARIO
    public function AddUsuario(Request $request){
		session_start();
    	if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $ci=str_replace(' ','', $request->ci);
            $ci=strtolower($ci);

            $p=App\Persona::where('ci',$request->ci)->get();
            $k=0;
            foreach ($p as  $value) {
                $k=$k+1;
            }
            if($k==0){
                $persona=new App\Persona;
                $persona->ci=$ci;
                $persona->nombre=$request->nombre;
                $persona->apellido=$request->apellido;
                $persona->fechanac="";
                $persona->correo=$request->correo;
                $persona->celular=$request->celular;
                $persona->filefoto="";
                $persona->grado="";
                $persona->save();

                $usuario=new App\Usuario;
                $usuario->usser=$request->correo;
                $usuario->passw=hash('ripemd160',$request->ci);
                $usuario->ci=$request->ci;
                $usuario->id_permiso=$request->permiso;
                $usuario->id_carrera=$request->carrera;
                $usuario->save();    
                return redirect(route('listausuarios'));
            }
            else
                return back()->with('mensaje_error','El Usuario con C.I. : '.$request->ci.' Ya existe y no puede ser registrado');
        }
    	else
        	return redirect('/');
	}// Revisado

    ### MODULO GESTION
    ###### MODULO DE USUARIO
    public function AddConcepto(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $concepto=new App\Concepto;
            $concepto->nombre=$request->nombre;
            $concepto->detalle=$request->detalle;
            $concepto->estado="1";
            $concepto->save();

            return redirect(route('listaconcepto'));
        }
        else
            return redirect('/');
        

    }// funcion que registra al usuario  

    #MODULO CONVOCATORIA
    public function AddConvocatoria(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $pdf=$request->file('pdf')->store('public');
            $pdf=str_replace('public/','', $pdf);

            $datos=$_SESSION['usuario'];
            $convocatoria=new App\Convocatoria;
            $convocatoria->gestion=$request->gestion;
            $convocatoria->id_carrera=$request->carrera;
            $convocatoria->fecha_ini=$request->inicio;
            $convocatoria->fecha_fin=$request->fin;
            $convocatoria->numeroconvocatoria=$request->numero;
            $convocatoria->id_concepto=$request->concepto;
            $convocatoria->detalle=$request->detalle;
            $convocatoria->estado="1";
            $convocatoria->pdf=$pdf;
            $convocatoria->save();

            $convocatoria=App\Convocatoria::all();
            $idconvocatoria=$convocatoria->last();

            return redirect(route('formularioitem',$idconvocatoria->id));
        }
        else
            return redirect('/');
        

    }// funcion que registra al usuario 

    public function AddItem(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $item=new App\Item;
            $item->id_convocatoria=$request->id;
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
            $item->estado="1";

            $item->save();
            return redirect(route('formularioadditem',$request->id));
        }
        else
            return redirect('/');
        

    }// funcion que registra al usuario 

    public function AddRequisito(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $requisito=new App\Requisito;
            $requisito->id_convocatoria=$request->id;
            $requisito->inciso=strtoupper($request->inciso);
            $requisito->detalle=$request->detalle;
            $requisito->save();
            return redirect(route('formularioaddrequisito',$request->id));
        }
        else
            return redirect('/');
    }// funcion que registra al usuario 



    public function AddCarta(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $name=$request->file('carta')->store('public');
            $name=str_replace('public/','', $name);

            DB::table('cartas')->update(['estado'=>'0']);

            $carta=new App\Carta;
            $carta->carta=$name;
            $carta->estado="1";

            $carta->save();
            return redirect(route('listacarta'));
        }
        else
            return redirect('/');
        

    }// funcion que registra al usuario 

    public function AddFactor(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $carrera=App\Factoreva::where('id_carrera',$request->id_carrera)->where('id_convocatoria',$request->id_convocatoria)->get();
            $i=0;
            foreach ($carrera as $value) {
                $i=$i+$value->maximo;
            }
            if($i<100){
                $factor=new App\Factoreva;
                $factor->id_carrera=$request->id_carrera;
                $factor->id_convocatoria=$request->id_convocatoria;
                $factor->id_concepto=$request->id_concepto;
                $factor->item=$request->item;
                $factor->detalle=$request->detalle;
                $factor->maximo=$request->maximo;
                $factor->save();
                $uri = array('id_carrera' =>$request->id_carrera,'id_convocatoria'=>$request->id_convocatoria);
                return redirect(route('formularioevaluacion',$uri));
            }
            else
                return back()->with('mensaje_error','Los Factores de Evaluación Abarcan la Totalidad de puntos');

        }
        else
            return redirect('/');
    }// funcion que registra al usuario

     
    public function AddItemFactor(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $factor=new App\Itemfactor;
            $factor->id_factor=$request->id;
            $factor->item=$request->item;
            $factor->detalle=$request->detalle;
            $factor->maximo=$request->maximo;
            $factor->save();
            return redirect(route('formularioTtemEvaluacion',$request->id));
        }
        else
            return redirect('/');
    }// funcion que registra al usuario

    #MODULO REQUISITOS

    public function AddPuntos(Request $request){
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

            $total=0;

            foreach ($factor as $value) {
                $i='dato'.$value->id;
                if($request->$i>$value->maximo)
                    $total=200;
            }
            if($total==0){
                foreach ($factor as $value) {
                    $i='dato'.$value->id;
                    $evaluacion=new App\Evaluacion;
                    $evaluacion->id_postulante=$request->id_postulante;
                    $evaluacion->id_factor=$value->id;
                    $evaluacion->detalle=$value->detalle.' Maxima Calificacion a colocar = '.$value->maximo;
                    $k=str_replace(',', '.', $request->$i);
                    $evaluacion->puntos=$k;
                    $evaluacion->sobre=$value->maximo;
                    $total=$total+$k;
                    $evaluacion->save();
                }

                $postulante=App\Postulante::findOrFail($request->id_postulante);
                $postulante->puntos=$total;
                $postulante->save();
            
                return redirect(route('datospostulanteRevisor',$request->id_postulante));    
            }
            else
                return back()->with('mensaje_error','Los puntos no Pueden ser mayor a los Establesidos');
            
        }
        else
            return redirect('/');
    }// funcion que registra al usuario

    public function AddComicion(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $ci=str_replace(' ','', $request->ci);
            $ci=strtolower($ci);
            $ci=$ci.'%';
            $persona=App\Persona::where('ci','like',$ci)->get();
            $k=0;
            foreach ($persona as  $value) {
                $k=$k+1;
            }
            if($k==0){
                $ci=str_replace('%','',$ci);
                $persona=new App\Persona;
                $persona->ci=$ci;
                $persona->nombre=$request->nombre;
                $persona->apellido=$request->apellido;
                $persona->fechanac="nn";
                $persona->correo=$request->correo;
                $persona->celular=$request->celular;
                $persona->filefoto="comicion";
                $persona->grado="comicion";
                $persona->save();

                $comicion=new App\Comicion;
                $comicion->usser=$request->correo;
                $comicion->passw=hash('ripemd160',$ci);
                $comicion->ci=$ci;
                $comicion->estado='1';
                $comicion->save();
                return redirect(route('formulariocomicionitem',$ci));
            }
            else{
                return back()->with('mensaje_error','Carnet Registrado '.$request->ci);
            }
        }
        else
            return redirect('/');
    }// revisado

    public function AddItemCom(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            if($request->id_item =='todos')
            {
                $item = App\Item::where('id_convocatoria',$request->id_convocatoria)->get();
                foreach ($item as $value) {
                    $itemcom= new App\Itemcom;
                    $itemcom->id_comicion=$request->id_comicion;
                    $itemcom->id_convocatoria=$request->id_convocatoria;
                    $itemcom->id_item=$value->id;
                    $itemcom->permiso=$request->permiso;
                    $itemcom->save();
                }
            }
            else{
                $itemcom= new App\Itemcom;
                $itemcom->id_comicion=$request->id_comicion;
                $itemcom->id_convocatoria=$request->id_convocatoria;
                $itemcom->id_item=$request->id_item;
                $itemcom->permiso=$request->permiso;
                $itemcom->save();    
            }
            
            return redirect(route('formulariocomicionitem',$request->ci));
        }
        else
            return redirect('/');
    }// funcion que registra al usuario

    public function AddApelacion($id_convocatoria,$id_item){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=App\Postulante::where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->get();
            foreach ($postulante as  $value) {
                $apelacion=new App\Apelacion;
                $apelacion->id_postulante=$value->id;
                $apelacion->id_convocatoria=$id_convocatoria;
                $apelacion->id_item=$value->id_item;
                $apelacion->por="Seleccionar Motivo";
                $apelacion->detalle="Describa Motivo de Observación";
                $apelacion->obs="Explique el Motivo y solución o aclaración";
                $apelacion->respuesta="";
                $apelacion->estado='1';
                $apelacion->save();
            }
            return back()->with('mensaje_error','Las Apelaciones fueron Activadas para los Postulantes');
        }
        else
            return redirect('/');
    }// funcion que registra al usuario 
}
