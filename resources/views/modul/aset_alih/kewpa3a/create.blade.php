@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa3a">Kewpa3a</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
<<<<<<< HEAD
        <div id="updateDiv">
            <form id="updateForm" action="/kewpa3a/{{ $kewpa3a->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
=======
        <div id="show">

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pendaftaran Aset</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive py-4">

                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Bil</th>
                                <th scope="col">No Siri Pendaftaran</th>
                                <th scope="col">Agensi</th>
                                <th scope="col">Bahagian</th>
                                <th scope="col">Kod Nasional</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Sub Kategori</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewpa3a as $kewpa3a)
                                <tr>
                                    <td scope="col">{{ $loop->index + 1 }}</td>
                                    <td scope="col">{{ $kewpa3a->no_siri_pendaftaran }}</td>
                                    <td scope="col">{{ $kewpa3a->agensi }}</td>
                                    <td scope="col">{{ $kewpa3a->bahagian }}</td>
                                    <td scope="col">{{ $kewpa3a->kod_nasional }}</td>
                                    <td scope="col">{{ $kewpa3a->kategori }}</td>
                                    <td scope="col">{{ $kewpa3a->sub_kategori }}</td>


                                    @if ($kewpa3a->status == 'DERAF')
                                        <td scope="col"><span class="badge bg-warning">{{ $kewpa3a->status }}</span></th>
                                        @elseif ($kewpa3a->status=="HANTAR")
                                        <td scope="col"><span class="badge bg-primary">{{ $kewpa3a->status }}</span></th>
                                        @elseif ($kewpa3a->status=="LULUS")
                                        <td scope="col"><span class="badge bg-success">{{ $kewpa3a->status }}</span></th>
                                        @elseif ($kewpa3a->status=="DITOLAK")
                                        <td scope="col"><span class="badge bg-danger">{{ $kewpa3a->status }}</span></th>
                                    @endif

                                    <td scope="col">
                                        <a href="/kewpa3a/{{ $kewpa3a->id }}/edit"><i class="fas fa-pen"></i></a>
                                        <a href="/kewpa3apdf/{{ $kewpa3a->id }}"><i class="fas fa-print"></i></a>
                                        <a href="/kewpa3a" onclick="deleteData({{ $kewpa3a }})"><i
                                                class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/kewpa3a" enctype="multipart/form-data">
                @csrf
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
<<<<<<< HEAD
                                <h2 class="mb-0">Sunting Pendaftaran Aset</h2>
                            </div>
