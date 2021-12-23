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
                                <li class="breadcrumb-item"><a href="/kewpa9">kewpa9</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/kewpa9" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Permohonan Pergerakan</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Tujuan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="tujuan" value="" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Tempat Digunakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="tempat_digunakan" value="" required>
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahInfo()">Tambah Aset</a>
                    </div>



                </div>
                <div id="info_kewpa9_create"></div>
        </div>
        </form>
    </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            initiateDatatable();
            
        })

        document.addEventListener("DOMContentLoaded", function(){
            tambahInfo();
        });

        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa9/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa9";;
                }
            })
        }

        function tambahInfo() {

            $("#info_kewpa9_create").append(

                `
                <div class="card mt-4" id="basic-info">
                <div class="card-header">
                <div class="row">
                    <div class="col">
                    <h2 class="mb-0">Tambah Info Pergerakan</h2>
                    </div>
                    <div class="text-end mr-2">
                    <a class="align-self-end btn btn-sm btn-primary text-white" onclick="$(this).closest('.card').remove()">Buang</a>
                    </div>

                </div>
                </div>

                <div class="card-body pt-0">

                <br>
                <div class="row">
                <div class="col-4">
                    <label for="">Tarikh Dipinjam</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="date" name="tarikh_dipinjam[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Tarikh Dijangka</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="date" name="tarikh_dijangka[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Status</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="status[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Tarikh Dipulangkan</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="date" name="tarikh_dipulangkan[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Tarikh Diterima</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="date" name="tarikh_diterima[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Catatan</label>
                    <div class="input-group">
                    <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
                    </div>
                </div>
                <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="no_siri_pendaftaran[]" required>
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
            </div>

            </div>
            </div>

`
            );

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
