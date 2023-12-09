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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
            $table->integer('stock');
            $table->boolean('estado');
            $table->decimal('precio', 8, 2);
            $table->decimal('costo_acc', 8, 2);
            //falta poner un precio_acumulador de las compras
            //Claves foraneas
            $table->unsignedBigInteger('id_marca')->nullable();
            $table->unsignedBigInteger('id_presentacion');
            $table->unsignedBigInteger('id_tipo_producto')->nullable();
            //Relaciones
            $table->foreign('id_marca')->references('id')->on('marcas')->delete('set null');
            $table->foreign('id_presentacion')->references('id')->on('presentaciones')->delete('set null');
            $table->foreign('id_tipo_producto')->references('id')->on('tipos_producto')->delete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
