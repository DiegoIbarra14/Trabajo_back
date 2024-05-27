<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadors';
    protected $fillable = ['persona_id', 'estado', 'cargo', 'fecha_ingreso'];
    use HasFactory;
    public function user(){
        return $this->belongsTo(Trabajador::class);
    }
    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }
}
