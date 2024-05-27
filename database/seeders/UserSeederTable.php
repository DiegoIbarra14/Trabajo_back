<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\Trabajador;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona=Persona::create([
                "nombres"=>"Jose Pedro",
                "apellido_paterno"=>"Castillo",
                "apellido_materno"=>"Terrones",
                "fecha_nacimiento"=>"1975-03-09",
                "celular"=>"951952345",
                "sexo"=>"m",
                "correo"=>"pedrito@gmail.com",
                "tipo_documento_id"=>1,
                "numero_documento"=>"74310078",
                "distrito_id"=>1,
                "direccion"=>"Jr las malvinas 123"



        ]);
        $trabajador=Trabajador::create([
            "persona_id"=>$persona->id,
            "estado"=>"a",
            "fecha_ingreso"=>"2014-05-09",
            "cargo"=>"Gerente General",


        ]);
        $user=User::create([
            "name"=>'admin',
            "password"=>bcrypt('12345678'),
            'trabajador_id'=>$trabajador->id
        ]);
        $user->assignRole("Gerente");
        
    }
}
