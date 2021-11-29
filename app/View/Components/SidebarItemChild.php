<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItemChild extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $url;
    public $icon;
    public function __construct($name, $url, $icon)
    {
        $this->name = $name;
        $this->url = $url;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-item-child');
    }
}
