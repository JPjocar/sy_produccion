<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras';


    public function productos(){
        return $this->belongsToMany('App\Models\Producto', 'detalles_compra', 'id_compra', 'id_producto')->withPivot(['cantidad', 'precio', 'subtotal']);
    }
    
}
