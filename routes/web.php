<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Empresas\Empresas;
use App\Http\Livewire\Departamentos\Departamentos;
use App\Http\Livewire\Provincias\Provincias;
use App\Http\Livewire\Distritos\Distritos;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
    //    return view('welcome');
});


  Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    // Empresas
    Route::get('/empresas',Empresas::class);

    // Departamentos
    Route::get('/departamentos', Departamentos::class);

    //Provincias
    Route::get('/provincias', Provincias::class);

    //Distritos
    Route::get('/distritos', Distritos::class);

    // DashBoard
    Route::get('/dashboard', function (){
      return view('dashboard');
    });

  });


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
