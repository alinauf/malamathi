<?php

namespace App\Http\Controllers;

use App\Models\Ecosystem;
use App\SL\EcosystemSL;
use Illuminate\Http\Request;

class EcosystemController extends Controller
{

    private EcosystemSL $ecosystemSL;

    public function __construct(EcosystemSL $ecosystemSL)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->ecosystemSL = $ecosystemSL;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $markers = Ecosystem::all()->map(function ($ecosystem) {


            $status = 'NA';
            if ($ecosystem->is_destroyed) {
                $status = 'Destroyed';
            } elseif ($ecosystem->is_threatened && !$ecosystem->is_destroyed) {
                $status = 'Threatened';
            } elseif ($ecosystem->is_potentially_threatened &&
                !$ecosystem->is_threatened &&
                !$ecosystem->is_destroyed) {
                $status = 'Potentially Threatened';
            } elseif ($ecosystem->is_documented) {
                $status = 'Documented';
            }
            return [
                'id' => $ecosystem->id,
                'name' => $ecosystem->name,
                'latitude' => $ecosystem->latitude,
                'longitude' => $ecosystem->longitude,
                'status' => $status,
                'url' => '/ecosystem/' . $ecosystem->id,
            ];
        });

        return view('ecosystem.index', compact('markers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Ecosystem::class);

        return view('ecosystem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Ecosystem::class);

        $request->validate([
            'atoll_id' => 'required',
            'island_id' => 'required',
            'name' => 'required|unique:ecosystems,name',
            'latitude' => ['nullable', 'regex:/^[-]?((([0-8]?[0-9])\.(\d+))|(90(\.0+)?))$/'],
            'longitude' => ['nullable', 'regex:/^[-]?((([0-9]?[0-9]|1[0-7][0-9])\.(\d+))|(180(\.0+)?))$/'],
        ]);

        $result = $this->ecosystemSL->store($request->all());

        if ($result['status']) {
            return redirect('ecosystem')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ecosystem $ecosystem)
    {
        return view('ecosystem.show', compact('ecosystem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ecosystem $ecosystem)
    {
        $this->authorize('update', $ecosystem);
        return view('ecosystem.edit', compact('ecosystem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ecosystem $ecosystem)
    {
        $this->authorize('update', $ecosystem);

        $result = $this->ecosystemSL->update($ecosystem->id, $request->all());

        if ($result['status']) {
            return redirect('ecosystem')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ecosystem $ecosystem)
    {
        $this->authorize('delete', $ecosystem);
        $result = $this->ecosystemSL->destroy($ecosystem->id);

        if ($result['status']) {
            return redirect('ecosystem')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
