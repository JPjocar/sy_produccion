<?php

namespace App\Models;

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
    
}