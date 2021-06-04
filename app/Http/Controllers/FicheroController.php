<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use  App\Models\Fichero;

class FicheroController extends Controller
{
    public function index()
    {
        $ficheros = Fichero::all();
        $usuarios = [];
        foreach ($ficheros as $key => $value) {
            $usu = $value->usuario;
            $usuarios[$usu->correo] = $usu->nickname;
        }

        return view('ficheros.listarFicheros', compact('ficheros','usuarios'));
    }

    public function create()
    {
        return view('ficheros.formCrearFichero');
    }

    public function store(Request $request)
    {
        $codigo = $request->get("codUsu");
        $fichero = $request->file("fichero");
        
        $nombreFichero = $fichero->getClientOriginalName();
        
        $ruta = public_path().'/ficheros/'.$codigo;
        $path = public_path().'/ficheros/'.$codigo.'/'.$nombreFichero;
        
        $fichero->move($ruta,$nombreFichero);

        Fichero::create([
            'codUsu' => $codigo,
            'nombre' => $nombreFichero,
            'rutaFichero' => $path
        ]);

        return view('profile.profile');
        
    }

    public function download(Request $request)
    {
        $fichero = $request->get("ruta");
        return response()->download($fichero);
    }
}
