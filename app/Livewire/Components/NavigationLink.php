<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NavigationLink extends Component
{
    public $links = [
        ['url' => '/', 'label' => 'Beranda'],
        ['url' => '/about', 'label' => 'Tentang'],
        ['url' => '/activity', 'label' => 'Kegiatan'],
        ['url' => '/stats', 'label' => 'Statistik'],
        ['url' => '/sector', 'label' => 'Sektor'],
        ['url' => '/report', 'label' => 'Laporan'],
        ['url' => '/mitra', 'label' => 'Mitra'],
    ];
    
    public function render()
    {
        return view('livewire.components.navigation-link');
    }
}
