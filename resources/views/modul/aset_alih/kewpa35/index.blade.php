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
                                <li class="breadcrumb-item"><a href="/kewpa35">Kewpa35</a></li>
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
                        <h2 class="mb-0">Laporan Akhir Kehilangan Aset Alih</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewpa35/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Laporan Hasil</th>
                            <th scope="col">Arahan Tatacara</th>
                            <th scope="col">Langkah Mencegah</th>
                            <th scope="col">Rumusan Siasatan</th>
                            <th scope="col">Syor</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa35 as $k)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k->id }}</td>
                                <td scope="col">{{ $k->laporan_hasil }}</td>
                                <td scope="col">{{ $k->arahan_tatacara }}</td>
                                <td scope="col">{{ $k->langkah_mencegah }}</td>
                                <td scope="col">{{ $k->rumusan_siasatan }}</td>
                                <td scope="col">{{ $k->syor }}</td>
                                <td scope="col">
                                    <a href="/kewpa35/{{ $k->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="/kewpa35pdf/{{ $k->id }}"><i class="fas fa-print"></i></a>
                                    <form action="/kewpa35/{{ $k->id }}" method="post" class="d-inline-flex"
                                        id="delkewpa35">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:$('#delkewpa35').submit();"><i class="fas fa-trash"></i></a>
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
