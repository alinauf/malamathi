<?php

namespace App\Http\Livewire\Plot;

use Livewire\Component;

class Usage extends Component
{

    public $plot;
    public $owner_name;
    public $description;
    public $purpose;

    public $formValidationStatus;

    protected $rules = [
        'owner_name' => 'required',
        'purpose' => 'required',
    ];

    protected $messages =
        [
            'owner_name.required' => 'Enter the owner name',
            'purpose.required' => 'Enter the purpose',
        ];

    public function mount($plot)
    {
        $this->plot = $plot;
        $this->formValidationStatus = false;
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
        return view('livewire.plot.usage');
    }
}
