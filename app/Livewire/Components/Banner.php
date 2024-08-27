<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Banner extends Component
{
    public $title;
    public $subtitle;
    public $position;
    public $breadcrumbs;

    public function mount($title, $subtitle, $breadcrumbs, $position): void
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->breadcrumbs = $breadcrumbs;
        $this->position = $position;
    }

    public function render()
    {
        return view('livewire.components.banner');
    }
}
