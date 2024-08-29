<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\RealizationSectorPie;
use App\Filament\Admin\Widgets\RealizationTotalPercentPT;
use App\Filament\Admin\Widgets\RealizationTotalPercentSubdistrict;
use App\Filament\Admin\Widgets\RealizationTotalSector;
use App\Models\Sector;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    protected static ?string $navigationIcon = '';

    protected static string $view = 'filament.pages.admin-dashboard';

    protected static ?string $title = '';

    protected static ?string $navigationLabel = 'Dashboard';

    public $selectedYear = '';
    public $selectedKuartal = '';
    public $selectedSector = '';
    public $selectedPartner = '';

    public $availableYears = [
        [
            'label' => '2022',
            'value' => 2022
        ],
        [
            'label' => '2021',
            'value' => 2021
        ]
    ];

    public $availableQuarters = ['Kuartal 1', 'Kuartal 2', 'Kuartal 3', 'Kuartal 4'];

    public $sectors = [];
    public $partners = [];

    public $totalProjects = 1000;
    public $completedProjects = 1000;
    public $partnersCount = 1000;
    public $totalFunds = 'Rp 10,000,000';

    public function mount()
    {
        $this->sectors = Sector::all();
        $this->partners = User::where('role', 'partner')->get();
    }
 
    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('year')
                            ->label('Tahun')
                            ->options($this->availableYears),
                        Select::make('quarter')
                            ->label('Kuartal')
                            ->options($this->availableQuarters),
                        Select::make('sector')
                            ->label('Sektor')
                            ->options(['Sosial']),
                        Select::make('partner')
                            ->label('Partner')
                            ->options([]),
                        // ...
                    ])
                    ->columns(4),
            ]);
    }

    public function getWidgets(): array
    {
        return [
            RealizationSectorPie::class,
            RealizationTotalSector::class,
            RealizationTotalPercentPT::class,
            RealizationTotalPercentSubdistrict::class,
        ];
    }
}
