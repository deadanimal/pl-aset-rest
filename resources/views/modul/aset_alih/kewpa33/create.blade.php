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
                                <li class="breadcrumb-item"><a href="/kewpa33">Kewpa33</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa33">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Laporan Awal Kehilangan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-4">
                        <label for="">No Siri Pendaftaran</label>
                        <select name="kewpa3a_id" class="form-control mb-3">
                            <option selected>Pilih</option>
                            @foreach ($kewpa3a as $k3a)
                                <option value="{{ $k3a->id }}">{{ $k3a->no_siri_pendaftaran }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="">Tempat Kehilangan</label>
                        <input class="form-control mb-3" type="text" name="tempat_kehilangan" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Tarikh Kehilangan</label>
                        <input class="form-control mb-3" type="date" name="tarikh_kehilangan" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Cara Kehilangan</label>
                        <input class="form-control mb-3" type="text" name="cara_kehilangan" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">No Rujukan Polis</label>
                        <input class="form-control mb-3" type="text" name="no_rujukan_polis" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tarikh Laporan Polis</label>
                        <input class="form-control mb-3" type="date" name="tarikh_laporan_polis" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Langkah Sedia Ada</label>
                        <input class="form-control mb-3" type="text" name="langkah_sedia_ada" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Langkah Segera</label>
                        <input class="form-control mb-3" type="text" name="langkah_segera" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Document Sokongan</label>
                        <input class="form-control mb-3" type="text" name="dokumen_sokongan" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Gambar</label>
                        <input class="form-control mb-3" type="text" name="gambar" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Catatan</label>
                        <input class="form-control mb-3" type="text" name="catatan" value="" required>
                    </div>


                    <input type="hidden" name="pegawai_terakhir" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                </div>

                <button class="my-4 btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
@endsection
