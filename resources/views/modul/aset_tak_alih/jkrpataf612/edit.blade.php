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

                        <div class="col-12 mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col mt-1">
                        <h2>Blok Bangunan</h2>
                    </div>
                    <div class="float-end mr-3 mt-1">
                        <button type="button" data-toggle="modal" data-target="#modalbb"
                            class="btn btn-sm btn-primary text-white"><span class="fas fa-plus mr-1"></span>Tambah</button>
                    </div>
                </div>
            </div>
            @foreach ($jkrpataf612->blokbangunan as $bb)
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="bb_id" value="{{ $bb->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-4">ID Blok Bangunan : {{ $bb->id }}</h3>
                            <form action="/blokbangunan/{{ $bb->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>
                    <form action="/blokbangunan/{{ $bb->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Nama Blok</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_blok"
                                        value="{{ $bb->nama_blok }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">Luas Tapak</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="luas_tapak"
                                        value="{{ $bb->luas_tapak }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="catatan"
                                        value="{{ $bb->catatan }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">From Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="from_page"
                                        value="{{ $bb->from_page }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">To Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="to_page"
                                        value="{{ $bb->to_page }}">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <button class="btn btn-sm btn-primary" type="submit"><span
                                        class="fas fa-arrow-up mr-1"></span>Kemaskini</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="modalbb" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/blokbangunan" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Blok Bangunan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <label class="" for="">Nama Blok</label>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" type="text" name="nama_blok" value="">
                            </div>
                            <label class="" for="">Luas Tapak</label>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" type="text" name="luas_tapak" value=" ">
                            </div>
                            <label class="" for="">Catatan</label>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" type="text" name="catatan" value="">
                            </div>
                            <label class="" for="">From Page</label>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" type="text" name="from_page" value="">
                            </div>
                            <label class="" for="">To Page</label>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" type="text" name="to_page" value="">
                            </div>
                            <input type="hidden" name="jkrpataf612_id" value="{{ $jkrpataf612->id }}">
                            <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Binaan Luar</h2>
                    </div>
                    <div class="float-end mr-3 mt-1">
                        <button type="button" data-toggle="modal" data-target="#modalbl"
                            class="btn btn-sm btn-primary text-white"><span class="fas fa-plus mr-1"></span>Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($jkrpataf612->binaanluar as $bl)
                    <div class="row">
                        <input type="hidden" name="bl_id" value="{{ $bl->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-4">ID Binaan Luar : {{ $bl->id }}</h3>
                            <form action="/binaanluar/{{ $bl->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>
                    <form action="/binaanluar/{{ $bl->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Nama Binaan Luar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_binaan_luar"
                                        value="{{ $bl->nama_binaan_luar }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">Luas Tapak</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="luas_tapak"
                                        value="{{ $bl->luas_tapak }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="catatan"
                                        value="{{ $bl->catatan }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">From Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="from_page"
                                        value="{{ $bl->from_page }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label col-form-label-sm" for="">To Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="to_page"
                                        value="{{ $bl->to_page }}">
                                </div>
                            </div>
                            <div class="col text-center mt-3">
                                <button class="btn btn-sm btn-primary"><span
                                        class="fas fa-arrow-up mr-1"></span>Kemaskini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="modalbl" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/binaanluar" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Binaan Luar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="" for="">Nama Binaan Luar</label>
                            <input class="form-control" type="text" name="nama_binaan_luar" value="">
                            <label class="mt-3" for="">Luas Tapak</label>
                            <input class="form-control" type="text" name="luas_tapak" value="">
                            <label class="mt-3" for="">Catatan</label>
                            <input class="form-control" type="text" name="catatan" value="">
                            <label class="mt-3" for="">From Page</label>
                            <input class="form-control" type="text" name="from_page" value="">
                            <label class="mt-3" for="">To Page</label>
                            <input class="form-control" type="text" name="to_page" value="">
                        </div>
                        <input type="hidden" name="jkrpataf612_id" value="{{ $jkrpataf612->id }}">
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
