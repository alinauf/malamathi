<?php

namespace App\Http\Controllers;

use App\Models\PopulationEntry;
use App\SL\PopulationEntrySL;
use Illuminate\Http\Request;

class PopulationEntryController extends Controller
{

    private PopulationEntrySL $populationEntrySL;

    public function __construct(PopulationEntrySL $populationEntrySL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->populationEntrySL = $populationEntrySL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('population-entry.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', PopulationEntry::class);

        return view('population-entry.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', PopulationEntry::class);

        $result = $this->populationEntrySL->store($request->all());

        $request->validate([
            'atoll_id' => 'required',
            'island_id' => 'required',
            'men_count' => 'required',
            'women_count' => 'required',
            'local_count' => 'required',
            'expat_count' => 'required',
            'total_population' => 'required',
        ]);

        if ($result['status']) {
            return redirect('population-entry')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PopulationEntry $populationEntry)
    {
        return view('population-entry.show', compact('populationEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PopulationEntry $populationEntry)
    {
        $this->authorize('update', $populationEntry);
        return view('population-entry.edit', compact('populationEntry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PopulationEntry $populationEntry)
    {
        $this->authorize('update', $populationEntry);

        $result = $this->populationEntrySL->update($populationEntry->id, $request->all());

        if ($result['status']) {
            return redirect('population-entry')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PopulationEntry $populationEntry)
    {
        $this->authorize('delete', $populationEntry);
        $result = $this->populationEntrySL->destroy($populationEntry->id);

        if ($result['status']) {
            return redirect('population-entry')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
