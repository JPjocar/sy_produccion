<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER actualizar_precio_receta_al_actualizar_precio_ingredientes
            AFTER UPDATE
            ON detalles_receta
            FOR EACH ROW
            BEGIN
                DECLARE suma decimal(8,2);
                SELECT SUM(detalles_receta.subtotal) INTO suma FROM detalles_receta
                INNER JOIN recetas ON recetas.id = detalles_receta.id_receta
                INNER JOIN productos ON productos.id = detalles_receta.id_producto
                WHERE recetas.id = NEW.id_receta;
                UPDATE recetas SET precio = suma WHERE recetas.id = NEW.id_receta;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `actualizar_precio_receta_al_actualizar_precio_ingredientes`');
    }
};
