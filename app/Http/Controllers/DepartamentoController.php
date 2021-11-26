<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function CrearDepartamento(Request $request){
        $departamento = new Departamento();
        $departamento -> descripcion = $request -> descripcion;
        $departamento -> save();
        return 'Departamento Creado';
    }

    public function ObtenerDepartamento($id_departamento){
        $departamento = Departamento::all();
        return response()->json($departamento);
    }

    public function ModificarDepartamento(Request $request, $id_departamento){
        $departamento = Departamento::find($id_departamento);
        $departamento -> descripcion = $request -> descripcion;
        $departamento -> save();
        return 'Departamento Modificado ' .$id_departamento;
        
    }

    public function EliminarDepartamento($id_departamento){
        $departamento = Departamento::find($id_departamento);
        $departamento -> delete();
        return 'Departamento Eliminado';
    }
}
