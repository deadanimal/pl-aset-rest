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
        <form method="POST" action="/kewps9">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pembungkusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">

                    <div class="table-responsive py-4">
                        <table class="table table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Selected</th>
                                    <th scope="col">Bil</th>
                                    <th scope="col">Nombor Permohonan</th>
                                    <th scope="col">Nombor Kod</th>
                                    <th scope="col">Perihal Stok</th>
                                    <th scope="col">Kuantiti Dibungkus</th>
                                    <th scope="col">Maklumat Bungkusan</th>
                                    <th scope="col">Maklumat Penghantaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($infokewps7 as $k7)
                                    <tr>
                                        <td scope="col"><input type="checkbox" name="selected[]"
                                                value="{{ $k7->id }}"></td>
                                        <td scope="col">{{ $loop->iteration }}</td>
                                        <td scope="col">{{ $k7->id }}</td>
                                        <td scope="col">{{ $k7->kewps3a->no_kad }}</td>
                                        <td scope="col">{{ $k7->kewps3a->perihal_stok }}</td>
                                        <td scope="col"><input type="number" name="kuantiti_dibungkus[]"
                                                class="form-control" required></td>
                                        <td scope="col"><input type="text" name="maklumat_bungkusan[]"
                                                class="form-control" required></td>
                                        <td scope="col"><input type="text" name="maklumat_penghantaran[]"
                                                class="form-control" required></td>
                                    </tr>

                                    <input type="hidden" name="infokewps7_id[]" value="{{ $k7->id }}">
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
