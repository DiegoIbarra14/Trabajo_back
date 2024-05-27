<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Permission;
class Acceso extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function permission()
    {
        return $this->hasOne(Permission::class);
    }
    public function children()
    {
        return $this->hasMany(Acceso::class, 'parent_id');
    }
}
