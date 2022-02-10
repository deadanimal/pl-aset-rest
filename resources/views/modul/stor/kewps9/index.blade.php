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
                                <li class="breadcrumb-item"><a href="">kewps9</a></li>
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
                        <h2 class="mb-0">Pembungkusan Stok (BPS)</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewps9/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombor Permohonan</th>
                            <th scope="col">Kuantiti Dibungkus</th>
                            <th scope="col">Maklumat Bungkusan</th>
                            <th scope="col">Maklumat Penghantaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps9 as $k9)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k9->infokewps7_id }}</td>
                                <td scope="col">{{ $k9->kuantiti_dibungkus }}</td>
                                <td scope="col">{{ $k9->maklumat_bungkusan }}</td>
                                <td scope="col">{{ $k9->maklumat_penghantaran }}</td>
                                @if ($k9->status == 'DIPOHON')
                                    <td scope="col"><span class="badge bg-warning">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status == 'DIPERIKSA')
                                    <td scope="col"><span class="badge bg-primary">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status == 'DIBUNGKUS')
                                    <td scope="col"><span class="badge bg-success">{{ $k9->status }}</span></th>
                                    @elseif ($k9->status == 'DITERIMA')
                                    <td scope="col"><span class="badge bg-danger">{{ $k9->status }}</span></th>
                                @endif
                                <td scope="col">
                                    <a href="/kewps9/{{ $k9->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="">
                                        <form action="/kewps9/{{ $k9->id }}" class="d-inline" method="POST">
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

                <a class="btn btn-primary ml-3" href="/kewps9pdf">
                    Print <span class=" fas fa-print"></span></a>


            </div>
        </div>
    </div>
@endsection
