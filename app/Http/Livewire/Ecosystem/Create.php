<?php

namespace App\Http\Livewire\Ecosystem;

use App\Models\Island;
use Livewire\Component;

class Create extends Component
{
    public $island_id;
    public $atoll_id;

    public $name;
    public $description;


    public $islands;
    public $atolls;

    public $is_documented;
    public $is_potentially_threatened;
    public $is_threatened;
    public $is_destroyed;

    public $latitude;
    public $longitude;


    public $formValidationStatus;

    protected $rules = [
        'atoll_id' => 'required',
        'island_id' => 'required',
        'name' => 'required|unique:ecosystems,name',
        'latitude' => ['nullable', 'regex:/^[-]?((([0-8]?[0-9])\.(\d+))|(90(\.0+)?))$/'],
        'longitude' => ['nullable', 'regex:/^[-]?((([0-9]?[0-9]|1[0-7][0-9])\.(\d+))|(180(\.0+)?))$/'],
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'atoll_id.required' => 'Select the atoll',
            'island_id.required' => 'Select the island',
            'latitude.regex' => 'Invalid latitude format. Please enter a valid latitude (-90 to 90).',
            'longitude.regex' => 'Invalid longitude format. Please enter a valid longitude (-180 to 180).',
        ];

    public function mount()
    {
        $this->formValidationStatus = false;
        $this->islands = \App\Models\Island::all();
        $this->atolls = \App\Models\Atoll::all();

        $this->is_documented = false;
        $this->is_potentially_threatened = false;
        $this->is_threatened = false;
        $this->is_destroyed = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedAtollId()
    {
        $this->islands = Island::where('atoll_id', $this->atoll_id)->get();
    }

    public function updatedIslandId()
    {
        $this->atoll_id = Island::find($this->island_id)->atoll_id;
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
        return view('livewire.ecosystem.create');
    }
}
