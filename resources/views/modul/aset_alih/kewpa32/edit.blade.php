@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa32">Kewpa32</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa32/{{ $kewpa32->id }}">Info Kewpa32</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa32/{{ $kewpa32->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Laporan Pelupusan Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tahun</label>
                                <input class="form-control mb-3 tahun" type="text" name="tahun"
                                    value="{{ $kewpa32->tahun }}" autocomplete="off">
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
                            <h2 class="mb-0">Info Kewpa32</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa32->infokewpa32 as $ik32)
                    <div class=" row mt-4 mx-2">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa32/{{ $ik32->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>

                    <form action="/info_kewpa32/{{ $ik32->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-3">
                                <label for="">ID Kewpa21</label>
                                <div class="input-group">
                                    <select name="kewpa21_id" class="form-control mb-3" required>
                                        @foreach ($kewpa21 as $k21)
                                            <option {{ $k21->id == $ik32->kewpa21_id ? 'selected' : '' }}
                                                value="{{ $k21->id }}">{{ $k21->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi" value="{{ $ik32->agensi }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti"
                                        value="{{ $ik32->kuantiti }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Perolehan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="nilai_perolehan"
                                        value="{{ $ik32->nilai_perolehan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah A (Jualan)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahA"
                                        value="{{ $ik32->kaedahA }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah B (Buangan Terjadual) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahB"
                                        value="{{ $ik32->kaedahB }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah C (Jualan Sisa) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahC"
                                        value="{{ $ik32->kaedahC }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah D (Tukang Barang) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahD"
                                        value="{{ $ik32->kaedahD }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah E (Tukar Beli) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahE"
                                        value="{{ $ik32->kaedahE }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah F (Tukar Ganti)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahF"
                                        value="{{ $ik32->kaedahF }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah G (Hadiah)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahG"
                                        value="{{ $ik32->kaedahG }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah H (Serahan)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahH"
                                        value="{{ $ik32->kaedahH }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah I (Musnah)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahI"
                                        value="{{ $ik32->kaedahI }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kaedah J (Kaedah-kaedah lain)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahJ"
                                        value="{{ $ik32->kaedahJ }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Semasa</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="nilai_semasa"
                                        value="{{ $ik32->nilai_semasa }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Hasil Pelupusan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="hasil_pelupusan"
                                        value="{{ $ik32->hasil_pelupusan }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kos Pengandalian</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="kos_pengendalian"
                                        value="{{ $ik32->kos_pengendalian }}" required>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-sm btn-primary" type="submit"> <span
                                        class="fas fa-arrow-up"></span>Kemas Kini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa32">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Kewpa32</h2>
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
                            <input type="hidden" name="kewpa32_id" value="{{ $kewpa32->id }}">
                            <div class="col-3">
                                <label for="">ID Kewpa21</label>
                                <div class="input-group">
                                    <select name="kewpa21_id" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa21 as $k21)
                                            <option value="{{ $k21->id }}">{{ $k21->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi"
                                        value="Perbadanan Aset Labuan" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti" value="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Perolehan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="nilai_perolehan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah A (Jualan)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahA" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah B (Buangan Terjadual) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahB" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah C (Jualan Sisa) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahC" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah D (Tukang Barang) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahD" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah E (Tukar Beli) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahE" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah F (Tukar Ganti)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahF" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah G (Hadiah)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahG" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah H (Serahan)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahH" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah I (Musnah)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahI" value="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kaedah J (Kaedah-kaedah lain)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="kaedahJ" value="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Semasa</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="nilai_semasa" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Hasil Pelupusan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" name="hasil_pelupusan" value="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kos Pengandalian</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="kos_pengendalian"
                                        value="" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(".tahun").datepicker({
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
