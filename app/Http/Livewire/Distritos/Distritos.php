<?php

namespace App\Http\Livewire\Distritos;

use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;

class Distritos extends Component
{
    public $distritos, $descripcion, $id_distrito, $provincias, $provincia, $combo_provincia; 
    
    public $modal = false;

    public function render()
    {
        //$this->distritos = Distrito::all();
        $this->distritos = Distrito::select('distritos.descripcion', 'provincias.descripcion AS nombreProvincia', 'departamentos.descripcion AS nombreDepartamento') // campos que quiero mostrar
        ->join('provincias', 'distritos.provincia_id', '=', 'provincias.id') //tabla 1 con quien relaciono y las columnas que relaciono
        ->join('departamentos', 'provincias.departamento_id', '=', 'departamentos.id') //tabla 2 con quien relaciono y las columnas que relaciono
        ->get(); //obtengo los campos
        return view('livewire.distritos.distritos');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->provincias = Provincia::all();
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }
    
    public function limpiarCampos(){
        $this->id_distrito = '';
        $this->descripcion = '';
    }

    public function editar($id){
        $distrito = Distrito::findOrFail($id);
        $this->id_distrito = $id;
        $this->descripcion = $distrito->descripcion;
        $this->abrirModal();
    }

    public function borrar($idDistrito)
    {
        Distrito::find($idDistrito)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function changeEvent($value){
        $this->combo_provincia = $value;
    }

    public function guardar()
    {
        Distrito::updateOrCreate(['id'=>$this->id_distrito],
            [
                'descripcion' => $this->descripcion
            ]);
         
         session()->flash('message',
            $this->id_distrito ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }

}
