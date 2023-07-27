<?php

namespace App\Http\Livewire\PopulationEntry;

use App\SL\PopulationEntrySL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $service = new PopulationEntrySL();
        $data = $service->index($this->search);

        return view('livewire.population-entry.index', ['populationEntries' => $data]);
    }

}
