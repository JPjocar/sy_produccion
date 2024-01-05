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
            CREATE PROCEDURE delete_compra(IN id_compra INT)
            BEGIN
                UPDATE productos
                INNER JOIN detalles_compra ON detalles_compra.id_producto = productos.id
                SET productos.precio = CASE
                        WHEN (productos.stock - detalles_compra.cantidad) <= 0 THEN 0
                        ELSE ((productos.costo_acc - detalles_compra.subtotal)/(productos.stock - detalles_compra.cantidad))
                    END,
                    productos.costo_acc = (productos.costo_acc - detalles_compra.subtotal),
                    productos.stock = (productos.stock - detalles_compra.cantidad)
                WHERE detalles_compra.id_compra = id_compra;
            END
        ');
    }
 
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS delete_compra');
    }
};
