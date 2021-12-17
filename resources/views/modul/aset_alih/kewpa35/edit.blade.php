@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa35">Kewpa35</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewpa35/{{ $kewpa35->id }}">
            @csrf
            @method('PUT')
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
                                @foreach ($kewpa33 as $k33)
                                    <option {{ $k33->id == $kewpa35->kewpa33_id ? 'selected' : '' }}
                                        value="{{ $k33->id }}">{{ $k33->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Laporan Hasil</label>
                            <input class="form-control mb-3" type="text" name="laporan_hasil"
                                value="{{ $kewpa35->laporan_hasil }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Arahan Tatacara</label>
                            <input class="form-control mb-3" type="text" name="arahan_tatacara"
                                value="{{ $kewpa35->arahan_tatacara }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Langkah Mencegah</label>
                            <input class="form-control mb-3" type="text" name="langkah_mencegah"
                                value="{{ $kewpa35->langkah_mencegah }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Rumusan Siasatan</label>
                            <input class="form-control mb-3" type="text" name="rumusan_siasatan"
                                value="{{ $kewpa35->rumusan_siasatan }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Syor</label>
                            <input class="form-control mb-3" type="text" name="syor" value="{{ $kewpa35->syor }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="">Justifikasi</label>
                            <input class="form-control mb-3" type="text" name="justifikasi"
                                value="{{ $kewpa35->justifikasi }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Ulasan Pegawai</label>
                            <input class="form-control mb-3" type="text" name="ulasan_pegawai"
                                value="{{ $kewpa35->ulasan_pegawai }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Syor Pegawai</label>
                            <input class="form-control mb-3" type="text" name="syor_pegawai"
                                value="{{ $kewpa35->syor_pegawai }}" required>
                        </div>

                        <button class="my-2 btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
        </form>
    </div>

@endsection
