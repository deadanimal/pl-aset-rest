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
                                <li class="breadcrumb-item"><a href="">kewps31</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps31">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Pelupusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Tahun</label>
                            <input type="text" name="tahun" class="form-control mb-3 tahun">
                        </div>
                        <div class="col-6">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kementerian_display"
                                    value="Perbadanan Labuan">
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="info_kewps31">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <input type="hidden" name="kementerian[]" value="Perbadanan Labuan">
                        <div class="col-4">
                            <label for="">No Rujukan InfoKewps20</label>
                            <select class="form-control mb-3" name="kewps20_id[]">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($infokewps20 as $k20)
                                    <option value="{{ $k20->id }}">{{ $k20->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Hasil Pelupusan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hasil_pelupusan[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kos Pengendalian</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kos_pengendalian[]" value="">
                            </div>
                        </div>


                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK31()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK31() {
            $("#info_kewps31").append(
                `       
                        <input type="hidden" name="kementerian[]" value="Perbadanan Labuan">
                       
                        <div class="col-4">
                            <label for="">Pelupusan Stok</label>
                            <select class="form-control mb-3" name="kewps20_id[]">
                                <option selected disable hidden>Pilih</option>
                                @foreach ($infokewps20 as $k20)
                                    <option value="{{ $k20->id }}">{{ $k20->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Hasil Pelupusan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hasil_pelupusan[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kos Pengendalian</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kos_pengendalian[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
