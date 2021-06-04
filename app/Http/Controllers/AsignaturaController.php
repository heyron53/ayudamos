<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Asignatura;
use  App\Models\Curso;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas.listarAsignaturas', compact('asignaturas'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('asignaturas.formCrearAsignatura',compact('cursos'));
    }

    public function store(Request $request)
    {
        $asignatura = Asignatura::create([
            'codAsignatura' => $request->get('codAsignatura'),
            'codCurso' => $request->get('codCurso'),
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion')
        ]);

        return redirect('listarAsignaturas');
    }

    public function show()
    {

    }

    public function edit(Request $request)
    {
        $asignatura = Asignatura::find($request->get('codAsignatura'));
        $cursos = Curso::all();
        return view('asignaturas.formEditarAsignatura',compact('asignatura','cursos'));
    }

    public function update(Request $request)
    {
        $asignatura = Asignatura::find($request->get('codAsignatura'));
        $asignatura->update([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'codCurso' => $request->get('codCurso')
        ]);

        return redirect('listarAsignaturas');
    }

    public function destroy()
    {

    }

    public function listadoAsignaturas()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas.listadoAsignaturas', compact('asignaturas'));
    }

    public function informacionAsignatura(Request $request)
    {
        $asignatura = Asignatura::find($request->get("codAsignatura"));
        $curso = $asignatura->curso;
        return view('asignaturas.informacionAsignatura', compact('asignatura','curso'));
    }
}
