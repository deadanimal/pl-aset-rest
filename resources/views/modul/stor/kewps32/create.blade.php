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
                                <li class="breadcrumb-item"><a href="">kewps32</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps32">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Awal Kehilangan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">No Kod</label>
                            <select class="form-control" name="kewps3a_id">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tempat Kehilangan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tempat_kehilangan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Kehilangan</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_kehilangan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Cara Kehilangan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="cara_kehilangan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Laporan Polis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_laporan_polis" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Laporan Polis</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_laporan_polis" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Langkah Sedia Ada</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="langkah_sedia_ada" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Langkah Segera</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="langkah_segera" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Documen Sokongan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="dokumen_sokongan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Gambar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="gambar" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan" value="">
                            </div>
                        </div>
                        <input type="hidden" name="pegawai_terakhir" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">

                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
