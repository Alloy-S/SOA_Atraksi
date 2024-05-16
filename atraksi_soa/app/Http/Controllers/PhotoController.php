<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Atraksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Support\Facades\File;

// use App\Http\Controllers\Exception;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Atraksi $atraksi)
    {
        return view('atraksi.photo.index', [
            "atraksi" => $atraksi,
            "photos" => Photo::where('atraksi_id', $atraksi->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Atraksi $atraksi)
    {

        // dd($request);
        $validatedData = $request->validate([
            'images.*' => 'required|image',
        ]);
        $atraksiID = $atraksi->id;
        // $imageData = [];
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $extenion = $file->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extenion;
                $path = 'upload/atraksi/image/';
                $file->move($path, $filename);
                $imageData = [
                    'atraksi_id' => $atraksiID,
                    'image' => $path . $filename,
                    'placeholder' => $file->getClientOriginalName(),
                ];
                Photo::create($imageData);
            }
            # code...
        }

        // dd($imageData);


        return redirect()->back()->with('success', 'Photos has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atraksi $atraksi, Photo $photo)
    {

        // dd($photo);

        // dd(asset($photo->image));
        if(File::exists($photo->image)) {
            File::delete($photo->image);
            Photo::destroy($photo->id);
        }



        return redirect()->back()->with('success', 'Photo has been Deleted!');
    }
}
