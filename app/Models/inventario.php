<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    Public function scopeBuscarpor($query , $buscarpor)
    {
        

        if (trim($buscarpor) != "") {


            $query->where(\DB::raw("CONCAT(codigo_barras, '' , nombre_producto)"), 'LIKE', "%$buscarpor%");
        }
    }
    protected $fillable = ["codigo_barras", "descripcion", "precio_compra", "precio_venta", "existencia",
    ];
}

