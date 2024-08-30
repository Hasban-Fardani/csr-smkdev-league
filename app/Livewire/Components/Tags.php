<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Tags extends Component
{
    public $tag;
    public $class;

    public function mount($tag): void
    {
        $this->tag = $tag;
    }

    public function render()
    {
        return view('livewire.components.tags');
    }
}
