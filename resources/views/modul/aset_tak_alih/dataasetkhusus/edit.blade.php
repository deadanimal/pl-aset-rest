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

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">ID Laporan Daftar Aset Khusus</label>
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

                    </div>

                    <div class="row" id="kontraktor_bangunan">
                        @foreach ($dataasetkhusus->kontraktor as $k)
                            <input type="hidden" name="kontraktor_id[]" value="{{ $k->id }}">
                            <div class="col-12 mt-5">
                                <h3>Kontraktor Bangunan {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Nama Kontraktor Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="nama_kontraktor_bangunan[]" value="{{ $k->nama_kontraktor_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Bidang Kerja Kontraktor Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="bidang_kerja_kontraktor_bangunan[]"
                                        value="{{ $k->bidang_kerja_kontraktor_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Kontraktor Utama Bangunan</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="kontraktor_utama_bangunan[]">
                                        <option {{ $k->kontraktor_utama_bangunan == 1 ? 'selected' : '' }} value="1">Ya
                                        </option>
                                        <option {{ $k->kontraktor_utama_bangunan == 1 ? 'selected' : '' }} value="0">
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row" id="perunding_bangunan">
                        @foreach ($dataasetkhusus->perunding as $p)
                            <input type="hidden" name="perunding_id[]" value="{{ $p->id }}">
                            <div class="col-12 mt-5">
                                <h3>Perunding Bangunan {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Nama Perunding Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_perunding_bangunan[]"
                                        value="{{ $p->nama_perunding_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Bidang Kerja Perunding Bangunan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text"
                                        name="bidang_kerja_perunding_bangunan[]"
                                        value="{{ $p->bidang_kerja_perunding_bangunan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Perunding Utama Bangunan</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="perunding_utama_bangunan[]">
                                        <option {{ $k->perunding_utama_bangunan == 1 ? 'selected' : '' }} value="1">Ya
                                        </option>
                                        <option {{ $k->perunding_utama_bangunan == 1 ? 'selected' : '' }} value="0">
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row" id="maklumat_aras">
                        @foreach ($dataasetkhusus->maklumataras as $ma)
                            <input type="hidden" name="maklumataras_id[]" value="{{ $ma->id }}">
                            <div class="col-12 mt-5">
                                <h3>Maklumat Aras {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Senarai Ruang Aras</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="senarai_ruang_aras[]"
                                        value="{{ $ma->senarai_ruang_aras }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label col-form-label-sm" for="">Nama Ruang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="nama_ruang[]"
                                        value="{{ $ma->nama_ruang }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Fungsi Ruang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="fungsi_ruang[]"
                                        value="{{ $ma->fungsi_ruang }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Luas Ruang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" step="0.01"
                                        name="luas_ruang[]" value="{{ $ma->luas_ruang }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">Tinggi Ruang</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" step="0.01"
                                        name="tinggi_ruang[]" value="{{ $ma->tinggi_ruang }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">From Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="from_page2[]"
                                        value="{{ $ma->from_page }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label col-form-label-sm" for="">To Page</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="number" name="to_page2[]"
                                        value="{{ $ma->to_page }}">
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
