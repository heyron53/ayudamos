<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baneo extends Model
{
    protected $table = 'baneos';
    protected $primaryKey = 'codBan';
    protected $fillable = ['codBan','codUsuBan','tipoBaneo','mensaje','fechaInicio','fechaFin'];
    //use HasFactory;

    public $timestamps = false;
}
