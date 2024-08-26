<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Container extends Component
{
    public $title;
    public $subtitle;
    public $class;
    public $fontClass;

    public function render()
    {
        return view('livewire.components.container');
    }
}
