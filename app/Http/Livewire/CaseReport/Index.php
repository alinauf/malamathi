<?php

namespace App\Http\Livewire\CaseReport;

use App\SL\CaseReportSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $service = new CaseReportSL();
        $data = $service->index($this->search);
        return view('livewire.case-report.index', ['caseReports' => $data]);
    }

}
