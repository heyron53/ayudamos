<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\BaneoController;
use App\Http\Controllers\FicheroController;

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

//***LOGIN***
//Primera pantalla, pantalla login de inicio de sesión, se envia a POST(login)
Route::get('/',function(){return view('login.login');});
Route::post('inicioSesion',[UsuarioController::class,'searchUser']);
Route::get('crearUsuario',[UsuarioController::class,'create']);
Route::get('crearModerador',[UsuarioController::class,'createModerator']);
Route::get('crearAdmin',[UsuarioController::class,'createAdmin']);
Route::post('almacenarUsuario',[UsuarioController::class,'store']);

//***MAIN***
Route::get('perfil',[UsuarioController::class,'profile']);
Route::get('listarConsultas',[ConsultaController::class,'index']);
Route::post('consultasUsu',[ConsultaController::class,'consultasUsuario']);
Route::get('crearConsulta',[ConsultaController::class,'create']);
Route::post('almacenarConsulta',[ConsultaController::class,'store']);
Route::post('cerrarSesion',[UsuarioController::class,'logout']);
Route::get('info',function(){ return view('main.informacion');});
Route::post('listadoPorCursos',[ConsultaController::class,'listarPorCurso']);
Route::post('listadoPorAsignaturas',[ConsultaController::class,'listarPorAsignatura']);

//***USUARIOS***/
Route::get('listarUsuarios',[UsuarioController::class,'index']);
Route::get('editarUsuario',[UsuarioController::class,'edit']);
Route::post('almacenarCambioUsuario',[UsuarioController::class,'update']);

//***CONSULTAS***
Route::post('crearConsultaHija',[ConsultaController::class,'createChild']);
Route::post('almacenarConsultaHija',[ConsultaController::class,'storeChild']);
Route::post('listarConsultas',[ConsultaController::class,'consulta']);

//***ASIGNATURAS***/

Route::get('listarAsignaturas',[AsignaturaController::class,'index']);
Route::get('crearAsignatura',[AsignaturaController::class,'create']);
Route::post('almacenarAsignatura',[AsignaturaController::class,'store']);
Route::post('editarAsignatura',[AsignaturaController::class,'edit']);
Route::post('almacenarAsignaturaEditada',[AsignaturaController::class,'update']);
Route::get('listadoAsignaturas',[AsignaturaController::class,'listadoAsignaturas']);
Route::post('informacionAsignatura',[AsignaturaController::class,'informacionAsignatura']);

//***CURSOS***/
Route::get('listarCursos',[CursoController::class,'index']);
Route::get('crearCurso',[CursoController::class,'create']);
Route::post('almacenarCurso',[CursoController::class,'store']);
Route::post('editarCurso',[CursoController::class,'edit']);
Route::post('almacenarCursoEditado',[CursoController::class,'update']);
Route::get('listadoCursos',[CursoController::class,'listadoCursos']);
Route::post('informacionCurso',[CursoController::class,'informacionCurso']);

//***INCIDENCIAS***/
Route::get('listarIncidencias',[IncidenciaController::class,'index']);
Route::get('crearIncidencia',[IncidenciaController::class,'create']);
Route::post('almacenarIncidencia',[IncidenciaController::class,'store']);
Route::get('incidenciasNoAsignadas',[IncidenciaController::class,'listarNoAsignadas']);
Route::get('incidenciasAbiertas',[IncidenciaController::class,'listarAbiertas']);
Route::get('incidenciasCerradas',[IncidenciaController::class,'listarCerradas']);
Route::post('listarIncidenciasUsuario',[IncidenciaController::class,'listarAsignadas']);
Route::post('cerrarIncidencia',[IncidenciaController::class,'cerrarIncidencia']);
Route::post('asignarIncidencia',[IncidenciaController::class,'asignarIncidencia']);

//***DENUNCIAS***/
Route::get('listarDenuncias',[DenunciaController::class,'index']);
Route::post('crearDenuncia',[DenunciaController::class,'create']);
Route::post('almacenarDenuncia',[DenunciaController::class,'store']);
Route::post('listarContenidoDenuncia',[DenunciaController::class,'contenidoDenuncia']);
Route::post('eliminarDenuncia',[DenunciaController::class,'destroy']);

//***BANEOS***/
Route::get('listarBaneos',[BaneoController::class,'index']);
Route::post('crearBaneo',[BaneoController::class,'create']);
Route::post('almacenarBaneo',[BaneoController::class,'store']);
Route::post('eliminarBaneo',[BaneoController::class,'destroy']);

//***FICHEROS***/
Route::get('listarFicheros',[FicheroController::class,'index']);
Route::get('crearFichero',[FicheroController::class,'create']);
Route::post('almacenarFichero',[FicheroController::class,'store']);
Route::post('descargarFichero',[FicheroController::class,'download']);