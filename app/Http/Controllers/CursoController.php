<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Curso;
//use  App\Models\Asignatura;


class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.listarCursos', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.formCrearCurso');
    }

    public function store(Request $request)
    {
        $curso = Curso::create([
            'codCurso' => $request->get('codCurso'),
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion')
        ]);

        return redirect('listarCursos');
    }

    public function show()
    {

    }

    public function edit(Request $request)
    {
        $curso = Curso::find($request->get('codCurso'));
        return view('cursos.formEditarCurso',compact('curso'));
    }

    public function update(Request $request)
    {
        $curso = Curso::find($request->get('codCurso'));

        $curso->update([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion')
        ]);
    
        return redirect('listarCursos');
    }

    public function destroy()
    {
        
    }

    public function listadoCursos()
    {
        $cursos = Curso::all();
        return view('cursos.listadoCursos', compact('cursos'));
    }

    public function informacionCurso(Request $request)
    {
        $curso = Curso::find($request->get("codCurso"));
        $asignaturas = $curso->asignaturas;

       return view('cursos.informacionCurso', compact('curso','asignaturas'));
    }
}
