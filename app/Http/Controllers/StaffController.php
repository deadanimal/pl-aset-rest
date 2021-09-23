<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
      return Staff::all();
    }

    public function store(Request $request)
    {
      $staff = new Staff;
      $staff->jawatan=$request->jawatan;
      $staff->nama=$request->nama;
      $staff->prima_facie=$request->prima_facie;
      $staff->ditahan_kerja=$request->ditahan_kerja;

      $staff -> save();



      return $staff;

      
    }

    public function show(Staff $staff)
    {
      return $staff;
    }

    public function update(Request $request, Staff $staff)
    {
      $staff->jawatan=$request->jawatan;
      $staff->nama=$request->nama;
      $staff->prima_facie=$request->prima_facie;
      $staff->ditahan_kerja=$request->ditahan_kerja;

      $staff -> save();


      return $staff;


    }

    public function destroy(Staff $staff)
    {
      return $staff->delete();
    }
}
