<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Persona;
use App\Models\Trabajador;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use JWTAuth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user=User::create([ 
            "name"=>$request->name,
            "password"=>bcrypt($request->password)
            ]
           
        );
        $token=JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);
         
    }
    
    public function login(LoginRequest $request){
        $credentials=$request->only("name","password");
        if(!$token=JWTAuth::attempt($credentials)){
            return response()->json(["error"=>"Invalid Credentials"], 302);
        }
        $user = User::where("name", $request->name)->first(); 
        $role = $user->roles()->first();
        $persona = $user->trabajador->persona;
        // $nombre = $persona->nombres;
        // $apellido_paterno = $persona->apellido_paterno;
        // $apellido_materno = $persona->apellido_materno;
        // $nombreCompleto = $nombre . ' ' . $apellido_paterno . ' ' . $apellido_materno;
        // $permi = Role::where('name', )->with('permissions')->first()->permissions;
        // $acceso=$permi
        $accesos = $role->permissions()
                ->with('acceso')
                ->get()
                ->pluck('acceso')
                ->filter()
                ->map(function ($acceso) {
                    return [
                        'id' => $acceso->id,
                        'url' => $acceso->url,
                        'label' => $acceso->label,
                        'icon' => $acceso->icon,
                        'depth' => $acceso->depth,
                        'parent_id' => $acceso->parent_id
                    ];
                });


        $data["id"]=$user["id"];
        $data["username"]=$user["name"];
        $data["trabajor_id"]=$user["trabajador_id"];
        // $data["trabajador"]=$trabajador;
        $data["accesos"]=$accesos;
        $data["token"]=$token;
        $data["persona"]=$persona;

        return response()->json($data,200);

    }
}
