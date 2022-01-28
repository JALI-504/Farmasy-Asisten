<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('identidad')->unique();
            $table->String('primer_nombre');
            $table-> String('segundo_nombre')->nullable();
            $table-> String('primer_apellido');
            $table-> String('segundo_apellido')->nullable();
            $table-> date('fecha_nacimiento');
            $table-> Integer('numero_telefono');
            $table-> String('fecha_entrada');
            $table-> String('correo_electronico')->unique()->null();
            $table-> String('direccion');
            $table-> String('cargo');
            $table-> Integer('numero_emergencia');
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
        Schema::dropIfExists('empleados');
    }
}
