<?php

namespace App\Http\Livewire\Distritos;

use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;

class Distritos extends Component
{
    public $distritos, $descripcion, $id_distrito; // $provincias;

    public $modal = false;

    public function render()
    {
        $this->distritos = Distrito::all();
        return view('livewire.distritos.distritos');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        //$this->provincias = Provincia::all();
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

    public function borrar($id)
    {
        Distrito::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
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
