<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE actualizar_precio_compra(IN id_compra INT)
            BEGIN
                UPDATE productos 
                INNER JOIN detalles_compra ON productos.id = detalles_compra.id_producto 
                SET productos.precio = detalles_compra.precio
                WHERE detalles_compra.id_compra = id_compra;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS actualizar_precio_compra');
    }
};
