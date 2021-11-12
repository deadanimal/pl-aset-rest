@extends('layouts.base') @section('content')


    <div class="card mt-4">
        <div class="card-header text-end"
            style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)">
            <div class="row">
                <div class="col text-start">
                    <h6 class="text-white">KEW.PS-5</h6>
                </div>
                <div class="col text-end">
                    <a href="/kewps5/create"> <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
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
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kewps5 as $k5)
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col">No kod</td>
                            <td scope="col">Perihal</td>
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

            <a class="btn btn-primary mt-5" href="/kewps5pdf">
                Print <span class=" fas fa-print"></span></a>


        </div>
    </div>

@endsection
