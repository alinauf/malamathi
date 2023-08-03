<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Models\PlotUsage;
use App\SL\PlotSL;
use App\SL\PlotUsageSL;
use Illuminate\Http\Request;

class PlotController extends Controller
{

    private PlotSL $plotSL;

    public function __construct(PlotSL $plotSL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->plotSL = $plotSL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('plot.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Plot::class);

        return view('plot.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Plot::class);

        $result = $this->plotSL->store($request->all());

        $request->validate([
            'zone_id' => 'required',
            'name' => 'required',
        ]);

        if ($result['status']) {
            return redirect('plot')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plot $plot)
    {
        return view('plot.show', compact('plot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plot $plot)
    {
        $this->authorize('update', $plot);
        return view('plot.edit', compact('plot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plot $plot)
    {
        $this->authorize('update', $plot);

        $result = $this->plotSL->update($plot->id, $request->all());

        if ($result['status']) {
            return redirect('plot')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plot $plot)
    {
        $this->authorize('delete', $plot);
        $result = $this->plotSL->destroy($plot->id);

        if ($result['status']) {
            return redirect('plot')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

    public function destroyPlotUsage(PlotUsage $plotUsage)
    {
        $plotId = $plotUsage->plot_id;
        $this->authorize('delete', $plotUsage);
        $plotUsageSL = new PlotUsageSL();
        $result = $plotUsageSL->destroy($plotUsage->id);

        if ($result['status']) {
            return redirect('plot/'.$plotId)->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
