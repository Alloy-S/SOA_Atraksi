<?php

namespace App\Http\Controllers;

use App\Models\JamBuka;
use App\Http\Requests\StoreJamBukaRequest;
use App\Http\Requests\UpdateJamBukaRequest;

class JamBukaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jamBuka = jam_bukas::all();

        return view('jambuka.index', compact('jamBuka'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jambuka.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJamBukaRequest $request)
    {
        jam_bukas::create($request -> validated());
        return redirect()->route('jambuka.index')->with('success', 'Jam buka created');
    }

    /**
     * Display the specified resource.
     */
    public function show(JamBuka $jamBuka)
    {
        return view('jamBuka.show', compact('jamBuka'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JamBuka $jamBuka)
    {
        return view('jamBuka.edit', compact('jamBuka'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJamBukaRequest $request, JamBuka $jamBuka)
    {
        $jamBuka->update($request->validated());
        return redirect()->route('jamBuka.index')->with('success', 'Jam Buka updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JamBuka $jamBuka)
    {
         $jamBuka->delete();
         return redirect()->route('jamBuka.index')->with('success', 'Jam Buka deleted successfully.');
    }
}
