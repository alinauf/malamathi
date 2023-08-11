<?php

namespace App\Http\Livewire\Island;

use Livewire\Component;

class Create extends Component
{
    public $name;
    public $code;
    public $atoll_id;
    public $island_category_id;

    public $island_categories;
    public $atolls;

    public $latitude;
    public $longitude;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required',
        'code' => 'required|unique:islands,code',
        'atoll_id' => 'required',
        'island_category_id' => 'required',
        'latitude' => ['nullable', 'regex:/^[-]?((([0-8]?[0-9])\.(\d+))|(90(\.0+)?))$/'],
        'longitude' => ['nullable', 'regex:/^[-]?((([0-9]?[0-9]|1[0-7][0-9])\.(\d+))|(180(\.0+)?))$/'],
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'code.required' => 'Enter the code',
            'atoll_id.required' => 'Select the atoll',
            'island_category_id.required' => 'Select the island category',
        ];

    public function mount()
    {
        $this->formValidationStatus = false;
        $this->island_categories = \App\Models\IslandCategory::all();
        $this->atolls = \App\Models\Atoll::all();
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
        return view('livewire.island.create');
    }
}
