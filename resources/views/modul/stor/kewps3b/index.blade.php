@extends('layouts.base') @section('content')


    <div class="card mt-4">
        <div class="card-header text-end"
            style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)">
            <div class="row">
                <div class="col text-start">
                    <h6 class="text-white">KEW.PS-3 (B)</h6>
                </div>
                <div class="col text-end">
                    <a href="/kewps3b/create"> <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                    </a>
                </div>
            </div>
        </div>
        </br>

        <div class="card-body pt-0">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tarikh</th>
                        <th scope="col">No Transaksi</th>
                        <th scope="col">Terima daripada/Keluar kepada</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kewps3b as $k3b)
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col">{{ $k3b->tarikh }}</td>
                            <td scope="col">{{ $k3b->no_transaksi }}</td>
                            <td scope="col">{{ $k3b->terima_keluar }}</td>
                            <td scope="col">
                                <a href="/kewps3b/{{ $k3b->id }}"><i class="fas fa-pen"></i></a>
                                <a href="">
                                    <form action="/kewps3b/{{ $k3b->id }}" class="d-inline" method="POST">
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

            <a class="btn btn-primary mt-5" href="/kewps3bpdf">
                Print <span class=" fas fa-print"></span></a>


        </div>
    </div>

@endsection
