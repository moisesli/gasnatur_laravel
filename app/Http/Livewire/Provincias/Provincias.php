<?php

namespace App\Http\Livewire\Provincias;

use Livewire\Component;
use App\Models\Provincia;
use App\Models\Departamento;

class Provincias extends Component
{
    public $provincias, $descripcion, $id_provincia, $departamentos, $departamento, $departamento_id, $combo_departamento;

    public $modal = false;

       
    public function render()
    {

        $this->provincias = Provincia::select('provincias.id','provincias.descripcion', 'departamentos.descripcion AS nombreDepartamento') // campos que quiero mostrar
        ->join('departamentos', 'provincias.departamento_id', '=', 'departamentos.id') //tabla con quien relaciono y las columnas que relaciono
        ->orderBy("departamentos.descripcion","ASC")
        ->orderBy("provincias.descripcion","ASC")
        ->get(); //obtengo los campos

        //return $data;
        $this->departamentos = Departamento::all();
        
        return view('livewire.provincias.provincias');
    }

    // //public function buscar(){

      
    //   //  $this->provincias =[];

    //     //$this->modal = true;
    //     return view('livewire.provincias.provincias');
    // //}

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
        $this->id_provincia = '';
        $this->descripcion = '';
    }

    public function editar($id){
        $provincia = Provincia::findOrFail($id);
        $this->id_provincia = $id;
        $this->descripcion = $provincia->descripcion;
        $this->departamento_id = $provincia -> departamento_id;
        $this->abrirModal();
    }

    public function borrar($idProvincia)
    {
        Provincia::find($idProvincia)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function changeEvent($value){
        $this->departamento_id = $value;
    }

    public function guardar()
    {
        
        Provincia::updateOrCreate(
            ['id'=>$this->id_provincia],
            ['descripcion' => $this->descripcion,
            'departamento_id'=> $this->departamento_id
            ]
        );
         
         session()->flash('message',
            $this->id_provincia ? '¡Actualización exitosa!' : '¡Alta Exitosa!');  
            
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
