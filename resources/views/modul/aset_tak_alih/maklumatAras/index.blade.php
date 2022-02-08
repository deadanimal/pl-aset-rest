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
                                <li class="breadcrumb-item"><a href="/maklumat-aras-ruang">Maklumat Aras & Ruang</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="card mt-4">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Data Aset Khusus</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/dataasetkhusus/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kegunaan Blok</th>
                            {{-- <th scope="col">Jenis Struktur</th> --}}
                            <th scope="col">ID Blok Bangunan</th>
                            <th scope="col">Bil. Kontraktor</th>
                            <th scope="col">Bil. Perunding</th>
                            <th scope="col">Bil. Maklumat Aras</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maklumatAras as $ma)
                            <tr>
                                <td scope="col">{{ $ma->id }}</td>
                                <td scope="col">
                                    @if ($ma->kegunaan_blok == 1)Bangunan dan Binaan
                                        Lain
                                    @elseif($ma->kegunaan_blok == 2)Infrastruktur Jalan & Jambatan
                                    @elseif($ma->kegunaan_blok == 3)Infrastruktur (Saliran / Pembetungan/ Aset air )
                                    @elseif($ma->kegunaan_blok == 4)Lain-lain
                                    @endif
                                </td>
                                {{-- <td scope="col">
                                    @if ($ma->jenis_struktur == 1)Pejabat / Ruang Kerja
                                    @elseif($ma->jenis_struktur == 2)Perumahan/ Penginapan
                                    @elseif($ma->jenis_struktur == 3)Fasiliti/ Infrastruktur Awam
                                    @elseif($ma->jenis_struktur == 4)Lain-lain
                                    @endif
                                </td> --}}
                                <td scope="col">{{ $ma->blok_bangunan_id }}</td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col"></td>


                                <td scope="col">
                                    <a class="btn-sm bg-white border-0" href="/dataasetkhusus/{{ $ma->id }}"><i
                                            class="fas fa-pen"></i></a>
                                    <a class="btn-sm bg-white border-0" href="/dataasetkhususpdf/{{ $ma->id }}"><i
                                            class="fas fa-print"></i></a>
                                    <form action="dataasetkhusus/{{ $ma->id }}" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn-sm bg-white border-0" type="submit"> <i
                                                class=" fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
