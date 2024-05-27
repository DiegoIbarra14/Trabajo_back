<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distrito';
    protected $fillable = ['distrito_nombre', 'provincia_nombre'];
    use HasFactory;

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    
}
