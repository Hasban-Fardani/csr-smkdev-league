<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Container extends Component
{
    public $title;
    public $subtitle;
    public $class;
    public $fontClass;

    public function mount($title): void
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.components.container');
    }
}
