<?php

namespace App\Http\Livewire\Departamentos;

use Livewire\Component;
use App\Models\Departamento;


class Departamentos extends Component
{
    public $departamentos, $descripcion, $id_departamento;

    public $modal = false;

    public function render()
    {
        $this->departamentos = Departamento::all();
        return view('livewire.departamentos.departamentos');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarCampos(){
        $this->id_departamento = '';
        $this->descripcion = '';
    }

    public function editar($id){
        $departamento = Departamento::findOrFail($id);
        $this->id_departamento = $id;
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
        Departamento::updateOrCreate(['id'=>$this->id_departamento],
            [
                'descripcion' => $this->descripcion
            ]);
         
         session()->flash('message',
            $this->id_departamento ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
