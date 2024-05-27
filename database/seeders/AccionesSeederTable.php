<?php

namespace Database\Seeders;

use App\Models\Acceso;
use Illuminate\Database\Seeder;


class AccionesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Acceso::create(['label'=>"Clientes","url"=>"Clientes","icon"=>"pi pi-users","parent_id"=>null,"depth"=>0]);
        Acceso::create(['label'=>"Proyectos","url"=>"Proyectos","icon"=>"pi pi-briefcase","parent_id"=>null,"depth"=>0]);
        Acceso::create(['label'=>"Contratos","url"=>"Contratos","icon"=>"pi pi-file","parent_id"=>null,"depth"=>0]);
        Acceso::create(['label'=>"Empleados","url"=>"Empleados","icon"=>"pi pi-user-plus","parent_id"=>null,"depth"=>0]);
        

    }
}
