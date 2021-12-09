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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12 (3)</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/dakbinaanluar">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Data Aset Khusus Binaan Luar</h2>
                        </div>
                    </div>
                </div>

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">ID Blok Bangunan</label>
                            <div class="input-group">
                                <select name="senarai_binaan_luar_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($binaanluar as $bl)
                                        <option value="{{ $bl->id }}">{{ $bl->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="">Nama Binaan Luar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_binaan_luar" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenis Struktur</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenis_struktur" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kod Binaan Luar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kod_binaan_luar" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Penggunaan Tenaga</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="penggunaan_tenaga" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Penggunaan Air</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="penggunaan_air" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Luas Lantai</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="luas_binaan_luar" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kapasiti Air</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="kapasiti_air" value="">
                            </div>
                        </div>

                        <div class="col-3 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="from_page" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="to_page" value="">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">

                    </div>

                    <div class="row" id="kontraktor_luar">
                        <div class="col-12 mt-5">
                            <h3>Kontraktor Luar Premis</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Kontraktor Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_kontraktor_luar[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Kontraktor Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text"
                                    name="bidang_kerja_kontraktor_luar[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Kontraktor Utama Luar</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="kontraktor_luar_utama[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahkontraktorluar()">Tambah Kontraktor
                            Luar</a>
                    </div>
                    <div class="row" id="perunding_luar">
                        <div class="col-12 mt-5">
                            <h3>Perunding Luar</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Perunding Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_perunding_luar[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Perunding Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="bidang_kerja_perunding_luar[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Perunding Utama Luar</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="perunding_luar_utama[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahperundingluar()">Tambah Perunding
                            Luar</a>
                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahkontraktorluar() {
            $("#kontraktor_luar").append(
                `      <div class="col-12 mt-5">
                            <h3>Kontraktor Luar Premis</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Kontraktor Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_kontraktor_luar[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Kontraktor Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text"
                                    name="bidang_kerja_kontraktor_luar[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Kontraktor Utama Luar</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="kontraktor_luar_utama[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                `
            )
        }

        function tambahperundingluar() {
            $("#perunding_luar").append(
                `     <div class="col-12 mt-5">
                            <h3>Perunding Luar</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Perunding Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_perunding_luar[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Perunding Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="bidang_kerja_perunding_luar[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Perunding Utama Luar</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="perunding_luar_utama[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
