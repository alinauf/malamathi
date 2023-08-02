<?php

namespace App\Http\Livewire\Plot;

use App\Models\Island;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;

    public $zone_id;
    public $zones;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required',
        'zone_id' => 'required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'zone_id.required' => 'Select the Zone',
        ];

    public function mount()
    {
        $this->formValidationStatus = false;
        $this->zones = \App\Models\Zone::all();

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
        return view('livewire.plot.create');
    }
}
