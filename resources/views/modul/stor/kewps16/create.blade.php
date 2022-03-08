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
                                <li class="breadcrumb-item"><a href="">kewps16</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps16">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Perakuan Ambil Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Agensi</label>
                            <input class="form-control" type="text" name="agensi" value="Perbadanan Labuan" readonly>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Bahagian</label>
                            <select name="bahagian" class="form-control">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($bahagian as $b)
                                    <option value="{{ $b->nama_jabatan }}">{{ $b->singkatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="">Ulasan</label>
                            <select name="ulasan" id="id-ulasan" class="form-control">
                                <option disabled hidden selected>Sila Pilih</option>
                                <option value="Tindakan">Tindakan</option>
                                <option value="Tanpa Tindakan">Tanpa Tindakan</option>
                            </select>
                        </div>
                        <div class="col-6 mt-3" id="tindakan">
                            <label for="">Tindakan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tindakan" value="">
                            </div>
                        </div>
                        <input type="hidden" name="pegawai_menyerah" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_mengambil" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_mengesahkan" value="{{ Auth::user()->id }}">
                    </div>

                    @foreach ($kewps3a as $k3a)
                        <div class="row" id="info_kewps16">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <input type="text" value="{{ $k3a->no_kad }}" class="form-control">
                                <input type="hidden" name="kewps3a_id[]" value="{{ $k3a->id }}" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="">Nama Stor</label>
                                <select class="form-control">
                                    <option {{ $k3a->nama_stor == 'Stor Alat Ganti' ? 'selected' : '' }}
                                        value="Stor Alat Ganti">Stor Alat Ganti</option>
                                    <option {{ $k3a->nama_stor == '>Stor Bekalan Pejabat' ? 'selected' : '' }}
                                        value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti Fizikal Diserahkan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diserahkan[]"
                                        value="">
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="">Kuantiti Fizikal Diambil</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diambil[]"
                                        value="">
                                </div>
                            </div>
                            <div class="col-7">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan[]" value="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $("#tindakan").hide();
        });

        $("#id-ulasan").change(function() {
            let val = this.value;
            if (val == "Tindakan") {
                $("#tindakan").show();
            } else {
                $("#tindakan").hide();
            }
        });
    </script>
@endsection
