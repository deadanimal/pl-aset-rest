@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/jkrpataf68"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/jkrpataf68">Pl.Pata.f6/8</a></li>
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
                            <h2 class="mb-0">Permohonan Bangunan/Premis</h2>
                        </div>
                    </div>
                </div>


                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        {{-- bahagian 1 --}}
                        <div id="bahagian1" class="col-12 row">

                            {{-- TODO 1: add input for kod lokasi --}}
                            {{-- TODO 2: add input for nama tanah --}}
                            <div class="col-12 my-3">
                                <label style="font-size: 20px;" for=""><strong>BAHAGIAN 1</strong></label>
                            </div>
                            <div class="col-12 my-3">
                                <label for=""><strong>MAKLUMAT BANGUNAN/PREMIS</strong></label>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="">No Rujukan Bangunan</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_rujukan" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tarikh Pendaftaran</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Kategori Aset</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <select name="kategori_aset" class="form-control" required>
                                        <option value="1">Bangunan dan Binaan Lain</option>
                                        <option value="2">Infrastruktur Jalan & Jambatan</option>
                                        <option value="3">Infrastruktur (* Saliran / Pembetungan/ Aset air )</option>
                                        <option value="4">Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Fungsi Aset</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <select name="fungsi_aset" class="form-control" required>
                                        <option value="1">Pejabat / Ruang Kerja</option>
                                        <option value="2">Perumahan/ Penginapan</option>
                                        <option value="3">Fasiliti/ Infrastruktur Awam</option>
                                        <option value="4">Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Nama Premis</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_premis" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Alamat Premis</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="alamat_premis" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Koordinat GPS</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="koordinat_gps" value="" required>
                                </div>
                            </div>
                            {{-- TODO3: add input no dpa --}}

                            <hr style="width: 100%; color: black;">

                            <div class="col-12 my-3">
                                <label for=""><strong>MAKLUMAT PREMIS ASET</strong></label>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Kumpulan Agensi</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kumpulan_agensi" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Kementerian</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kementerian" value="Perbadanan Labuan"
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Jabatan</label>
                            </div>
                            <div class="col-6 mt-3">
                                <select class="form-control" name="jabatan" required>
                                    <option hidden disabled selected>Pilih</option>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->id }}">{{ $j->singkatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Negara</label>
                            </div>
                            <div class="col-6 mt-3">
                                <select class="mdb-select md-form form-control" searchable="Search here.." name="negara2"
                                    id="j68negara" required>
                                    <option value="" disabled selected>Pilih Negara</option>
                                    @foreach ($negara as $n)
                                        <option value="{{ $n->id }}">{{ $n->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Negeri</label>
                            </div>
                            <div class="col-6 mt-3">
                                <select name="negeri" id="j68negeri" class="form-control" required></select>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Daerah</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="daerah" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Mukim</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="mukim" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Kategori Fungsi Premis</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kategori_fungsi_premis" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">No Laluan/No Loji</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_laluan" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Bilangan Blok/ Binaan/ Sistem Utama</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bilangan_blok" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Jumlah Saiz Premis</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="jumlah_saiz_premis" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tarikh Siap Bina Asal</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh_siap_bina_asal" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tarikh Warta</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh_warta" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Jumlah Kos Peralihan Asal</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="jumlah_kos_perolehan_asal" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">No Lukisan Plan Lokasi</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_lukisan_pelan_lokasi" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">No Lukisan Pelan Tapak</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_lukisan_pelan_tapak" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Gambar Premis</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="gambar_premis" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Pegawai Teknikal Fasiliti</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pegawai_teknikal" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Pegawai Daftar & Data Fasiliti</label>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pegawai_daftar" value="" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right">
                                    <a onclick="keBahagian2()" class="active btn btn-primary mt-5">Seterusnya</a>
                                </div>
                            </div>
                        </div>

                        {{-- bahagian 2 (blok)--}}

                        <div id="pilihan_blok" class="col-12 row" style="display: none;">
                        </div>

                        <div id="bahagian2" class="" style="display: none;">
                            <div class="col-12 my-3">
                                <label for=""><strong>PENGUMPULAN DATA ASET KHUSUS</strong></label>
                            </div>
                        </div>

                        


                        

                        {{-- bahagian 3 (aras) --}}
                        <div id="pilihan_aras" class="col-12 row" style="display: none;">
                        </div>

                        
                        <div id="bahagian3" class="col-12 row" style="display: none;">
                            <div class="col-12 my-3 text-center">
                                <label for=""><strong>MAKLUMAT ARAS</strong></label>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Senarai Ruang Untuk Aras: </label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="senarai_ruang_untuk_aras" value="" required>
                                </div>
                            </div>
                            <hr style="width: 100%; color: black;">
                            <div id="maklumat_ruang" class="col-12"></div>
                            <div class="col-12 mt-6 text-center">
                                <a onclick="tambahRuang()" class="btn btn-primary text-white">Tambah Ruang</a>
                            </div>
                        </div>
                    </div>

                    {{-- <button class="btn btn-primary mt-5" type="submit">Simpan</button> --}}
                </div>
            </div>
        </form>
    </div>

    <script>

        // state
        var current_form_bahagian2 = 0; //blok target

        function getFormBahagianRuang(i) {
            return `
                <div id="ruang_${i}" class="row xtra">
                    <div class="col-11">
                        <div class=" row">
                        <div class="col-2 mt-3">
                            <label for="">Kod Ruang</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="kod_ruang" value="" required>
                            </div>
                        </div>
                        <div class="col-2 mt-3">
                            <label for="">Nama Ruang</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_ruang" value="" required>
                            </div>
                        </div>
                        <div class="col-2 mt-3">
                            <label for="">Luas Ruang (M2)</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="luas_ruang" value="" required>
                            </div>
                        </div>
                        <div class="col-2 mt-3">
                            <label for="">Tinggi Ruang</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="tinggi_ruang" value="" required>
                            </div>
                        </div>
                        <div class="col-2 mt-3">
                            <label for="">Fungsi Ruang</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="fungsi_ruang" value="" required>
                            </div>
                        </div>
                        <div class="col-2 mt-3">
                            <label for="">Lampiran</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="file" name="lampiran_ruang" value="" required>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-1">
                        <a class="mt-3 align-self-end btn btn-primary text-white" onclick="$(this).closest('.xtra').remove()">-</a>
                    </div>
                    
                </div>
                <hr style="width: 100%; color: black;">



                `
        }

        function getFormBahagian2(i) {
            return  `
        <div id="bahagian2_${i}" class="col-12 row" style="display: none;">
                            <hr style="width: 100%; color: black;">
                            <div class="col-12 my-3 text-center">
                                <label for=""><strong>BLOK ${i}</strong></label>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Kad Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kad_blok" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Nama Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_blok" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tarikh</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="tarikh_blok" value="" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Pandangan Sudut Hadapan</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="pandangan_sudut_hadapan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Pandangan Sudut Belakang</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="pandangan_sudut_belakang" value=""
                                        required>
                                </div>
                            </div>

                            <hr style="width: 100%; color: black;">
                            <div class="col-12 my-5">
                                <label for=""><strong>MAKLUMAT BLOK</strong></label>
                            </div>

                            {{-- kontraktor --}}
                            <div class="col-6 mt-3">
                                <label for="">Kontraktor Utama</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kontraktor_utama" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Kontraktor</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="kontraktor_1" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="kontraktor_2" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="kontraktor_3" value=""
                                        required>
                                </div>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="">Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bk_kontraktor_utama" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_kontraktor_1" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_kontraktor_2" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_kontraktor_3" value=""
                                        required>
                                </div>
                            </div>

                            {{-- perunding --}}
                            <div class="col-6 mt-3">
                                <label for="">Juru Perunding Utama</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="perunding_utama" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Juru Perunding</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="juru_perunding_1" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="juru_perunding_2" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="juru_perunding_3" value=""
                                        required>
                                </div>
                            </div>

                            {{-- bidang kerja --}}
                            <div class="col-6 mt-3">
                                <label for="">Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bk_jp_utama" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_jp_1" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_jp_2" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_jp_3" value=""
                                        required>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div style="background: #fff3cd" class="alert" role="alert">
                                    <h5><strong>Nota: *Sila sediakan lampiran jika ada tambahan</strong></h5>
                                </div>
                            </div>

                            {{-- maklumat tambahan --}}
                            <div class="col-6 mt-3">
                                <label for="">Kegunaan Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kegunaan_blok" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Jenis Struktur</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="jenis_struktur" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">No Siri Pendaftaran</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_siri_pendaftaran" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Bil. Aras Atas Tanah</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bil_aras_atas_tanah" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Bil. Aras Bawah Tanah</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bil_aras_bawah_tanah" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tahun Siap Bina Asal</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="number" name="tahun_siap_bina_asal" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Penggunaan Tenaga</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="penggunaan_tenaga" value=""
                                        required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">kilowatt</span>
                                        </div>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Penggunaan Air</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="penggunaan_air" value=""
                                        required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">M<sup>3</sup></span>
                                        </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Luas Lantai Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="luas_lantai_blok" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Luas Tapak Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="luas_tapak_blok" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-12 mt-6 text-center">
                                <a onclick="keMaklumatAras()" class="btn btn-primary text-white">Isi Maklumat Aras</a>
                                <a onclick="kePagePilihanBlok()" class="btn btn-primary text-white">Pilih Blok</a>
                            </div>


                        </div>
        `
        }
        
        $("#j68negara").change(function() {
            $("#j68negeri").html('');
            var val = this.value;

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

        function keBahagian2() {
            $("#bahagian1").hide();

            let bilangan_blok = $("input[name=bilangan_blok]").val();

            let bahagian_2_html = ``;
            let bahagian_2_html_pilihan = `<div class="col-12 row text-center">
                <div class="col-12 mt-3">
                    <label for=""><strong>Pilih Blok</strong> </label>&nbsp;
                </div>`;


            for(let i=1; i<=bilangan_blok; i++) {
                bahagian_2_html = bahagian_2_html + getFormBahagian2(i);
                bahagian_2_html_pilihan = bahagian_2_html_pilihan + 
                `
                    <div onclick="keFormBlok(${i})" class="col-2 btn btn-primary mt-3 text-white">
                        Blok ${i}
                    </div>
                `;
            }
            bahagian_2_html_pilihan = bahagian_2_html_pilihan + `</div>`;

            $("#bahagian2").append(bahagian_2_html);
            $("#pilihan_blok").append(bahagian_2_html_pilihan);
            $("#pilihan_blok").show();

        }

        function keMaklumatAras() {
            $("#bahagian2").hide();
            let total_aras_atas_tanah = $(`#bahagian2_${current_form_bahagian2} input[name=bil_aras_atas_tanah]`).val();
            let total_aras_bawah_tanah = $(`#bahagian2_${current_form_bahagian2} input[name=bil_aras_bawah_tanah]`).val();
            let total_aras = +total_aras_atas_tanah + +total_aras_bawah_tanah;
            let bahagian_3_html = ``;

            let aras_html_pilihan = `<div class="col-12 row text-center">
                <div class="col-12 mt-3">
                    <label for=""><strong>Pilih Aras</strong> </label>&nbsp;
                </div>`;


            for(let i=1; i<=total_aras; i++) {
                bahagian_3_html = bahagian_3_html + getFormBahagianRuang(i);
                aras_html_pilihan = aras_html_pilihan + 
                `
                    <div onclick="keFormAras(${i})" class="col-2 btn btn-primary mt-3 text-white">
                        Aras ${i}
                    </div>
                `;
            }
            aras_html_pilihan = aras_html_pilihan + `</div>`;

            $("#pilihan_aras").append(aras_html_pilihan);
            $("#pilihan_aras").show();
        }

        function tambahRuang() {
            $("#maklumat_ruang").append(getFormBahagianRuang());
        }

        function keFormBlok(i) {
            $("#pilihan_blok").hide();
            $(`#bahagian2`).show();
            $(`#bahagian2_${i}`).show();

            current_form_bahagian2 = i;

        }

        function kePagePilihanBlok() {
            $("#pilihan_blok").show();
            $(`#bahagian2`).hide();
            tutupFormBlokLain();
            
        }

        function tutupFormBlokLain() {
            let bilangan_blok = $("input[name=bilangan_blok]").val();
            for (let i=1; i<=bilangan_blok; i++) {
                $(`#bahagian2_${i}`).hide();
            }
        }


    </script>
@endsection
