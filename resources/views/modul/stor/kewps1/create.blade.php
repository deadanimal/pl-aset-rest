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
                                <li class="breadcrumb-item"><a href="">kewps1</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps1">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Borang Terimaan Barang Barang (BTB)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Nama Pembekal</label>
                            <select name="nama_pembekal" class="form-control mb-3" id="kewps1_changepembekalcreate"
                                required>
                                @foreach ($pembekal as $p)
                                    <option value="{{ $p->nama }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="">Alamat Pembekal</label>
                            <input class="form-control mb-3" type="text" name="alamat_pembekal" value=""
                                id="kewps1_changealamatcreate" required>
                        </div>
                        <div class="col-4">
                            <label for="">Jenis Penerimaan</label>
                            <select name="jenis_penerimaan" class="form-control mb-3" required>
                                <option value="Dikira">Dikira</option>
                                <option value="Diperiksa">Diperiksa</option>
                                <option value="Diuji">Diuji</option>
                                <option value="Ditimbang">Ditimbang</option>
                                <option value="Diukur">Diukur</option>
                                <option value="Disukat">Disukat</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <h5 class="mt-4">Pesanan Kerajaan (PK)/ Kontrak/ Surat Kelulusan</h5>
                        </div>
                        <div class="col-6">
                            <label for="">No Rujukan PK</label>
                            <input class="form-control mb-3" type="text" name="nombor_rujukan_pk" value="" required>
                        </div>
                        <div class="col-6">
                            <label for="">Tarikh</label>
                            <input class="form-control mb-3" type="date" name="tarikh_pk" value="" required>
                        </div>
                        <div class="col-12">
                            <h5 class="mt-4">Nota Hantaran</h5>
                        </div>
                        <div class="col-6">
                            <label for="">No DO</label>
                            <input class="form-control mb-3" type="text" name="nombor_do" value="" required>
                        </div>
                        <div class="col-6">
                            <label for="">Tarikh DO</label>
                            <input class="form-control mb-3" type="date" name="tarikh_do" value="" required>
                        </div>
                        <div class="col-6">
                            <label for="">Maklumat Pengangkutan</label>
                            <div class="input-group">
                                <select name="maklumat_pengangkutan" class="form-control mb-3" id="maklumat_pengangkutan"
                                    required>
                                    <option value="Lori">Lori</option>
                                    <option value="Kapal Terbang">Kapal Terbang</option>
                                    <option value="Kapal Laut">Kapal Laut</option>
                                    <option value="Perkhidmatan kourier">Perkhidmatan kourier</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 d-none" id="div_lain">
                            <Label>Lain-lain</Label>
                            <input type="text" name="mp_lain_lain" class="form-control mb-3">
                        </div>
                        <input class="form-control form-control-sm" type="hidden" name="status" value="DERAF">
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2>Info Kewps1</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="info1">
                        <div class="col-12">
                            <h3>Info 1</h3>
                            <input type="hidden" id="increament" value="1">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Perihal Barang</label>
                            <input class="form-control" type="text" name="perihal_barang[]"
                                value="{{ old('perihal_barang[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti Dipesan</label>
                            <input class="form-control" type="number" name="kuantiti_dipesan[]"
                                value="{{ old('kuantiti_dipesan[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti DO</label>
                            <input class="form-control" type="number" name="kuantiti_do[]"
                                value="{{ old('kuantiti_do[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti Diterima</label>
                            <input class="form-control" type="number" name="kuantiti_diterima[]" value=""
                                id="kewps1_kuantiti_diterima[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Harga Seunit</label>
                            <div class="input-group">
                                <span class="input-group-text">RM</span>
                                <input class="form-control" type="number" step="0.01" name="harga_seunit[]" value=""
                                    id="kewps1_harga_seunit[]">
                            </div>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Catatan</label>
                            <input class="form-control" type="text" name="catatan[]" value="{{ old('catatan[]') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <button class="btn btn-primary" type="submit" onclick="confirmSimpan(event,this)">Simpan</button>
                    <a class="btn btn-primary text-white" onclick="tambahAset()">Tambah Stok</a>
                </div>
            </div>

        </form>
    </div>

    <script>
        function tambahAset() {

            var val = $("#increament").val();
            val++;
            $("#info1").append(
                `   <div class="col-12 mt-4">
                            <h3>Info ` + val + `</h3>
                    </div>
                    <div class="col-4">
                            <label for="" class="col-form-label ">Perihal Barang</label>
                            <input class="form-control" type="text" name="perihal_barang[]" value="{{ old('perihal_barang[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti Dipesan</label>
                            <input class="form-control" type="number" name="kuantiti_dipesan[]" value="{{ old('kuantiti_dipesan[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti DO</label>
                            <input class="form-control" type="number" name="kuantiti_do[]" value="{{ old('kuantiti_do[]') }}">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Kuantiti Diterima</label>
                            <input class="form-control" type="number" name="kuantiti_diterima[]" value="" id="kewps1_kuantiti_diterima[]">
                        </div>
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Harga Seunit</label>
                            <div class="input-group">
                                <span class="input-group-text">RM</span>
                                <input class="form-control" type="number" step="0.01" name="harga_seunit[]" value="" id="kewps1_harga_seunit[]">
                            </div>
                        </div>
                        
                        <div class="col-4 mt-2">
                            <label for="" class="col-form-label ">Catatan</label>
                            <input class="form-control" type="text" name="catatan[]" value="{{ old('catatan[]') }}">
                        </div>
                `
            )

            $("#increament").val(val);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });

        }

        $("#maklumat_pengangkutan").change(function() {
            let val = this.value;
            if (val == "Lain-lain") {
                $("#div_lain").removeClass("d-none");
            } else {
                $("#div_lain").addClass("d-none");
            }
        });

        $("#kewps1_changepembekalcreate").change(function() {
            var pembekal = @json($pembekal->toArray());

            pembekal.forEach(element => {
                if (element.nama == this.value) {
                    $("#kewps1_changealamatcreate").val(element.alamat);
                }
            });
        });

        $(document).ready(function() {
            var pembekal = @json($pembekal->toArray());
            pembekal.forEach(element => {
                if (element.nama == $("#kewps1_changepembekalcreate").val()) {
                    $("#kewps1_changealamatcreate").val(element.alamat);
                }
            });
        });
    </script>
@endsection
