<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\eticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\EticketResource;
use App\Http\Requests\StoreeticketRequest;
use App\Http\Requests\UpdateeticketRequest;
use Illuminate\Support\Carbon;

use function Symfony\Component\Clock\now;

class EticketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return EticketResource::collection(eticket::all());
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
    public function store(StoreeticketRequest $request)
    {

        $paket = Paket::where('id', $request->paket_id)->first();

        if ($paket == null) {
            return response()->json("paket tidak ditemukan", 404);
        }

        $data = [];
        for ($i = 0; $i < $request->jml_ticket; $i++) {

            $eticket = [];
            $eticket['paket_id'] = $request->paket_id;
            $eticket['booking_code'] = $request->booking_code;
            $eticket['jenis'] = $paket->type->name;
            $eticket['ticket_code'] = strtoupper(Str::random(6));
            $eticket['valid_until'] = Carbon::now()->addDays($paket->masa_berlaku)->toDateString();

            $data[] = $eticket;

            $eticket = eticket::create($eticket);
        }
        // dd($data);

        $response['jml_ticket'] = $request->jml_ticket;
        $response['ticket'] = $data;

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(eticket $eticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(eticket $eticket)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateeticketRequest $request, eticket $eticket)
    {
        $eticket = eticket::where('id', $eticket->id)->update([
            "check_id" => Carbon::now()->toDateTimeString(),
        ]);



        return response()->json($eticket, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(eticket $eticket)
    {
        //
    }
}
