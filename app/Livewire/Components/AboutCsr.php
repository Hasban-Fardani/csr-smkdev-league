<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AboutCsr extends Component
{
    public $content;
    
    public function mount($content)
    {
        $this->content = $content;
    }
    
    public function render()
    {
        return view('livewire.components.about-csr');
    }
}
