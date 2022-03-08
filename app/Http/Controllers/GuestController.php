<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengumuman;


class GuestController extends Controller
{
    public function utamaView() {
        $context = [
            "pengumumans" => Pengumuman::where('status', 'Aktif')->get()
        ];
    
    
        return view('auth.utama', $context);
    }

    public function maklumbalasView() {
    
        return view('auth.maklum-balas');
    }

    public function utamaViewAuth() {
        $context = [
            "pengumumans" => Pengumuman::where('status', 'Aktif')->get()
        ];
    
    
        return view('auth.utama-auth', $context);
    }

    public function maklumbalasViewAuth() {
    
        return view('auth.maklum-balas-auth');
    }
}
