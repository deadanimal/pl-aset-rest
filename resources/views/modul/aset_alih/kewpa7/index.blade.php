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
                                <li class="breadcrumb-item"><a href="/kewpa7">kewpa7</a></li>
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
                            <h2 class="mb-0">Senarai Aset Alih</h2>
                        </div>
                        <div class="text-end mr-2">
                            @if ($filter == 'on')
                            <a href="/kewpa7pdf" class="align-self-end btn btn-sm btn-primary" id="cetak">Cetak</a>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($filter == 'off')
                    <div class="card-body pt-0">

                        <br>
                        <form method="POST" action="/kewpa7/1">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Pilih Bahagian: </label>
                                    <div class="input-group">
                                        <select class="form-control mb-3" name="bahagian" required>
                                            <option value="" selected disabled hidden>Pilih Bahagian</option required>
                                            @foreach ($jabatan as $jbtn)
                                                <option value="{{ $jbtn->nama_jabatan }}">{{ $jbtn->nama_jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="">Pilih Lokasi: </label>
                                    <div class="input-group">
                                        <select class="form-control mb-3" name="lokasi" required>
                                            <option value="" selected disabled hidden>Pilih Lokasi</option required>
                                            @foreach ($lokasi as $lok)
                                                <option value="{{ $lok->nama_lokasi }}">{{ $lok->nama_lokasi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary text-white">Cari</a>
                        </form>
                    </div>

                @else
                    <div class="table-responsive py-4">

                        <table class="table table-custom-simplified table-flush" id="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Bil</th>
                                    <th scope="col">No Siri Pendaftaran</th>
                                    <th scope="col">Keterangan Aset</th>
                                    <th scope="col">Kuantiti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kewpa7 as $kewpa7)
                                    <tr>
                                        <td scope="col">{{ $loop->index + 1 }}</td>
                                        <td scope="col">{{ $kewpa7->no_siri_pendaftaran }}</td>
                                        <td scope="col">{{ $kewpa7->keterangan_aset }}</td>
                                        <td scope="col">NA</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
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
                url: "/kewpa7/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa7";;
                }
            })
        }
    </script>

@endsection
