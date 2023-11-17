<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;
    protected $table = 'presentaciones';

    public function productos(){
        return $this->hasMany('App\Models\Producto', 'id_presentacion', 'id');
    }
}
