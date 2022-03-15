<?php

namespace App\Http\Controllers;

use App\Models\KodStor;
use App\Models\UnitUkuranStor;
use Illuminate\Http\Request;

class KodStorController extends Controller
{
    public function index(Request $request)
    {

        $kategori_stor = $request->kategori;
        $no_kad = $request->nokad;

        $kod_stors = KodStor::where('kod_stor', $kategori_stor)->get();
        $context = [
            "kod_stor" => $kod_stors,
            "unit_ukuran" => UnitUkuranStor::all(),
            "kategori" => $kategori_stor,
            "no_kad" => $no_kad,
        ];

        return view('modul.umum.stor.index', $context);
    }
    public function store(Request $request)
    {
        $kod_stor = KodStor::create($request->all());
        $kod_stor->staff_id = $request->user()->id;

        // return redirect('/kod-stor');
        return redirect()->back();
    }

    public function show(KodStor $kod_assets)
    {
        return $kod_assets;
    }

    public function update(Request $request, KodStor $kod_stor)
    {
        $kod_stor->update($request->all());

        // return redirect('/kod-stor');
        return redirect()->back();


    }

    public function destroy(KodStor $kod_stor)
    {
        $kod_stor->delete();
        return redirect()->back();

    }
    public function generatePDF(KodStor $kodstor)
    {
        dd($kodstor);
    }
}
