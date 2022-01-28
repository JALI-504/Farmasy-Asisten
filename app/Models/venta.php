<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    Public function scopeBuscarpor($query , $buscarpor)
    {
        

        if (trim($buscarpor) != "") {


            $query->where(\DB::raw("CONCAT(nombre, '' , nombre_producto)"), 'LIKE', "%$buscarpor%");
        }
    }
    //
    public function inventario()
    {

    return $this->hasMany("App\productosVendido", "id_venta");
}

public function cliente()
{
    return $this->belongsTo("App\Cliente", "id_cliente");
}

}
