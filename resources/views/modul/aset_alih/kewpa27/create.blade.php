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
                                <li class="breadcrumb-item"><a href="/kewpa27">Kewpa27</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa27">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Kenyataan Tawaran Sebut Harga Pelupusan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">

                    <div class="col-3">
                        <label for="">Agensi</label>
                        <input type="text" name="agensi" class="form-control mb-3" value="Perbadanan Aset Labuan" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tarikh Mula</label>
                        <input type="date" name="tarikh_mula" class="form-control mb-3" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tarikh Tamat</label>
                        <input type="date" name="tarikh_tamat" class="form-control mb-3" required>
                    </div>
                    <div class="col-3">
                        <label for="">Jam Mula</label>
                        <input type="time" name="jam_mula" class="form-control mb-3" required>
                    </div>
                    <div class="col-3">
                        <label for="">Jam Tamat</label>
                        <input type="time" name="jam_tamat" class="form-control mb-3" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tempat</label>
                        <input type="text" name="tempat" class="form-control mb-3" required>
                    </div>
                    <div class="col-3">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control mb-3" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tarikh Tutup</label>
                        <input type="date" name="tarikh_tutup" class="form-control mb-3" required>
                    </div>
                    <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa27()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa27_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa27</h2>
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
                        <div class="col-4">
                            <label for="">ID Perakuan Pelupusan</label>
                            <div class="input-group">
                                <select name="kewpa21_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa21 as $k21)
                                        <option value="{{ $k21->id }}">{{ $k21->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga Simpanan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga_simpanan[]" value="" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa27() {

            $("#info_kewpa27_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa27</h2>
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
                        <div class="col-4">
                            <label for="">ID Perakuan Pelupusan</label>
                            <div class="input-group">
                                <select name="kewpa21_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa21 as $k21)
                                        <option value="{{ $k21->id }}">{{ $k21->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga Simpanan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga_simpanan[]" value="" required>
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
