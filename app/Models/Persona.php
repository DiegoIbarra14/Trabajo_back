<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function tipo_documento(){
        $this->belongsTo(Tipo_Documento::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }
}
