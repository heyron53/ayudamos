<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'correo';
    protected $fillable = ['correo','nickname','password','nombre','apellidos','correo','rol','conocimientos','fechaCreacion','puntuacion','perfil'];
    protected $keyType = 'string';

    public $timestamps = false;

    public function consultas(){
        return $this->hasMany(Consulta::class,"codUsu","correo");
    }

    public function denuncias(){
        return $this->hasMany(Denuncia::class,"codUsuReporte","correo");
    }

    public function ficheros(){
        return $this->hasMany(Fichero::class,"codUsu","correo");
    }

}
