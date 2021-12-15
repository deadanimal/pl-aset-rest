@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewps3a"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps3a</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps3a/{{ $kewps3a->id }}">
            @method('put')
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

                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">No Kod</label>
                            <select class="form-control form-control-sm" name="no_kad" id="3a_no_kad">
                                <option selected>Pilih</option>
                                @foreach ($infokewps1 as $ik1)
                                    <option {{ $ik1->no_kod == $kewps3a->no_kad ? 'selected' : '' }}
                                        value="{{ $ik1->no_kod }}">
                                        {{ $ik1->no_kod }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nama Stor</label>
                            <select class="form-control form-control-sm" name="nama_stor">
                                <option {{ $kewps3a->nama_stor == 'Stor Alat Ganti' ? 'selected' : '' }}
                                    value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option {{ $kewps3a->nama_stor == 'Stor Bekalan Pejabat' ? 'selected' : '' }}
                                    value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Perihal Stok</label>
                            <input class="form-control form-control-sm" type="text" name="perihal_stok" id="k1_perihal_stok"
                                value="{{ $kewps3a->perihal_stok }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Unit Pengukuran</label>
                            <select class="form-control form-control-sm" name="unit_pengukuran" id="k1_unit_pengukuran">
                                <option {{ $kewps3a->unit_pengukuran == 'Unit' ? 'selected' : '' }} value="Unit">Unit
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Kotak' ? 'selected' : '' }} value="Kotak">Kotak
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Rim' ? 'selected' : '' }} value="Rim">Rim
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Butang' ? 'selected' : '' }} value="Butang">
                                    Butang
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Buah' ? 'selected' : '' }} value="Buah">Buah
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Bilah' ? 'selected' : '' }} value="Bilah">Bilah
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Paket' ? 'selected' : '' }} value="Paket">Paket
                                </option>
                                <option {{ $kewps3a->unit_pengukuran == 'Keping' ? 'selected' : '' }} value="Keping">
                                    Keping
                                </option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kumpulan</label>
                            <select class="form-control form-control-sm" name="kumpulan">
                                <option {{ $kewps3a->kumpulan == 'A' ? 'selected' : '' }} value="A">A</option>
                                <option {{ $kewps3a->kumpulan == 'B' ? 'selected' : '' }} value="B">B</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Pergerakan</label>
                            <select class="form-control form-control-sm" name="pergerakan">
                                <option {{ $kewps3a->pergerakan == 'Aktif' ? 'selected' : '' }} value="Aktif">Aktif
                                </option>
                                <option {{ $kewps3a->pergerakan == 'Tak Aktif' ? 'selected' : '' }} value="Tak Aktif">Tak
                                    Aktif</option>
                                <option {{ $kewps3a->pergerakan == 'Dibatalkan' ? 'selected' : '' }} value="Dibatalkan">
                                    Dibatalkan</option>
                            </select>
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
                    <div class="mt-5">
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
        </form>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="mb-0">Info Daftar Stok</h2>
                </div>
            </div>
        </div>

        </br>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-12">
                    <h3 class="mt-3 d-inline-flex">Paras Stok</h3> <a id="btnParasStok" class="btn btn-sm btn-primary mx-3"
                        data-toggle="modal" data-target="#modalParasStok"><span
                            class="d-inline-flex fas fa-plus text-light"></span></a>
                </div>
            </div>
            @foreach ($parasStok as $p)
                <div class="row">
                    <div class="col-12 mt-4">
                        <h6 class="d-inline-flex">Paras Stok {{ $loop->iteration }}</h6>
                        <form action="/parasstok/{{ $p->id }}" class="d-inline-flex" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm">
                                <span class="fas fa-trash text-danger"></span></button>
                        </form>
                    </div>
                </div>

                <form action="/parasstok/{{ $p->id }}" method="post">
                    <div class="row">
                        @csrf
                        @method('put')
                        <div class="col-1 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <input type="text" class="datepicker form-control form-control-sm tahun" name="tahun_paras_stok"
                                autocomplete="off" value="{{ $p->tahun_paras_stok }}" />
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Maksimum Stok</label>
                            <input class="form-control form-control-sm" type="number" name="maksimum_stok"
                                value="{{ $p->maksimum_stok }}">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Menokok Stok</label>
                            <input class="form-control form-control-sm" type="number" name="menokok_stok"
                                value="{{ $p->menokok_stok }}">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Minimum Stok</label>
                            <input class="form-control form-control-sm" type="number" name="minimum_stok"
                                value="{{ $p->minimum_stok }}">
                        </div>
                        <div class="col-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-sm mt-2"><span
                                    class="fas fa-arrow-up"></span>Kemas
                                Kini</button>
                        </div>
                    </div>
                </form>
            @endforeach

            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mt-3 d-inline-flex">Terimaan Stok Suku Tahun</h3>
                </div>
                @foreach ($terimaan as $t)
                    <div class="col-12 mt-4">
                        <h6>Terimaan {{ $loop->iteration }}</h6>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                        <input type="text" class="form-control form-control-sm tahun" name="tahun_terima_stok[]"
                            value="{{ $t->tahun_terima_stok }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Pertama</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_pertama[]"
                            value="{{ $t->kuantiti_terima_stok_pertama }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Pertama</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_pertama[]"
                            value="{{ $t->nilai_terima_stok_pertama }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Kedua</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_kedua[]"
                            value="{{ $t->kuantiti_terima_stok_kedua }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Kedua</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_kedua[]"
                            value="{{ $t->nilai_terima_stok_kedua }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Ketiga</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_ketiga[]"
                            value="{{ $t->kuantiti_terima_stok_ketiga }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Ketiga</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_ketiga[]"
                            value="{{ $t->nilai_terima_stok_ketiga }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Keempat</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_terima_stok_keempat[]"
                            value="{{ $t->kuantiti_terima_stok_keempat }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Keempat</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_terima_stok_keempat[]"
                            value="{{ $t->nilai_terima_stok_keempat }}">
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mt-3 d-inline-flex">Keluaran Stok Suku Tahun</h3>
                </div>
                @foreach ($keluaran as $k)
                    <div class="col-12 mt-4">
                        <h6>Terimaan {{ $loop->iteration }}</h6>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                        <input type="text" class="form-control form-control-sm tahun" name="tahun_keluar_stok[]"
                            value="{{ $k->tahun_keluar_stok }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Pertama</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_keluar_stok_pertama[]"
                            value="{{ $k->kuantiti_keluar_stok_pertama }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai keluar Stok Pertama</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_pertama[]"
                            value="{{ $k->nilai_kuantiti_keluar_pertama }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti Keluar Stok Kedua</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_keluar_stok_kedua[]"
                            value="{{ $k->kuantiti_keluar_stok_kedua }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai keluar Stok Kedua</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_kedua[]"
                            value="{{ $k->nilai_kuantiti_keluar_kedua }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti keluar Stok Ketiga</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_keluar_stok_ketiga[]"
                            value="{{ $k->kuantiti_keluar_stok_ketiga }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai keluar Stok Ketiga</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_ketiga[]"
                            value="{{ $k->nilai_kuantiti_keluar_ketiga }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Kuantiti keluar Stok Keempat</label>
                        <input class="form-control form-control-sm" type="number" name="kuantiti_keluar_stok_keempat[]"
                            value="{{ $k->kuantiti_keluar_stok_keempat }}">
                    </div>
                    <div class="col-4 mt-2">
                        <label for="" class="col-form-label col-form-label-sm">Nilai keluar Stok Keempat</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_kuantiti_keluar_keempat[]"
                            value="{{ $k->nilai_kuantiti_keluar_keempat }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalParasStok" tabindex="-1" role="dialog" aria-labelledby="modalParasStokLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalParasStokLabel">Tambah Paras Stok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/parasstok" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                        <input type="text" class="datepicker form-control form-control-sm mb-3 tahun"
                            name="tahun_paras_stok" autocomplete="off" />
                        <label for="" class="col-form-label col-form-label-sm">Maksimum Stok</label>
                        <input class="form-control form-control-sm mb-3" type="number" name="maksimum_stok">
                        <label for="" class="col-form-label col-form-label-sm">Menokok Stok</label>
                        <input class="form-control form-control-sm mb-3" type="number" name="menokok_stok">
                        <label for="" class="col-form-label col-form-label-sm">Minimum Stok</label>
                        <input class="form-control form-control-sm mb-3" type="number" name="minimum_stok">
                        <input type="hidden" name="kewps3a_id" value="{{ $kewps3a->id }}">
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#3a_no_kad").change(function() {
                var infokps1_id = this.value;
                $.ajax({
                    type: 'get',
                    url: '/kewps3_dinamic',
                    data: {
                        'id': infokps1_id
                    },
                    success: function(data) {

                        $("#k1_perihal_stok").val(data.perihal_barang);
                        $("#k1_unit_pengukuran").val(data.unit_pengukuran);

                    },
                    error: function() {
                        console.log('success');
                    },
                });

            });

        });


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




        $(".tahun").datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    </script>
@endsection
