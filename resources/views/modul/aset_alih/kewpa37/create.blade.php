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
                                <li class="breadcrumb-item"><a href="/kewpa37">Kewpa37</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa37">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Laporan Hapus Kira Aset Alih</h2>
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

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa37()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa37_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa37</h2>
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
                            <label for="">ID Kewpa33</label>
                            <div class="input-group">
                                <select name="kewpa33_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa33 as $k33)
                                        <option value="{{ $k33->id }}">{{ $k33->id }}</option>
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
                            <label for="">Kuantiti Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_hapus[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Perolehan Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nilai_perolehan_hapus[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Semasa Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nilai_semasa_hapus[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kes Surcaj</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kes_surcaj[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Surcaj</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nilai_surcaj[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kes Tatatertib</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kes_tatatertib[]" required>
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

        function tambahAsetkewpa37() {

            $("#info_kewpa37_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa37</h2>
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
                            <label for="">ID Kewpa33</label>
                            <div class="input-group">
                                <select name="kewpa33_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa33 as $k33)
                                        <option value="{{ $k33->id }}">{{ $k33->id }}</option>
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
                            <label for="">Kuantiti Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_hapus[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Perolehan Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nilai_perolehan_hapus[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Semasa Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nilai_semasa_hapus[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kes Surcaj</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kes_surcaj[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nilai Surcaj</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nilai_surcaj[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kes Tatatertib</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kes_tatatertib[]" required>
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
