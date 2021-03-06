<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $icon;
    public $route;

    public function __construct($name, $icon, $route)
    {
      $this->name = $name;
      $this->icon = $icon;
      $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-item');
    }
}
