<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    public function productos(){
        return $this->belongsToMany('App\Models\Producto', 'detalles_compra', 'id_compra', 'id_producto')->withPivot(['cantidad', 'precio', 'subtotal']);
    }

    protected function codigoCompra(): Attribute
    {
        return Attribute::make(
            set: fn($value) => trim(strtolower($value)),
            get: fn($value) => strtoupper($value)
        );
    }

    
}
