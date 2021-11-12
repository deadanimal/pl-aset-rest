@extends('layouts.base') @section('content')


    <div class="card mt-4">
        <div class="card-header text-end"
            style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)">
            <div class="row">
                <div class="col text-start">
                    <h6 class="text-white">KEW.PS-4</h6>
                </div>
                <div class="col text-end">
                    <a href="/kewps4/create"> <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
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
                        <th scope="col">No. Kod</th>
                        <th scope="col">Perihal Stok</th>
                        <th scope="col">Nilai Baki Semasa (RM)</th>
                        <th scope="col">Status Stok</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kewps4 as $k4)
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col">{{ $k4->kewps3a_id }}</td>
                            <td scope="col">{{ $k4->kewps3a->perihal_stok }}</td>
                            <td scope="col">{{ $k4->nilai_baki_semasa }}</td>
                            <td scope="col">{{ $k4->status_stok }}</td>
                            <td scope="col">
                                <a href="/kewps4/{{ $k4->id }}"><i class="fas fa-pen"></i></a>
                                <a href="">
                                    <form action="/kewps4/{{ $k4->id }}" class="d-inline" method="POST">
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

            <a class="btn btn-primary mt-5" href="/kewps4pdf">
                Print <span class=" fas fa-print"></span></a>


        </div>
    </div>

@endsection
