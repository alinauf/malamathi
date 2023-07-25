<?php

namespace App\Http\Livewire\Atoll;

use Livewire\Component;

class Edit extends Component
{
    public $atoll;

    public $name;
    public $code;
    public $is_city;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required',
        'code' => 'required',
        'is_city' => 'nullable',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'code.required' => 'Enter the code',
        ];

    public function mount($atoll)
    {
        $this->formValidationStatus = false;
        $this->name = $atoll->name;
        $this->code = $atoll->code;
        $this->is_city = $atoll->is_city;

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
        return view('livewire.atoll.edit');
    }
}
