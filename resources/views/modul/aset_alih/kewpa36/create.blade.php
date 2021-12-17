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
                                <li class="breadcrumb-item"><a href="/kewpa36">Kewpa36</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa36">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Sijil Hapus Kira Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6">
                        <label for="">No Surat</label>
                        <input class="form-control mb-3" type="text" name="no_surat">
                    </div>
                    <div class="col-6">
                        <label for="">Tarikh Surat</label>
                        <input class="form-control mb-3" type="date" name="tarikh_surat">
                    </div>
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa36()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa36_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa36</h2>
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
                        <div class="col-6">
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
                        <div class="col-6">
                            <label for="">Jenis Aset Alih</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jenis_aset_alih[]" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa36() {

            $("#info_kewpa36_create").append(`
              <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Kewpa36</h2>
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
                         <div class="col-6">
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
                        <div class="col-6">
                            <label for="">Jenis Aset Alih</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jenis_aset_alih[]" required>
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
