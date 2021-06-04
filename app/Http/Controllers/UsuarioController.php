<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\ConsultaController;
use  App\Models\Usuario;
use  App\Models\Baneo;
use  App\Models\Consulta;
use  App\Models\Curso;

class UsuarioController extends Controller
{
    /**
     * Devuelve todos los usuarios registrados
     *
     * @return void
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios/listarUsuarios', compact('usuarios'));
    }

    /**
     * Devuelve la vista register para recoger los datos
     * de los usuarios normales que se van a registrar
     *
     * @return void
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('login/register',compact('cursos'));
    }

    public function createModerator()
    {
        $cursos = Curso::all();
        return view('login/registerModerator',compact('cursos'));
    }

    public function createAdmin()
    {
        $cursos = Curso::all();
        return view('login/registerAdmin',compact('cursos'));
    }

    /**
     * Se almacena el usuario recogiendo los datos desde el request
     * y se devuelve la vista login para el inicio de sesión
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //se recogen todos los cursos del usuario
        $conocimientos = $request->get("conocimientos");
        $cursos = "";

        if($conocimientos != NULL){

            for ($i=0; $i < count($conocimientos); $i++) { 
                if($i != count($conocimientos)-1){
    
                    $cursos .= $conocimientos[$i].",";
                }else{
    
                    $cursos .= $conocimientos[$i];
                }
            }
        }else{
            $cursos = NULL;
        }

        //se crea una ruta por usuario para almacenar las imagenes de perfil
        $pathPerfil = public_path().'/img/'.$request->get("correo").'/perfil';
        $pathConsulta = public_path().'/img/'.$request->get("correo").'/consultas';
        $pathFichero = public_path().'/ficheros/'.$request->get("correo");
        $ruta;
        
        //se crean ficheros para las imagenes de perfil y las consultas
        $filesPer = File::makeDirectory($pathPerfil,$mode = 0777, true, true);
        $filesCon = File::makeDirectory($pathConsulta,$mode = 0777, true, true);
        $filesFic = File::makeDirectory($pathFichero,$mode = 0777, true, true);
        
        if($fichero = $request->file("perfil")){
            //se genera un nuevo nombre
            $nombreImg = $fichero->getClientOriginalName();

            $fichero->move($pathPerfil,$nombreImg);
            $ruta = 'img/'.$request->get("correo").'/perfil/'.$nombreImg;
        }else{
            $ruta = '/img/user.jpg';
        }
        
        //se recoge la fecha actual para asignarla como fechaCreacion
        $fechaActual = Carbon::now();
        $usuario = Usuario::create([
            'nickname' => $request->get("nickname"),
            'password' => $request->get("password"),
            'nombre' => $request->get("nombre"),
            'apellidos' => $request->get("apellidos"),
            'correo' => $request->get("correo"),
            'rol' => $request->get("rol"),
            'conocimientos' => $cursos,
            'fechaCreacion' => $fechaActual->toDateTimeString(),
            'puntuacion' => $request->get("puntuacion"),
            'perfil' => $ruta
        ]);

        return view('login/login');
        
    }
    
    
   
    public function show(Request $request)
    {
        try{ 
            $request->session()->put(['idUsu',$request->get("correo")]);
            //return view('main/index');
            return redirect()->route("consulta.index");
          
        }catch(Exception $e){
            return view('login/login');
        }
    }

    public function edit(Request $request)
    {
        $usuario = $request->session()->get('user');
        $cursos = Curso::all();
        return view('usuarios/formEditarUsuario',compact('usuario','cursos'));
    }

    public function update(Request $request)
    {
        $conocimientos = $request->get("conocimientos");
        $cursos = "";

        if($conocimientos != NULL){
            for ($i=0; $i < count($conocimientos); $i++) { 
                if($i != count($conocimientos)-1){
    
                    $cursos .= $conocimientos[$i].",";
                }else{
    
                    $cursos .= $conocimientos[$i];
                }
            }
        }else{
            $cursos = NULL;
        }

        $ruta;
        $pathPerfil = public_path().'/img/'.$request->get("correo").'/perfil';

        if($fichero = $request->file("imagen")){
            $nombreImg = $fichero->getClientOriginalName();
            //$extension = pathinfo($nombreImg,PATHINFO_EXTENSION);
            //$nuevoNombre = 'login.'.$extension;
            $fichero->move($pathPerfil,$nombreImg);
            $ruta = 'img/'.$request->get("correo").'/perfil/'.$nombreImg;

            Usuario::findOrFail($request->get("correo"))->update([
                'nickname' => $request->get("nickname"),
                'nombre' => $request->get("nombre"),
                'apellidos' => $request->get("apellidos"),
                'conocimientos' => $cursos,
                'perfil' => $ruta
            ]);
        }else{
            Usuario::findOrFail($request->get("correo"))->update([
                'nickname' => $request->get("nickname"),
                'nombre' => $request->get("nombre"),
                'apellidos' => $request->get("apellidos"),
                'conocimientos' => $cursos
            ]);
        }

        $usuario = Usuario::find($request->get('correo'));
    
        $request->session()->put('user',$usuario);
            
        return view('profile.profile');
    }

    public function destroy(int $codUsuario)
    {
        $usuario = Usuario::findOrFail($codUsuario);
        try{
            $usuario->delete();
            return redirect()->route('usuarios/listarUsuarios')->with('success','Usuario eliminada con éxito');
        } catch(Exception $e){
            return redirect()->route('usuarios/listarUsuarios')->with('error','No se ha podido eliminar el usuario');
        }
    }
    
    /**
     * Se comprueba que el usuario existe en el inicio de sesión
     *
     * @param Request $request
     * @return void
     */
    public function searchUser(Request $request)
    {
        $usuario = Usuario::find($request->get('correo'));

        $baneado = Baneo::get()->where('codUsuBan','=',$request->get('correo'));
        $ban = (array)$baneado;
        $estaBaneado;
        
        foreach ($ban as $key => $value) {
            if( empty($value)){
                $estaBaneado = true;
            }else{
                $estaBaneado = false;
            };
            
        };
        
        $error;
        
        if($usuario){ 
            if(!$estaBaneado == false){
                if($usuario['password'] == $request->get("password")){
                    $request->session()->put('user',$usuario);
                    return redirect('listarConsultas');
                }else{
                    $error = "Contraseña incorrecta";
                    return view('login.login',compact('error'));
                }
            }else{
                $error = "Tu cuenta ha sido bloqueada";
                return view('login.login',compact('error'));
            } 
        }else{
            $error = 'Usuario no encontrado';
            return view('login.login',compact('error'));
        }
        
    }

    public function profile()
    {
        return view('profile/profile');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return view('login.login');
    }
    
}
