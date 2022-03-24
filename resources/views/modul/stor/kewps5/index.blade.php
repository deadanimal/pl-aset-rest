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
                                <li class="breadcrumb-item"><a href="">Kewps5</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <div class="card mt-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penentuan Kumpulan Stok</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a href="/kewps5/create"><button
                                    class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive py-4">
                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Kod</th>
                                <th scope="col">Perihal Stok</th>
                                <th scope="col">Purata Pembelian</th>
                                <th scope="col">Peratusan</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewps5 as $k5)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $k5->kewps3a->no_kad ?? 'Dipadam' }}</td>
                                    <td scope="col">{{ $k5->kewps3a->perihal_stok ?? 'Dipadam' }}</td>
                                    <td scope="col">{{ $k5->purata_pembelian }}</td>
                                    <td scope="col">{{ $k5->peratusan }}%</td>
                                    <td scope="col">
                                        <a href="/kewps5/{{ $k5->id }}"><i class="fas fa-pen"></i></a>
                                        <a href="">
                                            <form action="/kewps5/{{ $k5->id }}" class="d-inline" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn-sm bg-white border-0" type="submit"> <i
                                                        class=" fas fa-trash"></i></button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a class="btn btn-primary ml-3" href="/kewps5pdf">
                        Print <span class=" fas fa-print"></span></a>



                </div>
            </div>
        </div>
    </div>
@endsection
