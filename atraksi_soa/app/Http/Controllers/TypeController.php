<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoretypeRequest;
use App\Http\Requests\UpdatetypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('type.index', [
            "types" => Type::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretypeRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:types',
        ]);


        Type::create($validatedData);

        return redirect('/types')->with('success', 'New Ticket Type has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('type.edit', [
            "type" => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetypeRequest $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:types',
        ]);

        Type::where('id', $type->id)->update($validatedData);
        return redirect('/types')->with('success', 'Type has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);
        return redirect('/types')->with('success', 'Type has been Deleted!');
    }
}
