<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    //
      //
      public function inventario()
      {
  
      return $this->hasMany("App\productos_comprado", "id_compra");
  }
  
  public function proveedors()
  {
      return $this->belongsTo("App\proveedor", "id_proveedor");
  }
}
