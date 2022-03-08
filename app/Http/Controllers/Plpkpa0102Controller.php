<?php

namespace App\Http\Controllers;

use App\Models\Plpkpa0102;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Plpkpa0102Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.plpkpa0102.index', [
            'plpkpa0102' => Plpkpa0102::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.plpkpa0102.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->merge([
          'kerosakan' => json_encode($request->kerosakan),
          'catatan' => json_encode($request->catatan),
          'staff_id' => $request->user()->id,
        ]);


        Plpkpa0102::create($request->all());
        return redirect('/plpkpa0102');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function show(Plpkpa0102 $plpkpa0102)
    {

        $array_kerosakan = json_decode($plpkpa0102->kerosakan);
        $array_catatan = json_decode($plpkpa0102->catatan);

        $data_kerosakan = [];

        foreach (range(0, count($array_catatan) - 1) as $i) {
            $obj = (object)[];
            $obj->kerosakan = $array_kerosakan[$i];
            $obj->catatan = $array_catatan[$i];
            array_push($data_kerosakan, $obj);
        }

        return view('modul.aset_tak_alih.plpkpa0102.edit', [
            'plpkpa0102' => $plpkpa0102,
            'data_kerosakan' => $data_kerosakan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function edit(Plpkpa0102 $plpkpa0102)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plpkpa0102 $plpkpa0102)
    {
        $request->merge([
            'kerosakan' => json_encode($request->kerosakan),
            'catatan' => json_encode($request->catatan),
            'staff_id' => $request->user()->id,
          ]);

        $plpkpa0102->update($request->all());
        return redirect('plpkpa0102');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plpkpa0102 $plpkpa0102)
    {
        try {
            $plpkpa0102->delete();
            return redirect('plpkpa0102');
        }
        catch (\Exception $e) {
            return redirect('plpkpa0102');
        }
        
        
    }


    public function generatePdf(Request $request, $plpkpa0102)
    {
        $plpkpa0102 = Plpkpa0102::where('id', $plpkpa0102)->first();

        $array_kerosakan = json_decode($plpkpa0102->kerosakan);
        $array_catatan = json_decode($plpkpa0102->catatan);

        $combined_kerosakan_catatan = [];

        foreach(range(0, count($array_kerosakan)-1) as $i) {
            $obj_holder = (object)[];
            $obj_holder->kerosakan = $array_kerosakan[$i];
            $obj_holder->catatan = $array_catatan[$i];
            $obj_holder->lokasi = $plpkpa0102->lokasi;
            $obj_holder->no = $i + 1;
            array_push($combined_kerosakan_catatan, $obj_holder);
        }
        
        // add key to plpkpa0102 object for pdf render
        $plpkpa0102->data_kerosakan = $combined_kerosakan_catatan;

        // dd($plpkpa0102);

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/plpk0102', [$plpkpa0102]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "plpkpa0102",
        ];

        return view('modul.borang_viewer_ata', $context);
    }
}
