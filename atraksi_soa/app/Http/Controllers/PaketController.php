<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Paket;
use App\Models\Atraksi;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Atraksi $atraksi)
    {
        return view('atraksi.paket.index', [
            'atraksi' => $atraksi,
            'paket' => Paket::where('atraksi_id', $atraksi->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Atraksi $atraksi)
    {
        return view('atraksi.paket.create', [
            'type' => Type::all(),
            'atraksi' => $atraksi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaketRequest $request, Atraksi $atraksi)
    {
        $validatedData = $request->validate([
            'atraksi_id' => 'required',
            'type_id' => 'required',
            'title' => 'required|max:255',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'cara_penukaran' => 'required',
            'syarat_dan_ketentuan' => 'required',
            'harga' => 'required|numeric',
            'harga_discount' => 'required|numeric',
            'masa_berlaku' => 'required|numeric',
            'is_refundable' => 'required',
        ]);

        // dd($validatedData);


        Paket::create($validatedData);
        return redirect('/atraksi/'.$atraksi->slug.'/paket')->with('success', 'New Paket has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atraksi $atraksi, Paket $paket)
    {
        return view('atraksi.paket.edit', [
            'paket' => $paket,
            'atraksi' => $atraksi,
            'type' => Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atraksi $atraksi, Paket $paket)
    {
        Paket::destroy($paket->id);
        return redirect()->back()->with('success', 'Paket has been Deleted!');
    }
}
