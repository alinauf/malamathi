<?php

namespace App\Http\Livewire\Ecosystem;

use App\Models\Island;
use Livewire\Component;

class Edit extends Component
{
    public $ecosystem;
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
        'name' => 'required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter the name',
            'atoll_id.required' => 'Select the atoll',
            'island_id.required' => 'Select the island',
        ];




    public function mount($ecosystem)
    {
        $this->ecosystem = $ecosystem;
        $this->formValidationStatus = false;
        $this->islands = \App\Models\Island::all();
        $this->atolls = \App\Models\Atoll::all();

        $this->atoll_id = $ecosystem->atoll_id;
        $this->island_id = $ecosystem->island_id;

        $this->name = $ecosystem->name;
        $this->description = $ecosystem->description;

        $this->is_documented = $ecosystem->is_documented;
        $this->is_potentially_threatened = $ecosystem->is_potentially_threatened;
        $this->is_threatened = $ecosystem->is_threatened;
        $this->is_destroyed = $ecosystem->is_destroyed;

        $this->latitude = $ecosystem->latitude;
        $this->longitude = $ecosystem->longitude;
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
        return view('livewire.ecosystem.edit');
    }
}
