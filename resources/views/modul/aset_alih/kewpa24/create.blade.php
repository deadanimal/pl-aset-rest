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
                                <li class="breadcrumb-item"><a href="/kewpa24">Kewpa24</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa24">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Kenyataan Tawaran Tender Pelupusan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-3">
                        <label for="">Tarikh Mula</label>
                        <input class="form-control mb-3" type="date" name="tarikh_mula" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tarikh Tamat</label>
                        <input class="form-control mb-3" type="date" name="tarikh_tamat" required>
                    </div>
                    <div class="col-3">
                        <label for="">Jam Mula</label>
                        <input class="form-control mb-3" type="time" name="jam_mula" required>
                    </div>
                    <div class="col-3">
                        <label for="">Jam Tamat</label>
                        <input class="form-control mb-3" type="time" name="jam_tamat" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tempat</label>
                        <input class="form-control mb-3" type="text" name="tempat" required>
                    </div>
                    <div class="col-3">
                        <label for="">Tarikh Tutup</label>
                        <input class="form-control mb-3" type="date" name="tarikh_tutup" required>
                    </div>
                    <div class="col-3">
                        <label for="">Alamat</label>
                        <input class="form-control mb-3" type="text" name="alamat" required>
                    </div>
                    <div class="col-3">
                        <label for="">Agensi</label>
                        <input class="form-control mb-3" type="text" name="agensi" value="Perbadanan Aset Labuan" required>
                    </div>

                    <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa24()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa24_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kenyataan Tawaran</h2>
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
                            <label for="">ID Borang Pelupusan</label>
                            <div class="input-group">
                                <select name="kewpa21_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($infokewpa21 as $ik21)
                                        <option value="{{ $ik21->id }}">{{ $ik21->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga Simpanan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="harga_simpanan[]" value="" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa24() {

            $("#info_kewpa24_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kenyataan Tawaran</h2>
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
                            <label for="">ID Borang Pelupusan</label>
                            <div class="input-group">
                                <select name="kewpa21_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($infokewpa21 as $ik21)
                                        <option value="{{ $ik21->id }}">{{ $ik21->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga Simpanan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="harga_simpanan[]" value="" required>
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
