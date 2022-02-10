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
                                <li class="breadcrumb-item"><a href="">kewps9</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps9">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pembungkusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">No Rujukan Kewps7</label>
                            <select class="form-control mb-3" onchange="kewps(this)">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($kewps7 as $k7)
                                    <option value="{{ $k7->id }}">{{ $k7->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row" id="aset-kewps7">

                    </div>

                    <input class="form-control mb-3" type="hidden" name="pembungkus_id" value="{{ Auth::user()->id }}">
                    <input class="form-control mb-3" type="hidden" name="status" value="DIPOHON">



                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function kewps(el) {
            $("#aset-kewps7").html('');
            var val = el.value;

            var kewps7 = @json($kewps7->toArray());
            var infokewps7 = @json($infokewps7->toArray());
            let iteration = 1;

            infokewps7.forEach(e => {
                if (e.kewps7_id == val) {
                    $("#aset-kewps7").append(`
                        <div class="col-12 mt-3">
                            <p class="h3">Aset ` + iteration + `</p>
                        </div>
                        <div class="col-4">
                            <label for="">No Rujukan</label>
                            <input class="form-control mb-3" type="text" value="` + e.id + `" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Diterima</label>
                            <input class="form-control mb-3" type="text" value="` + e.kuantiti_diterima + `" readonly>
                        </div>

                        <input type="hidden" name="infokewps7_id[]" value="` + e.id + `" readonly>
                        
                    `);
                    if (e.pembungkusan == "Perlu") {
                        $("#aset-kewps7").append(`
                        <div class="col-4">
                            <label for="">Pembungkusan</label>
                            <select name="pembungkusan[]" class="form-control mb-3" onchange="pembungkusan(this,'div` +
                            iteration + `')">
                                <option selected value="Perlu">Perlu</option>
                                <option value="Tidak Perlu">Tidak Perlu</option>
                            </select>
                        </div>
                        <div class="col-12">
                        <div class="row" id="div` + iteration + `">
                            <div class="col-4">
                                <label for="">Kuantiti Dibungkus</label>
                                <input class="form-control mb-3" type="number" name="kuantiti_dibungkus[]" value="">
                            </div>
                            <div class="col-4">
                                <label for="">Maklumat Pembungkusan</label>
                                <input class="form-control mb-3" type="text" name="maklumat_bungkusan[]" value="">
                            </div>
                            <div class="col-4">
                                <label for="">Maklumat Penghantaran</label>
                                <input class="form-control mb-3" type="text" name="maklumat_penghantaran[]" value="">
                            </div>
                        </div>
                        </div>
                        `);
                    } else if (e.pembungkusan == "Tidak Perlu") {
                        $("#aset-kewps7").append(`
                        <div class="col-4">
                            <label for="">Pembungkusan</label>
                            <select name="pembungkusan[]" class="form-control mb-3" onchange="pembungkusan(this,'div` +
                            iteration + `')">
                                <option value="Perlu">Perlu</option>
                                <option selected value="Tidak Perlu">Tidak Perlu</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="row" id="div` + iteration + `"></div>
                        </div>
                        `);
                    }
                    iteration++;
                }
            });
        }


        function pembungkusan(el, div) {
            let val = el.value;
            let idss = "#" + div;
            if (val == "Perlu") {
                $(idss).append(`
            <div class="col-12">
                <div class="row" id=" ` + div + `">
                <div class="col-4">
                    <label for="">Kuantiti Dibungkus</label>
                    <input class="form-control mb-3" type="number" name="kuantiti_dibungkus[]" value="">
                </div>
                <div class="col-4">
                    <label for="">Maklumat Pembungkusan</label>
                    <input class="form-control mb-3" type="text" name="maklumat_bungkusan[]" value="">
                </div>
                <div class="col-4">
                    <label for="">Maklumat Penghantaran</label>
                    <input class="form-control mb-3" type="text" name="maklumat_penghantaran[]" value="">
                </div>
                </div>
            </div>
            `);
            } else if (val == "Tidak Perlu") {
                $(idss).html('');
            }

        }
    </script>
@endsection
