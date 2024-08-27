<?php

namespace App\Livewire\Components;

use Livewire\Component;

class According extends Component
{
    public $groupName;
    public $heading;
    public $content;
    
    public function render()
    {
        return view('livewire.components.according');
    }
}
