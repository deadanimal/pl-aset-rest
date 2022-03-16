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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.F10/4</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf104">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penentuan Pelupusan Aset</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">No Dpa</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                            <option value="{{ $ata68->no_dpa }}">{{ $ata68->no_dpa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_rujukan" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="">
                            </div>
                        </div>

                        <div class="col-3 mt-3">
                            <label for="">Kaedah Perlupusan</label>
                            <select name="jenis" class="form-control" id="jkr104_pilih">
                                <option selected>Pilih</option>
                                <option value="1">Roboh</option>
                                <option value="2">Jualan</option>
                                <option value="3">Pindah Milik</option>
                                <option value="4">Tukar Guna</option>
                            </select>
                        </div>

                        <div class="row d-none mx-0 px-0" id="jkr104_roboh">
                            <div class="col-4 mt-3">
                                <label for="">Nama Aset Roboh</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_aset_roboh" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">No Daftar Roboh</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_daftar_roboh" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Tarikh Pelupusan Roboh</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh_pelupusan_roboh" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row d-none mx-0 px-0" id="jkr104_aset_jualan">
                            <div class="col-4 mt-3">
                                <label for="">Nama Aset Jualan</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_aset_jualan" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">No Daftar Jualan</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_daftar_jualan" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Tarikh Pelupusan Jualan</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh_pelupusan_jualan" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row d-none mx-0 px-0" id="jkr104_pindah_milik">
                            <div class="col-4 mt-3">
                                <label for="">Nama Aset Pindah Milik</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_aset_pindah_milik" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">No Daftar Pindah Milik</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_daftar_pindah_milik" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Tarikh Pelupusan Pindah Milik</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh_pelupusan_pindah_milik" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row d-none mx-0 px-0" id="jkr104_tukar_guna">
                            <div class="col-4 mt-3">
                                <label for="">Nama Aset Tukar Guna</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_aset_tukar_guna" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">No Daftar Tukar Guna</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_daftar_tukar_guna" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Tarikh Pelupusan Tukar Guna</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh_pelupusan_tukar_guna" value="">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_pelupusan1" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_pelupusan2" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="penentusahan" value="{{ Auth::user()->id }}">
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $("#jkr104_pilih").change(function() {
            function removednone() {
                $("#jkr104_roboh").removeClass("d-none");
                $("#jkr104_aset_jualan").removeClass("d-none");
                $("#jkr104_pindah_milik").removeClass("d-none");
                $("#jkr104_tukar_guna").removeClass("d-none");
            }
            var value = this.value;
            console.log(value);
            switch (value) {
                case "1":
                    removednone();
                    $("#jkr104_aset_jualan").addClass("d-none");
                    $("#jkr104_pindah_milik").addClass("d-none");
                    $("#jkr104_tukar_guna").addClass("d-none");

                    break;
                case "2":
                    removednone();
                    $("#jkr104_roboh").addClass("d-none");
                    $("#jkr104_pindah_milik").addClass("d-none");
                    $("#jkr104_tukar_guna").addClass("d-none");

                    break;
                case "3":
                    removednone();
                    $("#jkr104_roboh").addClass("d-none");
                    $("#jkr104_aset_jualan").addClass("d-none");
                    $("#jkr104_tukar_guna").addClass("d-none");
                    break;
                case "4":
                    removednone();
                    $("#jkr104_roboh").addClass("d-none");
                    $("#jkr104_aset_jualan").addClass("d-none");
                    $("#jkr104_pindah_milik").addClass("d-none");
                    break;
                default:
                    break;
            }

        });
    </script>

@endsection
