<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alerta extends Component
{
    public $titulo;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo, $type)
    {
        $this->titulo = $titulo;
        $this->$type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alerta');
    }
}
