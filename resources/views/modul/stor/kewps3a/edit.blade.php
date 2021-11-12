@extends('layouts.base') @section('content')
    <div class="container">

        <form method="POST" action="/kewps3a/{{ $kewps3a->id }}">
            @method('put')
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-3 (A)</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nama Stor</label>
                            <input class="form-control form-control-sm" type="text" name="nama_stor"
                                value="{{ $kewps3a->nama_stor }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Perihal Stok</label>
                            <input class="form-control form-control-sm" type="text" name="perihal_stok"
                                value="{{ $kewps3a->perihal_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">No Kod</label>
                            <input class="form-control form-control-sm" type="text" name="no_kad"
                                value="{{ $kewps3a->no_kad }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Unit Pengukuran</label>
                            <input class="form-control form-control-sm" type="text" name="unit_pengukuran"
                                value="{{ $kewps3a->unit_pengukuran }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kumpulan</label>
                            <input class="form-control form-control-sm" type="text" name="kumpulan"
                                value="{{ $kewps3a->kumpulan }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Pergerakan</label>
                            <input class="form-control form-control-sm" type="text" name="pergerakan"
                                value="{{ $kewps3a->pergerakan }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Gudang Stok</label>
                            <input class="form-control form-control-sm" type="text" name="gudang_stok"
                                value="{{ $kewps3a->gudang_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Baris Stok</label>
                            <input class="form-control form-control-sm" type="text" name="baris_stok"
                                value="{{ $kewps3a->baris_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Rak Stok</label>
                            <input class="form-control form-control-sm" type="text" name="rak_stok"
                                value="{{ $kewps3a->rak_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tingkat Stok</label>
                            <input class="form-control form-control-sm" type="text" name="tingkat_stok"
                                value="{{ $kewps3a->tingkat_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Petak Stok</label>
                            <input class="form-control form-control-sm" type="text" name="petak_stok"
                                value="{{ $kewps3a->petak_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kod Lokasi Stok</label>
                            <input class="form-control form-control-sm" type="text" name="kod_lokasi_stok"
                                value="{{ $kewps3a->kod_lokasi_stok }}">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h5>Paras Stok</h5>
                        @foreach ($parasStok as $p)
                            <input class="form-control form-control-sm" type="hidden" name="paras_stok_id[]"
                                value="{{ $p->id }}">
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Tahun Paras Stok</label>
                                <input class="form-control form-control-sm" type="date" name="tahun_paras_stok[]"
                                    value="{{ $p->tahun_paras_stok }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Maksimum Stok</label>
                                <input class="form-control form-control-sm" type="number" name="maksimum_stok[]"
                                    value="{{ $p->maksimum_stok }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Menokok Stok</label>
                                <input class="form-control form-control-sm" type="number" name="menokok_stok[]"
                                    value="{{ $p->menokok_stok }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Minimum Stok</label>
                                <input class="form-control form-control-sm" type="number" name="minimum_stok[]"
                                    value="{{ $p->minimum_stok }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <h5>Terimaan Stok Suku Tahun</h5>
                        @foreach ($terimaan as $t)
                            <input class="form-control form-control-sm" type="hidden" name="terimaan_id[]"
                                value="{{ $t->id }}">
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Tahun Terima Stok</label>
                                <input class="form-control form-control-sm" type="date" name="tahun_terima_stok[]"
                                    value="{{ $t->tahun_terima_stok }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Pertama</label>
                                <input class="form-control form-control-sm" type="number"
                                    name="kuantiti_terima_stok_pertama[]" value="{{ $t->kuantiti_terima_stok_pertama }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Pertama</label>
                                <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_pertama[]"
                                    value="{{ $t->nilai_terima_stok_pertama }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Kedua</label>
                                <input class="form-control form-control-sm" type="number"
                                    name="kuantiti_terima_stok_kedua[]" value="{{ $t->kuantiti_terima_stok_kedua }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Kedua</label>
                                <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_kedua[]"
                                    value="{{ $t->nilai_terima_stok_kedua }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Ketiga</label>
                                <input class="form-control form-control-sm" type="number"
                                    name="kuantiti_terima_stok_ketiga[]" value="{{ $t->kuantiti_terima_stok_ketiga }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Ketiga</label>
                                <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_ketiga[]"
                                    value="{{ $t->nilai_terima_stok_ketiga }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Keempat</label>
                                <input class="form-control form-control-sm" type="number"
                                    name="kuantiti_terima_stok_keempat[]" value="{{ $t->kuantiti_terima_stok_keempat }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Keempat</label>
                                <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_keempat[]"
                                    value="{{ $t->nilai_terima_stok_keempat }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <h5>Keluaran Stok Suku Tahunan</h5>
                        @foreach ($keluaran as $k)
                            <input class="form-control form-control-sm" type="hidden" name="keluaran_id[]"
                                value="{{ $k->id }}">
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Tahun Keluar Stok</label>
                                <input class="form-control form-control-sm" type="date" name="tahun_keluar_stok[]"
                                    value="{{ $k->tahun_keluar_stok }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Pertama</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="kuantiti_keluar_stok_pertama[]" value="{{ $k->kuantiti_keluar_stok_pertama }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Pertama</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nilai_kuantiti_keluar_pertama[]"
                                    value="{{ $k->nilai_kuantiti_keluar_pertama }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Kedua</label>
                                <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_kedua[]"
                                    value="{{ $k->kuantiti_keluar_stok_kedua }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Kedua</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nilai_kuantiti_keluar_kedua[]" value="{{ $k->nilai_kuantiti_keluar_kedua }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Ketiga</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="kuantiti_keluar_stok_ketiga[]" value="{{ $k->kuantiti_keluar_stok_ketiga }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Ketiga</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nilai_kuantiti_keluar_ketiga[]" value="{{ $k->nilai_kuantiti_keluar_ketiga }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Keempat</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="kuantiti_keluar_stok_keempat[]" value="{{ $k->kuantiti_keluar_stok_keempat }}">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar
                                    Keempat</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nilai_kuantiti_keluar_keempat[]"
                                    value="{{ $k->nilai_kuantiti_keluar_keempat }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-sm btn-primary mt-4" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
