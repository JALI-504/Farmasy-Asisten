

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarIdACompra extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->string("factura");
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign("id_proveedor")
                ->references("id")
                ->on("proveedors")
                ->onDelete("cascade")
                ->onUpdate("cascade");
                $table->unsignedBigInteger('id_factura');
                $table->foreign("id_factura")
                    ->references("id")
                    ->on("facturas")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('compras', function (Blueprint $table) {
            //
        });
    
    }
}
