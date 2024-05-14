<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    public function getProvinces()
    {
        // $provinces = Province::all();
        // return response()->json($provinces);
    }

    public function getCities($provinceId)
    {
        $cities = DB::table('tbl_kabkot')->where('provinsi_id', $provinceId)->get();
        return response()->json($cities);
    }
}
