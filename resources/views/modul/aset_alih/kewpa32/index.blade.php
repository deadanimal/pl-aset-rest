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
                                <li class="breadcrumb-item"><a href="/kewpa32">Kewpa32</a></li>
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
                        <h2 class="mb-0">Laporan Pelupusan Aset Alih</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewpa32/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Bilangan Info</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa32 as $k)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k->id }}</td>
                                <td scope="col">{{ $k->tahun }}</td>
                                <td scope="col">{{ count($k->infokewpa32) }}</td>


                                <td scope="col">
                                    <a href="/kewpa32/{{ $k->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="/kewpa32pdf/{{ $k->id }}"><i class="fas fa-print"></i></a>
                                    <form action="/kewpa32/{{ $k->id }}" method="post" class="d-inline-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-white" style="border: none"><a href=""><i
                                                    class="fas fa-trash"></a></i></button>
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
