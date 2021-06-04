<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'codCon';
    protected $fillable = ['codCon','codUsu','nombre','contenido','consultaReferente','codAsignatura','fechaCreacion','puntuacion','imagen'];

    public $timestamps = false;
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class,"codUsu","correo");
    }

    public function denuncias(){
        return $this->hasMany(Denuncia::class,"codConsulta","codCon");
    }
   
}
