<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DataStats extends Component
{
    public $value;
    public $subtitle;

    public function mount($value, $subtitle): void
    {
        $this->value = $value;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('livewire.components.data-stats');
    }
}
