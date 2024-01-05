<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public function marca(){
        return $this->belongsTo('App\Models\Marca', 'id_marca', 'id');
    }

    public function presentacion(){
        return $this->belongsTo('App\Models\Presentacion', 'id_presentacion', 'id');
    }

    public function getRecetas(){
        return $this->hasMany('App\Models\Receta', 'id_producto', 'id');
    }
    
    public function recetas(){
        return $this->belongsToMany('App\Models\Receta', 'detalles_receta', 'id_producto', 'id_receta');
    }

    public function tipoProducto(){
        return $this->belongsTo('App\Models\TipoProducto', 'id_tipo_producto', 'id');
    }

    public function compras(){
        return $this->belongsToMany('App\Models\Compra', 'detalles_compra', 'id_producto', 'id_compra');
    }
    protected function nombre() : Attribute
    {
        return Attribute::make(
            set: fn($value) => trim(ucwords(strtolower($value))),
            get: fn($value) => ucwords($value)
        );
    }
    protected function estado() : Attribute
    {
        return Attribute::make(
            get: fn($value) => $value === 1 ? 'Activo' : 'Inactivo'
        );
    }
}
