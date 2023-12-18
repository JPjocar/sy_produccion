<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $fillable = ['dni', 'nombres', 'ape_paterno', 'ape_materno', 'fecha_nac', 'telefono', 'correo'];
}
