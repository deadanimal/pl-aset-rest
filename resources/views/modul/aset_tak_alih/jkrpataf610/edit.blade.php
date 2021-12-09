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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/10</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf610/{{ $jkrpataf610->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Pendaftaran Premis & Maklumat Aset</h2>
                        </div>
                    </div>
                </div>

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian"
                                    value="{{ $jkrpataf610->kementerian }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Jabatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jabatan"
                                    value="{{ $jkrpataf610->jabatan }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Negeri</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="negeri"
                                    value="{{ $jkrpataf610->negeri }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Daerah</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="daerah"
                                    value="{{ $jkrpataf610->daerah }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Bulan</label>
                            <div class="input-group">
                                <input id="bulanata610" class="form-control" type="text" name="bulan"
                                    value="{{ $jkrpataf610->bulan }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tahun</label>
                            <div class="input-group">
                                <input id="tahunata610" class="form-control" type="text" name="tahun"
                                    value="{{ $jkrpataf610->tahun }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="">Kategori Aset</label>
                            <div class="input-group">
                                <select name="kategori_aset" class="form-control">
                                    <option {{ $jkrpataf610->kategori_aset == 1 ? 'selected' : '' }} value="1">Tanah
                                    </option>
                                    <option {{ $jkrpataf610->kategori_aset == 2 ? 'selected' : '' }} value="2">Bangunan
                                    </option>
                                    <option {{ $jkrpataf610->kategori_aset == 3 ? 'selected' : '' }} value="3">Jalan
                                    </option>
                                    <option {{ $jkrpataf610->kategori_aset == 4 ? 'selected' : '' }} value="4">
                                        Pembentungan
                                    </option>
                                    <option {{ $jkrpataf610->kategori_aset == 5 ? 'selected' : '' }} value="5">Saliran
                                    </option>
                                    <option {{ $jkrpataf610->kategori_aset == 6 ? 'selected' : '' }} value="6">Lain-lain
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($jkrpataf610->infojkrpataf610 as $infoata610)
                            <input type="hidden" name="infoata610_id[]" value="{{ $infoata610->id }}">
                            <div class="col-12 mt-5">
                                <h3>Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">No Pendaftaran</label>
                                <div class="input-group">
                                    <select name="jkrpataf68_id[]" class="form-control form-control-sm">
                                        @foreach ($jkrpataf68 as $ata68)
                                            <option {{ $ata68->id == $infoata610->jkrpataf68_id ? 'selected' : '' }}
                                                value="{{ $ata68->id }}">{{ $ata68->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Bil</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="bil[]"
                                        value="{{ $infoata610->bil }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">No PTP</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="no_ptp[]"
                                        value="{{ $infoata610->no_ptp }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">No Lot</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="no_lot[]"
                                        value="{{ $infoata610->no_lot }}">
                                </div>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label col-form-label-sm" for="">Status Pemilikan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="status_pemilikan[]"
                                        value="{{ $infoata610->status_pemilikan }}">
                                </div>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="form-label col-form-label-sm" for="">Status Kegunaan Tanah</label>
                                <div class="input-group">
                                    <select name="status_kegunaan_tanah[]" class="form-control form-control-sm">
                                        @if ($infoata610->status_kegunaan_tanah == 'Aktif')
                                            <option selected value="Aktif">Aktif</option>
                                            <option value="Kosong">Kosong</option>
                                        @elseif($infoata610->status_kegunaan_tanah == 'Kosong')
                                            <option selected value="Kosong">Kosong</option>
                                            <option value="Aktif">Aktif</option>
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Saiz Blok</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="saiz_blok[]"
                                        value="{{ $infoata610->saiz_blok }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Bil Binaan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="bil_binaan[]"
                                        value="{{ $infoata610->bil_binaan }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Saiz Binaan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="saiz_binaan[]"
                                        value="{{ $infoata610->saiz_binaan }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Bil Sistem Utama</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="bil_sistem_utama[]"
                                        value="{{ $infoata610->bil_sistem_utama }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Kapasiti Sistem Utama</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="kapasiti_sistem_utama[]"
                                        value="{{ $infoata610->kapasiti_sistem_utama }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Populasi</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="populasi[]"
                                        value="{{ $infoata610->populasi }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Harga Tanah</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="harga_tanah[]"
                                        value="{{ $infoata610->harga_tanah }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Harga Pembinaan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="harga_pembinaan[]"
                                        value="{{ $infoata610->harga_pembinaan }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="catatan[]"
                                        value="{{ $infoata610->catatan }}">
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $("#tahunata610").datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        $("#bulanata610").datepicker({
            format: " mm",
            viewMode: "months",
            minViewMode: "months"
        });
    </script>
@endsection
