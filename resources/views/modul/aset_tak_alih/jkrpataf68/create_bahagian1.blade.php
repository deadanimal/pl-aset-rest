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
        <form method="POST" action="/create-permohonan-bangunan" enctype="multipart/form-data">
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
                                <input name="negara" id="j68negeri" class="form-control" required></select>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Negeri</label>
                            </div>
                            <div class="col-6 mt-3">
                                <input name="negeri" id="" class="form-control" required></select>
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
                                    <button class="btn btn-primary mt-5" type="submit">Seterusnya</button>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
