@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps22</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps22" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">No Rujukan</label>
                            <input type="text" name="no_rujukan" class="form-control" value="">
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh</label>
                            <input type="date" name="tarikh" class="form-control" value="">
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">ID InfoKewps20</label>
                            <select name="kewps20_id" class="form-control" onchange="kewps20(this)">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps20 as $k20)
                                    <option value="{{ $k20->id }}">{{ $k20->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kaedah Pelupusan</label>
                            <input type="text" class="form-control" value="" readonly id="kaedah">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Resit</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_resit" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Hasil Perbelanjaan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="hasil_perbelanjaan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Penerima Syarikat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="penerima_syarikat" value="">
                            </div>
                        </div>



                        <input type="hidden" name="pegawai_pelupusan" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="form">

                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function kewps20(el) {
            $("#form").html('');
            let val = el.value;
            var kewps20 = @json($kewps20->toArray());

            kewps20.forEach(e => {
                if (e.id == val) {
                    $("#kaedah").val(e.kaedah_pelupusan);
                    switch (e.kaedah_pelupusan) {
                        case "Jualan":
                            $("#form").append(`
                            <div class="col-4 mt-3">
                                <label for="">Hasil Pelupusan</label>
                                <input type="text" name="hasil_pelupusan" class="form-control" value="">
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Nama Syarikat</label>
                                <input type="text" name="nama_syarikat" class="form-control" value="">
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control" value="">
                            </div>
                            `);
                            break;
                        case "Hadiah/Jualan Terus":
                            $("#form").append(`
                            <div class="col-4 mt-3">
                                <label for="">Kos Pengendalian</label>
                                <input type="text" name="kos_pengendalian" class="form-control" value="">
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Nama Syarikat</label>
                                <input type="text" name="nama_syarikat" class="form-control" value="">
                            </div>
                            `);
                            break;

                        default:
                            break;
                    }
                }
            });
        }
    </script>
@endsection
