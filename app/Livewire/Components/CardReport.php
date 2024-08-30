<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardReport extends Component
{
    public $title;
    public $value;

    public function mount($title, $value): void
    {
        $this->title = $title;
        $this->value = $value;
    }

    public function render()
    {
        return view('livewire.components.card-report');
    }
}
