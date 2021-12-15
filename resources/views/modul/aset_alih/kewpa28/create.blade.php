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
                                <li class="breadcrumb-item"><a href="/kewpa28">Kewpa28</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa28">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Borang Sebut Harga Pelupusan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">

                    <div class="col-4">
                        <label for="">Nama</label>
                        <input class="form-control mb-3" type="text" name="nama" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">No Pengenalan</label>
                        <input class="form-control mb-3" type="text" name="no_pengenalan" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Agensi</label>
                        <input class="form-control mb-3" type="text" name="agensi" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Alamat Agensi</label>
                        <input class="form-control mb-3" type="text" name="alamat_agensi" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Deposit</label>
                        <input class="form-control mb-3" type="text" name="deposit" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">No Bank</label>
                        <input class="form-control mb-3" type="text" name="no_bank" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Nama Agensi</label>
                        <input class="form-control mb-3" type="text" name="nama_agensi" value="" required>
                    </div>
                    <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa28()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa28_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa28</h2>
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
                            <label for="">No Sebut Harga</label>
                            <div class="input-group">
                                <select name="kewpa27_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa27 as $k27)
                                        <option value="{{ $k27->id }}">{{ $k27->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga_tawaran[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit Harga</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="deposit_harga[]" value="" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa28() {

            $("#info_kewpa28_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa28</h2>
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
                            <label for="">No Sebut Harga</label>
                            <div class="input-group">
                                <select name="kewpa27_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa27 as $k27)
                                        <option value="{{ $k27->id }}">{{ $k27->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga_tawaran[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit Harga</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="deposit_harga[]" value="" required>
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
