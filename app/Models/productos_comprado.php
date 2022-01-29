<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productos_comprado extends Model
{
    //
    protected $table = "productos_comprados";
    protected $fillable = ["id_compra", "codigo_barras", "nombre_producto", "precio", "cantidad"];
}
