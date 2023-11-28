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
            CREATE TRIGGER actualizar_subtotales_recetas 
            AFTER UPDATE 
            ON productos
            FOR EACH ROW
            BEGIN
                UPDATE detalles_receta SET subtotal = (detalles_receta.cantidad * NEW.precio)
                WHERE detalles_receta.id_producto = NEW.id;
                INSERT INTO historial_precios(id_producto, precioAnterior) VALUES(OLD.id, OLD.precio);	
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `actualizar_subtotales_recetas`');
    }
};
