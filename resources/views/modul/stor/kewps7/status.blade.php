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
        <form method="POST" action="/kewps7/{{ $kewps7->id }}">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mt-4">Info Kewps7 {{ $kewps7->status == 'DIPOHON' ? '- Kelulusan' : '' }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($kewps7->infokewps7 as $ik7)
                        <div class="row mb-5" id="k7_row{{ $ik7->id }}">
                            <div class="col-12">
                                <h3>Aset {{ $loop->iteration }}</h3>
                            </div>
                            @if ($kewps7->status == 'DIPOHON')
                                <input type="hidden" name="pelulus_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="status" value="DILULUS">
                                <input type="hidden" name="infokewps7_id[]" value="{{ $ik7->id }}">
                                <div class="col-2 mt-3">
                                    <label for="">Kuantiti Dimohon</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" value="{{ $ik7->kuantiti_dimohon }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Catatan Pemohon</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="{{ $ik7->catatan_pemohon }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <label for="">Kuantiti Diluluskan</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="kuantiti_diluluskan[]" value="">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Catatan Pelulus</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="catatan_pelulus[]" value="">
                                    </div>
                                </div>
                            @endif
                            @if ($kewps7->status == 'DILULUS')
                                <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="pengeluar_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="status" value="DITERIMA">
                                <input type="hidden" name="infokewps7_id[]" value="{{ $ik7->id }}">
                                <div class="col-2 mt-3">
                                    <label for="">Kuantiti Dimohon</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" value="{{ $ik7->kuantiti_dimohon }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Catatan Pemohon</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="{{ $ik7->catatan_pemohon }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <label for="">Kuantiti Diluluskan</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number"
                                            value="{{ $ik7->kuantiti_diluluskan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Catatan Pelulus</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="{{ $ik7->catatan_pelulus }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Kuantiti Dikeluarkan</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="kuantiti_dikeluarkan[]" value="">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Pembungkusan</label>
                                    <select class="form-control" name="pembungkusan[]">
                                        {{-- onchange="bungkus(this,{{ $ik7->id }})" --}}
                                        <option selected value="Tidak Perlu">Tidak Perlu</option>
                                        <option value="Perlu">Perlu</option>
                                    </select>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="">Kuantiti Diterima</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="kuantiti_diterima[]" value="">
                                    </div>
                                </div>

                            @endif
                        </div>
                    @endforeach
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- <script>
        function bungkus(val, id) {
            alert(val.value);
            var row = "#k7_row" + id

            if (val.value == "Perlu") {
                $(row).append(`
                                <div class="col-4 mt-3">    
                                    <label for="">Kuantiti Diterima</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="kuantiti_diterima[]" value="">
                                        </div>
                                </div>`);
            } else {

            }


        }
    </script> --}}

@endsection
