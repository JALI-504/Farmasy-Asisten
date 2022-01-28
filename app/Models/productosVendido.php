<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productosVendido extends Model
{
    //
    protected $table = "productos_vendidos";
    protected $fillable = ["id_venta", "codigo_barras", "nombre_producto", "precio", "cantidad"];
}
