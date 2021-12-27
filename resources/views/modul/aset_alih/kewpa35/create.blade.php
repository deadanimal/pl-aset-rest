@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa35">Kewpa35</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa35">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Laporan Akhir Kehilangan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-4">
                        <label for="">ID Kewpa33</label>
                        <select name="kewpa33_id" class="form-control mb-3">
                            <option selected>Pilih</option>
                            @foreach ($kewpa33 as $k33)
                                <option value="{{ $k33->id }}">{{ $k33->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="">Laporan Hasil</label>
                        <input class="form-control mb-3" type="text" name="laporan_hasil" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Arahan Tatacara</label>
                        <input class="form-control mb-3" type="text" name="arahan_tatacara" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Langkah Mencegah</label>
                        <input class="form-control mb-3" type="text" name="langkah_mencegah" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Rumusan Siasatan</label>
                        <input class="form-control mb-3" type="text" name="rumusan_siasatan" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Syor</label>
                        <input class="form-control mb-3" type="text" name="syor" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Justifikasi</label>
                        <input class="form-control mb-3" type="text" name="justifikasi" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Ulasan Pegawai</label>
                        <input class="form-control mb-3" type="text" name="ulasan_pegawai" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Syor Pegawai</label>
                        <input class="form-control mb-3" type="text" name="syor_pegawai" value="" required>
                    </div>

                    <input type="hidden" name="pegawai_menjaga" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pegawai_penyelia" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pegawai_bertanggungjawab" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pengerusi" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="ahli" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pegawai_pengawal" value="{{ Auth::user()->id }}">
                </div>

                <button class="my-4 btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
@endsection
