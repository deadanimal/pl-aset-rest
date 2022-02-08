@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewps1">Kewps1</a></li>
                                <li class="breadcrumb-item"><a href="/kewps1/{{ $kewps1->id }}">Info kewps1</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewps1/{{ $kewps1->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
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
                                <select class="form-control mb-3" name="nama_pembekal" id="kewps1_changepembekaledit">
                                    @foreach ($pembekal as $p)
                                        <option {{ $kewps1->nama_pembekal == $p->nama ? 'selected' : '' }}
                                            value="{{ $p->nama }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Alamat Pembekal</label>
                                <input class="form-control mb-3" type="text" name="alamat_pembekal"
                                    value="{{ $kewps1->alamat_pembekal }}" id="kewps1_changealamatedit">
                            </div>
                            <div class=" col-4">
                                <label for="">Jenis Penerimaan</label>
                                <div class="input-group">
                                    <select name="jenis_penerimaan" class="form-control mb-3">
                                        <option {{ $kewps1->jenis_penerimaan == 'Dikira' ? 'selected' : '' }}
                                            value="Dikira">
                                            Dikira</option>
                                        <option {{ $kewps1->jenis_penerimaan == 'Diperiksa' ? 'selected' : '' }}
                                            value="Diperiksa">Diperiksa</option>
                                        <option {{ $kewps1->jenis_penerimaan == 'Diuji' ? 'selected' : '' }}
                                            value="Diuji">Diuji</option>
                                        <option {{ $kewps1->jenis_penerimaan == 'Ditimbang' ? 'selected' : '' }}
                                            value="Ditimbang">Ditimbang</option>
                                        <option {{ $kewps1->jenis_penerimaan == 'Diukur' ? 'selected' : '' }}
                                            value="Diukur">Diukur</option>
                                        <option {{ $kewps1->jenis_penerimaan == 'Disukat' ? 'selected' : '' }}
                                            value="Disukat">Disukat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="mt-4">Pesanan Kerajaan (PK)/ Kontrak/ Surat Kelulusan</h5>
                            </div>
                            <div class="col-6">
                                <label for="">No Rujukan PK</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nombor_rujukan_pk"
                                        value="{{ $kewps1->nombor_rujukan_pk }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Tarikh</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_pk"
                                        value="{{ $kewps1->tarikh_pk }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="mt-4">Nota Hantaran</h5>
                            </div>
                            <div class="col-6">
                                <label for="">No DO</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nombor_do"
                                        value="{{ $kewps1->nombor_do }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Tarikh DO</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_do"
                                        value="{{ $kewps1->tarikh_do }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-none">
                                    <?= $mp = $kewps1->maklumat_pengangkutan ?>
                                </div>
                                <label for="">Maklumat Pengangkutan</label>
                                <div class="input-group">
                                    <select name="maklumat_pengangkutan" class="form-control mb-3"
                                        id="maklumat_pengangkutan">
                                        <option {{ $mp == 'Lori' ? 'selected' : '' }} value="Lori">Lori</option>
                                        <option {{ $mp == 'Kapal Terbang' ? 'selected' : '' }} value="Kapal Terbang">
                                            Kapal Terbang</option>
                                        <option {{ $mp == 'Kapal Laut' ? 'selected' : '' }} value="Kapal Laut">Kapal Laut
                                        </option>
                                        <option {{ $mp == 'Perkhidmatan kourier' ? 'selected' : '' }}
                                            value="Perkhidmatan kourier">Perkhidmatan kourier</option>
                                        <option
                                            {{ $mp != 'Perkhidmatan kourier' || $mp == 'Lori' || $mp == 'Kapal Terbang' || $mp == 'Kapal Laut'? 'selected': '' }}
                                            value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 d-none" id="div_lain">
                                <Label>Lain-lain</Label>
                                <input type="text" name="mp_lain_lain" class="form-control mb-3"
                                    value="{{ $mp }}">
                            </div>
                        </div>
                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>

            <div class="card my-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Info kewps1</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModal">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewps1->infokewps1 as $ik1)
                    <div class=" row mt-4 mx-2">
                        <input type="hidden" name="info_k24" value="{{ $ik1->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewps1/{{ $ik1->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>

                        </div>

                    </div>

                    <form action="/info_kewps1/{{ $ik1->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-3">
                                <label for="">No Kod</label>
                                <input type="text" class="form-control mb-3" value="{{ $ik1->no_kod }}" readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Perihal Barang</label>
                                <input class="form-control mb-3" type="text" name="perihal_barang"
                                    value="{{ $ik1->perihal_barang }}" id="perihal_edit_kewps1_{{ $ik1->id }}">
                            </div>
                            <div class="col-3">
                                <label for="">Unit Pengukuran</label>
                                <select name="unit_pengukuran" class="form-control mb-3">
                                    @foreach ($unitukuran as $u)
                                        <option {{ $ik1->unit_pengukuran == $u->unit_ukuran ? 'selected' : '' }}
                                            value="{{ $u->unit_ukuran }}">{{ $u->unit_ukuran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Dipesan</label>
                                <input class="form-control mb-3 info{{ $ik1->id }}" type="number"
                                    name="kuantiti_dipesan" value="{{ $ik1->kuantiti_dipesan }}">
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti DO</label>
                                <input class="form-control mb-3 info{{ $ik1->id }}" type="number" name="kuantiti_do"
                                    value="{{ $ik1->kuantiti_do }}">
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Diterima</label>
                                <input class="form-control mb-3 info{{ $ik1->id }}" type="number"
                                    name="kuantiti_diterima" value="{{ $ik1->kuantiti_diterima }}">
                            </div>
                            <div class="col-3">
                                <label for="">Harga Seunit</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input class="form-control info{{ $ik1->id }}" type="number" step="0.01"
                                        name="harga_seunit" value="{{ $ik1->harga_seunit }}">
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="">Catatan</label>
                                <input class="form-control mb-3 info{{ $ik1->id }}" type="text" name="catatan"
                                    value="{{ $ik1->catatan }}">
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-sm btn-primary" type="submit"
                                    onclick="infokewps1_kemaskini({{ $ik1 }})" id="btn_submit_infok1"><span
                                        class="fas fa-arrow-up"></span>Kemas
                                    Kini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="/info_kewps1">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Info kewps1</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="kewps1_id" value="{{ $kewps1->id }}">
                                <div class="col-12 mb-3">
                                    <label for="">Perihal Barang</label>
                                    <input class="form-control" type="text" name="perihal_barang" value=""
                                        id="edit_addnew_perihal_kewps1">
                                </div>
                                {{-- <div class="col-6">
                                    <label for="">Unit Pengukuran</label>
                                    <select name="unit_pengukuran" class="form-control mb-3">
                                        @foreach ($unitukuran as $u)
                                            <option value="{{ $u->unit_ukuran }}">{{ $u->unit_ukuran }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-6">
                                    <label for="">Kuantiti Dipesan</label>
                                    <input class="form-control mb-3" type="number" name="kuantiti_dipesan" value="">
                                </div>
                                <div class="col-6">
                                    <label for="">Kuantiti DO</label>
                                    <input class="form-control mb-3" type="number" name="kuantiti_do" value="">
                                </div>
                                <div class="col-6">
                                    <label for="">Kuantiti Diterima</label>
                                    <input class="form-control mb-3" type="number" name="kuantiti_diterima" value="">
                                </div>
                                <div class="col-6">
                                    <label for="">Harga Seunit</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">RM</span>
                                        <input class="form-control" type="number" step="0.01" name="harga_seunit"
                                            value="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="">Catatan</label>
                                    <input class="form-control mb-3" type="text" name="catatan" value="">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="kewps2_edit_addnew_submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- <div id="create" style="display: none;">
            <form method="POST" action="/info_kewps1">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0"></h2>
                            </div>
                            <div class="text-end mr-2">
                                <a class="align-self-end btn btn-sm btn-primary text-white"
                                    onclick="batalTambah()">Batal</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <br>

                    </div>
                </div>
            </form>
        </div> --}}
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#kewps2_edit_addnew_submit").click(function() {
                $("html, body").animate({
                    scrollTop: $(document).height() - $(window).height()
                });
            });
            let mp = @json($mp);
            if (mp != 'Perkhidmatan kourier' || mp == 'Lori' || mp == 'Kapal Terbang' || mp == 'Kapal Laut') {
                $("#div_lain").removeClass("d-none");
            } else {
                $("#div_lain").addClass("d-none");
            }
        });

        $("#maklumat_pengangkutan").change(function() {
            let val = this.value;
            if (val == "Lain-lain") {
                $("#div_lain").removeClass("d-none");
            } else {
                $("#div_lain").addClass("d-none");
            }
        });

        // function infokewps1_kemaskini(obj) {
        //     $(".info" + obj.id).attr("readonly", false);
        //     $("#info" + obj.id).hide();

        //     $(".s" + obj.id).show();
        // }

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function batalTambah() {
            $("#create").hide()
            $("#show").show();
        }


        $("#kewps1_changepembekaledit").change(function() {
            var pembekal = @json($pembekal->toArray());

            pembekal.forEach(element => {
                if (element.nama == this.value) {
                    $("#kewps1_changealamatedit").val(element.alamat);
                }
            });
        });
    </script>

@endsection
