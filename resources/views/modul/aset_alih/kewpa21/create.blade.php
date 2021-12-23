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
                                <li class="breadcrumb-item"><a href="/kewpa21">Kewpa21</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa21">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Borang Pelupusan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12">
                        <label for="">Kuasa Melulus</label>
                        <input class="form-control mb-3" type="text" name="kuasa_melulus" required>
                    </div>
                    <input type="hidden" name="pegawai_pemeriksa1" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pegawai_pemeriksa2" value="{{ Auth::user()->id }}">
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetkewpa21()">Tambah Aset</a>
                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa21_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Borang Pelupusan</h2>
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
                                        <option value="{{ $k3a->id }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keadaan Aset</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keadaan_aset[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah Pelupusan</label>
                            <select name="kaedah_pelupusan[]" class="form-control mb-3" required>
                                <option selected>Pilih</option>
                                @foreach ($kaedah_pelupusan as $kp)
                                    <option value="{{ $kp->value }}">{{ $kp->text }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-4">
                            <label for="">Justifikasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="justifikasi[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keputusan Melulus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keputusan_melulus[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function tambahAsetkewpa21() {

            $("#info_kewpa21_create").append(`
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
                                        <option value="{{ $k3a->id }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keadaan Aset</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keadaan_aset[]" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah Pelupusan</label>
                            <select name="kaedah_pelupusan[]" class="form-control mb-3" required>
                                <option selected>Pilih</option>
                                @foreach ($kaedah_pelupusan as $kp)
                                    <option value="{{ $kp->value }}">{{ $kp->text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Justifikasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="justifikasi[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keputusan Melulus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keputusan_melulus[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
                            </div>
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
