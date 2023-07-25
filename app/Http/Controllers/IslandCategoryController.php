<?php

namespace App\Http\Controllers;

use App\Models\IslandCategory;
use App\SL\IslandCategorySL;
use Illuminate\Http\Request;

class IslandCategoryController extends Controller
{

    private IslandCategorySL $islandCategorySL;

    public function __construct(IslandCategorySL $islandCategorySL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->islandCategorySL = $islandCategorySL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('island-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', IslandCategory::class);

        return view('island-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', IslandCategory::class);

        $result = $this->islandCategorySL->store($request->all());

        $request->validate([
            'name' => 'required',
        ]);

        if ($result['status']) {
            return redirect('island-category')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(IslandCategory $islandCategory)
    {
        return view('island-category.show', compact('islandCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IslandCategory $islandCategory)
    {
        $this->authorize('update', $islandCategory);
        return view('island-category.edit', compact('islandCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IslandCategory $islandCategory)
    {
        $this->authorize('update', $islandCategory);

        $result = $this->islandCategorySL->update($islandCategory->id, $request->all());

        if ($result['status']) {
            return redirect('island-category')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IslandCategory $islandCategory)
    {
        $this->authorize('delete', $islandCategory);
        $result = $this->islandCategorySL->destroy($islandCategory->id);

        if ($result['status']) {
            return redirect('island-category')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
