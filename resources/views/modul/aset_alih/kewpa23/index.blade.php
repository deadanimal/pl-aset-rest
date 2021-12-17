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
                                <li class="breadcrumb-item"><a href="/kewpa23">Kewpa23</a></li>
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
                        <h2 class="mb-0">Sijil Pelupusan Aset Alih</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewpa23/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">No Resit</th>
                            <th scope="col">Bilangan Item</th>
                            <th scope="col">Tarikh</th>
                            <th scope="col">Salinan Rekod</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa23 as $k23)
                            <tr>
                                <td scope="col">{{ $k23->id }}</td>
                                <td scope="col">{{ $k23->no_resit }}</td>
                                <td scope="col">{{ $k23->bilangan_item }}</td>
                                <td scope="col">{{ $k23->tarikh }}</td>
                                <td scope="col">{{ $k23->salinan_rekod }}</td>
                                <td scope="col">
                                    <a href="/kewpa23/{{ $k23->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="/kewpa23pdf/{{ $k23->id }}"><i class="fas fa-print"></i></a>
                                    <form action="/kewpa23/{{ $k23->id }}" method="post" class="d-inline-flex"
                                        id="delkewpa23">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:$('#delkewpa23').submit();"><i class="fas fa-trash"></i></a>
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
