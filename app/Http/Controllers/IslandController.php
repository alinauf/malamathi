<?php

namespace App\Http\Controllers;

use App\Models\Island;
use App\SL\IslandSL;
use Illuminate\Http\Request;

class IslandController extends Controller
{

    private IslandSL $islandSL;

    public function __construct(IslandSL $islandSL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->islandSL = $islandSL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('island.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Island::class);

        return view('island.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Island::class);

        $result = $this->islandSL->store($request->all());

        $request->validate([
            'atoll_id' => 'required',
            'island_category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

        if ($result['status']) {
            return redirect('island')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Island $island)
    {
        return view('island.show', compact('island'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Island $island)
    {
        $this->authorize('update', $island);
        return view('island.edit', compact('island'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Island $island)
    {
        $this->authorize('update', $island);

        $result = $this->islandSL->update($island->id, $request->all());

        if ($result['status']) {
            return redirect('island')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Island $island)
    {
        $this->authorize('delete', $island);
        $result = $this->islandSL->destroy($island->id);

        if ($result['status']) {
            return redirect('island')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
