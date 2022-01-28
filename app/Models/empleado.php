<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    Public function scopeBuscarpor($query , $buscarpor)
    {

        if (trim($buscarpor) != "") {


            $query->where(\DB::raw("CONCAT(identidad, '' , primer_nombre,segundo_nombre,primer_apellido
            ,cargo)"), 'LIKE', "%$buscarpor%");
        }
    }
}

