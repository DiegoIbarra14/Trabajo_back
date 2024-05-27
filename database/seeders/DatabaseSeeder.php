<?php

namespace Database\Seeders;

use App\Models\Acceso;
use CreateAccesosTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AccionesSeederTable::class);
        $this->call(PermisosSeederTable::class);
        $this->call(Tipo_DocumentoSeederTable::class);
        $this->call(UbicacionesSeederTable::class);
        $this->call(UserSeederTable::class);
        
        
    }
}
