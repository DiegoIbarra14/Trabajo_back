<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Provincia;
use Illuminate\Database\Seeder;

class UbicacionesSeederTable extends Seeder
{
    public function run()
    {
        // Crear departamentos
        $departamentos = [
            ['departamento_nombre' => 'Lima'],
            ['departamento_nombre' => 'Amazonas'],
            ['departamento_nombre' => 'Áncash'],
            // Agrega más departamentos según sea necesario...
        ];

        foreach ($departamentos as $departamentoData) {
            $departamento = Departamento::create($departamentoData);

            // Crear provincias y distritos para Lima
            if ($departamento->departamento_nombre == 'Lima') {
                $provinciasLima = [
                    ['provincia_nombre' => 'Lima', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Huarochirí', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Cañete', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Barranca', 'departamento_id' => $departamento->id],
                    // Agrega más provincias de Lima si es necesario...
                ];

                foreach ($provinciasLima as $provinciaData) {
                    $provincia = Provincia::create($provinciaData);

                    if ($provincia->provincia_nombre == 'Lima') {
                        $distritosLima = [
                            ['distrito_nombre' => 'Miraflores', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'San Isidro', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Barranco', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Surco', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'San Borja', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'La Molina', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Jesús María', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Magdalena', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'San Miguel', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Rímac', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Lima...
                        ];
                        foreach ($distritosLima as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }

                    if ($provincia->provincia_nombre == 'Huarochirí') {
                        $distritosHuarochiri = [
                            ['distrito_nombre' => 'Matucana', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'San Mateo', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'San Juan de Lurigancho', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Huarochirí...
                        ];
                        foreach ($distritosHuarochiri as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }

                    if ($provincia->provincia_nombre == 'Cañete') {
                        $distritosCanete = [
                            ['distrito_nombre' => 'San Vicente de Cañete', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Imperial', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Lunahuaná', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Cañete...
                        ];
                        foreach ($distritosCanete as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }

                    if ($provincia->provincia_nombre == 'Barranca') {
                        $distritosBarranca = [
                            ['distrito_nombre' => 'Barranca', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Paramonga', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Pativilca', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Barranca...
                        ];
                        foreach ($distritosBarranca as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }
                }
            }

            // Crear provincias y distritos para otros departamentos
            if ($departamento->departamento_nombre == 'Amazonas') {
                $provinciasAmazonas = [
                    ['provincia_nombre' => 'Chachapoyas', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Bagua', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Bongará', 'departamento_id' => $departamento->id],
                    // Agrega más provincias de Amazonas si es necesario...
                ];

                foreach ($provinciasAmazonas as $provinciaData) {
                    $provincia = Provincia::create($provinciaData);

                    if ($provincia->provincia_nombre == 'Chachapoyas') {
                        $distritosChachapoyas = [
                            ['distrito_nombre' => 'Chachapoyas', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Asunción', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Balsas', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Chachapoyas...
                        ];
                        foreach ($distritosChachapoyas as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }

                    if ($provincia->provincia_nombre == 'Bagua') {
                        $distritosBagua = [
                            ['distrito_nombre' => 'Bagua', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Aramango', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Copallín', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Bagua...
                        ];
                        foreach ($distritosBagua as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }
                }
            }

            if ($departamento->departamento_nombre == 'Áncash') {
                $provinciasAncash = [
                    ['provincia_nombre' => 'Huaraz', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Aija', 'departamento_id' => $departamento->id],
                    ['provincia_nombre' => 'Bolognesi', 'departamento_id' => $departamento->id],
                    // Agrega más provincias de Áncash si es necesario...
                ];

                foreach ($provinciasAncash as $provinciaData) {
                    $provincia = Provincia::create($provinciaData);

                    if ($provincia->provincia_nombre == 'Huaraz') {
                        $distritosHuaraz = [
                            ['distrito_nombre' => 'Huaraz', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Independencia', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Cochabamba', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Huaraz...
                        ];
                        foreach ($distritosHuaraz as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }

                    if ($provincia->provincia_nombre == 'Aija') {
                        $distritosAija = [
                            ['distrito_nombre' => 'Aija', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Coris', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'La Merced', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Aija...
                        ];
                        foreach ($distritosAija as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }

                    if ($provincia->provincia_nombre == 'Bolognesi') {
                        $distritosBolognesi = [
                            ['distrito_nombre' => 'Chiquián', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Abelardo Pardo Lezameta', 'provincia_id' => $provincia->id],
                            ['distrito_nombre' => 'Antonio Raymondi', 'provincia_id' => $provincia->id],
                            // Agrega más distritos de la provincia de Bolognesi...
                        ];
                        foreach ($distritosBolognesi as $distritoData) {
                            Distrito::create($distritoData);
                        }
                    }
                }
            }
        }
    }
}
