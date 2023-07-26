<?php

namespace App\Http\Livewire\IslandCategory;

use Livewire\Component;

class Create extends Component
{
    public $name;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required|unique:island_categories,name',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
        ];

    public function mount()
    {
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
        return view('livewire.island-category.create');
    }
}
