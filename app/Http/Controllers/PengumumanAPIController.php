<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanAPIController extends Controller
{
    public function index()
    {
      return Pengumuman::where('status','Aktif')->get();
    }
}
