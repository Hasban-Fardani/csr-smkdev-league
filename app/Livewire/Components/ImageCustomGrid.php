<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ImageCustomGrid extends Component
{
    public $images;

    public function mount($images): void
    {
        $this->images = $images;
    }

    public function render()
    {
        return view('livewire.components.image-custom-grid');
    }
}
