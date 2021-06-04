<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Baneo;
use Carbon\Carbon;

class BaneoController extends Controller
{
    public function index()
    {
        $baneos = Baneo::all();

        return view('baneos.listarBaneos',compact('baneos'));
    }

    public function create(Request $request)
    {
        $usuario = $request->get('codUsu'); 
        $tipo = $request->get('tipoBaneo');
    
        return view('baneos.formCrearBaneo',compact('usuario','tipo'));
        
    }

    public function store(Request $request)
    {
        $mensaje;
        if($request->get("mensaje") != ""){
            $mensaje = $request->get("mensaje");
        }else{
            $mensaje = NULL;
        }

        $fechaActual = Carbon::now();
        $baneo = Baneo::create([
            'codUsuBan' => $request->get("codUsuBan"),
            'tipoBaneo' => $request->get("tipoBaneo"),
            'mensaje' => $mensaje,
            'fechaInicio' => $fechaActual,
            'fechaFin' => $request->get("fechaFin")
        ]);

        return redirect('listarUsuarios');
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
        $codBan = $request->get('codBan');
        
        $baneo = Baneo::findOrFail($codBan);
        $baneo->delete();

        return redirect('listarBaneos');
    }
}
