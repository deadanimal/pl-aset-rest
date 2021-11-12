@extends('layouts.base') @section('content')
    <div class="container">
        <form method="POST" action="/kewps3b">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-3b</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input class="form-control form-control-sm" type="hidden" name="user_id"
                            value="{{ Auth::user()->id }}">
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tarikh</label>
                            <input class="form-control form-control-sm" type="date" name="tarikh">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">No Transaksi</label>
                            <input class="form-control form-control-sm" type="text" name="no_transaksi">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Terima Daripada / Keluar Kepada</label>
                            <input class="form-control form-control-sm" type="text" name="terima_keluar">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Diterima</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Harga Seunit Terima</label>
                            <input class="form-control form-control-sm" type="text" name="harga_seunit_terima">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Jumlah Harga Terima</label>
                            <input class="form-control form-control-sm" type="text" name="jumlah_harga_terima">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_keluar">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Harga Jumlah Keluar</label>
                            <input class="form-control form-control-sm" type="text" name="harga_jumlah_keluar">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Baki</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_baki">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Jumlah Harga Baki</label>
                            <input class="form-control form-control-sm" type="text" name="jumlah_harga_baki">
                        </div>

                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
            </div>
        </form>
    </div>



@endsection
