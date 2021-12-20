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
                                <li class="breadcrumb-item"><a href="/plpk_pa_0206">plpk_pa_0206</a></li>
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
                        <h2 class="mb-0">Info PLPK PA 0206</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/info_plpk_pa_0206/create" class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>

                            <th scope="col">Bil</th>
                            <th scope="col">Deskripsi Alat Ganti</th>
                            <th scope="col">Kuantiti</th>
                            <th scope="col">Catitan</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plpk_pa_0206->info_plpk_pa_0206 as $kp11)
                            <tr>

                                <td scope="col">{{ $loop->index + 1 }}</td>
                                <td scope="col">{{ $kp11->deskripsi_alat_ganti }}</td>
                                <td scope="col">{{ $kp11->kuantiti }}</td>
                                <td scope="col">{{ $kp11->catitan }}</td>
                                <td scope="col">
                                    <a href="/info_plpk_pa_0206/{{ $kp11->id }}/edit"><i class="fas fa-pen"></i></a>

                                    <a href="" onclick="deleteData({{$kp11}})"><i class="fas fa-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_plpk_pa_0206/" + id,
                type: "DELETE",
                success: function() {
                }
            })
        }
    </script>
@endsection
