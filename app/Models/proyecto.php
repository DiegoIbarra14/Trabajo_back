<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    protected $table = "proyecto";
    protected $fillable = [
        'proyecto_nombre',
        'proyecto_estado',
        'proyecto_prioridad',
        'proyecto_direccion',
        'proyecto_presupuesto',
        'distrito_nombre'
    ];
    use HasFactory;
}
