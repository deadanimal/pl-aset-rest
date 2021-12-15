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
                                <li class="breadcrumb-item"><a href="/kewpa26">Kewpa26</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa26">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Jadual Tender Pelupusan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa26()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa26_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa26</h2>
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
                        <div class="col-4">
                            <label for="">Kod Pertender</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kod_petender[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga[]" value="" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa26() {

            $("#info_kewpa26_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa26</h2>
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
                        <div class="col-4">
                            <label for="">Kod Pertender</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kod_petender[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga[]" value="" required>
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
