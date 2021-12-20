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
                                <li class="breadcrumb-item"><a href="/info_plpk_pa_0203">info_plpk_pa_0203</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/info_plpk_pa_0203/{{$info_plpk_pa_0203->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Sunting Info PLPK PA 0203</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Butiran Kerosakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="butiran_kerosakan" value="{{$info_plpk_pa_0203->butiran_kerosakan}}"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">No Rujukan KEWPA 14</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="kewpa14_id" required>
                                        <option value="{{$info_plpk_pa_0203->kewpa14_id}}" required required selected disabled hidden>{{$info_plpk_pa_0203->kewpa14_id}}
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
                url: "/info_plpk_pa_0203/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/info_plpk_pa_0203";;
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
