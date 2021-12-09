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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12 (3)</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/dakbinaanluar/{{ $dakBinaanLuar->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Data Aset Khusus Binaan Luar</h2>
                        </div>
                    </div>
                </div>

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">ID Blok Bangunan</label>
                            <div class="input-group">
                                <select name="senarai_binaan_luar_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($binaanluar as $bl)
                                        <option {{ $dakBinaanLuar->senarai_binaan_luar_id == $bl->id ? 'selected' : '' }}
                                            value="{{ $bl->id }}">{{ $bl->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="">Nama Binaan Luar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_binaan_luar"
                                    value="{{ $dakBinaanLuar->nama_binaan_luar }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenis Struktur</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenis_struktur"
                                    value="{{ $dakBinaanLuar->jenis_struktur }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kod Binaan Luar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kod_binaan_luar"
                                    value="{{ $dakBinaanLuar->kod_binaan_luar }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Penggunaan Tenaga</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="penggunaan_tenaga"
                                    value="{{ $dakBinaanLuar->penggunaan_tenaga }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Penggunaan Air</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="penggunaan_air"
                                    value="{{ $dakBinaanLuar->penggunaan_air }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Luas Lantai</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="luas_binaan_luar"
                                    value="{{ $dakBinaanLuar->luas_binaan_luar }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kapasiti Air</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="kapasiti_air"
                                    value="{{ $dakBinaanLuar->kapasiti_air }}">
                            </div>
                        </div>

                        <div class="col-3 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="from_page"
                                    value="{{ $dakBinaanLuar->from_page }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="to_page"
                                    value="{{ $dakBinaanLuar->to_page }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        @foreach ($dakBinaanLuar->kontraktor as $k)
                            <input type="hidden" name="kontraktorluar_id[]" value="{{ $k->id }}">
                            <div class="col-12 mt-5">
                                <h3>Kontraktor Luar Premis {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Nama Kontraktor Luar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_kontraktor_luar[]"
                                        value="{{ $k->nama_kontraktor_luar }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Bidang Kerja Kontraktor Luar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="bidang_kerja_kontraktor_luar[]"
                                        value="{{ $k->bidang_kerja_kontraktor_luar }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Kontraktor Utama Luar</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="kontraktor_luar_utama[]">
                                        <option {{ $k->kontraktor_luar_utama == 1 ? 'selected' : '' }} value="1">Ya
                                        </option>
                                        <option {{ $k->kontraktor_luar_utama == 2 ? 'selected' : '' }} value="0">Tidak
                                        </option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        @foreach ($dakBinaanLuar->perunding as $p)
                            <input type="hidden" name="perundingluar_id[]" value="{{ $p->id }}">
                            <div class="col-12 mt-5">
                                <h3>Perunding Luar {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Nama Perunding Luar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_perunding_luar[]"
                                        value="{{ $p->nama_perunding_luar }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Bidang Kerja Perunding Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="bidang_kerja_perunding_luar[]"
                                        value="{{ $p->bidang_kerja_perunding_luar }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Perunding Utama Luar</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="perunding_luar_utama[]">
                                        <option {{ $k->perunding_luar_utama == 1 ? 'selected' : '' }} value="1">Ya
                                        </option>
                                        <option {{ $k->perunding_luar_utama == 2 ? 'selected' : '' }} value="0">Tidak
                                        </option>
                                    </select>
                                </div>
                            </div>

                        @endforeach
                    </div>



                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
