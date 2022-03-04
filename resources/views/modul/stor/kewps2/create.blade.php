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
                                <li class="breadcrumb-item"><a href="">kewps2</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps2">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">BORANG PENOLAKAN BARANG-BARANG (BPB)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">

                    <div class="row">
                        <div class="col-6">
                            <label for="">Tindakan</label>
                            <div class="input-group">
                                <select name="tindakan" class="form-control mb-3">
                                    <option value="Kuantiti Ditolak">Kuantiti Ditolak</option>
                                    <option value="Kuantiti Kurang">Kuantiti Kurang</option>
                                    <option value="Kuantiti Lebih">Kuantiti Lebih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">No Rujukan BTB</label>
                            <select class="form-control mb-4" name="kewps1_id" onchange="kewps2Select(this)">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps1 as $k1)
                                    <option value="{{ $k1->id }}">BTB/{{ sprintf("%'.07d\n", $k1->id) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="status" value="DERAF">
                    </div>

                    <div id="info_kewps2_create" class="container mt-3">

                    </div>



                    <hr>

                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
            </div>



        </form>
    </div>

    <script>
        function kewps2Select(el) {
            $("#info_kewps2_create").html("");

            let val = el.value;
            var kewps1 = @json($kewps1->toArray());

            kewps1.forEach(e => {
                if (e.id == val) {
                    infokewps1 = e.infokewps1;
                }
            });

            infokewps1.forEach(function(e, i) {
                $("#info_kewps2_create").append(`
                    <div id="div` + e.id + `" class="row mb-4">
                            <div class="col-12">
                                <h4 class="d-inline">Aset ` + (i + 1) + `</h4>
                                <a onclick="minus_infokewps1(` + e.id + `)"
                                    class="btn btn-danger btn-sm ml-3 text-white">Buang</a>
                            </div>
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <input type="text" class="form-control mb-3" value="` + e.no_kod + `" readonly>
                                <input type="hidden" name="infokewps1_id[]" value="` + e.id + `">
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Diterima</label>
                                <input type="text" id="kuantiti_diterima-` + e.id + `"
                                 class="form-control mb-3" value="` + e.kuantiti_diterima + `" readonly>
                            </div>
                            <div class="col-4">
                                <label for="">Perihal Barang</label>
                                <input type="text" class="form-control mb-3" value="` + e.perihal_barang + `"
                                    readonly>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Ditolak</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" onkeyup="forKurangLebih(this,` + e.id + `)"
                                    type="text" name="kuantiti_ditolak[]" value="" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Sebab penolakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Kuantiti Kurang/Lebih</label>
                                <input type="number" name="kuantiti_kurang_lebih[]" class="form-control mb-3"
                                    id="kurang-lebih-` + e.id + `" readonly>
                            </div>
                        </div>
                
                `);

            });
        }


        function minus_infokewps1(id) {
            $("#div" + id).hide();
        }

        function forKurangLebih(el, infokewps1_id) {
            let ditolak = el.value;
            let diterima = $('#kuantiti_diterima-' + infokewps1_id).val();

            let kurangLebih = diterima - ditolak;

            $('#kurang-lebih-' + infokewps1_id).val(kurangLebih);

        }
    </script>
@endsection
