<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "Cliente";
    protected $fillable = ['empleado_id'];
    public function persona(){
        return $this->hasOne(Persona::class);
    }
    
}
