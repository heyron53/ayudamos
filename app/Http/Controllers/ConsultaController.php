<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Consulta;
use  App\Models\Curso;
use  App\Models\Asignatura;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AsignaturaController;
use Carbon\Carbon;

class ConsultaController extends Controller
{
    
    public function index()
    {
        $consultas = Consulta::all()->where('consultaReferente',NULL);
        $usuarios = [];

        foreach ($consultas as $con) {
            $usu = $con->usuario;
            $usuarios[$usu->correo] = $usu->nickname;
            $perfil[$usu->correo] = $usu->perfil;
            $nombre[$usu->correo] = $usu->nombre;
            $apellidos[$usu->correo] = $usu->apellidos;
            $puntuacion[$usu->correo] = $usu->puntuacion;
            
        }
        return view('main.index',compact('consultas','usuarios','perfil','nombre','apellidos','puntuacion'));
    }


    public function create()
    {
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        return view('consultas.formCrearConsulta',compact('cursos','asignaturas'));
    }

    public function store(Request $request)
    {

        $usuario = $request->session()->get('user');

        $path = public_path().'\img\\'.$usuario->correo.'\consultas';
        $ruta;
        
        if($fichero = $request->file("imagen")){
            //se genera un nuevo nombre
            $nombreImg = $fichero->getClientOriginalName();
            $extension = pathinfo($nombreImg,PATHINFO_EXTENSION);
            //$nuevoNombre = $ultimaCon->codCon.'.'.$extension;
            $fichero->move($path,$nombreImg);
            $ruta = 'img\\'.$usuario->correo.'\consultas\\'.$nombreImg;
         
        }else{
            $ruta = NULL;
        }

        $user =  $request->session()->get('user');
        $fechaActual = Carbon::now();
        $consulta = Consulta::create([
            'codUsu' => $user->correo,
            'nombre' => $request->get("nombre"),
            'contenido' => $request->get("contenido"),
            'consultaReferente' => NULL,
            //'codCurso' => $request->get("curso"),
            'codAsignatura' => $request->get("asignatura"),
            'fechaCreacion' => $fechaActual->toDateString(),
            'puntuacion' => 0,
            'imagen' => $ruta
        ]);

        return redirect('listarConsultas');
        
    }

    public function createChild(Request $request)
    {
        $padre = $request->get('padre');
        $curso = $request->get('cursoPadre');
        $asignatura = $request->get('asignaturaPadre');
        return view('consultas.formCrearConsultaHija',compact('padre','curso','asignatura'));
    }

    public function storeChild(Request $request)
    {
        $user =  $request->session()->get('user');

        $path = public_path().'\img\\'.$user->correo.'\consultas';
        $ruta;
        
        if($fichero = $request->file("imagen")){
            //se genera un nuevo nombre
            $nombreImg = $fichero->getClientOriginalName();
            $extension = pathinfo($nombreImg,PATHINFO_EXTENSION);
            //$nuevoNombre = $ultimaCon->codCon.'.'.$extension;
            $fichero->move($path,$nombreImg);
            $ruta = 'img\\'.$user->correo.'\consultas\\'.$nombreImg;
         
        }else{
            $ruta = NULL;
        }


        $fechaActual = Carbon::now();
        $consulta = Consulta::create([
            'codUsu' => $user->correo,
            'nombre' => $request->get("nombre"),
            'contenido' => $request->get("contenido"),
            'consultaReferente' => $request->get("padre"),
            //'codCurso' => $request->get("curso"),
            'codAsignatura' => $request->get("asignatura"),
            'fechaCreacion' => $fechaActual->toDateTimeString(),
            'puntuacion' => 0,
            'imagen' => $ruta
        ]);
        return redirect('listarConsultas');
        //return back();
    }


    public function show(Consulta $consulta)
    {
        return view('consultas.formCrearConsulta');
    }

    public function edit(int $codConsulta)
    {
        $consulta = Consulta::find($codConsulta);
        return view('consultas.formEditarConsulta');
    }

    public function update(Request $request)
    {
        Consulta::findOrFail($request->get("codCon"))->update($request->all());
        return redirect()->route('consultas.listarConsultas');
    }

    public function destroy(int $codConsulta)
    {
        $consulta = Consulta::findOrFail($codConsulta);
        try{
            $consulta->delete();
            return redirect()->route('consultas.listarConsultas')->with('success','Consulta eliminada con éxito');
        } catch(Exception $e){
            return redirect()->route('consultas.listarConsultas')->with('error','No se ha podido eliminar la consulta');
        }
    }

    public function consultasUsuario(Request $request)
    {
        $usuario = $request->session()->get('user');
        $cod = $usuario->correo;
     
        //$consultas = Consulta::all()->where('codUsu',$cod);
        $consultas = Consulta::all()->where('codUsu',$cod)->where('consultaReferente',NULL);
        

        return view('login.consultasPropias', compact('consultas'));
    }

    public function consulta(Request $request)
    {
        $consulta = Consulta::find($request->get("codigo"));
        $usuP = $consulta->usuario;
        //$usuarios = [];
        $usuarios[$usuP->correo] = $usuP->nickname;
        $perfiles[$usuP->correo] = $usuP->perfil;
        $consultasHijas = Consulta::all()->where('consultaReferente',$request->get("codigo"));
        foreach ($consultasHijas as $con) {
            $usuH = $con->usuario;
            $usuarios[$usuH->correo] = $usuH->nickname;
            $perfiles[$usuH->correo] = $usuH->perfil;
        }


        //echo $usuario;
        return view('consultas.listarConsulta',compact('consulta','consultasHijas','usuarios','perfiles'));
    }
    
    public function listarPorAsignatura(Request $request)
    {
        $consultas = Consulta::all()->where('codAsignatura',$request->codAsignatura)->where('consultaReferente',NULL);
        return view('asignaturas.consultasAsignaturas',compact('consultas'));
    }
/*
    public function listarPorCurso(Request $request)
    {
        $consultas = Consulta::all()->where('codCurso',$request->codCurso)->where('consultaReferente',NULL);
        return view('cursos/consultasCursos',compact('consultas'));
    }
*/
    
    
}
