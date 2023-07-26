<?php

namespace App\Http\Livewire\Island;

use App\SL\IslandSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $service = new IslandSL();
        $data = $service->index($this->search);

        return view('livewire.island.index', ['islands' => $data]);
    }


}
