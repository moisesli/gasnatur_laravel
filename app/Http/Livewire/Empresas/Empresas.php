<?php

namespace App\Http\Livewire\Empresas;

use App\Models\Empresa;
use Livewire\Component;


class Empresas extends Component
{

  public $empresa = array(
    "id" => '',
    "ruc" => '',
    "razon_social" => '',
    "nombre_comercial" => '',
    "direccion" => '',
    "telefono" => '',
    "celular" => '',
    "correo" => '',
    "web" => '',
    "logo" => '',
    "estado" => '',
  );

  protected $rules = [
    'empresa.ruc' => 'required|string|min:6',
    'empresa.razon_social' => '',
    'empresa.nombre_comercial' => '',
    'empresa.direccion' => '',
    'empresa.telefono' => '',
    'empresa.celular' => '',
    'empresa.correo' => '',
    'empresa.web' => '',
    'empresa.logo' => '',
    'empresa.estado' => '',
  ];
  public $modal = false;

  public function guardar(){
    Empresa::updateOrCreate([],[]);
//    $this->validate();
//    $this->empresa->guardar();
  }

  public function editar($id){
    $empresa = Empresa::findOrFail($id);
    //dd($empresa);
    $this->empresa = $empresa;
    $this->openModal();
  }

  public function create(){
    $this->clear();
    $this->openModal();
  }

  public function clear(){
    $this->empresa = array_filter($this->empresa);
  }

  public function openModal(){
    $this->modal = true;
  }

  public function closeModal(){
    $this->modal = false;
  }

  public function closex(){
    $this->modal = false;
  }

  public function mount(){
    $this->empresas = Empresa::all();
  }

  public function render(){
    return view('livewire.empresas.empresas');
  }
}
