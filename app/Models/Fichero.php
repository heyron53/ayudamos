<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichero extends Model
{
    protected $table = 'ficheros';
    protected $primaryKey = 'codFichero';
    protected $fillable = ['codFichero','codUsu','nombre','rutaFichero'];

    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(Usuario::class,"codUsu","correo");
    }

}
