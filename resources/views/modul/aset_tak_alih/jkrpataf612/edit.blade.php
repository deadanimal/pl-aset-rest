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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf612/{{ $jkrpataf612->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Daftar Aset Khusus</h2>
                        </div>
                    </div>
                </div>

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">No Pendaftaran</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    @foreach ($jkrpataf68 as $ata68)
                                        <option {{ $jkrpataf612->jkrpataf68_id == $ata68->id ? 'selected' : '' }}
                                            value="{{ $ata68->id }}">{{ $ata68->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan"
                                    value="{{ $jkrpataf612->catatan }}">
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">

                    </div>

                    <div class="row" id="info_blokbangunan">
                        @foreach ($jkrpataf612->blokbangunan as $bb)
                            <input type="hidden" name="bb_id" value="{{ $bb->id }}">
                            <div class="col-12 mt-5">
                                <h3>Blok Bangunan {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Nama Blok</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_blok[]"
                                        value="{{ $bb->nama_blok }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">Luas Tapak</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="luas_tapak[]"
                                        value="{{ $bb->luas_tapak }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="catatan1[]"
                                        value="{{ $bb->catatan }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">From Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="from_page[]"
                                        value="{{ $bb->from_page }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">To Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="to_page[]"
                                        value="{{ $bb->to_page }}">
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="row" id="info_binaanluar">
                        @foreach ($jkrpataf612->binaanluar as $bl)
                            <input type="hidden" name="bl_id" value="{{ $bl->id }}">
                            <div class="col-12 mt-5">
                                <h3>Binaan Luar {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Nama Binaan Luar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_binaan_luar[]"
                                        value="{{ $bl->nama_binaan_luar }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">Luas Tapak</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="luas_tapak2[]"
                                        value="{{ $bl->luas_tapak }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="catatan2[]"
                                        value="{{ $bl->catatan }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">From Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="from_page2[]"
                                        value="{{ $bl->from_page }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">To Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="to_page2[]"
                                        value="{{ $bl->to_page }}">
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
