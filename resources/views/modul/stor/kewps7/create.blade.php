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
                                <li class="breadcrumb-item"><a href="">kewps7</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps7">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Borang Permohonan Stok (Antara Stor)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">Nama Stor Pemesan</label>
                            <div class="input-group">
                                <select name="nama_stor_pemesan" class="form-control">
                                    <option disabled hidden selected>Pilih</option>
                                    <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                    <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Alamat Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_stor_pemesan"
                                    value="Wisma Perbadanan Labuan, Peti Surat 81245, 87022, WP Labuan">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Nama Stor Pengeluar</label>
                            <div class="input-group">
                                <select name="nama_stor_pengeluar" class="form-control">
                                    <option disabled hidden selected>Pilih</option>
                                    <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                    <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Alamat Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_stor_pengeluar"
                                    value="Wisma Perbadanan Labuan, Peti Surat 81245, 87022, WP Labuan">
                            </div>
                        </div>

                        <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="status" value="DIPOHON">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mt-4">Info Kewps7</h2>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row" id="info_kewps7">
                        <div class="col-12">
                            <h3>Aset 1</h3>
                            <input type="hidden" value="1" id="iteration">
                        </div>
                        <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control" name="kewps3a_id[]" onchange="noKod(this,'#perihal1')">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Perihal Stok</label>
                            <div class="input-group">
                                <input class="form-control" type="text" value="" id="perihal1" readonly>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Catatan Pemohon</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan_pemohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Dimohon</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_dimohon[]" value="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 mb-4">
                <a class="btn btn-primary text-white" onclick="tambahAsetK7()">Tambah Aset</a>
                <button class="btn btn-primary " type="submit">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK7() {


            var iteration = $("#iteration").val();
            iteration++;
            $("#iteration").val(iteration);

            $("#info_kewps7").append(
                `       <div class="col-12 mt-5">
                            <h3>Aset ` + iteration + `</h3>
                        </div>
                        <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control" name="kewps3a_id[]" onchange="noKod(this,'#perihal` +
                iteration + `')">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Perihal Stok</label>
                            <div class="input-group">
                                <input class="form-control" type="text" value="" readonly id="perihal` + iteration + `">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Catatan Pemohon</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan_pemohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Dimohon</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_dimohon[]" value="">
                            </div>
                        </div>
                `
            )

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        }

        function noKod(e, perihal_id) {
            let kewps3a_id = e.value;
            var kewps3a = @json($kewps3a->toArray());

            kewps3a.forEach(e => {
                if (e.id == kewps3a_id) {
                    $(perihal_id).val(e.perihal_stok);
                }
            });
        }
    </script>
@endsection
