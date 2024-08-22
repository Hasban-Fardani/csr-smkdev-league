<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AccordingCsr extends Component
{
    public $group;

    public function mount(): void
    {
        $this->group = 'group';
    }

    public function render()
    {
        return view('livewire.components.according-csr');
    }
}
