<?php

namespace App\Http\Livewire\Distritos;

use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Departamento;

class Distritos extends Component
{
    public $distritos, $descripcion, $idDistrito; 
    public $provincias, $codigoProvincia, $idProvincia;
    public $departamentos, $codigoDepartamento, $departamento;  

    public $selectedDepartamento = null, $selectedProvincia = null, $selectedDistrito = null;
    public $provincia = null, $distrito = null;

    public $modal = false;

     public function render()
    {
        $this->distritos = Distrito::select('distritos.id', 'provincias.descripcion AS nombreProvincia', 'departamentos.descripcion AS nombreDepartamento', 'distritos.descripcion') // campos que quiero mostrar
        ->join('provincias', 'distritos.codigoProvincia', '=', 'provincias.id') //tabla 1 con quien relaciono y las columnas que relaciono
        ->join('departamentos', 'provincias.codigoDepartamento', '=', 'departamentos.id') //tabla 2 con quien relaciono y las columnas que relaciono
        ->orderBy("departamentos.descripcion","ASC")
        ->orderBy("provincias.descripcion","ASC")
        ->orderBy("distritos.descripcion","ASC")
        ->get(); //obtengo los campos
        //$this->provincias = [];
        
        $this->departamentos = Departamento::all();
        
        return view('livewire.distritos.distritos');
    }

    public function updatedselectedDepartamento($departamento_id){
        $this->provincias = Provincia::where('codigoDepartamento',sprintf('%02d',$departamento_id))->get();
    }

    public function listarDepartamentos($value){
        $this->codigoDepartamento = $value;
    }

    public function listarProvincias($value){
        $this->codigoProvincia = $value;
    }
    

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function limpiarCampos(){
        $this->codigoDepartamento = '';
        $this->codigoProvincia = '';
        $this->idDistrito = '';
        $this->descripcion = '';
    }

    public function abrirModal(){

        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }
    
    

    public function editar($id){
        $distrito = Distrito::findOrFail($id);
   //variables llenadas // = //tabla en la BD
        $this->idDistrito = substr($id, -4);
        $this->descripcion = $distrito->descripcion;
        $this->codigoProvincia = $distrito->codigoProvincia;
        $this->abrirModal();
    }

    public function borrar($idDistrito)
    {
        Distrito::find($idDistrito)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        $codigoDistrito = sprintf('%04d',$this->codigoProvincia) . sprintf('%02d',$this->idDistrito);

        if(!is_numeric($this->idDistrito)){
            return;
        }
        Distrito::updateOrCreate(
            [   'id'=>$codigoDistrito],
            [    
                'descripcion' => $this->descripcion,
                'codigoProvincia'=>sprintf('%04d',$this->codigoProvincia)
            ]);
         
         session()->flash('message',
            $codigoDistrito ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }

}
