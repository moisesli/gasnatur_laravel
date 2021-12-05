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

  public $modal = false;

  public function guardar(){
    Empresa::updateOrCreate([],[]);
//    $this->validate();
//    $this->empresa->guardar();
  }

  public function editar($id){
    $empresa = Empresa::findOrFail($id);
    //dd($empresa);
    $this->empresa['id'] = $empresa->id;
    $this->empresa['ruc'] = $empresa->ruc;
    $this->empresa['razon_social'] = $empresa->razon_social;
    $this->empresa['nombre_comercial'] = $empresa->nombre_comercial;
    $this->empresa['direccion'] = $empresa->direccion;
    $this->empresa['telefono'] = $empresa->telefono;
    $this->empresa['celular'] = $empresa->celular;
    $this->empresa['correo'] = $empresa->correo;
    $this->empresa['web'] = $empresa->web;
    $this->empresa['logo'] = $empresa->logo;
    $this->empresa['estado'] = $empresa->estado;
    $this->openModal();
  }

  public function create(){
    $this->clear();
    $this->openModal();
  }

  public function store(){
    Empresa::updateOrCreate(['id'=>$this->empresa['id']],[
      'ruc' => $this->empresa['ruc'],
      'razon_social' => $this->empresa['razon_social'],
      'nombre_comercial' => $this->empresa['nombre_comercial'],
      'direccion' => $this->empresa['direccion'],
      'telefono' => $this->empresa['telefono'],
      'celular' => $this->empresa['celular'],
      'correo' => $this->empresa['correo'],
      'web' => $this->empresa['web'],
      'logo' => $this->empresa['logo'],
      'estado' => $this->empresa['estado']
    ]);
    $this->empresas = Empresa::all();
    $this->closeModal();
  }

  public function clear(){
    $this->empresa['id'] = '';
    $this->empresa['ruc'] = '';
    $this->empresa['razon_social'] = '';
    $this->empresa['nombre_comercial'] = '';
    $this->empresa['direccion'] = '';
    $this->empresa['telefono'] = '';
    $this->empresa['celular'] = '';
    $this->empresa['correo'] = '';
    $this->empresa['web'] = '';
    $this->empresa['logo'] = '';
    $this->empresa['estado'] = '';
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
