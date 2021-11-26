<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distrito;

class DistritoController extends Controller
{
    public function CrearDistrito(Request $request){
        $distrito = new Distrito();
        $distrito -> id_provincia = $request -> id_provincia;
        $distrito -> descripcion = $request -> descripcion;
        $distrito -> save();
        return 'Distrito Creado';
    }

    public function ObtenerDistrito($id_distrito){
        $distrito = Distrito::all();
        return response()->json($distrito);
    }

    public function ModificarDistrito(Request $request, $id_distrito){
        $distrito = Distrito::find($id_distrito);
        $distrito -> id_provincia = $request -> id_provincia;
        $distrito -> descripcion = $request -> descripcion;
        $distrito -> save();
        return 'Distrito Modificado';
    }

    public function EliminarDistrito($id_distrito){
        $distrito = Distrito::find($id_distrito);
        $distrito -> delete();
        return 'Distrito Eliminado';
    }
}
