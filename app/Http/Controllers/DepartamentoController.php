<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamento = Departamento::all();
        return $departamento;
    }

    public function store(Request $request)
    {
        try{
            $departamento = new Departamento();
            $departamento->departamento_nombre = $request->departamento_nombre;
            $departamento->save();
            return $departamento;
        }catch (QueryException $e) {
            // Puedes personalizar el mensaje de error según sea necesario.
            return 'No se pudo crear el departamento. Por favor, inténtelo de nuevo.';
        }
    }

    public function show(string $id)
    {
        $departamento = Departamento::findOrFail($id);
        return $departamento;
    }

    public function update(Request $request, string $id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->departamento_nombre = $request->departamento_nombre;
        $departamento->save();
        return $departamento;
    }

    public function destroy(string $id)
    {
        Departamento::destroy($id);
    }

    public function getProvinciaByDepartamento(string $id)
    {
        // Obtener el ID del departamento
        $id_departamento = DB::table('departamento')
        ->where('id', '=', $id)
        ->first();

        if (!$id_departamento) {
            return 'Departamento no encontrado';
        }

        $id_departamento = $id_departamento->id;

        // Realizar la consulta utilizando DB::table
        $departamento = DB::table('provincia as P')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('P.provincia_nombre as provincia')
        ->where('D.id', '=', $id_departamento)
        ->get();

        return $departamento;

    }

    public function ubicacion()
    {
        $departamento = Departamento::with('provincia.distrito')->get();
        return $departamento;
    }

}
