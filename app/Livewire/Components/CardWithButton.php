<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardWithButton extends Component
{
    public $images;
    public $title;
    public $description;
    
    public $date;

    // link
    public $link;

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
