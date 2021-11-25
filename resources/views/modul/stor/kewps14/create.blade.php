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
                                <li class="breadcrumb-item"><a href="">kewps14</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps14">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Kedudukan Semasa</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Tahun</label>
                            <select class="form-control mb-3" name="tahun">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="">Baki Stok Akhir</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="baki_stok_akhir" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Sedia Ada Pertama</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_sediaada_pertama" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Sedia Ada Kedua</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_sediaada_kedua" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Sedia Ada Ketiga</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_sediaada_ketiga" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Sedia Ada Keempat</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_sediaada_keempat" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Terima Pertama</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_terima_pertama" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Terima Kedua</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_terima_kedua" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Terima Ketiga</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_terima_ketiga" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Terima Keempat</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_terima_keempat" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Keluar Pertama</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_keluar_pertama" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Keluar Kedua</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_keluar_kedua" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok keluar Ketiga</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_keluar_ketiga" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Stok Keluar Keempat</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_keluar_keempat" value="">
                            </div>
                        </div>


                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
