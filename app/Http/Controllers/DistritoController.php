<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistritoController extends Controller
{
    public function index()
    {
        $distrito = DB::table('distrito as DI')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('DI.distrito_nombre as distrito', 'D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->get();
        return $distrito;
    }

    public function store(Request $request)
    {
        try{
            $distrito = new Distrito();
            $distrito->distrito_nombre = $request->distrito_nombre;
            $distrito->provincia_id = $request->provincia_nombre;
            $distrito->save();
            return $distrito;
        }catch (QueryException $e) {
            // Puedes personalizar el mensaje de error según sea necesario.
            return 'No se pudo crear el distrito. Por favor, inténtelo de nuevo.';
        }    
    }

    public function show(string $id)
    {
        $distrito = DB::table('distrito as DI')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('DI.distrito_nombre as distrito', 'D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->where('DI.id', '=', $id)
        ->first();
        return $distrito;
    }

    public function update(Request $request, string $id)
    {
        
        $distrito = Distrito::findOrFail($id);
        $distrito->distrito_nombre = $request->distrito_nombre;
        $distrito->provincia_id = $request->provincia_nombre;
        $distrito->save();
        return $distrito;
        
    }

    public function destroy(string $id)
    {
        Distrito::destroy($id);
    }
}
