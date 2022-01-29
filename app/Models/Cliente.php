<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    Public function scopeBuscarpor($query , $buscarpor)
    {

        if (trim($buscarpor) != "") {


            $query->where(\DB::raw("CONCAT(nombre, '' , telefono, apellido,identidad)"), 'LIKE', "%$buscarpor%");
        }
    }

} 
