<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "contrato";
    protected $fillable = [
        'contrato_descripcion',
        'contrato_fecha_firma',
        'contrato_fecha_inicio',
        'contrato_fecha_fin',
        'cliente_nombre',
        'proyecto_nombre'
    ];
    use HasFactory;
}
