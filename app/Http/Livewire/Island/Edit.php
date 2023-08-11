<?php

namespace App\Http\Livewire\Island;

use Livewire\Component;

class Edit extends Component
{
    public $island;


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
        'code' => 'required',
        'atoll_id' => 'required',
        'island_category_id' => 'required',
        'latitude' => ['nullable', 'regex:/^[-]?((([0-8]?[0-9])\.(\d+))|(90(\.0+)?))$/'],
        'longitude' => ['nullable', 'regex:/^[-]?((([0-9]?[0-9]|1[0-7][0-9])\.(\d+))|(180(\.0+)?))$/'],
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'code.required' => 'Enter the code',
            'atoll_id.required' => 'Select the island',
            'island_category_id.required' => 'Select the island category',
        ];

    public function mount($island)
    {
        $this->formValidationStatus = false;
        $this->island_categories = \App\Models\IslandCategory::all();
        $this->atolls = \App\Models\Atoll::all();


        $this->name = $island->name;
        $this->code = $island->code;
        $this->atoll_id = $island->atoll_id;
        $this->island_category_id = $island->island_category_id;

        $this->latitude = $island->latitude;
        $this->longitude = $island->longitude;
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
        return view('livewire.island.edit');
    }
}
