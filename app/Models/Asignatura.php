<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Curso;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    protected $primaryKey = 'codAsignatura';
    protected $fillable = ['codAsignatura','codCurso','nombre','descripcion'];
    protected $keyType = 'string';

    public $timestamps = false;
    //use HasFactory;

    public function curso(){
        return $this->belongsTo(Curso::class,"codCurso","codCurso");
    }
}
