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
                                <li class="breadcrumb-item"><a href="/kewpa31">Kewpa31</a></li>
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
                        <h2 class="mb-0">Senarai Aset Alih Yang Dilelong</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewpa31/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Kuantiti</th>
                            <th scope="col">Harga Simpanan</th>
                            <th scope="col">Deposit</th>
                            <th scope="col">ID Kewpa31</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa31 as $k31)
                            <tr>

                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k31->id }}</td>
                                <td scope="col">{{ $k31->kuantiti }}</td>
                                <td scope="col">{{ $k31->harga_simpanan }}</td>
                                <td scope="col">{{ $k31->deposit }}</td>
                                <td scope="col">{{ $k31->kewpa30_id }}</td>

                                <td scope="col">
                                    <a href="/kewpa31/{{ $k31->id }}"><i class="fas fa-pen"></i></a>
                                    <form action="/kewpa31/{{ $k31->id }}" method="post" class="d-inline-flex"
                                        id="delkewpa31">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:$('#delkewpa31').submit();"><i class="fas fa-trash"></i></a>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/kewpa31pdf" class="btn btn-primary ml-3"><i class="fas fa-print"></i>Print</a>

            </div>
        </div>
    </div>



@endsection
