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
                                <li class="breadcrumb-item"><a href="/info_kewpa11">info_kewpa11</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/info_kewpa11" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Permohonan Pergerakan</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Lokasi Sebenar</label>
                                <div class="input-group">
                                <input class="form-control mb-3" type="text" name="lokasi_sebenar" value="" required>
                                </div>
                            </div>
                            
            
                            <div class="col-4">
                                <label for="">Status Aset</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="status_aset" required>
                                        <option value="" required required selected disabled hidden>Pilih Status Aset
                                        </option required>
                                        <option value="Sedang Digunakan(A)">Sedang Digunakan(A)</option>
                                        <option value="Tidak Digunakan(B)">Tidak Digunakan(B)</option>
                                        <option value="Perlu Pembaikan(C)">Perlu Pembaikan(C)</option>
                                        <option value="Sedang Diselenggara(D)">Sedang Diselenggara(D)</option>
                                        <option value="Hilang(E)">Hilang(E)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                            <label for="">No Siri Pendaftaran</label>
                                            <div class="input-group">
                                                <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                                                    <option value="" required required selected disabled hidden>Pilih No. Siri
                                                        Pendaftaran
                                                    </option required>
                                                    @foreach ($kewpa3a as $kew3)
                                                        <option value="{{ $kew3->no_siri_pendaftaran }}">
                                                            {{ $kew3->no_siri_pendaftaran }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> 
                            </div>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                        <input class="form-control mb-3" type="hidden" name="rujukan_kewpa11_id" value="{{$kewpa11->id}}" required>
                    </div>

                </div>



        </div>
    </div>
    </form>
    </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            initiateDatatable();

        })

        document.addEventListener("DOMContentLoaded", function() {
            tambahInfo();
        });

        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_kewpa11/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/info_kewpa11";;
                }
            })
        }



        function initiateDatatable() {
            const dataTableBasic = new simpleDatatables.DataTable("#table", {
                searchable: true,
                fixedHeight: true,
                sortable: false
            });
        }
    </script>

@endsection
