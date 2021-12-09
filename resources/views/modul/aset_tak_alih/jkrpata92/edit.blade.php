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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.9/2</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpata92/{{ $jkrpata92->id }}">
            @method('put');
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pendaftaran Aset Tak Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">Tahun</label>
                            <div class="input-group">
                                <input type="text" name="tahun" id="tahun_ata92" class="form-control"
                                    value="{{ $jkrpata92->tahun }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan"
                                    value="{{ $jkrpata92->catatan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Pendaftaran</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected value="{{ $jkrpata92->jkrpataf68_id }}">
                                        {{ $jkrpata92->jkrpataf68_id }}</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                        @if ($ata68->id != $jkrpata92->jkrpataf68_id)
                                            <option value="{{ $ata68->id }}">{{ $ata68->id }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="infojkrpata92">
                        @foreach ($jkrpata92->infojkrpata92 as $i92)
                            <input type="hidden" name="info92_id[]" value="{{ $i92->id }}">
                            <div class="col-12 mt-5">
                                <h3>Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Nama Projek </label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_projek[]"
                                        value="{{ $i92->nama_projek }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Saiz Project</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="saiz_projek[]"
                                        value="{{ $i92->saiz_projek }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Pelaksana Projek</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="pelaksana_projek[]"
                                        value="{{ $i92->pelaksana_projek }}">
                                </div>
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label col-form-label-sm" for="">Kos Rancang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="kos_rancang[]"
                                        value="{{ $i92->kos_rancang }}">
                                </div>
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label col-form-label-sm" for="">Kos Sebenar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="kos_sebenar[]"
                                        value="{{ $i92->kos_sebenar }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">ABM</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="abm[]"
                                        value="{{ $i92->abm }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Peruntukan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="peruntukan[]"
                                        value="{{ $i92->peruntukan }}">
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <label class="form-label col-form-label-sm" for="">Peratus Perbelanjaan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="peratus_perbelanjaan[]"
                                        value="{{ $i92->peratus_perbelanjaan }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh Mula Rancang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_mula_rancang[]"
                                        value="{{ $i92->tarikh_mula_rancang }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh Siap Rancang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_siap_rancang[]"
                                        value="{{ $i92->tarikh_siap_rancang }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh Serahan Rancang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_serahan_rancang[]"
                                        value="{{ $i92->tarikh_serahan_rancang }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh Mula Sebenar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_mula_sebenar[]"
                                        value="{{ $i92->tarikh_mula_sebenar }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh Siap Sebenar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_siap_sebenar[]"
                                        value="{{ $i92->tarikh_siap_sebenar }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh Serahan Sebenar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_serahan_sebenar[]"
                                        value="{{ $i92->tarikh_serahan_sebenar }}">
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
