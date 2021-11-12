<?php

namespace App\Http\Controllers;

class OtherController extends Controller
{
    public function modul_index()
    {
        return view('modul.index');
    }

    public function aset_alih_index()
    {
        return view('modul.aset_alih.index');
    }

    public function aset_tak_alih_index()
    {
        return view('modul.aset_tak_alih.index');
    }

    public function aset_tak_ketara_index()
    {
        return view('modul.aset_tak_ketara.index');
    }

    public function umum_index()
    {
        return view('modul.umum.index');
    }

    public function stor_index()
    {
        return view('modul.stor.index');
    }

}
