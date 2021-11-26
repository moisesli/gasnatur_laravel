<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\DistritoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//---------------------------------DEPARTAMENTOS---------------------------------------------------------
Route::post('/Departamentos',[DepartamentoController::class, 'CrearDepartamento']);
Route::get('/Departamentos/{id_departamento}',[DepartamentoController::class, 'ObtenerDepartamento']);
Route::put('/Departamentos/{id_departamento}',[DepartamentoController::class, 'ModificarDepartamento']);
Route::delete('/Departamentos/{id_departamento}',[DepartamentoController::class, 'EliminarDepartamento']);

//---------------------------------PROVINCIAS-------------------------------------------------------------
Route::post('/Provincias',[ProvinciaController::class, 'CrearProvincia']);
Route::get('/Provincias/{idprovincia}',[ProvinciaController::class, 'ObtenerProvincia']);
Route::put('/Provincias/{idprovincia}',[ProvinciaController::class, 'ModificarProvincia']);
Route::delete('/Provincias/{idprovincia}',[ProvinciaController::class, 'EliminarProvincia']);

//---------------------------------DISTRITOS-------------------------------------------------------------
Route::post('/Distritos',[DistritoController::class, 'CrearDistrito']);
Route::get('/Distritos/{id_distrito}',[DistritoController::class, 'ObtenerDistrito']);
Route::put('/Distritos/{id_ditrito}',[DistritoController::class, 'ModificarDistrito']);
Route::delete('/Distritos/{id_distrito}',[DistritoController::class, 'EliminarDistrito']);