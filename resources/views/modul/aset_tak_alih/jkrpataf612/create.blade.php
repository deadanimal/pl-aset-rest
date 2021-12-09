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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf612">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Daftar Aset Khusus</h2>
                        </div>
                    </div>
                </div>

                </br>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">No Pendaftaran</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                        @if (!in_array($ata68->id, $check))
                                            <option value="{{ $ata68->id }}">{{ $ata68->id }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan" value="">
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">

                    </div>

                    <div class="row" id="info_blokbangunan">

                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahblokbangunan()">Tambah Block
                            Bangunan</a>
                    </div>

                    <div class="row" id="info_binaanluar">

                    </div>
                    <div class="mt-4">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahbinaanluar()">Tambah Binaan Luar</a>
                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahblokbangunan() {
            $("#info_blokbangunan").append(
                `       
                         <div class="col-12 mt-5">
                            <h3>Blok Bangunan</h3>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Nama Blok</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_blok[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label col-form-label-sm" for="">Luas Tapak</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="luas_tapak[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="catatan1[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label col-form-label-sm" for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="from_page[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label col-form-label-sm" for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="to_page[]" value="">
                            </div>
                        </div>
                `
            )
        }

        function tambahbinaanluar() {
            $("#info_binaanluar").append(
                `       <div class="col-12 mt-5">
                            <h3>Binaan Luar</h3>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Nama Binaan Luar</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="nama_binaan_luar[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label col-form-label-sm" for="">Luas Tapak</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="luas_tapak2[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label col-form-label-sm" for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="catatan2[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label col-form-label-sm" for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="from_page2[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label col-form-label-sm" for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" name="to_page2[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
