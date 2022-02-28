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
                                <li class="breadcrumb-item"><a href="">kewps13</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps13">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Verifikasi</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">No Rujukan InfoKewps10</label>
                            <select class="form-control mb-3" name="infokewps10_id" id="k13_infok10">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($infokewps10 as $k10)
                                    <option value="{{ $k10->id }}">{{ $k10->id }} -
                                        {{ $k10->kewps10->tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->id }} -
                                        {{ $k3a->nama_stor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <h3>Status Stok</h3>
                        </div>
                        <div class="col-2">
                            <label for="">(A) Usang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_stok_A" id="k13_A" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(B) Rosak</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_stok_B" id="k13_B" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(C) Tidak Aktif</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_stok_C" id="k13_C" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(D) Tidak Diperlukan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_stok_D" id="k13_D" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(E) Luput Tempoh</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_stok_E" id="k13_E" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(F) Hilang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_stok_F" id="k13_F" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Keseluruhan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="jumlah_kesuluruhan" id="k13_stok_semasa">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Stok Tidak Diverikasi</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_tidak_diverifikasi"
                                    id="k13_tidak_diverifikasi">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Peratusan Diverifikasi</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="peratusan_diverifikasi"
                                    id="k13_peratusan_diverifikasi">
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $("#k13_infok10").change(function() {
                var infok10_id = this.value;
                $.ajax({
                    type: 'get',
                    url: '/kewps13_dinamic',
                    data: {
                        'id': infok10_id
                    },
                    success: function(data) {
                        $("#k13_A").val(data.statusA);
                        $("#k13_B").val(data.statusB);
                        $("#k13_C").val(data.statusC);
                        $("#k13_D").val(data.statusD);
                        $("#k13_E").val(data.statusE);
                        $("#k13_F").val(data.statusF);
                        $("#k13_stok_semasa").val(data.stok_semasa);

                        var jumlah_verifikasi = data.kuantiti_fizikal_stok;

                        var tidak_diverifikasi = data.stok_semasa - jumlah_verifikasi;

                        $("#k13_tidak_diverifikasi").val(tidak_diverifikasi);

                        var peratusan_diverifikasi = (jumlah_verifikasi / data.stok_semasa) *
                            100;
                        $("#k13_peratusan_diverifikasi").val(peratusan_diverifikasi);

                    },
                    error: function() {
                        console.log('success');
                    },
                });

            });

        });
    </script>
@endsection
