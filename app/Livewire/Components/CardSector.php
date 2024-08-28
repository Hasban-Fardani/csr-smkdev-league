<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardSector extends Component
{
    public $images;
    public $title;

    // OPTIONAL
    public $content;
    public $address;
    public $date;

    public function mount($images, $title): void
    {
        $this->images = $images;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.components.card-sector');
    }
}
