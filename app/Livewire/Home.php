<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $groupModel;
    public $groupName;
    public $heading;
    public $content;
    public function render()
    {
        return view('livewire.home');
    }
}
