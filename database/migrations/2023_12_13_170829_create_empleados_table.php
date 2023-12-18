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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 9);
            $table->string('nombres');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->date('fecha_nac');
            $table->string('telefono');
            $table->string('correo');
            $table->string('estado', 50)->default('inactivo');
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
