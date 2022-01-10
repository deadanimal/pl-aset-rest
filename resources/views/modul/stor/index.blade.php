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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="card">
            <ul class="nav nav-pills nav-fill mt-2 mx-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#atp-stor" role="tab" aria-controls="atp-stor"
                        aria-selected="true">ALAT TULIS PEJABAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bap-stor" role="tab" aria-controls="bap-stor"
                        aria-selected="false">BEKALAN AM PEJABAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#ksb-stor" role="tab" aria-controls="ksb-stor"
                        aria-selected="false">KOD STOR SEPUSAT</a>
                </li>
            </ul>
            <div class="tab-content my-4">
                <div class="tab-pane fade show active" id="atp-stor" role="tabpanel" aria-labelledby="atp-stor-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <th>
                                            <p class="h4 text-white"> BIL</p>
                                        </th>
                                        <th colspan="2">
                                            <p class="h4 text-white">KATEGORI STOK</p>
                                        </th>
                                        <th>
                                            <p class="h4 text-white">NO KAD <br> & NO KOD</p>
                                        </th>
                                        <th>
                                            <p class="h4 text-white">BAKI STOK SEMASA</p>
                                        </th>
                                    </thead>
                                    <tbody>

                                        <tr style="background-color: rgb(164,193,226)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">ALAT TULIS PEJABAT</p>
                                            </td>
                                            <td>1</td>
                                            <td></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">ADHESIVES TAPES & DISPENSER</p>
                                            </td>
                                            <td>01</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 01 && $k->no_kad == 1 && $k->no_kad)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BINDING RING</p>
                                            </td>
                                            <td>02</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 02 && $k->no_kad == 1)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BUKU</p>
                                            </td>
                                            <td>03</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 03 && $k->no_kad == 1)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach<tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BINDING COVER</p>
                                            </td>
                                            <td>04</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 04 && $k->no_kad == 1)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach<tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">CLEAR HOLDER & REFILL</p>
                                            </td>
                                            <td>05</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 05 && $k->no_kad == 1)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach<tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">CORRECTION PEN</p>
                                            </td>
                                            <td>06</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 06 && $k->no_kad == 1)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="bap-stor" role="tabpanel" aria-labelledby="bap-stor-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <th>
                                            <p class="h4 text-white"> BIL</p>
                                        </th>
                                        <th colspan="2">
                                            <p class="h4 text-white">KATEGORI STOK</p>
                                        </th>
                                        <th>
                                            <p class="h4 text-white">NO KAD <br> & NO KOD</p>
                                        </th>
                                        <th>
                                            <p class="h4 text-white">Baki Stok Semasa</p>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr style="background-color: rgb(164,193,226)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BEKALAN AM PEJABAT</p>
                                            </td>
                                            <td>2</td>
                                            <td></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">AIR MINERAL</p>
                                            </td>
                                            <td>01</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 01 && $k->no_kad == 2)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BATERI</p>
                                            </td>
                                            <td>02</td>
                                            <td></td>

                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 02 && $k->no_kad == 2)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BENDERA</p>
                                            </td>
                                            <td>03</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 03 && $k->no_kad == 2)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach<tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BOOK END</p>
                                            </td>
                                            <td>04</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 04 && $k->no_kad == 2)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach<tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">BOX FILE</p>
                                            </td>
                                            <td>05</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 05 && $k->no_kad == 2)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach<tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">CARTRIDGE INK FAX</p>
                                            </td>
                                            <td>06</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 06 && $k->no_kad == 2)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="ksb-stor" role="tabpanel" aria-labelledby="ksb-stor-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <th>
                                            <p class="h4 text-white"> BIL</p>
                                        </th>
                                        <th colspan="2">
                                            <p class="h4 text-white">KATEGORI STOK</p>
                                        </th>
                                        <th>
                                            <p class="h4 text-white">NO KAD <br> & NO KOD</p>
                                        </th>
                                        <th>
                                            <p class="h4 text-white">BAKI STOK SEMASA</p>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr style="background-color: rgb(164,193,226)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">KOD STOR SEPUSAT</p>
                                            </td>
                                            <td>3</td>
                                            <td></td>
                                        </tr>
                                        <tr style="background-color: rgb(234,179,138)">
                                            <td colspan="3" class="text-center">
                                                <p class="h4 m-0">ALAT GANTI</p>
                                            </td>
                                            <td>01</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($ks as $k)
                                            @if ($k->kategori_stor == 01 && $k->no_kad == 3)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $k->perihal }}</td>
                                                    <td>{{ $k->unit_ukuran }}</td>
                                                    <td>{{ $k->kod_stor }}</td>
                                                    <td>{{ $k->baki_stok_semasa }}</td>
                                                </tr>
                                            @endif
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
