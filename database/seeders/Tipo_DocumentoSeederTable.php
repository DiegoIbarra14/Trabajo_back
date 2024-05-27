<?php

namespace Database\Seeders;

use App\Models\Tipo_Documento;
use Illuminate\Database\Seeder;

class Tipo_DocumentoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_Documento::create([
            "nombre"=>"DNI",
            "descripcion"=>"Documento nacional de identidad"
        ]);
        
    }
}
