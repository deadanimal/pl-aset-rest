<?php

namespace App\Http\Controllers;

use App\Models\KategoriStor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class KategoriStorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::getCurrentRoute()->getName();
        switch ($route) {
            case 'atp.index':
                $kategori = KategoriStor::where('kategori_stok', "Alat Tulis Pejabat")->get();
                $r = 'atp';
                break;
            case 'bap.index':
                $kategori = KategoriStor::where('kategori_stok', "Bekalan Am Pejabat")->get();
                $r = 'bap';
                break;
            case 'kss.index':
                $kategori = KategoriStor::where('kategori_stok', "Kod Stor Sepusat")->get();
                $r = 'kss';
                break;
        }

        return view('modul.umum.kategori_stor.index', [
            'kategori' => $kategori,
            'r' => $r,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $k = KategoriStor::create($request->all());
        $kategori = $this->toRedirect($k->kategori_stok);

        return redirect('/kategori-stor/' . $kategori);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriStor  $kategoriStor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriStor  $kategoriStor
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriStor $kategoriStor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriStor  $kategoriStor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $k = KategoriStor::find($id);
        $k->update($request->all());
        $kategori = $this->toRedirect($k->kategori_stok);
        return redirect('/kategori-stor/' . $kategori);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriStor  $kategoriStor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $k = KategoriStor::find($id);
        $k->delete();
        $kategori = $this->toRedirect($k->kategori_stok);
        return redirect('/kategori-stor/' . $kategori);

    }

    public function toRedirect($kategori_stok)
    {
        $kategori = match($kategori_stok) {
            "Alat Tulis Pejabat" => "alat-tulis-pejabat",
            "Bekalan Am Pejabat" => "bekalan-am-pejabat",
            "Kod Stor Sepusat" => "kod-stor-sepusat",
        };

        return $kategori;
    }

}
