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
                                <li class="breadcrumb-item"><a href="/info_plpk_pa_0204">info_plpk_pa_0204</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/info_plpk_pa_0204" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info PLPK PA 0204</h2>
                            </div>
                        </div>
                    </div>

                    <br>


                    <div class="card-body pt-0">

                        <br>
                        <div class="row">
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kuantiti" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kos</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kos" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Bacaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="bacaan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Status</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="status" required>
                                        <option value="" required required selected disabled hidden>Pilih Status
                                        </option required>
                                        <option value="Status 1">Status 1</option>
                                        <option value="Status 2">Status 2</option>
                                        <option value="Status 3">Status 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Rujukan KEWPA 14</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="kewpa14_id" required>
                                        <option value="" required required selected disabled hidden>Pilih No. Rujukan Kewpa
                                            14
                                        </option required>
                                        @foreach ($kewpa14 as $kew14)
                                            <option value="{{ $kew14->id }}">
                                                No Rujukan: {{ $kew14->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>
                    <input class="form-control mb-3" type="hidden" name="plpk04_id" value="{{ $plpk_pa_0204->id }}"
                        required>
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
                url: "/info_plpk_pa_0204/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/info_plpk_pa_0204";;
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