=======
                                <h2 class="mb-0">Tambah Pendaftaran Aset</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">

                            <div class="col-4">
                                <label for="">Jenis Aset</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="jenis_aset" required>
                                        <option value="" selected disabled hidden>Pilih Jenis Aset</option required>
                                        <option value="Harta Modal">Harta Modal</option>
                                        <option value="Aset Bernilai Rendah">Aset Bernilai Rendah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Status Selenggara</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="status_selenggara" required>
                                        <option value="" selected disabled hidden>Pilih Status</option>
                                        <option value="Perlu">Perlu</option>
                                        <option value="Tidak Perlu">Tidak Perlu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tempoh Selenggara</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="tempoh_selenggara" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Bahagian</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="bahagian" required>
                                        <option value="" selected hidden>Pilih Jabatan</option required>
                                        @foreach ($jabatan as $jbtn)
                                            <option value="{{ $jbtn->nama_jabatan }}">{{ $jbtn->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kod Nasional</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kod_nasional" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keterangan Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keterangan_aset" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kategori</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kategori" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Sub Kategori</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="sub_kategori" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jenis</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jenis" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Buatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="buatan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jenis Enjin</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jenis_enjin" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Enjin</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_enjin" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Casis</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_casis" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Pendaftaraan Kenderaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_pendaftaraan_kenderaan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Catatan Spesifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan_spesifikasi" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Perolehan Asal</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_perolehan_asal" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Perolehan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_perolehan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Diterima</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_diterima" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Pesanan Rasmi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_pesanan_rasmi" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tempoh Jaminan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nama Pembekal</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nama_pembekal" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Alamat Pembekal</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="alamat_pembekal" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Lokasi Penempatan</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="lokasi_penempatan" required>
                                        <option value="" selected disabled hidden>Pilih Lokasi</option required>
                                        @foreach ($lokasi as $lok)
                                            <option value="{{ $lok->nama_lokasi }}">{{ $lok->nama_lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Penempatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_penempatan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Pemeriksaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_pemeriksaan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Status Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="status_aset" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Usia Guna</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_usia_guna" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Usia Guna</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="usia_guna" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nilai Semasa</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="nilai_semasa" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Perkara</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="perkara" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Cara Diperolehi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="cara_aset_diperolehi" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Rujukan Kelulusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="rujukan_kelulusan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Rujukan Kewpa 1</label>
                                <div class="input-group">
                                    <select onchange="getInfoKewatk1(this)" class="form-control mb-3" name="rujukan_kewpa1_id">
                                        <option value="" required required selected disabled hidden>Pilih No. Pesanan
                                        </option required>
                                        @foreach ($kewpa1 as $kew1)
                                            <option value="{{ $kew1->id }}">Kewatk1 - No Rujukan: {{ $kew1->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="mt-4" id="penempatan_baru_create" style="display: none;">
                <div class="row">
                  <div class="col">
                    <label for="">lokasi</label>

                    <div class="input-group">
                      <select id="no_kod_select" class="form-control mb-3" name="kod_lokasi">
                        <option value="" required required selected disabled hidden>Pilih Lokasi Penempatan</option required>
                        @foreach ($lokasi as $lok)
                        <option value="{{ $lok->kod_lokasi }}">{{ $lok->nama_lokasi }}</option>
                        @endforeach
                      </select>

                    </div>
                  </div>
                  <div class="col">
                    <label for="">medium storan</label>
                    <div class="input-group">
                      <select id="medium_storan_create" class="form-control mb-3" name="medium_storan">

                        <option value="" required required selected disabled hidden>Pilih Medium Storan</option required>
                      </select>

                    </div>
                  </div>
                </div>

              </div> -->

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        <!-- <a id="button_penempatan" class="btn btn-sm btn-primary text-white" onclick="buatPenempatanBaru()">Penempatan Baru</a> -->
                    </div>



                </div>
        </div>
        </form>
    </div>

    <div id="updateDiv" style="display: none;">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sunting Pendaftaran Aset</h2>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                        </div>
                    </div>

<<<<<<< HEAD
                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Jenis Aset</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="jenis_aset" required>
                                        <option value="{{ $kewpa3a->jenis_aset }}" selected disabled hidden>
                                            {{ $kewpa3a->jenis_aset }}</option required>
                                        <option value="Harta Modal">Harta Modal</option>
                                        <option value="Aset Bernilai Rendah">Aset Bernilai Rendah</option>
                                    </select>
                                </div>

=======

                </br>
                <div class="card-body pt-0"> <label for="">Tindakan Diterima</label>
                    <div class="row">

                        <div class="col-4">
                            <label for="">Jenis Aset</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jenis_aset" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        <div class="col-4">
                            <label for="">Agensi</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="agensi" value="{{ $kewpa3a->agensi }}"
                                    required>
=======
                                <input class="form-control mb-3" type="text" name="agensi" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Status Selenggara</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="status_selenggara" value="" required>
                                <select class="form-control mb-3" name="status_selenggara" required>
<<<<<<< HEAD
                                    <option value="{{ $kewpa3a->status_selenggara }}" selected disabled hidden>
                                        {{ $kewpa3a->status_selenggara }}</option>
=======
                                    <option value="" selected disabled hidden>Pilih Status</option>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                                    <option value="Perlu">Perlu</option>
                                    <option value="Tidak Perlu">Tidak Perlu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tempoh Selenggara</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="tempoh_selenggara"
                                    value="{{ $kewpa3a->tempoh_selenggara }}" required>
=======
                                <input class="form-control mb-3" type="text" name="tempoh_selenggara" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Bahagian</label>
<<<<<<< HEAD
                            <div class="input-group">
                                <select class="form-control mb-3" name="bahagian" required>
                                    <option value="{{ $kewpa3a->bahagian }}" selected disabled hidden>
                                        {{ $kewpa3a->bahagian }}</option required>
                                    @foreach ($jabatan as $jbtn)
                                        <option value="{{ $jbtn->nama_jabatan }}">{{ $jbtn->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
=======
                            <select class="form-control mb-3" name="bahagian" required>
                                <option value="" selected disabled hidden>Pilih Bahagian</option required>
                                @foreach ($jabatan as $jbtn)
                                    <option value="{{ $jbtn->nama_jabatan }}">{{ $jbtn->nama_jabatan }}</option>
                                @endforeach
                            </select>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                        </div>
                        <div class="col-4">
                            <label for="">Kod Nasional</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="kod_nasional"
                                    value="{{ $kewpa3a->kod_nasional }}" required>
=======
                                <input class="form-control mb-3" type="text" name="kod_nasional" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keterangan Aset</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="keterangan_aset"
                                    value="{{ $kewpa3a->keterangan_aset }}" required>
=======
                                <input class="form-control mb-3" type="text" name="keterangan_aset" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kategori</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="kategori"
                                    value="{{ $kewpa3a->kategori }}" required>
=======
                                <input class="form-control mb-3" type="text" name="kategori" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Sub Kategori</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="sub_kategori"
                                    value="{{ $kewpa3a->sub_kategori }}" required>
=======
                                <input class="form-control mb-3" type="text" name="sub_kategori" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jenis</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="jenis" value="{{ $kewpa3a->jenis }}"
                                    required>
=======
                                <input class="form-control mb-3" type="text" name="jenis" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Buatan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="buatan" value="{{ $kewpa3a->buatan }}"
                                    required>
=======
                                <input class="form-control mb-3" type="text" name="buatan" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jenis Enjin</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="jenis_enjin"
                                    value="{{ $kewpa3a->jenis_enjin }}" required>
=======
                                <input class="form-control mb-3" type="text" name="jenis_enjin" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">No Enjin</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="no_enjin"
                                    value="{{ $kewpa3a->no_enjin }}" required>
=======
                                <input class="form-control mb-3" type="text" name="no_enjin" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">No Casis</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="no_casis"
                                    value="{{ $kewpa3a->no_casis }}" required>
=======
                                <input class="form-control mb-3" type="text" name="no_casis" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">No Pendaftaraan Kenderaan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="no_pendaftaraan_kenderaan"
                                    value="{{ $kewpa3a->no_pendaftaraan_kenderaan }}" required>
=======
                                <input class="form-control mb-3" type="text" name="no_pendaftaraan_kenderaan" value=""
                                    required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan Spesifikasi</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="catatan_spesifikasi"
                                    value="{{ $kewpa3a->catatan_spesifikasi }}" required>
=======
                                <input class="form-control mb-3" type="text" name="catatan_spesifikasi" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga Perolehan Asal</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="number" name="harga_perolehan_asal"
                                    value="{{ $kewpa3a->harga_perolehan_asal }}" required>
=======
                                <input class="form-control mb-3" type="number" name="harga_perolehan_asal" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Perolehan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="date" name="tarikh_perolehan"
                                    value="{{ $kewpa3a->tarikh_perolehan }}" required>
=======
                                <input class="form-control mb-3" type="date" name="tarikh_perolehan" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Diterima</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="date" name="tarikh_diterima"
                                    value="{{ $kewpa3a->tarikh_diterima }}" required>
=======
                                <input class="form-control mb-3" type="date" name="tarikh_diterima" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">No Pesanan Rasmi</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="no_pesanan_rasmi"
                                    value="{{ $kewpa3a->no_pesanan_rasmi }}" required>
=======
                                <input class="form-control mb-3" type="text" name="no_pesanan_rasmi" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tempoh Jaminan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="tempoh_jaminan"
                                    value="{{ $kewpa3a->tempoh_jaminan }}" required>
=======
                                <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Nama Pembekal</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="nama_pembekal"
                                    value="{{ $kewpa3a->nama_pembekal }}" required>
=======
                                <input class="form-control mb-3" type="text" name="nama_pembekal" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Alamat Pembekal</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="alamat_pembekal"
                                    value="{{ $kewpa3a->alamat_pembekal }}" required>
=======
                                <input class="form-control mb-3" type="text" name="alamat_pembekal" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Lokasi Penempatan</label>
<<<<<<< HEAD
                            <select class="form-control mb-3" name="lokasi_penempatan" required>
                                <option value="{{ $kewpa3a->lokasi_penempatan }}" selected hidden>
                                    {{ $kewpa3a->lokasi_penempatan }}</option> required>
                                @foreach ($lokasi as $lok)
                                    <option value="{{ $lok->nama_lokasi }}">{{ $lok->nama_lokasi }}</option>
=======
                            <select class="form-control mb-3" name="lokasi" required>
                                <option value="" selected disabled hidden>Pilih Lokasi</option required>
                                @foreach ($lokasi as $lok)
                                    <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }}</option>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Penempatan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="date" name="tarikh_penempatan"
                                    value="{{ $kewpa3a->tarikh_penempatan }}" required>
=======
                                <input class="form-control mb-3" type="date" name="tarikh_penempatan" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Pemeriksaan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="date" name="tarikh_pemeriksaan"
                                    value="{{ $kewpa3a->tarikh_pemeriksaan }}" required>
=======
                                <input class="form-control mb-3" type="date" name="tarikh_pemeriksaan" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Status Aset</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="status_aset"
                                    value="{{ $kewpa3a->status_aset }}" required>
=======
                                <input class="form-control mb-3" type="text" name="status_aset" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Usia Guna</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="date" name="tarikh_usia_guna"
                                    value="{{ $kewpa3a->tarikh_usia_guna }}" required>
=======
                                <input class="form-control mb-3" type="date" name="tarikh_usia_guna" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Usia Guna</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="usia_guna"
                                    value="{{ $kewpa3a->usia_guna }}" required>
=======
                                <input class="form-control mb-3" type="text" name="usia_guna" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Nilai Semasa</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="number" name="nilai_semasa"
                                    value="{{ $kewpa3a->nilai_semasa }}" required>
=======
                                <input class="form-control mb-3" type="number" name="nilai_semasa" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Perkara</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="perkara"
                                    value="{{ $kewpa3a->perkara }}" required>
=======
                                <input class="form-control mb-3" type="text" name="perkara" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Cara Diperolehi</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="cara_aset_diperolehi"
                                    value="{{ $kewpa3a->cara_aset_diperolehi }}" required>
=======
                                <input class="form-control mb-3" type="text" name="cara_aset_diperolehi" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Rujukan Kelulusan</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <input class="form-control mb-3" type="text" name="rujukan_kelulusan"
                                    value="{{ $kewpa3a->rujukan_kelulusan }}" required>
=======
                                <input class="form-control mb-3" type="text" name="rujukan_kelulusan" value="" required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Rujukan Kewpa 1</label>
                            <div class="input-group">
<<<<<<< HEAD
                                <select class="form-control mb-3" name="rujukan_kewpa1_id">
                                    <option value="{{ $kewpa3a->rujukan_kewpa1_id }}">No Rujukan:
                                        {{ $kewpa3a->rujukan_kewpa1_id }}</option required>
=======
                                <select onchange="getInfoKewatk1(this)" class="form-control mb-3" name="rujukan_kewpa1_id"
                                    required>
                                    <option value="" selected disabled hidden>Pilih No. Rujukan</option required>
>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
                                    @foreach ($kewpa1 as $kew1)
                                        <option value="{{ $kew1->id }}">Kewatk1 - No Rujukan: {{ $kew1->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div id="info_kewpa3a_create"></div>


                        <div class="mt-4" id="penempatan_baru_update" style="display: none;">
                            <div class="row">
                                <div class="col">
                                    <label for="">lokasi</label>

                                    <div class="input-group">
                                        <select id="no_kod_select" class="form-control mb-3" name="kod_lokasi">
                                            <option value="" required required selected disabled hidden>Pilih Lokasi
                                                Penempatan</option required>
                                            @foreach ($lokasi as $lok)
                                                <option value="{{ $lok->kod_lokasi }}">{{ $lok->nama_lokasi }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">medium storan</label>
                                    <div class="input-group">
                                        <select id="medium_storan_create" class="form-control mb-3" name="medium_storan">

                                            <option value="" required required selected disabled hidden>Pilih Medium Storan
                                            </option required>
                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<<<<<<< HEAD
@endsection
=======
    </div>


    <script type="text/javascript">
        var no_kod = [];
        var kod_lokasi = <?php echo $lokasi; ?>

        $(document).ready(function() {
            initiateDatatable();
            $("#info_kewpa3a_form").hide();
            $("#button_tambah").hide();


        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa3a/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa3a";;
                }
            })
        }

        function buatPenempatanBaru() {
            $("#penempatan_baru_create").show();

        }

        function tambahAsetUntukDitolak() {
            var option_data = ""
            for (let i = 0; i < no_kod.length; i++) {
                option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
            }


            $("#info_kewpa3a_create").append(
                `<div class="row">
              
            <div class="col">
              <label for="">No Kod</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="no_kod">
                ${option_data}
                </select>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan" value="" required>
              </div>
            </div>

         </div>`
            )

        }

        function getInfoKewatk1(obj) {

            $("#medium_storan_create option").remove();

            var option_data = ""

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_kewpa1/" + obj.value,
                type: "GET",
                success: function(data) {

                    no_kod = data;
                    for (let i = 0; i < no_kod.length; i++) {
                        option_data = option_data +
                            `<option value=${no_kod[i].medium}>${no_kod[i].medium}</option>`
                    }

                    $("#medium_storan_create").append(option_data);


                }
            })

        }

        function initiateDatatable() {
            const dataTableBasic = new simpleDatatables.DataTable("#table", {
                searchable: true,
                fixedHeight: true,
                sortable: false
            });
        }


        function getPenempatanData(obj) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa3a_penempatan/" + obj.id,
                type: "GET",
                success: function(data) {
                    console.log("data penempatan", data);

                    $("#medium_storan_create").append(option_data);


                }
            })
        }
    </script>

@endsection

>>>>>>> dd630c7252cf0c579a158bc3f6f750d9005e2870
