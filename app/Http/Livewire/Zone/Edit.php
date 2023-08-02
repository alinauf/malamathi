<?php

namespace App\Http\Livewire\Zone;

use Livewire\Component;

class Edit extends Component
{

    public $zone;

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


    public function mount($zone)
    {
        $this->formValidationStatus = false;
        $this->islands = \App\Models\Island::all();
        $this->atolls = \App\Models\Atoll::all();


        $this->name = $zone->name;
        $this->island_id = $zone->island_id;
        $this->atoll_id = $zone->atoll_id;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
        return view('livewire.zone.edit');
    }
}
