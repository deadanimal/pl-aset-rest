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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/datatanah/{{ $dt->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kemaskini Data Tanah</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">ID JKR.PATA.F6/8</label>
                            <select name="jkrpataf68_id" class="form-control">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($jkrpataf68 as $ata68)
                                    <option {{ $dt->id == $ata68->id ? 'selected' : '' }} value="{{ $ata68->id }}">
                                        {{ $ata68->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="">Tarikh Pemilikan </label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="pemilikan_tarikh"
                                    value="{{ $dt->pemilikan_tarikh }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="">Pemilikan Kos</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="pemilikan_kos"
                                    value="{{ $dt->pemilikan_kos }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Mukim Bandar</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="mukim_bandar"
                                    value="{{ $dt->mukim_bandar }}" required>
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <label class="form-label" for="">No Hakmilik</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hakmilik_nombor"
                                    value="{{ $dt->hakmilik_nombor }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label" for="">Jenis Hakmilik</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hakmilik_jenis"
                                    value="{{ $dt->hakmilik_jenis }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label" for="">No Lot</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="lot_nombor" value="{{ $dt->lot_nombor }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label" for="">Luas Lot</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="lot_luas" value="{{ $dt->lot_luas }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label" for="">Status</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="status" value="{{ $dt->status }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label" for="">Tarikh PTP</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_ptp"
                                    value="{{ $dt->tarikh_ptp }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label" for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan" value="{{ $dt->catatan }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
