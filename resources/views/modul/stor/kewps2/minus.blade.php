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
                            <label for="">ID Borang BTB</label>
                            <input type="text" class="form-control mb-3" readonly
                                value="BTB/{{ sprintf("%'.07d\n", $kewps1->id) }}">
                            <input type="hidden" name="kewps1_id" class="form-control mb-3"
                                value="{{ sprintf("%'.07d\n", $kewps1->id) }}">
                        </div>
                        <input type="hidden" name="status" value="DERAF">

                    </div>
                    @foreach ($kewps1->infokewps1 as $infokewps1)
                        <div id="div{{ $infokewps1->id }}" class="row">
                            <div class="col-12">
                                <h4 class="d-inline">Aset {{ $loop->iteration }}</h4>
                                <a onclick="minus_infokewps1({{ $infokewps1->id }})"
                                    class="btn btn-danger btn-sm ml-3 text-white">Buang</a>
                            </div>
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <input type="text" class="form-control mb-3" value="{{ $infokewps1->no_kod }}" readonly>
                                <input type="hidden" name="infokewps1_id[]" value="{{ $infokewps1->id }}">
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Diterima</label>
                                <input type="text" id="kuantiti_diterima-{{ $infokewps1->id }}" class="form-control mb-3"
                                    value="{{ $infokewps1->kuantiti_diterima }}" readonly>
                            </div>
                            <div class="col-4">
                                <label for="">Perihal Barang</label>
                                <input type="text" class="form-control mb-3" value="{{ $infokewps1->perihal_barang }}"
                                    readonly>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Ditolak</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" onkeyup="forKurangLebih(this,{{ $infokewps1->id }})"
                                        type="number" name="kuantiti_ditolak[]" value="" required>
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
                                    id="kurang-lebih-{{ $infokewps1->id }}" readonly>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </div>



        </form>
    </div>

    <script>
        function minus_infokewps1(id) {
            $("#div" + id + "").hide();
        }

        function forKurangLebih(el, infokewps1_id) {
            let ditolak = el.value;

            let diterima = $('#kuantiti_diterima-' + infokewps1_id).val();

            let kurangLebih = diterima - ditolak;

            $('#kurang-lebih-' + infokewps1_id).val(kurangLebih);

        }
    </script>
@endsection
