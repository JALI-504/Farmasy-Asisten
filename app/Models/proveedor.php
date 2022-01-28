<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    Public function scopeBuscarpor($query , $buscarpor)
    {

        if (trim($buscarpor) != "") {


            $query->where(\DB::raw("CONCAT(nombre, '' , nombre_laboratorio,nombre_vendedor)"), 'LIKE', "%$buscarpor%");
        }
    }
}
