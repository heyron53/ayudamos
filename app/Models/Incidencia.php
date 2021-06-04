<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencias';
    protected $primaryKey = 'codInci';
    protected $fillable = ['codInci','codUsu','titulo','contenido','fechaCreacion','fechaCierre','codUsuAsignado','estado'];

    public $timestamps = false;
}
