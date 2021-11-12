@extends('layouts.base') @section('content')
    <div class="container">
        <form method="POST" action="/kewps5">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-5</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <div class="row col-6">
                        <input class="form-control form-control-sm" type="hidden" name="user_id"
                            value="{{ Auth::user()->id }}">
                        <div class="col-12 mt-2">
                            <label for="" class="col-form-label">No Kod</label>
                            <select class="form-select" name="kewps3a_id">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Jumlah beli tahun Lepas</label>
                            <input class="form-control form-control-sm" type="text" name="jumlah_beli_setahun_lepas">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Jumlah beli dua tahun lepas</label>
                            <input class="form-control form-control-sm" type="text" name="jumlah_beli_dua_tahun_lepas">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Peratusan</label>
                            <input class="form-control form-control-sm" type="text" name="peratusan">
                        </div>

                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
            </div>
        </form>
    </div>

@endsection
