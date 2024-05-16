<?php

namespace App\Http\Controllers;

use App\Models\Atraksi;
use App\Http\Requests\StoreAtraksiRequest;
use App\Http\Requests\UpdateAtraksiRequest;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AtraksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('atraksi.index', [
            "atraksi" => Atraksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('atraksi.create', [
            "provinsi" => DB::table('tbl_provinsi')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtraksiRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'deskripsi' => 'required',
            'info_penting' => 'required',
            'highlight' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gps_location' => 'required',
        ]);

        Atraksi::create($validatedData);
        return redirect('/atraksi')->with('success', 'New Atraksi has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atraksi $atraksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atraksi $atraksi)
    {
        return view('atraksi.edit', [
            'atraksi' => $atraksi,
            "provinsi" => DB::table('tbl_provinsi')->get(),
            "kota" => DB::table('tbl_kabkot')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtraksiRequest $request, Atraksi $atraksi)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'deskripsi' => 'required',
            'info_penting' => 'required',
            'highlight' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gps_location' => 'required',
        ]);

        Atraksi::where('id', $atraksi->id)->update($validatedData);
        return redirect('/atraksi')->with('success', 'data successfuly updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atraksi $atraksi)
    {
        Atraksi::destroy($atraksi->id);
        return redirect()->back()->with('success', 'Atraksi has been Deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Atraksi::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

}
