@extends('layouts.base_stor') @section('content')
    <div class="container">

        <form method="POST" action="/kewps3b/{{ $kewps3b->id }}">
            @method('put')
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-3 (B)</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tarikh</label>
                            <input class="form-control form-control-sm" type="date" name="tarikh"
                                value="{{ $kewps3b->tarikh }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">No Transaksi</label>
                            <input class="form-control form-control-sm" type="text" name="no_transaksi"
                                value="{{ $kewps3b->no_transaksi }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Terima Daripada / Keluar Kepada</label>
                            <input class="form-control form-control-sm" type="text" name="terima_keluar"
                                value="{{ $kewps3b->terima_keluar }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Diterima</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima"
                                value="{{ $kewps3b->kuantiti_terima }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Harga Seunit Terima</label>
                            <input class="form-control form-control-sm" type="text" name="harga_seunit_terima"
                                value="{{ $kewps3b->harga_seunit_terima }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Jumlah Harga Terima</label>
                            <input class="form-control form-control-sm" type="text" name="jumlah_harga_terima"
                                value="{{ $kewps3b->jumlah_harga_terima }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_keluar"
                                value="{{ $kewps3b->kuantiti_keluar }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Harga Jumlah Keluar</label>
                            <input class="form-control form-control-sm" type="text" name="harga_jumlah_keluar"
                                value="{{ $kewps3b->harga_jumlah_keluar }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Baki</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_baki"
                                value="{{ $kewps3b->kuantiti_baki }}">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Jumlah Harga Baki</label>
                            <input class="form-control form-control-sm" type="text" name="jumlah_harga_baki"
                                value="{{ $kewps3b->jumlah_harga_baki }}">
                        </div>

                        <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                    </div>
        </form>
    </div>


@endsection
