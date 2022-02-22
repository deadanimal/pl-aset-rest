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
                                <li class="breadcrumb-item"><a href="/kewpa10/create">kewpa10</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Aduan Kerosakan Aset Alih</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a href="/kewpa10/create" class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive py-4">

                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Bil</th>
                                <th scope="col">No Siri Pendaftaran</th>
                                <th scope="col">Jenis Aset</th>
                                <th scope="col">Perihal Kerosakan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewpa10 as $kewpa10)
                                <tr>
                                    <td scope="col">{{ $loop->index + 1 }}</td>
                                    <td scope="col">{{ $kewpa10->kewpa3a->no_siri_pendaftaran }}</td>
                                    <td scope="col">{{ $kewpa10->kewpa3a->jenis_aset }}</td>
                                    <td scope="col">{{ $kewpa10->perihal_kerosakan }}</td>


                                    @if ($kewpa10->status == 'DERAF')
                                        <td scope="col"><span class="badge bg-warning">{{ $kewpa10->status }}</span></th>
                                        @elseif ($kewpa10->status == 'HANTAR')
                                        <td scope="col"><span class="badge bg-primary">{{ $kewpa10->status }}</span></th>
                                        @elseif ($kewpa10->status == 'DISEMAK')
                                        <td scope="col"><span class="badge bg-warning">{{ $kewpa10->status }}</span></th>
                                        @elseif ($kewpa10->status == 'LULUS')
                                        <td scope="col"><span class="badge bg-success">{{ $kewpa10->status }}</span></th>
                                        @elseif ($kewpa10->status == 'DITOLAK')
                                        <td scope="col"><span class="badge bg-danger">{{ $kewpa10->status }}</span></th>
                                    @endif

                                    <td scope="col">

                                        {{-- KAWALAN AKSES PENGGUNA 1
                                          PENGGUNA tidak boleh edit/hantar semula aduan selepas hantar --}}
                                        @if (auth()->user()->jawatan == 'user' and $kewpa10->status == 'DERAF')
                                            <a href="/kewpa10" onclick="ubahStatusAduan({{ $kewpa10->id }}, 'HANTAR')"><i
                                                    class="fas fa-arrow-up"></i></a>
                                            <a href="/kewpa10/{{ $kewpa10->id }}/edit"><i class="fas fa-pen"></i></a>
                                        @endif

                                        {{-- KAWALAN AKSES SA 1
                                        -SA cuma boleh semak dan hantar semakan setelah pengguna menghantar aduan (status = HANTAR)
                                        -SA cuma boleh tidak boleh semak semula dan hantar semakan setelah menyemak aduan (status = DISEMAK) --}}
                                        @if (auth()->user()->jawatan == 'superadmin' and $kewpa10->status == 'HANTAR')
                                            <a href="/kewpa10" onclick="ubahStatusAduan({{ $kewpa10->id }}, 'DISEMAK')"><i
                                                    class="fas fa-check"></i></a>
                                            <a href="/kewpa10/{{ $kewpa10->id }}/edit"><i class="fas fa-pen"></i></a>
                                        @endif



                                        {{-- KAWALAN AKSES KETUA JABATAN
                                          KJ boleh sah/tolak aduan yg berstatus semak sahaja --}}
                                        @if (auth()->user()->jawatan == 'ketuajabatan' and $kewpa10->status == 'DISEMAK')
                                            <a href="/kewpa10" onclick="ubahStatusAduan({{ $kewpa10->id }}, 'LULUS')"><i
                                                    class="fas fa-check"></i></a>
                                            <a href="/kewpa10" onclick="ubahStatusAduan({{ $kewpa10->id }}, 'DITOLAK')"><i
                                                    class="fas fa-times"></i></a>
                                        @endif





                                        <a href="/kewpa10pdf/{{ $kewpa10->id }}"><i class="fas fa-print"></i></a>
                                        <a href="/kewpa10" onclick="deleteData({{ $kewpa10 }})"><i
                                                class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var no_kod = [];
        $(document).ready(function() {
            initiateDatatable();
            $("#button_tambah").hide();
        })


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa10/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa10";;
                }
            })
        }

        function ubahStatusAduan(id, status) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa10/" + id,
                type: "PUT",
                data: {
                    "status": status
                },
                success: function() {
                    location.replace = "/kewpa10";
                }
            })
        }


       
    </script>

@endsection
