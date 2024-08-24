<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ContactForm extends Component
{
    public $icon;
    public $title;
    public $content;

    public function mount($icon, $title, $content): void
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->content = $content;
    }
    
    public function render()
    {
        return view('livewire.components.contact-form');
    }
}
