<?php

namespace App\Http\Controllers;

use App\Models\proyecto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyecto = DB::table('proyecto as PRO')
        ->join('distrito as DI', 'PRO.distrito_id', '=', 'DI.id')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('PRO.proyecto_nombre as proyecto', 'PRO.proyecto_estado as estado', 'PRO.proyecto_prioridad as prioridad', 'PRO.proyecto_direccion as direccion', 'PRO.proyecto_presupuesto as presupuesto', 'DI.distrito_nombre as distrito', 'D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->get();
        return $proyecto;
    }

    public function store(Request $request)
    {
       
        try{
            $proyecto = new proyecto();
            $proyecto->proyecto_nombre = $request->proyecto_nombre;
            $proyecto->proyecto_estado = $request->proyecto_estado;
            $proyecto->proyecto_prioridad = $request->proyecto_prioridad;
            $proyecto->proyecto_direccion = $request->proyecto_direccion;
            $proyecto->proyecto_presupuesto = $request->proyecto_presupuesto;
            $proyecto->distrito_id = $request->distrito_nombre;
            $proyecto->save();
            return $proyecto;
        }catch (QueryException $e) {
            // Puedes personalizar el mensaje de error según sea necesario.
            return 'No se pudo crear el proyecto. Por favor, inténtelo de nuevo.';
        }
        
    }

    public function show(string $id)
    {
        $proyecto = DB::table('Proyecto as PRO')
        ->join('distrito as DI', 'PRO.distrito_id', '=', 'DI.id')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('PRO.proyecto_nombre as proyecto', 'PRO.proyecto_estado as estado', 'PRO.proyecto_prioridad as prioridad', 'PRO.proyecto_direccion as direccion', 'PRO.proyecto_presupuesto as presupuesto', 'DI.distrito_nombre as distrito', 'D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->where('PRO.id', '=', $id)
        ->first();
        return $proyecto;
    }

    public function update(Request $request, string $id)
    {
        $proyecto = proyecto::findOrFail($id);
        $proyecto->proyecto_nombre = $request->proyecto_nombre;
        $proyecto->proyecto_estado = $request->proyecto_estado;
        $proyecto->proyecto_prioridad = $request->proyecto_prioridad;
        $proyecto->proyecto_direccion = $request->proyecto_direccion;
        $proyecto->proyecto_presupuesto = $request->proyecto_presupuesto;
        $proyecto->distrito_id = $request->distrito_nombre;
        $proyecto->save();
        return $proyecto;
    }

    public function destroy(string $id)
    {
        proyecto::destroy($id);
    }
}
