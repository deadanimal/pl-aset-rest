<?php

namespace App\Http\Controllers;

use App\Models\KodStor;
use App\Models\UnitUkuranStor;
use Illuminate\Http\Request;

class KodStorController extends Controller
{
    public function index()
    {
        $kod_stors = KodStor::all();
        $context = [
            "kod_stor" => $kod_stors,
            "unit_ukuran" => UnitUkuranStor::all(),
        ];

        return view('modul.umum.stor.index', $context);
    }
    public function store(Request $request)
    {
        $kod_stor = KodStor::create($request->all());
        $kod_stor->staff_id = $request->user()->id;

        return redirect('/kod-stor');
    }

    public function show(KodStor $kod_assets)
    {
        return $kod_assets;
    }

    public function update(Request $request, KodStor $kod_stor)
    {
        $kod_stor->update($request->all());

        return redirect('/kod-stor');

    }

    public function destroy(KodStor $kod_stor)
    {
        $kod_stor->delete();
        return redirect('/kod-stor');
    }
    public function generatePDF(KodStor $kodstor)
    {
        dd($kodstor);
    }
}
