<?php

namespace App\Http\Livewire\CaseReport;

use Livewire\Component;

class Link extends Component
{
    public $caseReport;
    public $link;
    public $description;

    public $formValidationStatus;

    protected $rules = [
        'link' => 'required|url',
    ];

    protected $messages =
        [
            'link.required' => 'Enter the link',
        ];

    public function mount($caseReport)
    {
        $this->caseReport = $caseReport;
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
        return view('livewire.case-report.link');
    }
}
