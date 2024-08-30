<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\RealizationSectorPie;
use App\Filament\Admin\Widgets\RealizationTotalPercentPT;
use App\Filament\Admin\Widgets\RealizationTotalPercentSubdistrict;
use App\Filament\Admin\Widgets\RealizationTotalSector;
use App\Models\Sector;
use App\Models\User;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Carbon\Carbon;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    protected static ?string $navigationIcon = '';

    protected static string $view = 'filament.admin.pages.dashboard';

    protected static ?string $title = '';

    protected static ?string $navigationLabel = 'Dashboard';

    public $selectedYear = '';
    public $selectedKuartal = '';
    public $selectedSector = '';
    public $selectedPartner = '';

    public $availableYears = [];

    public $availableQuarters = ['Kuartal 1', 'Kuartal 2', 'Kuartal 3', 'Kuartal 4'];

    public $sectors = [];
    public $partners = [];

    public $totalProjects;
    public $completedProjects;
    public $partnersCount;
    public $totalFunds;

    public function mount()
    {
        $this->sectors = Sector::all();
        $this->partners = User::where('role', 'partner')->get();
        
        // Mengambil tahun-tahun yang tersedia dari tabel projects
        $this->availableYears = Project::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->filter() // Menghapus nilai null
            ->map(fn($year) => (string)$year) // Mengkonversi ke string
            ->toArray();

        $this->updateDashboardData();
    }

    public function updateDashboardData()
    {
        $query = Project::query();

        if ($this->selectedYear) {
            $query->whereYear('created_at', $this->selectedYear);
        }

        if ($this->selectedKuartal) {
            $quarter = substr($this->selectedKuartal, -1);
            $query->whereRaw('QUARTER(created_at) = ?', [$quarter]);
        }

        if ($this->selectedSector) {
            $query->where('sector_id', $this->selectedSector);
        }

        if ($this->selectedPartner) {
            $query->whereHas('reports', function ($q) {
                $q->where('partner_id', $this->selectedPartner);
            });
        }

        $this->totalProjects = $query->count();
        
        // Proyek yang telah selesai adalah proyek dengan end_date sebelum atau sama dengan hari ini
        $this->completedProjects = $query->where('end_date', '<=', Carbon::now())->count();
        
        $this->partnersCount = User::where('role', 'partner')->count();
        
        // Menghitung total funds dari tabel reports yang terhubung dengan projects
        $this->totalFunds = Report::whereIn('project_id', $query->pluck('id'))
                                  ->where('status', 'diterima')
                                  ->sum('funds');
    }

    public function updatedSelectedYear()
    {
        $this->updateDashboardData();
    }

    public function updatedSelectedKuartal()
    {
        $this->updateDashboardData();
    }

    public function updatedSelectedSector()
    {
        $this->updateDashboardData();
    }

    public function updatedSelectedPartner()
    {
        $this->updateDashboardData();
    }

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('year')
                            ->label('Tahun')
                            ->options(array_combine($this->availableYears, $this->availableYears)) // Memastikan key dan value adalah string
                            ->reactive(),
                        Select::make('quarter')
                            ->label('Kuartal')
                            ->options($this->availableQuarters)
                            ->reactive(),
                        Select::make('sector')
                            ->label('Sektor')
                            ->options(Sector::pluck('name', 'id')->toArray())
                            ->reactive(),
                        Select::make('partner')
                            ->label('Partner')
                            ->options(User::where('role', 'partner')->pluck('name', 'id')->toArray())
                            ->reactive(),
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
