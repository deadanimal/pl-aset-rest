@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.F10/2</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf102">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Verifikasi Dan Perakuan Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">No Dpa</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                            <option value="{{ $ata68->no_dpa }}">{{ $ata68->no_dpa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Ulasan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="ulasan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Status Kawasan</label>
                            <div class="input-group">
                                <select class="form-control" name="status_kawasan">
                                    <option selected>Pilih</option>
                                    <option value="Warta">Warta</option>
                                    <option value="Tidak Diwartakan">Tidak Diwartakan</option>
                                    <option value="Dalam Proses Pewartaan">Dalam Proses Pewartaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Status Pemilikan Tanah</label>
                            <div class="input-group">
                                <select class="form-control" name="status_pemilikan_tanah">
                                    <option selected>Pilih</option>
                                    <option value="Hak Milik">Hak Milik</option>
                                    <option value="Rizab">Rizab</option>
                                    <option value="Sementara">Sementara</option>
                                    <option value="Tumpangan">Tumpangan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Struktur Fizikal</label>
                            <div class="input-group">
                                <select class="form-control" name="stuktur_fizikal">
                                    <option selected>Pilih</option>
                                    <option value="Sementara">Sementara</option>
                                    <option value="Separuh Kekal">Separuh Kekal</option>
                                    <option value="Kekal">Kekal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenis" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenama</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenama" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kapasiti</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kapasiti" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Bilangan Unit</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="bilangan_unit" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Lain-Lain</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="lain_lain" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Harga Perolehan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="harga_perolehan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nilai Pasaran Semasa</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nilai_pasaran_semasa" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Rumusan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="rumusan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kaedah Pelupusan</label>
                            <div class="input-group">
                                <select class="form-control" name="kaedah_pelupusan">
                                    <option selected>Pilih</option>
                                    <option value="1">Roboh</option>
                                    <option value="2">Jualan / Pindahan / Hadiah</option>
                                    <option value="3">Pindah milik / Pelepasan / Penyerahan balik / Pajakan</option>
                                    <option value="4">Tukar guna</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Status Laporan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="status_laporan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Rujukan Kelulusan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan_kelulusan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="from_page" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="to_page" value="">
                            </div>
                        </div>


                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
