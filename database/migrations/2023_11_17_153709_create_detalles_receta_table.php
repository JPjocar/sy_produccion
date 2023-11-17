<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_receta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_receta');
            $table->unsignedBigInteger('id_producto');
            $table->primary(['id_receta', 'id_producto']);

            $table->decimal('precio_producto', 8, 2);
            $table->integer('cantidad');
            $table->integer('subtotal');

            //Llaves foraneas
            $table->foreign('id_receta')->references('id')->on('recetas');
            $table->foreign('id_producto')->references('id')->on('productos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_receta');
    }
};
