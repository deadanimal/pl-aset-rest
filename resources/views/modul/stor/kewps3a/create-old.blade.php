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

                        <div class="col-4 mt-2">
                            <label for="">No Kod</label>
                            <select class="form-control" name="no_kad" id="3a_no_kad">
                                <option selected>Pilih</option>
                                @foreach ($infokewps1 as $ik1)
                                    @if (!in_array($ik1->no_kod, $k3a))
                                        <option value="{{ $ik1->no_kod }}">{{ $ik1->no_kod }}
                                    @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Nama Stor</label>
                            <select class="form-control" name="nama_stor">
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Perihal Stok</label>
                            <input class="form-control" type="text" name="perihal_stok" id="k1_perihal_stok">
                        </div>

                        <div class="col-4 mt-2">
                            <label for="">Unit Pengukuran</label>
                            <select class="form-control" name="unit_pengukuran" id="k1_unit_pengukuran">
                                @foreach ($unit_ukuran as $u)
                                    <option value="{{ $u->unit_ukuran }}">{{ $u->unit_ukuran }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-4 mt-2">
                            <label for="">Kumpulan</label>
                            <select class="form-control" name="kumpulan">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div> --}}
                        <div class="col-4 mt-2">
                            <label for="">Pergerakan</label>
                            <select class="form-control" name="pergerakan">
                                <option value="Aktif">Aktif</option>
                                <option value="Tak Aktif">Tak Aktif</option>
                                <option value="Dibatalkan">Dibatalkan</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Gudang Stok</label>
                            <input class="form-control kod" type="text" name="gudang_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Baris Stok</label>
                            <input class="form-control kod" type="text" name="baris_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Rak Stok</label>
                            <input class="form-control kod" type="text" name="rak_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Tingkat Stok</label>
                            <input class="form-control kod" type="text" name="tingkat_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Petak Stok</label>
                            <input class="form-control kod" type="text" name="petak_stok">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Kod Lokasi Stok</label>
                            <input class="form-control" type="text" name="kod_lokasi_stok" id="kod_lokasi_stok">
                        </div>
                    </div>
                    <div class="row mt-5" id="paras_stok_create">
                        <div class="col-12">
                            <h5>Paras Stok</h5>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-primary text-white mt-3" onclick="tambahParasStok()">Tambah Paras
                        Stok</a>
                    <div class="mt-5">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
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

        $("#k1_perihal_stok").keyup(function() {
            let val = this.value;
            var infokewps1 = @json($infokewps1->toArray());
            infokewps1.forEach(element => {
                if (val == element.perihal_barang) {
                    $("#k1_unit_pengukuran").val(element.unit_pengukuran).change();
                    $("#3a_no_kad").val(element.no_kod).change();
                }
            });
        });

        $(".kod").keyup(function() {

            let kod = $(".kod");
            let output = "";
            let notEmpty = false;
            jQuery.each(kod, function(key, val) {
                if (val.value != "") {
                    notEmpty = true;
                } else {
                    notEmpty = false;
                }
            });

            if (notEmpty) {
                jQuery.each(kod, function(key, val) {
                    if (key == 0) {
                        output = output.concat(val.value);
                    } else {
                        output = output.concat("/" + val.value);
                    }
                });
                $("#kod_lokasi_stok").val(output);

            }
        });

        function tambahKeluaranStokSuku() {
            $("#keluaran_stok_create").append(
                `
                 
                        <div class="col-4 mt-2">
                            <label for="">Tahun</label>
                            <select class="form-control" name="tahun_keluar_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Kuantiti Keluar Stok Pertama</label>
                            <input class="form-control" type="text" name="kuantiti_keluar_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Nilai Kuantiti Keluar Pertama</label>
                            <input class="form-control" type="text" name="nilai_kuantiti_keluar_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Kuantiti Keluar Stok Kedua</label>
                            <input class="form-control" type="text" name="kuantiti_keluar_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Nilai Kuantiti Keluar Kedua</label>
                            <input class="form-control" type="text" name="nilai_kuantiti_keluar_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Kuantiti Keluar Stok Ketiga</label>
                            <input class="form-control" type="text" name="kuantiti_keluar_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Nilai Kuantiti Keluar Ketiga</label>
                            <input class="form-control" type="text" name="nilai_kuantiti_keluar_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Kuantiti Keluar Stok Keempat</label>
                            <input class="form-control" type="text" name="kuantiti_keluar_stok_keempat[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Nilai Kuantiti Keluar
                                Keempat</label>
                            <input class="form-control" type="text" name="nilai_kuantiti_keluar_keempat[]">
                        </div>    
                `
            )
        }

        function tambahTerimaanStokSuku() {
            $("#terimaan_stok_create").append(
                `     
                        <div class="col-4 mt-2">
                            <label for="">Tahun</label>
                            <select class="form-control" name="tahun_terima_stok[]">
                                <option selected>Pilih</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="">Kuantiti Terima Stok Pertama</label>
                            <input class="form-control" type="number" name="kuantiti_terima_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Pertama</label>
                            <input class="form-control" type="text" name="nilai_terima_stok_pertama[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Kedua</label>
                            <input class="form-control" type="number" name="kuantiti_terima_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Kedua</label>
                            <input class="form-control" type="text" name="nilai_terima_stok_kedua[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Ketiga</label>
                            <input class="form-control" type="number" name="kuantiti_terima_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Ketiga</label>
                            <input class="form-control" type="text" name="nilai_terima_stok_ketiga[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Kuantiti Terima Stok Keempat</label>
                            <input class="form-control" type="number" name="kuantiti_terima_stok_keempat[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Nilai Terima Stok Keempat</label>
                            <input class="form-control" type="text" name="nilai_terima_stok_keempat[]">
                        </div>
                `
            )
        }

        function tambahParasStok() {
            $("#paras_stok_create").append(
                `     
                         <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Tahun</label>
                            <input type="text" class="datepicker form-control" name="tahun_paras_stok[]" autocomplete="off"/>
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Maksimum Stok</label>
                            <input class="form-control" type="number" name="maksimum_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Menokok Stok</label>
                            <input class="form-control" type="number" name="menokok_stok[]">
                        </div>
                        <div class="col-3 mt-2">
                            <label for="" class="col-form-label col-form-label-sm">Minimum Stok</label>
                            <input class="form-control" type="number" name="minimum_stok[]">
                        </div>
                `
            );

            $(".datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        }
    </script>
@endsection
