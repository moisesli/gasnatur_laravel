<?php

namespace App\Http\Livewire\Departamentos;

use Livewire\Component;
use App\Models\Departamento;


class Departamentos extends Component
{
    public $departamentos, $descripcion, $codigoDepartamento, $esNuevo;

    public $modal = false;

    public function render()
    {
        $this->departamentos = Departamento::all();
        return view('livewire.departamentos.departamentos');
    }

    public function crear(){
        $this->esNuevo = true; 
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function limpiarCampos(){
        $this->codigoDepartamento = '';
        $this->descripcion = '';
    }


    public function abrirModal(){
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    

    public function editar($id){
        $departamento = Departamento::findOrFail($id);
        $this->codigoDepartamento = $id;
        $this->esNuevo = false;
        $this->descripcion = $departamento->descripcion;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Departamento::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Departamento::updateOrCreate(['id'=>$this->codigoDepartamento],
            [
                'descripcion' => $this->descripcion
            ]);
         
         session()->flash('message',
            $this->codigoDepartamento ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
