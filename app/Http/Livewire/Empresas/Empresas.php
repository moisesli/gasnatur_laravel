<?php

namespace App\Http\Livewire\Empresas;

use App\Models\Empresa;
use Livewire\Component;
use Illuminate\Support\Str;


class Empresas extends Component
{

  public $modal = false;
  public $empresa = array(
    "ruc" => '1234',
    "razon_social" => 'Razon social'
  );
  public $ruc = '';

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

  public function render()
  {
    $this->empresas = Empresa::all();
    return view('livewire.empresas.empresas');
  }
}
