@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa32">Kewpa32</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa32">
        @csrf
        <div class="card mt-4">
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
                        <input class="form-control mb-3 tahun" type="text" name="tahun" autocomplete="off">
                    </div>
                    <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa32()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa32_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa32</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a class="align-self-end btn btn-sm btn-primary text-white"
                                onclick="$(this).closest('.card').remove()">Buang</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <label for="">ID Perakuan Pelupusan (Kewpa21)</label>
                            <div class="input-group">
                                <select name="kewpa21_id[]" class="form-control mb-3" required>
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
                                <input class="form-control mb-3" type="text" name="agensi[]" value="Perbadanan Aset Labuan"
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Perolehan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="nilai_perolehan[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah A (Jualan)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahA[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah B (Buangan Terjadual) </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahB[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah C (Jualan Sisa) </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahC[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah D (Tukang Barang) </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahD[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah E (Tukar Beli) </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahE[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah F (Tukar Ganti)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahF[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah G (Hadiah)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahG[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah H (Serahan)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahH[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah I (Musnah)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahI[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kaedah J (Kaedah-kaedah lain)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="kaedahJ[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Semasa</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" step="0.01" name="nilai_semasa[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Hasil Pelupusan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" name="hasil_pelupusan[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kos Pengandalian</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control" type="number" step="0.01" name="kos_pengendalian[]" value=""
                                    required>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $(".tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });

        function tambahAsetkewpa32() {

            $("#info_kewpa32_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa32</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a class="align-self-end btn btn-sm btn-primary text-white"
                                onclick="$(this).closest('.card').remove()">Buang</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <label for="">ID Perakuan Pelupusan (Kewpa21)</label>
                            <div class="input-group">
                                <select name="kewpa21_id[]" class="form-control mb-3" required>
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
                                <input class="form-control mb-3" type="text" name="agensi[]" value="Perbadanan Aset Labuan"
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Perolehan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="nilai_perolehan[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah A (Jualan)</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahA[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah B (Buangan Terjadual) </label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahB[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah C (Jualan Sisa) </label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahC[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah D (Tukang Barang) </label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahD[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah E (Tukar Beli) </label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahE[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah F (Tukar Ganti)</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahF[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah G (Hadiah)</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahG[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah H (Serahan)</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahH[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah I (Musnah)</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahI[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kaedah J (Kaedah-kaedah lain)</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kaedahJ[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Semasa</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="nilai_semasa[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Hasil Pelupusan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hasil_pelupusan[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kos Pengandalian</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input class="form-control " type="number" name="kos_pengendalian[]" value="" required>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            `);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        }
    </script>
@endsection
