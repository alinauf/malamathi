<?php

namespace App\Http\Controllers;

use App\Models\Atoll;
use App\SL\AtollSL;
use Illuminate\Http\Request;

class AtollController extends Controller
{

    private AtollSL $atollSL;

    public function __construct(AtollSL $atollSL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->atollSL = $atollSL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('atoll.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Atoll::class);

        return view('atoll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Atoll::class);

        $result = $this->atollSL->store($request->all());

        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        if ($result['status']) {
            return redirect('atoll')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Atoll $atoll)
    {
        return view('atoll.show', compact('atoll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atoll $atoll)
    {
        $this->authorize('update', $atoll);
        return view('atoll.edit', compact('atoll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atoll $atoll)
    {
        $this->authorize('update', $atoll);

        $result = $this->atollSL->update($atoll->id, $request->all());

        if ($result['status']) {
            return redirect('atoll')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atoll $atoll)
    {
        $this->authorize('delete', $atoll);
        $result = $this->atollSL->destroy($atoll->id);

        if ($result['status']) {
            return redirect('atoll')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
