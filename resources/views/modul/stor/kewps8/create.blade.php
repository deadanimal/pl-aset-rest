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
                                <li class="breadcrumb-item"><a href="">kewps8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps8">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Permohonan Stok (Individu Kepada Stor)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row" id="rowbody">
                        <input type="hidden" id="iteration" value="2">
                        <input class="form-control mb-3" type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]" onchange="kewps(this,1)">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    @if ($k3->parasstok->first()->maksimum_stok == 0)
                                        <option disabled value="{{ $k3->id }}">{{ $k3->no_kad }}</option>
                                    @else
                                        <option value="{{ $k3->id }}">{{ $k3->no_kad }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Perihal Stok</label>
                            <input class="form-control mb-3" type="text" id="perihal1" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Stok Sebelum</label>
                            <input class="form-control mb-3" type="text" name="sebelum[]" id="kuantiti1" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">Kuantiti Dipohon</label>
                            <input class="form-control mb-3" id="pohon1" type="number" name="kuantiti_dimohon[]" value=""
                                required>
                        </div>
                        <div class="col-6">
                            <label for="">Catatan Pemohon</label>
                            <input class="form-control mb-3" type="text" name="catatan_pemohon[]" value="">
                        </div>

                    </div>
                    <button class="btn btn-primary" type="button" onclick="tambah()"><i class="fas fa-plus"></i>
                        Tambah</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambah() {

            let iteration = $("#iteration").val();

            $("#rowbody").append(`
                 <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]" onchange="kewps(this,` + iteration + `)">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    @if ($k3->parasstok->first()->maksimum_stok == 0)
                                        <option disabled value="{{ $k3->id }}">{{ $k3->no_kad }}</option>
                                    @else
                                        <option value="{{ $k3->id }}">{{ $k3->no_kad }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Perihal Stok</label>
                            <input class="form-control mb-3" type="text" id="perihal` + iteration + `" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Stok Sebelum</label>
                            <input class="form-control mb-3" type="text" name="sebelum[]" id="kuantiti` + iteration + `" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">Kuantiti Dipohon</label>
                            <input class="form-control mb-3" type="number" id="pohon` + iteration + `" name="kuantiti_dimohon[]" value="" required>
                        </div>
                        <div class="col-6">
                            <label for="">Catatan Pemohon</label>
                            <input class="form-control mb-3" type="text" name="catatan_pemohon[]" value="" required>
                        </div>
            `);
        }

        function kewps(e, num) {
            let kewps3a_id = e.value;
            var kewps3a = @json($kewps3a->toArray());
            kewps3a.forEach(el => {
                if (el.id == kewps3a_id) {
                    $('#perihal' + num).val(el.perihal_stok);
                    $('#kuantiti' + num).val(el.parasstok[0].maksimum_stok);

                }
            });

        }
    </script>
@endsection
