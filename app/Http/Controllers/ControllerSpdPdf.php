<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ControllerSpdPdf extends Controller
{
    //
    #### MODULO POSTULANTE
    public function postulantePdf($id){
        
        $postulante=DB::table('view_mispostulaciones')->where('id',$id)->first();
        $convocatoria=DB::table('view_convocatoria')->where('id',$postulante->id_convocatoria)->first();
        
        $nameqr=$postulante->codex.'.png';

        $file=public_path('qr/'.$nameqr);
        //\QRCode::text($mensage)->setOutfile($file)->png();
        \QRCode::meCard($postulante->ci,$postulante->fecha,$postulante->postulante,$postulante->apellido, $postulante->correo,substr($postulante->codex, 0,9),$postulante->carrera,$postulante->sigla,$postulante->numero,'https://svfhce.umsa.bo/sv/spd/postulacion/'.$postulante->ci.'/'.$postulante->fecha)->setOutfile($file)->png();

        $admin='jamercru.png';

        $file=public_path('qr/'.$admin);
        //\QRCode::text($mensage)->setOutfile($file)->png();
        \QRCode::Url('https://svfhce.umsa.bo/sv/spd/datospostulante/'.$postulante->ci.'/'.$postulante->fecha.'/'.$postulante->id)->setOutfile($file)->png();
        
        $pdfpostulante=\PDF::loadView('pdf.pdfpostulante',compact('postulante','convocatoria','nameqr','admin'));

        $name='ConprobantePostulo'.$id.$postulante->ci.'.pdf';
        //return view('pdf.pdfpostulante',compact('postulante','convocatoria','nameqr'));
        return $pdfpostulante->download($name);
    }

    #### MODULO COMICION

    public function pdflistaitempostulantenota($id_convocatoria,$id_item,$id_comicion){
        $postulante=DB::table('view_postulantes_comicion')->where('id_comicion',$id_comicion)->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->groupBy('id_convocatoria','id_comicion','id_postulante','id_item','id_persona')->orderBy('puntos','DESC')->get();
        return response()->json($postulante);
        $persona=DB::table('view_prefil_comicion')->where('id_comicion',$id_comicion)->first();
        
        $item=App\Item::findOrFail($id_item);
        $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
        $concepto=App\Concepto::findOrFail($convocatoria->id_concepto);
        $carrera=App\Carrera::findOrFail($convocatoria->id_carrera);
        $firma=DB::table('view_lista_firma')->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->orderBy('permiso','DESC')->get();

        $nameqr='james'.$id_comicion.'.png';

        $file=public_path('qr/'.$nameqr);
        \QRCode::text('Elavorado por '.$persona->nombre.' '.$persona->apellido.': Materia '.$item->materia.': Convocatoria '.$convocatoria->numeroconvocatoria)->setOutfile($file)->png();
        //\QRCode::meCard('','','','','','','','','','')->setOutfile($file)->png();

        
        $pdflistaitempostulante=\PDF::loadView('pdf.pdf_lista_item_postulante',compact('postulante','nameqr','persona','item','convocatoria','carrera','concepto','firma'))->setPaper('letter', 'landscape');;

        $name='ConprobantedeEvaluacion'.$id_convocatoria.'.pdf';
        //return view('pdf.pdf_lista_item_postulante',compact('postulante','nameqr','persona','item','convocatoria','carrera','concepto','firma'));
        return $pdflistaitempostulante->download($name);
    }



    public function pdflistaitempostulante($id_convocatoria,$id_item,$id_comicion){
        
        $postulante=DB::table('view_postulantes_comicion')->where('id_comicion',$id_comicion)->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->groupBy('id_convocatoria','id_comicion','id_postulante','id_item','id_persona')->orderBy('puntos','DESC')->get();

        $persona=DB::table('view_prefil_comicion')->where('id_comicion',$id_comicion)->first();
        $item=App\Item::findOrFail($id_item);
        $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
        $concepto=App\Concepto::findOrFail($convocatoria->id_concepto);
        $carrera=App\Carrera::findOrFail($convocatoria->id_carrera);
        $firma=DB::table('view_lista_firma')->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->orderBy('permiso','DESC')->get();

        $nameqr='james'.$id_comicion.'.png';

        $file=public_path('qr/'.$nameqr);
        \QRCode::text('Elavorado por '.$persona->nombre.' '.$persona->apellido.': Materia '.$item->materia.': Convocatoria '.$convocatoria->numeroconvocatoria)->setOutfile($file)->png();
        //\QRCode::meCard('','','','','','','','','','')->setOutfile($file)->png();

        
        $pdflistaitempostulante=\PDF::loadView('pdf.pdf_lista_item_postulante',compact('postulante','nameqr','persona','item','convocatoria','carrera','concepto','firma'))->setPaper('letter', 'landscape');;

        $name='ConprobantedeEvaluacion'.$id_convocatoria.'.pdf';
        //return view('pdf.pdf_lista_item_postulante',compact('postulante','nameqr','persona','item','convocatoria','carrera','concepto','firma'));
        return $pdflistaitempostulante->download($name);
    }

    public function pdflistaconvocatoriapostulante($id_convocatoria,$id_comicion){
        
        $postulante=DB::table('view_postulantes_comicion')->where('id_comicion',$id_comicion)->where('id_convocatoria',$id_convocatoria)->groupBy('id_convocatoria','id_comicion','id_postulante','id_item','id_persona')->orderBy('puntos','DESC')->get();

        $lista=DB::table('view_lista_item_comicion')->where('id_convocatoria',$id_convocatoria)->where('id_comicion',$id_comicion)->orderBy('id_item','ASC')->get();

        $persona=DB::table('view_prefil_comicion')->where('id_comicion',$id_comicion)->first();
        
        $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
        $concepto=App\Concepto::findOrFail($convocatoria->id_concepto);
        $carrera=App\Carrera::findOrFail($convocatoria->id_carrera);
        $firma=DB::table('view_lista_firma2')->where('id_convocatoria',$id_convocatoria)->groupBy('id_comicion','id_convocatoria','ci','nombre','apellido','correo')->get();

        $nameqr='james'.$id_comicion.'.png';

        $file=public_path('qr/'.$nameqr);
        \QRCode::text('Elavorado por '.$persona->nombre.' '.$persona->apellido.': Convocatoria '.$convocatoria->numeroconvocatoria)->setOutfile($file)->png();
        //\QRCode::meCard('','','','','','','','','','')->setOutfile($file)->png();

        
        $pdflistaconvpostulante=\PDF::loadView('pdf.pdf_lista_conv_postulante',compact('postulante','nameqr','persona','lista','convocatoria','carrera','concepto','firma'))->setPaper('letter', 'landscape');;

        $name='CoLitdeEv'.$id_comicion.'aluacion'.$id_convocatoria.'.pdf';
        //return view('pdf.pdf_lista_conv_postulante',compact('postulante','nameqr','persona','lista','convocatoria','carrera','concepto','firma'));
        return $pdflistaconvpostulante->download($name);
    }

    # MODULO KARDEX
    public function pdflistaitempostulantekardex($id_convocatoria,$id_item,$id_usuario){
        
        $postulante=DB::table('view_postulaciones_kardex')->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->orderBy('puntos','DESC')->get();

        $usuario=App\Usuario::findOrFail($id_usuario);

        $persona=App\Persona::where('ci',$usuario->ci)->first();

        $item=App\Item::findOrFail($id_item);
        $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
        $concepto=App\Concepto::findOrFail($convocatoria->id_concepto);
        $carrera=App\Carrera::findOrFail($convocatoria->id_carrera);
        
        $firma=DB::table('view_lista_firma')->where('id_convocatoria',$id_convocatoria)->where('id_item',$id_item)->orderBy('permiso','DESC')->get();

        $nameqr='james'.$id_usuario.'.png';

        $file=public_path('qr/'.$nameqr);
        \QRCode::text('Elavorado por '.$persona->nombre.' '.$persona->apellido.': Materia '.$item->materia.': Convocatoria '.$convocatoria->numeroconvocatoria)->setOutfile($file)->png();
        //\QRCode::meCard('','','','','','','','','','')->setOutfile($file)->png();

        
        $pdflistaitempostulantekardex=\PDF::loadView('pdf.pdf_lista_item_postulante_kardex',compact('postulante','nameqr','persona','item','convocatoria','carrera','concepto','firma'))->setPaper('letter', 'landscape');;

        $name='ConprobantedeEvaluacion'.$id_convocatoria.'.pdf';
        //return view('pdf.pdf_lista_item_postulante_kardex',compact('postulante','nameqr','persona','item','convocatoria','carrera','concepto','firma'));
        return $pdflistaitempostulantekardex->download($name);
    }

    public function pdflistaconvocatoriapostulantekardex($id_convocatoria,$id_usuario){
        
        $postulante=DB::table('view_postulaciones_kardex')->where('id_convocatoria',$id_convocatoria)->orderBy('puntos','DESC')->get();

        $lista=DB::table('view_lista_item')->where('id_convocatoria',$id_convocatoria)->orderBy('id_item','ASC')->get();

        $usuario=App\Usuario::findOrFail($id_usuario);

        $persona=App\Persona::where('ci',$usuario->ci)->first();
        
        $convocatoria=App\Convocatoria::findOrFail($id_convocatoria);
        $concepto=App\Concepto::findOrFail($convocatoria->id_concepto);
        $carrera=App\Carrera::findOrFail($convocatoria->id_carrera);

        $firma=DB::table('view_lista_firma2')->where('id_convocatoria',$id_convocatoria)->groupBy('id_comicion','id_convocatoria','ci','nombre','apellido','correo')->get();

        $nameqr='james'.$id_usuario.'.png';

        $file=public_path('qr/'.$nameqr);
        \QRCode::text('Elavorado por '.$persona->nombre.' '.$persona->apellido.': Convocatoria '.$convocatoria->numeroconvocatoria)->setOutfile($file)->png();
        //\QRCode::meCard('','','','','','','','','','')->setOutfile($file)->png();

        
        $pdflistaconvpostulantekardex=\PDF::loadView('pdf.pdf_lista_kardex_postulante',compact('postulante','nameqr','persona','lista','convocatoria','carrera','concepto','firma'))->setPaper('letter', 'landscape');;

        $name='CoLitdeEv'.$id_usuario.'aluacion'.$id_convocatoria.'.pdf';
        //return view('pdf.pdf_lista_kardex_postulante',compact('postulante','nameqr','persona','lista','convocatoria','carrera','concepto','firma'));
        return $pdflistaconvpostulantekardex->download($name);
    }
}
