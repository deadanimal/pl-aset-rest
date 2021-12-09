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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.F10/4</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf104/{{ $jkrpataf104->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">??</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">No Pendaftaran</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                        <option {{ $jkrpataf104->jkrpataf68_id == $ata68->id ? 'selected' : '' }}
                                            value="{{ $ata68->id }}">
                                            {{ $ata68->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan"
                                    value="{{ $jkrpataf104->no_rujukan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh"
                                    value="{{ $jkrpataf104->tarikh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Aset Roboh</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_aset_roboh"
                                    value="{{ $jkrpataf104->nama_aset_roboh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Daftar Roboh</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_daftar_roboh"
                                    value="{{ $jkrpataf104->no_daftar_roboh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Pelupusan Roboh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pelupusan_roboh"
                                    value="{{ $jkrpataf104->tarikh_pelupusan_roboh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Aset Jualan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_aset_jualan"
                                    value="{{ $jkrpataf104->nama_aset_jualan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Daftar Jualan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_daftar_jualan"
                                    value="{{ $jkrpataf104->no_daftar_jualan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Pelupusan Jualan</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pelupusan_jualan"
                                    value="{{ $jkrpataf104->tarikh_pelupusan_jualan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Aset Pindah Milik</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_aset_pindah_milik"
                                    value="{{ $jkrpataf104->nama_aset_pindah_milik }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Daftar Pindah Milik</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_daftar_pindah_milik"
                                    value="{{ $jkrpataf104->no_daftar_pindah_milik }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Pelupusan Pindah Milik</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pelupusan_pindah_milik"
                                    value="{{ $jkrpataf104->tarikh_pelupusan_pindah_milik }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Aset Tukar Guna</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_aset_tukar_guna"
                                    value="{{ $jkrpataf104->nama_aset_tukar_guna }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Daftar Tukar Guna</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_daftar_tukar_guna"
                                    value="{{ $jkrpataf104->no_daftar_tukar_guna }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Pelupusan Tukar Guna</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pelupusan_tukar_guna"
                                    value="{{ $jkrpataf104->tarikh_pelupusan_tukar_guna }}">
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_pelupusan1" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_pelupusan2" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="penentusahan" value="{{ Auth::user()->id }}">


                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
