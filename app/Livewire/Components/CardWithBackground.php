<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardWithBackground extends Component
{
    public $images;
    public $title;
    public $link;

    // OPTIONAL
    public $content;

    public function mount($images, $title): void
    {
        $this->images = $images;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.components.card-with-background');
    }
}
