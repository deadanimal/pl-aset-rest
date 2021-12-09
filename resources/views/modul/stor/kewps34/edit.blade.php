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
                                <li class="breadcrumb-item"><a href="">kewps34</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps34/{{ $kewps34->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Akhir</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">ID Laporan Awal Kehilangan</label>
                            <select class="form-control" name="kewps32_id">
                                <option selected value="{{ $kewps34->id }}">{{ $kewps34->id }}</option>
                                @foreach ($kewps32 as $k32)
                                    @if ($kewps34->id != $k32->id)
                                        <option value="{{ $k32->id }}">{{ $k32->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Laporan Diterima</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="laporan_diterima"
                                    value="{{ $kewps34->laporan_diterima }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Dokumen Laporan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="dokumen_laporan"
                                    value="{{ $kewps34->dokumen_laporan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">TPS Dipatuhi</label>
                            <select class="form-control" name="tps_dipatuhi">
                                @if ($kewps34->tps_dipatuhi == 1)
                                    <option selected value="1">Ya</option>
                                    <option value="0">Tidak</option>

                                @else
                                    <option selected value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Peraturan TPS</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="peraturan_tps"
                                    value="{{ $kewps34->peraturan_tps }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Langkah Mencegah</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="langkah_mencegah"
                                    value="{{ $kewps34->langkah_mencegah }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Rumus Siasatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="rumusan_siasatan"
                                    value="{{ $kewps34->rumusan_siasatan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tindakan Surcaj</label>
                            <select class="form-control" name="tindakan_surcaj">
                                @if ($kewps34->tindakan_surcaj == 1)
                                    <option selected value="1">Ya</option>
                                    <option value="0">Tidak</option>

                                @else
                                    <option selected value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Syor</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="syor" value="{{ $kewps34->syor }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Justifikasi Surcaj</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="justifikasi_surcaj"
                                    value="{{ $kewps34->justifikasi_surcaj }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Ulasan Pegawai Pengawal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="ulasan_pegawai_pengawal"
                                    value="{{ $kewps34->ulasan_pegawai_pengawal }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Syor Pegawai Pengawal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="syor_pegawai_pengawal"
                                    value="{{ $kewps34->syor_pegawai_pengawal }}">
                            </div>
                        </div>


                        <input type="hidden" name="pengerusi_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ahli_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_bertanggungjawab" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_langsung" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_penyelia" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_pengawal" value="{{ Auth::user()->id }}">

                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
