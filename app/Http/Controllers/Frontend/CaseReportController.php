<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CaseReport;
use Illuminate\Http\Request;

class CaseReportController extends Controller
{
    public function index()
    {
        $cases = CaseReport::where('is_verified', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('frontend.case-reports.index', [
            'cases' => $cases,
        ]);
    }

    public function show(CaseReport $caseReport)
    {
        return view('frontend.case-reports.show', [
            'caseReport' => $caseReport,
        ]);
    }

    public function create()
    {
        return view('frontend.case-reports.create');
    }

}
