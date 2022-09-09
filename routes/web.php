<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ControllerSpdRoute@index')->name('index');

###################################################
##MODULO USUARIO
Route::get('login','ControllerSpdRoute@login')->name('login');
Route::post('autenticar','ControllerSpdAdmin@autenticar')->name('autenticar');
Route::get('a691jmmk69866ef77e7b8719892ac8d64efde','ControllerSpdAdmin@a691jmmk69866ef77e7b8719892ac8d64efde')->name('a691jmmk69866ef77e7b8719892ac8d64efde');
Route::get('salir','ControllerSpdAdmin@salir')->name('salir');

Route::get('panelusuario','ControllerSpdAdmin@panelusuario')->name('panelusuario');

Route::get('formulariousuario','ControllerSpdAdmin@formulariousuario')->name('formulariousuario');
Route::post('AddUsuario','ControllerSpdAdd@AddUsuario')->name('AddUsuario');
Route::get('listausuarios','ControllerSpdAdmin@listausuarios')->name('listausuarios');
Route::get('perfil_usuario/{id_usuario}','ControllerSpdAdmin@perfil_usuario')->name('perfil_usuario');
Route::get('perfil_usuario_comicion/{id_comicion}','ControllerSpdAdmin@perfil_usuario_comicion')->name('perfil_usuario_comicion');

Route::get('formulariousuariocomicion','ControllerSpdAdmin@formulariousuariocomicion')->name('formulariousuariocomicion');
Route::post('AddComicion','ControllerSpdAdd@AddComicion')->name('AddComicion');

Route::get('formulariocomicionitem/{ci}','ControllerSpdAdmin@formulariocomicionitem')->name('formulariocomicionitem');
Route::post('AddItemCom','ControllerSpdAdd@AddItemCom')->name('AddItemCom');
Route::get('listausuariocomicion','ControllerSpdAdmin@listausuariocomicion')->name('listausuariocomicion');

Route::get('habilitado_carrera','ControllerSpdRoute@habilitado_carrera')->name('habilitado_carrera');
Route::get('lista_habilitado/{id_carrera}/{ci}','ControllerSpdRoute@lista_habilitado')->name('lista_habilitado');
Route::post('BuscarPostulantesLista','ControllerSpdRoute@BuscarPostulantesLista')->name('BuscarPostulantesLista');
Route::get('formularioapleacionidentificar/{id_postulante}','ControllerSpdRoute@formularioapleacionidentificar')->name('formularioapleacionidentificar');
Route::post('IdentificarApelacion','ControllerSpdRoute@IdentificarApelacion')->name('IdentificarApelacion');

Route::post('UpdateApelacion','ControllerSpdUpdate@UpdateApelacion')->name('UpdateApelacion');
Route::get('formularioApelacion','ControllerSpdRoute@formularioApelacion')->name('formularioApelacion');
Route::get('SalirUsuario','ControllerSpdRoute@SalirUsuario')->name('SalirUsuario');
Route::put('UpdateUsuario','ControllerSpdUpdate@UpdateUsuario')->name('UpdateUsuario');
Route::get('UpdatePassuser/{id_usuario}','ControllerSpdUpdate@UpdatePassuser')->name('UpdatePassuser');
Route::get('UpdatePassuserC/{id_comicion}','ControllerSpdUpdate@UpdatePassuserC')->name('UpdatePassuserC');
Route::put('UpdateUsuarioC','ControllerSpdUpdate@UpdateUsuarioC')->name('UpdateUsuarioC');

Route::get('UpdatePermisoR/{id_itemcon}','ControllerSpdUpdate@UpdatePermisoR')->name('UpdatePermisoR');
Route::get('UpdatePermisoE/{id_itemcon}','ControllerSpdUpdate@UpdatePermisoE')->name('UpdatePermisoE');

