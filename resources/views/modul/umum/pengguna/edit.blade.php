@extends('layouts.base_umum') @section('content')

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/pengguna">Pengguna</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form method="POST" action="/pengguna">
            @method('put')
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kemaskini Pengguna</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="h3 mb-5"> Maklumat Pengguna</p>
                        </div>

                        <div class="col-2">
                            <label class="mt-2">Nama Pengguna</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="name" value="{{ $pengguna->name }}">
                        </div>
                        @error('name')
                            <div class="col-12">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-2">
                            <label class="mt-2 ">Kunci Akaun?</label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input mt-3" type="checkbox" name="kunci" value="1"
                                {{ $pengguna->kunci == 1 ? 'checked' : '' }}>
                        </div>

                        <div class="col-2">
                            <label class="mt-2 ">Nyahaktif?</label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input mt-3" type="checkbox" name="nyahaktif" value="1"
                                {{ $pengguna->nyahaktif == 1 ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-2">
                            <label class="mt-2">Nama Pertama</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control " type="text" name="nama_awal" value="{{ $pengguna->nama_awal }}">
                        </div>

                        <div class="col-2">
                            <label class="mt-2">Nama Akhir</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="nama_akhir"
                                value="{{ $pengguna->nama_akhir }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-2">
                            <label class="mt-2">Email</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="email" value="{{ $pengguna->email }}">
                        </div>
                        @error('email')
                            <div class="col-12">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="mt-2 btn btn-primary btn-sm">Set
                                Semula Kata Laluan</a>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-2">
                            <label class="mt-2">Tarikh Mula</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="date" name="tarikh_mula"
                                value="{{ $pengguna->tarikh_mula }}">
                        </div>

                        <div class="col-2">
                            <label class="mt-2">Tarikh Akhir</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="date" name="tarikh_akhir"
                                value="{{ $pengguna->tarikh_akhir }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-2">
                            <label class="mt-2">Adakah Super Admin?</label>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawatan" id="inlineRadio1"
                                    value="superadmin" {{ $pengguna->jawatan == 'SuperAdmin' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawatan" id="inlineRadio2" value="0"
                                    value="option2" {{ $pengguna->jawatan != 'SuperAdmin' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="h3"> Peranan Pengguna</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    Daftar Pengguna
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-3 ml-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option1">
                                <label class="form-check-label">Kemaskini Pengumuman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option2">
                                <label class="form-check-label">Tambah Pengumuman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option3">
                                <label class="form-check-label">Hapus Pengumuman</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    Pengumuman
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-3 ml-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option1">
                                <label class="form-check-label">Kemaskini Pengumuman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option2">
                                <label class="form-check-label">Tambah Pengumuman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option3">
                                <label class="form-check-label">Hapus Pengumuman</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4 d-inline-flex ml-1">
                            <div class="col-3">
                                <input class="form-check-input" type="checkbox" value="option1">
                                <label class="form-check-label">Kelulusan Permohonan</label>
                            </div>
                            <div class="col-3">
                                <input class="form-check-input" type="checkbox" value="option2">
                                <label class="form-check-label">Syor dan Ulasan</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-inline-flex ml-1">
                            <div class="col-3">
                                <input class="form-check-input" type="checkbox" value="option1">
                                <label class="form-check-label">Pengurusan Kod Aset</label>
                            </div>
                            <div class="col-3">
                                <input class="form-check-input" type="checkbox" value="option2">
                                <label class="form-check-label">Pengurusan Kod Stor</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    Mengeluarkan Laporan
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    Isi Nota Kebenaran/Arahan
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    Isi Laporan Akhir Kehilangan Stok
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    Isi Borang Pelupusan Stok
                                </label>
                            </div>
                        </div>

                    </div>
                    <button class=" btn btn-primary" type="submit">Simpan</button>
                </div>
        </form>
    </div>

@endsection
