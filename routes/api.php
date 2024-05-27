<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TrabajadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix("auth")->group(function(){
    Route::post('register',[AuthController::class,"register"]);
    Route::post("login",[AuthController::class,"login"]);
});

//Api Departamento

Route::controller(DepartamentoController::class)->group(function () {
    Route::get('/departamento', 'index');
    Route::get('/departamento/{id}', 'show');
    Route::post('/departamento', 'store');
    Route::put('/departamento/{id}', 'update');
    Route::delete('/departamento/{id}', 'destroy');
});

//Api ubicaciones

Route::get('/ubicacion', [DepartamentoController::class, "ubicacion"]);

//Api provincia

Route::controller(ProvinciaController::class)->group(function () {
    Route::get('/provincia', 'index');
    Route::get('/provincia/{id}', 'show');
    Route::post('/provincia', 'store');
    Route::put('/provincia/{id}', 'update');
    Route::delete('/provincia/{id}', 'destroy');
});

//Api distrito

Route::controller(DistritoController::class)->group(function () {
    Route::get('/distrito', 'index');
    Route::get('/distrito/{id}', 'show');
    Route::post('/distrito', 'store');
    Route::put('/distrito/{id}', 'update');
    Route::delete('/distrito/{id}', 'destroy');
});

//Api cliente

Route::controller(ClienteController::class)->group(function () {
    Route::get('/cliente', 'index');
    Route::get('/cliente/{id}', 'show');
    Route::post('/cliente', 'store');
    Route::put('/cliente/{id}', 'update');
    Route::delete('/cliente/{id}', 'destroy');
});

//Api trabajador

Route::controller(TrabajadorController::class)->group(function () {
    Route::get('/trabajador', 'index');
    Route::get('/trabajador/{id}', 'show');
    Route::post('/trabajador', 'store');
    Route::put('/trabajador/{id}', 'update');
    Route::delete('/trabajador/{id}', 'destroy');
});

//Api proyecto

Route::controller(ProyectoController::class)->group(function () {
    Route::get('/proyecto', 'index');
    Route::get('/proyecto/{id}', 'show');
    Route::post('/proyecto', 'store');
    Route::put('/proyecto/{id}', 'update');
    Route::delete('/proyecto/{id}', 'destroy');
});

//Api contrato

Route::controller(ContratoController::class)->group(function () {
    Route::get('/contrato', 'index');
    Route::get('/contrato/{id}', 'show');
    Route::post('/contrato', 'store');
    Route::put('/contrato/{id}', 'update');
    Route::delete('/contrato/{id}', 'destroy');
});


