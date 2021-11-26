<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciaController extends Controller
{
    public function CrearProvincia(Request $request){
        $provincia = new Provincia();
        $provincia -> id_departamento = $request -> id_departamento;
        $provincia -> descripcion = $request -> descripcion;
        $provincia -> save();
        return;
       }
    
       public function ObtenerProvincia($id_provincia){
        $provincia = Provincia::find($id_provincia);
        return response()->json($id_provincia);
       }
    
       public function ModificarProvincia(Request $request, $id_provincia){
        $provincia = Provincia::find($id_provincia);
        $provincia -> descripcion = $request -> descripcion;
        $provincia -> save();
        return 'Provincia Modificada';
       }
    
       public function EliminarProvincia($id_provincia){
           $provincia = Provincia::find($id_provincia);
           $provincia -> delete();
           return 'Provincia Eliminadoa';
       }
}
