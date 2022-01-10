<?php

namespace App\Http\Controllers;

use App\Models\KodStor;

class HomeStorController extends Controller
{

    public function index()
    {
        return view('modul.stor.index', [
            'ks' => KodStor::all(),
        ]);
    }

}