####################################################
#MODULO DE GESTION
Route::get('panelgestion','ControllerSpdAdmin@panelgestion')->name('panelgestion');
Route::get('formularioconvocatoria','ControllerSpdAdmin@formularioconvocatoria')->name('formularioconvocatoria');
Route::get('formularioconcepto','ControllerSpdAdmin@formularioconcepto')->name('formularioconcepto');
Route::post('AddConcepto','ControllerSpdAdd@AddConcepto')->name('AddConcepto');
Route::get('listaconcepto','ControllerSpdAdmin@listaconcepto')->name('listaconcepto');
Route::post('AddItem','ControllerSpdAdd@AddItem')->name('AddItem');

Route::post('UpdateItem','ControllerSpdUpdate@UpdateItem')->name('UpdateItem');

Route::get('listaPostulante/{id_carrera}','ControllerSpdAdmin@listaPostulante')->name('listaPostulante');
Route::post('BuscarPostulante','ControllerSpdAdmin@BuscarPostulante')->name('BuscarPostulante');
Route::get('datospostulante/{ci}/{fecha}/{id}','ControllerSpdAdmin@datospostulante')->name('datospostulante');
Route::get('aprobar/{ci}/{fecha}/{id}','ControllerSpdAdmin@aprobar')->name('aprobar');

Route::get('listacarta','ControllerSpdAdmin@listacarta')->name('listacarta');
Route::post('AddCarta','ControllerSpdAdd@AddCarta')->name('AddCarta');

Route::get('listaCarrera','ControllerSpdAdmin@listaCarrera')->name('listaCarrera');

Route::get('formularioevaluacion/{id_carrera}/{id_convocatoria}','ControllerSpdAdmin@formularioevaluacion')->name('formularioevaluacion');
Route::post('AddFactor','ControllerSpdAdd@AddFactor')->name('AddFactor');

Route::get('formularioTtemEvaluacion/{id}','ControllerSpdAdmin@formularioTtemEvaluacion')->name('formularioTtemEvaluacion');
Route::post('AddItemFactor','ControllerSpdAdd@AddItemFactor')->name('AddItemFactor');
Route::get('listaItemFactor/{id}','ControllerSpdAdmin@listaItemFactor')->name('listaItemFactor');

#MODULO CONVOCATORIA
Route::get('formularioitem/{id_convocatoria}','ControllerSpdAdmin@formularioitem')->name('formularioitem');
Route::get('listaconvocatoria/{id_carrera}','ControllerSpdAdmin@listaconvocatoria')->name('listaconvocatoria');
Route::post('AddConvocatoria','ControllerSpdAdd@AddConvocatoria')->name('AddConvocatoria');
Route::get('PerfilConvocatoria/{id}','ControllerSpdAdmin@PerfilConvocatoria')->name('PerfilConvocatoria');
Route::post('UpdateConvocatoria','ControllerSpdUpdate@UpdateConvocatoria')->name('UpdateConvocatoria');
Route::post('UpdatePdf','ControllerSpdUpdate@UpdatePdf')->name('UpdatePdf');

Route::get('formularioadditem/{id_convocatoria}','ControllerSpdAdmin@formularioadditem')->name('formularioadditem');
Route::get('formularioaddrequisito/{id_convocatoria}','ControllerSpdAdmin@formularioaddrequisito')->name('formularioaddrequisito');
Route::get('formularioitemUpdate/{id_convocatoria}/{id_item}','ControllerSpdAdmin@formularioitemUpdate')->name('formularioitemUpdate');
Route::get('FormularioRequisitoUpdate/{id_convocatoria}/{id_requisito}','ControllerSpdAdmin@FormularioRequisitoUpdate')->name('FormularioRequisitoUpdate');
Route::post('UpdateRequisito','ControllerSpdUpdate@UpdateRequisito')->name('UpdateRequisito');
Route::post('BuscarConvocatoria','ControllerSpdAdmin@BuscarConvocatoria')->name('BuscarConvocatoria');


