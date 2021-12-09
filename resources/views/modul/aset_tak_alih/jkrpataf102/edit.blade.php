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
                            <label for="">No Pendaftaran</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected value="{{ $jkrpataf102->jkrpataf68_id }}">
                                        {{ $jkrpataf102->jkrpataf68_id }}</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                        @if ($ata68->id != $jkrpataf102->jkrpataf68_id)
                                            <option value="{{ $ata68->id }}">{{ $ata68->id }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Ulasan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="ulasan"
                                    value="{{ $jkrpataf102->ulasan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Status Kawasan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="status_kawasan"
                                    value="{{ $jkrpataf102->status_kawasan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Status Pemilikan Tanah</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="status_pemilikan_tanah"
                                    value="{{ $jkrpataf102->status_pemilikan_tanah }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Struktur Fizikal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="stuktur_fizikal"
                                    value="{{ $jkrpataf102->stuktur_fizikal }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenis" value="{{ $jkrpataf102->jenis }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenama</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenama"
                                    value="{{ $jkrpataf102->jenama }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kapasiti</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kapasiti"
                                    value="{{ $jkrpataf102->kapasiti }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Bilangan Unit</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bilangan_unit"
                                    value="{{ $jkrpataf102->bilangan_unit }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Lain-Lain</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="lain_lain"
                                    value="{{ $jkrpataf102->lain_lain }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Harga Perolehan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="harga_perolehan"
                                    value="{{ $jkrpataf102->harga_perolehan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nilai Pasaran Semasa</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nilai_pasaran_semasa"
                                    value="{{ $jkrpataf102->nilai_pasaran_semasa }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Rumusan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="rumusan"
                                    value="{{ $jkrpataf102->rumusan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kaedah Pelupusan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kaedah_pelupusan"
                                    value="{{ $jkrpataf102->kaedah_pelupusan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Status Laporan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="status_laporan"
                                    value="{{ $jkrpataf102->status_laporan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Rujukan Kelulusan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan_kelulusan"
                                    value="{{ $jkrpataf102->no_rujukan_kelulusan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="from_page"
                                    value="{{ $jkrpataf102->from_page }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="to_page"
                                    value="{{ $jkrpataf102->to_page }}">
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
