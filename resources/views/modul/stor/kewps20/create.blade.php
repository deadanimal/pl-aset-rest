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
                                <li class="breadcrumb-item"><a href="">kewps20</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps20">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelupusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian" value="Perbadanan Labuan"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Kategori Stor</label>
                            <select class="form-control" name="kategori_stor">
                                <option selected disabled hidden>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>

                        </div>

                        <input type="hidden" name="kuasa_melulus" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="nama_pemeriksa1" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="nama_pemeriksa2" value="{{ Auth::user()->id }}">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="mt-4">Info Kewps20</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="info_kewps20">
                        <div class="col-12 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]" onchange="kod(this,1)">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Perihal Stok</label>
                            <input type="text" id="perihal-1" class="form-control" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Unit Ukuran</label>
                            <input type="text" id="unitukuran-1" class="form-control" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="">Nyatakan Keadaan Stok dengan Jelas</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keadaan_stok[]" value="">
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="">Justifikasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="justifikasi[]" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Keputusan Kuasa Melulus</label>
                            <div class="input-group">
                                <select name="keputusan[]" class="form-control mb-3">
                                    <option disabled hidden selected>Pilih</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Kaedah Pelupusan</label>
                            <select class="form-control mb-3" onchange="pelupusan(this,1)">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kaedah as $k)
                                    <option value="{{ $k->id }}">{{ $k->main_text }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="kaedah_pelupusan[]" id="kaedah_pelupusan-1" value="">
                        </div>
                        <div class="col-6">
                            <label for="">Cara</label>
                            <select class="form-control mb-3" id="cara-1" name="cara[]">
                                <option selected disabled hidden>Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="hidden" id="iteration" value="2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK20()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
        </form>
    </div>

    <script>
        function pelupusan(el, id) {
            let val = el.value;
            $("#cara-" + id).html(``);
            var kaedah = @json($kaedah->toArray());
            kaedah.forEach(e => {
                if (e.id == val) {
                    $("#kaedah_pelupusan-" + id).val(e.main_text);
                }
            });

            var sub = @json($sub->toArray());
            sub.forEach(e => {
                if (e.kaedah_pelupusan_id == val) {
                    $("#cara-" + id).append(`
                         <option value="` + e.text + `">` + e.text + `</option>
                    `);
                }
            });
        }

        function kod(el, id) {
            let val = el.value;
            var kewps3a = @json($kewps3a->toArray());

            kewps3a.forEach(e => {
                if (e.id == val) {
                    $("#perihal-" + id).val(e.perihal_stok);
                    $("#unitukuran-" + id).val(e.unit_pengukuran);
                }
            });
        }

        function tambahAsetK20() {
            let iteration = $("#iteration").val();
            $("#info_kewps20").append(
                `       <div class="col-12 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]" onchange="kod(this,` + iteration + `)">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Perihal Stok</label>
                            <input type="text" id="perihal-` + iteration + `" class="form-control" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Unit Ukuran</label>
                            <input type="text" id="unitukuran-` + iteration + `" class="form-control" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="">Nyatakan Keadaan Stok dengan Jelas</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keadaan_stok[]" value="">
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="">Justifikasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="justifikasi[]" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Keputusan Kuasa Melulus</label>
                            <div class="input-group">
                                <select name="keputusan[]" class="form-control mb-3">
                                    <option disabled hidden selected>Pilih</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Kaedah Pelupusan</label>
                            <select class="form-control mb-3" onchange="pelupusan(this,` + iteration + `)">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kaedah as $k)
                                    <option value="{{ $k->id }}">{{ $k->main_text }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="kaedah_pelupusan[]" id="kaedah_pelupusan-` + iteration + `" value="">
                        </div>
                        <div class="col-6">
                            <label for="">Cara</label>
                            <select class="form-control mb-3" id="cara-` + iteration + `" name="cara[]">
                                <option selected disabled hidden>Pilih</option>
                            </select>
                        </div>
                `
            )
            iteration++;

            $("#iteration").val(iteration);

        }
    </script>
@endsection
