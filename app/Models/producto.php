<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //
    Public function scopeBuscarpor($query , $buscarpor)
    {

        if (trim($buscarpor) != "") {


            $query->where(\DB::raw("CONCAT(nombre, '' , codigo, nombre,)"), 'LIKE', "%$buscarpor%");
        }
    }


}
