<?php

namespace App\Http\Livewire\Atoll;

use Livewire\Component;

class Create extends Component
{


    public $name;
    public $code;
    public $is_city;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required|unique:atolls,name',
        'code' => 'required|unique:atolls,code',
        'is_city' => 'nullable',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'code.required' => 'Enter the code',
        ];

    public function mount()
    {
        $this->formValidationStatus = false;
        $this->is_city = false;
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
        return view('livewire.atoll.create');
    }
}
