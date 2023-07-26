<?php

namespace App\Http\Livewire\IslandCategory;

use App\SL\IslandCategorySL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $service = new IslandCategorySL();
        $data = $service->index($this->search);
        return view('livewire.island-category.index', ['islandCategories' => $data]);
    }

}
