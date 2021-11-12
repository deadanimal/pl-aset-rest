@extends('layouts.base') @section('content')
    <div class="container">
        <form method="POST" action="/kewps3a">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-3a</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nama Stor</label>
                            <input class="form-control form-control-sm" type="text" name="nama_stor">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Perihal Stok</label>
                            <input class="form-control form-control-sm" type="text" name="perihal_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">No Kad</label>
                            <input class="form-control form-control-sm" type="text" name="no_kad">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Unit Pengukuran</label>
                            <input class="form-control form-control-sm" type="text" name="unit_pengukuran">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kumpulan</label>
                            <input class="form-control form-control-sm" type="text" name="kumpulan">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Pergerakan</label>
                            <input class="form-control form-control-sm" type="text" name="pergerakan">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Gudang Stok</label>
                            <input class="form-control form-control-sm" type="text" name="gudang_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Baris Stok</label>
                            <input class="form-control form-control-sm" type="text" name="baris_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Rak Stok</label>
                            <input class="form-control form-control-sm" type="text" name="rak_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tingkat Stok</label>
                            <input class="form-control form-control-sm" type="text" name="tingkat_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Petak Stok</label>
                            <input class="form-control form-control-sm" type="text" name="petak_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kod Lokasi Stok</label>
                            <input class="form-control form-control-sm" type="text" name="kod_lokasi_stok">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h5>Paras Stok</h5>

                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun Paras Stok</label>
                            <input class="form-control form-control-sm" type="date" name="tahun_paras_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Maksimum Stok</label>
                            <input class="form-control form-control-sm" type="number" name="maksimum_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Menokok Stok</label>
                            <input class="form-control form-control-sm" type="number" name="menokok_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Minimum Stok</label>
                            <input class="form-control form-control-sm" type="number" name="minimum_stok[]">
                        </div>

                        <div id="paras_stok_create"></div>

                        <div class="col-2 mt-3">
                            <a class="btn btn-sm btn-primary text-white" onclick="tambahParasStok()">Tambah Paras
                                Stok</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h5>Terimaan Stok Suku Tahun</h5>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun Terima Stok</label>
                            <input class="form-control form-control-sm" type="date" name="tahun_terima_stok[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Pertama</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Pertama</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Kedua</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Kedua</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Ketiga</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Ketiga</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Keempat</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_keempat[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Keempat</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_keempat[]">
                        </div>

                        <div id="terimaan_stok_create"></div>

                        <div class="col-2 mt-3">
                            <a class="btn btn-sm btn-primary text-white" onclick="tambahTerimaanStokSuku()">Tambah Stok Suku
                                Tahun</a>
                        </div>

                    </div>
                    <div class="row mt-5">
                        <h5>Keluaran Stok Suku Tahunan</h5>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun Keluar Stok</label>
                            <input class="form-control form-control-sm" type="date" name="tahun_keluar_stok[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Pertama</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Pertama</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Kedua</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Kedua</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Ketiga</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Ketiga</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Keempat</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_keempat[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar
                                Keempat</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_keempat[]">
                        </div>
                        <div id="keluaran_stok_create"></div>
                        <div class="col-4 mt-3">
                            <a class="btn btn-sm btn-primary text-white" onclick="tambahKeluaranStokSuku()">Tambah Keluaran
                                Stok Suku Tahun
                            </a>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahKeluaranStokSuku() {
            $("#keluaran_stok_create").append(
                `<div class="row">      
                    <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun Keluar Stok</label>
                            <input class="form-control form-control-sm" type="date" name="tahun_keluar_stok[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Pertama</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Pertama</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Kedua</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Kedua</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Ketiga</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar Ketiga</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Keempat</label>
                            <input class="form-control form-control-sm" type="text" name="kuantiti_keluar_stok_keempat[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Kuantiti Keluar
                                Keempat</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_keempat[]">
                        </div>    
                </div>`
            )
        }

        function tambahTerimaanStokSuku() {
            $("#terimaan_stok_create").append(
                `<div class="row">      
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun Terima Stok</label>
                            <input class="form-control form-control-sm" type="date" name="tahun_terima_stok[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Pertama</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Pertama</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Kedua</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Kedua</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Ketiga</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Ketiga</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Keempat</label>
                            <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_keempat[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Keempat</label>
                            <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_keempat[]">
                        </div>
                </div>`
            )
        }

        function tambahParasStok() {
            $("#paras_stok_create").append(
                `<div class="row">      
                 <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun Paras Stok</label>
                            <input class="form-control form-control-sm" type="date" name="tahun_paras_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Maksimum Stok</label>
                            <input class="form-control form-control-sm" type="number" name="maksimum_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Menokok Stok</label>
                            <input class="form-control form-control-sm" type="number" name="menokok_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Minimum Stok</label>
                            <input class="form-control form-control-sm" type="number" name="minimum_stok[]">
                        </div>
                </div>`
            )
        }
    </script>

@endsection
