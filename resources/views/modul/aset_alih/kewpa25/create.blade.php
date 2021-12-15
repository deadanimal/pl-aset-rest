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
                                <li class="breadcrumb-item"><a href="/kewpa25">Kewpa25</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa25">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Borang Tender Pelupusan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-3">
                        <label for="">Nama Syarikat</label>
                        <input class="form-control mb-3" type="text" name="nama_syarikat" required>
                    </div>
                    <div class="col-3">
                        <label for="">No Pengenalan</label>
                        <input class="form-control mb-3" type="text" name="no_pengenalan" required>
                    </div>
                    <div class="col-3">
                        <label for="">Alamat</label>
                        <input class="form-control mb-3" type="text" name="alamat" required>
                    </div>
                    <div class="col-3">
                        <label for="">Agensi</label>
                        <input class="form-control mb-3" type="text" name="agensi" value="Perbadanan Aset Labuan" required>
                    </div>
                    <div class="col-3">
                        <label for="">Alamat Agensi</label>
                        <input class="form-control mb-3" type="text" name="alamat_agensi"
                            value="Peti Surat 81245, Wilayah Persekutuan Labuan" required>
                    </div>
                    <div class="col-3">
                        <label for="">Deposit Tender</label>
                        <input class="form-control mb-3" type="text" name="deposit_tender" required>
                    </div>
                    <div class="col-3">
                        <label for="">No Bank</label>
                        <input class="form-control mb-3" type="text" name="no_bank" required>
                    </div>
                    <div class="col-3">
                        <label for="">Nama Agensi</label>
                        <input class="form-control mb-3" type="text" name="nama_agensi" required>
                    </div>
                    <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa25()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa25_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa25</h2>
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
                            <label for="">No Tender</label>
                            <div class="input-group">
                                <select name="no_tender[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa24 as $k24)
                                        <option value="{{ $k24->id }}">{{ $k24->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga_tawaran[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit Tender</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="deposit_tender1[]" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa25() {

            $("#info_kewpa25_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa25</h2>
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
                            <label for="">No Tender</label>
                            <div class="input-group">
                                <select name="no_tender[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa24 as $k24)
                                        <option value="{{ $k24->id }}">{{ $k24->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga_tawaran[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit Tender</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="deposit_tender1[]" value="" required>
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
