<?php

namespace App\Http\Livewire\Empresas;

use App\Models\Empresa;
use Livewire\Component;


class Empresas extends Component
{

  public $empresa = array(
    "id" => '',
    "ruc" => '10425162530',
    "razon_social" => 'Margaretta McLaughlin Jr.',
    "nombre_comercial" => 'Florian Kovacek',
    "direccion" => '33890 Alison Alley Ursulaville, WA 66134',
    "telefono" => '484.583.2492',
    "celular" => '254-717-5551',
    "correo" => 'hills.elena@yahoo.com',
    "web" => 'http://www.leffler.info/consectetur-officia-et-cupiditate-rerum-enim-corporis.html',
    "logo" => 'https://via.placeholder.com/300x300.png/004499?text=cum',
    "estado" => 'pausado',
  );

  protected $rules = [
    'empresa.ruc' => 'required|string|min:6',
    'empresa.razon_social' => '',
    'empresa.nombre_comercial' => '',
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
    $this->limpiar();
    $this->openModal();
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
