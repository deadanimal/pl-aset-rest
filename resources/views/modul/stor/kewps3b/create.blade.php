@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Kew.ps-3(B)</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps3b">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Transaksi Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input class="form-control form-control-sm" type="hidden" name="user_id"
                            value="{{ Auth::user()->id }}">
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tarikh Transaksi</label>
                            <input class="form-control form-control-sm" type="date" name="tarikh">
                        </div>
                        {{-- <div class="col-6 mt-2">
                            <label class="col-form-label col-form-label-sm" for="">Verifikasi Stor</label>
                            <select class="form-control form-control-sm" name="no_transaksi">
                                <option selected>Pilih</option>
                                @foreach ($infokewps10 as $k10)
                                    <option value="{{ $k10->id }}">{{ $k10->id }} -
                                        {{ $k10->kewps10->kementerian }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-6 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">No Transaksi </label>
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
