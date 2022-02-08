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
        <form method="POST" action="/jkrpataf68/{{ $jkrpataf68->id }}">
            @method('put')
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
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan"
                                    value="{{ $jkrpataf68->no_rujukan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="{{ $jkrpataf68->tarikh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kategori Aset</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kategori_aset"
                                    value="{{ $jkrpataf68->kategori_aset }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Fungsi Aset</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="fungsi_aset"
                                    value="{{ $jkrpataf68->fungsi_aset }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_premis"
                                    value="{{ $jkrpataf68->nama_premis }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Alamat Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_premis"
                                    value="{{ $jkrpataf68->alamat_premis }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Koordinat GPS</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="koordinat_gps"
                                    value="{{ $jkrpataf68->koordinat_gps }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kumpulan Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kumpulan_agensi"
                                    value="{{ $jkrpataf68->kumpulan_agensi }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian" value="Perbadanan Labuan">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jabatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jabatan"
                                    value="{{ $jkrpataf68->jabatan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Negara</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="negara"
                                    value="{{ $jkrpataf68->negara }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Negeri</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="negeri"
                                    value="{{ $jkrpataf68->negeri }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Daerah</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="daerah"
                                    value="{{ $jkrpataf68->daerah }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Mukim</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="mukim" value="{{ $jkrpataf68->mukim }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kategori Fungsi Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kategori_fungsi_premis"
                                    value="{{ $jkrpataf68->kategori_fungsi_premis }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Laluan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_laluan"
                                    value="{{ $jkrpataf68->no_laluan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Bilangan Blok</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bilangan_blok"
                                    value="{{ $jkrpataf68->bilangan_blok }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jumlah Saiz Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_saiz_premis"
                                    value="{{ $jkrpataf68->jumlah_saiz_premis }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Siap Bina Asal</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_siap_bina_asal"
                                    value="{{ $jkrpataf68->tarikh_siap_bina_asal }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Warta</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_warta"
                                    value="{{ $jkrpataf68->tarikh_warta }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jumlah Kos Peralihan Asal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_kos_perolehan_asal"
                                    value="{{ $jkrpataf68->jumlah_kos_perolehan_asal }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Lukisan Plan Lokasi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_lukisan_pelan_lokasi"
                                    value="{{ $jkrpataf68->no_lukisan_pelan_lokasi }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Lokisan Pelan Tapak</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_lukisan_pelan_tapak"
                                    value="{{ $jkrpataf68->no_lukisan_pelan_tapak }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Gambar Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="gambar_premis"
                                    value="{{ $jkrpataf68->gambar_premis }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Pegawai Teknikal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="pegawai_teknikal"
                                    value="{{ $jkrpataf68->pegawai_teknikal }}">
                            </div>
                        </div>

                        <input type="hidden" name="pegawai_daftar" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <h3>DATA TANAH DALAM PREMIS ASET</h3>
                        </div>
                        @foreach ($jkrpataf68->datatanah as $dt)
                            <input type="hidden" name="datatanah_id[]" value="{{ $dt->id }}">
                            <div class="col-12 mt-4">
                                <h5>Tanah {{ $loop->iteration }}</h5>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Tarikh Pemilikan </label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="pemilikan_tarikh[]"
                                        value="{{ $dt->pemilikan_tarikh }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Pemilikan Kos</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="pemilikan_kos[]"
                                        value="{{ $dt->pemilikan_kos }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label col-form-label-sm" for="">Mukim Bandar</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="mukim_bandar[]"
                                        value="{{ $dt->mukim_bandar }}">
                                </div>
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label col-form-label-sm" for="">No Hakmilik</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="hakmilik_nombor[]"
                                        value="{{ $dt->hakmilik_nombor }}">
                                </div>
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label col-form-label-sm" for="">Jenis Hakmilik</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="hakmilik_jenis[]"
                                        value="{{ $dt->hakmilik_jenis }}">
                                </div>
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label col-form-label-sm" for="">No Lot</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="lot_nombor[]"
                                        value="{{ $dt->lot_nombor }}">
                                </div>
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label col-form-label-sm" for="">Luas Lot</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="lot_luas[]"
                                        value="{{ $dt->lot_luas }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Status</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="status[]"
                                        value="{{ $dt->status }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Tarikh PTP</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="date" name="tarikh_ptp[]"
                                        value="{{ $dt->tarikh_ptp }}">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <label class="form-label col-form-label-sm" for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="catatan[]"
                                        value="{{ $dt->catatan }}">
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
