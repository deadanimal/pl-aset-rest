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
                                <li class="breadcrumb-item"><a href="/kewpa21">Kewpa21</a></li>
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
                        <h2 class="mb-0">Perakuan Pelupusan</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewpa21/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Kuasa Melulus</th>
                            <th scope="col">Bilangan Info</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa21 as $k21)
                            <tr>

                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k21->id }}</td>
                                <td scope="col">{{ $k21->kuasa_melulus }}</td>
                                <td scope="col">{{ count($k21->infokewpa21) }}</td>
                                <td scope="col">
                                    <a href="/kewpa21/{{ $k21->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="/kewpa21pdf/{{ $k21->id }}"><i class="fas fa-print"></i></a>
                                    <a href="/kewpa21" onclick="deleteData({{ $k21 }})"><i
                                            class="fas fa-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa21/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa21";
                }
            });
        }
    </script>

@endsection
