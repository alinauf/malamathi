<?php

namespace App\Http\Livewire\Plot;

use App\SL\IslandCategorySL;
use App\SL\PlotSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $service = new PlotSL();
        $data = $service->index($this->search);
        return view('livewire.plot.index', ['plots' => $data]);
    }


}
