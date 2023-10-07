<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CaseReport;
use App\SL\CaseReportSL;
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

    /**
     * Store a newly created resource in storage.
     */
    public function guestStore(Request $request)
    {

        $caseReportSL = new CaseReportSL();

        $request->validate([
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
        ]);
        $result = $caseReportSL->store($request->all());




        if ($result['status']) {
            return redirect('/')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

}
