<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AccordionGroup extends Component
{
    public $groupModel;
    public $groupName;
    public $heading;
    public $content;

    public function render()
    {
        return view('livewire.components.accordion-group');
    }
}
