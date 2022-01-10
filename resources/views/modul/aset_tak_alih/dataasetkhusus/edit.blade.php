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
        <form method="POST" action="/dataasetkhusus/{{ $dataasetkhusus->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Data Aset Khusus</h2>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">ID Blok Bangunan</label>
                            <div class="input-group">
                                <select name="blok_bangunan_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($blokbangunan as $bb)
                                        <option {{ $bb->id == $dataasetkhusus->blok_bangunan_id ? 'selected' : '' }}
                                            value="{{ $bb->id }}">{{ $bb->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="">Penggunaan Tenaga</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="penggunaan_tenaga"
                                    value="{{ $dataasetkhusus->penggunaan_tenaga }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Penggunaan Air</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="penggunaan_air"
                                    value="{{ $dataasetkhusus->penggunaan_air }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bil Atas Tanah</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="bil_atas_tanah"
                                    value="{{ $dataasetkhusus->bil_atas_tanah }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Luas Lantai</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="luas_lantai"
                                    value="{{ $dataasetkhusus->luas_lantai }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bil Bawah Tanah</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="bil_bawah_tanah"
                                    value="{{ $dataasetkhusus->bil_bawah_tanah }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Luas Tapak</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="luas_tapak"
                                    value="{{ $dataasetkhusus->luas_tapak }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="from_page"
                                    value="{{ $dataasetkhusus->from_page }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="to_page"
                                    value="{{ $dataasetkhusus->to_page }}">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col h2">Kontraktor</div>
                    <div class="col text-right mr-4">
                        <button data-toggle="modal" data-target="#modalkontraktor" class="btn btn-primary btn-sm"> <span
                                class="fas fa-plus mr-1"></span>Tambah</button>
                    </div>
                </div>
            </div>
            @foreach ($dataasetkhusus->kontraktor as $k)
                <div class="card-body">
                    <div class="row">
                        <div class="col d-inline-flex">
                            <h3 class="mr-4">Kontraktor Bangunan {{ $loop->iteration }}</h3>
                            <form action="/kontraktorbangunan/{{ $k->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>
                    <form action="/kontraktorbangunan/{{ $k->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-4">
                                <label class=" col--sm" for="">Nama Kontraktor Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_kontraktor_bangunan"
                                        value="{{ $k->nama_kontraktor_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class=" col--sm" for="">Bidang Kerja Kontraktor Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="bidang_kerja_kontraktor_bangunan"
                                        value="{{ $k->bidang_kerja_kontraktor_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class=" col--sm" for="">Kontraktor Utama Bangunan</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="kontraktor_utama_bangunan">
                                        <option {{ $k->kontraktor_utama_bangunan == 1 ? 'selected' : '' }} value="1">Ya
                                        </option>
                                        <option {{ $k->kontraktor_utama_bangunan == 0 ? 'selected' : '' }} value="0">
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><span
                                        class="fas fa-arrow-up mr-1"></span>Kemaskini</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- modal kontraktor --}}
        <div class="modal fade" id="modalkontraktor" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/kontraktorbangunan" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kontraktor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class=" col--sm" for="">Nama Kontraktor Bangunan</label>
                            <input class="form-control form-control-sm" type="text" name="nama_kontraktor_bangunan"
                                value="">
                            <label class=" col--sm" for="">Bidang Kerja Kontraktor Bangunan</label>
                            <input class="form-control form-control-sm" type="text" name="bidang_kerja_kontraktor_bangunan"
                                value="">
                            <label class=" col--sm" for="">Kontraktor Utama Bangunan</label>
                            <select class="form-control form-control-sm" name="kontraktor_utama_bangunan">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                            <input type="hidden" name="data_aset_khusus_id" value="{{ $dataasetkhusus->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col h2 mb-0">Perunding Bangunan</div>
                    <div class="col text-right mr-4">
                        <button data-toggle="modal" data-target="#modalperunding" class="btn btn-primary btn-sm"> <span
                                class="fas fa-plus mr-1"></span>Tambah</button>
                    </div>
                </div>
            </div>
            @foreach ($dataasetkhusus->perunding as $p)
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="d-inline mr-4">Perunding Bangunan {{ $loop->iteration }}</h3>
                            <form action="/perundingbangunan/{{ $p->id }}" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>
                    <form action="/perundingbangunan/{{ $p->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label class=" col--sm" for="">Nama Perunding Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_perunding_bangunan"
                                        value="{{ $p->nama_perunding_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class=" col--sm" for="">Bidang Kerja Perunding Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="bidang_kerja_perunding_bangunan"
                                        value="{{ $p->bidang_kerja_perunding_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class=" col--sm" for="">Perunding Utama Bangunan</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="perunding_utama_bangunan">
                                        <option {{ $p->perunding_utama_bangunan == 1 ? 'selected' : '' }} value="1">Ya
                                        </option>
                                        <option {{ $p->perunding_utama_bangunan == 0 ? 'selected' : '' }} value="0">
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col text-center mt-3">
                                <button type="submit" class="btn btn-sm btn-primary"><span
                                        class="fas fa-arrow-up pr-1"></span>Kemaskini</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- modal perunding --}}
        <div class="modal fade" id="modalperunding" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/perundingbangunan" method="post">
                        @csrf
                        <div class="modal-header pb-0">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Perunding</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class=" col--sm" for="">Nama Perunding Bangunan</label>
                            <input class="form-control form-control-sm" type="text" name="nama_perunding_bangunan"
                                value="">
                            <label class=" col--sm" for="">Bidang Kerja perunding Bangunan</label>
                            <input class="form-control form-control-sm" type="text" name="bidang_kerja_perunding_bangunan"
                                value="">
                            <label class=" col--sm" for="">Perunding Utama Bangunan</label>
                            <select class="form-control form-control-sm" name="perunding_utama_bangunan">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                            <input type="hidden" name="data_aset_khusus_id" value="{{ $dataasetkhusus->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col h2 mb-0">Maklumat Aras</div>
                    <div class="col text-right mr-4">
                        <button data-toggle="modal" data-target="#modalma" class="btn btn-primary btn-sm"> <span
                                class="fas fa-plus mr-1"></span>Tambah</button>
                    </div>
                </div>
            </div>
            @foreach ($dataasetkhusus->maklumataras as $ma)
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="d-inline">Maklumat Aras {{ $loop->iteration }}</h3>
                            <form action="/maklumataras/{{ $ma->id }}" method="POST" class="d-inline ml-3">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>
                    <form action="/maklumataras/{{ $ma->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-3 mb-3">
                                <label class="" for="">Senarai Ruang Aras</label>
                                <input class="form-control form-control-sm" type="number" name="senarai_ruang_aras"
                                    value="{{ $ma->senarai_ruang_aras }}">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">Nama Ruang</label>
                                <input class="form-control form-control-sm" type="text" name="nama_ruang"
                                    value="{{ $ma->nama_ruang }}">
                            </div>
                            <div class="col-3 mb-3">
                                <label class="" for="">Fungsi Ruang</label>
                                <input class="form-control form-control-sm" type="text" name="fungsi_ruang"
                                    value="{{ $ma->fungsi_ruang }}">
                            </div>
                            <div class="col-3 mb-3">
                                <label class="" for="">Luas Ruang</label>
                                <input class="form-control form-control-sm" type="number" step="0.01" name="luas_ruang"
                                    value="{{ $ma->luas_ruang }}">
                            </div>
                            <div class="col-3 mb-3">
                                <label class="" for="">Tinggi Ruang</label>
                                <input class="form-control form-control-sm" type="number" step="0.01" name="tinggi_ruang"
                                    value="{{ $ma->tinggi_ruang }}">
                            </div>
                            <div class="col-3 mb-3">
                                <label class="" for="">From Page</label>
                                <input class="form-control form-control-sm" type="number" name="from_page2"
                                    value="{{ $ma->from_page }}">
                            </div>
                            <div class="col-3 mb-3">
                                <label class="" for="">To Page</label>
                                <input class="form-control form-control-sm" type="number" name="to_page2"
                                    value="{{ $ma->to_page }}">
                            </div>
                            <div class="col text-center">
                                <button class="btn btn-sm btn-primary"> <span
                                        class="fas fa-arrow-up"></span>Kemaskini</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

    </div>

    {{-- modal ma --}}
    <div class="modal fade" id="modalma" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/maklumataras" method="post">
                    @csrf
                    <div class="modal-header pb-0">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Maklumat Aras</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="" for="">Senarai Ruang Aras</label>
                                <input class="form-control" type="number" name="senarai_ruang_aras" value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">Nama Ruang</label>
                                <input class="form-control" type="text" name="nama_ruang" value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">Fungsi Ruang</label>
                                <input class="form-control" type="text" name="fungsi_ruang" value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">Luas Ruang</label>
                                <input class="form-control" type="number" step="0.01" name="luas_ruang" value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">Tinggi Ruang</label>
                                <input class="form-control" type="number" step="0.01" name="tinggi_ruang" value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">From Page</label>
                                <input class="form-control" type="number" name="from_page" value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="" for="">To Page</label>
                                <input class="form-control" type="number" name="to_page" value="">
                            </div>
                        </div>
                        <input type="hidden" name="data_aset_khusus_id" value="{{ $dataasetkhusus->id }}">
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
