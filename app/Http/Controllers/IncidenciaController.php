<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Incidencia;
use Carbon\Carbon;

class IncidenciaController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::all();
        return view('incidencias.listarIncidencias',compact('incidencias'));
    }

    public function create()
    {
        return view('incidencias.formCrearIncidencia');
    }

    public function store(Request $request)
    {
        $user = $request->session()->get('user');
        $fechaActual = Carbon::now();

        $incidencia = Incidencia::create([
            'codUsu' => $user->correo,
            'titulo' => $request->get('titulo'),
            'contenido' => $request->get('contenido'),
            'fechaCreacion' => $fechaActual->toDateString(),
            'fechaCierre' => $request->get('cierre'),
            'codUsuAsignado' => NULL,
            'estado' => 'ABIERTA'
        ]);

        return redirect('listarIncidencias');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy(Request $request)
    {
        
    }

    public function listarNoAsignadas()
    {
        $incidencias = Incidencia::all()->where('codUsuAsignado',NULL);
        return view('incidencias.incidenciasNoAsignadas',compact('incidencias'));
    }

    public function listarAbiertas()
    {
        $incidencias = Incidencia::all()->where('codUsuAsignado','!=',NULL)->where('estado','ABIERTA');
        return view('incidencias.incidenciasAbiertas',compact('incidencias'));
    }

    public function listarCerradas()
    {
        $incidencias = Incidencia::all()->where('codUsuAsignado','!=',NULL)->where('estado','CERRADA');
        return view('incidencias.incidenciasCerradas',compact('incidencias'));
    }

    public function listarAsignadas(Request $request)
    {
       $correo = $request->session()->get('user')->correo;
       //echo $correo;
       $incidencias = Incidencia::all()->where('codUsuAsignado','=',$correo)->where('estado','ABIERTA');
       return view('incidencias.incidenciasUsuario',compact('incidencias'));
    }

    public function cerrarIncidencia(Request $request)
    {
        //$codigo = $request->get('codInci');
        $incidencia = Incidencia::findOrFail($request->get('codInci'));
        $incidencia->update(['estado' => 'CERRADA']);
        return redirect('listarIncidencias');
        //return view('incidencias.listarIncidencias');
    }

    public function asignarIncidencia(Request $request)
    {
        $usuario = $request->session()->get('user');
        $incidencia = Incidencia::findOrFail($request->get('codInci'));
        $incidencia->update([
            'codUsuAsignado' => $usuario->correo
        ]);
        return redirect('listarIncidencias');
    }

    
}
