<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Trabajador;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{

    public function index()
    {
        $trabajador = DB::table('trabajadors as TB')
        ->join('personas as PE', 'TB.persona_id', '=', 'PE.id')
        ->join('distrito as DI', 'PE.distrito_id', '=', 'DI.id')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select(
            'PE.numero_documento as documento', 
            DB::raw("CONCAT(PE.nombres, ' ', PE.apellido_paterno, ' ', PE.apellido_materno) as nombre_completo"), 
            'PE.celular as celular', 
            'PE.sexo as sexo', 
            'PE.correo as correo', 
            'PE.fecha_nacimiento as fecha_nacimiento',
            'PE.direccion as direccion', 
            'TB.estado as estado', 
            'TB.cargo as cargo', 
            'TB.fecha_ingreso as fecha_ingreso', 
            'DI.distrito_nombre as distrito', 
            'D.departamento_nombre as departamento', 
            'P.provincia_nombre as provincia_nombre',
            "TB.id as id",
            "PE.nombres",
            "PE.apellido_paterno",
            "PE.apellido_materno",
            "DI.id as distrito_id",
            "D.id as departamento",
            "P.id as provincia",
            "PE.numero_documento as numero_documento",
            "PE.tipo_documento_id as tipo_documento_id"

        )
        ->get();
        return $trabajador;
    }

    public function store(Request $request)
    {
        try{

            $persona = new Persona();
            $persona->numero_documento= $request->numero_documento;
            $persona->tipo_documento_id = $request->tipo_documento_id;
            $persona->nombres = $request->nombres;
            $persona->apellido_paterno = $request->apellido_paterno;
            $persona->apellido_materno = $request->apellido_materno;
            $persona->celular = $request->celular;
            $persona->sexo = $request->sexo;
            $persona->correo = $request->correo;
            $persona->fecha_nacimiento = $request->fecha_nacimiento;
            $persona->direccion = $request->direccion;
            $persona->distrito_id = $request->distrito_id;
            $persona->save();

            $id = $persona->id;

            $trabajador = new Trabajador();
            $trabajador->persona_id = $id;
            $trabajador->estado = $request->estado;
            $trabajador->cargo = $request->cargo;
            $trabajador->fecha_ingreso = $request->fecha_ingreso;
            $trabajador->save();
            return response()->json($trabajador,200);   
        }catch (QueryException $e) {
            return 'No se pudo crear el trabajador. Por favor, inténtelo de nuevo.'.$e;
        }
    }

    public function show($id)
    {
        $trabajador = DB::table('trabajadors as TB')
        ->join('personas as PE', 'TB.persona_id', '=', 'PE.id')
        ->join('distrito as DI', 'PE.distrito_id', '=', 'DI.id')
        ->join('provincia as P', 'DI.provincia_id', '=', 'P.id')
        ->join('departamento as D', 'P.departamento_id', '=', 'D.id')
        ->select(
            'PE.numero_documento as documento', 
            DB::raw("CONCAT(PE.nombres, ' ', PE.apellido_paterno, ' ', PE.apellido_materno) as nombre_completo"), 
            'PE.celular as celular', 
            'PE.sexo as genero', 
            'PE.correo as correo', 
            'PE.fecha_nacimiento as fecha_nacimiento',
            'PE.direccion as direccion', 
            'TB.estado as estado', 
            'TB.cargo as cargo', 
            'TB.fecha_ingreso as fecha_ingreso', 
            'DI.distrito_nombre as distrito', 
            'D.departamento_nombre as departamento', 
            'P.provincia_nombre as provincia'
        )
        ->where('TB.id', '=', $id)
        ->first();
        return $trabajador;
    }

    public function update(Request $request, $id)
    {

        $trabajador = Trabajador::findOrFail($id);
        $persona_id = $trabajador->persona_id;

        $persona = Persona::findOrFail($persona_id);
        $persona->numero_documento = $request->numero_documento;
        $persona->tipo_documento_id = $request->tipo_documento_id;
        $persona->nombres = $request->nombres;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->celular = $request->celular;
        $persona->sexo = $request->sexo;
        $persona->correo = $request->correo;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->direccion = $request->direccion;
        $persona->distrito_id = $request->distrito_id;
        $persona->save();

        $trabajador->persona_id = $persona_id;
        $trabajador->estado = $request->estado;
        $trabajador->cargo = $request->cargo;
        $trabajador->fecha_ingreso = $request->fecha_ingreso;
        $trabajador->save();
        return $trabajador;
       
    }

    public function destroy($id)
    {
        Trabajador::destroy($id);
        return response()->json("eliminado correctamente",200);
    }
}
