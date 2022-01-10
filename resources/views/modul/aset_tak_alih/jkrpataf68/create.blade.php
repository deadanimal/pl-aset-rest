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
        <form method="POST" action="/jkrpataf68" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pendaftaran Aset Tak Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kategori Aset</label>
                            <div class="input-group">
                                <select name="kategori_aset" class="form-control" required>
                                    <option value="1">Bangunan dan Binaan Lain</option>
                                    <option value="2">Infrastruktur Jalan & Jambatan</option>
                                    <option value="3">Infrastruktur (* Saliran / Pembetungan/ Aset air )</option>
                                    <option value="4">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Fungsi Aset</label>
                            <div class="input-group">
                                <select name="fungsi_aset" class="form-control" required>
                                    <option value="1">Pejabat / Ruang Kerja</option>
                                    <option value="2">Perumahan/ Penginapan</option>
                                    <option value="3">Fasiliti/ Infrastruktur Awam</option>
                                    <option value="4">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Nama Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_premis" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Alamat Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_premis" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Koordinat GPS</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="koordinat_gps" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kumpulan Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kumpulan_agensi" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian" value="Perbadanan Labuan"
                                    required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jabatan</label>
                            <select class="form-control" name="jabatan" required>
                                <option selected>Pilih</option>
                                @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}">{{ $j->singkatan }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Negara</label>
                            <select class="mdb-select md-form form-control" searchable="Search here.." name="negara"
                                id="j68negara" required>
                                <option value="" disabled selected>Choose your country</option>
                                @foreach ($negara as $n)
                                    <option value="{{ $n->id }}">
                                        {{ $n->nama }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Negeri</label>
                            <select name="negeri" id="j68negeri" class="form-control" required></select>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Daerah</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="daerah" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Mukim</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="mukim" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kategori Fungsi Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kategori_fungsi_premis" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Laluan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_laluan" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bilangan Blok</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bilangan_blok" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Jumlah Saiz Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_saiz_premis" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh Siap Bina Asal</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_siap_bina_asal" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh Warta</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_warta" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Jumlah Kos Peralihan Asal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_kos_perolehan_asal" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Lukisan Plan Lokasi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_lukisan_pelan_lokasi" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Lokisan Pelan Tapak</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_lukisan_pelan_tapak" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Gambar Premis</label>
                            <div class="input-group">
                                <input class="form-control" type="file" name="gambar_premis" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Pegawai Teknikal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="pegawai_teknikal" value="" required>
                            </div>
                        </div>

                        <input type="hidden" name="pegawai_daftar" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="data_tanah">
                        <div class="col-12 mt-5">
                            <h3>DATA TANAH DALAM PREMIS ASET</h3>
                        </div>
                        <div class="col-12 mt-4">
                            <h5>Tanah</h5>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Tarikh Pemilikan </label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="date" name="pemilikan_tarikh[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Pemilikan Kos</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="pemilikan_kos[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Mukim Bandar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="mukim_bandar[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">No Hakmilik</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="hakmilik_nombor[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">Jenis Hakmilik</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="hakmilik_jenis[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">No Lot</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="lot_nombor[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">Luas Lot</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="lot_luas[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label col-form-label-sm" for="">Status</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="status[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label col-form-label-sm" for="">Tarikh PTP</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="date" name="tarikh_ptp[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label col-form-label-sm" for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="catatan[]" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahdatatanah()">Tambah Aset</a>
                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#j68negara").change(function() {
                var val = this.value;
                var negeri = @json($negeri->toArray());

                negeri.forEach(element => {
                    if (element.negara_id == val) {
                        $("#j68negeri").append(`
                            <option value=" ` + element.id + ` "> ` + element.nama + ` </option>
                        `);
                    }
                });
            });
        });

        function tambahdatatanah() {
            $("#data_tanah").append(
                `       
                  <div class="col-12 mt-4">
                            <h5>Tanah</h5>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Tarikh Pemilikan </label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="date" name="pemilikan_tarikh[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Pemilikan Kos</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="pemilikan_kos[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label col-form-label-sm" for="">Mukim Bandar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="mukim_bandar[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">No Hakmilik</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="hakmilik_nombor[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">Jenis Hakmilik</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="hakmilik_jenis[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">No Lot</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="lot_nombor[]" value="" required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <label class="form-label col-form-label-sm" for="">Luas Lot</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="lot_luas[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label col-form-label-sm" for="">Status</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="status[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label col-form-label-sm" for="">Tarikh PTP</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="date" name="tarikh_ptp[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label class="form-label col-form-label-sm" for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="catatan[]" value="" required>
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
