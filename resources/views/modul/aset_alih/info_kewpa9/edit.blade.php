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
                                <li class="breadcrumb-item"><a href="/info_kewpa9">info_kewpa9</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/info_kewpa9/{{$info_kewpa9->id}}" enctype="multipart/form-data"">
                @csrf
                @method('PUT')
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
                                <label for="">Tarikh Dipinjam</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_dipinjam" value="{{$info_kewpa9->tarikh_dipinjam}}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Dijangka</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_dijangka" value="{{$info_kewpa9->tarikh_dijangka}}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Status</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="status" value="{{$info_kewpa9->status}}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Dipulangkan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_dipulangkan" value="{{$info_kewpa9->tarikh_dipulangkan}}"
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Diterima</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_diterima" value="{{$info_kewpa9->tarikh_diterima}}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan" value="{{$info_kewpa9->catatan}}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                                        <option value="{{$info_kewpa9->no_siri_pendaftaran}}" selected hidden>{{$info_kewpa9->no_siri_pendaftaran}}
                                        </option>
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
                url: "/info_kewpa9/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/info_kewpa9";;
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
