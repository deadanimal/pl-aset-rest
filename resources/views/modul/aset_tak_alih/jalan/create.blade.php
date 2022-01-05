@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Jalan</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jalan">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pendaftaran Jalan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mb-3">
                            <label for="">ID PL-PK(PA)-01/02</label>
                            <select name="plpk0102_id" class="form-control">
                                @foreach ($plpk0102 as $p)
                                    <option value="{{ $p->id }}">{{ $p->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Tahun Daftar</label>
                            <input class="form-control tahun" type="text" name="tahun_daftar" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Nama Jalan</label>
                            <input class="form-control" type="text" name="nama_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Panjang Jalan</label>
                            <input class="form-control" type="text" name="panjang_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Lebar Jalan</label>
                            <input class="form-control" type="text" name="lebar_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Jenis Jalan</label>
                            <input class="form-control" type="text" name="jenis_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Jenis Carrage Way</label>
                            <input class="form-control" type="text" name="jenis_carriage_way" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Bilangan Lorong</label>
                            <input class="form-control" type="number" name="bilangan_lorong" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Lebar Lorong</label>
                            <input class="form-control" type="number" step="0.01" name="lebar_lorong" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Lebar Rezab Jalan</label>
                            <input class="form-control" type="number" step="0.01" name="lebar_rezab_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Lebar Pembahagi Jalan</label>
                            <input class="form-control" type="text" step="0.01" name="lebar_pembahagi_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Jenis Pembahagi Jalan</label>
                            <input class="form-control" type="text" name="jenis_pembahagi_jalan" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Latitude Mula</label>
                            <input class="form-control" type="number" step="0.01" name="latitude_mula" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Longitude Mula</label>
                            <input class="form-control" type="number" step="0.01" name="longitude_mula" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Latitude Akhir</label>
                            <input class="form-control" type="number" step="0.01" name="latitude_akhir" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Longitude Akhir</label>
                            <input class="form-control" type="number" step="0.01" name="longitude_akhir" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Koordinat Akhir</label>
                            <input class="form-control" type="number" step="0.01" name="koordinat_akhir" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Maklumat Jalan Dari</label>
                            <input class="form-control" type="number" step="0.01" name="maklumat_jalan_dari" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Maklumat Jalan ke</label>
                            <input class="form-control" type="number" step="0.01" name="maklumat_jalan_ke" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Nama Jalan Dari</label>
                            <input class="form-control" type="text" name="nama_jalan_dari" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Nama Jalan Ke</label>
                            <input class="form-control" type="text" name="nama_jalan_ke" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Tahun Isytihar</label>
                            <input class="form-control tahun" type="text" name="tahun_isytihar" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Luas</label>
                            <input class="form-control" type="number" step="0.01" name="luas" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Kos Bina</label>
                            <input class="form-control" type="text" name="Kos_bina" value="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="">Usia</label>
                            <input class="form-control" type="number" name="usia" value="">
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
        $(".tahun").attr("autocomplete", "off");
    </script>
@endsection