#MODULO REQUISITOS
Route::get('listaCarreraRequisito','ControllerSpdAdmin@listaCarreraRequisito')->name('listaCarreraRequisito');
Route::get('formulariorequisitos/{idcarrera}','ControllerSpdAdmin@formulariorequisitos')->name('formulariorequisitos');
Route::post('AddRequisito','ControllerSpdAdd@AddRequisito')->name('AddRequisito');
Route::get('listarequisito/{id}','ControllerSpdAdmin@listarequisito')->name('listarequisito');


##############################################################################
### MODULO POSTULANTE
Route::get('formularioidentificar','ControllerSpdRoute@formularioidentificar')->name('formularioidentificar');
Route::post('identificar','ControllerSpdRoute@identificar')->name('identificar');
Route::get('formulariodatos/{ci}/{fecha}','ControllerSpdRoute@formulariodatos')->name('formulariodatos');
Route::get('formulariocarrera/{ci}/{fecha}','ControllerSpdRoute@formulariocarrera')->name('formulariocarrera');
Route::get('formulariopostulo/{ci}/{fecha}/{carrera}','ControllerSpdRoute@formulariopostulo')->name('formulariopostulo');

Route::post('AddPostulante','ControllerSpdRoute@AddPostulante')->name('AddPostulante');
Route::get('formularioitemusuario/{ci}/{fecha}/{id_convocatoria}/{id_carrera}','ControllerSpdRoute@formularioitemusuario')->name('formularioitemusuario');
Route::post('AddFolder','ControllerSpdRoute@AddFolder')->name('AddFolder');
Route::get('postulacion/{ci}/{fecha}','ControllerSpdRoute@postulacion')->name('postulacion');
Route::get('postulantePdf/{id}','ControllerSpdPdf@postulantePdf')->name('postulantePdf');

Route::put('UpdateFolder','ControllerSpdUpdate@UpdateFolder')->name('UpdateFolder');



Route::get('convocatorias/{id_carrera}','ControllerSpdRoute@convocatorias')->name('convocatorias');
Route::post('BuscarConvocatoriaUsuario','ControllerSpdRoute@BuscarConvocatoriaUsuario')->name('BuscarConvocatoriaUsuario');
Route::get('item/{id}','ControllerSpdRoute@item')->name('item');
Route::get('tutorial','ControllerSpdRoute@tutorial')->name('tutorial');

#MODULO KARDEX
Route::get('panelkardex','ControllerSpdAdmin@panelkardex')->name('panelkardex');
Route::get('listaconvocatoriakardex/{id_carrera}/{id_concepto}','ControllerSpdAdmin@listaconvocatoriakardex')->name('listaconvocatoriakardex');
Route::post('BuscarConvocatoriaKardex','ControllerSpdAdmin@BuscarConvocatoriaKardex')->name('BuscarConvocatoriaKardex');
Route::get('listaPostulanteKardex/{id_carrera}/{id_convocatoria}/{ci}/{cumple}','ControllerSpdAdmin@listaPostulanteKardex')->name('listaPostulanteKardex');

Route::post('requisitosKardex','ControllerSpdUpdate@requisitosKardex')->name('requisitosKardex');
Route::post('BuscarPostulanteKardex','ControllerSpdAdmin@BuscarPostulanteKardex')->name('BuscarPostulanteKardex');


Route::get('listaItem/{id_convocatoria}','ControllerSpdAdmin@listaItem')->name('listaItem');
Route::get('listaPostulantesKardex/{id_convocatoria}/{id_item}','ControllerSpdAdmin@listaPostulantesKardex')->name('listaPostulantesKardex');

Route::get('datospostulantekardex/{ci}/{fecha}/{id}','ControllerSpdAdmin@datospostulantekardex')->name('datospostulantekardex');
Route::get('UpdateFisicoOk/{id_postulante}','ControllerSpdUpdate@UpdateFisicoOk')->name('UpdateFisicoOk');
Route::get('UpdateFisicoDonw/{id_postulante}','ControllerSpdUpdate@UpdateFisicoDonw')->name('UpdateFisicoDonw');
Route::get('pdflistaitempostulantekardex/{id_convocatoria}/{id_item}/{id_usuario}','ControllerSpdPdf@pdflistaitempostulantekardex')->name('pdflistaitempostulantekardex');
Route::get('pdflistaconvocatoriapostulantekardex/{id_convocatoria}/{id_usuario}','ControllerSpdPdf@pdflistaconvocatoriapostulantekardex')->name('pdflistaconvocatoriapostulantekardex');






