<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use  App\Models\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    public function index()
    {
        $denuncias = Denuncia::all();
        return view('denuncias.listarDenuncias',compact('denuncias'));
    }

    public function create(Request $request)
    {
        $denuncia = $request->get('tipoDenuncia');
        $consulta = $request->get('codConsulta');
        return view('denuncias.formCrearDenuncia',compact('denuncia','consulta'));
    }

    public function store(Request $request)
    {

        $content;
        if($request->get("contenido") == ""){
            $content = NULL;
        }else{
            $content = $request->get("contenido");
        }

        $fechaActual = Carbon::now();
        $user = $request->session()->get('user');
        $denuncia = Denuncia::create([
            'codConsulta' =>  $request->get("codConsulta"),
            'codUsuReporte' => $user->correo,
            'contenido' => $content,
            'fechaCreacion' => $fechaActual,
            'tipoDenuncia' => $request->get("tipoDenuncia")
        ]);

        return redirect('listarConsultas');
        
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
        $denuncia = Denuncia::findOrFail($request->get('codDenuncia'));
        $denuncia->delete();
        return redirect('listarDenuncias');
    }

    public function contenidoDenuncia(Request $request)
    {
        $denuncia = Denuncia::find($request->get('codDenuncia'));
        $usu = $denuncia->usuario;
        $consulta = $denuncia->consulta;

        return view('denuncias.contenidoDenuncia',compact('denuncia','usu','consulta'));

    }
}
