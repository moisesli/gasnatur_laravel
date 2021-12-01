<?php

namespace App\Http\Livewire\Provincias;

use Livewire\Component;
use App\Models\Provincia;
use App\Models\Departamento;

class Provincias extends Component
{
    public $provincias, $descripcion, $id_provincia, $departamentos, $id_departamento;

    public $modal = false;

       
    public function render()
    {
        $this->provincias = Provincia::all();

       //$this->provincias = Provincia::select('departamentos.descripcion')
                //->join('departamentos', 'departamentos.id', '=', 'categories.user_id')
                //->get();
        
        return view('livewire.provincias.provincias');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->departamentos = Departamento::all();
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarCampos(){
        $this->id_provincia = '';
        $this->descripcion = '';
    }

    public function editar($id){
        $provincia = Provincia::findOrFail($id);
        $this->id_provincia = $id;
        $this->descripcion = $provincia->descripcion;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Provincia::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Provincia::updateOrCreate(['id'=>$this->id_provincia],
            [
                'descripcion' => $this->descripcion
            ]);
         
         session()->flash('message',
            $this->id_provincia ? '¡Actualización exitosa!' : '¡Alta Exitosa!');  
            
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
