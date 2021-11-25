@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps3a</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps3a">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Daftar Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">

                        <div class="col-12 mt-2">
                            <label for="" class="col-form-label">No Kod</label>
                            <select class="form-select" name="id">
                                <option selected>Pilih</option>
                                @foreach ($infokewps1 as $ik1)
                                    <option value="{{ $ik1->id }}">{{ $ik1->id }} - {{ $ik1->perihal_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

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
                    <div class="row mt-5" id="paras_stok_create">
                        <div class="col-12">
                            <h5>Paras Stok</h5>
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <select class="form-control form-control-sm" name="tahun_paras_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
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
                    </div>
                    <a class="btn btn-sm btn-primary text-white mt-3" onclick="tambahParasStok()">Tambah Paras
                        Stok</a>
                    <div class="row mt-5" id="terimaan_stok_create">
                        <div class="col-12">
                            <h5>Terimaan Stok Suku Tahun</h5>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <select class="form-control form-control-sm" name="tahun_terima_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
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
                    </div>
                    <a class="btn btn-sm btn-primary text-white mt-3" onclick="tambahTerimaanStokSuku()">Tambah Stok
                        Suku
                        Tahun</a>
                    <div class="row mt-5" id="keluaran_stok_create">
                        <div class="col-12">
                            <h5>Keluaran Stok Suku Tahunan</h5>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <select class="form-control form-control-sm" name="tahun_keluar_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
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

                    </div>
                    <a class="btn btn-sm btn-primary text-white mt-3" onclick="tambahKeluaranStokSuku()">Tambah Keluaran
                        Stok Suku Tahun
                    </a>
                    <div class="mt-5">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahKeluaranStokSuku() {
            $("#keluaran_stok_create").append(
                `
                 
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <select class="form-control form-control-sm" name="tahun_keluar_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
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
                `
            )
        }

        function tambahTerimaanStokSuku() {
            $("#terimaan_stok_create").append(
                `     
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <select class="form-control form-control-sm" name="tahun_terima_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
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
                `
            )
        }

        function tambahParasStok() {
            $("#paras_stok_create").append(
                `     
                         <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <select class="form-control form-control-sm" name="tahun_paras_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
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
                `
            )
        }
    </script>
@endsection
