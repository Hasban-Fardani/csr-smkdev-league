<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardOnlyImage extends Component
{
    public $images;
    public $title;

    public $link;

    public function mount($images, $title): void
    {
        $this->images = $images;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.components.card-only-image');
    }
}
