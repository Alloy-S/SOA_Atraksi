<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Photo;
use App\Models\Atraksi;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreAtraksiRequest;
use App\Http\Requests\UpdateAtraksiRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

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
        return view('atraksi.create');
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
            'provinsi_name' => 'required',
            'kota' => 'required',
            'kota_name' => 'required',
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
            "provinsi" => $this->getProvinsi(),
            "kota" => $this->getKota2($atraksi->provinsi),
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
            'provinsi_name' => 'required',
            'kota' => 'required',
            'kota_name' => 'required',
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

        $photos = Photo::where('atraksi_id', $atraksi->id)->get();
        // dd($photos);
        foreach ($photos as $item) {
            File::delete($item->image);
        }

        Atraksi::destroy($atraksi->id);
        return redirect()->back()->with('success', 'Atraksi has been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Atraksi::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
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
        return json_decode(response()->json(['cities' => $city['rajaongkir']['results']])->getContent());
    }

    public function getKota2(int $request)
    {
        $city = Http::withHeaders([
            'key' => '76f567ee91df772c42426d5af9987622'
        ])->get('https://api.rajaongkir.com/starter/city?province=' . $request);
        // dd($provinsi->json());
        return json_decode(response()->json(['cities' => $city['rajaongkir']['results']])->getContent());
    }

    public function getAtraksiInfo()
    {

        $atraksi = Atraksi::first();
        $data = $atraksi;
        $data['photo'] = DB::table("photos")->select(['image', 'placeholder'])->where('atraksi_id', $atraksi->id)->get();
        $data['jam_nuka'] = DB::table("jam_bukas")->select(['hari', 'waktu', 'is_open'])->where('atraksi_id', $atraksi->id)->get();

        return response()->json($data, 200);
    }

    public function getAtraksiPaket()
    {

        $atraksi = Atraksi::first();

        $data['atraksi'] = [
            'atraksi_id' => $atraksi->title,
            'title' => $atraksi->title,
        ];
        $paket = $atraksi->paket;

        $pakets = [];
        foreach ($paket as $item) {
            $item->type;
            $tmp = $item;

            $pakets[] = $tmp;
        }

        $data['paket'] = $pakets;


        return response()->json($data, 200);
    }

    public function publishAtraksi(Request $request) {
        $atraksi = Atraksi::where('slug', $request->slug)->withCount('paket')->first();

        // $pakets = $atraksi->withCount('paket')->get();

        if($atraksi->paket_count > 0) {
            $paket = Paket::where('atraksi_id', $atraksi->id)->min('harga');
            $data = [
                'lowest_price' => $paket,
                'is_active' => true,
            ];

            $atraksi->update($data);

            return redirect('/atraksi')->with('success', 'Atraksi is Active');
        }
    }
}
