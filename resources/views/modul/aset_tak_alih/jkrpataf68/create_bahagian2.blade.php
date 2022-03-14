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
        <form method="POST" action="/edit-blok/{{$maklumat_blok->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Permohonan Bangunan/Premis</h2>
                        </div>
                    </div>
                </div>


                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        {{-- bahagian 1 --}}
                        <div id="bahagian1" class="col-12 row">

                            {{-- TODO 1: add input for kod lokasi --}}
                            {{-- TODO 2: add input for nama tanah --}}
                            <div class="col-12 my-3">
                                <label style="font-size: 20px;" for=""><strong>MAKLUMAT BLOK</strong></label>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="">Kad Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kad_blok" value="{{$maklumat_blok->kad_blok}}" >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Nama Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_blok" value="{{$maklumat_blok->nama_blok}}" >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tarikh</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tarikh" value="{{$maklumat_blok->tarikh}}" >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Pandangan Sudut Hadapan</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="pandangan_sudut_dari_hadapan" value="{{$maklumat_blok->pandangan_sudut_dari_hadapan}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Pandangan Sudut Belakang</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="pandangan_sudut_dari_belakang" value="{{$maklumat_blok->pandangan_sudut_dari_belakang}}"
                                        >
                                </div>
                            </div>

                            <hr style="width: 100%; color: black;">
                            <div class="col-12 my-5">
                                <label for=""><strong>MAKLUMAT BLOK</strong></label>
                            </div>

                            {{-- kontraktor --}}
                            <div class="col-6 mt-3">
                                <label for="">Kontraktor Utama</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kontraktor_utama" value="{{$maklumat_blok->kontraktor_utama}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Kontraktor</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="kontraktor_1" value="{{$maklumat_blok->kontraktor_1}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="kontraktor_2" value="{{$maklumat_blok->kontraktor_2}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="kontraktor_3" value="{{$maklumat_blok->kontraktor_3}}"
                                        >
                                </div>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="">Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bk_kontraktor_utama" value="{{$maklumat_blok->bk_kontraktor_utama}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_kontraktor_1" value="{{$maklumat_blok->bk_kontraktor_1}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_kontraktor_2" value="{{$maklumat_blok->bk_kontraktor_2}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_kontraktor_3" value="{{$maklumat_blok->bk_kontraktor_3}}"
                                        >
                                </div>
                            </div>

                            {{-- perunding --}}
                            <div class="col-6 mt-3">
                                <label for="">Juru Perunding Utama</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="perunding_utama" value="{{$maklumat_blok->perunding_utama}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Juru Perunding</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="perunding_1" value="{{$maklumat_blok->perunding_1}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="perunding_2" value="{{$maklumat_blok->perunding_2}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="perunding_3" value="{{$maklumat_blok->perunding_3}}"
                                        >
                                </div>
                            </div>

                            {{-- bidang kerja --}}
                            <div class="col-6 mt-3">
                                <label for="">Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bk_perunding_utama" value="{{$maklumat_blok->bk_perunding_utama}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">*Bidang Kerja</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_perunding_1" value="{{$maklumat_blok->bk_perunding_1}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">2</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_perunding_2" value="{{$maklumat_blok->bk_perunding_2}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">3</span>
                                    </div>
                                    <input class="form-control" type="text" name="bk_perunding_3" value="{{$maklumat_blok->bk_perunding_3}}"
                                        >
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div style="background: #fff3cd" class="alert" role="alert">
                                    <h5><strong>Nota: *Sila sediakan lampiran jika ada tambahan</strong></h5>
                                </div>
                            </div>

                            {{-- maklumat tambahan --}}
                            <div class="col-6 mt-3">
                                <label for="">Kegunaan Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kegunaan_blok" value="{{$maklumat_blok->kegunaan_blok}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Jenis Struktur</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="jenis_struktur" value="{{$maklumat_blok->jenis_struktur}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">No Siri Pendaftaran</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_siri_pendaftaran"  value="{{$maklumat_blok->no_siri_pendaftaran}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Bil. Aras Atas Tanah</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bil_aras_atas_tanah"  value="{{$maklumat_blok->bil_aras_atas_tanah}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Bil. Aras Bawah Tanah</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="bil_aras_bawah_tanah"  value="{{$maklumat_blok->bil_aras_bawah_tanah}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Tahun Siap Bina Asal</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="number" name="tahun_siap_bina_asal"  value="{{$maklumat_blok->tahun_siap_bina_asal}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Penggunaan Tenaga</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="penggunaan_tenaga"  value="{{$maklumat_blok->penggunaan_tenaga}}"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text">kilowatt</span>
                                        </div>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Penggunaan Air</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="penggunaan_air"  value="{{$maklumat_blok->penggunaan_air}}"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text">M<sup>3</sup></span>
                                        </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Luas Lantai Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="luas_lantai_blok"  value="{{$maklumat_blok->luas_lantai_blok}}"
                                        >
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Luas Tapak Blok</label>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="luas_tapak_blok"  value="{{$maklumat_blok->luas_tapak_blok}}"
                                        >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right">
                                    <a href="/pilihan-blok?bahagian1_id={{$maklumat_blok->id_bahagian1}}&blok_id={{$maklumat_blok->id}}" class="btn btn-primary mt-5 text-white">Kembali</a>
                                    @if ($maklumat_blok->bil_aras_atas_tanah > 0 || $maklumat_blok->bil_aras_bawah_tanah > 0)
                                        <a href="/pilihan-aras?blok_id={{$maklumat_blok->id}}" class="btn btn-primary mt-5 text-white">Isi Maklumat Aras</a>
                                    @endif
                                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
