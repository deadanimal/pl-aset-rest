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
        <form method="POST" action="/edit-aras/{{ $aras->id }}" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Permohonan Bangunan/Premis</h2>
                        </div>
                    </div>
                </div>

                {{$context}}

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        {{-- bahagian 1 --}}
                        <div id="bahagian1" class="col-12 row">
                            <div class="col-12 my-3">
                                <label style="font-size: 20px;" for=""><strong>MAKLUMAT ARAS</strong></label>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="">Senarai Ruang untuk Aras</label>
                            </div>
                            <div class="col-3 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="senarai_ruang_untuk_aras"
                                        value="{{ $aras->senarai_ruang_untuk_aras }}" required>
                                </div>
                            </div>



                            {{-- if already exist show here --}}
                            
                            <hr style="width: 100%; color: black;">

                            <div id="maklumat_ruang" class="col-12">

                            </div>


                            <div class="col-12">
                                <div class="text-right">
                                    <a href="/pilihan-aras?blok_id={{ $aras->id_blok }}"
                                        class="btn btn-primary mt-5 text-white">Kembali</a>
                                    <a onclick="tambahRuang()" class="btn btn-primary mt-5 text-white">Tambah Ruang</a>
                                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                                    <a href="/jkrpataf68"
                                        class="btn btn-primary mt-5 text-white">Selesai</a>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(() => {
            tambahRuang();
        })

        function returnRuangForm() {
            return `
                    <div class="xtra">
                        <div class="row">
                            <div class="col-2 mt-3">
                                <label for="">Kod Ruang</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kod_ruang[]" value="" required>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="">Nama Ruang</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_ruang[]" value="" required>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="">Luas Ruang</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="luas_ruang[]" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">M<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="">Tinggi Ruang</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="tinggi_ruang[]" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">M</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="">Fungsi Ruang</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="fungsi_ruang[]" value="" required>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="">Lampiran</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="lampiran[]" value="" required>
                                </div>
                            </div>
                            
                        </div>
                        <div class="">
                            <a class="mt-3 align-self-end btn btn-primary text-white" onclick="$(this).closest('.xtra').remove()">Buang</a>
                        </div>
                    <hr style="width: 100%; color: black;">

                        
                    </div>
                    

            `
        }

        function tambahRuang() {
            $("#maklumat_ruang").append(returnRuangForm());
        }
    </script>
@endsection
