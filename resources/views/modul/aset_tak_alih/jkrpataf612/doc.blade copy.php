<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" href="/css/bootstrap3.min.css"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    body {
        background: rgb(204, 204, 204);
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }

    @media print {

        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }

    .table-no-padding-y td {
        padding-top: 0px;
        padding-bottom: 0px;
    }

</style>

<body>
    <page size="A4">
        <div class="container mt-5">

            <div class="row">
                <div class="col-1"></div>
                <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                    <p class="h6 text-white mt-2">BAB C : PENERIMAAN DAN PENDAFTARAN ASET
                        <strong class="text-dark bg-white py-2 px-3"> 91 </strong>
                    </p>
                </div>
            </div>


            <div class="row ">
                <div class="col-11 text-end" style="margin-top:110px;">
                    <p class="h4 font-weight-bold">JKR.PATA.F6/12</p>
                </div>
                <div class="col-1">
                </div>
            </div>


            <div class="row" style="margin-top: 80px;">
                <div class="col-12 text-center">
                    <p class="h5 fw-bold"><u>LAPORAN DAFTAR ASET KHUSUS</u></p>
                </div>
                <div class="col-12 text-center mt-2">
                    <h5><strong> MAKLUMAT ASAS DAFTAR PREMIS ASET (DPA) </strong></h5>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: 40px;">
                <div class="col-9">
                    <h6 class="mt-5"> <strong>Nama Premis </strong>:
                        {{ $j612->jkrpataf68->nama_premis }}</h6>
                    <h6 class="mt-5"><strong>Alamat Premis </strong>:
                        {{ $j612->jkrpataf68->alamat_premis }}</h6>
                    <h6 class="mt-5"> <strong>No DPA </strong>: {{ $j612->jkrpataf68_id }}</h6>
                    <small>**diperolehi selepas pendaftaran ke dalam sistem mySPATA</small>

                    <h6 class="mt-5"> <strong>Bil. Blok Bangunan </strong>:
                        {{ $j612->bil_blok_bangunan }}
                    </h6>
                    <h6 class="mt-3"> <strong>Bil. Binaan Luar </strong>: {{ $j612->bil_binaan_luar }}
                    </h6>
                    <h6 class="mt-5"> <strong>Catatan </strong>: {{ $j612->catatan }}</h6>
                </div>



            </div>
        </div>
    </page>

    <page size="A4">
        <div class="container mt-5">

            <div class="row">
                <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                    <p class="h6 text-white mt-2"><strong class="text-dark bg-white py-2 px-3 mx-4"> 92 </strong>BAB C :
                        PENERIMAAN DAN PENDAFTARAN ASET
                    </p>
                </div>
                <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                <div class="col-1"></div>
            </div>


            <div class="row" style="margin-top: 110px;">
                <div class="col-12 text-center">
                    <p class="h5 fw-bold"> SENARAI BLOK BANGUNAN DALAM PREMIS </p>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: 40px;">
                <div class="col-10">
                    <p class="h6 mt-3"> <strong>Nama Premis </strong>:
                        {{ $j612->jkrpataf68->nama_premis }}</p>

                    <p class="h6 mt-3"> <strong>No DPA </strong>: {{ $j612->jkrpataf68_id }}</p>

                    <p class="h5 mt-3 text-center fw-bold">Senarai Blok</p>

                    <table class="table table-bordered mt-5">
                        <thead class="table-light">
                            <th>KOD BLOK</th>
                            <th>NAMA BLOK</th>
                            <th>LUAS TAPAK <br> (m²)</th>
                            <th>CATATAN</th>
                        </thead>
                        @foreach ($j612->blokbangunan as $bb)
                            <tr>
                                <td>{{ $bb->id }}</td>
                                <td>{{ $bb->nama_blok }}</td>
                                <td>{{ $bb->luas_tapak }}</td>
                                <td>{{ $bb->catatan }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>



            </div>
        </div>
    </page>

    @foreach ($j612->blokbangunan as $bb)
        @if (!is_null($bb->gambarblok))
            @foreach ($bb->gambarblok as $gb)
                <page size="A4">
                    <div class="container">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                            <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                                <p class="h6 text-white mt-2">BAB C : PENERIMAAN DAN PENDAFTARAN ASET
                                    <strong class="text-dark bg-white py-2 px-3"> 93 </strong>
                                </p>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 80px;">
                            <div class="col-12 text-center">
                                <h5><strong> Gambar Blok </strong></h5>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin-top: 20px;">
                            <div class="col-10">
                                <h6 class="mt-3"> <strong>Nama Premis </strong>:
                                    {{ $j612->jkrpataf68->nama_premis }}</h6>
                                <h6 class="mt-3"> <strong>No DPA </strong>: {{ $j612->jkrpataf68_id }}</h6>
                                <h6 class="mt-3"> <strong>Kad Blok </strong>: {{ $bb->id }}</h6>
                                <h6 class="mt-3"> <strong>Nama Blok </strong>: {{ $bb->nama_blok }}</h6>
                                <h6 class="mt-3"> <strong>Tarikh </strong>:
                                    {{ $bb->created_at->format('d/m/Y') }}</h6>

                                <img class="rounded mx-auto d-block img-thumbnail mt-4"
                                    style="width: 400px; height:300px" src="{{ asset($gb->gambar_hadapan) }}" alt="">
                                <img class="rounded mx-auto d-block img-thumbnail mt-5"
                                    style="width: 400px; height:300px" src="{{ asset($gb->gambar_belakang) }}"
                                    alt="">
                            </div>

                        </div>
                    </div>
                </page>
            @endforeach
        @endif

        @if (!is_null($bb->dataasetkhusus))
            <page size="A4">
                <div class="container mt-5">

                    <div class="row">
                        <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                            <p class="h6 text-white mt-2"><strong class="text-dark bg-white py-2 px-3 mx-4"> 94
                                </strong>BAB C :
                                PENERIMAAN DAN PENDAFTARAN ASET
                            </p>
                        </div>
                        <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                        <div class="col-1"></div>
                    </div>


                    <div class="row" style="margin-top: 80px;">
                        <div class="col-12 text-center">
                            <p class="h6 fw-bold"><u>PENGUMPULAN DATA ASET KHUSUS BLOK, ARAS DAN RUANG</u></p>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3" style="font-size: 14px;">
                        <div class="col-10">
                            <p class="h6 fw-bolder"><u>MAKLUMAT PREMIS</u></p>
                            <p class="mt-2">Nama Premis :
                                {{ $j612->jkrpataf68->nama_premis }}</p>
                            <p class="mt-2">No DPA : {{ $j612->jkrpataf68_id }}</p>

                            <p class="h6 mt-4 fw-bolder"><u>MAKLUMAT BLOK</u></p>
                            <p class="mt-2">Kod Blok : {{ $bb->id }}</p>
                            <p class="mt-2">Nama Blok : {{ $bb->nama_blok }} </p>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <p class=" fw-bold">Kontraktor Utama</p>
                                    <p class=" fw-bold">*Kontraktor</p>
                                </div>
                                <div class="col-3">
                                    @foreach ($bb->dataasetkhusus->kontraktor as $kbb)
                                        @if ($kbb->kontraktor_utama_bangunan == '1')
                                            <p> {{ $kbb->nama_kontraktor_bangunan }}</p>
                                        @else
                                            <p>:{{ $loop->iteration }}.{{ $kbb->nama_kontraktor_bangunan }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-3">
                                    <p class="fw-bold">Bidang Kerja</p>
                                    <p class="fw-bold">*Bidang Kerja</p>
                                </div>
                                <div class="col-3">
                                    @foreach ($bb->dataasetkhusus->kontraktor as $kbb)
                                        @if ($kbb->kontraktor_utama_bangunan == '1')
                                            <p> {{ $kbb->bidang_kerja_kontraktor_bangunan }}</p>
                                        @else
                                            <p>:{{ $loop->iteration }}.{{ $kbb->bidang_kerja_kontraktor_bangunan }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <p class="fw-bold">Juru Perunding Utama</p>
                                    <p class="fw-bold">*Juru Perunding</p>
                                </div>
                                <div class="col-3">
                                    @foreach ($bb->dataasetkhusus->perunding as $pbb)
                                        @if ($pbb->perunding_utama_bangunan == '1')
                                            <p> {{ $pbb->nama_perunding_bangunan }}</p> &nbsp;
                                        @else
                                            <p>:{{ $loop->iteration }}.{{ $pbb->nama_perunding_bangunan }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-3">
                                    <p class=" fw-bold">Bidang Kerja <br> &nbsp;</p>
                                    <p class=" fw-bold">*Bidang Kerja</p>
                                </div>
                                <div class="col-3">
                                    @foreach ($bb->dataasetkhusus->perunding as $pbb)
                                        @if ($pbb->perunding_utama_bangunan == '1')
                                            <p> {{ $pbb->bidang_kerja_perunding_bangunan }} </p>&nbsp;
                                        @else
                                            <p>:{{ $loop->iteration }}.{{ $pbb->bidang_kerja_perunding_bangunan }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <p>Nota: *Sila sediakan lampiran jika ada tambahan</p>

                            <div class="row">
                                <div class="col-3">
                                    <p>Kegunaan Blok</p>
                                    <p>Jenis Struktur</p>
                                    <p>No. Siri Pendaftaran</p>
                                    <p>Bil. Aras Atas Tanah</p>
                                    <p>Bil. Aras Bawah Tanah</p>
                                </div>
                                <div class="col-3">
                                    <p>: {{ $bb->dataasetkhusus->kegunaan_blok }}</p>
                                    <p>: {{ $bb->dataasetkhusus->jenis_struktur }}</p>
                                    <p>: {{ $bb->dataasetkhusus->no_siri_pendaftaran }}</p>
                                    <p>: {{ $bb->dataasetkhusus->bil_atas_tanah }}</p>
                                    <p>: {{ $bb->dataasetkhusus->bil_bawah_tanah }}</p>
                                </div>
                                <div class="col-3">
                                    <p>Tahun Siap Bina Asal</p>
                                    <p>Penggunaan Tenaga</p>
                                    <p>Penggunaan Air</p>
                                    <p>Luas Lantai Blok</p>
                                    <p>Luas Tapak Blok</p>
                                </div>
                                <div class="col-3">
                                    <p>: {{ $bb->dataasetkhusus->tahun_siap_bina_asal }}</p>
                                    <p>: {{ $bb->dataasetkhusus->penggunaan_tenaga }} kilowatt</p>
                                    <p>: {{ $bb->dataasetkhusus->penggunaan_air }}m³</p>
                                    <p>: {{ $bb->dataasetkhusus->luas_lantai }}</p>
                                    <p>: {{ $bb->dataasetkhusus->luas_tapak }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </page>
            <page size="A4">
                <div class="container">

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                        <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                            <p class="h6 text-white mt-2">BAB C : PENERIMAAN DAN PENDAFTARAN ASET
                                <strong class="text-dark bg-white py-2 px-3"> 95 </strong>
                            </p>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 80px;">
                        <div class="col-12 text-center">
                            <h5><strong> Maklumat Aras </strong></h5>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">

                        <div class="col-10">
                            <p>Senarai Ruang untuk Aras &emsp;&emsp;&emsp;: </p>

                            <table class="table table-bordered mt-5">
                                <thead class="table-light">
                                    <th>KOD RUANG</th>
                                    <th>NAMA RUANG</th>
                                    <th>LUAS RUANG (M²)</th>
                                    <th>TINGGI RUANG (M)</th>
                                    <th>FUNGSI RUANG</th>
                                </thead>
                                @foreach ($bb->dataasetkhusus->maklumataras as $ma)
                                    <tr>
                                        <td>{{ $ma->id }}</td>
                                        <td>{{ $ma->nama_ruang }}</td>
                                        <td>{{ $ma->luas_ruang }}</td>
                                        <td>{{ $ma->tinggi_ruang }}</td>
                                        <td>{{ $ma->fungsi_ruang }}</td>
                                    </tr>
                                @endforeach

                            </table>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <p class="fw-bold text-center">Pengumpul Data</p>
                                    <p class="fw-bold">Tandatangan :</p>
                                    <p class="h6 fw-bold mt-4">Nama :</p>
                                    <p class="h6 fw-bold">Jawatan :</p>
                                    <p class="h6 fw-bold">Tarikh :</p>
                                </div>
                                <div class="col-6">
                                    <p class="fw-bold text-center">Pengesah Data</p>
                                    <p class="fw-bold">Tandatangan :</p>
                                    <p class="h6 fw-bold mt-4">Nama :</p>
                                    <p class="h6 fw-bold">Jawatan :</p>
                                    <p class="h6 fw-bold">Tarikh :</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </page>
            @foreach ($bb->dataasetkhusus->maklumataras as $ma)
                <page size="A4">
                    <div class="container mt-5">

                        <div class="row">
                            <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                                <p class="h6 text-white mt-2"><strong class="text-dark bg-white py-2 px-3 mx-4"> 96
                                    </strong>BAB C
                                    :
                                    PENERIMAAN DAN PENDAFTARAN ASET
                                </p>
                            </div>
                            <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                            <div class="col-1"></div>
                        </div>


                        <div class="row" style="margin-top: 30px;">
                            <div class="col-12 text-center">
                                <p class="h6 fw-bold"><u>PENGUMPULAN DATA DAFTAR ASET KHUSUS BANGUNAN</u></p>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3" style="font-size: 14px;">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="h6"> <strong> Skop Aset Khusus</strong></p>
                                        <p class="h6 mt-3"> <strong> Nama Premis</strong></p>
                                        <p class="h6"> <strong> Nombor DPA</strong></p>
                                        <p class="h6"> <strong> Kod Blok</strong></p>
                                    </div>
                                    <div class="col-8">
                                        <p class="small"><strong class="h6">:</strong> Awam /
                                            Elektrik/
                                            Mekanikal / Arkitek (*Potong yang tidak
                                            berkenaan)</p>
                                        <p class="h6">: {{ $j612->jkrpataf68->nama_premis }}</p>
                                        <p class="h6">: {{ $j612->jkrpataf68_id }}</p>
                                        <p class="h6">: {{ $bb->id }}</p>
                                    </div>
                                </div>

                                <table class="table table-bordered table-fixed mt-4 table-no-padding-y">
                                    <tr>
                                        <td style="width: 150px">Nama Blok</td>
                                        <td style="width: 170px;"> {{ $bb->nama_blok }}</td>
                                        <td>Kategori Sistem</td>
                                        <td style="width: 170px;"></td>
                                    </tr>
                                    <tr>
                                        <td>Aras</td>
                                        <td> {{ $ma->senarai_ruang_aras }}</td>
                                        <td>Kategori Subsistem</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Ruang / Unit</td>
                                        <td>{{ $ma->luas_ruang }}</td>
                                        <td>Nombor Bilangan Subsistem</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori Aset</td>
                                        <td>
                                            @switch($j612->jkrpataf68->kategori_aset)
                                                @case(1)
                                                    Bangunan dan Binaan Lain
                                                @break
                                                @case(2)
                                                    Infrastruktur Jalan & Jambatan
                                                @break
                                                @case(3)
                                                    Infrastruktur (* Saliran / Pembetungan/ Aset air )
                                                @break
                                                @case(4)
                                                    Lain-lain
                                                @break
                                                @default
                                                    Tak Wujud
                                            @endswitch
                                        </td>
                                        <td>Komponen</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-dark"></td>
                                        <td class="bg-dark"></td>
                                        <td>Nombor Bilangan Komponen</td>
                                        <td></td>
                                    </tr>
                                </table>

                                <table class="table table-bordered table-fixed mt-4 table-no-padding-y">
                                    <tr>
                                        <td style="width: 150px">Label Ruang</td>
                                        <td style="width: 170px;"></td>
                                        <td>Label Aset</td>
                                        <td style="width: 170px;"></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis</td>
                                        <td></td>
                                        <td>Kondisi</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Jenama</td>
                                        <td></td>
                                        <td>Status Aset</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td></td>
                                        <td>Bahan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No Siri</td>
                                        <td></td>
                                        <td>Aksesori</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pengilang</td>
                                        <td></td>
                                        <td>Unit/Bahagian</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No Pendaftaran</td>
                                        <td></td>
                                        <td>Keluasan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Beli</td>
                                        <td></td>
                                        <td>Kapasiti</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Kos Beli</td>
                                        <td></td>
                                        <td>Kemasan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Mula Guna</td>
                                        <td></td>
                                        <td>Kuantiti</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Warrenti Mula</td>
                                        <td></td>
                                        <td>Tahap Kepentingan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Warrenti Tamat</td>
                                        <td></td>
                                        <td>Jangka Hayat</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No LPO/Kontrak</td>
                                        <td></td>
                                        <td>Nilai Terkini</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Lupus</td>
                                        <td></td>
                                        <td>No Sijil Lupus</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pembekal</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat / No. Telefon</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>Kontraktor</td>
                                        <td colspan="3"></td>
                                    <tr>
                                        <td>Alamat / No. Telefon</td>
                                        <td colspan="3"></td>
                                    </tr>
                                </table>


                                <p class="mt-2 fw-bold">Catatan: </p>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <p class="fw-bold text-center">Pengumpul Data</p>
                                        <p class="fw-bold">Tandatangan :</p>
                                        <p class="h6 fw-bold mt-2">Nama :</p>
                                        <p class="h6 fw-bold">Jawatan :</p>
                                        <p class="h6 fw-bold">Tarikh :</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="fw-bold text-center">Pengesah Data</p>
                                        <p class="fw-bold">Tandatangan :</p>
                                        <p class="h6 fw-bold mt-2">Nama :</p>
                                        <p class="h6 fw-bold">Jawatan :</p>
                                        <p class="h6 fw-bold">Tarikh :</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </page>
            @endforeach

        @endif


    @endforeach


    <page size="A4">
        <div class="container mt-5">

            <div class="row">
                <div class="col-1"></div>
                <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                    <p class="h6 text-white mt-2">BAB C : PENERIMAAN DAN PENDAFTARAN ASET
                        <strong class="text-dark bg-white py-2 px-3"> 97 </strong>
                    </p>
                </div>
            </div>


            <div class="row" style="margin-top: 80px;">
                <div class="col-12 text-center">
                    <p class="h5 fw-bold"><u>SENARAI BINAAN LUAR DALAM PREMIS</u> </p>
                </div>
                <div class="col-12 text-center mt-5">
                    <p class="h6 fw-bold"><u>Maklumat Premis</u></p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-10">
                    <p class="h6 mt-3"> <strong>Nama Premis </strong>:
                        {{ $j612->jkrpataf68->nama_premis }}</p>

                    <p class="h6 mt-3"> <strong>No DPA </strong>: {{ $j612->jkrpataf68_id }}</p>

                    <p class="h6 mt-5 text-center fw-bold"><u>Senarai Binaan Luar</u></p>

                    <table class="table table-bordered mt-4 text-center">
                        <thead class="table-light">
                            <th>KOD BINAAN LUAR</th>
                            <th>NAMA BINAAN LUAR</th>
                            <th>LUAS TAPAK <br> (m²)</th>
                            <th>CATATAN</th>
                        </thead>
                        @foreach ($j612->binaanluar as $bl)
                            <tr>
                                <td>{{ $bl->id }}</td>
                                <td>{{ $bl->nama_binaan_luar }}</td>
                                <td>{{ $bl->luas_tapak }}</td>
                                <td>{{ $bl->catatan }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>



            </div>
        </div>
    </page>

    @foreach ($j612->binaanluar as $bl)
        @foreach ($bl->gambarbinaanluar as $gbl)
            <page size="A4">
                <div class="container">

                    <div class="row">
                        <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                            <p class="h6 text-white mt-2"><strong class="text-dark bg-white py-2 px-3 mx-4"> 98
                                </strong>BAB C
                                :
                                PENERIMAAN DAN PENDAFTARAN ASET
                            </p>
                        </div>
                        <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                        <div class="col-1"></div>
                    </div>


                    <div class="row" style="margin-top: 50px;">
                        <div class="col-12 text-center">
                            <h5><strong> Gambar Binaan Luar </strong></h5>
                        </div>
                    </div>

                    <div class="row justify-content-center" style="margin-top: 20px;">
                        <div class="col-10">
                            <h6 class="mt-3"> <strong>Nama Premis </strong>:
                                {{ $j612->jkrpataf68->nama_premis }}</h6>
                            <h6 class="mt-3"> <strong>No DPA </strong>: {{ $j612->jkrpataf68_id }}</h6>
                            <h6 class="mt-3"> <strong>Kod Binaan Luar </strong>: {{ $bl->id }}
                            </h6>
                            <h6 class="mt-3"> <strong>Nama Binaan Luar </strong>:
                                {{ $bl->nama_binaan_luar }}
                            </h6>
                            <h6 class="mt-3"> <strong>Tarikh </strong>:
                                {{ $gbl->tarikh }}
                            </h6>

                            <img class="rounded mx-auto d-block img-thumbnail mt-4" style="width: 400px; height:300px"
                                src="{{ asset($gbl->gambar_hadapan) }}" alt="">
                            <img class="rounded mx-auto d-block img-thumbnail mt-5" style="width: 400px; height:300px"
                                src="{{ asset($gbl->gambar_belakang) }}" alt="">


                        </div>

                    </div>
                </div>
            </page>
        @endforeach
        @if (!is_null($bl->dataasetkhususbl))
            @foreach ($bl->dataasetkhususbl as $dakbl)
                <page size="A4">
                    <div class="container mt-5">

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                            <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                                <p class="h6 text-white mt-2">BAB C : PENERIMAAN DAN PENDAFTARAN ASET
                                    <strong class="text-dark bg-white py-2 px-3"> 99 </strong>
                                </p>
                            </div>
                        </div>


                        <div class="row" style="margin-top: 30px; ">
                            <div class="col-12 text-center">
                                <p class="h6 fw-bold"><u>BORANG PENGUMPULAN DATA ASET KHUSUS BINAAN LUAR</u></p>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3" style="font-size: 14px;">
                            <div class="col-10">
                                <p class="h6 fw-bolder"><u>MAKLUMAT PREMIS</u></p>
                                <p class="mt-2">Nama Premis :
                                    {{ $j612->jkrpataf68->nama_premis }}</p>
                                <p class="mt-2">No DPA : {{ $j612->jkrpataf68_id }}</p>

                                <p class="h6 mt-4 fw-bolder"><u>MAKLUMAT BINAAN LUAR</u></p>
                                <p class="mt-2">Kod Binaan Luar : {{ $bl->id }}</p>
                                <p class="mt-2">Jenis Binaan Luar :
                                    @switch($dakbl->jenis_binaan_luar)
                                        @case(1)
                                            Bangunan dan Binaan Lain
                                        @break
                                        @case(2)
                                            Infrastruktur Jalan & Jambatan
                                        @break
                                        @case(3)
                                            Infrastruktur (* Saliran / Pembetungan/ Aset air )
                                        @break
                                        @case(4)
                                            Lain-lain
                                        @break
                                    @endswitch
                                </p>
                                <p class="mt-2">Nama Binaan Luar / Zon : {{ $bl->nama_binaan_luar }}</p>

                                <div class="row mt-2">
                                    <div class="col-3">
                                        <p class=" fw-bold">Kontraktor Utama</p>
                                        <p class=" fw-bold">*Kontraktor</p>
                                    </div>
                                    <div class="col-3">
                                        @foreach ($dakbl->kontraktor as $kbl)
                                            @if ($kbl->kontraktor_luar_utama)
                                                <p> {{ $kbl->nama_kontraktor_luar }}</p>
                                            @else
                                                <p>:{{ $loop->iteration - 1 }}.{{ $kbl->nama_kontraktor_luar }}
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-3">
                                        <p class="fw-bold">Bidang Kerja </p>
                                        <p class="fw-bold">*Bidang Kerja</p>
                                    </div>
                                    <div class="col-3">

                                        @foreach ($dakbl->kontraktor as $kbl)
                                            @if ($kbl->kontraktor_luar_utama)
                                                <p> {{ $kbl->bidang_kerja_kontraktor_luar }}</p>
                                            @else
                                                <p>:{{ $loop->iteration - 1 }}.{{ $kbl->bidang_kerja_kontraktor_luar }}
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-3">
                                        <p class="fw-bold">Juru Perunding Utama</p>
                                        <p class="fw-bold">*Juru Perunding</p>
                                    </div>
                                    <div class="col-3">
                                        @foreach ($dakbl->perunding as $kbl)
                                            @if ($kbl->perunding_luar_utama)
                                                <p> {{ $kbl->nama_perunding_luar }}</p>&nbsp;
                                            @else
                                                <p>:{{ $loop->iteration - 1 }}.{{ $kbl->nama_perunding_luar }}
                                                </p>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="col-3">
                                        <p class=" fw-bold">Bidang Kerja <br> &nbsp;</p>
                                        <p class=" fw-bold">*Bidang Kerja</p>
                                    </div>
                                    <div class="col-3">
                                        @foreach ($dakbl->perunding as $kbl)
                                            @if ($kbl->perunding_luar_utama)
                                                <p> {{ $kbl->bidang_kerja_perunding_luar }}</p>&nbsp;
                                            @else
                                                <p>:{{ $loop->iteration - 1 }}.{{ $kbl->bidang_kerja_perunding_luar }}
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <p>Nota: *Sila sediakan lampiran jika ada tambahan</p>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Kegunaan Binaan Luar</p>
                                        <p>Jenis Struktur</p>
                                        <p>No. Siri Pendaftaran</p>
                                        <p>Luas Binaan Luar</p>
                                    </div>
                                    <div class="col-3">
                                        <p>: {{ $dakbl->kegunaan_binaan_luar }}</p>
                                        <p>: {{ $dakbl->jenis_struktur }}</p>
                                        <p>: {{ $dakbl->no_siri_pendaftaran }}</p>
                                        <p>: {{ $dakbl->luas_binaan_luar }}</p>
                                    </div>
                                    <div class="col-3">
                                        <p>Tahun Siap Bina Asal</p>
                                        <p>Penggunaan Tenaga</p>
                                        <p>Penggunaan Air</p>
                                        <p>Kapasiti Air <br> <em>*Untuk Tangki Air</em></p>
                                    </div>
                                    <div class="col-3">
                                        <p>: {{ $dakbl->tahun_siap_bina }}</p>
                                        <p>:{{ $dakbl->penggunaan_tenaga }} kilowatt</p>
                                        <p>:{{ $dakbl->penggunaan_air }} m³</p>
                                        <p>:{{ $dakbl->kapasiti_air }} m³</p>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <p class="fw-bold text-center">Pengumpul Data</p>
                                        <p class="fw-bold">Tandatangan :</p>
                                        <p class="h6 fw-bold mt-2">Nama :</p>
                                        <p class="h6 fw-bold">Jawatan :</p>
                                        <p class="h6 fw-bold">Tarikh :</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="fw-bold text-center">Pengesah Data</p>
                                        <p class="fw-bold">Tandatangan :</p>
                                        <p class="h6 fw-bold mt-2">Nama :</p>
                                        <p class="h6 fw-bold">Jawatan :</p>
                                        <p class="h6 fw-bold">Tarikh :</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </page>
                <page size="A4">
                    <div class="container mt-5">

                        <div class="row">
                            <div class="col-7 mt-5" style="background-color: rgb(117, 177, 28); height:30px;">
                                <p class="h6 text-white mt-2"><strong class="text-dark bg-white py-2 px-3 mx-4"> 100
                                    </strong> Tatacara Pengurusan Aset Tak Alih Kerajaan
                                </p>
                            </div>
                            <div class="col-4 mt-5" style="background-color: grey; height:30px;"></div>
                            <div class="col-1"></div>
                        </div>


                        <div class="row" style="margin-top: 20px;">
                            <div class="col-12 text-center">
                                <p class="h6 fw-bold"><u>BORANG PENGUMPULAN DATA DAFTAR ASET KHUSUS BINAAN LUAR</u>
                                </p>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3" style="font-size: 14px;">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="h6"> <strong> Skop Aset Khusus</strong></p>
                                        <p class="h6 mt-3"> <strong> Nama Premis</strong></p>
                                        <p class="h6"> <strong> Nombor DPA</strong></p>
                                        <p class="h6"> <strong> Kod Blok</strong></p>
                                    </div>
                                    <div class="col-8">
                                        <p class="small">: Awam / Elektrik / Mekanikal / Arkitek
                                            (*Potong yang tidak berkenaan)
                                        </p>
                                        <p class="h6">: {{ $dakbl->nama_premis }}</p>
                                        <p class="h6">: {{ $j612->jkrpataf68_id }}</p>
                                        <p class="h6">: {{ $bl->id }}</p>
                                    </div>
                                </div>

                                <table class="table table-bordered table-fixed mt-4 table-no-padding-y">
                                    <tr>
                                        <td style="width: 150px">Nama Blok</td>
                                        <td style="width: 170px;"> {{ $dakbl->nama_binaan_luar }}</td>
                                        <td>Kategori Sistem</td>
                                        <td style="width: 170px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aras</td>
                                        <td></td>
                                        <td>Kategori Subsistem</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Ruang / Unit</td>
                                        <td></td>
                                        <td>Nombor Bilangan Subsistem</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori Aset</td>
                                        <td>@switch($dakbl->jenis_binaan_luar)
                                                @case(1)
                                                    Bangunan dan Binaan Lain
                                                @break
                                                @case(2)
                                                    Infrastruktur Jalan & Jambatan
                                                @break
                                                @case(3)
                                                    Infrastruktur (* Saliran / Pembetungan/ Aset air )
                                                @break
                                                @case(4)
                                                    Lain-lain
                                                @break
                                            @endswitch
                                        </td>
                                        <td>Komponen</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-dark"></td>
                                        <td class="bg-dark"></td>
                                        <td>Nombor Bilangan Komponen</td>
                                        <td></td>
                                    </tr>
                                </table>

                                <table class="table table-bordered table-fixed mt-4 table-no-padding-y">
                                    <tr>
                                        <td style="width: 150px">Label Ruang</td>
                                        <td style="width: 170px;"></td>
                                        <td>Label Aset</td>
                                        <td style="width: 170px;"></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis</td>
                                        <td></td>
                                        <td>Kondisi</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Jenama</td>
                                        <td></td>
                                        <td>Status Aset</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td></td>
                                        <td>Bahan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No Siri</td>
                                        <td></td>
                                        <td>Aksesori</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pengilang</td>
                                        <td></td>
                                        <td>Unit/Bahagian</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No Pendaftaran</td>
                                        <td></td>
                                        <td>Keluasan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Beli</td>
                                        <td></td>
                                        <td>Kapasiti</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Kos Beli</td>
                                        <td></td>
                                        <td>Kemasan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Mula Guna</td>
                                        <td></td>
                                        <td>Kuantiti</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Warrenti Mula</td>
                                        <td></td>
                                        <td>Tahap Kepentingan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Warrenti Tamat</td>
                                        <td></td>
                                        <td>Jangka Hayat</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No LPO/Kontrak</td>
                                        <td></td>
                                        <td>Nilai Terkini</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Lupus</td>
                                        <td></td>
                                        <td>No Sijil Lupus</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pembekal</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat / No. Telefon</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>Kontraktor</td>
                                        <td colspan="3"></td>
                                    <tr>
                                        <td>Alamat / No. Telefon</td>
                                        <td colspan="3"></td>
                                    </tr>
                                </table>


                                <p class="mt-2 fw-bold">Catatan: </p>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <p class="fw-bold text-center">Pengumpul Data</p>
                                        <p class="fw-bold">Tandatangan :</p>
                                        <p class="h6 fw-bold mt-2">Nama :</p>
                                        <p class="h6 fw-bold">Jawatan :</p>
                                        <p class="h6 fw-bold">Tarikh :</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="fw-bold text-center">Pengesah Data</p>
                                        <p class="fw-bold">Tandatangan :</p>
                                        <p class="h6 fw-bold mt-2">Nama :</p>
                                        <p class="h6 fw-bold">Jawatan :</p>
                                        <p class="h6 fw-bold">Tarikh :</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </page>
            @endforeach
        @endif

    @endforeach


</body>


</html>
