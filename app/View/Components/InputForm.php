<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputForm extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */

  public $type;
  public $name;
  public $placeholder;
  public $disabled;

  public function __construct($type = 'text',$name='',$placeholder='',$disabled='')
  {
    $this->type = $type;
    $this->name = $name;
    $this->placeholder = $placeholder;
    $this->

    disabled = $disabled;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.input-form');
  }
}
