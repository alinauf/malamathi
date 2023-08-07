<?php

namespace App\Http\Controllers;

use App\Models\CaseReport;
use App\Models\CaseReportLink;
use App\SL\CaseReportSL;
use Illuminate\Http\Request;

class CaseReportController extends Controller
{

    private CaseReportSL $caseReportSL;

    public function __construct(CaseReportSL $caseReportSL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->caseReportSL = $caseReportSL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('case-report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', CaseReport::class);

        return view('case-report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', CaseReport::class);

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
        $result = $this->caseReportSL->store($request->all());


        if ($result['status']) {
            return redirect('case-report')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseReport $caseReport)
    {
        return view('case-report.show', compact('caseReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseReport $caseReport)
    {
        $this->authorize('update', $caseReport);
        return view('case-report.edit', compact('caseReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseReport $caseReport)
    {
        $this->authorize('update', $caseReport);

        $result = $this->caseReportSL->update($caseReport->id, $request->all());

        if ($result['status']) {
            return redirect('case-report')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseReport $caseReport)
    {
        $this->authorize('delete', $caseReport);
        $result = $this->caseReportSL->destroy($caseReport->id);

        if ($result['status']) {
            return redirect('case-report')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

    public function addCaseLink(CaseReport $caseReport, Request $request)
    {
        $this->authorize('create', CaseReportLink::class);

        $request->validate([
            'link' => 'required|url',
        ]);

        $result = $this->caseReportSL->addCaseLink($caseReport->id, $request->all());

        if ($result['status']) {
            return redirect()->back()->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    public function destroyCaseLink(CaseReportLink $caseReportLink)
    {
        $caseReportId = $caseReportLink->case_report_id;
        $this->authorize('delete', $caseReportLink);

        $result = $this->caseReportSL->destroyCaseLink($caseReportLink->id);

        if ($result['status']) {
            return redirect('case-report/' . $caseReportId)->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

    public function verifyCaseReport(CaseReport $caseReport)
    {
        $this->authorize('verify', $caseReport);

        $result = $this->caseReportSL->verifyCaseReport($caseReport);

        if ($result['status']) {
            return redirect('case-report/' . $caseReport->id)->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

    public function unpublishCaseReport(CaseReport $caseReport)
    {
        $this->authorize('unpublish', $caseReport);

        $result = $this->caseReportSL->verifyCaseReport($caseReport, false);

        if ($result['status']) {
            return redirect('case-report/' . $caseReport->id)->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

}
