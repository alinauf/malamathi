<?php

namespace App\Http\Livewire\IslandCategory;

use App\SL\IslandCategorySL;
use Livewire\Component;
use Livewire\WithPagination;

class Islands extends Component
{

    use WithPagination;

    public $search;

    public $islandCategory;

    public function mount($islandCategory)
    {
        $this->islandCategory = $islandCategory;
    }

    public function render()
    {

        $service = new IslandCategorySL();
        $data = $service->islands($this->islandCategory->id, $this->search);
        return view('livewire.island-category.islands', ['islands' => $data]);
    }

}
