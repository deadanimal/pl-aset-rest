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
                                <li class="breadcrumb-item"><a href="/kewpa19">Kewpa19</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa19">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Perakuan Pelupusan</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6">
                        <label for="">Agensi</label>
                        <input class="form-control mb-3" type="text" name="agensi" value="Perbadanan Aset Labuan" required>
                    </div>
                    <div class="col-6">
                        <label for="">Alamat</label>
                        <input class="form-control mb-3" type="text" name="alamat"
                            value="Peti Surat 81245, Wilayah Persekutuan Labuan" required>
                    </div>
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa19()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa19_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Perakuan Pelupusan</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a class="align-self-end btn btn-sm btn-primary text-white"
                                onclick="$(this).closest('.card').remove()">Buang</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label for="">No Siri Pendaftaran</label>
                            <div class="input-group">
                                <select name="no_siri_pendaftaran[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa3a as $k3a)
                                        <option value="{{ $k3a->no_siri_pendaftaran }}">{{ $k3a->no_siri_pendaftaran }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Butiran Penambahbaikan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="butiran_penambahbaikan[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Laporan Pemeriksaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="laporan_pemeriksaan[]" value="" required>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        </div>
    </form>

    </div>

    <script type="text/javascript">
        function tambahAsetkewpa19() {

            $("#info_kewpa19_create").append(`
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Perakuan Pelupusan</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a class="align-self-end btn btn-sm btn-primary text-white"
                                onclick="$(this).closest('.card').remove()">Buang</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label for="">No Pindahan Aset Alih</label>
                            <div class="input-group">
                                <select name="no_siri_pendaftaran[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa3a as $k3a)
                                        <option value="{{ $k3a->no_siri_pendaftaran }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Butiran Penambahbaikan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="butiran_penambahbaikan[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Laporan Pemeriksaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="laporan_pemeriksaan[]" value="" required>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            `);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        }
    </script>
@endsection
