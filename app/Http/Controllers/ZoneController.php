<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\SL\ZoneSL;
use Illuminate\Http\Request;

class ZoneController extends Controller
{

    private ZoneSL $zoneSL;

    public function __construct(ZoneSL $zoneSL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->zoneSL = $zoneSL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('zone.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Zone::class);

        return view('zone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Zone::class);

        $request->validate([
            'atoll_id' => 'required',
            'island_id' => 'required',
            'name' => 'required',
        ]);

        $result = $this->zoneSL->store($request->all());

        if ($result['status']) {
            return redirect('zone')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        return view('zone.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zone $zone)
    {
        $this->authorize('update', $zone);
        return view('zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zone $zone)
    {
        $this->authorize('update', $zone);

        $result = $this->zoneSL->update($zone->id, $request->all());

        if ($result['status']) {
            return redirect('zone')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        $this->authorize('delete', $zone);
        $result = $this->zoneSL->destroy($zone->id);

        if ($result['status']) {
            return redirect('zone')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
