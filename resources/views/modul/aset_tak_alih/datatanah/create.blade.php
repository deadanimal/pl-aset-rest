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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/datatanah" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pendaftaran Data Tanah</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">


                        <div class="col-12 my-3">
                            <label for=""><strong>MAKLUMAT TANAH</strong></label>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">No Rujukan Tanah</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="no_rujukan_tanah" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Tarikh Pendaftaran</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_pendaftaran" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Nama Tanah</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_tanah" value="" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Alamat Tanah</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_tanah" value="" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Koordinat GPS</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="koordinat_gps" value="" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">No. DPA</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="no_dpa" value="" required>
                            </div>
                        </div>

                    <hr style="width: 100%; color: black;">

                        <div class="col-12 my-5">
                            <label for=""><strong>DATA TANAH DALAM PERMIS ASET</strong></label>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Tarikh Pemilikan </label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="pemilikan_tarikh" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Pemilikan Kos</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="pemilikan_kos" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Mukim Bandar</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="mukim_bandar" value="" required>
                            </div>
                        </div>



                        <div class="col-6">
                            <label class="form-label" for="">No Hakmilik</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hakmilik_nombor" value="" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Jenis Hakmilik</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="hakmilik_jenis" value="" required>
                            </div>
                        </div>


                        <div class="col-6">
                            <label class="form-label" for="">No Lot</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="lot_nombor" value="" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="">Luas Lot</label>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="lot_luas" value="" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">M<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-6">
                            <label class="form-label" for="">Status Kegunaan</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="status_penggunaan" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Tarikh PTP</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_ptp" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Catatan</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="">Gambar Premis</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="form-control mb-3" type="file" name="gambar_premis" value="" required>
                            </div>
                        </div>

                        <hr style="width: 100%; color: black;">


                    </div>
                    <br>


                    <button class="btn btn-primary " type="submit">Simpan</button>

                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
    </script>
@endsection
