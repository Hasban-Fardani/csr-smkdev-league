<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardWithButton extends Component
{
    public $images;
    public $title;
    public $description;

    // avatar section
    public $avatar;
    public $name;

    public function mount($images, $title, $description): void
    {
        $this->images = $images;
        $this->title = $title;
        $this->description = $description;
    }
    public function render()
    {
        return view('livewire.components.card-with-button');
    }
}
