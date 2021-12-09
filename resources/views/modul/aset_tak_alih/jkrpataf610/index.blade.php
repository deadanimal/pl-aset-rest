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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/10</a></li>
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
                        <h2 class="mb-0">Laporan Pendaftaran Premis & Maklumat Aset</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/jkrpataf610/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID Laporan Pendaftaran</th>
                            <th scope="col">Kementerian</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Kategori Aset</th>
                            <th scope="col">Bilangan Aset</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jkrpataf610 as $ata610)
                            <tr>
                                <td scope="col">{{ $ata610->id }}</td>
                                <td scope="col">{{ $ata610->kementerian }}</td>
                                <td scope="col">{{ $ata610->tahun }}</td>
                                <td scope="col">
                                    @if ($ata610->kategori_aset == 1)
                                        Tanah
                                    @elseif($ata610->kategori_aset == 2)
                                        Bangunan
                                    @elseif($ata610->kategori_aset == 3)
                                        Jalan
                                    @elseif($ata610->kategori_aset == 4)
                                        Pembentungan
                                    @elseif($ata610->kategori_aset == 5)
                                        Saliran
                                    @elseif($ata610->kategori_aset == 6)
                                        Lain-lain
                                    @endif
                                </td>
                                <td scope="col">{{ count($ata610->infojkrpataf610) }}</td>

                                <td scope="col">
                                    <a class="btn-sm bg-white border-0" href="/jkrpataf610/{{ $ata610->id }}"><i
                                            class="fas fa-pen"></i></a>
                                    <a class="btn-sm bg-white border-0" href="/jkrpataf610pdf/{{ $ata610->id }}"><i
                                            class="fas fa-print"></i></a>
                                    <form action="/jkrpataf610/{{ $ata610->id }}" class="d-inline" method="POST">
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
