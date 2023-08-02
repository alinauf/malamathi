<?php

namespace App\Http\Livewire\Zone;

use App\SL\IslandCategorySL;
use App\SL\ZoneSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $service = new ZoneSL();
        $data = $service->index($this->search);
        return view('livewire.zone.index', ['zones' => $data]);
    }



}
