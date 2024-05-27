<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincia = DB::table('provincia as P')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->get();
        return $provincia;
    }

    public function store(Request $request)
    {
        
        try{
            $provincia = new Provincia();
            $provincia->provincia_nombre = $request->provincia_nombre;
            $provincia->departamento_id = $request->departamento_nombre;
            $provincia->save();
            return $provincia;
        }catch (QueryException $e) {
            // Puedes personalizar el mensaje de error según sea necesario.
            return 'No se pudo crear la provincia. Por favor, inténtelo de nuevo.';
        }

    }
    public function show(string $id)
    {
        $provincia = DB::table('provincia as P')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->where('P.id', '=', $id)
        ->first();
        return $provincia;
    }

    public function update(Request $request, string $id)
    {

        $provincia = Provincia::findOrFail($id);
        $provincia->provincia_nombre = $request->provincia_nombre;
        $provincia->departamento_id = $request->departamento_nombre;
        $provincia->save();
        return $provincia;
        
    }

    public function destroy(string $id)
    {
        Provincia::destroy($id);
    }

}
