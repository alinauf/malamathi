<?php

namespace App\Http\Livewire\CaseReport;

use App\Models\Ecosystem;
use App\Models\Island;
use Livewire\Component;
use  Spatie\MediaLibraryPro\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    use WithMedia;

    public $caseReport;

    public $atolls;
    public $islands;
    public $ecosystems;

    public $island_id;
    public $atoll_id;
    public $ecosystem_id;

    public $title;
    public $statement;

    public $submitted_by;
    public $phone;
    public $email;

    public $latitude;
    public $longitude;

    public $formValidationStatus;

    public $uploads = [];

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

    public function mount($caseReport)
    {
        $this->formValidationStatus = false;
        $this->islands = \App\Models\Island::all();
        $this->atolls = \App\Models\Atoll::all();
        $this->ecosystems = \App\Models\Ecosystem::all();

        $this->caseReport = $caseReport;

        $this->atoll_id = $caseReport->atoll_id;
        $this->island_id = $caseReport->island_id;
        $this->ecosystem_id = $caseReport->ecosystem_id;

        $this->title = $caseReport->title;
        $this->statement = $caseReport->statement;

        $this->submitted_by = $caseReport->submitted_by;
        $this->phone = $caseReport->phone;
        $this->email = $caseReport->email;

        $this->latitude = $caseReport->latitude ?? 3.2028;
        $this->longitude = $caseReport->longitude ?? 73.2207;
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
    }

    public function updatedIslandId()
    {
        $this->atoll_id = Island::find($this->island_id)->atoll_id;
        $this->ecosystems = Ecosystem::where('atoll_id', $this->atoll_id)->get();
        $this->ecosystem_id = null;
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
        return view('livewire.case-report.edit');
    }
}
