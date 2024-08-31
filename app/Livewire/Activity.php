<?php

namespace App\Livewire;

use App\Models\Activity as ModelsActivity;
use Livewire\Component;

class Activity extends Component
{
    public $search = '';
    public $activities;

    public function mount(): void
    {
        $this->activities = ModelsActivity::where('is_draft', false)->orderBy('created_at', 'DESC')->take(4)->get();
    }

    // public function activities(): LengthAwarePaginator
    // {
    //     return ActivityModel::query()
    //         ->when($this->search, function ($query) {
    //             $query->where('name', 'like', '%' . $this->search . '%');
    //         })
    //         ->orderBy('created_at', 'DESC')
    //         ->paginate(4);
    // }

    public function render()
    {
        return view('livewire.activity', [
            'activities' => $this->activities
        ]);
    }
}