#MODULO PERFIL
Route::get('perfil','ControllerSpdAdmin@perfil')->name('perfil');
Route::get('formulariopasswordupdate','ControllerSpdAdmin@formulariopasswordupdate')->name('formulariopasswordupdate');
Route::put('UpdatePassword','ControllerSpdUpdate@UpdatePassword')->name('UpdatePassword');

Route::get('datospostulanteRevisor/{id_postulante}','ControllerSpdAdmin@datospostulanteRevisor')->name('datospostulanteRevisor');

Route::post('AddPuntos','ControllerSpdAdd@AddPuntos')->name('AddPuntos');
Route::post('UpdatePuntos','ControllerSpdUpdate@UpdatePuntos')->name('UpdatePuntos');


#MODULO COMICION
Route::get('login_comision','ControllerSpdRoute@login_comision')->name('login_comision');
Route::post('autenticar_comicion','ControllerSpdAdmin@autenticar_comicion')->name('autenticar_comicion');
Route::get('panel_comicion','ControllerSpdAdmin@panel_comicion')->name('panel_comicion');
Route::get('formulariopasswordupdatec','ControllerSpdAdmin@formulariopasswordupdatec')->name('formulariopasswordupdatec');
Route::put('UpdatePasswordc','ControllerSpdUpdate@UpdatePasswordc')->name('UpdatePasswordc');
Route::get('listaItems/{id_convocatoria}','ControllerSpdAdmin@listaItems')->name('listaItems');
Route::get('listaPostulantes/{id_convocatoria}/{id_item}','ControllerSpdAdmin@listaPostulantes')->name('listaPostulantes');

Route::post('BuscarPostulantes','ControllerSpdAdmin@BuscarPostulantes')->name('BuscarPostulantes');
Route::get('datospostulantecomicion/{id_postulante}','ControllerSpdAdmin@datospostulantecomicion')->name('datospostulantecomicion');
Route::post('requisitosComicion','ControllerSpdUpdate@requisitosComicion')->name('requisitosComicion');
Route::get('AddApelacion/{id_convocatoria}/{id_item}','ControllerSpdAdd@AddApelacion')->name('AddApelacion');
Route::post('UpdateApelacionComicion','ControllerSpdUpdate@UpdateApelacionComicion')->name('UpdateApelacionComicion');

Route::get('datospostulanteRevisorApelacion/{id_postulante}','ControllerSpdAdmin@datospostulanteRevisorApelacion')->name('datospostulanteRevisorApelacion');

Route::get('ganadores/{id_convocatoria}','ControllerSpdAdmin@ganadores')->name('ganadores');
Route::get('UpdateGanador/{id_postulante}','ControllerSpdUpdate@UpdateGanador')->name('UpdateGanador');
Route::get('UpdatePerdedor/{id_postulante}','ControllerSpdUpdate@UpdatePerdedor')->name('UpdatePerdedor');
Route::get('pdflistaitempostulante/{id_convocatoria}/{id_item}/{id_comicion}','ControllerSpdPdf@pdflistaitempostulante')->name('pdflistaitempostulante');
Route::get('pdflistaitempostulantenota/{id_convocatoria}/{id_item}/{id_comicion}','ControllerSpdPdf@pdflistaitempostulantenota')->name('pdflistaitempostulantenota');
Route::get('pdflistaconvocatoriapostulante/{id_convocatoria}/{id_comicion}','ControllerSpdPdf@pdflistaconvocatoriapostulante')->name('pdflistaconvocatoriapostulante');


