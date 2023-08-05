<?php

namespace App\Http\Livewire\Zone;


use App\SL\ZoneSL;
use Livewire\Component;
use Livewire\WithPagination;

class Plots extends Component
{

    use WithPagination;

    public $search;

    public $zone;

    public function mount($zone)
    {
        $this->zone = $zone;
    }

    public function render()
    {

        $service = new ZoneSL();
        $data = $service->plots($this->zone->id, $this->search);
        return view('livewire.zone.plots', ['plots' => $data]);
    }

}
