<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ControllerSpdRoute extends Controller
{
    public function index(){
    	
    	return view('front.front');

	}// funcion que muestra el inicio 

	public function login(){
    	
    	return view('admin.login');

	}// funcion que muestra el inicio


	#####################################################
	#MODULO POSTULANTE
	public function formularioidentificar(){

    	$carta=App\Carta::where('estado','1')->first();
    	$cartadox="storage/".$carta->carta;
    	return view('usuario.formulario_identificar',compact('cartadox'));

	}// funcion que muestra el formulario de identificacion

	public function identificar(Request $request){
		$fecha=$request->fecha;
		$ci=str_replace(' ','', $request->ci);
		$ci=str_replace('.','', $ci);
		$ci=strtolower($ci);

		$id=substr($ci,0,4);
		$i=0;
		$persona=App\Persona::where('ci','like',$id.'%')->get();
		foreach ($persona as $value) {
			if(strlen($value->ci)>=strlen($ci))
				$c=substr($value->ci,0,strlen($ci));
			else 
				$c=$ci;
			if($c==$ci){
				$i=1;
				$c=$value->ci;
				break;
			}
		}

		if($i==1){
			
			$postulante="";
			$postulante=App\Persona::where('ci',$c)->where('fechanac',$request->fecha)->first();
			if($postulante==""){
				$postulante= App\Persona::where('ci', $c)->first();
				if($postulante=="")
				{
					$datos = array('ci' =>$c,'fecha'=>$fecha);
					return redirect(route('formulariodatos',$datos));
				}
				else {
					return back()->with('mensaje_error','La fecha de nacimiento '.$request->fecha.'  no corresponde al C.I.'.$ci.' registrado. Verifique sus datos e intente nuevamente');
				}

			}
			else{
				$datos = array('ci' =>$c,'fecha'=>$fecha);
				return redirect(route('formulariocarrera',$datos));
			}

		}
		else
		{
			$datos = array('ci'=>$ci,'fecha'=>$fecha);
			return redirect(route('formulariodatos',$datos));
		}

	}// funcion que muestra el formulario de identificacion
	 	
	public function formulariodatos($ci,$fecha){
		$carta=App\Carta::where('estado','1')->first();
    	$cartadox="storage/".$carta->carta;
		return view('usuario.formulario_datos',compact('ci','fecha','cartadox'));
	}

	public function formulariopostulo($ci,$fecha,$carrera){
		$persona="";
		$persona=App\Persona::where('ci',$ci)->where('fechanac',$fecha)->first();
		if($persona!=""){

			$convocatoria=DB::table('view_convocatoria')->where('id_carrera',$carrera)->get();
			$postulante=DB::table('view_mispostulaciones')->where('id_carrera',$carrera)->where('ci',$ci)->get();

			//$postulante=App\Postulante::where('ci',$ci)->where('id_carrera',$carrera)->orderBy('id','DESC')->get();

			$i=0;
			foreach ($postulante as $value) {
				if($value->carga>32)
					$i=$i+1;
				$i=$i+1;
			}

			return view('usuario.formulario_postulante',compact('persona','convocatoria','i'));
		}
		else 
			return redirect(route('index'));
	}

	public function AddPostulante(Request $request){


		$name=$request->file('foto')->store('public');
        $name=str_replace('public/','', $name);


        $persona=new App\Persona;
        $persona->ci=$request->ci;
        $persona->nombre=$request->nombre;
        $persona->apellido=$request->apellido;
        $persona->fechanac=$request->fecha;
        $persona->correo=$request->correo;
        $persona->celular=$request->celular;
        $persona->filefoto=$name;
        $persona->grado=$request->grado;
        $persona->save();

        $ci=$request->ci;
		$fecha=$request->fecha;
		$datos = array('ci' =>$ci,'fecha'=>$fecha);

        return redirect(route('formulariocarrera',$datos));
	}

	public function formulariocarrera($ci,$fecha){
		$persona=App\Persona::where('ci',$ci)->where('fechanac',$fecha)->first();
		$datos = array('ci' =>$ci,'fecha'=>$fecha);
		$carrera=DB::table('view_carrera')->groupBy('id')->get();

		$carta=App\Carta::where('estado','1')->first();
    	$cartadox="storage/".$carta->carta;

		return view('usuario.formulario_carrera',compact('persona','datos','carrera','cartadox'));
	}

	public function formularioitemusuario($ci,$fecha,$id_convocatoria,$id_carrera){
		$persona="";
		$persona=App\Persona::where('ci',$ci)->where('fechanac',$fecha)->first();
		$convocatoria=DB::table('view_convocatoria')->where('id',$id_convocatoria)->first();
		$item=App\Item::where('id_convocatoria',$id_convocatoria)->get();
		if($persona!=""){
			$datos = array('ci' =>$ci,'fecha'=>$fecha,'id_convocatoria'=>$id_convocatoria,'id_carrera'=>$id_carrera);
			$atras= array('ci'=>$ci,'fecha'=>$fecha,'carrera'=>$id_carrera);
			return view('usuario.formulario_item',compact('persona','convocatoria','datos','item','convocatoria','atras'));
		}
		else 
			return redirect(route('index'));
	}

	public function AddFolder(Request $request){

		$folder=$request->file('folder')->store('public');
        $folder=str_replace('public/','', $folder);

        $carta=$request->file('carta')->store('public');
        $carta=str_replace('public/','', $carta);

        $this->validate($request,[
            'folder' => 'required',
        ]);

        $postulante=new App\Postulante;
        $postulante->ci=$request->ci;
        $postulante->fechanac=$request->fecha;
        $postulante->codex_postulante= hash('ripemd160',substr($folder, 0,6).substr($carta,0,6));
        $postulante->codex_comp=$carta;
        $postulante->id_item=$request->id_item;
        $postulante->id_convocatoria=$request->id_convocatoria;
        $postulante->id_carrera=$request->id_carrera;
        $postulante->file=$folder;
        $postulante->puntos="0";
        $postulante->fisico="NO";
        $postulante->habilitado="NO";
        $postulante->verificado="NO";
        $postulante->cumple="s";
        $postulante->detalle="Ninguno";
        $postulante->save();

        //return back()->with('success','You have successfully upload image.')->with('image','hola');

        //$datos = array('ci' => $request->ci,'fecha'=>$request->fecha);

        //return redirect(route('postulacion',$datos));
	}

	public function postulacion($ci,$fecha){

		$persona="";
		$persona=App\Persona::where('ci',$ci)->where('fechanac',$fecha)->first();
		//$postulante=App\Postulante::where('ci',$ci)->orderBy('id','DESC')->get();
		$postulante=DB::table('view_mispostulaciones')->where('ci',$ci)->where('fecha',$fecha)->get();
		if($persona!=""){
			$datos = array('ci' =>$ci,'fecha'=>$fecha);
			return view('usuario.descargar_pdf',compact('persona','postulante','datos'));
		}
		else 
			return redirect(route('index'));
	}

	public function convocatorias($id_carrera){
		if($id_carrera==0)
			$convocatoria=DB::table('view_convocatoria')->orderBy('fecha_fin','DESC')->get();
		else
			$convocatoria=DB::table('view_convocatoria')->where('id_carrera',$id_carrera)->orderBy('fecha_fin','DESC')->get();

		$carta=App\Carta::where('estado','1')->first();
		$carrera=App\Carrera::all();
    	$cartadox="storage/".$carta->carta;
		return view('usuario.convocatorias',compact('convocatoria','cartadox','carrera'));
	}

	public function BuscarConvocatoriaUsuario(Request $request){
        return redirect(route('convocatorias',$request->carrera));
    }

	public function item($id){
		$convocatoria=DB::table('view_convocatoria')->where('id',$id)->first();
		$item=App\Item::where('id_convocatoria',$id)->get();
		
		$carta=App\Carta::where('estado','1')->first();
    	$cartadox="storage/".$carta->carta;

		return view('usuario.item',compact('convocatoria','item','cartadox'));
	}

	public function tutorial(){
		return view('usuario.tutorial');	
	}

	#MODULO COMICION
	public function login_comision(){
    	
    	return view('admin.login_comision');

	}// funcion que muestra el inicio

	public function habilitado_carrera(){
    	$carrera=App\Carrera::all();
    	return view('usuario.habilitado_carrera',compact('carrera'));

	}// funcion que muestra el inicio

	public function lista_habilitado($id_carrera,$ci)
	{
		$carrera=App\Carrera::findOrfail($id_carrera);
		$lista=DB::table('view_lista_item')->where('id_carrera',$id_carrera)->where('estado',2)->orderBy('id_item','ASC')->get();
		if($ci==0)
			$postulante=DB::table('view_mispostulaciones')->where('id_carrera',$id_carrera)->where('estado',2)->orderBy('id_convocatoria','ASC')->orderBy('id_item','ASC')->orderBy('puntos','DESC')->get();
		else{
			$ci=str_replace(' ','',$ci);
			$ci=str_replace('.','',$ci);
			$ci=strtolower($ci);
			$ci=$ci.'%';
			$postulante=DB::table('view_mispostulaciones')->where('id_carrera',$id_carrera)->where('estado',2)->where('ci','like',$ci)->orderBy('id_convocatoria','ASC')->orderBy('id_item','ASC')->orderBy('puntos','DESC')->get();
		}

		return view('usuario.habilitado_lista',compact('carrera','postulante','lista'));
	}

	public function BuscarPostulantesLista(Request $request){
        $uri = array('id_carrera'=>$request->id_carrera,'ci'=>$request->ci);
        return redirect(route('lista_habilitado',$uri));
    }

    public function formularioapleacionidentificar($id_postulante)
    {
    	return view('usuario.formulario_identificar_apelacion',compact('id_postulante'));
    }

    public function IdentificarApelacion(Request $request){
    	$postulante="";
    	$postulante=DB::table('view_mispostulaciones')->where('id',$request->id_postulante)->where('fecha',$request->fecha)->where('correo',$request->correo)->first();
    	if($postulante=="")
    		return back()->with('mensaje_error','Error El Postulante no fue Identificado veririque su fecha de Nacimiento y Correo Electronico con el cual se registro');
    	else{
    		session_start();
    		$_SESSION['postulante']=$postulante;
    		return redirect('formularioApelacion');
    	}
    }
    public function formularioApelacion(){
    	session_start();
        if(isset($_SESSION['postulante']))
        {
        	$postulante=$_SESSION['postulante'];
        	$persona=App\Persona::findOrfail($postulante->id_persona);
    		$evaluacion=App\Evaluacion::where('id_postulante',$postulante->id)->get();
    		$apelacion=App\Apelacion::where('id_postulante',$postulante->id)->where('id_convocatoria',$postulante->id_convocatoria)->where('id_item',$postulante->id_item)->first();

			return view('usuario.formulario_apelacion',compact('postulante','persona','evaluacion','apelacion'));
        }
        else{
        	session_destroy();
        	return redirect('/');
        }
    }
    public function SalirUsuario(){
    	session_start();
        if(isset($_SESSION['postulante']))
        {
        	$postulante=$_SESSION['postulante'];
        	session_destroy();
        }
        return redirect('/');
    }

}
