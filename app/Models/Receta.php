<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Receta extends Model
{
    use HasFactory;
    protected $table = 'recetas';
    protected $fillable = ['estado'];

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'id_producto', 'id');
    }

    public function productos(){
        return $this->belongsToMany('App\Models\Producto', 'detalles_receta', 'id_receta', 'id_producto')->withPivot('precio_producto', 'cantidad', 'subtotal');
    }

    protected function descripcion() : Attribute
    {
        return Attribute::make(
            get: function($value){
                if($value===null){
                    return "Null";
                }
            }
        );
    }
}
