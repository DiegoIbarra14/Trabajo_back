<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    public function index()
    {
        $contrato = DB::table('contrato as CO')
        ->join('cliente as C', 'CO.cliente_id', '=', 'C.id')
        ->join('proyecto as PRO', 'CO.proyecto_id', '=', 'PRO.id')
        ->select('CO.contrato_descripcion', 'CO.contrato_fecha_firma', 'CO.contrato_fecha_inicio', 'CO.contrato_fecha_fin', 'C.cliente_nombre', 'PRO.proyecto_nombre as proyecto', 'PRO.proyecto_prioridad as prioridad', 'PRO.proyecto_presupuesto as presupuesto')
        ->get();
        return $contrato;
    }

    public function store(Request $request)
    {
        
        try{
            $contrato = new Contrato();
            $contrato->contrato_descripcion = $request->contrato_descripcion;
            $contrato->contrato_fecha_firma = $request->contrato_fecha_firma;
            $contrato->contrato_fecha_inicio = $request->contrato_fecha_inicio;
            $contrato->contrato_fecha_fin = $request->contrato_fecha_fin;
            $contrato->cliente_id = $request->cliente_nombre;
            $contrato->proyecto_id = $request->proyecto_nombre;
            $contrato->save();
            return $contrato;
        }catch (QueryException $e) {
            return 'No se pudo crear el contrato. Por favor, inténtelo de nuevo.';
        }
            
    }

    public function show(string $id)
    {
        $contrato = DB::table('contrato as CO')
        ->join('cliente as C', 'CO.cliente_id', '=', 'C.id')
        ->join('proyecto as PRO', 'CO.proyecto_id', '=', 'PRO.id')
        ->select('CO.contrato_descripcion', 'CO.contrato_fecha_firma', 'CO.contrato_fecha_inicio', 'CO.contrato_fecha_fin', 'C.cliente_nombre', 'PRO.proyecto_nombre as proyecto', 'PRO.proyecto_prioridad as prioridad', 'PRO.proyecto_presupuesto as presupuesto')
        ->where('CO.id', '=', $id)
        ->first();
        return $contrato;
    }

    public function update(Request $request, string $id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->contrato_descripcion = $request->contrato_descripcion;
        $contrato->contrato_fecha_firma = $request->contrato_fecha_firma;
        $contrato->contrato_fecha_inicio = $request->contrato_fecha_inicio;
        $contrato->contrato_fecha_fin = $request->contrato_fecha_fin;
        $contrato->cliente_id = $request->cliente_nombre;
        $contrato->proyecto_id = $request->proyecto_nombre;
        $contrato->save();
        return $contrato;
    }

    public function destroy(string $id)
    {
        Contrato::destroy($id);
    }
}
