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
        <div id="updateDiv">
            <form id="updateForm" action="/kewpa3a/{{ $kewpa3a->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Sunting Pendaftaran Aset</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Jenis Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jenis_aset"
                                        value="{{ $kewpa3a->jenis_aset }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi"
                                        value="{{ $kewpa3a->agensi }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Bahagian</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="bahagian" required>
                                        <option value="{{ $kewpa3a->bahagian }}" selected disabled hidden>
                                            {{ $kewpa3a->bahagian }}</option required>
                                        @foreach ($jabatan as $jbtn)
                                            <option value="{{ $jbtn->nama_jabatan }}">{{ $jbtn->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kod Nasional</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kod_nasional"
                                        value="{{ $kewpa3a->kod_nasional }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keterangan Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keterangan_aset"
                                        value="{{ $kewpa3a->keterangan_aset }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kategori</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kategori"
                                        value="{{ $kewpa3a->kategori }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Sub Kategori</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="sub_kategori"
                                        value="{{ $kewpa3a->sub_kategori }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jenis</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jenis" value="{{ $kewpa3a->jenis }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Buatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="buatan"
                                        value="{{ $kewpa3a->buatan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jenis Enjin</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jenis_enjin"
                                        value="{{ $kewpa3a->jenis_enjin }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Enjin</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_enjin"
                                        value="{{ $kewpa3a->no_enjin }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Casis</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_casis"
                                        value="{{ $kewpa3a->no_casis }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Pendaftaraan Kenderaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_pendaftaraan_kenderaan"
                                        value="{{ $kewpa3a->no_pendaftaraan_kenderaan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Catatan Spesifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan_spesifikasi"
                                        value="{{ $kewpa3a->catatan_spesifikasi }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Perolehan Asal</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga_perolehan_asal"
                                        value="{{ $kewpa3a->harga_perolehan_asal }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Perolehan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_perolehan"
                                        value="{{ $kewpa3a->tarikh_perolehan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Diterima</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_diterima"
                                        value="{{ $kewpa3a->tarikh_diterima }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Pesanan Rasmi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_pesanan_rasmi"
                                        value="{{ $kewpa3a->no_pesanan_rasmi }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tempoh Jaminan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="tempoh_jaminan"
                                        value="{{ $kewpa3a->tempoh_jaminan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nama Pembekal</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nama_pembekal"
                                        value="{{ $kewpa3a->nama_pembekal }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Alamat Pembekal</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="alamat_pembekal"
                                        value="{{ $kewpa3a->alamat_pembekal }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Lokasi Penempatan</label>
                                <select class="form-control mb-3" name="lokasi_penempatan" required>
                                    <option value="{{ $kewpa3a->lokasi_penempatan }}" selected hidden>
                                        {{ $kewpa3a->lokasi_penempatan }}</option> required>
                                    @foreach ($lokasi as $lok)
                                        <option value="{{ $lok->nama_lokasi }}">{{ $lok->nama_lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Penempatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_penempatan"
                                        value="{{ $kewpa3a->tarikh_penempatan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Pemeriksaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_pemeriksaan"
                                        value="{{ $kewpa3a->tarikh_pemeriksaan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Status Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="status_aset"
                                        value="{{ $kewpa3a->status_aset }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Usia Guna</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_usia_guna"
                                        value="{{ $kewpa3a->tarikh_usia_guna }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Usia Guna</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="usia_guna"
                                        value="{{ $kewpa3a->usia_guna }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nilai Semasa</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_semasa"
                                        value="{{ $kewpa3a->nilai_semasa }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Perkara</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="perkara"
                                        value="{{ $kewpa3a->perkara }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Rujukan Kelulusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="rujukan_kelulusan"
                                        value="{{ $kewpa3a->rujukan_kelulusan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Rujukan Kewpa 1</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="rujukan_kewpa1_id">
                                        <option value="{{ $kewpa3a->rujukan_kewpa1_id }}">No Rujukan:
                                            {{ $kewpa3a->rujukan_kewpa1_id }}</option required>
                                        @foreach ($kewpa1 as $kew1)
                                            <option value="{{ $kew1->id }}">Kewatk1 - No Rujukan: {{ $kew1->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>

                    </div>
            </form>
        </div>
    </div>
@endsection
