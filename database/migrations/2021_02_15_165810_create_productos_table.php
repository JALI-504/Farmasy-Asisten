<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creamos el modelo de la base de datos
        Schema::create('productos', function (Blueprint $table) {
            //definimos los valores
            $table->bigIncrements('id');
            $table->String('codigo');
            $table->String('nombre');
            $table->integer('impuesto');
            $table->String('presentacion');
            $table->String('descripcion');
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
        Schema::dropIfExists('productos');
    }
}
