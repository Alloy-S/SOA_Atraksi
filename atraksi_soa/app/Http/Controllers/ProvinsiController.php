<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProvinsiController extends Controller
{
    public function getProvinces()
    {
        // $provinces = Province::all();
        // return response()->json($provinces);
    }

    public function getProvinsi()
    {
        $provinsi = Http::withHeaders([
            'key' => '76f567ee91df772c42426d5af9987622'
        ])->get('https://api.rajaongkir.com/starter/province');
        // dd($provinsi->json());
        return json_decode(response()->json([
            'provinsi' => $provinsi['rajaongkir']['results'],
        ])->getContent());
    }

    public function getKota(Request $request)
    {
        $city = Http::withHeaders([
            'key' => '76f567ee91df772c42426d5af9987622'
        ])->get('https://api.rajaongkir.com/starter/city?province=' . $request['id']);
        // dd($provinsi->json());
        return response()->json(['cities' => $city['rajaongkir']['results']])->getContent();
    }
}
