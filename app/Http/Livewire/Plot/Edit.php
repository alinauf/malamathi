<?php

namespace App\Http\Livewire\Plot;

use Livewire\Component;

class Edit extends Component
{

    public $plot;

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

    public function mount($plot)
    {
        $this->plot = $plot;
        $this->formValidationStatus = false;
        $this->zones = \App\Models\Zone::all();

        $this->name = $plot->name;
        $this->description = $plot->description ?? '';
        $this->zone_id = $plot->zone_id;

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
        return view('livewire.plot.edit');
    }
}
