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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf68/{{ $jkrpataf68->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kemaskini Aset Tak Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan"
                                    value="{{ $jkrpataf68->no_rujukan }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="{{ $jkrpataf68->tarikh }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kategori Aset</label>
                            <div class="input-group">
                                <select name="kategori_aset" class="form-control" required id="kategori_aset">
                                    <option {{ $jkrpataf68->kategori_aset == 1 ? 'selected' : '' }} value="1">Bangunan dan
                                        Binaan Lain</option>
                                    <option {{ $jkrpataf68->kategori_aset == 2 ? 'selected' : '' }} value="2">
                                        Infrastruktur Jalan & Jambatan</option>
                                    <option {{ $jkrpataf68->kategori_aset == 3 ? 'selected' : '' }} value="3">
                                        Infrastruktur (* Saliran / Pembetungan/ Aset air )</option>
                                    <option {{ $jkrpataf68->kategori_aset == 4 ? 'selected' : '' }} value="4">Lain-lain
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Fungsi Aset</label>
                            <div class="input-group">
                                <select name="fungsi_aset" class="form-control" required>
                                    <option {{ $jkrpataf68->fungsi_aset == 1 ? 'selected' : '' }} value="1">Pejabat /
                                        Ruang Kerja</option>
                                    <option {{ $jkrpataf68->fungsi_aset == 2 ? 'selected' : '' }} value="2">Perumahan/
                                        Penginapan</option>
                                    <option {{ $jkrpataf68->fungsi_aset == 3 ? 'selected' : '' }} value="3">Fasiliti/
                                        Infrastruktur Awam</option>
                                    <option {{ $jkrpataf68->fungsi_aset == 4 ? 'selected' : '' }} value="4">Lain-lain
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_premis"
                                    value="{{ $jkrpataf68->nama_premis }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Alamat Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_premis"
                                    value="{{ $jkrpataf68->alamat_premis }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Koordinat GPS</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="koordinat_gps"
                                    value="{{ $jkrpataf68->koordinat_gps }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kumpulan Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kumpulan_agensi"
                                    value="{{ $jkrpataf68->kumpulan_agensi }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian"
                                    value="{{ $jkrpataf68->kementerian }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jabatan</label>
                            <select class="form-control" name="jabatan" required>
                                @foreach ($jabatan as $j)
                                    <option {{ $j->id == $jkrpataf68->jabatan ? 'selected' : '' }}
                                        value="{{ $j->id }}">{{ $j->singkatan }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Negara</label>
                            <select class="mdb-select md-form form-control" searchable="Search here.." name="negara2"
                                id="j68negara" required>
                                @foreach ($negara as $n)
                                    <option {{ $jkrpataf68->negara == $n->nama ? 'selected' : '' }}
                                        value="{{ $n->id }}"> {{ $n->nama }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="negara" value="{{ $jkrpataf68->negara }}" id="negara">
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Negeri</label>
                            <select name="negeri" id="j68negeri" class="form-control" required></select>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Daerah</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="daerah" value="{{ $jkrpataf68->daerah }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Mukim</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="mukim" value="{{ $jkrpataf68->mukim }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kategori Fungsi Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kategori_fungsi_premis"
                                    value="{{ $jkrpataf68->kategori_fungsi_premis }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Laluan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_laluan"
                                    value="{{ $jkrpataf68->no_laluan }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bilangan Blok</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bilangan_blok"
                                    value="{{ $jkrpataf68->bilangan_blok }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Jumlah Saiz Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_saiz_premis"
                                    value="{{ $jkrpataf68->jumlah_saiz_premis }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh Siap Bina Asal</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_siap_bina_asal"
                                    value="{{ $jkrpataf68->tarikh_siap_bina_asal }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh Warta</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_warta"
                                    value="{{ $jkrpataf68->tarikh_warta }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Jumlah Kos Peralihan Asal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_kos_perolehan_asal"
                                    value="{{ $jkrpataf68->jumlah_kos_perolehan_asal }}" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Lukisan Plan Lokasi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_lukisan_pelan_lokasi"
                                    value="{{ $jkrpataf68->no_lukisan_pelan_lokasi }}" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">No Lokisan Pelan Tapak</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_lukisan_pelan_tapak"
                                    value="{{ $jkrpataf68->no_lukisan_pelan_tapak }}" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Pegawai Teknikal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="pegawai_teknikal"
                                    value="{{ $jkrpataf68->pegawai_teknikal }}" required>
                            </div>
                        </div>
                        <div class="col-4 mt-5">
                            <label for="">Gambar Premis</label>
                            <div class="justify-content-center my-3">
                                <img src="{{ asset('/storage/' . $jkrpataf68->gambar_premis) }}"
                                    class="img-fluid mx-auto d-block">
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="file" name="gambar_premis"
                                    value="{{ $jkrpataf68->gambar_premis }}">
                            </div>
                        </div>

                        <input type="hidden" name="pegawai_daftar" value="{{ Auth::user()->id }}">
                    </div>




                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var negeri = @json($negeri->toArray());
            var ata68 = @json($jkrpataf68->toArray());
            let val = $("#j68negara").val();

            negeri.forEach(element => {
                if (element.negara_id == val) {

                    if (ata68.negeri == element.nama) {
                        $("#j68negeri").append(`
                            <option selected value=" ` + element.nama + ` "> ` + element.nama + ` </option>
                        `);
                    } else {
                        $("#j68negeri").append(`
                            <option value=" ` + element.nama + ` "> ` + element.nama + ` </option>
                        `);
                    }

                }
            });
        });

        $("#j68negara").change(function() {
            $("#j68negeri").html('');
            let val = this.value();
            var negeri = @json($negeri->toArray());
            var negara = @json($negara->toArray());

            negara.forEach(e => {
                if (e.id == val) {
                    $("#negara").val(e.nama);
                }
            });

            negeri.forEach(element => {
                if (element.negara_id == val) {
                    $("#j68negeri").append(`
                            <option value=" ` + element.nama + ` "> ` + element.nama + ` </option>
                        `);
                }
            });
        });
    </script>
@endsection
