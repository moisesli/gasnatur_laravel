<?php

namespace App\Http\Livewire\Provincias;

use Livewire\Component;
use App\Models\Provincia;
use App\Models\Departamento;

class Provincias extends Component
{
    public $provincias, $descripcion, $idProvincia;
    public $departamentos,$departamento, $codigoDepartamento;
    public $modal = false;

       
    public function render()
    {

        $this->provincias = Provincia::select('provincias.id','provincias.descripcion', 'departamentos.descripcion AS nombreDepartamento') // campos que quiero mostrar
        ->join('departamentos', 'provincias.codigoDepartamento', '=', 'departamentos.id') //tabla con quien relaciono y las columnas que relaciono
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
        $this->codigoDepartamento = ''; 
        $this->idProvincia = '';
        $this->descripcion = '';
    }

    public function editar($id){
        $provincia = Provincia::findOrFail($id);
        $this->idProvincia = substr($id, -2);
        $this->descripcion = $provincia->descripcion;
        $this->codigoDepartamento = $provincia -> codigoDepartamento;
        $this->abrirModal();
    }

    public function borrar($idProvincia)
    {
        Provincia::find($idProvincia)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function changeEvent($value){
        $this->codigoDepartamento = $value;
        
    }


    public function guardar()
    {
        
        $codigoProvincia =  sprintf('%02d',$this->codigoDepartamento) . sprintf('%02d',$this->idProvincia);
        if(!is_numeric($this->idProvincia)){
            return;
        }

        Provincia::updateOrCreate(  
            ['id'=>$codigoProvincia],
            ['descripcion' => $this->descripcion,
            'codigoDepartamento'=> sprintf('%02d',$this->codigoDepartamento)
            ]
        );
         
         session()->flash('message',
            $codigoProvincia ? '¡Actualización exitosa!' : '¡Alta Exitosa!');  
            
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
