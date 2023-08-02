<?php

namespace App\Http\Livewire\Zone;

use App\Models\Island;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $island_id;
    public $atoll_id;

    public $islands;
    public $atolls;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required',
        'atoll_id' => 'required',
        'island_id' => 'required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'atoll_id.required' => 'Select the atoll',
            'island_id.required' => 'Select the island',
        ];

    public function mount()
    {
        $this->formValidationStatus = false;
        $this->islands = \App\Models\Island::all();
        $this->atolls = \App\Models\Atoll::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedAtollId()
    {
        $this->islands = Island::where('atoll_id', $this->atoll_id)->get();
    }

    public function updatedIslandId()
    {
        $this->atoll_id = Island::find($this->island_id)->atoll_id;
    }

    public function validateForm()
    {
        if ($this->validate()) {
            $this->formValidationStatus = true;
        } else {
            $this->formValidationStatus = false;
        }
    }


    public function render()
    {
        return view('livewire.zone.create');
    }
}
