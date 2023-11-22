<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;
    protected $table = 'tipos_producto';


    public function productos(){
        return $this->hasMany('App\Models\Producto', 'id_tipo_producto', 'id');
    }

    protected function nombre() : Attribute
    {
        return new Attribute(
            get: function($value){
                return strtoupper($value);
            }
        );
    }
}
