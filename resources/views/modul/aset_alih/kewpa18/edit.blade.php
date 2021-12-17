@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa18">Kewpa18</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa18/{{ $kewpa18->id }}">Info Kewpa18</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa18/{{ $kewpa18->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="mb-3">Kewpa18</h2>
                            </div>
                            <div class="col-6">
                                <label for="">Tahun</label>
                                <input class="form-control mb-3" type="text" name="tahun" value="{{ $kewpa18->tahun }}"
                                    required id="k18_tahun" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">

                        <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>

                <div id="info_kewpa18_create"></div>
            </form>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Info Kewpa18</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa18->infokewpa18 as $ik18)
                    <div class="row mt-4 mx-2">
                        <input type="hidden" name="info_k18" value="{{ $ik18->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa18/{{ $ik18->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                        <div class="col-6">
                            <label for="">No Pindahan Aset Alih</label>
                            <div class="input-group">
                                <select name="kewpa17_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa17 as $k17)
                                        <option {{ $k17->id == $ik18->kewpa17_id ? 'selected' : '' }}
                                            value="{{ $k17->id }}">{{ $k17->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="agensi[]" value="{{ $ik18->agensi }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_terimaan[]"
                                    value="{{ $ik18->kuantiti_terimaan }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Perolehan Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_perolehan_terimaan[]"
                                    value="{{ $ik18->jumlah_perolehan_terimaan }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Nilai Semasa Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_terimaan[]"
                                    value="{{ $ik18->jumlah_nilai_semasa_terimaan }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kuantiti_pengeluaran[]"
                                    value="{{ $ik18->kuantiti_pengeluaran }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Perolehan Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_perolehan_pengeluaran[]"
                                    value="{{ $ik18->jumlah_perolehan_pengeluaran }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Nilai Semasa Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_pengeluaran[]"
                                    value="{{ $ik18->jumlah_nilai_semasa_pengeluaran }}" required>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa18">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Laporan Pindahan</h2>
                            </div>
                            <div class="text-end mr-2">
                                <a class="align-self-end btn btn-sm btn-primary text-white"
                                    onclick="batalTambah()">Batal</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <br>
                        <div class="row">
                            <input type="hidden" name="kewpa18_id" value="{{ $kewpa18->id }}">
                            <div class="col-6">
                                <label for="">No Pindahan Aset Alih</label>
                                <div class="input-group">
                                    <select name="kewpa17_id" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa17 as $k17)
                                            <option value="{{ $k17->id }}">{{ $k17->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi"
                                        value="Perbadanan Aset Labuan" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Terimaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_terimaan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jumlah Perolehan Terimaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="jumlah_perolehan_terimaan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jumlah Nilai Semasa Terimaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_terimaan"
                                        value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Pengeluaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kuantiti_pengeluaran" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jumlah Perolehan Pengeluaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jumlah_perolehan_pengeluaran"
                                        value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jumlah Nilai Semasa Pengeluaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_pengeluaran"
                                        value="" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $("#k18_tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function batalTambah() {
            $("#create").hide()
            $("#show").show();
        }
    </script>

@endsection
