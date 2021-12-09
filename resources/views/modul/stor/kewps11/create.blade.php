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
                                <li class="breadcrumb-item"><a href="">kewps11</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps11">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Verifikasi Stor</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Tahun</label>
                            <input type="text" name="tahun" class="form-control" id="k11_tahun" autocomplete="off">
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Nama Stor</label>
                            <select name="nama_stor" class="form-control">
                                <option selected>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>
                        <input class="form-control" type="hidden" name="pegawai_verifikasi1"
                            value="{{ Auth::user()->id }}">

                        <input class="form-control" type="hidden" name="pegawai_verifikasi2"
                            value="{{ Auth::user()->id }}">

                        <input class="form-control" type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                        <input class="form-control" type="hidden" name="ulasan_ketua_jabatan"
                            value="Contoh Ulasan Ketua Jabatan">

                    </div>
                    <div class="row">
                        <div class="row col-12">
                            <h3 class="col-4 mt-4">Organisasi Stor</h3>
                            <h3 class="col-2 mt-4 pl-4">Skala Prestasi</h3>
                            <h3 class="col-6 mt-4 pl-4">Penemuan dan Ulasan</h3>
                        </div>

                        <div class="col-4">
                            <label class="col-form-label">Carta Organisasi</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label">Pelan Lantai Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Pelantikan</label>
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (a) Pegawai Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (b) Pegawai Pelulus</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (c) Pegawai Penerima</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4"> Keselamatan dan Kebersihan</h3>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keselamatan</label>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (a) Lokasi Kedudukan Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (b) Pengurusan Kunci Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (c) Peralatan Keselamatan Yang Sesuai</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <label class="form-label mt-3">Kawalan Kebakaran</label>
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (a) Alat Pemadam Api</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (b) Penunjuk Arah dan Tanda Keselamatan</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (c) Penanda Arah Keluar Masuk</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (d) Latihan Kebakaran</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <label class="form-label mt-3">Kebersihan</label>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (a) Kebersihan Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> &nbsp &nbsp (b) Kawalan Pencegahan Serangga</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-12">
                            <h3 class="col-form-label mt-4"> Kawalan Stok</h3>
                        </div>

                        <div class="col-4">
                            <label class="col-form-label">Paras Stok</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> Kumpulan Stok</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> Kadar Pusingan Stok</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Proses Merekod</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label">Ketepatan Rekod</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> Penggunaan Sistem Sepenuhnya</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Proses Penyimpanan</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Kod Lokasi Stok</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> Label Lokasi</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> Sistem MDKD</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-4">
                            <label class="col-form-label"> Kesesuaian Tempat Penyimpanan Stok</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Proses Pengeluaran</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Sistem MDKD</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Kelulusan Pengeluaran</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Penemuan Verifikasi</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Usang</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Tidak Aktif</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Rosak</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Hilang</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Tidak Diperlukan</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Luput Tempoh</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Proses Pelupusan</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Pematuhan Kuasa Melulus</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Tempoh Tindakan Pelupusan</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Sijil Pelupusan</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Proses Hapus Kira</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Pematuhan Kuasa Melulus</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Tempoh Penyediaan Laporan Awal</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Tempoh Penyediaan Laporan Akhir</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Sijil Hapus Kira</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>

                        <div class="col-12">
                            <h3 class="col-form-label mt-4">Latihan</h3>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Menghadiri Kursus Tatacara Pengurusan Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        <div class="col-4">
                            <label class="col-form-label"> Menghadiri Kursus Sistem Pengurusan Stor</label>
                        </div>
                        <div class="col-2 mt-2">
                            <select class="form-control form-control-sm" name="skala_prestasi[]">
                                <option selected value="TB">TB</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="text" class="form-control form-control-sm" name="penemuan_ulasan[]">
                        </div>
                        {{-- end --}}
                    </div>
                    <div class=" mt-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $("#k11_tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>
@endsection
