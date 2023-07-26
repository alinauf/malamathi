<?php

namespace App\Http\Livewire\IslandCategory;

use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $islandCategory;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
        ];

    public function mount($islandCategory)
    {
        $this->formValidationStatus = false;
        $this->name = $islandCategory->name;
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
        return view('livewire.island-category.edit');
    }
}
