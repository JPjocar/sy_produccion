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
        Schema::create('turno_empleado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_turno');
            $table->unsignedBigInteger('id_empleado');
            $table->date('fecha_asignacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado', 50)->default('inactivo');
            $table->date('fecha_baja');
            $table->foreign('id_turno')->references('id')->on('turnos');
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turno_empleado');
    }
};
