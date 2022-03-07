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
                                <li class="breadcrumb-item"><a href="">Pendaftaran Jalan</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jalan/{{ $jalan->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kemaskini Jalan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                {{-- hardcode --}}
                                <div class="col-6 mb-3">
                                    <label for="">NEGERI</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control tahun" type="text" value="LABUAN" disabled>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">DAERAH</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control tahun" type="text" value="LABUAN" disabled>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">PIHAK BERKUASA</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control tahun" type="text" value="M.PERBANDARAN" disabled>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">PENGUASA TEMPATAN</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control tahun" type="text" value="PERBADANAN LABUAN" disabled>
                                </div>
                                {{-- end hardcode --}}
                                <div class="col-6 mb-3">
                                    <label for="">TAHUN DAFTAR</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control tahun" type="text" name="tahun_daftar" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">NAMA JALAN</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="nama_jalan" value="" required>
                                </div>

                                <hr style="width: 100%; color: black;">

                                <div class="col-12 my-3">
                                    <label for=""><strong>MAKLUMAT GPS</strong></label>
                                </div>

                                {{-- koordinat awal form --}}
                                <div class="col-12 my-3">
                                    <label for=""><strong>KOORDINAT MULA</strong></label>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">Latitude</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" step="0.000001" name="latitude_mula" value="" required>

                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Longitude</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" step="000.0000001" name="longitude_mula" value="" required>
                                </div>

                                {{-- koordinat akhir form --}}
                                <div class="col-12 my-3">
                                    <label for=""><strong>KOORDINAT AKHIR</strong></label>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">Latitude</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" step="0.000001" name="latitude_akhir" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Longitude</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" step="000.010000" name="longitude_akhir" value="" required>
                                </div>
                                <div class="col-12 mt-3">
                                    <div style="background: #fff3cd" class="alert" role="alert">
                                        <h5>GPS Koordinat mestilah menggunakan Format "DECIMAL DEGREES [DD]"</h5>
                                        <h6>Nilai Latitude: 0.000000 [7] contoh: 2.123456 </h6>
                                        <h6>Nilai Longitude: 000.000000 [9] contoh: 101.123456 </h6>
                                    </div>
                                </div>

                                <hr style="width: 100%; color: black;">

                                <div class="col-12">
                                    <label for=""><strong>MAKLUMAT JALAN</strong></label>
                                </div>


                                <div class="col-6 mb-3">
                                    <label for="">DARI</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="0.01" name="maklumat_jalan_dari"
                                        value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">KM</span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">KE</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="0.01" name="maklumat_jalan_ke"
                                        value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">KM</span>
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">PANJANG JALAN</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="0.01" name="panjang_jalan" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">KM</span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">JENIS CARRIAGE WAY</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <select class="form-control" name="jenis_carriage_way">
                                        <option value="Single">Single</option>
                                        <option value="Dual">Dual</option>
                                    </select>
                                    <div class="mt-3 badge text-dark" style="background: #fff3cd">
                                        1 = Single, 2 = Dual
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">BIL. LORONG PER CARRIAGE WAY</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" name="bilangan_lorong" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">LEBAR PER LORONG</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="0.01" name="lebar_lorong" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">M</span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">LEBAR JALAN</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="text" name="lebar_jalan" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">M</span>
                                    </div>

                                </div>
                                {{-- formula lebar jalan --}}
                                <div class="col-6"></div>
                                <div class="col-6 mb-3">
                                    <div class="badge text-dark" style="background: #fff3cd">
                                        Jenis Carriage Way x Bil. lorong Per Carriage Way x Lebar Per Lorong
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">LEBAR REZAB JALAN</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="0.01" name="lebar_rezab_jalan"
                                        value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">M</span>
                                    </div>
                                </div>


                                <div class="col-6 mb-3">
                                    <label for="">JENIS JALAN (SRT)</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <select class="form-control" name="jenis_jalan">
                                        <option value="Bitumen">Bitumen</option>
                                        <option value="Earth">Earth</option>
                                        <option value="Gravel">Gravel</option>
                                    </select>

                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">LEBAR PEMBAHAGI JALAN</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="text" step="0.01" name="lebar_pembahagi_jalan"
                                        value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">M</span>
                                        </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">JENIS PEMBAHAGI JALAN</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <select class="form-control" name="jenis_pembahagi_jalan">
                                        <option value="Concrete">Concrete</option>
                                        <option value="Bitumen">Bitumen</option>
                                        <option value="Tiada Rekod">Tiada Rekod</option>
                                    </select>
                                </div>

                                <hr style="width: 100%; color: black;">

                                <div class="col-12 mb-3">
                                    <label for=""><strong>MAKLUMAT BAHU JALAN</strong></label>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">LEBAR BAHU JALAN KEDUA-DUA BELAH</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="text" step="0.01" name="lebar_bahu"
                                        value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">M</span>
                                        </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">JENIS BAHU JALAN</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <select class="form-control" name="jenis_bahu" >
                                      <option value="Concrete">Concrete</option>
                                      <option value="Grass">Grass</option>
                                      <option value="Laterite">Laterite</option>
                                      <option value="Bitumen">Bitumen</option>
                                   </select> 
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">JENIS LONGKANG TEPI JALAN</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <select class="form-control" name="jenis_longkang" >
                                      <option value="Concrete">Concrete</option>
                                      <option value="Bitumen">Bitumen</option>
                                      <option value="Earth">Earth</option>
                                   </select> 
        
        
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">LEBAR LALUAN MOTOSIKAL</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" step="0.01" name="lebar_laluan" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">CATATAN</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="catatan" value="" required>
                                </div>

                                <hr style="width: 100%; color: black;">

                                <div class="col-12 mb-3">
                                    <label for=""><strong>MAKLUMAT ASET</strong></label>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for=""><strong>NAMA JALAN</strong></label>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">DARI</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="nama_jalan_dari" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">KE</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="nama_jalan_ke" value="" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for=""><strong>SUSUT NILAI JALAN</strong></label>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">TAHUN ISYTIHAR</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input onchange="kiraUsia()" class="form-control tahun" type="text" name="tahun_isytihar" value="" required>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="">LUAS</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="0.01" name="luas" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">M<sup>2</sup></span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">KOS BINA</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="Kos_bina" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">USIA</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" name="usia" value="" required disabled>
                                    <div class="mt-3 badge text-dark" style="background: #fff3cd">
                                        TAHUN ISYTIHAR – TAHUN SEMASA
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">BAKI JANGKA HAYAT BERGUNA</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="1" name="baki_jangka_hayat" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">ANGGARAN KOS</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="anggaran_kos" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">SUSUT NILAI</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input class="form-control" type="number" step="0.01" name="susut_nilai" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">BAKI PADA {{date('d/m/Y')}}</label>
                                </div>
                                <div class="col-6 mb-3 input-group">
                                    <input class="form-control" type="number" step="1" name="baki_pada_today" value="" required>
                                </div>

                                {{-- backup --}}
                                {{-- <div class="col-6 mb-3">
                                    <label for="">Bilangan Lorong</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" name="bilangan_lorong" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Nama Jalan Dari</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="nama_jalan_dari" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Nama Jalan Ke</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="nama_jalan_ke" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Tahun Isytihar</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control tahun" type="text" name="tahun_isytihar" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Luas</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" step="0.01" name="luas" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Kos Bina</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="text" name="Kos_bina" value="" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="">Usia</label>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-control" type="number" name="usia" value="" required>
                                </div> --}}
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(".tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
        $(".tahun").attr("autocomplete", "off");

        $(document).ready(function() {
            var j = @json($jalan->toArray());
            $("input[name=tahun_daftar]").val(j.tahun_daftar);
            $("input[name=nama_jalan]").val(j.nama_jalan);
            $("input[name=panjang_jalan]").val(j.panjang_jalan);
            $("input[name=lebar_jalan]").val(j.lebar_jalan);
            $("select[name=jenis_jalan]").val(j.jenis_jalan);
            $("select[name=jenis_carriage_way]").val(j.jenis_carriage_way);
            $("input[name=bilangan_lorong]").val(j.bilangan_lorong);
            $("input[name=lebar_lorong]").val(j.lebar_lorong);
            $("input[name=lebar_rezab_jalan]").val(j.lebar_rezab_jalan);
            $("input[name=lebar_pembahagi_jalan]").val(j.lebar_pembahagi_jalan);
            $("select[name=jenis_pembahagi_jalan]").val(j.jenis_pembahagi_jalan);
            $("input[name=latitude_mula]").val(j.latitude_mula);
            $("input[name=longitude_mula]").val(j.longitude_mula);
            $("input[name=latitude_akhir]").val(j.latitude_akhir);
            $("input[name=longitude_akhir]").val(j.longitude_akhir);
            $("input[name=koordinat_akhir]").val(j.koordinat_akhir);
            $("input[name=maklumat_jalan_dari]").val(j.maklumat_jalan_dari);
            $("input[name=maklumat_jalan_ke]").val(j.maklumat_jalan_ke);
            $("input[name=nama_jalan_dari]").val(j.nama_jalan_dari);
            $("input[name=nama_jalan_ke]").val(j.nama_jalan_ke);
            $("input[name=tahun_isytihar]").val(j.tahun_isytihar);
            $("input[name=luas]").val(j.luas);
            $("input[name=Kos_bina]").val(j.Kos_bina);
            $("input[name=usia]").val(j.usia);

        });

        function kiraUsia() {
            let tahun_isytihar= $("input[name=tahun_isytihar]").val();
            let usia = new Date().getFullYear() - tahun_isytihar;
            $("input[name=usia]").val(usia);
        }
    </script>

@endsection
