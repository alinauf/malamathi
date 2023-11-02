<?php

namespace App\Http\Livewire\CaseReport;

use App\Models\Atoll;
use App\Models\Ecosystem;
use App\Models\Island;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $atolls;
    public $islands;
    public $ecosystems;

    public $island_id;
    public $atoll_id;
    public $ecosystem_id;

    public $island = null;
    public $atoll = null;
    public $ecosystem = null;

    public $title;
    public $statement;

    public $submitted_by;
    public $phone;
    public $email;

    public $latitude;
    public $longitude;

    public $formValidationStatus;

    public $form1;
    public $form2;
    public $form3;

    public $uploads;
    public $uploadedItems;


    public $mediaComponentNames = ['uploads'];

    public $captcha = null;
    public $captchaPassed = false;

    protected $rules = [
        'atoll_id' => 'required',
        'island_id' => 'required',
        'title' => 'required',
        'statement' => 'required',
        'phone' => [
            'nullable',
            'regex:/^(?:\+960)?\d{7}$/',
        ],
        'email' => 'nullable|email',
        'submitted_by' => 'nullable|string',
        'latitude' => ['nullable', 'regex:/^[-]?((([0-8]?[0-9])\.(\d+))|(90(\.0+)?))$/'],
        'longitude' => ['nullable', 'regex:/^[-]?((([0-9]?[0-9]|1[0-7][0-9])\.(\d+))|(180(\.0+)?))$/'],

    ];

    protected $messages =
        [
            'title.required' => 'Enter the case title',
            'statement.required' => 'Enter the case statement',
            'atoll_id.required' => 'Select the atoll',
            'island_id.required' => 'Select the island',
        ];

    public function mount()
    {
        //not required for backend user
        $this->captchaPassed = true;

        $this->formValidationStatus = false;
        $this->islands = \App\Models\Island::all();
        $this->atolls = \App\Models\Atoll::all();
        $this->ecosystems = \App\Models\Ecosystem::all();

        $this->latitude = 3.2028;
        $this->longitude = 73.2207;

        $this->submitted_by = Auth::user() ? Auth::user()->name : null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedAtollId()
    {
        $this->islands = Island::where('atoll_id', $this->atoll_id)->get();
        $this->ecosystems = Ecosystem::where('atoll_id', $this->atoll_id)->get();

        $this->ecosystem_id = null;
        $this->island_id = null;

        $this->atoll = \App\Models\Atoll::find($this->atoll_id);
        $this->island = null;
        $this->ecosystem = null;
    }

    public function updatedEcosystemId()
    {
        $this->ecosystem = Ecosystem::find($this->ecosystem_id);
        
        $this->island = Island::find($this->ecosystem->island_id);
        $this->island_id = $this->island->id;

        $this->atoll = Atoll::find($this->ecosystem->atoll_id);
        $this->atoll_id = $this->atoll->id;
    }

    public function updatedIslandId()
    {
        $this->atoll_id = Island::find($this->island_id)->atoll_id;
        $this->ecosystems = Ecosystem::where('atoll_id', $this->atoll_id)->get();
        $this->ecosystem_id = null;

        $this->island = Island::find($this->island_id);
        $this->atoll = $this->island->atoll;
        $this->ecosystem = null;

        //if island lat and long is not null, set lat and long to island lat and long
        if ($this->island->latitude != null && $this->island->longitude != null) {
            $this->latitude = $this->island->latitude;
            $this->longitude = $this->island->longitude;

            //call the function to update the map
            //todo this is not updating the map
            // $this->dispatch('dispatch', latitude:$this->latitude, longitude:$this->longitude);
        }
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
        return view('livewire.case-report.create');
    }
}
