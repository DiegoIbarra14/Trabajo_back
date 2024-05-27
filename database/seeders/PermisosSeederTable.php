<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name" => "Gerente"]);
        $PClinte = Permission::create(["name" => "Clientes", "acceso_id" => 1]);
        $PProyecto = Permission::create(["name" => "Proyectos", "acceso_id" => 2]);
        $PContratos = Permission::create(["name" => "Contratos", "acceso_id" => 3]);
        $PEmpleados = Permission::create(["name" => "Empleados", "acceso_id" => 4]);


        $role1->givePermissionTo([
            $PClinte,
            $PProyecto,
            $PContratos,
            $PEmpleados,

        ]);
    }
}
