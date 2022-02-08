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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12 (1)</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/maklumataras/{{ $ma->id }}">
            @csrf
            @method('put')
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kemaskini Maklumat Aras</h2>
                        </div>
                    </div>
                </div>

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">ID Data Aset Khusus Blok Bangunan</label>
                            <div class="input-group">
                                <select class="form-control mb-3" name="data_aset_khusus_id" required>
                                    <option disabled hidden selected>Pilih</option>
                                    @foreach ($dakbb as $bb)
                                        <option {{ $ma->data_aset_khusus_id == $bb->id ? 'selected' : '' }}
                                            value="{{ $bb->id }}">{{ $bb->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Senarai Ruang Aras</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="senarai_ruang_aras"
                                    value="{{ $ma->senarai_ruang_aras }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Nama Ruang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_ruang"
                                    value="{{ $ma->nama_ruang }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Fungsi Ruang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="fungsi_ruang"
                                    value="{{ $ma->fungsi_ruang }}" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="">Luas Ruang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" step="0.01" name="luas_ruang"
                                    value="{{ $ma->luas_ruang }}" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="">Tinggi Ruang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" step="0.01" name="tinggi_ruang"
                                    value="{{ $ma->tinggi_ruang }}" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="from_page"
                                    value="{{ $ma->from_page }}" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="to_page" value="{{ $ma->to_page }}"
                                    required>
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
        </form>
    </div>
@endsection
