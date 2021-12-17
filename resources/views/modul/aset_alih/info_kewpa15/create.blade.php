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
                                <li class="breadcrumb-item"><a href="/info_kewpa15">info_kewpa15</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/info_kewpa15" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Rekod Penyelenggaraan</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Tarikh</label>
                                <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Jenis Penyelenggaraan</label>
                                <div class="input-group">
                                <select class="form-control mb-3" name="jenis_penyelenggaraan" required>
                                                    <option value="" required required selected disabled hidden>Pilih Status Aset
                                                    </option required>
                                                    <option value="Penyelenggaraan Pencegahan">Penyelenggaraan Pencegahan</option>
                                                    <option value="Penyelenggaran Pembaikan">Penyelenggaran Pembaikan</option>
                                                </select>
                                </div>
                            </div>
            
                            <div class="col-4">
                                <label for="">Butir Kerja</label>
                                <div class="input-group">
                                <input class="form-control mb-3" type="text" name="butir_kerja" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Nama Syarikat</label>
                                <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_syarikat" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kos</label>
                                <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kos" value="" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        <input class="form-control mb-3" type="hidden" name="kewpa15_id" value="{{$kewpa15->id}}" required>
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
                url: "/info_kewpa15/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/info_kewpa15";;
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
