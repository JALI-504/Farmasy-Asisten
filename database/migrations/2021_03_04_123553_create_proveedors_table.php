<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nombre');
            $table-> String('telefono');
            $table->String('nombre_laboratorio');
            $table-> String('telefono_laboratorio');
            $table-> String('correo')->unique()->nullable();
            $table->String('nombre_vendedor');
            $table->String('numero_vendedor');
            $table->String('direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
