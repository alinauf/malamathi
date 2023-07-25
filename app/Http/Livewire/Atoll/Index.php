<?php

namespace App\Http\Livewire\Atoll;

use App\SL\AtollSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $service = new AtollSL();
        $data = $service->index($this->search);

        return view('livewire.atoll.index', ['atolls' => $data]);
    }


}
