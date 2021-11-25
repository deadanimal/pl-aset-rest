@extends('layouts.base_stor') @section('content')
    <div class="container">

        <form method="POST" action="/kewps4/{{ $kewps4->id }}">
            @method('put')
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-4</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <div class="row col-6">
                        <input class="form-control form-control-sm" type="hidden" name="user_id"
                            value="{{ Auth::user()->id }}">
                        <div class="col-12 mt-2">
                            <label for="" class="col-form-label">No Kod</label>
                            <select class="form-select" name="kewps3a_id">
                                <option selected value="{{ $kewps4->kewps3a_id }}">{{ $kewps4->kewps3a_id }}</option>
                                @foreach ($kewps3a as $k3)
                                    @if ($k3->id != $kewps4->kewps3a_id)
                                        <option value="{{ $k3->id }}">{{ $k3->id }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Baki Semasa</label>
                            <input class="form-control" type="text" name="nilai_baki_semasa"
                                value="{{ $kewps4->nilai_baki_semasa }}">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Status Stok</label>
                            <select class="form-select" name="status_stok">
                                <option selected value="{{ $kewps4->status_stok }}">{{ $kewps4->status_stok }}</option>
                                @if ($kewps4->status_stok == 'Aktif')
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                    <option value="Kad Dibatalkan">Kad Dibatalkan</option>
                                @elseif($kewps4->status_stok == 'Tidak Aktif')
                                    <option value="Aktif">Aktif</option>
                                    <option value="Kad Dibatalkan">Kad Dibatalkan</option>
                                @elseif($kewps4->status_stok == 'Kad Dibatalkan')
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <button class="btn btn-primary mt-5" type="submit">Update</button>
                        </div>

                    </div>
        </form>
    </div>


@endsection
