<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ControllerSpdAdmin extends Controller
{
	## MODULOS USUARIO
    public function autenticar(Request $request){
    	
    	$admin="";
        $pass= hash('ripemd160',$request->pass);
        $admin = App\Usuario::where('usser', $request->user)->where('passw',$pass)->first();

        if($admin==""){
        	session_start();	
        	session_destroy();
            return back()->with('mensaje_error','Error usuario no identificado');
        }
        else
        {
        	session_start();
        	$_SESSION['usuario']=$admin;
        	
            return redirect('a691jmmk69866ef77e7b8719892ac8d64efde');// redirecciona a secion
        }

	}// funcion que autentica al usuario

	public function a691jmmk69866ef77e7b8719892ac8d64efde(){
    	session_start();
    	if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            $titulo="Panel SPD";
            $titulo2=$datos->usser;
            return view('admin.panel',compact('datos','carrera','titulo','titulo2'));
        }
    	else
        	return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    public function salir(){
    	session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            session_destroy();
        }
        return redirect('/');
    }// funcion que cierra el inicio de secion

    public function panelusuario(){
    	session_start();
    	if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::all();
            return view('admin.admin_usuario',compact('datos','permisos','carrera'));
        }
    	else
        	return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    public function formulariousuario(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::all();
            $titulo="Adicionar Usuario";
            $titulo2=$datos->usser;
            return view('admin.formulario_usuario',compact('datos','permisos','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// revisado 
    public function formulariousuariocomicion(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::all();
            $titulo="Adicionar Usuarios para la Comicion";
            $titulo2=$datos->usser;
            return view('admin.formulario_usuario_comicion',compact('datos','permisos','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// revisado

    public function formulariocomicionitem($ci){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::all();
            $comicion=DB::table('view_comicion_item')->where('ci',$ci)->first();
            $itemcom=DB::table('view_lista_item_comicion')->where('id_comicion',$comicion->id_comicion)->get();
            $titulo="Agregar Items de Convocatoria para el usuario";
            $titulo2=$datos->usser;
            return view('admin.formulario_usuario_comicion_item',compact('datos','permisos','carrera','comicion','itemcom','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// revisado


    
## MODULO USUARIOS
    public function listausuarios(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $usuario=DB::table('view_lista_usuarios')->get();
            $carrera=App\Carrera::all();
            $titulo="Lista de Usuarios";
            $titulo2=$datos->usser;   
            
            return view('listas.usuarios',compact('datos','usuario','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }
    

    public function perfil_usuario($id_usuario){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $usuario=DB::table('view_lista_usuarios')->where('id_usuario',$id_usuario)->first();
            $persona=App\Persona::findOrFail($usuario->id_persona);
            $carrera=App\Carrera::all();
            $permisos=App\Permiso::all();
            $titulo="Perfil del Usuario " .$persona->nombre." ".$persona->apellido;
            $titulo2=$datos->usser;   
            
            return view('admin.perfil_usuario',compact('datos','usuario','persona','carrera','permisos','titulo','titulo2'));
        }
        else
            return redirect('/');
    }//revisado

    public function listausuariocomicion(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $usuario=DB::table('view_prefil_comicion')->get();
            $carrera=App\Carrera::all();
            $titulo="Lista de Comiciones Evaluadoras";
            $titulo2=$datos->usser;   
            
            return view('listas.usuarios_comicion',compact('datos','usuario','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// revisado

    public function perfil_usuario_comicion($id_comicion){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $usuario=DB::table('view_prefil_comicion')->where('id_comicion',$id_comicion)->first();
            $persona=App\Persona::findOrFail($usuario->id_persona);

            $itemcom=DB::table('view_lista_item_comicion')->where('id_comicion',$id_comicion)->get();

            $carrera=App\Carrera::all();
            $permisos=App\Permiso::all();
            
            $titulo="Perfil del Usuario Comicion" .$persona->nombre." ".$persona->apellido;
            $titulo2=$datos->usser;   
            
            return view('admin.perfil_usuario_comicion',compact('datos','usuario','persona','carrera','permisos','itemcom','titulo','titulo2'));
        }
        else
            return redirect('/');
    }//revisado
    

    ##################################################
    #MODULO GESTON
    
    public function panelgestion(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::all();
            return view('admin.admin_gestion',compact('datos','permisos','carrera'));   
        }
        else
            return redirect('/');
    }
    
    public function formularioconcepto(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::all();
            $concepto=App\Concepto::all();
            $titulo="Adicionar Concepto de Convocatorias";
            $titulo2=$datos->usser;
            return view('admin.formulario_concepto',compact('datos','permisos','carrera','concepto','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }
    public function formularioevaluacion($id_carrera,$id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->where('id_carrera',$id_carrera)->first();

            $factor=App\Factoreva::where('id_carrera',$id_carrera)->where('id_convocatoria',$id_convocatoria)->get();
            $titulo="FACTORES DE EVALUACIÓN DE MÉRITOS Carrera de ". $convocatoria->carrera;
            $titulo2=$datos->usser;
            return view('admin.formulario_evaluacion',compact('datos','carrera','factor','convocatoria','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }


    #######################################################################################
    public function formularioitem($id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            //$convocatoria=App\Convocatoria::findOrFail($id);
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->first();

            $conv=App\Convocatoria::findOrFail($id_convocatoria);
            
            $item=App\Item::where('id_convocatoria',$id_convocatoria)->get();
            
            $requisito=App\Requisito::where('id_convocatoria',$id_convocatoria)->get();
            
            $carrera=App\Carrera::all();
            
            $titulo="Items y Requisitos de la Convocatoria";
            $titulo2=$datos->usser;

            return view('admin.formulario_item',compact('datos','convocatoria','conv','item','requisito','carrera','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }//revisado

    

    public function formularioitemUpdate($id_convocatoria,$id_item){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            //$convocatoria=App\Convocatoria::findOrFail($id);
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->first();
            $item=App\Item::where('id_convocatoria',$id_convocatoria)->get();
            $itemUpdate=App\Item::findOrFail($id_item);
            $carrera=App\Carrera::all();
            return view('admin.formulario_itemedit',compact('datos','convocatoria','item','itemUpdate','carrera'));   
        }
        else
            return redirect('/');
    }

    public function FormularioRequisitoUpdate($id_convocatoria,$id_requisito){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->first();
            $requisito=App\Requisito::where('id_convocatoria',$id_convocatoria)->get();
            $requisitoUpdate=App\Requisito::findOrFail($id_requisito);
            $carrera=App\Carrera::all();
            return view('admin.formulario_requisito_update',compact('datos','convocatoria','requisito','requisitoUpdate','carrera'));   
        }
        else
            return redirect('/');
    }

    public function listaconcepto(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $concepto=App\Concepto::all();
            $carrera=App\Carrera::all();
            $titulo="Lista de Conceptos para Convocatorias";
            $titulo2="Lista de Conceptos para Convocatorias";
            return view('listas.concepto',compact('datos','concepto','carrera','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

    
    

    public function BuscarPostulante(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postu = array('id_carrera'=>$request->id_carrera,'ci'=>$request->ci);
            return redirect(route('listaPostulante',$postu));
        }
        else
            return redirect('/');
    }

#MODULO POSTULANTES
    public function listaPostulante($id_carrera){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $j=0;
            
            if($datos->id_permiso<3)
                $postulante=DB::table('view_mispostulaciones')->where('id_carrera',$id_carrera)->orderBy('created_at','ASC')->get();
            else 
                $postulante=DB::table('view_mispostulaciones')->where('id_carrera',$datos->id_carrera)->orderBy('created_at','ASC')->get();

            foreach ($postulante as $value) {
                $j=$j+1;
            }
            
            $carrera=App\Carrera::all();
            foreach ($carrera as $value) {
                if($value->id==$id_carrera)
                    $nombrecarrera=$value->carrera;
            }
            $titulo="Postulantes de la Carrera de ".$nombrecarrera;
            $titulo2="Total de Postulantes : ".$j;
            return view('listas.postulante',compact('datos','postulante','carrera','nombrecarrera','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }
    public function datospostulante($ci,$fecha,$id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona="";
            $persona=App\Persona::where('ci',$ci)->where('fechanac',$fecha)->first();
            $postulante=DB::table('view_mispostulaciones')->where('id',$id)->first();
            $carrera=App\Carrera::all();
            $retorno = array('ci' =>$ci ,'fecha'=>$fecha,'id'=>$id);
            $titulo="Datos Personales";
            $titulo2=$datos->usser;

            return view('admin.postulante',compact('datos','persona','postulante','carrera','retorno','titulo','titulo2'));
        }
        else
            return redirect('/');
    }//revisado

    public function datospostulantekardex($ci,$fecha,$id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona="";
            $persona=App\Persona::where('ci',$ci)->where('fechanac',$fecha)->first();

            $postulante=DB::table('view_mispostulaciones')->where('id',$id)->first();
            
            $carrera=App\Carrera::all();

            $titulo="Datos Personales";
            $titulo2=$datos->usser;

            return view('admin.postulante_kardex',compact('datos','persona','postulante','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }


    public function aprobar($ci,$fecha,$id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=App\Postulante::findOrFail($id);
            $postulante->verificado="SI";
            $postulante->save();
            $retorno = array('ci' =>$ci ,'fecha'=>$fecha,'id'=>$id);
            return back()->with('mensaje_aprobar','El postulante fue verificado por Vicedecanato');
        }
        else
            return redirect('/');
    }
    ################################################################

    public function listacarta(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carta=App\Carta::orderBy('id','DESC')->get();
            $carrera=App\Carrera::all();
            return view('listas.carta',compact('datos','carta','carrera'));   
        }
        else
            return redirect('/');
    }

    public function listaCarrera(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            return view('listas.carrera',compact('datos','carrera'));   
        }
        else
            return redirect('/');
    }

    public function formularioTtemEvaluacion($id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            $factor=App\Factoreva::findOrFail($id);
            $itemfactor=App\Itemfactor::where('id_factor',$id)->get();
            //$itemfactor=App\Itemfactor::where('id_factor',$id);
            return view('admin.formulario_item_evaluacion',compact('datos','carrera','factor','itemfactor'));   
        }
        else
            return redirect('/');
    }

    public function listaItemFactor($id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            $factor=App\Factoreva::findOrFail($id);
            $itemfactor=App\Itemfactor::where('id_factor',$id)->get();
            //$itemfactor=App\Itemfactor::where('id_factor',$id);
            return view('listas.item_factor',compact('datos','carrera','factor','itemfactor'));   
        }
        else
            return redirect('/');
    }

    #MODULO CONVOCATORIA
    public function formularioconvocatoria(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            $concepto=App\Concepto::where('estado','1')->get();
            $titulo="Adicionar Convocatoria";
            $titulo2=$datos->usser;
            return view('admin.formulario_convocatoria',compact('datos','carrera','concepto','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

    public function listaconvocatoria($id_carrera){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            if($id_carrera=='1')
                $convocatoria=DB::table('view_convocatoriaadmin')->orderBy('fecha_ini','DESC')->get();
            else
                $convocatoria=DB::table('view_convocatoriaadmin')->where('id_carrera',$datos->id_carrera)->get();
            $carrera=App\Carrera::all();
            $titulo="Lista de Convocatorias";
            $titulo2=$datos->usser;
            return view('listas.convocatoria',compact('datos','convocatoria','carrera','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }// revisado

    public function apilistaconvocatoria($id_carrera){
        return App\Convocatoria::where('id_carrera',$id_carrera)->where('estado','2')->get();
    }
    public function apilistaitem($id_convocatoria){
        return App\Item::where('id_convocatoria',$id_convocatoria)->get();
    }
    

    
    public function PerfilConvocatoria($id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $convocatoria=App\Convocatoria::findOrFail($id);
            $concepto=App\Concepto::all();
            foreach ($concepto as $value) {
                if($value->id==$convocatoria->id_concepto)
                    $name=$value->nombre;
            }
            $carrera=App\Carrera::all();
            $titulo="Editar Convocatoria ".$convocatoria->numeroconvocatoria;
            $titulo2=$name;
            return view('admin.perfil_convocatoria',compact('datos','convocatoria','carrera','concepto','name','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

    public function formularioadditem($id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->first();
            $item=App\Item::where('id_convocatoria',$id_convocatoria)->get();
            $titulo="Agregar Item de Convocatoria ".$convocatoria->numeroconvocatoria." Carrera de ".$convocatoria->carrera;
            $titulo2=$convocatoria->nombre;
            return view('admin.formulario_additem',compact('datos','carrera','convocatoria','item','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

    public function formularioaddrequisito($id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->first();
            $requisito=App\Requisito::where('id_convocatoria',$id_convocatoria)->get();
            $titulo="Adicionar Requisitos ".$convocatoria->numeroconvocatoria;
            $titulo2=$convocatoria->nombre;
            return view('admin.formulario_addrequisito',compact('datos','carrera','convocatoria','requisito','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

    ################################################################################

    

    public function BuscarConvocatoria(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            return redirect(route('listaconvocatoria',$request->carrera));
        }
        else
            return redirect('/');
    }

    #MODULO REQUISITOS

    public function listaCarreraRequisito(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            return view('listas.carrera_requisito',compact('datos','carrera'));   
        }
        else
            return redirect('/');
    }
    
    public function formulariorequisitos($idcarrera){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $carrera=App\Carrera::all();
            foreach ($carrera as $value) {
                if($value->id==$idcarrera)
                    $namecarrera=$value->carrera;
            }
            $convocatoria=App\Convocatoria::where('id_carrera',$idcarrera)->where('estado','1')->get();
            return view('admin.formulario_requisito',compact('datos','carrera','convocatoria','namecarrera'));   
        }
        else
            return redirect('/');
    }

    public function listarequisito($id){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $requisito=DB::table('view_requisitos')->where('id_convocatoria',$id)->get();
            $carrera=App\Carrera::all();
            return view('listas.requisito',compact('datos','requisito','carrera'));   
        }
        else
            return redirect('/');
    }

#MODULO KARDEX
    public function panelkardex(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $permisos=App\Permiso::all();
            $carrera=App\Carrera::findOrFail($datos->id_carrera);
            return view('admin.admin_kardex',compact('datos','permisos','carrera'));
        }
        else
            return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    public function listaconvocatoriakardex($id_carrera,$id_concepto){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            if($id_concepto==0)
                $convocatoria=DB::table('view_convocatoriaadmin')->where('id_carrera',$id_carrera)->where('estado','2')->get();    
            else
                $convocatoria=DB::table('view_convocatoriaadmin')->where('id_carrera',$id_carrera)->where('id_concepto',$id_concepto)->where('estado','2')->get();

            $concepto=App\Concepto::all();
            $carrera=App\Carrera::findOrFail($datos->id_carrera);
            return view('listas.convocatoria_kardex',compact('datos','convocatoria','concepto','carrera'));   
        }
        else
            return redirect('/');
    }

    public function BuscarConvocatoriaKardex(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $kardex = array('id_carrera' => $datos->id_carrera,'id_concepto'=>$request->concepto);
            return redirect(route('listaconvocatoriakardex',$kardex));
        }
        else
            return redirect('/');
    }

    public function listaPostulanteKardex($id_carrera, $id_convocatoria,$ci,$cumple){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $j=0;
            $postulante=DB::table('view_postulaciones_kardex')->where('id_carrera',$id_carrera)->where('id_convocatoria',$id_convocatoria)->where('verificado','SI')->orderBy('cumple','DESC')->get();
            if($ci!=0)
            {   
                $ci='%'.$ci.'%';
                $postulante=DB::table('view_postulaciones_kardex')->where('id_carrera',$id_carrera)->where('id_convocatoria',$id_convocatoria)->where('verificado','SI')->orderBy('cumple','DESC')->where('ci','like',$ci)->get();
            }
            if($cumple=='Cumple')
            {
                $postulante=DB::table('view_postulaciones_kardex')->where('id_carrera',$id_carrera)->where('id_convocatoria',$id_convocatoria)->where('verificado','SI')->where('cumple','Cumple')->get();   
            }
            foreach ($postulante as $value) {
                $j=$j+1;
            }
            $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
            $carrera=App\Carrera::findOrFail($datos->id_carrera);
            return view('listas.postulante_kardex',compact('datos','postulante','carrera','j','convocatoria'));   
        }
        else
            return redirect('/');
    }

#MODULO PERFIL
    public function perfil(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona=App\Persona::where('ci',$datos->ci)->first();
            $carrera=App\Carrera::all();
            $titulo="Perfil de Usuario";
            $titulo2="";
            return view('admin.perfil',compact('datos','persona','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    public function formulariopasswordupdate(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona=App\Persona::where('ci',$datos->ci)->first();
            $carrera=App\Carrera::all();
            $titulo="Actualizar Contraseña";
            $titulo2="";
            return view('admin.formulario_password_update',compact('datos','persona','carrera','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    #MODULO REVISOR 
    public function BuscarPostulanteKardex(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postu = array('id_carrera'=>$request->id_carrera,'id_convocatoria'=>$request->id_convocatoria,'ci'=>$request->ci,'cumple'=>0);
            return redirect(route('listaPostulanteKardex',$postu));
        }
        else
            return redirect('/');
    }
    public function datospostulanteRevisor($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=DB::table('view_mispostulaciones')->where('id',$id_postulante)->first();
            $evaluacion="";
            if($postulante->puntos>0)
                $evaluacion=App\Evaluacion::where('id_postulante',$id_postulante)->get();

            $persona=App\Persona::where('ci',$postulante->ci)->first();

            $convocatorias=DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();
            $convocatoria=App\Convocatoria::findOrFail($postulante->id_convocatoria);

            $factor=App\Factoreva::where('id_carrera',$postulante->id_carrera)->where('id_convocatoria',$convocatoria->id)->where('id_concepto',$convocatoria->id_concepto)->get();

            $id_carrera=$postulante->id_carrera;

            $i=0;
            foreach ($factor as $value) {
                $i=$i+1;
            }

            if($i<2){
                if($convocatoria->id_concepto>3 and $convocatoria->id_concepto<8)
                    $factor=App\Factoreva::where('id_carrera',1)->where('id_concepto',5)->get();
                else
                    $factor=App\Factoreva::where('id_carrera',1)->where('id_concepto',1)->get();
                $id_carrera=1;
            }

            $itemcom=App\Itemcom::where('id_convocatoria',$postulante->id_convocatoria)->where('id_item',$postulante->id_item)->where('id_comicion',$datos->id)->first();
            $titulo="Evaluacion";
            $titulo2="";

            return view('admin.postulante_revisor',compact('datos','persona','postulante','factor','evaluacion','convocatoria','convocatorias','id_carrera','itemcom','titulo','titulo2'));
        }
        else
            return redirect('/');
    }

    #MODULO COMICION 
    public function autenticar_comicion(Request $request){
        
        $comicion="";
        $pass= hash('ripemd160',$request->pass);
        $comicion = App\Comicion::where('usser', $request->user)->where('passw',$pass)->first();
        if($comicion==""){
            session_start();    
            session_destroy();
            return back()->with('mensaje_error','Error usuario no identificado en la comicion evaluadora');
        }
        else
        {
            session_start();
            $_SESSION['usuario']=$comicion;
            return redirect('panel_comicion');// redirecciona a secion
        }

    }// funcion que autentica al usuario

    public function panel_comicion(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $convocatorias=DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();

            $items=DB::table('view_lista_item_comicion')->where('id_comicion',$datos->id)->orderBy('id_item','DESC')->get();

            $titulo="Convocatorias Habilitadas para el Usuario";
            $titulo2=$datos->usser;
            return view ('admin.panel_comicion',compact('datos','convocatorias','titulo','titulo2','items'));    
        }
        else
            return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    public function formulariopasswordupdatec(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $persona=App\Persona::where('ci',$datos->ci)->first();
            $convocatorias=DB::table('view_data_comicion')->where('id_comicion',$datos->id)->get();
            $titulo2=$datos->usser;
            $titulo="Actualizar Contraseña";

            return view('admin.formulario_password_update_c',compact('datos','persona','convocatorias','titulo','titulo2'));
        }
        else
            return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    public function listaItems($id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            $convocatorias=DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();
            
            $convocatoria=DB::table('view_convocatoria')->where('id',$id_convocatoria)->first();
            
            $item=DB::table('view_lista_item_comicion')->where('id_convocatoria',$id_convocatoria)->where('id_comicion',$datos->id)->orderBy('id_item','ASC')->get();

            $titulo="Items de la Convocatoria ".$convocatoria->numeroconvocatoria;
            $titulo2="Carrera ".$convocatoria->carrera;
            return view('listas.item_comicion',compact('datos','convocatorias','convocatoria','item','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

    public function listaPostulantes($id_convocatoria,$id_item){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=DB::table('view_postulantes_comicion')->where('id_comicion',$datos->id)->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->groupBy('id_convocatoria','id_comicion','id_postulante','id_item','id_persona')->orderBy('puntos','DESC')->get();

            $convocatorias =DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();
            $convocatoria="";
            foreach ($convocatorias as $value) {
                if($value->id_convocatoria==$id_convocatoria)
                    $convocatoria=$value;
            }

            $item=App\Item::findOrFail($id_item);

            $apelacion=App\Apelacion::where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->get();
            
            $activar=0;
            foreach ($apelacion as $value) {
                $activar=$activar+1;
            }

            $ap=0;
            $itemcom=App\Itemcom::where('id_comicion',$datos->id)->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->get();
            foreach ($itemcom as $value) {
                if($value->permiso=='5')
                    $ap=$ap+1;
            }
            $titulo="Postulantes de la Convocatoria ".$convocatoria->numeroconvocatoria;
            $titulo2=$convocatoria->nombre;
            return view('listas.postulante_comicion',compact('datos','postulante','convocatorias','item','activar','ap','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }
    public function BuscarPostulantes(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $uri = array('id_convocatoria'=>$request->id_convocatoria,'ci'=>$request->ci);
            return redirect(route('listaPostulantes',$uri));
        }
        else
            return redirect('/');
    }
    public function datospostulantecomicion($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {

            $datos=$_SESSION['usuario'];
            $convocatorias =DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();
            $postulante=DB::table('view_postulantes_comicion')->where('id_postulante',$id_postulante)->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion','id_postulante','id_item','id_persona')->first();
            $persona=App\Persona::where('id',$postulante->id_persona)->first();

            if($postulante->cumple=='s')
                $requisito=App\Requisito::where('id_convocatoria',$postulante->id_convocatoria)->get();
            else
                $requisito=DB::table('view_requisito_postulante')->where('id_convocatoria',$postulante->id_convocatoria)->where('id_postulante',$id_postulante)->get();

            $itemcom=App\Itemcom::where('id_convocatoria',$postulante->id_convocatoria)->where('id_item',$postulante->id_item)->where('id_comicion',$datos->id)->first();

            $titulo="Verificacion de Requisitos Convocatoria ".$postulante->numeroconvocatoria;
            $titulo2="Datos Personales";

            return view('admin.postulante_comicion',compact('datos','convocatorias','postulante','persona','requisito','itemcom','titulo','titulo2'));
        }
        else
            return redirect('/');
    }

    public function datospostulanteRevisorApelacion($id_postulante){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=DB::table('view_mispostulaciones')->where('id',$id_postulante)->first();
            
            $evaluacion=App\Evaluacion::where('id_postulante',$id_postulante)->get();

            $persona=App\Persona::where('ci',$postulante->ci)->first();

            $convocatorias=DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();
            $convocatoria=App\Convocatoria::findOrFail($postulante->id_convocatoria);

            $itemcom=App\Itemcom::where('id_convocatoria',$postulante->id_convocatoria)->where('id_item',$postulante->id_item)->where('id_comicion',$datos->id)->first();
            $apelacion=App\Apelacion::where('id_postulante',$id_postulante)->where('id_convocatoria',$postulante->id_convocatoria)->first();

            $titulo="";
            $titulo2="";

            return view('admin.postulante_revisor_apelacion',compact('datos','persona','postulante','evaluacion','convocatoria','convocatorias','itemcom','apelacion','titulo','titulo2'));
        }
        else
            return redirect('/');
    }

    public function ganadores($id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $postulante=DB::table('view_postulantes_comicion')->where('id_convocatoria',$id_convocatoria)->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion','id_postulante','id_item','id_persona')->orderBy('id_item','ASC')->orderBy('puntos','DESC')->get();
            
            $lista=DB::table('view_lista_item_comicion')->where('id_convocatoria',$id_convocatoria)->where('id_comicion',$datos->id)->orderBy('id_item','ASC')->get();

            $convocatorias =DB::table('view_data_comicion')->where('id_comicion',$datos->id)->groupBy('id_convocatoria','id_comicion')->get();
            $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
            return view('listas.postulante_habilitado',compact('datos','postulante','convocatorias','convocatoria','lista'));   
        }
        else
            return redirect('/');
    }

    #MODULO KARDEX 
    public function listaItem($id_convocatoria){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $convocatoria=DB::table('view_convocatoriaadmin')->where('id_convocatoria',$id_convocatoria)->first();
            $conv=App\Convocatoria::findOrFail($id_convocatoria);
            
            $item=App\Item::where('id_convocatoria',$id_convocatoria)->get();
            $carrera=App\Carrera::all();
            
            $titulo="Items de la Convocatoria";
            $titulo2=$datos->usser;

            return view('listas.item',compact('datos','convocatoria','conv','item','carrera','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }//revisado

    public function listaPostulantesKardex($id_convocatoria,$id_item){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            if($datos->id_permiso<'3')
                $postulante=DB::table('view_postulaciones_kardex')->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->get();
            else
                $postulante=DB::table('view_postulaciones_kardex')->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->where('id_carrera',$datos->id_carrera)->get();

            $carrera=App\Carrera::all();
            
            $item=App\Item::findOrFail($id_item);

            $apelacion=App\Apelacion::where('id_convocatoria',$id_convocatoria)->get();
            
            $titulo="Postulantes de la Convocatoria ";
            $titulo2=$datos->usser;

            return view('listas.postulante_kardex',compact('datos','postulante','carrera','item','titulo','titulo2'));   
        }
        else
            return redirect('/');
    }

}
