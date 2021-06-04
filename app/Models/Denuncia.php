<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias';
    protected $primaryKey = 'codDenuncia';
    protected $fillable = ['codDenuncia','codConsulta','codUsuReporte','contenido','fechaCreacion','tipoDenuncia'];

    public $timestamps = false;
    use HasFactory;

    public function consulta(){
        return $this->belongsTo(Consulta::class,"codConsulta","codCon");
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,"codUsuReporte","correo");
    }
}
