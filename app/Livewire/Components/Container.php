<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Container extends Component
{
    public $title;
    public $subtitle;
    public $class;

    public function mount($title, $subtitle, $class): void
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->class = $class;
    }

    public function render()
    {
        return view('livewire.components.container');
    }
}
