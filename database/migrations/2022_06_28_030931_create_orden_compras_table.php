<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('comentarios');
            $table->date('fecha_orden');
            $table->unsignedBigInteger('id_proveedor');
            $table->string('estatus')->default('Pendiente');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedors');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_compras');
    }
};
