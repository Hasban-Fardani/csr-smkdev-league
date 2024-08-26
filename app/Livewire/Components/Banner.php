<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Banner extends Component
{
    public $title;
    public $subtitle;
    public $breadcrumbs;

    public function mount($title, $subtitle, $breadcrumbs): void
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('livewire.components.banner');
    }
}
