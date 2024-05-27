<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $cliente = DB::table('cliente as C')
        ->join('personas as PE', 'C.persona_id', '=', 'PE.id')
        ->join('distrito as DI', 'PE.distrito_id', '=', 'DI.id')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('PE.numero_documento as documento', 'PE.nombres as nombre', 'PE.apellido_paterno as apellido_paterno', 'PE.apellido_materno as apellido_materno', 'PE.celular as celular', 'PE.sexo as sexo', 'PE.correo as email', 'PE.fecha_nacimiento as fecha_nacimiento', 'DI.distrito_nombre as distrito', 'D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->get();
        return $cliente;
    }

    public function store(Request $request)
    {
        
        try{
            $cliente = new Cliente();
            $cliente->persona_id = $request->persona_id;
            $cliente->save();
            return $cliente;
        }catch (QueryException $e) {
            return 'No se pudo crear el cliente. Por favor, inténtelo de nuevo.';
        }  

    }

    public function show(string $id)
    {
        $cliente = DB::table('cliente as C')
        ->join('personas as PE', 'C.persona_id', '=', 'PE.id')
        ->join('distrito as DI', 'PE.distrito_id', '=', 'DI.id')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select('PE.numero_documento as documento', 'PE.nombres as nombre', 'PE.apellido_paterno as apellido_paterno', 'PE.apellido_materno as apellido_materno', 'PE.celular as celular', 'PE.sexo as sexo', 'PE.correo as email', 'PE.fecha_nacimiento as fecha_nacimiento', 'DI.distrito_nombre as distrito', 'D.departamento_nombre as departamento', 'P.provincia_nombre as provincia')
        ->where('C.id', '=', $id)
        ->first();
        return $cliente;
    }

    public function update(Request $request, string $id)
    {

        $cliente = Cliente::findOrFail($id);
        $cliente->persona_id = $request->persona_id;
        $cliente->save();
        return $cliente;
        
    }

    public function destroy(string $id)
    {
        Cliente::destroy($id);
    }
}
