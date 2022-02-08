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
        <form method="POST" action="/dataasetkhusus">
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
                            <label for="">ID Blok Bangunan</label>
                            <div class="input-group">
                                <select name="blok_bangunan_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($blokbangunan as $bb)
                                        @if (!in_array($bb->id, $check))
                                            <option value="{{ $bb->id }}">{{ $bb->id }}</option>
                                        @endif
                                    @endforeach
                                </select>
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
                            <label for="">Bil Atas Tanah</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="bil_atas_tanah" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Luas Lantai</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="luas_lantai" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bil Bawah Tanah</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="bil_bawah_tanah" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Luas Tapak</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="luas_tapak" value="">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="from_page" value="">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="to_page" value="">
                            </div>
                        </div>


                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">

                    </div>

                    <div class="row" id="kontraktor_bangunan">
                        <div class="col-12 mt-5">
                            <h3>Kontraktor Bangunan</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Kontraktor Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_kontraktor_bangunan[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Kontraktor Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text"
                                    name="bidang_kerja_kontraktor_bangunan[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Kontraktor Utama Bangunan</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="kontraktor_utama_bangunan[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahkontraktorbangunan()">Tambah Kontraktor
                            Bangunan</a>
                    </div>
                    <div class="row" id="perunding_bangunan">
                        <div class="col-12 mt-5">
                            <h3>Perunding Bangunan</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Perunding Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_perunding_bangunan[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Perunding Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text"
                                    name="bidang_kerja_perunding_bangunan[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Perunding Utama Bangunan</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="perunding_utama_bangunan[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahperundingbangunan()">Tambah Perunding
                            Bangunan</a>
                    </div>
                    <div class="row" id="maklumat_aras">
                        <div class="col-12 mt-5">
                            <h3>Maklumat Aras</h3>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Senarai Ruang Aras</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" name="senarai_ruang_aras[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label col-form-label-sm" for="">Nama Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_ruang[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Fungsi Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="fungsi_ruang[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Luas Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" step="0.01" name="luas_ruang[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Tinggi Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" step="0.01" name="tinggi_ruang[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" name="from_page2[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" name="to_page2[]" value="">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id_ra[]" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahmaklumataras()">Tambah Maklumat
                            Aras</a>
                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahkontraktorbangunan() {
            $("#kontraktor_bangunan").append(
                `      <div class="col-12 mt-5">
                            <h3>Kontraktor Bangunan</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Kontraktor Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_kontraktor_bangunan[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Kontraktor Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text"
                                    name="bidang_kerja_kontraktor_bangunan[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Kontraktor Utama Bangunan</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="kontraktor_utama_bangunan[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                `
            )
        }

        function tambahperundingbangunan() {
            $("#perunding_bangunan").append(
                `      <div class="col-12 mt-5">
                            <h3>Perunding Bangunan</h3>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Nama Perunding Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_perunding_bangunan[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Bidang Kerja Perunding Bangunan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text"
                                    name="bidang_kerja_perunding_bangunan[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Perunding Utama Bangunan</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="perunding_utama_bangunan[]">
                                    <option selected>Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                `
            )
        }

        function tambahmaklumataras() {
            $("#maklumat_aras").append(
                `      <div class="col-12 mt-5">
                            <h3>Maklumat Aras</h3>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Senarai Ruang Aras</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" name="senarai_ruang_aras[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label col-form-label-sm" for="">Nama Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_ruang[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Fungsi Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="fungsi_ruang[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Luas Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" step="0.01" name="luas_ruang[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Tinggi Ruang</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" step="0.01" name="tinggi_ruang[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" name="from_page2[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="number" name="to_page2[]" value="">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id_ra[]" value="{{ Auth::user()->id }}">
                `
            )
        }
    </script>
@endsection
