<?php

namespace App\Http\Livewire\Ecosystem;

use App\SL\EcosystemSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $service = new EcosystemSL();
        $data = $service->index($this->search);

        return view('livewire.ecosystem.index', ['ecosystems' => $data]);
    }

}
