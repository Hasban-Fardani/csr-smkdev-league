<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardMitra extends Component
{
    // array of logo mitra
    public $logoMitra = [
        'logo-ipsum-1.png',
        'logo-ipsum-2.png',
        'logo-ipsum-3.png',
        'logo-ipsum-4.png',
        'logo-ipsum-5.png',
        'logo-ipsum-6.png',
        'logo-ipsum-7.png',
        'logo-ipsum-8.png',
        'logo-ipsum-9.png',
        'logo-ipsum-10.png',
    ];

    public function mount(): void
    {
        // initialize logo mitra
        $logoMitra = $this->logoMitra;
    }

    public function render()
    {
        return view('livewire.components.card-mitra');
    }
}
