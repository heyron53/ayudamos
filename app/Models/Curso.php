<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Asignatura;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'codCurso';
    protected $fillable = ['codCurso','nombre','descripcion'];
    protected $keyType = 'string';

    public $timestamps = false;

    public function asignaturas(){
        return $this->hasMany(Asignatura::class,"codCurso","codCurso");
    }
}
